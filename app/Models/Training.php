<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'instructor_name',
        'instructor_email',
        'instructor_phone',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'location',
        'max_participants',
        'current_participants',
        'price',
        'status',
        'requirements',
        'materials',
        'certificate_template',
        'image',
        'schedule',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'price' => 'decimal:2',
        'schedule' => 'array',
    ];

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        return "https://via.placeholder.com/400x300/7C3AED/ffffff?text=" . urlencode(substr($this->title, 0, 2));
    }

    /**
     * Get the certificate template URL
     */
    public function getCertificateTemplateUrlAttribute(): ?string
    {
        if ($this->certificate_template) {
            return asset('storage/' . $this->certificate_template);
        }
        
        return null;
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'draft' => 'Draft',
            'published' => 'Dipublikasi',
            'ongoing' => 'Sedang Berlangsung',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
            default => 'Unknown'
        };
    }

    /**
     * Get status color
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'draft' => 'gray',
            'published' => 'blue',
            'ongoing' => 'green',
            'completed' => 'purple',
            'cancelled' => 'red',
            default => 'gray'
        };
    }

    /**
     * Check if training is full
     */
    public function getIsFullAttribute(): bool
    {
        return $this->current_participants >= $this->max_participants;
    }

    /**
     * Get available slots
     */
    public function getAvailableSlotsAttribute(): int
    {
        return max(0, $this->max_participants - $this->current_participants);
    }

    /**
     * Scope for published trainings
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope for ongoing trainings
     */
    public function scopeOngoing($query)
    {
        return $query->where('status', 'ongoing');
    }

    /**
     * Scope for upcoming trainings
     */
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now())
                    ->whereIn('status', ['published', 'ongoing']);
    }
}
