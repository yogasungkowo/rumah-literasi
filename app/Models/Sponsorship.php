<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor_id',
        'company_name',
        'contact_person',
        'contact_phone',
        'contact_email',
        'company_address',
        'website',
        'sponsorship_type',
        'amount',
        'currency',
        'description',
        'benefits_requested',
        'start_date',
        'end_date',
        'proposal_file',
        'company_profile',
        'status',
        'admin_notes',
        'verified_by',
        'verified_at',
    ];

    protected $casts = [
        'sponsor_id' => 'integer',
        'verified_by' => 'integer',
        'benefits_requested' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'verified_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    /**
     * Get the sponsor user
     */
    public function sponsor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    /**
     * Get the admin who verified this sponsorship
     */
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * Get proposal file URL
     */
    public function getProposalUrlAttribute(): ?string
    {
        return $this->proposal_file ? asset('storage/' . $this->proposal_file) : null;
    }

    /**
     * Get company profile URL
     */
    public function getCompanyProfileUrlAttribute(): ?string
    {
        return $this->company_profile ? asset('storage/' . $this->company_profile) : null;
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Menunggu Review',
            'approved' => 'Disetujui',
            'active' => 'Aktif',
            'completed' => 'Selesai',
            'rejected' => 'Ditolak',
            default => 'Unknown'
        };
    }

    /**
     * Get sponsorship type label
     */
    public function getSponsorshipTypeLabelAttribute(): string
    {
        return match($this->sponsorship_type) {
            'event' => 'Event/Acara',
            'program' => 'Program Literasi',
            'facility' => 'Fasilitas',
            'general' => 'Umum',
            default => 'Unknown'
        };
    }

    /**
     * Get benefit label
     */
    public function getBenefitLabel(string $benefit): string
    {
        $labels = [
            'logo_placement' => 'Penempatan Logo',
            'social_media' => 'Promosi Media Sosial',
            'press_release' => 'Press Release',
            'event_participation' => 'Partisipasi Event',
            'branding_materials' => 'Materi Branding',
            'csr_report' => 'Laporan CSR'
        ];

        return $labels[$benefit] ?? $benefit;
    }

    /**
     * Scope for pending sponsorships
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for approved sponsorships
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope for active sponsorships
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for completed sponsorships
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope for rejected sponsorships
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
