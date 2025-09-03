<x-layouts.integrated-dashboard title="Dashboard Relawan">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-purple-500 to-purple-600 dark:from-purple-600 dark:to-purple-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
        <p class="text-purple-100">Terima kasih atas dedikasi Anda sebagai relawan literasi. Mari bersama membangun Indonesia yang lebih berbudaya baca.</p>
    </div>

    <!-- Volunteer Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Jam Kontribusi</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['hours_contributed']) }}</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full">
                    <i class="fas fa-clock text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Event Diorganisir</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['events_organized']) }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                    <i class="fas fa-calendar-plus text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Orang Terbantu</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['people_helped']) }}</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                    <i class="fas fa-users text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Proyek Aktif</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['active_projects']) }}</p>
                </div>
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full">
                    <i class="fas fa-project-diagram text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full mr-4">
                    <i class="fas fa-calendar-plus text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Buat Event</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Organisir event literasi baru untuk masyarakat.</p>
            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition-colors">
                Buat Event Baru
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full mr-4">
                    <i class="fas fa-hands-helping text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Gabung Program</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Bergabung dengan program relawan yang sedang berjalan.</p>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Program
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full mr-4">
                    <i class="fas fa-chart-bar text-2xl text-green-600 dark:text-green-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Aktivitas</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Lihat laporan lengkap aktivitas relawan Anda.</p>
            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Laporan
            </button>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Event Mendatang</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full">
                            <i class="fas fa-book-reader text-purple-600 dark:text-purple-400"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-white">Workshop Literasi Digital</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">30 Agustus 2025 • Jakarta</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                        Akan Datang
                    </span>
                </div>

                <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                            <i class="fas fa-users text-green-600 dark:text-green-400"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-white">Pelatihan Relawan Baru</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">5 September 2025 • Bandung</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                        Mendaftar
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-layouts.integrated-dashboard>
