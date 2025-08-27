<x-layouts.app>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-700 dark:from-purple-600 dark:to-purple-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Program Sponsorship & Investasi
                </h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan para investor yang telah mempercayai kami untuk membangun masa depan literasi Indonesia
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/login" class="bg-white text-purple-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold transition-colors">
                        Gabung Menjadi Investor
                    </a>
                    <a href="#investor-list" class="border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-3 rounded-lg font-semibold transition-colors">
                        Lihat Investor Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Required Notice -->
    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 dark:border-yellow-500 p-6 mb-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400 dark:text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700 dark:text-yellow-300">
                        <strong>Informasi:</strong> Untuk menjadi investor, Anda perlu masuk ke akun terlebih dahulu dan mengisi proposal investasi.
                        <a href="/login" class="ml-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                            Masuk Sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Investor Statistics -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Statistik Investasi</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">Data terkini investasi dalam program literasi kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-16">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center transition-colors duration-300">
                <div class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-2">45</div>
                <div class="text-gray-600 dark:text-gray-300">Total Investor</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center transition-colors duration-300">
                <div class="text-3xl font-bold text-green-600 dark:text-green-400 mb-2">Rp 2.5M</div>
                <div class="text-gray-600 dark:text-gray-300">Total Investasi</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center transition-colors duration-300">
                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">12</div>
                <div class="text-gray-600 dark:text-gray-300">Program Aktif</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center transition-colors duration-300">
                <div class="text-3xl font-bold text-orange-600 dark:text-orange-400 mb-2">98%</div>
                <div class="text-gray-600 dark:text-gray-300">Tingkat Sukses</div>
            </div>
        </div>
    </div>

    <!-- Investor List Section -->
    <div id="investor-list" class="bg-gray-50 dark:bg-gray-800 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Daftar Investor Kami</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">Para investor yang telah mempercayai dan mendukung program literasi kami</p>
            </div>

            <!-- Table Container -->
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden transition-colors duration-300">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Investor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Judul Program</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nominal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Proposal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Sample Data Row 1 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                                <span class="text-purple-600 dark:text-purple-400 font-medium">PT</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">PT. Maju Bersama</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">Korporat</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white">Program Literasi Desa Terpencil</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Jawa Tengah & Jawa Timur</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">Rp 150.000.000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 text-sm">Lihat Proposal</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-purple-600 dark:text-purple-400 hover:text-purple-900 dark:hover:text-purple-300">Detail</button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 2 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                                                <span class="text-blue-600 dark:text-blue-400 font-medium">YK</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">Yayasan Kartini</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">Yayasan</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white">Perpustakaan Keliling Digital</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Sumatera Utara</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">Rp 75.000.000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 text-sm">Lihat Proposal</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400">
                                        Dalam Review
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-purple-600 dark:text-purple-400 hover:text-purple-900 dark:hover:text-purple-300">Detail</button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 3 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                                                <span class="text-green-600 dark:text-green-400 font-medium">JD</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">John Doe</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">Individu</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white">Pelatihan Guru Literasi</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Jakarta & Sekitarnya</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">Rp 25.000.000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 text-sm">Lihat Proposal</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">
                                        Selesai
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-purple-600 dark:text-purple-400 hover:text-purple-900 dark:hover:text-purple-300">Detail</button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 4 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center">
                                                <span class="text-orange-600 dark:text-orange-400 font-medium">CV</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">CV. Literasi Nusantara</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">Korporat</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white">Program Baca Tulis untuk UMKM</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Bali & NTT</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">Rp 50.000.000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 text-sm">Lihat Proposal</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-purple-600 dark:text-purple-400 hover:text-purple-900 dark:hover:text-purple-300">Detail</button>
                                </td>
                            </tr>

                            <!-- Sample Data Row 5 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                                                <span class="text-red-600 dark:text-red-400 font-medium">FP</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">Fatimah Putri</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">Individu</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white">Literasi Anak Usia Dini</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Yogyakarta</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">Rp 15.000.000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 text-sm">Lihat Proposal</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400">
                                        Persiapan
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-purple-600 dark:text-purple-400 hover:text-purple-900 dark:hover:text-purple-300">Detail</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white dark:bg-gray-900 px-6 py-3 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">5</span> dari <span class="font-medium">45</span> investor
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">Sebelumnya</button>
                            <button class="px-3 py-1 text-sm bg-purple-600 text-white rounded hover:bg-purple-700 transition-colors">1</button>
                            <button class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">2</button>
                            <button class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">3</button>
                            <button class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-purple-600 dark:bg-purple-700 text-white py-16">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4">Siap Menjadi Bagian dari Perubahan?</h2>
            <p class="text-xl mb-8">Bergabunglah dengan para investor yang telah mempercayai kami untuk membangun masa depan literasi Indonesia yang lebih baik.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/login" class="bg-white text-purple-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold transition-colors">
                    Daftar Sebagai Investor
                </a>
                <a href="/register" class="border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-3 rounded-lg font-semibold transition-colors">
                    Buat Akun Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Impact Section -->
    <div class="py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Dampak Investasi Kami</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">Lihat bagaimana kontribusi para investor membuat perbedaan nyata dalam dunia literasi</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-purple-100 dark:bg-purple-900/30 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors duration-300">
                        <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">10,000+</h3>
                    <p class="text-gray-600 dark:text-gray-300">Buku didistribusikan</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-blue-100 dark:bg-blue-900/30 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors duration-300">
                        <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">5,000+</h3>
                    <p class="text-gray-600 dark:text-gray-300">Peserta terlatih</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-green-100 dark:bg-green-900/30 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors duration-300">
                        <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">50+</h3>
                    <p class="text-gray-600 dark:text-gray-300">Daerah terjangkau</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-orange-100 dark:bg-orange-900/30 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors duration-300">
                        <svg class="w-10 h-10 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">200+</h3>
                    <p class="text-gray-600 dark:text-gray-300">Lembaga partner</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
