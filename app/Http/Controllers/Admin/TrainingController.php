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
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%')
                    ->orWhere('location', 'like', '%'.$request->search.'%');
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
            'certificate_template' => 'nullable|file|mimes:pdf|max:3072',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'materials' => 'nullable|string',
            'notes' => 'nullable|string',
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
        ], [
            'title.required' => 'Judul pelatihan wajib diisi.',
            'title.max' => 'Judul pelatihan maksimal 255 karakter.',
            'description.required' => 'Deskripsi pelatihan wajib diisi.',
            'instructor_name.required' => 'Nama instruktur wajib diisi.',
            'instructor_name.max' => 'Nama instruktur maksimal 255 karakter.',
            'instructor_email.email' => 'Format email instruktur tidak valid.',
            'instructor_email.max' => 'Email instruktur maksimal 255 karakter.',
            'instructor_phone.max' => 'Nomor telepon instruktur maksimal 20 karakter.',
            'max_participants.required' => 'Jumlah maksimal peserta wajib diisi.',
            'max_participants.integer' => 'Jumlah maksimal peserta harus berupa angka.',
            'max_participants.min' => 'Jumlah maksimal peserta minimal 1.',
            'price.required' => 'Harga pelatihan wajib diisi.',
            'price.numeric' => 'Harga pelatihan harus berupa angka.',
            'price.min' => 'Harga pelatihan tidak boleh negatif.',
            'location.required' => 'Lokasi pelatihan wajib diisi.',
            'location.max' => 'Lokasi pelatihan maksimal 255 karakter.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Format tanggal mulai tidak valid.',
            'start_date.after_or_equal' => 'Tanggal mulai tidak boleh kurang dari hari ini.',
            'end_date.required' => 'Tanggal selesai wajib diisi.',
            'end_date.date' => 'Format tanggal selesai tidak valid.',
            'end_date.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'certificate_template.file' => 'Template sertifikat harus berupa file.',
            'certificate_template.mimes' => 'Template sertifikat harus berformat PDF.',
            'certificate_template.max' => 'Ukuran template sertifikat maksimal 3MB.',
            'status.required' => 'Status pelatihan wajib diisi.',
            'status.in' => 'Status pelatihan tidak valid.',
            'schedule.array' => 'Format jadwal tidak valid.',
            'schedule.*.date.date' => 'Format tanggal jadwal tidak valid.',
            'schedule.*.theme.max' => 'Tema jadwal maksimal 255 karakter.',
            'schedule.*.activities.array' => 'Format aktivitas tidak valid.',
            'schedule.*.activities.*.time.date_format' => 'Format waktu aktivitas harus HH:MM.',
            'schedule.*.activities.*.title.max' => 'Judul aktivitas maksimal 255 karakter.',
            'schedule.*.activities.*.description.max' => 'Deskripsi aktivitas maksimal 500 karakter.',
            'schedule.*.sessions.array' => 'Format sesi tidak valid.',
            'schedule.*.sessions.*.time.max' => 'Waktu sesi maksimal 50 karakter.',
            'schedule.*.sessions.*.topic.max' => 'Topik sesi maksimal 255 karakter.',
            'schedule.*.sessions.*.description.max' => 'Deskripsi sesi maksimal 500 karakter.',
        ]);

        $trainingData = $request->except(['image', 'certificate_template']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('training-images', 'public');
            $trainingData['image'] = $imagePath;
        }

        // Handle certificate template upload
        if ($request->hasFile('certificate_template')) {
            $certificate = $request->file('certificate_template');
            $certificatePath = $certificate->store('certificate-templates', 'public');
            $trainingData['certificate_template'] = $certificatePath;
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

        if (! $registration) {
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

        if (! $registration) {
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

        if (! $registration) {
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

        if (! $registration) {
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
            'certificate_template' => 'nullable|file|mimes:pdf|max:3072',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'materials' => 'nullable|string',
            'notes' => 'nullable|string',
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
        ],
        [
            'title.required' => 'Judul pelatihan wajib diisi.',
            'title.max' => 'Judul pelatihan maksimal 255 karakter.',
            'description.required' => 'Deskripsi pelatihan wajib diisi.',
            'instructor_name.required' => 'Nama instruktur wajib diisi.',
            'instructor_name.max' => 'Nama instruktur maksimal 255 karakter.',
            'instructor_email.email' => 'Format email instruktur tidak valid.',
            'instructor_email.max' => 'Email instruktur maksimal 255 karakter.',
            'instructor_phone.max' => 'Nomor telepon instruktur maksimal 20 karakter.',
            'max_participants.required' => 'Jumlah maksimal peserta wajib diisi.',
            'max_participants.integer' => 'Jumlah maksimal peserta harus berupa angka.',
            'max_participants.min' => 'Jumlah maksimal peserta minimal 1.',
            'price.required' => 'Harga pelatihan wajib diisi.',
            'price.numeric' => 'Harga pelatihan harus berupa angka.',
            'price.min' => 'Harga pelatihan tidak boleh negatif.',
            'location.required' => 'Lokasi pelatihan wajib diisi.',
            'location.max' => 'Lokasi pelatihan maksimal 255 karakter.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Format tanggal mulai tidak valid.',
            'start_date.after_or_equal' => 'Tanggal mulai tidak boleh kurang dari hari ini.',
            'end_date.required' => 'Tanggal selesai wajib diisi.',
            'end_date.date' => 'Format tanggal selesai tidak valid.',
            'end_date.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'certificate_template.file' => 'Template sertifikat harus berupa file.',
            'certificate_template.mimes' => 'Template sertifikat harus berformat PDF.',
            'certificate_template.max' => 'Ukuran template sertifikat maksimal 3MB.',
            'status.required' => 'Status pelatihan wajib diisi.',
            'status.in' => 'Status pelatihan tidak valid.',
            'schedule.array' => 'Format jadwal tidak valid.',
            'schedule.*.date.date' => 'Format tanggal jadwal tidak valid.',
            'schedule.*.theme.max' => 'Tema jadwal maksimal 255 karakter.',
            'schedule.*.activities.array' => 'Format aktivitas tidak valid.',
            'schedule.*.activities.*.time.date_format' => 'Format waktu aktivitas harus HH:MM.',
            'schedule.*.activities.*.title.max' => 'Judul aktivitas maksimal 255 karakter.',
            'schedule.*.activities.*.description.max' => 'Deskripsi aktivitas maksimal 500 karakter.',
            'schedule.*.sessions.array' => 'Format sesi tidak valid.',
            'schedule.*.sessions.*.time.max' => 'Waktu sesi maksimal 50 karakter.',
            'schedule.*.sessions.*.topic.max' => 'Topik sesi maksimal 255 karakter.',
            'schedule.*.sessions.*.description.max' => 'Deskripsi sesi maksimal 500 karakter.',
        ]
    );

        $trainingData = $request->except(['image', 'certificate_template']);

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

        // Handle certificate template upload
        if ($request->hasFile('certificate_template')) {
            // Delete old certificate template if exists
            if ($training->certificate_template) {
                Storage::disk('public')->delete($training->certificate_template);
            }

            $certificate = $request->file('certificate_template');
            $certificatePath = $certificate->store('certificate-templates', 'public');
            $trainingData['certificate_template'] = $certificatePath;
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

        // Delete certificate template if exists
        if ($training->certificate_template) {
            Storage::disk('public')->delete($training->certificate_template);
        }

        $training->delete();

        return redirect()->route('admin.trainings.index')
            ->with('success', 'Pelatihan berhasil dihapus!');
    }
}
