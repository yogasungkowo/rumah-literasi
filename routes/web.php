<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\SponsorshipController;

Route::get('/', function () {
    return view('pages.index');
})->name('welcome');

Route::get('/donasi', [DonasiController::class, 'index']);

Route::get('/pelatihan', function () {
    return view('pages.pelatihan');
});

Route::get('/sponsorship', [SponsorshipController::class, 'publicPage'])->name('sponsorship.public');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin')
        ->middleware('role:Admin');
    
    // Admin dashboard alias
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard')
        ->middleware('role:Admin');
    
    // User Dashboards
    Route::get('/dashboard/publik', [DashboardController::class, 'publik'])->name('dashboard.publik');
    Route::get('/dashboard/donatur', [DashboardController::class, 'donatur'])
        ->name('dashboard.donatur')
        ->middleware('role:Donatur Buku');
    Route::get('/dashboard/relawan', [DashboardController::class, 'relawan'])
        ->name('dashboard.relawan')
        ->middleware('role:Relawan');
    Route::get('/dashboard/peserta', [DashboardController::class, 'peserta'])
        ->name('dashboard.peserta')
        ->middleware('role:Peserta Pelatihan');
    Route::get('/dashboard/investor', [DashboardController::class, 'investor'])
        ->name('dashboard.investor')
        ->middleware('role:Investor');
    
    // Profile routes
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::put('/dashboard/profile', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
});

// Admin routes (protected by admin role)
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    // Book Management
    Route::get('/books', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [App\Http\Controllers\Admin\BookController::class, 'create'])->name('admin.books.create');
    Route::post('/books', [App\Http\Controllers\Admin\BookController::class, 'store'])->name('admin.books.store');
    Route::get('/books/{book}', [App\Http\Controllers\Admin\BookController::class, 'show'])->name('admin.books.show');
    Route::get('/books/{book}/edit', [App\Http\Controllers\Admin\BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/books/{book}', [App\Http\Controllers\Admin\BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/books/{book}', [App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('admin.books.destroy');

    // Training Management
    Route::get('/trainings', [App\Http\Controllers\TrainingController::class, 'index'])->name('admin.trainings.index');
    Route::get('/trainings/create', [App\Http\Controllers\TrainingController::class, 'create'])->name('admin.trainings.create');
    Route::post('/trainings', [App\Http\Controllers\TrainingController::class, 'store'])->name('admin.trainings.store');
    Route::get('/trainings/{training}', [App\Http\Controllers\TrainingController::class, 'show'])->name('admin.trainings.show');
    Route::get('/trainings/{training}/edit', [App\Http\Controllers\TrainingController::class, 'edit'])->name('admin.trainings.edit');
    Route::put('/trainings/{training}', [App\Http\Controllers\TrainingController::class, 'update'])->name('admin.trainings.update');
    Route::delete('/trainings/{training}', [App\Http\Controllers\TrainingController::class, 'destroy'])->name('admin.trainings.destroy');
    Route::post('/trainings/bulk-action', [App\Http\Controllers\TrainingController::class, 'bulkAction'])->name('admin.trainings.bulk-action');

    // Donation Management
    Route::get('/donations', [App\Http\Controllers\Admin\DonationController::class, 'index'])->name('admin.donations.index');
    Route::get('/donations/{donation}', [App\Http\Controllers\Admin\DonationController::class, 'show'])->name('admin.donations.show');
    Route::patch('/donations/{donation}/approve', [App\Http\Controllers\Admin\DonationController::class, 'approve'])->name('admin.donations.approve');
    Route::patch('/donations/{donation}/reject', [App\Http\Controllers\Admin\DonationController::class, 'reject'])->name('admin.donations.reject');
    Route::patch('/donations/{donation}/mark-picked-up', [App\Http\Controllers\Admin\DonationController::class, 'markPickedUp'])->name('admin.donations.mark-picked-up');
    Route::patch('/donations/{donation}/complete', [App\Http\Controllers\Admin\DonationController::class, 'complete'])->name('admin.donations.complete');
    Route::patch('/donations/{donation}/notes', [App\Http\Controllers\Admin\DonationController::class, 'updateNotes'])->name('admin.donations.notes');

    // Sponsorship Management
    Route::get('/sponsorships', [App\Http\Controllers\Admin\SponsorshipController::class, 'index'])->name('admin.sponsorships.index');
    Route::get('/sponsorships/{sponsorship}', [App\Http\Controllers\Admin\SponsorshipController::class, 'show'])->name('admin.sponsorships.show');
    Route::patch('/sponsorships/{sponsorship}/approve', [App\Http\Controllers\Admin\SponsorshipController::class, 'approve'])->name('admin.sponsorships.approve');
    Route::patch('/sponsorships/{sponsorship}/reject', [App\Http\Controllers\Admin\SponsorshipController::class, 'reject'])->name('admin.sponsorships.reject');
    Route::patch('/sponsorships/{sponsorship}/activate', [App\Http\Controllers\Admin\SponsorshipController::class, 'activate'])->name('admin.sponsorships.activate');
    Route::patch('/sponsorships/{sponsorship}/complete', [App\Http\Controllers\Admin\SponsorshipController::class, 'complete'])->name('admin.sponsorships.complete');

    // Reports
    Route::get('/reports/donations', [App\Http\Controllers\Admin\DonationController::class, 'reports'])->name('admin.donations.reports');

    // User Management
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::put('/users/{user}/role', [App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('admin.users.role');
});

// Donatur routes (protected by donatur role)
Route::middleware(['auth', 'role:Donatur Buku'])->group(function () {
    // Donation Management for Donatur
    Route::get('/donations/create', [App\Http\Controllers\DonationController::class, 'create'])->name('donations.create');
    Route::post('/donations', [App\Http\Controllers\DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations/history', [App\Http\Controllers\DonationController::class, 'history'])->name('donations.history');
    Route::get('/donations/{donation}', [App\Http\Controllers\DonationController::class, 'show'])->name('donations.show');
    Route::get('/donations/{donation}/books', [App\Http\Controllers\DonationController::class, 'getBooks'])->name('donations.books');
    Route::get('/donations/{donation}/edit', [App\Http\Controllers\DonationController::class, 'edit'])->name('donations.edit');
    Route::put('/donations/{donation}', [App\Http\Controllers\DonationController::class, 'update'])->name('donations.update');
    Route::patch('/donations/{donation}/cancel', [App\Http\Controllers\DonationController::class, 'cancel'])->name('donations.cancel');
});

// Investor routes (protected by investor role)
Route::middleware(['auth', 'role:Investor'])->group(function () {
    // Sponsorship Management for Investor
    Route::get('/sponsorships', [SponsorshipController::class, 'index'])->name('sponsorships.index');
    Route::get('/sponsorships/create', [SponsorshipController::class, 'create'])->name('sponsorships.create');
    Route::post('/sponsorships', [SponsorshipController::class, 'store'])->name('sponsorships.store');
    Route::get('/sponsorships/{sponsorship}', [SponsorshipController::class, 'show'])->name('sponsorships.show');
    Route::get('/sponsorships/{sponsorship}/edit', [SponsorshipController::class, 'edit'])->name('sponsorships.edit');
    Route::put('/sponsorships/{sponsorship}', [SponsorshipController::class, 'update'])->name('sponsorships.update');
    Route::put('/investor/profile', [SponsorshipController::class, 'updateProfile'])->name('investor.profile.update');
});
