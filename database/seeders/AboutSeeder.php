<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create if no about record exists
        if (!About::exists()) {
            About::create([
                'main_title' => 'Tentang Rumah Literasi Ranggi',
                'subtitle' => 'Mendorong literasi dan pendidikan untuk masyarakat yang lebih baik',
                'main_content' => 'Rumah Literasi Ranggi adalah organisasi yang berkomitmen untuk meningkatkan literasi dan pendidikan di masyarakat.',
                'vision_title' => 'Visi Kami',
                'vision_content' => 'Menjadi pusat literasi terdepan yang mampu memberikan dampak positif bagi masyarakat.',
                'mission_title' => 'Misi Kami',
                'mission_content' => '1. Menyediakan akses literasi yang mudah dan terjangkau 2. Mengembangkan program pendidikan berkualitas 3. Mendorong partisipasi masyarakat dalam kegiatan literasi',
            ]);
        }
    }
}
