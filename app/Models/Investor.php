<?php

namespace App\Models;

use App\Models\Sponsorship;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $fillable = ['user_id', 'company_name', 'image_profile'];

    /**
     * Boot the model and set up event listeners
     */
    protected static function boot()
    {
        parent::boot();

        // Sync company_name with user organization when company_name is updated
        static::updated(function ($investor) {
            if ($investor->isDirty('company_name') && $investor->user) {
                $investor->user->update(['organization' => $investor->company_name]);
            }
        });

        // Sync company_name with user organization when creating new investor
        static::created(function ($investor) {
            if ($investor->user && $investor->company_name) {
                $investor->user->update(['organization' => $investor->company_name]);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sponsorships()
    {
        return $this->hasMany(Sponsorship::class);
    }

    /**
     * Get the investor's profile image URL
     */
    public function getImageProfileUrlAttribute(): string
    {
        if ($this->image_profile) {
            return asset('storage/' . $this->image_profile);
        }
        
        return "https://via.placeholder.com/200x200/7C3AED/ffffff?text=" . strtoupper(substr($this->company_name ?? 'C', 0, 2));
    }
}
