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
        $query = Training::query();

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

        // Filter by category
        if ($request->category) {
            $query->where('category', $request->category);
        }

        $trainings = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get filter data
        $categories = Training::distinct()->pluck('category')->filter();
        $statuses = Training::distinct()->pluck('status')->filter();

        return view('admin.trainings.index', compact('trainings', 'categories', 'statuses'));
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
            'category' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'registration_deadline' => 'required|date|before_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
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
        return view('admin.trainings.show', compact('training'));
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
            'category' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'registration_deadline' => 'required|date|before_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,ongoing,completed,cancelled',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
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
