<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMedia = SocialMedia::ordered()->get();
        
        return view('admin.social-media.index', compact('socialMedia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $platforms = [
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'twitter' => 'Twitter/X',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok',
        ];

        return view('admin.social-media.create', compact('platforms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|unique:social_media,platform',
            'platform_name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'username' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        SocialMedia::create([
            'platform' => $request->platform,
            'platform_name' => $request->platform_name,
            'url' => $request->url,
            'username' => $request->username,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $social_medium)
    {
        return view('admin.social-media.show', compact('social_medium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $social_medium)
    {
        $platforms = [
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'twitter' => 'Twitter/X',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok',
        ];

        return view('admin.social-media.edit', compact('social_medium', 'platforms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $social_medium)
    {
        $request->validate([
            'url' => 'nullable|url|max:255',
            'username' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $social_medium->update([
            'url' => $request->url,
            'username' => $request->username,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? $social_medium->sort_order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $social_medium)
    {
        $social_medium->delete();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media berhasil dihapus!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(SocialMedia $social_medium)
    {
        $social_medium->update([
            'is_active' => !$social_medium->is_active
        ]);

        $status = $social_medium->is_active ? 'diaktifkan' : 'dinonaktifkan';
        
        return redirect()->back()
            ->with('success', "Social media berhasil {$status}!");
    }
}
