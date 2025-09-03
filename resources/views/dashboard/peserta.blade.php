<x-layouts.integrated-dashboard title="Dashboard Peserta Pelatihan">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-indigo-500 to-indigo-600 dark:from-indigo-600 dark:to-indigo-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
        <p class="text-indigo-100">Tingkatkan kemampuan literasi Anda melalui berbagai pelatihan yang tersedia.</p>
    </div>

    <!-- Learning Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Kursus Selesai</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['courses_completed']) }}</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                    <i class="fas fa-check-circle text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sedang Berjalan</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['courses_in_progress']) }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                    <i class="fas fa-play-circle text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sertifikat</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['certificates_earned']) }}</p>
                </div>
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full">
                    <i class="fas fa-award text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Jam Belajar</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['study_hours']) }}</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full">
                    <i class="fas fa-clock text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses in Progress -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Current Courses -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kursus Sedang Berjalan</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-medium text-gray-900 dark:text-white">Literasi Digital Dasar</h4>
                        <span class="text-sm text-green-600 dark:text-green-400 font-medium">75%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-3">
                        <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Deadline: 10 September 2025</p>
                </div>

                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-medium text-gray-900 dark:text-white">Teknik Membaca Cepat</h4>
                        <span class="text-sm text-blue-600 dark:text-blue-400 font-medium">45%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-3">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Deadline: 25 September 2025</p>
                </div>
            </div>
        </div>

        <!-- Recommended Courses -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kursus Rekomendasi</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">Menulis Kreatif</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Belajar teknik menulis kreatif untuk mengembangkan imajinasi dan kreativitas.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">8 minggu • Pemula</span>
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm transition-colors">
                            Daftar
                        </button>
                    </div>
                </div>

                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">Analisis Teks</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Memahami teknik analisis teks dan interpretasi makna dalam bacaan.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">6 minggu • Menengah</span>
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm transition-colors">
                            Daftar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-full mr-4">
                    <i class="fas fa-search text-2xl text-indigo-600 dark:text-indigo-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Cari Kursus</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Temukan kursus literasi yang sesuai dengan minat Anda.</p>
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg transition-colors">
                Jelajahi Kursus
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full mr-4">
                    <i class="fas fa-certificate text-2xl text-green-600 dark:text-green-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sertifikat</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Lihat dan unduh semua sertifikat yang telah Anda raih.</p>
            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Sertifikat
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full mr-4">
                    <i class="fas fa-chart-line text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Progress</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Pantau progress belajar dan pencapaian Anda.</p>
            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Progress
            </button>
        </div>
    </div>
</x-layouts.integrated-dashboard>
