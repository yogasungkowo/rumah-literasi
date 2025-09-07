<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of trainings
     */
    public function index(Request $request)
    {
        $query = Training::with(['volunteers', 'volunteerRegistrations', 'participants']);

        // Search functionality
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $trainings = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get filter data
        $statuses = Training::distinct()->pluck('status')->filter();

        return view('admin.trainings.index', compact('trainings', 'statuses'));
    }

    /**
     * Show the form for creating a new training
     */
    public function create()
    {
        return view('admin.trainings.create');
    }

    /**
     * Store a newly created training
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_name' => 'required|string|max:255',
            'instructor_email' => 'nullable|email|max:255',
            'instructor_phone' => 'nullable|string|max:20',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'materials' => 'nullable|string',
            'schedule' => 'nullable|array',
            'schedule.*.date' => 'nullable|date',
            'schedule.*.theme' => 'nullable|string|max:255',
            // Support both formats: activities (new) and sessions (seeder)
            'schedule.*.activities' => 'nullable|array',
            'schedule.*.activities.*.time' => 'nullable|date_format:H:i',
            'schedule.*.activities.*.title' => 'nullable|string|max:255',
            'schedule.*.activities.*.description' => 'nullable|string|max:500',
            'schedule.*.sessions' => 'nullable|array',
            'schedule.*.sessions.*.time' => 'nullable|string|max:50',
            'schedule.*.sessions.*.topic' => 'nullable|string|max:255',
            'schedule.*.sessions.*.description' => 'nullable|string|max:500',
        ]);

        $trainingData = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('training-images', 'public');
            $trainingData['image'] = $imagePath;
        }

        Training::create($trainingData);

        return redirect()->route('admin.trainings.index')
                         ->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    /**
     * Display the specified training
     */
    public function show(Training $training)
    {
        // Load volunteer registrations with user data
        $volunteerRegistrations = $training->volunteerRegistrations()
            ->with(['user'])
            ->orderBy('status')
            ->orderBy('created_at', 'desc')
            ->get();

        // Load participant registrations with user data
        $participantRegistrations = $training->participants()
            ->with(['user'])
            ->orderBy('status')
            ->orderBy('created_at', 'desc')
            ->get();

        // Group volunteers by status
        $volunteersByStatus = $volunteerRegistrations->groupBy('status');
        
        // Group participants by status
        $participantsByStatus = $participantRegistrations->groupBy('status');

        return view('admin.trainings.show', compact('training', 'volunteerRegistrations', 'volunteersByStatus', 'participantRegistrations', 'participantsByStatus'));
    }

    /**
     * Approve volunteer registration
     */
    public function approveVolunteer(Training $training, $volunteerId)
    {
        $registration = $training->volunteerRegistrations()
            ->where('user_id', $volunteerId)
            ->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'Pendaftaran relawan tidak ditemukan.');
        }

        if ($registration->status !== 'registered') {
            return redirect()->back()->with('error', 'Pendaftaran relawan sudah diproses sebelumnya.');
        }

        $registration->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Relawan berhasil dikonfirmasi.');
    }

    /**
     * Reject volunteer registration
     */
    public function rejectVolunteer(Training $training, $volunteerId)
    {
        $registration = $training->volunteerRegistrations()
            ->where('user_id', $volunteerId)
            ->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'Pendaftaran relawan tidak ditemukan.');
        }

        if ($registration->status !== 'registered') {
            return redirect()->back()->with('error', 'Pendaftaran relawan sudah diproses sebelumnya.');
        }

        $registration->update([
            'status' => 'cancelled',
        ]);

        return redirect()->back()->with('success', 'Pendaftaran relawan berhasil ditolak.');
    }

    /**
     * Approve participant registration
     */
    public function approveParticipant(Training $training, $participantId)
    {
        $registration = $training->participants()
            ->where('user_id', $participantId)
            ->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'Pendaftaran peserta tidak ditemukan.');
        }

        if ($registration->status !== 'registered') {
            return redirect()->back()->with('error', 'Pendaftaran peserta sudah diproses sebelumnya.');
        }

        $registration->update([
            'status' => 'approved',
            'approved_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Pendaftaran peserta berhasil disetujui.');
    }

    /**
     * Reject participant registration
     */
    public function rejectParticipant(Training $training, $participantId)
    {
        $registration = $training->participants()
            ->where('user_id', $participantId)
            ->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'Pendaftaran peserta tidak ditemukan.');
        }

        if ($registration->status !== 'registered') {
            return redirect()->back()->with('error', 'Pendaftaran peserta sudah diproses sebelumnya.');
        }

        $registration->update([
            'status' => 'rejected',
            'rejected_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Pendaftaran peserta berhasil ditolak.');
    }

    /**
     * Show the form for editing the specified training
     */
    public function edit(Training $training)
    {
        return view('admin.trainings.edit', compact('training'));
    }

    /**
     * Update the specified training
     */
    public function update(Request $request, Training $training)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_name' => 'required|string|max:255',
            'instructor_email' => 'nullable|email|max:255',
            'instructor_phone' => 'nullable|string|max:20',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'materials' => 'nullable|string',
            'schedule' => 'nullable|array',
            'schedule.*.date' => 'nullable|date',
            'schedule.*.theme' => 'nullable|string|max:255',
            // Support both formats: activities (new) and sessions (seeder)
            'schedule.*.activities' => 'nullable|array',
            'schedule.*.activities.*.time' => 'nullable|date_format:H:i',
            'schedule.*.activities.*.title' => 'nullable|string|max:255',
            'schedule.*.activities.*.description' => 'nullable|string|max:500',
            'schedule.*.sessions' => 'nullable|array',
            'schedule.*.sessions.*.time' => 'nullable|string|max:50',
            'schedule.*.sessions.*.topic' => 'nullable|string|max:255',
            'schedule.*.sessions.*.description' => 'nullable|string|max:500',
        ]);

        $trainingData = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($training->image) {
                Storage::disk('public')->delete($training->image);
            }
            
            $image = $request->file('image');
            $imagePath = $image->store('training-images', 'public');
            $trainingData['image'] = $imagePath;
        }

        $training->update($trainingData);

        return redirect()->route('admin.trainings.show', $training)
                         ->with('success', 'Pelatihan berhasil diperbarui!');
    }

    /**
     * Remove the specified training from storage
     */
    public function destroy(Training $training)
    {
        // Delete image if exists
        if ($training->image) {
            Storage::disk('public')->delete($training->image);
        }

        $training->delete();

        return redirect()->route('admin.trainings.index')
                         ->with('success', 'Pelatihan berhasil dihapus!');
    }
}
