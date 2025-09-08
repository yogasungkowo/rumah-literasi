<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('uploader')
            ->ordered()
            ->paginate(12);

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'general' => 'Umum',
            'donation' => 'Donasi Buku',
            'training' => 'Pelatihan',
            'workshop' => 'Workshop',
            'seminar' => 'Seminar',
            'community' => 'Komunitas',
        ];

        return view('admin.gallery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('gallery', $filename, 'public');
        }

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image_path' => $imagePath,
            'sort_order' => $request->sort_order ?? 0,
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load('uploader');
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $categories = [
            'general' => 'Umum',
            'donation' => 'Donasi Buku',
            'training' => 'Pelatihan',
            'workshop' => 'Workshop',
            'seminar' => 'Seminar',
            'community' => 'Komunitas',
        ];

        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'sort_order' => $request->sort_order ?? $gallery->sort_order,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            // Store new image
            $image = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $data['image_path'] = $image->storeAs('gallery', $filename, 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete image file
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil dihapus!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);

        $status = $gallery->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Foto galeri berhasil {$status}!");
    }
}