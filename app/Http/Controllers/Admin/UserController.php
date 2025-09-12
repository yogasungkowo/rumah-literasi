<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index(Request $request)
    {
        $query = User::with('roles');

        // Search functionality
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by role
        if ($request->role) {
            $query->role($request->role);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get roles for filter
        $roles = Role::all();

        // Calculate statistics
        $stats = [
            'total_users' => User::count(),
            'admin' => User::role('Admin')->count(),
            'donatur' => User::role('Donatur Buku')->count(),
            'relawan' => User::role('Relawan')->count(),
            'peserta' => User::role('Peserta Pelatihan')->count(),
            'investor' => User::role('Investor')->count(),
        ];

        return view('admin.users.index', compact('users', 'roles', 'stats'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $userData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Set email verification
        if ($request->verify_email) {
            $userData['email_verified_at'] = now();
        }

        $user = User::create($userData);

        // Assign roles
        if ($request->roles) {
            $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
            $user->syncRoles($roles);
        }

        return redirect()->route('admin.users.index')
                         ->with('success', 'User berhasil dibuat!');
    }

    /**
     * Display the specified user
     */
    public function show(User $user)
    {
        $user->load('roles');
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
        ];

        // Update password if provided
        if ($request->password) {
            $userData['password'] = bcrypt($request->password);
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $userData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Handle email verification
        if ($request->verify_email && !$user->email_verified_at) {
            $userData['email_verified_at'] = now();
        }

        $user->update($userData);

        // Update roles
        if ($request->has('roles')) {
            $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
            $user->syncRoles($roles);
        }

        return redirect()->route('admin.users.show', $user)
                         ->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified user from storage
     */
    public function destroy(User $user)
    {
        // Prevent deleting the last admin
        if ($user->hasRole('Admin')) {
            $adminCount = User::role('Admin')->count();
            if ($adminCount === 1) {
                return redirect()->back()
                                 ->with('error', 'Tidak dapat menghapus admin terakhir!');
            }
        }

        // Prevent users from deleting themselves
        if ($user->id === Auth::id()) {
            return redirect()->back()
                             ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        // Delete avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', "User {$userName} berhasil dihapus!");
    }

    /**
     * Update user role
     */
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        // Don't allow changing admin role if it's the only admin
        if ($user->hasRole('Admin')) {
            $adminCount = User::role('Admin')->count();
            if ($adminCount === 1 && $request->role !== 'Admin') {
                return redirect()->back()
                                 ->with('error', 'Tidak dapat mengubah role admin terakhir!');
            }
        }

        // Remove all current roles and assign new role
        $user->syncRoles([$request->role]);

        return redirect()->back()
                         ->with('success', 'Role pengguna berhasil diperbarui!');
    }

    /**
     * Toggle user status (active/inactive)
     */
    public function toggleStatus(User $user)
    {
        // Don't allow deactivating admin if it's the only admin
        if ($user->hasRole('Admin')) {
            $adminCount = User::role('Admin')->where('status', 'active')->count();
            if ($adminCount === 1 && $user->status === 'active') {
                return redirect()->back()
                                 ->with('error', 'Tidak dapat menonaktifkan admin terakhir!');
            }
        }

        $newStatus = $user->status === 'active' ? 'inactive' : 'active';
        $user->update(['status' => $newStatus]);

        $statusText = $newStatus === 'active' ? 'diaktifkan' : 'dinonaktifkan';
        
        return redirect()->back()
                         ->with('success', "Pengguna berhasil {$statusText}!");
    }
}
