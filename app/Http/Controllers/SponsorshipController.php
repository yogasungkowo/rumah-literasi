<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SponsorshipController extends Controller
{
    /**
     * Display investor's sponsorships
     */
    public function index()
    {
        $sponsorships = Sponsorship::where('sponsor_id', Auth::id())
                                  ->latest()
                                  ->paginate(10);

        return view('sponsorships.index', compact('sponsorships'));
    }

    /**
     * Show form to create new sponsorship
     */
    public function create()
    {
        return view('sponsorships.create');
    }

    /**
     * Store new sponsorship
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_email' => 'required|email|max:255',
            'company_address' => 'required|string',
            'website' => 'nullable|url|max:255',
            'sponsorship_type' => 'required|in:event,program,facility,general',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string',
            'benefits_requested' => 'nullable|array',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after:start_date',
            'proposal_file' => 'required|file|mimes:pdf|max:3072', // 3MB max (conservative)
            'company_profile' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:1024', // 1MB max (conservative)
        ], [
            'proposal_file.max' => 'File proposal tidak boleh lebih dari 3MB.',
            'proposal_file.mimes' => 'File proposal harus berformat PDF.',
            'company_profile.max' => 'File company profile tidak boleh lebih dari 1MB.',
            'company_profile.mimes' => 'File company profile harus berformat PDF, JPG, JPEG, atau PNG.',
        ]);

        $data = $request->all();
        $data['sponsor_id'] = Auth::id();

        // Handle proposal file upload
        if ($request->hasFile('proposal_file')) {
            $data['proposal_file'] = $request->file('proposal_file')->store('sponsorship/proposals', 'public');
        }

        // Handle company profile upload
        if ($request->hasFile('company_profile')) {
            $data['company_profile'] = $request->file('company_profile')->store('sponsorship/profiles', 'public');
        }

        Sponsorship::create($data);

        return redirect()->route('sponsorships.index')
                         ->with('success', 'Proposal sponsorship berhasil diajukan! Menunggu review admin.');
    }

    /**
     * Show sponsorship details
     */
    public function show(Sponsorship $sponsorship)
    {
        // Make sure user can only see their own sponsorships
        if ($sponsorship->sponsor_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('sponsorships.show', compact('sponsorship'));
    }

    /**
     * Edit sponsorship (only if pending)
     */
    public function edit(Sponsorship $sponsorship)
    {
        // Check if user owns this sponsorship
        if ($sponsorship->sponsor_id !== Auth::id()) {
            Log::warning('Access denied: User does not own sponsorship', [
                'user_id' => Auth::id(),
                'sponsor_id' => $sponsorship->sponsor_id
            ]);
            abort(403, 'Anda tidak memiliki akses untuk mengedit sponsorship ini.');
        }

        // Only allow editing if status is pending
        if ($sponsorship->status !== 'pending') {
            Log::warning('Access denied: Sponsorship status not pending', [
                'status' => $sponsorship->status
            ]);
            abort(403, 'Sponsorship ini tidak dapat diedit karena statusnya ' . $sponsorship->status);
        }

        return view('sponsorships.edit', compact('sponsorship'));
    }

    /**
     * Update sponsorship
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {
        // Only owner can update and only if pending
        if ($sponsorship->sponsor_id !== Auth::id() || $sponsorship->status !== 'pending') {
            abort(403, 'Unauthorized or sponsorship already processed');
        }

        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_email' => 'required|email|max:255',
            'company_address' => 'required|string',
            'website' => 'nullable|url|max:255',
            'sponsorship_type' => 'required|in:event,program,facility,general',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string',
            'benefits_requested' => 'nullable|array',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after:start_date',
            'proposal_file' => 'nullable|file|mimes:pdf|max:10240',
            'company_profile' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();

        // Handle proposal file upload
        if ($request->hasFile('proposal_file')) {
            // Delete old file
            if ($sponsorship->proposal_file) {
                Storage::disk('public')->delete($sponsorship->proposal_file);
            }
            $data['proposal_file'] = $request->file('proposal_file')->store('sponsorship/proposals', 'public');
        }

        // Handle company profile upload
        if ($request->hasFile('company_profile')) {
            // Delete old file
            if ($sponsorship->company_profile) {
                Storage::disk('public')->delete($sponsorship->company_profile);
            }
            $data['company_profile'] = $request->file('company_profile')->store('sponsorship/profiles', 'public');
        }

        $sponsorship->update($data);

        return redirect()->route('sponsorships.show', $sponsorship)
                         ->with('success', 'Proposal sponsorship berhasil diperbarui!');
    }

    /**
     * Update investor profile (image)
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'image_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();
        $data = ['company_name' => $request->company_name];

        // Handle profile image upload
        if ($request->hasFile('image_profile')) {
            // Delete old image if exists
            if ($user->investor && $user->investor->image_profile) {
                Storage::disk('public')->delete($user->investor->image_profile);
            }
            
            $data['image_profile'] = $request->file('image_profile')->store('investor/profiles', 'public');
        }

        // Create or update investor profile
        if ($user->investor) {
            $user->investor->update($data);
        } else {
            $user->investor()->create($data);
        }

        return back()->with('success', 'Profil investor berhasil diperbarui!');
    }

    /**
     * Display public sponsorship page with real data
     */
    public function publicPage()
    {
        // Get approved/active sponsorships for public display
        $featuredSponsorships = Sponsorship::whereIn('status', ['approved', 'active', 'completed'])
                                          ->with('sponsor')
                                          ->latest()
                                          ->limit(6)
                                          ->get();

        // Calculate statistics
        $stats = [
            'total_investors' => Sponsorship::distinct('sponsor_id')->count(),
            'total_investment' => Sponsorship::whereIn('status', ['approved', 'active', 'completed'])
                                            ->sum('amount'),
            'active_programs' => Sponsorship::where('status', 'active')->count(),
            'success_rate' => $this->calculateSuccessRate(),
        ];

        // Impact metrics (you can adjust these based on your actual data)
        $impact = [
            'books_distributed' => 10000, // This could come from another model/calculation
            'people_trained' => 5000,     // This could come from another model/calculation
            'regions_reached' => 50,      // This could come from another model/calculation
            'partner_institutions' => 200, // This could come from another model/calculation
        ];

        return view('pages.sponsorship', compact('featuredSponsorships', 'stats', 'impact'));
    }

    /**
     * Calculate success rate percentage
     */
    private function calculateSuccessRate()
    {
        $totalCompleted = Sponsorship::whereIn('status', ['completed', 'active'])->count();
        $totalProcessed = Sponsorship::whereNotIn('status', ['pending'])->count();
        
        if ($totalProcessed === 0) {
            return 98; // Default value if no data
        }
        
        return round(($totalCompleted / $totalProcessed) * 100);
    }
}
