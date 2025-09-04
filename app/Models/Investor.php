<?php

namespace App\Models;

use App\Models\Sponsorship;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $fillable = ['user_id', 'company_name', 'image_profile'];

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
