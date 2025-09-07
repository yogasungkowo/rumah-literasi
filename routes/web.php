<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\TrainingVolunteerController;
use App\Http\Controllers\TrainingParticipantController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\TrainingController as AdminTrainingController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\Admin\SponsorshipController as AdminSponsorshipController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// Public routes
Route::get('/', function () {
    return view('pages.index');
})->name('welcome');

Route::get('/donasi', [DonasiController::class, 'index']);
Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan');
Route::get('/sponsorship', [SponsorshipController::class, 'publicPage'])->name('sponsorship.public');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes (protected by auth middleware)
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    // Admin Dashboard
    Route::get('/admin', [DashboardController::class, 'admin'])
        ->name('admin')
        ->middleware('role:Admin');
    
    // User Dashboards
    Route::get('/donatur', [DashboardController::class, 'donatur'])
        ->name('donatur')
        ->middleware('role:Donatur Buku');
    Route::get('/relawan', [DashboardController::class, 'relawan'])
        ->name('relawan')
        ->middleware('role:Relawan');
    Route::get('/peserta', [DashboardController::class, 'peserta'])
        ->name('peserta')
        ->middleware('role:Peserta Pelatihan');
    Route::get('/investor', [DashboardController::class, 'investor'])
        ->name('investor')
        ->middleware('role:Investor');
    
    // Profile routes
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [DashboardController::class, 'updatePassword'])->name('password.update');
});

// Admin dashboard alias
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
});

// Admin routes (protected by admin role)
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    // Book Management
    Route::resource('books', AdminBookController::class);

    // Training Management
    Route::resource('trainings', AdminTrainingController::class);
    Route::post('/trainings/bulk-action', [AdminTrainingController::class, 'bulkAction'])->name('trainings.bulk-action');
    
    // Training Volunteer Management
    Route::patch('/trainings/{training}/volunteers/{user}/approve', [AdminTrainingController::class, 'approveVolunteer'])->name('trainings.volunteers.approve');
    Route::patch('/trainings/{training}/volunteers/{user}/reject', [AdminTrainingController::class, 'rejectVolunteer'])->name('trainings.volunteers.reject');

    // Training Participant Management
    Route::patch('/trainings/{training}/participants/{user}/approve', [AdminTrainingController::class, 'approveParticipant'])->name('trainings.participants.approve');
    Route::patch('/trainings/{training}/participants/{user}/reject', [AdminTrainingController::class, 'rejectParticipant'])->name('trainings.participants.reject');

    // Donation Management
    Route::get('/donations', [AdminDonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/{donation}', [AdminDonationController::class, 'show'])->name('donations.show');
    Route::patch('/donations/{donation}/approve', [AdminDonationController::class, 'approve'])->name('donations.approve');
    Route::patch('/donations/{donation}/reject', [AdminDonationController::class, 'reject'])->name('donations.reject');
    Route::patch('/donations/{donation}/mark-picked-up', [AdminDonationController::class, 'markPickedUp'])->name('donations.mark-picked-up');
    Route::patch('/donations/{donation}/complete', [AdminDonationController::class, 'complete'])->name('donations.complete');
    Route::patch('/donations/{donation}/notes', [AdminDonationController::class, 'updateNotes'])->name('donations.notes');

    // Sponsorship Management
    Route::get('/sponsorships', [AdminSponsorshipController::class, 'index'])->name('sponsorships.index');
    Route::get('/sponsorships/{sponsorship}', [AdminSponsorshipController::class, 'show'])->name('sponsorships.show');
    Route::patch('/sponsorships/{sponsorship}/approve', [AdminSponsorshipController::class, 'approve'])->name('sponsorships.approve');
    Route::patch('/sponsorships/{sponsorship}/reject', [AdminSponsorshipController::class, 'reject'])->name('sponsorships.reject');
    Route::patch('/sponsorships/{sponsorship}/activate', [AdminSponsorshipController::class, 'activate'])->name('sponsorships.activate');
    Route::patch('/sponsorships/{sponsorship}/complete', [AdminSponsorshipController::class, 'complete'])->name('sponsorships.complete');

    // Reports
    Route::get('/reports/donations', [AdminDonationController::class, 'reports'])->name('donations.reports');

    // User Management
    Route::resource('users', AdminUserController::class);
    Route::put('/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('users.role');
});

// Donatur routes (protected by donatur role)
Route::middleware(['auth', 'role:Donatur Buku'])->prefix('donations')->name('donations.')->group(function () {
    Route::get('/create', [DonationController::class, 'create'])->name('create');
    Route::post('/', [DonationController::class, 'store'])->name('store');
    Route::get('/history', [DonationController::class, 'history'])->name('history');
    Route::get('/{donation}', [DonationController::class, 'show'])->name('show');
    Route::get('/{donation}/books', [DonationController::class, 'getBooks'])->name('books');
    Route::get('/{donation}/edit', [DonationController::class, 'edit'])->name('edit');
    Route::put('/{donation}', [DonationController::class, 'update'])->name('update');
    Route::patch('/{donation}/cancel', [DonationController::class, 'cancel'])->name('cancel');
});

// Investor routes (protected by investor role)
Route::middleware(['auth', 'role:Investor'])->prefix('sponsorships')->name('sponsorships.')->group(function () {
    Route::get('/', [SponsorshipController::class, 'index'])->name('index');
    Route::get('/create', [SponsorshipController::class, 'create'])->name('create');
    Route::post('/', [SponsorshipController::class, 'store'])->name('store');
    Route::get('/{sponsorship}', [SponsorshipController::class, 'show'])->name('show');
    Route::get('/{sponsorship}/edit', [SponsorshipController::class, 'edit'])->name('edit');
    Route::put('/{sponsorship}', [SponsorshipController::class, 'update'])->name('update');
});

Route::middleware(['auth', 'role:Investor'])->group(function () {
    Route::put('/investor/profile', [SponsorshipController::class, 'updateProfile'])->name('investor.profile.update');
});

// Volunteer routes (protected by relawan role)
Route::middleware(['auth', 'role:Relawan'])->prefix('volunteer')->name('volunteer.')->group(function () {
    Route::get('/trainings', [TrainingVolunteerController::class, 'index'])->name('trainings.index');
    Route::get('/trainings/{training}', [TrainingVolunteerController::class, 'show'])->name('trainings.show');
    Route::get('/trainings/{training}/register', [TrainingVolunteerController::class, 'register'])->name('trainings.register');
    Route::post('/trainings/{training}/register', [TrainingVolunteerController::class, 'store'])->name('trainings.store');
    Route::patch('/trainings/{training}/cancel', [TrainingVolunteerController::class, 'cancel'])->name('trainings.cancel');
    Route::get('/trainings/my-registrations', [TrainingVolunteerController::class, 'myRegistrations'])->name('trainings.my-registrations');
    Route::get('/registrations', [TrainingVolunteerController::class, 'myRegistrations'])->name('registrations.index');
});

// Participant Training Routes (Peserta Pelatihan role)
Route::middleware(['auth', 'role:Peserta Pelatihan'])->prefix('participant')->name('participant.')->group(function () {
    Route::get('/trainings', [TrainingParticipantController::class, 'index'])->name('trainings.index');
    Route::get('/trainings/{training}', [TrainingParticipantController::class, 'show'])->name('trainings.show');
    // Form pendaftaran lengkap (GET)
    Route::get('/trainings/{training}/register/form', [TrainingParticipantController::class, 'create'])->name('trainings.register.form');
    // Submit form pendaftaran lengkap (POST)
    Route::post('/trainings/{training}/register/form', [TrainingParticipantController::class, 'store'])->name('trainings.store');
    // Quick register (POST) - modal
    Route::post('/trainings/{training}/register', [TrainingParticipantController::class, 'register'])->name('trainings.register');
    Route::get('/registrations', [TrainingParticipantController::class, 'myRegistrations'])->name('registrations.index');
    Route::get('/registrations/{registration}', [TrainingParticipantController::class, 'showRegistration'])->name('registrations.show');
    Route::put('/registrations/{registration}/cancel', [TrainingParticipantController::class, 'cancel'])->name('registrations.cancel');
});

// Profile management routes (for all authenticated users)
Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [DashboardController::class, 'profile'])->name('index');
    Route::put('/update', [DashboardController::class, 'updateProfile'])->name('update');
    Route::put('/email', [DashboardController::class, 'updateEmail'])->name('email.update');
    Route::put('/password', [DashboardController::class, 'updatePassword'])->name('password.update');
});
