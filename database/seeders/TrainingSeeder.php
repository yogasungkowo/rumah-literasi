<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Training;
use Carbon\Carbon;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::create([
            'title' => 'Pelatihan Literasi Digital untuk Guru',
            'description' => 'Pelatihan komprehensif untuk mengembangkan kemampuan literasi digital guru dalam mengintegrasikan teknologi dalam pembelajaran. Pelatihan ini mencakup penggunaan platform pembelajaran online, pembuatan konten digital edukatif, dan strategi pembelajaran berbasis teknologi.',
            'instructor_name' => 'Dr. Sari Widyaningsih, M.Pd',
            'instructor_email' => 'sari.widya@univ.ac.id',
            'instructor_phone' => '081234567890',
            'start_date' => Carbon::now()->addDays(14),
            'end_date' => Carbon::now()->addDays(16),
            'start_time' => '08:00:00',
            'end_time' => '16:00:00',
            'location' => 'Gedung Pelatihan Rumah Literasi, Jl. Pendidikan No. 123, Jakarta',
            'max_participants' => 30,
            'current_participants' => 0,
            'price' => 250000.00,
            'status' => 'published',
            'requirements' => 'Minimal pendidikan S1, memiliki pengalaman mengajar minimal 2 tahun, membawa laptop pribadi, memiliki akses internet',
            'materials' => 'Modul pelatihan digital, sertifikat kehadiran, lunch dan coffee break, akses platform pembelajaran online selama 6 bulan',
            'certificate_template' => 'template_literasi_digital.pdf',
            'image' => null,
            'schedule' => [
                'day_1' => [
                    'date' => Carbon::now()->addDays(14)->format('Y-m-d'),
                    'sessions' => [
                        [
                            'time' => '08:00-09:30',
                            'topic' => 'Pengenalan Literasi Digital dalam Pendidikan',
                            'description' => 'Konsep dasar literasi digital dan pentingnya dalam era digital'
                        ],
                        [
                            'time' => '10:00-11:30',
                            'topic' => 'Platform Pembelajaran Online',
                            'description' => 'Mengenal berbagai platform pembelajaran seperti Google Classroom, Moodle, dll'
                        ],
                        [
                            'time' => '13:00-14:30',
                            'topic' => 'Pembuatan Konten Digital Edukatif',
                            'description' => 'Teknik membuat video pembelajaran, infografis, dan materi interaktif'
                        ],
                        [
                            'time' => '15:00-16:00',
                            'topic' => 'Praktik dan Diskusi',
                            'description' => 'Praktik langsung dan diskusi pengalaman'
                        ]
                    ]
                ],
                'day_2' => [
                    'date' => Carbon::now()->addDays(15)->format('Y-m-d'),
                    'sessions' => [
                        [
                            'time' => '08:00-09:30',
                            'topic' => 'Strategi Pembelajaran Blended Learning',
                            'description' => 'Mengintegrasikan pembelajaran online dan offline'
                        ],
                        [
                            'time' => '10:00-11:30',
                            'topic' => 'Assessment Digital dan E-Portfolio',
                            'description' => 'Teknik penilaian digital dan pembuatan portfolio elektronik'
                        ],
                        [
                            'time' => '13:00-14:30',
                            'topic' => 'Keamanan Digital dan Etika Online',
                            'description' => 'Mengajarkan siswa tentang keamanan dan etika berdigital'
                        ],
                        [
                            'time' => '15:00-16:00',
                            'topic' => 'Rencana Implementasi',
                            'description' => 'Membuat rencana implementasi di sekolah masing-masing'
                        ]
                    ]
                ],
                'day_3' => [
                    'date' => Carbon::now()->addDays(16)->format('Y-m-d'),
                    'sessions' => [
                        [
                            'time' => '08:00-09:30',
                            'topic' => 'Showcase dan Presentasi Project',
                            'description' => 'Peserta mempresentasikan project yang telah dibuat'
                        ],
                        [
                            'time' => '10:00-11:30',
                            'topic' => 'Evaluasi dan Feedback',
                            'description' => 'Evaluasi keseluruhan pelatihan dan feedback'
                        ],
                        [
                            'time' => '13:00-14:00',
                            'topic' => 'Networking dan Sertifikasi',
                            'description' => 'Networking session dan pemberian sertifikat'
                        ]
                    ]
                ]
            ],
            'notes' => 'Pelatihan ini diselenggarakan dalam rangka meningkatkan kualitas pendidikan melalui teknologi. Peserta yang menyelesaikan pelatihan akan mendapat sertifikat dan dapat bergabung dalam komunitas guru digital.'
        ]);

        Training::create([
            'title' => 'Workshop Menulis Kreatif untuk Remaja',
            'description' => 'Workshop intensif untuk mengembangkan kemampuan menulis kreatif remaja usia 13-18 tahun. Mencakup teknik penulisan cerita pendek, puisi, dan blog. Workshop ini dirancang untuk memotivasi minat baca dan tulis generasi muda.',
            'instructor_name' => 'Andrea Hirata',
            'instructor_email' => 'andrea.hirata@penulis.id',
            'instructor_phone' => '081987654321',
            'start_date' => Carbon::now()->addDays(21),
            'end_date' => Carbon::now()->addDays(22),
            'start_time' => '09:00:00',
            'end_time' => '15:00:00',
            'location' => 'Taman Bacaan Rumah Literasi, Jl. Sastra No. 456, Bandung',
            'max_participants' => 25,
            'current_participants' => 8,
            'price' => 150000.00,
            'status' => 'published',
            'requirements' => 'Usia 13-18 tahun, minat dalam menulis, membawa alat tulis dan buku catatan, tidak perlu pengalaman menulis sebelumnya',
            'materials' => 'Modul menulis kreatif, buku antologi cerpen, sertifikat keikutsertaan, snack dan makan siang, akses ke komunitas penulis muda',
            'certificate_template' => 'template_menulis_kreatif.pdf',
            'image' => null,
            'schedule' => [
                'day_1' => [
                    'date' => Carbon::now()->addDays(21)->format('Y-m-d'),
                    'sessions' => [
                        [
                            'time' => '09:00-10:30',
                            'topic' => 'Pengenalan Dunia Menulis Kreatif',
                            'description' => 'Memahami berbagai genre tulisan kreatif dan inspirasi menulis'
                        ],
                        [
                            'time' => '11:00-12:30',
                            'topic' => 'Teknik Membangun Karakter dan Plot',
                            'description' => 'Cara menciptakan karakter yang kuat dan alur cerita yang menarik'
                        ],
                        [
                            'time' => '13:30-15:00',
                            'topic' => 'Praktik Menulis Cerpen',
                            'description' => 'Latihan menulis cerita pendek dengan tema bebas'
                        ]
                    ]
                ],
                'day_2' => [
                    'date' => Carbon::now()->addDays(22)->format('Y-m-d'),
                    'sessions' => [
                        [
                            'time' => '09:00-10:30',
                            'topic' => 'Menulis Puisi dan Eksplorasi Bahasa',
                            'description' => 'Teknik menulis puisi dan bermain dengan bahasa figuratif'
                        ],
                        [
                            'time' => '11:00-12:30',
                            'topic' => 'Blog Writing dan Digital Storytelling',
                            'description' => 'Menulis untuk media digital dan membangun audiens'
                        ],
                        [
                            'time' => '13:30-15:00',
                            'topic' => 'Sharing Session dan Publikasi',
                            'description' => 'Peserta membacakan karya dan tips publikasi untuk penulis muda'
                        ]
                    ]
                ]
            ],
            'notes' => 'Workshop ini bertujuan menumbuhkan budaya literasi di kalangan remaja. Karya terbaik akan dipublikasikan di website Rumah Literasi dan mendapat kesempatan untuk mengikuti kompetisi menulis tingkat nasional.'
        ]);
    }
}
