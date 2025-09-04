<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'address',
        'organization',
        'profession',
        'bio',
        'birth_date',
        'gender',
        'status',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Get the user's avatar URL
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        
        // Default avatar based on gender or name initial
        $initial = strtoupper(substr($this->name, 0, 1));
        return "https://ui-avatars.com/api/?name={$initial}&background=7C3AED&color=ffffff&size=200";
    }

    /**
     * Get the user's role name
     */
    public function getRoleNameAttribute(): string
    {
        return $this->roles->first()?->name ?? 'publik';
    }

    /**
     * Check if user has specific role
     */
    public function isRole(string $role): bool
    {
        return $this->hasRole($role);
    }

    /**
     * Get dashboard URL based on user role
     */
    public function getDashboardUrlAttribute(): string
    {
        $role = $this->getRoleNameAttribute();
        
        return match($role) {
            'Admin' => route('dashboard.admin'),
            'Donatur Buku' => route('dashboard.donatur'),
            'Relawan' => route('dashboard.relawan'),
            'Peserta Pelatihan' => route('dashboard.peserta'),
            'Investor' => route('dashboard.investor'),
            default => route('dashboard.publik'),
        };
    }

    /**
     * Get investor profile relationship
     */
    public function investor()
    {
        return $this->hasOne(Investor::class);
    }

    /**
     * Get user's sponsorships
     */
    public function sponsorships()
    {
        return $this->hasMany(Sponsorship::class, 'sponsor_id');
    }
}
