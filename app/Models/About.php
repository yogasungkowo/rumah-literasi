<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'main_title',
        'subtitle',
        'banner_image',
        'main_content',
        'vision_title',
        'vision_content',
        'mission_title',
        'mission_content',
    ];

    protected $casts = [
        'main_title' => 'string',
        'subtitle' => 'string',
        'banner_image' => 'string',
        'main_content' => 'string',
        'vision_title' => 'string',
        'vision_content' => 'string',
        'mission_title' => 'string',
        'mission_content' => 'string',
    ];

    /**
     * Get the organization members for this about page.
     */
    public function organizationMembers()
    {
        return $this->hasMany(OrganizationMember::class);
    }

    /**
     * Get the top-level organization members (those without parent).
     */
    public function topLevelMembers()
    {
        return $this->organizationMembers()->whereNull('parent_id')->orderBy('display_order');
    }
}
