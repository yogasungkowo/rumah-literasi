<?php

namespace App\Http\Controllers;

use App\Models\BookDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    /**
     * Display donation form
     */
    public function create()
    {
        
        return view('donations.create');
    }

    /**
     * Store a new donation
     */
    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_phone' => 'required|string|max:20',
            'donor_email' => 'required|email|max:255',
            'donor_address' => 'required|string',
            'books' => 'required|array|min:1',
            'books.*.title' => 'required|string|max:255',
            'books.*.author' => 'required|string|max:255',
            'books.*.category' => 'required|string|max:100',
            'books.*.condition' => 'required|in:new,good,fair,poor',
            'books.*.cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'books.*.isbn' => 'nullable|string|max:20',
            'books.*.publisher' => 'nullable|string|max:255',
            'books.*.publication_year' => 'nullable|integer|min:1900|max:2030',
            'books.*.pages' => 'nullable|integer|min:1',
            'books.*.language' => 'nullable|string|max:50',
            'books.*.description' => 'nullable|string',
            'pickup_method' => 'required|in:pickup,delivery',
            'pickup_address' => 'required_if:pickup_method,delivery|nullable|string',
            'preferred_date' => 'nullable|date|after_or_equal:today',
            'preferred_time' => 'nullable|date_format:H:i',
            'notes' => 'nullable|string',
        ]);

        // Process book data with cover uploads
        $booksData = [];
        foreach ($request->books as $index => $book) {
            $bookData = $book;
            
            // Handle cover upload
            if ($request->hasFile("books.$index.cover")) {
                $cover = $request->file("books.$index.cover");
                $coverPath = $cover->store('book-covers', 'public');
                $bookData['cover'] = $coverPath;
            }
            
            $booksData[] = $bookData;
        }

        $donation = BookDonation::create([
            'donor_id' => Auth::id(),
            'donor_name' => $request->donor_name,
            'donor_phone' => $request->donor_phone,
            'donor_email' => $request->donor_email,
            'donor_address' => $request->donor_address,
            'book_data' => $booksData,
            'total_books' => count($booksData),
            'pickup_method' => $request->pickup_method,
            'pickup_address' => $request->pickup_address,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('donations.show', $donation)
                         ->with('success', 'Donasi buku berhasil diajukan! Menunggu verifikasi admin.');
    }

    /**
     * Display donation details
     */
    public function show(BookDonation $donation)
    {
        // Make sure user can only see their own donations (unless admin)
        if (!Auth::user()->hasRole('Admin') && $donation->donor_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('donations.show', compact('donation'));
    }

    /**
     * Get donation books for modal display
     */
    public function getBooks(BookDonation $donation)
    {
        // Make sure user can only see their own donations (unless admin)
        if (!Auth::user()->hasRole('Admin') && $donation->donor_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'donation' => [
                'id' => $donation->id,
                'created_at' => $donation->created_at,
                'status' => $donation->status,
                'total_books' => $donation->total_books,
                'book_data' => $donation->book_data ?? [],
                'donor_name' => $donation->donor_name,
                'pickup_method' => $donation->pickup_method,
                'pickup_address' => $donation->pickup_address,
                'preferred_date' => $donation->preferred_date,
                'preferred_time' => $donation->preferred_time,
                'notes' => $donation->notes,
            ]
        ]);
    }

    /**
     * Display donation history for current user
     */
    public function history()
    {
        $donations = BookDonation::where('donor_id', Auth::id())
                                 ->orderBy('created_at', 'desc')
                                 ->paginate(10);

        return view('donations.history', compact('donations'));
    }

    /**
     * Edit donation (only if pending)
     */
    public function edit(BookDonation $donation)
    {
        // Only donor can edit and only if pending
        if ($donation->donor_id !== Auth::id() || $donation->status !== 'pending') {
            abort(403, 'Unauthorized or donation already processed');
        }

        return view('donations.edit', compact('donation'));
    }

    /**
     * Update donation
     */
    public function update(Request $request, BookDonation $donation)
    {
        // Only donor can edit and only if pending
        if ($donation->donor_id !== Auth::id() || $donation->status !== 'pending') {
            abort(403, 'Unauthorized or donation already processed');
        }

        $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_phone' => 'required|string|max:20',
            'donor_email' => 'required|email|max:255',
            'donor_address' => 'required|string',
            'books' => 'required|array|min:1',
            'books.*.title' => 'required|string|max:255',
            'books.*.author' => 'required|string|max:255',
            'books.*.category' => 'required|string|max:100',
            'books.*.condition' => 'required|in:new,good,fair,poor',
            'books.*.cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'books.*.isbn' => 'nullable|string|max:20',
            'books.*.publisher' => 'nullable|string|max:255',
            'books.*.publication_year' => 'nullable|integer|min:1900|max:2030',
            'books.*.pages' => 'nullable|integer|min:1',
            'books.*.language' => 'nullable|string|max:50',
            'books.*.description' => 'nullable|string',
            'pickup_method' => 'required|in:pickup,delivery',
            'pickup_address' => 'required_if:pickup_method,delivery|nullable|string',
            'preferred_date' => 'nullable|date|after_or_equal:today',
            'preferred_time' => 'nullable|date_format:H:i',
            'notes' => 'nullable|string',
        ]);

        // Process book data with cover uploads
        $existingBooksData = $donation->book_data ?? [];
        $booksData = [];
        
        foreach ($request->books as $index => $book) {
            $bookData = $book;
            
            // Handle cover upload
            if ($request->hasFile("books.$index.cover")) {
                // Delete old cover if exists
                if (isset($existingBooksData[$index]['cover'])) {
                    Storage::disk('public')->delete($existingBooksData[$index]['cover']);
                }
                
                $cover = $request->file("books.$index.cover");
                $coverPath = $cover->store('book-covers', 'public');
                $bookData['cover'] = $coverPath;
            } else {
                // Keep existing cover if no new upload
                if (isset($existingBooksData[$index]['cover'])) {
                    $bookData['cover'] = $existingBooksData[$index]['cover'];
                }
            }
            
            $booksData[] = $bookData;
        }

        $donation->update([
            'donor_name' => $request->donor_name,
            'donor_phone' => $request->donor_phone,
            'donor_email' => $request->donor_email,
            'donor_address' => $request->donor_address,
            'book_data' => $booksData,
            'total_books' => count($booksData),
            'pickup_method' => $request->pickup_method,
            'pickup_address' => $request->pickup_address,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'notes' => $request->notes,
        ]);

        return redirect()->route('donations.show', $donation)
                         ->with('success', 'Donasi buku berhasil diperbarui!');
    }

    /**
     * Cancel donation (only if pending)
     */
    public function cancel(BookDonation $donation)
    {
        // Only donor can cancel and only if pending
        if ($donation->donor_id !== Auth::id() || $donation->status !== 'pending') {
            abort(403, 'Unauthorized or donation already processed');
        }

        $donation->update(['status' => 'cancelled']);

        return redirect()->route('donations.history')
                         ->with('success', 'Donasi buku berhasil dibatalkan.');
    }
}
