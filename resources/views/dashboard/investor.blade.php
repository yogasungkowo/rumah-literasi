<x-layouts.integrated-dashboard title="Dashboard Investor">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-emerald-500 to-emerald-600 dark:from-emerald-600 dark:to-emerald-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
        <p class="text-emerald-100">Pantau investasi Anda dalam program literasi dan lihat dampak positif yang telah Anda ciptakan.</p>
    </div>

    <!-- Investment Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Investasi</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">Rp {{ number_format($stats['total_investment']) }}</p>
                </div>
                <div class="p-3 bg-emerald-100 dark:bg-emerald-900/30 rounded-full">
                    <i class="fas fa-coins text-2xl text-emerald-600 dark:text-emerald-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Proyek Aktif</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['active_projects']) }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                    <i class="fas fa-project-diagram text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">ROI</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['roi_percentage'] }}%</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                    <i class="fas fa-chart-line text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Orang Terdampak</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['people_impacted']) }}</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full">
                    <i class="fas fa-users text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Investment Portfolio -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Active Investments -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Portfolio Investasi</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-medium text-gray-900 dark:text-white">Perpustakaan Digital Desa</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                            Aktif
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Investasi: Rp 15.000.000</p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-400">Progress: 75%</span>
                        <span class="text-green-600 dark:text-green-400 font-medium">ROI: +18%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mt-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                </div>

                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-medium text-gray-900 dark:text-white">Program Literasi UMKM</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                            Berkembang
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Investasi: Rp 20.000.000</p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-400">Progress: 45%</span>
                        <span class="text-blue-600 dark:text-blue-400 font-medium">ROI: +12%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mt-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Impact Report -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Dampak</h3>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <div class="text-center">
                        <div class="p-4 bg-emerald-50 dark:bg-emerald-900/20 rounded-full w-16 h-16 mx-auto mb-3 flex items-center justify-center">
                            <i class="fas fa-book-open text-2xl text-emerald-600 dark:text-emerald-400"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-gray-900 dark:text-white">2,500</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Buku terdistribusi</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div>
                            <h5 class="text-lg font-bold text-gray-900 dark:text-white">45</h5>
                            <p class="text-xs text-gray-600 dark:text-gray-300">Desa terjangkau</p>
                        </div>
                        <div>
                            <h5 class="text-lg font-bold text-gray-900 dark:text-white">120</h5>
                            <p class="text-xs text-gray-600 dark:text-gray-300">UMKM terbantu</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                        <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 px-4 rounded-lg transition-colors">
                            Lihat Laporan Lengkap
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
                <div class="p-3 bg-emerald-100 dark:bg-emerald-900/30 rounded-full mr-4">
                    <i class="fas fa-plus text-2xl text-emerald-600 dark:text-emerald-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Investasi Baru</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Jelajahi peluang investasi literasi terbaru.</p>
            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Peluang
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full mr-4">
                    <i class="fas fa-chart-bar text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Analisis ROI</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Analisis mendalam performa investasi Anda.</p>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Analisis
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full mr-4">
                    <i class="fas fa-handshake text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Network</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Terhubung dengan investor dan partner lainnya.</p>
            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition-colors">
                Lihat Network
            </button>
        </div>
    </div>
</x-layouts.integrated-dashboard>
