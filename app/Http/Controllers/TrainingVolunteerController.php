<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingVolunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingVolunteerController extends Controller
{
    /**
     * Display list of available trainings for volunteers
     */
    public function index()
    {
        $trainings = Training::where('status', 'published')
                           ->where('start_date', '>', now())
                           ->latest('start_date')
                           ->paginate(12);

        return view('volunteer.trainings.index', compact('trainings'));
    }

    /**
     * Show training details for volunteers
     */
    public function show(Training $training)
    {
        $isRegistered = false;
        $userRegistration = null;

        if (Auth::check()) {
            $userRegistration = TrainingVolunteer::where('training_id', $training->id)
                                                ->where('user_id', Auth::id())
                                                ->first();
            $isRegistered = $userRegistration !== null;
        }

        return view('volunteer.trainings.show', compact('training', 'isRegistered', 'userRegistration'));
    }

    /**
     * Show registration form for volunteers
     */
    public function register(Training $training)
    {
        // Check if user is already registered
        if ($training->hasVolunteerRegistered(Auth::id())) {
            return redirect()->route('volunteer.trainings.show', $training)
                           ->with('error', 'Anda sudah terdaftar sebagai relawan untuk pelatihan ini.');
        }

        return view('volunteer.trainings.register', compact('training'));
    }

    /**
     * Store volunteer registration
     */
    public function store(Request $request, Training $training)
    {
        $request->validate([
            'motivation' => 'required|string|max:1000',
            'skills' => 'required|string|max:500',
            'experience' => 'nullable|string|max:500',
        ]);

        // Check if user is already registered
        if ($training->hasVolunteerRegistered(Auth::id())) {
            return redirect()->route('volunteer.trainings.show', $training)
                           ->with('error', 'Anda sudah terdaftar sebagai relawan untuk pelatihan ini.');
        }

        try {
            DB::beginTransaction();

            TrainingVolunteer::create([
                'training_id' => $training->id,
                'user_id' => Auth::id(),
                'motivation' => $request->motivation,
                'skills' => $request->skills,
                'experience' => $request->experience,
                'status' => 'registered',
                'registered_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('volunteer.trainings.show', $training)
                           ->with('success', 'Pendaftaran sebagai relawan berhasil! Menunggu konfirmasi dari admin.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                           ->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.')
                           ->withInput();
        }
    }

    /**
     * Cancel volunteer registration
     */
    public function cancel(Training $training)
    {
        $registration = TrainingVolunteer::where('training_id', $training->id)
                                       ->where('user_id', Auth::id())
                                       ->first();

        if (!$registration) {
            return redirect()->route('volunteer.trainings.show', $training)
                           ->with('error', 'Pendaftaran tidak ditemukan.');
        }

        if ($registration->status === 'confirmed') {
            return redirect()->route('volunteer.trainings.show', $training)
                           ->with('error', 'Tidak dapat membatalkan pendaftaran yang sudah dikonfirmasi.');
        }

        $registration->update(['status' => 'cancelled']);

        return redirect()->route('volunteer.trainings.show', $training)
                       ->with('success', 'Pendaftaran sebagai relawan berhasil dibatalkan.');
    }

    /**
     * Show volunteer's training registrations
     */
    public function myRegistrations()
    {
        $user = Auth::user();
        $registrations = $user->volunteerRegistrations()
                             ->with(['training', 'user'])
                             ->latest()
                             ->paginate(10);

        return view('volunteer.registrations.index', compact('registrations'));
    }
}
