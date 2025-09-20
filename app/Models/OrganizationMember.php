<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    protected $fillable = [
        'about_id',
        'parent_id',
        'name',
        'position',
        'photo_path',
        'bio',
        'linkedin_url',
        'instagram_url',
        'display_order',
    ];

    protected $casts = [
        'about_id' => 'integer',
        'parent_id' => 'integer',
        'name' => 'string',
        'position' => 'string',
        'photo_path' => 'string',
        'bio' => 'string',
        'linkedin_url' => 'string',
        'instagram_url' => 'string',
        'display_order' => 'integer',
    ];

    /**
     * Get the about page that owns this organization member.
     */
    public function about()
    {
        return $this->belongsTo(About::class);
    }

    /**
     * Get the parent organization member.
     */
    public function parent()
    {
        return $this->belongsTo(OrganizationMember::class, 'parent_id');
    }

    /**
     * Get the child organization members.
     */
    public function children()
    {
        return $this->hasMany(OrganizationMember::class, 'parent_id')->orderBy('display_order');
    }

}
