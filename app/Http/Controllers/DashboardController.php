<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function admin()
    {
        $user = Auth::user();
        
        if (!$user->hasRole('Admin')) {
            abort(403, 'Unauthorized');
        }

        $stats = [
            'total_users' => User::count(),
            'total_books' => \App\Models\Book::count(),
            'pending_donations' => \App\Models\BookDonation::where('status', 'pending')->count(),
            'pending_sponsorships' => \App\Models\Sponsorship::where('status', 'pending')->count(),
            'total_donors' => User::whereHas('roles', function($q) { $q->where('name', 'Donatur Buku'); })->count(),
            'total_volunteers' => User::whereHas('roles', function($q) { $q->where('name', 'Relawan'); })->count(),
            'total_students' => User::whereHas('roles', function($q) { $q->where('name', 'Peserta Pelatihan'); })->count(),
            'total_investors' => User::whereHas('roles', function($q) { $q->where('name', 'Investor'); })->count(),
            'total_public' => User::whereHas('roles', function($q) { $q->where('name', 'Publik'); })->count(),
        ];

        // Get recent donations and sponsorships
        $recent_donations = \App\Models\BookDonation::with('donor')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recent_sponsorships = \App\Models\Sponsorship::with('sponsor')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get recent books
        $recent_books = \App\Models\Book::with(['donor', 'donation'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentUsers = User::latest()->take(5)->get();

        return view('dashboard.admin', compact('user', 'stats', 'recentUsers', 'recent_donations', 'recent_sponsorships', 'recent_books'));
    }

    /**
     * Public Dashboard
     */
    public function publik()
    {
        $user = Auth::user();
        
        $stats = [
            'reading_progress' => 75,
            'books_read' => 12,
            'events_attended' => 5,
            'certificates' => 2,
        ];

        return view('dashboard.publik', compact('user', 'stats'));
    }

    /**
     * Donatur Buku Dashboard
     */
    public function donatur()
    {
        $user = Auth::user();
        
        if (!$user->hasRole('Donatur Buku')) {
            abort(403, 'Unauthorized');
        }

        // Get donations for the current user
        $donations = \App\Models\BookDonation::where('donor_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_donated' => $donations->sum('total_books'),
            'books_distributed' => $donations->whereIn('status', ['completed'])->sum('total_books'),
            'schools_reached' => 25,
            'donation_value' => 15000000,
        ];

        return view('dashboard.donatur', compact('user', 'stats', 'donations'));
    }

    /**
     * Relawan Dashboard
     */
    public function relawan()
    {
        $user = Auth::user();
        
        if (!$user->hasRole('Relawan')) {
            abort(403, 'Unauthorized');
        }

        $stats = [
            'hours_contributed' => 120,
            'events_organized' => 8,
            'people_helped' => 200,
            'active_projects' => 3,
        ];

        return view('dashboard.relawan', compact('user', 'stats'));
    }

    /**
     * Peserta Pelatihan Dashboard
     */
    public function peserta()
    {
        $user = Auth::user();
        
        if (!$user->hasRole('Peserta Pelatihan')) {
            abort(403, 'Unauthorized');
        }

        $stats = [
            'courses_completed' => 5,
            'courses_in_progress' => 2,
            'certificates_earned' => 3,
            'study_hours' => 45,
        ];

        return view('dashboard.peserta', compact('user', 'stats'));
    }

    /**
     * Investor Dashboard
     */
    public function investor()
    {
        $user = Auth::user();
        
        if (!$user->hasRole('Investor')) {
            abort(403, 'Unauthorized');
        }

        $stats = [
            'total_investment' => 50000000,
            'active_projects' => 4,
            'roi_percentage' => 15.5,
            'people_impacted' => 1500,
        ];

        return view('dashboard.investor', compact('user', 'stats'));
    }

    /**
     * Profile Management
     */
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    /**
     * Update Profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'organization' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'name', 'phone', 'address', 'organization', 
            'profession', 'bio', 'birth_date', 'gender'
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return back()->with('success', 'Profile berhasil diperbarui!');
    }
}
