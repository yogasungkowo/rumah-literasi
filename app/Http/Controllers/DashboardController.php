<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
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

        // Load investor profile and sponsorships
        $user->load(['investor', 'sponsorships' => function($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('dashboard.investor', compact('user'));
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
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'organization' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date_format:d/m/Y',
            'gender' => 'nullable|in:male,female',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'name', 'email', 'phone', 'address', 'organization', 
            'profession', 'bio', 'gender'
        ]);

        // Convert birth_date from d/m/Y to Y-m-d format
        if ($request->birth_date) {
            $data['birth_date'] = Carbon::createFromFormat('d/m/Y', $request->birth_date)->format('Y-m-d');
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Check if email was changed before updating
        $emailChanged = $request->email !== $user->email;

        $user->update($data);

        // Provide appropriate success message
        $message = 'Profile berhasil diperbarui!';
        if ($emailChanged) {
            $message = 'Profile berhasil diperbarui! Email Anda telah diubah.';
        }

        return back()->with('success', $message);
    }

    /**
     * Update Password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required',
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'new_password.required' => 'Kata sandi baru wajib diisi.',
            'new_password.min' => 'Kata sandi baru minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'new_password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
        ]);

        $user = Auth::user();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Kata sandi saat ini tidak sesuai.'
            ])->withInput();
        }

        // Check if new password is different from current password
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors([
                'new_password' => 'Kata sandi baru harus berbeda dari kata sandi saat ini.'
            ])->withInput();
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Kata sandi berhasil diubah! Gunakan kata sandi baru untuk login selanjutnya.');
    }
}
