<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use App\Models\Investor;
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

        // Sync company_name with user organization field
        $user->update(['organization' => $request->company_name]);

        return back()->with('success', 'Profil investor berhasil diperbarui!');
    }

    /**
     * Display public sponsorship page with real data
     */
    public function publicPage()
    {
        // Get active sponsorships for public display
        $activeSponsors = Sponsorship::whereIn('status', ['approved', 'active', 'completed'])
                                    ->with(['sponsor.investor'])
                                    ->latest()
                                    ->paginate(9);

        // Calculate statistics
        $totalFunding = Sponsorship::whereIn('status', ['approved', 'active', 'completed'])
                                  ->sum('amount');
        
        $stats = [
            'active_sponsors' => Sponsorship::whereIn('status', ['approved', 'active'])->distinct('sponsor_id')->count(),
            'total_funding' => $this->formatCurrency($totalFunding),
            'funded_programs' => Sponsorship::whereIn('status', ['approved', 'active', 'completed'])->count(),
            'beneficiaries' => $this->calculateBeneficiaries(),
        ];

        return view('pages.sponsorship', compact('activeSponsors', 'stats'));
    }

    /**
     * Format currency for display
     */
    private function formatCurrency($amount)
    {
        if ($amount >= 1000000000) {
            return number_format($amount / 1000000000, 1) . 'M';
        } elseif ($amount >= 1000000) {
            return number_format($amount / 1000000, 1) . 'Jt';
        } elseif ($amount >= 1000) {
            return number_format($amount / 1000, 0) . 'K';
        }
        
        return number_format($amount, 0);
    }

    /**
     * Calculate estimated beneficiaries based on funding
     */
    private function calculateBeneficiaries()
    {
        // Rough calculation: assume 1 beneficiary per 100,000 rupiah of funding
        $totalFunding = Sponsorship::whereIn('status', ['approved', 'active', 'completed'])
                                  ->sum('amount');
        
        return intval($totalFunding / 100000);
    }
}
