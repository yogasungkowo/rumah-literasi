<x-layouts.app>
    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 dark:from-emerald-600 dark:via-teal-600 dark:to-cyan-700">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <!-- Grid Pattern -->
            <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M0 0h40v40H0z" fill="none"/%3E%3Cpath d="M0 0h20v20H0zM20 20h20v20H20z"/%3E%3C/g%3E%3C/svg%3E');"></div>
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-black/10"></div>
        </div>
        
        <!-- Animated Floating Orbs -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Orb 1 - Green -->
            <div class="absolute top-1/4 left-1/6 w-32 h-32 md:w-48 md:h-48 bg-gradient-to-br from-emerald-400 to-green-500 dark:from-emerald-500 dark:to-green-600 rounded-full blur-xl opacity-30 animate-float-slow"></div>
            
            <!-- Orb 2 - Blue -->
            <div class="absolute top-2/3 right-1/5 w-24 h-24 md:w-36 md:h-36 bg-gradient-to-br from-blue-400 to-cyan-500 dark:from-blue-500 dark:to-cyan-600 rounded-full blur-lg opacity-40 animate-float-delayed"></div>
            
            <!-- Orb 3 - Purple -->
            <div class="absolute bottom-1/3 left-2/3 w-40 h-40 md:w-56 md:h-56 bg-gradient-to-br from-purple-400 to-pink-500 dark:from-purple-500 dark:to-pink-600 rounded-full blur-2xl opacity-25 animate-float"></div>
        </div>
        
        <!-- Floating Geometric Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-white/5 rounded-full animate-float"></div>
            <div class="absolute top-1/3 right-1/4 w-24 h-24 bg-white/10 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-1/4 left-1/3 w-40 h-40 bg-white/5 rounded-full animate-float-slow"></div>
            <div class="absolute top-1/2 right-1/3 w-16 h-16 bg-white/15 rounded-full animate-bounce"></div>
        </div>
        
        <!-- Main Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="space-y-8">
                <!-- Main Title -->
                <div class="space-y-4">
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-black bg-gradient-to-r from-white via-gray-100 to-white bg-clip-text text-transparent animate-fade-in-up animation-delay-200 leading-tight">
                        Rumah Literasi Ranggi
                    </h1>
                    <div class="flex items-center justify-center space-x-3 animate-fade-in-up animation-delay-300">
                        <div class="h-1 w-12 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full"></div>
                        <p class="text-2xl md:text-3xl lg:text-4xl font-bold text-yellow-300 tracking-wide">
                            Mencerdaskan Bangsa Melalui Literasi
                        </p>
                        <div class="h-1 w-12 bg-gradient-to-r from-orange-400 to-yellow-400 rounded-full"></div>
                    </div>
                </div>
                
                <!-- Description -->
                <p class="text-xl md:text-2xl text-white/90 max-w-4xl mx-auto leading-relaxed animate-fade-in-up animation-delay-400 font-light">
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
        
        <!-- Animated Floating Orbs for About Section -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Orb 1 - Soft Orange -->
            <div class="absolute top-1/5 right-1/6 w-20 h-20 md:w-32 md:h-32 bg-gradient-to-br from-orange-300 to-red-400 dark:from-orange-400 dark:to-red-500 rounded-full blur-xl opacity-20 animate-float"></div>
            
            <!-- Orb 2 - Soft Yellow -->
            <div class="absolute bottom-1/4 left-1/8 w-28 h-28 md:w-40 md:h-40 bg-gradient-to-br from-yellow-300 to-amber-400 dark:from-yellow-400 dark:to-amber-500 rounded-full blur-2xl opacity-15 animate-float-slow"></div>
            
            <!-- Orb 3 - Soft Teal -->
            <div class="absolute top-2/3 right-1/3 w-16 h-16 md:w-24 md:h-24 bg-gradient-to-br from-teal-300 to-cyan-400 dark:from-teal-400 dark:to-cyan-500 rounded-full blur-lg opacity-25 animate-float-delayed"></div>
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
                            {{ $abouts->main_content }}
                        </p>
                        {{-- <p>
                            Melalui berbagai program inovatif seperti donasi buku, pelatihan literasi, dan kemitraan sponsorship, 
                            kami berusaha menciptakan ekosistem literasi yang inklusif dan dapat diakses oleh semua kalangan.
                        </p> --}}
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
                    <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 rounded-3xl p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-700 hover:scale-105 overflow-hidden">
                        <!-- Animated Background Elements -->
                        <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-transparent"></div>
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full animate-pulse"></div>
                        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-white/5 rounded-full animate-bounce delay-1000"></div>
                        <div class="absolute top-1/2 right-1/4 w-6 h-6 bg-white/20 rounded-full animate-ping"></div>
                        
                        <!-- Floating Books Icon -->
                        <div class="absolute top-4 right-4 opacity-20 group-hover:opacity-30 transition-opacity duration-500">
                            <svg class="w-16 h-16 animate-float" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                        </div>
                        
                        <div class="relative z-10 text-center">
                            <!-- Main Counter -->
                            <div class="mb-6">
                                <div class="flex items-center justify-center mb-2">
                                    <span class="text-6xl md:text-7xl font-black bg-gradient-to-r from-white to-cyan-100 bg-clip-text text-transparent animate-pulse">
                                        {{ $totalBookDonated }}
                                    </span>
                                    <div class="ml-2 flex flex-col">
                                        <span class="text-2xl font-bold text-cyan-100">+</span>
                                        <div class="w-8 h-1 bg-gradient-to-r from-yellow-300 to-orange-400 rounded-full"></div>
                                    </div>
                                </div>
                                
                                <!-- Title with Icon -->
                                <div class="flex items-center justify-center space-x-2 mb-4">
                                    <svg class="w-6 h-6 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    <h3 class="text-xl md:text-2xl font-bold">Buku Telah Terdonasi</h3>
                                </div>
                            </div>
                            
                            <!-- Stats Row -->
                            <div class="flex items-center justify-center space-x-6 text-sm font-medium bg-white/10 backdrop-blur-sm rounded-2xl py-3 px-6">
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <div class="w-3 h-3 bg-green-400 rounded-full animate-ping absolute"></div>
                                        <div class="w-3 h-3 bg-green-300 rounded-full"></div>
                                    </div>
                                    <span class="text-green-100">Live Update</span>
                                </div>
                                <div class="w-px h-5 bg-white/30"></div>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
                                    </svg>
                                    <span class="text-yellow-100">+25 hari ini</span>
                                </div>
                                <div class="w-px h-5 bg-white/30"></div>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-cyan-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/>
                                    </svg>
                                    <span class="text-cyan-100">↗ 15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <!-- Floating cards - positioned far from main card -->
                    <div class="absolute -bottom-16 -right-16 lg:-bottom-12 lg:-right-12 bg-white dark:bg-gray-800 rounded-2xl p-4 lg:p-6 shadow-2xl max-w-xs transform hover:scale-105 transition-transform duration-300 hidden md:block">
                        <div class="flex items-center space-x-3 lg:space-x-4">
                            <div class="bg-gradient-to-br from-green-400 to-green-600 p-3 lg:p-4 rounded-xl">
                                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-lg lg:text-xl font-bold text-gray-900 dark:text-white">Literasi untuk Semua</div>
                                <div class="text-xs lg:text-sm text-gray-600 dark:text-gray-300">Program Berkelanjutan</div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="absolute -top-16 -left-16 lg:-top-12 lg:-left-12 bg-white dark:bg-gray-800 rounded-2xl p-3 lg:p-4 shadow-2xl transform hover:scale-105 transition-transform duration-300 hidden md:block">
                        <div class="flex items-center space-x-2 lg:space-x-3">
                            <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-2 lg:p-3 rounded-lg">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $participants }}+</div>
                                <div class="text-xs lg:text-sm text-gray-600 dark:text-gray-300">Peserta Terlatih</div>
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
                        <div class="text-4xl font-bold mb-2 text-white">{{ number_format($totalBookDonated, 0, ',', '.') }}</div>
                        <div class="text-lg text-white/80 font-medium">Buku Terdonasi</div>
                        <div class="text-sm text-white/60 mt-1">+{{ $donationsThisWeek }} minggu ini</div>
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
                        <div class="text-4xl font-bold mb-2 text-white">{{ number_format($participants, 0, ',', '.') }}</div>
                        <div class="text-lg text-white/80 font-medium">Peserta Pelatihan</div>
                        <div class="text-sm text-white/60 mt-1">60% tingkat penyelesaian</div>
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
                        <div class="text-4xl font-bold mb-2 text-white">{{ number_format($totalTrainings, 0, ',', '.') }}</div>
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
                        <div class="text-4xl font-bold mb-2 text-white">{{ number_format($totalSponsors, 0, ',', '.') }}</div>
                        <div class="text-lg text-white/80 font-medium">Sponsor Aktif</div>
                        <div class="text-sm text-white/60 mt-1">Rp {{ number_format($totalDonations, 0, ',', '.') }} total donasi</div>
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

    <!-- Gallery Section -->
    <div class="bg-white dark:bg-gray-900 py-20 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6"><span class="bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent">Galeri</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Dokumentasi kegiatan literasi, pelatihan, dan lain lain yang telah kami laksanakan.
                </p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($galleries as $gallery)
                    <div class="group relative overflow-hidden rounded-3xl shadow-2xl transform transition-all duration-500 hover:scale-105">
                        <div class="aspect-w-4 aspect-h-3 bg-gradient-to-br from-gray-400 to-gray-600">
                            <img src="{{ $gallery->image_url }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-xl font-bold mb-2">{{ $gallery->title }}</h3>
                                @if($gallery->description)
                                    <p class="text-sm opacity-90">{{ Str::limit($gallery->description, 80) }}</p>
                                @endif
                                @if($gallery->category)
                                    <div class="mt-2">
                                        <span class="inline-block bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium">
                                            {{ $gallery->category }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Fallback when no images are uploaded -->
                    <div class="col-span-full text-center py-12">
                        <div class="max-w-md mx-auto">
                            <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Galeri Kosong</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Belum ada foto yang diupload
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Gallery CTA -->
            <div class="text-center mt-16">
                <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-800 dark:to-gray-700 rounded-3xl p-12 relative overflow-hidden">
                    <!-- Background pattern -->
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-blue-500/5"></div>
                    
                    <div class="relative">
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Ingin Melihat Lebih Banyak?</h3>
                        <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                            Ikuti media sosial kami untuk mendapatkan update terbaru tentang kegiatan literasi dan program-program menarik lainnya
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            @php
                                $instagramSocial = \App\Models\SocialMedia::where('platform', 'instagram')->where('is_active', true)->first();
                                $facebookSocial = \App\Models\SocialMedia::where('platform', 'facebook')->where('is_active', true)->first();
                            @endphp
                            
                            @if($instagramSocial)
                                <a href="{{ $instagramSocial->url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    Follow Instagram
                                </a>
                            @endif
                            
                            @if($facebookSocial)
                                <a href="{{ $facebookSocial->url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    Follow Facebook
                                </a>
                            @endif
                            
                            @if(!$instagramSocial && !$facebookSocial)
                                <!-- Fallback jika tidak ada social media aktif -->
                                <a href="#" class="inline-flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    Follow Instagram
                                </a>
                            @endif
                            
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center bg-white text-green-600 px-8 py-4 rounded-2xl font-semibold border-2 border-green-200 hover:bg-green-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Articles Section -->
    @if($latestArticles->count() > 0)
    <div class="py-20 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-block bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent text-sm font-semibold tracking-wider uppercase mb-4">
                    Artikel & Berita Terbaru
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Rumah Literasi Ranggi
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Baca artikel-artikel terbaru tentang literasi, pendidikan, dan program-program kami
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                <div class="bg-white dark:bg-gray-700 rounded-3xl shadow-xl hover:shadow-2xl overflow-hidden transition-all duration-500 hover:-translate-y-2 group">
                    @if($article->image)
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2">
                            <a href="{{ route('artikel.show', $article->slug) }}" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                                {{ $article->title }}
                            </a>
                        </h3>
                        @if($article->excerpt)
                        <p class="text-gray-600 dark:text-gray-300 line-clamp-3">
                            {{ $article->excerpt }}
                        </p>
                        @endif
                        <div class="mt-4">
                            <a href="{{ route('artikel.show', $article->slug) }}" class="inline-flex items-center text-green-600 dark:text-green-400 font-semibold hover:text-green-700 dark:hover:text-green-300 transition-colors">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('artikel') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Lihat Semua Artikel
                </a>
            </div>
        </div>
    </div>
    @endif

</x-layouts.app>

<style>
    /* Floating Orbs Animations */
    @keyframes float {
        0% {
            transform: translateY(0px) rotate(0deg);
        }
        33% {
            transform: translateY(-20px) rotate(120deg);
        }
        66% {
            transform: translateY(-10px) rotate(240deg);
        }
        100% {
            transform: translateY(0px) rotate(360deg);
        }
    }

    @keyframes float-slow {
        0% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
        }
        25% {
            transform: translateY(-30px) translateX(10px) rotate(90deg);
        }
        50% {
            transform: translateY(-15px) translateX(-10px) rotate(180deg);
        }
        75% {
            transform: translateY(-25px) translateX(5px) rotate(270deg);
        }
        100% {
            transform: translateY(0px) translateX(0px) rotate(360deg);
        }
    }

    @keyframes float-delayed {
        0% {
            transform: translateY(0px) scale(1) rotate(0deg);
        }
        50% {
            transform: translateY(-25px) scale(1.05) rotate(180deg);
        }
        100% {
            transform: translateY(0px) scale(1) rotate(360deg);
        }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-float-slow {
        animation: float-slow 8s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float-delayed 7s ease-in-out infinite 2s;
    }

    /* Responsive blur effects */
    @media (max-width: 768px) {
        .blur-2xl {
            filter: blur(30px);
        }
        .blur-xl {
            filter: blur(20px);
        }
        .blur-lg {
            filter: blur(15px);
        }
    }
</style>