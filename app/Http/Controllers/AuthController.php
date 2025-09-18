<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ], [
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $loginMethod = $request->input('login_method', 'email');
        if ($loginMethod === 'phone') {
            $validator->addRules([
                'phone' => 'required',
            ]);
        } else {
            $validator->addRules([
                'email' => 'required|email',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $remember = $request->filled('remember');
        $credentials = ['password' => $request->password];
        if ($loginMethod === 'phone') {
            $credentials['phone'] = $request->phone;
            $user = User::where('phone', $request->phone)->first();
        } else {
            $credentials['email'] = $request->email;
            $user = User::where('email', $request->email)->first();
        }

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $remember);
            $user->update(['last_login_at' => Carbon::now()]);
            $request->session()->regenerate();
            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors([
            $loginMethod === 'phone' ? 'phone' : 'email' => 'Data login tidak cocok atau belum terdaftar.'
        ])->withInput();
    }

    /**
     * Show registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        $registerMethod = $request->input('register_method', 'email');
        $rules = [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|in:donatur_buku,relawan,peserta_pelatihan,investor',
        ];
        if ($registerMethod === 'phone') {
            $rules['phone'] = 'required|string|max:20|unique:users';
            $rules['email'] = 'nullable|email|unique:users';
        } else {
            $rules['email'] = 'required|string|email|max:255|unique:users';
            $rules['phone'] = 'nullable|string|max:20|unique:users';
        }
        $rules['address'] = 'nullable|string';
        $rules['organization'] = 'nullable|string|max:255';

        $messages = [
            'name.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor HP wajib diisi',
            'phone.unique' => 'Nomor HP sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'user_type.required' => 'Tipe pengguna wajib dipilih',
            'user_type.in' => 'Tipe pengguna tidak valid',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'organization' => $request->organization,
            'status' => 'active',
            'last_login_at' => Carbon::now(),
        ]);

        $role = $this->mapUserTypeToRole($request->user_type);
        $user->assignRole($role);
        Auth::login($user);
        return $this->redirectBasedOnRole($user);
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil logout');
    }

    /**
     * Map user type to role
     */
    private function mapUserTypeToRole($userType)
    {
        $roleMap = [
            'donatur_buku' => 'Donatur Buku',
            'relawan' => 'Relawan',
            'peserta_pelatihan' => 'Peserta Pelatihan',
            'investor' => 'Investor',
        ];

        return $roleMap[$userType] ?? 'Donatur Buku';
    }

    /**
     * Redirect user based on their role
     */
    private function redirectBasedOnRole($user)
    {
        if ($user->hasRole('Admin')) {
            return redirect()->route('dashboard.admin')->with('success', 'Selamat datang, Admin!');
        } elseif ($user->hasRole('Investor')) {
            return redirect()->route('dashboard.investor')->with('success', 'Selamat datang di Dashboard Investor!');
        } elseif ($user->hasRole('Donatur Buku')) {
            return redirect()->route('dashboard.donatur')->with('success', 'Selamat datang di Dashboard Donatur!');
        } elseif ($user->hasRole('Relawan')) {
            return redirect()->route('dashboard.relawan')->with('success', 'Selamat datang di Dashboard Relawan!');
        } elseif ($user->hasRole('Peserta Pelatihan')) {
            return redirect()->route('dashboard.peserta')->with('success', 'Selamat datang di Dashboard Peserta!');
        } else {
            return redirect()->route('dashboard')->with('success', 'Selamat datang!');
        }
    }
}
