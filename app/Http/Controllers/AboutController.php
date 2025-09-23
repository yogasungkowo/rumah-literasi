<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page.
     */
    public function index()
    {
        // Get the first about record with organization members
        $about = About::with(['topLevelMembers.children'])->first();
        
        // If no about data exists, create default data or handle gracefully
        if (!$about) {
            $about = $this->getDefaultAboutData();
        }
        
        return view('pages.about', compact('about'));
    }
    
    /**
     * Get default about data if none exists in database
     */
    private function getDefaultAboutData()
    {
        return (object) [
            'main_title' => 'Tentang Rumah Literasi Ranggi',
            'subtitle' => 'Membangun Budaya Literasi untuk Masa Depan yang Cerah',
            'banner_image' => asset('images/about-banner.jpg'),
            'main_content' => 'Rumah Literasi Ranggi adalah sebuah komunitas yang berdedikasi untuk meningkatkan budaya literasi di masyarakat. Kami percaya bahwa literasi adalah kunci untuk membuka pintu pengetahuan dan menciptakan perubahan positif dalam kehidupan.',
            'vision_title' => 'Visi Kami',
            'vision_content' => 'Menjadi pusat literasi terdepan yang menginspirasi dan memberdayakan masyarakat untuk mengembangkan kemampuan baca tulis dan berpikir kritis demi terciptanya generasi yang cerdas dan berkarakter.',
            'mission_title' => 'Misi Kami',
            'mission_content' => 'Menyediakan akses pendidikan literasi yang berkualitas, mengembangkan program-program inovatif untuk meningkatkan minat baca, membangun jaringan komunitas literasi yang kuat, dan menciptakan lingkungan yang mendukung pembelajaran sepanjang hayat.',
            'topLevelMembers' => collect([])
        ];
    }
}