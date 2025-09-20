<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

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
     * Scope for active trainings (published or ongoing)
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['published', 'ongoing']);
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

    /**
     * Get the volunteers for this training
     */
    public function volunteers()
    {
        return $this->belongsToMany(User::class, 'training_volunteers')
                    ->withPivot(['status', 'motivation', 'skills', 'experience', 'registered_at', 'confirmed_at'])
                    ->withTimestamps();
    }

    /**
     * Get volunteer registrations
     */
    public function volunteerRegistrations()
    {
        return $this->hasMany(TrainingVolunteer::class);
    }

    /**
     * Check if a user has already registered as volunteer for this training
     */
    public function hasVolunteerRegistered($userId)
    {
        return $this->volunteers()->where('user_id', $userId)->exists();
    }

    /**
     * Get confirmed volunteers count
     */
    public function getConfirmedVolunteersCountAttribute()
    {
        return $this->volunteers()->wherePivot('status', 'confirmed')->count();
    }

    /**
     * Get participants relationship
     */
    public function participants()
    {
        return $this->hasMany(TrainingParticipant::class);
    }

    /**
     * Get approved participants
     */
    public function approvedParticipants()
    {
        return $this->participants()->where('status', 'approved');
    }

    /**
     * Check if a user has already registered as participant for this training
     */
    public function hasParticipantRegistered($userId)
    {
        return $this->participants()->where('user_id', $userId)->exists();
    }

    /**
     * Get participant registration for a user
     */
    public function getParticipantRegistration($userId)
    {
        return $this->participants()->where('user_id', $userId)->first();
    }

    /**
     * Get approved participants count
     */
    public function getApprovedParticipantsCountAttribute()
    {
        return $this->approvedParticipants()->count();
    }

    /**
     * Check if training is full
     */
    public function isFull()
    {
        return $this->approved_participants_count >= $this->max_participants;
    }

    /**
     * Get schedules as collection for easier handling in views
     */
    public function getSchedulesAttribute()
    {
        if (!$this->schedule || !is_array($this->schedule)) {
            // Return a collection with basic schedule info from start_date
            return collect([
                (object) [
                    'date' => $this->start_date,
                    'start_time' => $this->start_time?->format('H:i') ?? '09:00',
                    'end_time' => $this->end_time?->format('H:i') ?? '17:00',
                    'topic' => $this->title,
                    'location' => $this->location ?? 'TBA'
                ]
            ]);
        }

        return collect($this->schedule)->map(function ($item) {
            return (object) [
                'date' => isset($item['date']) ? \Carbon\Carbon::parse($item['date']) : $this->start_date,
                'start_time' => $item['start_time'] ?? '09:00',
                'end_time' => $item['end_time'] ?? '17:00',
                'topic' => $item['topic'] ?? $this->title,
                'location' => $item['location'] ?? $this->location ?? 'TBA'
            ];
        });
    }
}
