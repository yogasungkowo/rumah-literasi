<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMediaPlatforms = [
            [
                'platform' => 'facebook',
                'platform_name' => 'Facebook',
                'url' => null,
                'username' => null,
                'icon' => 'fab fa-facebook-f',
                'is_active' => false,
                'sort_order' => 1,
            ],
            [
                'platform' => 'instagram',
                'platform_name' => 'Instagram',
                'url' => null,
                'username' => null,
                'icon' => 'fab fa-instagram',
                'is_active' => false,
                'sort_order' => 2,
            ],
            [
                'platform' => 'linkedin',
                'platform_name' => 'LinkedIn',
                'url' => null,
                'username' => null,
                'icon' => 'fab fa-linkedin-in',
                'is_active' => false,
                'sort_order' => 3,
            ],
            [
                'platform' => 'twitter',
                'platform_name' => 'Twitter/X',
                'url' => null,
                'username' => null,
                'icon' => 'fab fa-x-twitter',
                'is_active' => false,
                'sort_order' => 4,
            ],
        ];

        foreach ($socialMediaPlatforms as $platform) {
            SocialMedia::updateOrCreate(
                ['platform' => $platform['platform']],
                $platform
            );
        }
    }
}
