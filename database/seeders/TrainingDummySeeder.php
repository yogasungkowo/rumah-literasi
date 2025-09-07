<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;
use App\Models\TrainingParticipant;
use App\Models\User;
use Carbon\Carbon;

class TrainingDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 2 dummy trainings
        $training1 = Training::create([
            'title' => 'Pelatihan Literasi Digital untuk Guru',
            'description' => 'Pelatihan komprehensif tentang literasi digital yang dirancang khusus untuk guru-guru sekolah dasar hingga menengah. Peserta akan belajar cara mengintegrasikan teknologi dalam pembelajaran, menggunakan platform pembelajaran online, dan mengembangkan konten digital yang menarik.',
            'instructor_name' => 'Dr. Sari Teknologi, M.Pd',
            'instructor_email' => 'sari.teknologi@example.com',
            'instructor_phone' => '081234567890',
            'start_date' => Carbon::now()->addDays(15),
            'end_date' => Carbon::now()->addDays(17),
            'start_time' => '09:00',
            'end_time' => '16:00',
            'location' => 'Aula Rumah Literasi, Jakarta Selatan',
            'max_participants' => 30,
            'current_participants' => 0,
            'price' => 150000,
            'status' => 'published',
            'requirements' => 'Laptop/tablet pribadi, koneksi internet stabil, pengalaman mengajar minimal 2 tahun',
            'materials' => 'Modul pelatihan, sertifikat, flash disk berisi materi pembelajaran digital, lunch selama 3 hari',
            'schedule' => [
                [
                    'date' => Carbon::now()->addDays(15)->format('Y-m-d'),
                    'theme' => 'Pengenalan Literasi Digital',
                    'activities' => [
                        ['time' => '09:00', 'title' => 'Registrasi dan Pembukaan', 'description' => 'Check-in peserta dan sambutan'],
                        ['time' => '09:30', 'title' => 'Materi 1: Konsep Literasi Digital', 'description' => 'Pemahaman dasar literasi digital di era modern'],
                        ['time' => '11:00', 'title' => 'Coffee Break', 'description' => 'Istirahat dan networking'],
                        ['time' => '11:15', 'title' => 'Materi 2: Tools Pembelajaran Digital', 'description' => 'Pengenalan berbagai platform dan aplikasi'],
                        ['time' => '12:30', 'title' => 'Istirahat Makan Siang', 'description' => 'Lunch dan diskusi informal'],
                        ['time' => '13:30', 'title' => 'Workshop Praktek 1', 'description' => 'Hands-on penggunaan tools pembelajaran'],
                        ['time' => '15:00', 'title' => 'Evaluasi Hari Pertama', 'description' => 'Review dan tanya jawab'],
                    ]
                ],
                [
                    'date' => Carbon::now()->addDays(16)->format('Y-m-d'),
                    'theme' => 'Implementasi Teknologi dalam Pembelajaran',
                    'activities' => [
                        ['time' => '09:00', 'title' => 'Energizer dan Review', 'description' => 'Pemanasan dan review materi sebelumnya'],
                        ['time' => '09:30', 'title' => 'Materi 3: Desain Pembelajaran Digital', 'description' => 'Prinsip-prinsip pembelajaran yang efektif'],
                        ['time' => '11:00', 'title' => 'Coffee Break', 'description' => 'Istirahat dan networking'],
                        ['time' => '11:15', 'title' => 'Workshop Praktek 2', 'description' => 'Membuat konten pembelajaran interaktif'],
                        ['time' => '12:30', 'title' => 'Istirahat Makan Siang', 'description' => 'Lunch dan sharing pengalaman'],
                        ['time' => '13:30', 'title' => 'Materi 4: Evaluasi Digital', 'description' => 'Metode penilaian dalam pembelajaran digital'],
                        ['time' => '15:00', 'title' => 'Studi Kasus', 'description' => 'Analisis implementasi di sekolah'],
                    ]
                ],
                [
                    'date' => Carbon::now()->addDays(17)->format('Y-m-d'),
                    'theme' => 'Presentasi Hasil dan Penutupan',
                    'activities' => [
                        ['time' => '09:00', 'title' => 'Persiapan Presentasi', 'description' => 'Waktu untuk menyiapkan presentasi kelompok'],
                        ['time' => '10:00', 'title' => 'Presentasi Kelompok', 'description' => 'Setiap kelompok mempresentasikan rencana implementasi'],
                        ['time' => '11:30', 'title' => 'Coffee Break', 'description' => 'Istirahat dan networking terakhir'],
                        ['time' => '12:00', 'title' => 'Feedback dan Evaluasi', 'description' => 'Masukan dari instruktur dan peserta'],
                        ['time' => '13:00', 'title' => 'Penutupan dan Pembagian Sertifikat', 'description' => 'Closing ceremony dan penyerahan sertifikat'],
                        ['time' => '14:00', 'title' => 'Foto Bersama dan Networking', 'description' => 'Dokumentasi dan pertukaran kontak'],
                    ]
                ]
            ]
        ]);

        $training2 = Training::create([
            'title' => 'Workshop Menulis Kreatif untuk Anak',
            'description' => 'Workshop intensif yang dirancang untuk mengembangkan kreativitas menulis anak-anak usia 8-15 tahun. Melalui berbagai teknik storytelling, permainan kata, dan aktivitas kreatif, anak-anak akan belajar mengekspresikan ide dan imajinasi mereka dalam bentuk tulisan yang menarik.',
            'instructor_name' => 'Kak Rina Penulis',
            'instructor_email' => 'rina.penulis@example.com',
            'instructor_phone' => '082345678901',
            'start_date' => Carbon::now()->addDays(22),
            'end_date' => Carbon::now()->addDays(23),
            'start_time' => '10:00',
            'end_time' => '15:00',
            'location' => 'Ruang Kreatif Rumah Literasi, Jakarta Utara',
            'max_participants' => 20,
            'current_participants' => 0,
            'price' => 75000,
            'status' => 'published',
            'requirements' => 'Anak usia 8-15 tahun, sudah bisa membaca dan menulis, membawa alat tulis dan buku catatan',
            'materials' => 'Modul workshop, sertifikat partisipasi, buku cerita, alat tulis kreatif, snack dan lunch',
            'schedule' => [
                [
                    'date' => Carbon::now()->addDays(22)->format('Y-m-d'),
                    'theme' => 'Eksplorasi Imajinasi dan Ide',
                    'activities' => [
                        ['time' => '10:00', 'title' => 'Ice Breaking dan Perkenalan', 'description' => 'Permainan perkenalan dan membangun suasana'],
                        ['time' => '10:30', 'title' => 'Permainan Imajinasi', 'description' => 'Aktivitas untuk merangsang kreativitas'],
                        ['time' => '11:30', 'title' => 'Snack Time', 'description' => 'Istirahat dan sharing cerita favorit'],
                        ['time' => '11:45', 'title' => 'Teknik Brainstorming Ide', 'description' => 'Cara mengembangkan ide cerita'],
                        ['time' => '12:30', 'title' => 'Lunch Break', 'description' => 'Makan siang sambil bercerita'],
                        ['time' => '13:30', 'title' => 'Workshop Menulis Karakter', 'description' => 'Membuat tokoh cerita yang menarik'],
                        ['time' => '14:30', 'title' => 'Sharing Karya Hari Pertama', 'description' => 'Presentasi karakter yang dibuat'],
                    ]
                ],
                [
                    'date' => Carbon::now()->addDays(23)->format('Y-m-d'),
                    'theme' => 'Menulis Cerita Lengkap',
                    'activities' => [
                        ['time' => '10:00', 'title' => 'Energizer Pagi', 'description' => 'Permainan kata dan pemanasan kreativitas'],
                        ['time' => '10:30', 'title' => 'Struktur Cerita Sederhana', 'description' => 'Belajar awal-tengah-akhir cerita'],
                        ['time' => '11:30', 'title' => 'Snack Time', 'description' => 'Istirahat sambil membaca cerita pendek'],
                        ['time' => '11:45', 'title' => 'Workshop Menulis Cerita', 'description' => 'Praktik menulis cerita pendek'],
                        ['time' => '12:30', 'title' => 'Lunch Break', 'description' => 'Makan siang dan diskusi ide cerita'],
                        ['time' => '13:30', 'title' => 'Finishing Touch Cerita', 'description' => 'Menyelesaikan dan memperbaiki cerita'],
                        ['time' => '14:15', 'title' => 'Presentasi Cerita', 'description' => 'Setiap anak membacakan karyanya'],
                        ['time' => '14:45', 'title' => 'Penutupan dan Pembagian Sertifikat', 'description' => 'Closing dan pemberian apresiasi'],
                    ]
                ]
            ]
        ]);

        // Create some users to act as participants
        $participants = [];
        for ($i = 1; $i <= 8; $i++) {
            $participants[] = User::create([
                'name' => "Peserta Demo $i",
                'email' => "peserta$i@example.com",
                'password' => bcrypt('password'),
                'phone' => "08123456789$i",
                'address' => "Alamat Peserta $i, Jakarta",
                'role' => 'Peserta Pelatihan',
            ]);
        }

        // Create training participant registrations for training 1
        $motivations = [
            'Ingin meningkatkan kemampuan mengajar dengan teknologi digital yang semakin berkembang pesat.',
            'Sebagai guru, saya merasa perlu update dengan metode pembelajaran modern untuk siswa.',
            'Ingin membuat pembelajaran lebih interaktif dan menarik bagi siswa-siswa saya.',
            'Tertarik untuk mengintegrasikan teknologi dalam kurikulum yang saya ajarkan.',
            'Ingin belajar cara efektif menggunakan platform digital untuk pembelajaran jarak jauh.',
        ];

        $expectations = [
            'Dapat menguasai berbagai platform pembelajaran digital dan mengimplementasikannya di kelas.',
            'Mendapatkan ide-ide kreatif untuk membuat pembelajaran lebih engaging dan efektif.',
            'Mampu membuat konten pembelajaran digital yang menarik dan interaktif untuk siswa.',
            'Memahami cara menggunakan teknologi untuk meningkatkan kualitas pembelajaran.',
            'Bisa mengajarkan literasi digital kepada siswa dengan metode yang tepat dan menyenangkan.',
        ];

        $experienceLevels = ['beginner', 'intermediate', 'beginner', 'intermediate', 'advanced'];

        // Register 5 participants for training 1
        for ($i = 0; $i < 5; $i++) {
            TrainingParticipant::create([
                'training_id' => $training1->id,
                'user_id' => $participants[$i]->id,
                'motivation' => $motivations[$i],
                'expectations' => $expectations[$i],
                'experience_level' => $experienceLevels[$i],
                'additional_info' => $i % 2 == 0 ? 'Sudah mengajar selama ' . (5 + $i) . ' tahun di sekolah negeri.' : null,
                'status' => $i < 2 ? 'registered' : ($i < 4 ? 'approved' : 'rejected'),
                'registered_at' => now()->subDays(rand(1, 7)),
                'approved_at' => $i >= 2 && $i < 4 ? now()->subDays(rand(1, 3)) : null,
                'rejected_at' => $i == 4 ? now()->subDays(1) : null,
            ]);
        }

        // Create training participant registrations for training 2
        $childMotivations = [
            'Anak saya sangat suka bercerita dan ingin belajar menulis cerita yang bagus.',
            'Ingin mengembangkan kreativitas menulis anak dan meningkatkan kemampuan bahasanya.',
            'Anak tertarik dengan dunia tulis menulis dan ingin belajar teknik storytelling.',
        ];

        $childExpectations = [
            'Anak bisa menulis cerita yang menarik dan mengembangkan imajinasinya dengan baik.',
            'Meningkatkan kemampuan menulis dan kepercayaan diri anak dalam berkarya.',
            'Anak mendapat pengalaman baru dan teman-teman baru yang suka menulis juga.',
        ];

        // Register 3 participants for training 2
        for ($i = 5; $i < 8; $i++) {
            TrainingParticipant::create([
                'training_id' => $training2->id,
                'user_id' => $participants[$i]->id,
                'motivation' => $childMotivations[$i - 5],
                'expectations' => $childExpectations[$i - 5],
                'experience_level' => 'beginner',
                'additional_info' => 'Anak sudah kelas ' . (3 + ($i - 5)) . ' SD dan suka membaca buku cerita.',
                'status' => $i == 5 ? 'registered' : ($i == 6 ? 'approved' : 'registered'),
                'registered_at' => now()->subDays(rand(1, 5)),
                'approved_at' => $i == 6 ? now()->subDays(2) : null,
            ]);
        }

        $this->command->info('Training dummy data created successfully!');
        $this->command->info('- 2 trainings created');
        $this->command->info('- 8 participants created');
        $this->command->info('- 8 training registrations created with various statuses');
    }
}
