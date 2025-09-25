<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\OrganizationMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Since there's only one about record, get the first one or create if doesn't exist
        $about = About::with(['organizationMembers' => function ($query) {
            $query->whereNull('parent_id')->with('children')->orderBy('display_order');
        }])->first();

        if (! $about) {
            $about = About::create([
                'main_title' => 'Tentang Rumah Literasi Ranggi',
                'subtitle' => 'Mendorong literasi dan pendidikan untuk masyarakat yang lebih baik',
                'main_content' => 'Rumah Literasi Ranggi adalah organisasi yang berkomitmen untuk meningkatkan literasi dan pendidikan di masyarakat.',
                'vision_title' => 'Visi Kami',
                'vision_content' => 'Menjadi pusat literasi terdepan yang mampu memberikan dampak positif bagi masyarakat.',
                'mission_title' => 'Misi Kami',
                'mission_content' => '1. Menyediakan akses literasi yang mudah dan terjangkau 2. Mengembangkan program pendidikan berkualitas 3. Mendorong partisipasi masyarakat dalam kegiatan literasi',
            ]);
        }

        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::with(['organizationMembers' => function ($query) {
            $query->orderBy('display_order');
        }])->findOrFail($id);

        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);

        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'main_content' => 'required|string',
            'vision_title' => 'required|string|max:255',
            'vision_content' => 'required|string',
            'mission_title' => 'required|string|max:255',
            'mission_content' => 'required|string',
        ],
            [
                'main_title.required' => 'Judul utama wajib diisi.',
                'main_title.max' => 'Judul utama maksimal 255 karakter.',
                'subtitle.required' => 'Subjudul wajib diisi.',
                'subtitle.max' => 'Subjudul maksimal 500 karakter.',
                'banner_image.image' => 'File harus berupa gambar.',
                'banner_image.mimes' => 'Gambar harus berformat jpeg, png, jpg, atau gif.',
                'banner_image.max' => 'Ukuran gambar maksimal 2MB.',
                'main_content.required' => 'Konten utama wajib diisi.',
                'vision_title.required' => 'Judul visi wajib diisi.',
                'vision_title.max' => 'Judul visi maksimal 255 karakter.',
                'vision_content.required' => 'Konten visi wajib diisi.',
                'mission_title.required' => 'Judul misi wajib diisi.',
                'mission_title.max' => 'Judul misi maksimal 255 karakter.',
                'mission_content.required' => 'Konten misi wajib diisi.',
            ]);

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            // Delete old image if exists
            if ($about->banner_image && Storage::disk('public')->exists($about->banner_image)) {
                Storage::disk('public')->delete($about->banner_image);
            }

            $validated['banner_image'] = $request->file('banner_image')->store('about', 'public');
        }

        $about->update($validated);

        return redirect()->route('admin.about.index')->with('success', 'Data tentang berhasil diperbarui!');
    }

    /**
     * Store a new organization member.
     */
    public function storeMember(Request $request, string $aboutId)
    {
        $about = About::findOrFail($aboutId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:organization_members,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $dataToCreate = $validated;
        unset($dataToCreate['photo']);

        if ($request->hasFile('photo')) {
            $dataToCreate['photo_path'] = $request->file('photo')->store('organization-members', 'public');
        }

        $dataToCreate['about_id'] = $about->id;

        $newMember = OrganizationMember::create($dataToCreate);

        $newMember->photo_url = $newMember->photo_path ? asset('storage/'.$newMember->photo_path) : null;

        return response()->json([
            'success' => true,
            'message' => 'Anggota organisasi berhasil ditambahkan!',
            'member' => $newMember,
        ]);
    }

    /**
     * Update an organization member.
     */
    public function updateMember(Request $request, string $aboutId, string $memberId)
    {
        $about = About::findOrFail($aboutId);
        $member = OrganizationMember::where('about_id', $about->id)->findOrFail($memberId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:organization_members,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Buat salinan data yang divalidasi
        $dataToUpdate = $validated;

        // Hapus key 'photo'
        unset($dataToUpdate['photo']);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($member->photo_path && Storage::disk('public')->exists($member->photo_path)) {
                Storage::disk('public')->delete($member->photo_path);
            }
            // Simpan path ke key 'photo_path'
            $dataToUpdate['photo_path'] = $request->file('photo')->store('organization-members', 'public');
        }

        $member->update($dataToUpdate);

        return redirect()->back()->with('success', 'Anggota organisasi berhasil diperbarui!');
    }

    /**
     * Delete an organization member.
     */
    public function deleteMember(string $aboutId, string $memberId)
    {
        $about = About::findOrFail($aboutId);
        $member = OrganizationMember::where('about_id', $about->id)->findOrFail($memberId);

        // Delete photo if exists
        if ($member->photo_path && Storage::disk('public')->exists($member->photo_path)) {
            Storage::disk('public')->delete($member->photo_path);
        }

        $member->delete();

        return redirect()->back()->with('success', 'Anggota organisasi berhasil dihapus!');
    }
}
