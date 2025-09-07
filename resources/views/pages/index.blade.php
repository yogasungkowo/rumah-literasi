<x-layouts.app>
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-green-500 via-blue-500 to-purple-600 dark:from-green-600 dark:via-blue-600 dark:to-purple-700 text-white">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full blur-xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-20 left-1/3 w-16 h-16 bg-white/10 rounded-full blur-xl animate-pulse delay-500"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <!-- Logo/Icon -->
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-8 animate-bounce">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent animate-fade-in-up">
                    Rumah Literasi
                </h1>
                <p class="text-2xl md:text-3xl mb-4 font-medium opacity-90 animate-fade-in-up animation-delay-200">Literasi Ranggi</p>
                <p class="text-lg md:text-xl mb-12 max-w-4xl mx-auto leading-relaxed opacity-80 animate-fade-in-up animation-delay-400">
                    Bersama membangun budaya literasi yang berkelanjutan untuk mencerdaskan bangsa melalui inovasi dan kolaborasi
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up animation-delay-600">
                    @auth
                        @php
                            $user = auth()->user();
                            
                            // Cek role dan tentukan dashboard
                            if ($user->hasRole('Admin')) {
                                $dashboardRoute = route('dashboard.admin');
                            } elseif ($user->hasRole('Investor')) {
                                $dashboardRoute = route('dashboard.investor');
                            } elseif ($user->hasRole('Donatur Buku')) {
                                $dashboardRoute = route('dashboard.donatur');
                            } elseif ($user->hasRole('Relawan')) {
                                $dashboardRoute = route('dashboard.relawan');
                            } elseif ($user->hasRole('Peserta Pelatihan')) {
                                $dashboardRoute = route('dashboard.peserta');
                            } else {
                                // Default fallback ke profile jika tidak ada role yang cocok
                                $dashboardRoute = route('dashboard.profile');
                            }
                        @endphp
                        <a href="{{ $dashboardRoute }}" class="group bg-white text-green-600 px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Ke Dashboard
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="group bg-white text-green-600 px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Bergabung Sekarang
                            </span>
                        </a>
                    @endauth
                    <a href="{{ route('contact') }}" class="group bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-white/20 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Hubungi Kami
                        </span>
                    </a>
                </div>
                
                <!-- Scroll indicator -->
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                    <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-500 via-blue-500 to-purple-600"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <div class="inline-block bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent text-sm font-semibold tracking-wider uppercase mb-4">
                    Bergabung Dengan Kami
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Apa yang Bisa Anda Lakukan?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Bergabunglah dengan gerakan literasi dan jadilah bagian dari perubahan positif yang nyata untuk masa depan Indonesia
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <!-- Donasi Buku -->
                <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl p-8 text-center transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 relative overflow-hidden">
                    <!-- Background gradient on hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-green-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-green-400 to-green-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Donasi Buku</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            Berbagi pengetahuan dengan mendonasikan buku-buku yang sudah tidak terpakai untuk membantu sesama mencari ilmu
                        </p>
                        <a href="/donasi" class="inline-flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-3 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 font-semibold group-hover:scale-105 transform shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Donasi Sekarang
                        </a>
                    </div>
                </div>

                <!-- Ikuti Pelatihan -->
                <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl p-8 text-center transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 relative overflow-hidden">
                    <!-- Background gradient on hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-blue-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-400 to-blue-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Ikuti Pelatihan</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            Tingkatkan kemampuan literasi Anda melalui berbagai program pelatihan berkualitas yang tersedia
                        </p>
                        <a href="/pelatihan" class="inline-flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 font-semibold group-hover:scale-105 transform shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat Pelatihan
                        </a>
                    </div>
                </div>

                <!-- Sponsorship -->
                <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl p-8 text-center transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 relative overflow-hidden">
                    <!-- Background gradient on hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-purple-400 to-purple-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6m8 0H8m8 0h2a2 2 0 012 2v2M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Daftar Sponsorship</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            Jadilah sponsor dan dukung program literasi untuk memberikan dampak yang lebih besar bagi pendidikan
                        </p>
                        <a href="/sponsorship" class="inline-flex items-center justify-center bg-gradient-to-r from-purple-500 to-purple-600 text-white px-8 py-3 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 font-semibold group-hover:scale-105 transform shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            Jadi Sponsor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="py-20 bg-gray-50 dark:bg-gray-800 transition-colors duration-300 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z" fill="%2300000" fill-opacity="0.03" fill-rule="evenodd"/%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <div class="inline-block bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent text-sm font-semibold tracking-wider uppercase mb-4">
                        Tentang Kami
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-8 leading-tight">
                        Membangun Masa Depan Melalui 
                        <span class="bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent">Literasi</span>
                    </h2>
                    <div class="space-y-6 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                        <p>
                            Rumah Literasi Ranggi adalah komunitas yang berkomitmen untuk memajukan budaya literasi di Indonesia. 
                            Kami percaya bahwa pendidikan dan literasi adalah kunci untuk membangun masa depan yang lebih cerah dan berkelanjutan.
                        </p>
                        <p>
                            Melalui berbagai program inovatif seperti donasi buku, pelatihan literasi, dan kemitraan sponsorship, 
                            kami berusaha menciptakan ekosistem literasi yang inklusif dan dapat diakses oleh semua kalangan.
                        </p>
                    </div>
                    
                    <!-- Features List -->
                    <div class="mt-10 space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Program Donasi Buku Berkelanjutan</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Pelatihan Literasi Berkualitas</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Kemitraan Strategis dengan Sponsor</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-6 mt-10">
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-4 rounded-2xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Hubungi Kami
                        </a>
                        <a href="/donasi" class="inline-flex items-center justify-center bg-transparent border-2 border-green-500 text-green-600 dark:text-green-400 dark:border-green-400 px-8 py-4 rounded-2xl hover:bg-green-500 hover:text-white dark:hover:bg-green-400 dark:hover:text-gray-900 transition-all duration-300 transform hover:scale-105 font-semibold">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Mulai Berdonasi
                        </a>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2 relative">
                    <!-- Main stats card -->
                    <div class="bg-gradient-to-br from-green-400 via-blue-500 to-purple-600 rounded-3xl p-10 text-white shadow-2xl transform rotate-3 hover:rotate-0 transition-all duration-500 relative overflow-hidden">
                        <!-- Background pattern -->
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-12 -translate-x-12"></div>
                        
                        <div class="relative text-center">
                            <div class="flex items-center justify-center mb-4">
                                <div class="text-6xl font-bold mr-2">5,247</div>
                                <div class="text-3xl font-semibold opacity-80">+</div>
                            </div>
                            <div class="text-xl mb-3 font-semibold">Buku Telah Terdonasi</div>
                            <div class="flex items-center justify-center space-x-4 text-sm opacity-90">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-300 rounded-full mr-2 animate-pulse"></div>
                                    <span>Live Update</span>
                                </div>
                                <div class="w-px h-4 bg-white/40"></div>
                                <div>+25 hari ini</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating cards -->
                    <div class="absolute -bottom-6 -right-6 bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-2xl max-w-xs">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-br from-green-400 to-green-600 p-4 rounded-xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-gray-900 dark:text-white">Literasi untuk Semua</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Program Berkelanjutan</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute -top-6 -left-6 bg-white dark:bg-gray-800 rounded-2xl p-4 shadow-2xl">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900 dark:text-white">500+</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Peserta Terlatih</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-white dark:bg-gray-900 py-20 transition-colors duration-300 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 via-blue-500/5 to-purple-500/5"></div>
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-500 via-blue-500 to-purple-600"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-block bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent text-sm font-semibold tracking-wider uppercase mb-4">
                Bergabung Sekarang
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                Siap untuk Memulai
                <span class="bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent">Perubahan?</span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-16 max-w-3xl mx-auto leading-relaxed">
                Daftar akun sekarang dan mulai berkontribusi dalam gerakan literasi bersama kami untuk masa depan Indonesia yang lebih cerah
            </p>
            
            <!-- Quick Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <a href="/donasi" class="group bg-gradient-to-br from-green-50 to-green-100 dark:from-gray-800 dark:to-gray-700 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-green-200 dark:border-gray-600 relative overflow-hidden">
                    <!-- Hover effect background -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-green-500 to-green-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Donasi Buku</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Berbagi pengetahuan melalui donasi buku untuk sesama</p>
                    </div>
                </a>
                
                <a href="/pelatihan" class="group bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-800 dark:to-gray-700 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-blue-200 dark:border-gray-600 relative overflow-hidden">
                    <!-- Hover effect background -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Ikuti Pelatihan</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Tingkatkan kemampuan literasi Anda</p>
                    </div>
                </a>
                
                <a href="{{ route('contact') }}" class="group bg-gradient-to-br from-purple-50 to-purple-100 dark:from-gray-800 dark:to-gray-700 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-purple-200 dark:border-gray-600 relative overflow-hidden">
                    <!-- Hover effect background -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-purple-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Hubungi Kami</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Ada pertanyaan? Jangan ragu untuk menghubungi</p>
                    </div>
                </a>
            </div>
            
            <!-- Login Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 p-10 rounded-3xl shadow-2xl max-w-lg mx-auto border border-gray-200 dark:border-gray-600 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-br from-green-500/10 to-blue-500/10 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative">
                    <div class="bg-gradient-to-r from-green-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    @auth
                        @php
                            $user = auth()->user();
                            
                            // Tentukan dashboard route berdasarkan role
                            if ($user->hasRole('Admin')) {
                                $dashboardRoute = route('dashboard.admin');
                            } elseif ($user->hasRole('Investor')) {
                                $dashboardRoute = route('dashboard.investor');
                            } elseif ($user->hasRole('Donatur Buku')) {
                                $dashboardRoute = route('dashboard.donatur');
                            } elseif ($user->hasRole('Relawan')) {
                                $dashboardRoute = route('dashboard.relawan');
                            } elseif ($user->hasRole('Peserta Pelatihan')) {
                                $dashboardRoute = route('dashboard.peserta');
                            } else {
                                $dashboardRoute = route('dashboard.profile');
                            }
                        @endphp
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Selamat Datang, {{ $user->name }}!</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">Kembali ke dashboard Anda untuk melanjutkan aktivitas dan mengelola akun</p>
                        <a href="{{ $dashboardRoute }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-10 py-4 rounded-2xl text-lg font-semibold flex items-center justify-center w-full transition-all duration-300 transform hover:scale-105 shadow-xl">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Ke Dashboard
                        </a>
                    @else
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Masuk ke Akun Anda</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">Masuk dengan mudah dan aman ke platform kami untuk mengakses semua fitur</p>
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-10 py-4 rounded-2xl text-lg font-semibold flex items-center justify-center w-full transition-all duration-300 transform hover:scale-105 shadow-xl">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Masuk
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 dark:from-green-700 dark:via-blue-700 dark:to-purple-700 text-white py-20 transition-colors duration-300 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="80" height="80" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M0 0h80v80H0V0zm20 20v40h40V20H20zm20 35a15 15 0 1 1 0-30 15 15 0 0 1 0 30z" /%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <!-- Floating decorative elements -->
        <div class="absolute top-10 left-10 w-24 h-24 bg-white/5 rounded-full blur-xl animate-pulse delay-1000"></div>
        <div class="absolute top-20 right-20 w-32 h-32 bg-white/5 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 left-1/4 w-20 h-20 bg-white/5 rounded-full blur-xl animate-pulse delay-500"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-block bg-white/20 backdrop-blur-sm rounded-full px-6 py-2 text-sm font-semibold tracking-wider uppercase mb-6">
                    Pencapaian Kami
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Dampak yang Telah Dicapai</h2>
                <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Bersama-sama kita telah membuat perubahan positif yang nyata untuk masa depan literasi Indonesia
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center group">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 hover:bg-white/20 transition-all duration-300 transform hover:scale-105 border border-white/20">
                        <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 text-white">5,247</div>
                        <div class="text-lg text-white/80 font-medium">Buku Terdonasi</div>
                        <div class="text-sm text-white/60 mt-1">+25 minggu ini</div>
                    </div>
                </div>
                
                <!-- Stat 2 -->
                <div class="text-center group">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 hover:bg-white/20 transition-all duration-300 transform hover:scale-105 border border-white/20">
                        <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 text-white">1,829</div>
                        <div class="text-lg text-white/80 font-medium">Peserta Pelatihan</div>
                        <div class="text-sm text-white/60 mt-1">67% tingkat penyelesaian</div>
                    </div>
                </div>
                
                <!-- Stat 3 -->
                <div class="text-center group">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 hover:bg-white/20 transition-all duration-300 transform hover:scale-105 border border-white/20">
                        <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 text-white">156</div>
                        <div class="text-lg text-white/80 font-medium">Program Dilaksanakan</div>
                        <div class="text-sm text-white/60 mt-1">98% rating kepuasan</div>
                    </div>
                </div>
                
                <!-- Stat 4 -->
                <div class="text-center group">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 hover:bg-white/20 transition-all duration-300 transform hover:scale-105 border border-white/20">
                        <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 text-white">89</div>
                        <div class="text-lg text-white/80 font-medium">Sponsor Aktif</div>
                        <div class="text-sm text-white/60 mt-1">Rp 2.8M total donasi</div>
                    </div>
                </div>
            </div>
            
            <!-- Call to action -->
            <div class="text-center mt-16">
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan ribuan orang yang telah merasakan dampak positif dari program literasi kami
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/donasi" class="inline-flex items-center justify-center bg-white text-green-600 px-8 py-4 rounded-2xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Mulai Berdonasi
                    </a>
                    <a href="/pelatihan" class="inline-flex items-center justify-center bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white px-8 py-4 rounded-2xl font-semibold hover:bg-white/20 transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Ikuti Pelatihan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>