<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingVolunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'user_id',
        'status',
        'motivation',
        'skills',
        'experience',
        'registered_at',
        'confirmed_at',
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    /**
     * Get the training that this volunteer registration belongs to
     */
    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    /**
     * Get the user (volunteer) for this registration
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
