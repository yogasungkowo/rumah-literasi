<x-layouts.integrated-dashboard title="Dashboard Publik">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
        <p class="text-blue-100">Jelajahi dunia literasi dan tingkatkan kemampuan membaca Anda.</p>
    </div>

    <!-- Progress Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Progress Membaca</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['reading_progress'] }}%</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                    <i class="fas fa-book-open text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: {{ $stats['reading_progress'] }}%"></div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Buku Dibaca</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['books_read'] }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                    <i class="fas fa-book text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Event Diikuti</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['events_attended'] }}</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full">
                    <i class="fas fa-calendar-check text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sertifikat</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['certificates'] }}</p>
                </div>
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full">
                    <i class="fas fa-award text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full mr-4">
                    <i class="fas fa-book-reader text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mulai Membaca</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Jelajahi koleksi buku digital dan tingkatkan literasi Anda.</p>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Koleksi Buku
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full mr-4">
                    <i class="fas fa-calendar-alt text-2xl text-green-600 dark:text-green-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Event Literasi</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Ikuti berbagai event dan workshop literasi yang menarik.</p>
            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Event
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full mr-4">
                    <i class="fas fa-users text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Komunitas</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Bergabung dengan komunitas pembaca dan diskusi buku.</p>
            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition-colors">
                Gabung Komunitas
            </button>
        </div>
    </div>

    <!-- Reading Recommendations -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Rekomendasi Bacaan</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample book recommendations -->
                <div class="flex items-center space-x-3 p-3 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <div class="w-12 h-16 bg-blue-500 rounded flex items-center justify-center">
                        <i class="fas fa-book text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white">Literasi Digital</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Panduan lengkap era digital</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 p-3 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <div class="w-12 h-16 bg-green-500 rounded flex items-center justify-center">
                        <i class="fas fa-book text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white">Membaca Efektif</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Teknik membaca cepat dan efektif</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 p-3 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <div class="w-12 h-16 bg-purple-500 rounded flex items-center justify-center">
                        <i class="fas fa-book text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white">Budaya Literasi</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Membangun budaya baca Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.integrated-dashboard>
