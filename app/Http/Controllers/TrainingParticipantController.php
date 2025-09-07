<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TrainingParticipantController extends Controller
{
    /**
     * Display available trainings for participants
     */
    public function index(Request $request)
    {
        $trainings = Training::with(['participants'])
            ->whereIn('status', ['published', 'ongoing'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // If AJAX request, return JSON data
        if ($request->wantsJson()) {
            $availableTrainings = $trainings->filter(function ($training) {
                // Check if user is not already registered (allow re-registration if cancelled)
                $userRegistration = $training->participants->where('user_id', Auth::id())->first();
                if ($userRegistration && $userRegistration->status !== 'cancelled') {
                    return false;
                }
                
                // Check if training is not full
                if ($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants) {
                    return false;
                }
                
                return $training->status === 'published';
            })->map(function ($training) {
                return [
                    'id' => $training->id,
                    'title' => $training->title,
                    'instructor_name' => $training->instructor_name,
                    'participants_count' => $training->participants->where('status', '!=', 'cancelled')->count(),
                    'max_participants' => $training->max_participants,
                    'description' => Str::limit(strip_tags($training->description), 100),
                    'image' => $training->image ? asset('storage/' . $training->image) : null,
                ];
            })->values();
            
            return response()->json(['trainings' => $availableTrainings]);
        }

        return view('participant.trainings.index', compact('trainings'));
    }

    /**
     * Show training detail for participants
     */
    public function show(Training $training)
    {
        $training->load(['participants']);
        
        return view('participant.trainings.show', compact('training'));
    }

    /**
     * Show registration form
     */
    public function create(Training $training)
    {
        // Check if training is available for registration
        if ($training->status !== 'published') {
            return redirect()->route('participant.trainings.index')
                ->with('error', 'Pelatihan ini tidak tersedia untuk pendaftaran.');
        }

        // Check start date if available
        if ($training->start_date && $training->start_date < now()) {
            return redirect()->route('participant.trainings.index')
                ->with('error', 'Pendaftaran pelatihan ini sudah ditutup.');
        }

        if ($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants) {
            return redirect()->route('participant.trainings.index')
                ->with('error', 'Pelatihan ini sudah penuh.');
        }

        // Check if user already registered (exclude cancelled)
        $existingRegistration = $training->participants->where('user_id', Auth::id())->first();
        if ($existingRegistration && $existingRegistration->status !== 'cancelled') {
            return redirect()->route('participant.trainings.show', $training)
                ->with('info', 'Anda sudah terdaftar untuk pelatihan ini.');
        }

        return view('participant.trainings.register', compact('training'));
    }

    /**
     * Store registration (with form data)
     */
    public function store(Request $request, Training $training)
    {
        $request->validate([
            'motivation' => 'required|string|max:1000',
            'expectations' => 'required|string|max:1000',
            'experience_level' => 'required|string|max:500',
            'additional_info' => 'nullable|string|max:500',
        ]);

        // Recheck availability
        if ($training->status !== 'published') {
            return redirect()->route('participant.trainings.index')
                ->with('error', 'Pelatihan ini tidak tersedia untuk pendaftaran.');
        }

        // Check start date if available
        if ($training->start_date && $training->start_date < now()) {
            return redirect()->route('participant.trainings.index')
                ->with('error', 'Pendaftaran pelatihan ini sudah ditutup.');
        }

        if ($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants) {
            return redirect()->route('participant.trainings.index')
                ->with('error', 'Pelatihan ini sudah penuh.');
        }

        // Check if user already registered (allow re-registration if cancelled)
        $existingRegistration = $training->participants->where('user_id', Auth::id())->first();
        if ($existingRegistration && $existingRegistration->status !== 'cancelled') {
            return redirect()->route('participant.trainings.show', $training)
                ->with('info', 'Anda sudah terdaftar untuk pelatihan ini.');
        }

        // If user has cancelled registration, update existing instead of creating new
        if ($existingRegistration && $existingRegistration->status === 'cancelled') {
            $existingRegistration->update([
                'motivation' => $request->motivation,
                'expectations' => $request->expectations,
                'experience_level' => $request->experience_level,
                'additional_info' => $request->additional_info,
                'status' => 'registered',
                'registered_at' => now(),
            ]);
            
            $successMessage = 'Pendaftaran ulang berhasil dikirim! Silakan tunggu konfirmasi dari administrator.';
        } else {
            // Create new registration
            TrainingParticipant::create([
                'training_id' => $training->id,
                'user_id' => Auth::id(),
                'motivation' => $request->motivation,
                'expectations' => $request->expectations,
                'experience_level' => $request->experience_level,
                'additional_info' => $request->additional_info,
                'status' => 'registered',
                'registered_at' => now(),
            ]);
            
            $successMessage = 'Pendaftaran berhasil dikirim! Silakan tunggu konfirmasi dari administrator.';
        }

        return redirect()->route('participant.trainings.show', $training)
            ->with('success', $successMessage);
    }

    /**
     * Quick register without form (direct registration)
     */
    public function register(Training $training)
    {
        // Check if training is available for registration
        if ($training->status !== 'published') {
            return redirect()->back()
                ->with('error', 'Pelatihan ini tidak tersedia untuk pendaftaran.');
        }

        // Check start date if available
        if ($training->start_date && $training->start_date < now()) {
            return redirect()->back()
                ->with('error', 'Pendaftaran pelatihan ini sudah ditutup.');
        }

        if ($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants) {
            return redirect()->back()
                ->with('error', 'Pelatihan ini sudah penuh.');
        }

        // Check if user already registered (allow re-registration if cancelled)
        $existingRegistration = $training->participants->where('user_id', Auth::id())->first();
        if ($existingRegistration && $existingRegistration->status !== 'cancelled') {
            return redirect()->route('participant.trainings.show', $training)
                ->with('info', 'Anda sudah terdaftar untuk pelatihan ini.');
        }

        // If user has cancelled registration, update existing instead of creating new
        if ($existingRegistration && $existingRegistration->status === 'cancelled') {
            $existingRegistration->update([
                'motivation' => 'Ingin meningkatkan kemampuan dan pengetahuan melalui pelatihan ini.',
                'expectations' => 'Dapat memperoleh ilmu dan keterampilan baru yang bermanfaat.',
                'experience_level' => 'beginner',
                'additional_info' => null,
                'status' => 'registered',
                'registered_at' => now(),
            ]);
            
            $successMessage = 'Pendaftaran ulang berhasil! Silakan tunggu konfirmasi dari administrator.';
        } else {
            // Create new registration with default values
            TrainingParticipant::create([
                'training_id' => $training->id,
                'user_id' => Auth::id(),
                'motivation' => 'Ingin meningkatkan kemampuan dan pengetahuan melalui pelatihan ini.',
                'expectations' => 'Dapat memperoleh ilmu dan keterampilan baru yang bermanfaat.',
                'experience_level' => 'beginner',
                'additional_info' => null,
                'status' => 'registered',
                'registered_at' => now(),
            ]);
            
            $successMessage = 'Pendaftaran berhasil! Silakan tunggu konfirmasi dari administrator.';
        }

        return redirect()->route('participant.trainings.show', $training)
            ->with('success', $successMessage);
    }

    /**
     * Cancel registration
     */
    public function cancel(TrainingParticipant $registration)
    {
        // Check if user owns this registration
        if ($registration->user_id !== Auth::id()) {
            return redirect()->route('participant.registrations.index')
                ->with('error', 'Anda tidak memiliki akses untuk membatalkan pendaftaran ini.');
        }

        // Only allow cancellation for registered registrations
        if ($registration->status !== 'registered') {
            return redirect()->route('participant.registrations.index')
                ->with('error', 'Hanya pendaftaran dengan status terdaftar yang dapat dibatalkan.');
        }

        $registration->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        return redirect()->route('participant.registrations.index')
            ->with('success', 'Pendaftaran berhasil dibatalkan.');
    }

    /**
     * Show user's registrations
     */
    public function myRegistrations()
    {
        $registrations = TrainingParticipant::with(['training'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('participant.registrations.index', compact('registrations'));
    }

    /**
     * Show specific registration detail
     */
    public function showRegistration(TrainingParticipant $registration)
    {
        // Check if user owns this registration
        if ($registration->user_id !== Auth::id()) {
            return redirect()->route('participant.registrations.index')
                ->with('error', 'Anda tidak memiliki akses ke pendaftaran ini.');
        }

        $registration->load(['training']);

        return view('participant.registrations.show', compact('registration'));
    }
}
