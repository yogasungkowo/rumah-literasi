<x-layouts.app>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-500 to-blue-500 dark:from-green-600 dark:to-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Rumah Literasi
                </h1>
                <p class="text-xl md:text-2xl mb-4">Literasi Ranggi</p>
                <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
                    Bersama membangun budaya literasi yang berkelanjutan untuk mencerdaskan bangsa
                </p>
                <button class="bg-white text-green-600 dark:text-green-700 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 dark:hover:bg-gray-200 transition">
                    Bergabung Sekarang
                </button>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Apa yang Bisa Anda Lakukan?
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Bergabunglah dengan gerakan literasi dan jadilah bagian dari perubahan positif
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Donasi Buku -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="bg-green-100 dark:bg-green-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Donasi Buku</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Berbagi pengetahuan dengan mendonasikan buku-buku yang sudah tidak terpakai untuk membantu sesama
                    </p>
                    <a href="/donasi" class="inline-block bg-green-600 dark:bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 dark:hover:bg-green-600 transition">
                        Donasi Sekarang
                    </a>
                </div>

                <!-- Ikuti Pelatihan -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="bg-blue-100 dark:bg-blue-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Ikuti Pelatihan</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Tingkatkan kemampuan literasi Anda melalui berbagai program pelatihan yang tersedia
                    </p>
                    <a href="/pelatihan" class="inline-block bg-blue-600 dark:bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">
                        Lihat Pelatihan
                    </a>
                </div>

                <!-- Sponsorship -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="bg-purple-100 dark:bg-purple-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6m8 0H8m8 0h2a2 2 0 012 2v2M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Daftar Sponsorship</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Jadilah sponsor dan dukung program literasi untuk memberikan dampak yang lebih besar
                    </p>
                    <a href="/sponsorship" class="inline-block bg-purple-600 dark:bg-purple-500 text-white px-6 py-3 rounded-lg hover:bg-purple-700 dark:hover:bg-purple-600 transition">
                        Jadi Sponsor
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gray-50 dark:bg-gray-700 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Siap untuk Memulai?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                Daftar akun sekarang dan mulai berkontribusi dalam gerakan literasi bersama kami
            </p>
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg max-w-md mx-auto border dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Masuk ke Akun Anda</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Gunakan akun Google untuk masuk dengan mudah dan aman</p>
                <button class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-medium flex items-center justify-center w-full transition">
                    <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Masuk dengan Google
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-green-600 dark:bg-green-700 text-white py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Dampak yang Telah Dicapai</h2>
                <p class="text-lg text-green-100">Bersama-sama kita telah membuat perubahan positif</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2 text-green-100">1,234</div>
                    <div class="text-lg text-green-200">Buku Terdonasi</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2 text-green-100">567</div>
                    <div class="text-lg text-green-200">Peserta Pelatihan</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2 text-green-100">89</div>
                    <div class="text-lg text-green-200">Program Dilaksanakan</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2 text-green-100">45</div>
                    <div class="text-lg text-green-200">Sponsor Aktif</div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>