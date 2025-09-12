<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'donor_name',
        'donor_phone',
        'donor_email',
        'donor_address',
        'book_data',
        'total_books',
        'notes',
        'pickup_method',
        'pickup_address',
        'delivery_address',
        'preferred_date',
        'preferred_time',
        'status',
        'admin_notes',
        'verified_by',
        'verified_at',
        'picked_up_at',
    ];

    protected $casts = [
        'donor_id' => 'integer',
        'verified_by' => 'integer',
        'total_books' => 'integer',
        'book_data' => 'array',
        'preferred_date' => 'date',
        'verified_at' => 'datetime',
        'picked_up_at' => 'datetime',
    ];

    /**
     * Get the donor user
     */
    public function donor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'donor_id');
    }

    /**
     * Get the admin who verified this donation
     */
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * Get the books that were created from this donation
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'donation_id');
    }

    /**
     * Scope for pending donations
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for approved donations
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope for completed donations
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}