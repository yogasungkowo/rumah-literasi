<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;

class PelatihanController extends Controller
{
    /**
     * Display available trainings on public page
     */
    public function index()
    {
        // Get published trainings with their relationships
        $trainings = Training::with(['participants'])
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();

        // Check user authentication and role
        $userRole = null;
        $userRegistrations = collect();
        
        if (Auth::check()) {
            $user = Auth::user();
            
            // Get user's role
            if ($user->hasRole('Relawan')) {
                $userRole = 'volunteer';
            } elseif ($user->hasRole('Peserta Pelatihan')) {
                $userRole = 'participant';
                // Get user's training registrations
                $userRegistrations = $user->trainingParticipants()->get()->keyBy('training_id');
            }
        }

        return view('pages.pelatihan', compact('trainings', 'userRole', 'userRegistrations'));
    }
}
