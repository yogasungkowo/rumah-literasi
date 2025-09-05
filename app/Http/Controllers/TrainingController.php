<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Training::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('instructor_name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('start_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('end_date', '<=', $request->date_to);
        }

        // Sort functionality
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        $allowedSorts = ['title', 'start_date', 'created_at', 'current_participants', 'price'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        $trainings = $query->paginate(10)->withQueryString();

        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_name' => 'required|string|max:255',
            'instructor_email' => 'nullable|email|max:255',
            'instructor_phone' => 'nullable|string|max:20',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'materials' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

        try {
            $data = $request->except(['image']);

            // Handle image upload
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('trainings', 'public');
            }

            Training::create($data);

            return redirect()->route('admin.trainings.index')
                           ->with('success', 'Pelatihan berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error creating training: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menambahkan pelatihan.')
                        ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        return view('admin.trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('admin.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_name' => 'required|string|max:255',
            'instructor_email' => 'nullable|email|max:255',
            'instructor_phone' => 'nullable|string|max:20',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'materials' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

        try {
            $data = $request->except(['image']);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($training->image) {
                    Storage::disk('public')->delete($training->image);
                }
                $data['image'] = $request->file('image')->store('trainings', 'public');
            }

            $training->update($data);

            return redirect()->route('admin.trainings.index')
                           ->with('success', 'Pelatihan berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating training: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui pelatihan.')
                        ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        try {
            // Delete associated image
            if ($training->image) {
                Storage::disk('public')->delete($training->image);
            }

            $training->delete();

            return redirect()->route('admin.trainings.index')
                           ->with('success', 'Pelatihan berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting training: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus pelatihan.');
        }
    }

    /**
     * Bulk actions for trainings
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,publish,unpublish',
            'selected_trainings' => 'required|array|min:1',
            'selected_trainings.*' => 'exists:trainings,id'
        ]);

        try {
            $trainings = Training::whereIn('id', $request->selected_trainings);

            switch ($request->action) {
                case 'delete':
                    // Delete images for selected trainings
                    $trainingsToDelete = $trainings->get();
                    foreach ($trainingsToDelete as $training) {
                        if ($training->image) {
                            Storage::disk('public')->delete($training->image);
                        }
                    }
                    $count = $trainings->delete();
                    $message = "$count pelatihan berhasil dihapus!";
                    break;

                case 'publish':
                    $count = $trainings->update(['status' => 'published']);
                    $message = "$count pelatihan berhasil dipublikasi!";
                    break;

                case 'unpublish':
                    $count = $trainings->update(['status' => 'draft']);
                    $message = "$count pelatihan berhasil dijadikan draft!";
                    break;
            }

            return redirect()->route('admin.trainings.index')->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Error in bulk action: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat melakukan aksi bulk.');
        }
    }
}
