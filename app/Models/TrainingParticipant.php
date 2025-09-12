<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'user_id',
        'status',
        'motivation',
        'expectations',
        'experience_level',
        'additional_info',
        'attendance',
        'certificate_score',
        'certificate_issued',
        'registered_at',
        'approved_at',
        'completed_at',
    ];

    protected $casts = [
        'training_id' => 'integer',
        'user_id' => 'integer',
        'attendance' => 'array',
        'certificate_score' => 'decimal:2',
        'certificate_issued' => 'boolean',
        'registered_at' => 'datetime',
        'approved_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Get the training that owns the participant.
     */
    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    /**
     * Get the user that owns the participant.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if participant is approved
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    /**
     * Check if participant is completed
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Check if certificate can be issued
     */
    public function canIssueCertificate(): bool
    {
        return $this->isCompleted() && !$this->certificate_issued;
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'registered' => 'yellow',
            'approved' => 'green',
            'rejected' => 'red',
            'cancelled' => 'gray',
            'completed' => 'blue',
            default => 'gray'
        };
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'registered' => 'Terdaftar',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            'cancelled' => 'Dibatalkan',
            'completed' => 'Selesai',
            default => 'Unknown'
        };
    }
}
