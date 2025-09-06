<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookDonation;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
     * Display all donations for admin review
     */
    public function index(Request $request)
    {
        $query = BookDonation::with('donor');

        // Filter by status if provided
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search by donor name or email
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('donor_name', 'like', '%' . $request->search . '%')
                  ->orWhere('donor_email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by date range
        if ($request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $donations = $query->orderBy('created_at', 'desc')->paginate(15);
        
        // Preserve filter parameters in pagination links
        $donations->appends($request->query());

        // Build status counts query with same filters
        $statusQuery = BookDonation::query();
        
        // Apply search filter to status counts
        if ($request->search) {
            $statusQuery->where(function($q) use ($request) {
                $q->where('donor_name', 'like', '%' . $request->search . '%')
                  ->orWhere('donor_email', 'like', '%' . $request->search . '%');
            });
        }

        // Apply date range filter to status counts
        if ($request->date_from) {
            $statusQuery->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $statusQuery->whereDate('created_at', '<=', $request->date_to);
        }

        $statusCounts = [
            'all' => (clone $statusQuery)->count(),
            'pending' => (clone $statusQuery)->where('status', 'pending')->count(),
            'approved' => (clone $statusQuery)->where('status', 'approved')->count(),
            'picked_up' => (clone $statusQuery)->where('status', 'picked_up')->count(),
            'completed' => (clone $statusQuery)->where('status', 'completed')->count(),
            'rejected' => (clone $statusQuery)->where('status', 'rejected')->count(),
        ];

        return view('admin.donations.index', compact('donations', 'statusCounts'));
    }

    /**
     * Show donation details for admin review
     */
    public function show(BookDonation $donation)
    {
        $donation->load('donor', 'verifier');
        return view('admin.donations.show', compact('donation'));
    }

    /**
     * Approve donation and create book records
     */
    public function approve(Request $request, BookDonation $donation)
    {
        $request->validate([
            'admin_notes' => 'nullable|string',
            'pickup_date' => 'nullable|date|after_or_equal:today',
        ]);

        DB::transaction(function () use ($donation, $request) {
            // Update donation status
            $donation->update([
                'status' => 'approved',
                'admin_notes' => $request->admin_notes,
                'verified_by' => Auth::id(),
                'verified_at' => now(),
            ]);

            // Create book records from donation data
            foreach ($donation->book_data as $bookData) {
                Book::create([
                    'donation_id' => $donation->id,
                    'title' => $bookData['title'],
                    'author' => $bookData['author'],
                    'isbn' => $bookData['isbn'] ?? null,
                    'description' => $bookData['description'] ?? null,
                    'category' => $bookData['category'],
                    'publisher' => $bookData['publisher'] ?? null,
                    'publication_year' => $bookData['publication_year'] ?? null,
                    'pages' => $bookData['pages'] ?? null,
                    'language' => $bookData['language'] ?? 'id',
                    'cover_image' => $bookData['cover'] ?? null, // Ambil cover dari book_data
                    'condition' => $bookData['condition'],
                    'status' => 'donated',
                    'donated_by' => $donation->donor_id,
                    'donated_at' => now(),
                ]);
            }
        });

        return redirect()->route('admin.donations.index')
                         ->with('success', 'Donasi berhasil disetujui dan buku-buku telah ditambahkan ke koleksi!');
    }

    /**
     * Reject donation
     */
    public function reject(Request $request, BookDonation $donation)
    {
        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $donation->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes ?? 'Donation rejected by admin',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
        ]);

        return redirect()->route('admin.donations.index')
                         ->with('success', 'Donasi telah ditolak.');
    }

    /**
     * Mark donation as picked up
     */
    public function markPickedUp(BookDonation $donation)
    {
        if ($donation->status !== 'approved') {
            return redirect()->back()->with('error', 'Donasi belum disetujui.');
        }

        $donation->update([
            'status' => 'picked_up',
            'picked_up_at' => now(),
        ]);

        return redirect()->route('admin.donations.index')
                         ->with('success', 'Donasi berhasil dijemput.');
    }

    /**
     * Complete donation process
     */
    public function complete(BookDonation $donation)
    {
        if (!in_array($donation->status, ['approved', 'picked_up'])) {
            return redirect()->back()->with('error', 'Donasi belum siap untuk diselesaikan.');
        }

        $donation->update([
            'status' => 'completed',
        ]);

        return redirect()->route('admin.donations.index')
                         ->with('success', 'Proses donasi berhasil diselesaikan.');
    }

    /**
     * Update admin notes for donation
     */
    public function updateNotes(Request $request, BookDonation $donation)
    {
        $request->validate([
            'notes' => 'nullable|string|max:1000',
        ]);

        $donation->update([
            'notes' => $request->notes,
        ]);

        return redirect()->back()
                         ->with('success', 'Catatan berhasil diperbarui.');
    }

    /**
     * Generate donation reports
     */
    public function reports(Request $request)
    {
        $startDate = $request->start_date ? \Carbon\Carbon::parse($request->start_date) : now()->startOfMonth();
        $endDate = $request->end_date ? \Carbon\Carbon::parse($request->end_date) : now()->endOfMonth();

        // Create copies for database queries to avoid modifying original objects
        $queryStartDate = $startDate->copy()->startOfDay();
        $queryEndDate = $endDate->copy()->endOfDay();

        $stats = [
            'total_donations' => BookDonation::whereBetween('created_at', [$queryStartDate, $queryEndDate])->count(),
            'pending_donations' => BookDonation::whereBetween('created_at', [$queryStartDate, $queryEndDate])->where('status', 'pending')->count(),
            'approved_donations' => BookDonation::whereBetween('created_at', [$queryStartDate, $queryEndDate])->where('status', 'approved')->count(),
            'completed_donations' => BookDonation::whereBetween('created_at', [$queryStartDate, $queryEndDate])->where('status', 'completed')->count(),
            'rejected_donations' => BookDonation::whereBetween('created_at', [$queryStartDate, $queryEndDate])->where('status', 'rejected')->count(),
            'total_books_donated' => BookDonation::whereBetween('created_at', [$queryStartDate, $queryEndDate])->whereIn('status', ['approved', 'picked_up', 'completed'])->sum('total_books'),
        ];

        // Monthly donation trends
        $monthlyData = BookDonation::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total, SUM(total_books) as books')
                                   ->whereBetween('created_at', [now()->subMonths(12), now()])
                                   ->groupBy('month')
                                   ->orderBy('month')
                                   ->get();

        // Top donors
        $topDonors = BookDonation::selectRaw('donor_name, COUNT(*) as donation_count, SUM(total_books) as total_books')
                                 ->whereBetween('created_at', [$queryStartDate, $queryEndDate])
                                 ->whereIn('status', ['approved', 'picked_up', 'completed'])
                                 ->groupBy('donor_name', 'donor_id')
                                 ->orderBy('total_books', 'desc')
                                 ->limit(10)
                                 ->get();

        // Category distribution
        $categoryStats = Book::selectRaw('category, COUNT(*) as count')
                             ->whereNotNull('donated_by')
                             ->whereBetween('donated_at', [$queryStartDate, $queryEndDate])
                             ->groupBy('category')
                             ->orderBy('count', 'desc')
                             ->get();

        return view('admin.donations.reports', compact('stats', 'monthlyData', 'topDonors', 'categoryStats', 'startDate', 'endDate'));
    }
}
