<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of sponsorships
     */
    public function index(Request $request)
    {
        $query = Sponsorship::with('sponsor');

        // Search functionality
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('company_name', 'like', '%' . $request->search . '%')
                  ->orWhere('contact_person', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Filter by amount range
        if ($request->min_amount) {
            $query->where('amount', '>=', $request->min_amount);
        }
        if ($request->max_amount) {
            $query->where('amount', '<=', $request->max_amount);
        }

        $sponsorships = $query->orderBy('created_at', 'desc')->paginate(15);

        // Calculate statistics
        $stats = [
            'total' => Sponsorship::count(),
            'pending' => Sponsorship::where('status', 'pending')->count(),
            'approved' => Sponsorship::where('status', 'approved')->count(),
            'active' => Sponsorship::where('status', 'active')->count(),
            'completed' => Sponsorship::where('status', 'completed')->count(),
            'rejected' => Sponsorship::where('status', 'rejected')->count(),
            'total_amount' => Sponsorship::where('status', 'active')->sum('amount'),
        ];

        return view('admin.sponsorships.index', compact('sponsorships', 'stats'));
    }

    /**
     * Display the specified sponsorship
     */
    public function show(Sponsorship $sponsorship)
    {
        $sponsorship->load('sponsor');
        return view('admin.sponsorships.show', compact('sponsorship'));
    }

    /**
     * Approve sponsorship
     */
    public function approve(Request $request, Sponsorship $sponsorship)
    {
        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $sponsorship->update([
            'status' => 'approved',
            'admin_notes' => $request->admin_notes,
            'verified_by' => Auth::id(),
            'verified_at' => now(),
        ]);

        return redirect()->back()
                         ->with('success', 'Sponsorship berhasil disetujui!');
    }

    /**
     * Reject sponsorship
     */
    public function reject(Request $request, Sponsorship $sponsorship)
    {
        $request->validate([
            'rejection_reason' => 'required|string',
        ]);

        $sponsorship->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
            'verified_by' => Auth::id(),
            'verified_at' => now(),
        ]);

        return redirect()->back()
                         ->with('success', 'Sponsorship berhasil ditolak!');
    }

    /**
     * Activate sponsorship (mark as active/in progress)
     */
    public function activate(Request $request, Sponsorship $sponsorship)
    {
        if ($sponsorship->status !== 'approved') {
            return redirect()->back()
                             ->with('error', 'Hanya sponsorship yang sudah disetujui yang dapat diaktifkan!');
        }

        $sponsorship->update([
            'status' => 'active',
            'started_at' => now(),
        ]);

        return redirect()->back()
                         ->with('success', 'Sponsorship berhasil diaktifkan!');
    }

    /**
     * Complete sponsorship
     */
    public function complete(Request $request, Sponsorship $sponsorship)
    {
        if ($sponsorship->status !== 'active') {
            return redirect()->back()
                             ->with('error', 'Hanya sponsorship yang aktif yang dapat diselesaikan!');
        }

        $request->validate([
            'completion_notes' => 'nullable|string',
        ]);

        $sponsorship->update([
            'status' => 'completed',
            'completion_notes' => $request->completion_notes,
            'completed_at' => now(),
        ]);

        return redirect()->back()
                         ->with('success', 'Sponsorship berhasil diselesaikan!');
    }
}
