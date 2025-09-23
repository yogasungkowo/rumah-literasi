<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md border-b border-white/20 dark:border-gray-700/30 transition-all duration-300" x-data="{ mobileOpen: false, programOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20 sm:h-28 py-2 sm:py-4">
            <!-- Logo Section -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center space-x-2 sm:space-x-3">
                        <div class="relative">
                            <img src="{{ asset('image/Logo_Rumah_Literasi_Ranggi.png') }}" alt="Rumah Literasi" class="h-16 w-16 sm:h-20 sm:w-20 lg:h-24 lg:w-24 object-contain rounded-lg bg-white/10 dark:bg-white/5 p-1">
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-lg sm:text-xl font-bold text-green-600 dark:text-green-400 leading-tight">Rumah Literasi Ranggi</h1>
                        </div>
                        <!-- Mobile text - hanya tampil di mobile -->
                        <div class="block sm:hidden">
                            <h1 class="text-sm font-bold text-green-600 dark:text-green-400 leading-tight">Rumah Literasi<br>Ranggi</h1>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Desktop Navigation Menu -->
            <div class="hidden lg:flex items-center space-x-6">
                <a href="/" class="{{ request()->is('/') || request()->is('') || request()->routeIs('home') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-b-2 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 border-b-2 border-transparent hover:border-green-300' }} px-3 py-2 text-sm font-medium transition-all duration-200">Beranda</a>
                
                <!-- Program & Dukungan Dropdown -->
                <div class="relative" x-data="{ programOpen: false }">
                    <button @click="programOpen = !programOpen" @click.away="programOpen = false" class="{{ request()->is('donasi*') || request()->is('pelatihan*') || request()->is('sponsorship*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-b-2 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 border-b-2 border-transparent hover:border-green-300' }} px-3 py-2 text-sm font-medium transition-all duration-200 flex items-center">
                        Program & Dukungan
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="programOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div x-show="programOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="absolute left-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-1 z-50">
                        <a href="/donasi" class="{{ request()->is('donasi*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center px-4 py-2 text-sm transition-colors">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Donasi Buku
                        </a>
                        <a href="/pelatihan" class="{{ request()->is('pelatihan*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center px-4 py-2 text-sm transition-colors">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Ikuti Pelatihan
                        </a>
                        <a href="/sponsorship" class="{{ request()->is('sponsorship*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center px-4 py-2 text-sm transition-colors">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            Sponsorship
                        </a>
                    </div>
                </div>
                
                <a href="/artikel" class="{{ request()->is('artikel*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-b-2 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 border-b-2 border-transparent hover:border-green-300' }} px-3 py-2 text-sm font-medium transition-all duration-200">Artikel & Berita</a>
                <a href="/about-us" class="{{ request()->is('about*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-b-2 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 border-b-2 border-transparent hover:border-green-300' }} px-3 py-2 text-sm font-medium transition-all duration-200">Tentang Kami</a>
            </div>

            <!-- Desktop Right Side (Dark Mode Toggle + Auth Section) -->
            <div class="hidden lg:flex items-center space-x-3">
                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300" title="Toggle dark mode">
                    <!-- Moon icon (for dark mode when in light mode) -->
                    <svg id="theme-toggle-dark-icon" class="w-5 h-5 text-gray-800 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <!-- Sun icon (for light mode when in dark mode) -->
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 text-gray-800 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                
                <!-- Authentication Section -->
                @auth
                    <!-- User Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                @if(auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-8 h-8 rounded-full object-cover">
                                @else
                                    <span class="text-white text-sm font-medium">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                @endif
                            </div>
                            <span class="hidden xl:inline font-medium">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-1 z-50">
                            <!-- User Info -->
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                                <p class="text-xs text-green-600 dark:text-green-400 mt-1">{{ auth()->user()->role_name }}</p>
                            </div>
                            
                            <!-- Dashboard Link -->
                            <a href="{{ auth()->user()->dashboard_url }}" class="{{ (request()->is('dashboard*') && !request()->is('dashboard/profile*')) || request()->is('admin*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center px-4 py-2 text-sm transition-colors">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                </svg>
                                Dashboard
                            </a>
                            
                            <!-- Profile Link -->
                            <a href="/dashboard/profile" class="{{ request()->is('dashboard/profile*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center px-4 py-2 text-sm transition-colors">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profile
                            </a>
                            
                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Login Button for Guests -->
                    <a href="/login" class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center transition-all duration-300 whitespace-nowrap">
                        <span class="hidden xl:inline">Masuk</span>
                        <span class="xl:hidden">Masuk</span>
                    </a>
                @endauth
            </div>

            <!-- Mobile menu controls -->
            <div class="lg:hidden flex items-center space-x-2">
                <!-- Mobile Dark Mode Toggle -->
                <button id="mobile-theme-toggle" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300" title="Toggle dark mode">
                    <!-- Moon icon (for dark mode when in light mode) -->
                    <svg id="mobile-theme-toggle-dark-icon" class="w-5 h-5 text-gray-800 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <!-- Sun icon (for light mode when in dark mode) -->
                    <svg id="mobile-theme-toggle-light-icon" class="hidden w-5 h-5 text-gray-800 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                
                <!-- Mobile Menu Button -->
                <button @click="mobileOpen = !mobileOpen" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300">
                    <svg x-show="!mobileOpen" class="w-6 h-6 text-gray-500 dark:text-gray-300" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="mobileOpen" class="w-6 h-6 text-gray-500 dark:text-gray-300" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-200" 
         x-transition:enter-start="opacity-0 transform -translate-y-2" 
         x-transition:enter-end="opacity-100 transform translate-y-0" 
         x-transition:leave="transition ease-in duration-150" 
         x-transition:leave-start="opacity-100 transform translate-y-0" 
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         @click.away="mobileOpen = false"
         class="lg:hidden bg-white/95 dark:bg-gray-800/95 backdrop-blur-md border-t border-white/20 dark:border-gray-700/30">
        <div class="px-4 pt-4 pb-6 space-y-1">
            <!-- Mobile Navigation Links -->
            <div class="space-y-1">
                <a href="/" @click="mobileOpen = false" class="{{ request()->is('/') || request()->is('') || request()->routeIs('home') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} block px-4 py-3 text-base font-medium transition-all duration-200 rounded-r-lg">
                    <span class="flex items-center">
                        @if(request()->is('/') || request()->is('') || request()->routeIs('home'))
                            <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                        Beranda
                    </span>
                </a>
                
                <!-- Mobile Program & Dukungan Section -->
                <div class="space-y-1">
                    <button @click="programOpen = !programOpen" class="{{ request()->is('donasi*') || request()->is('pelatihan*') || request()->is('sponsorship*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} block w-full text-left px-4 py-3 text-base font-medium transition-all duration-200 rounded-r-lg">
                        <span class="flex items-center justify-between">
                            <span class="flex items-center">
                                @if(request()->is('donasi*') || request()->is('pelatihan*') || request()->is('sponsorship*'))
                                    <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                                Program & Dukungan
                            </span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="programOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </button>
                    
                    <!-- Mobile Submenu -->
                    <div x-show="programOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0" class="ml-6 space-y-1 overflow-hidden">
                        <a href="/donasi" @click="mobileOpen = false" class="{{ request()->is('donasi*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} block px-4 py-2 text-sm font-medium transition-all duration-200 rounded-r-lg">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Donasi Buku
                            </span>
                        </a>
                        <a href="/pelatihan" @click="mobileOpen = false" class="{{ request()->is('pelatihan*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} block px-4 py-2 text-sm font-medium transition-all duration-200 rounded-r-lg">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Ikuti Pelatihan
                            </span>
                        </a>
                        <a href="/sponsorship" @click="mobileOpen = false" class="{{ request()->is('sponsorship*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} block px-4 py-2 text-sm font-medium transition-all duration-200 rounded-r-lg">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Sponsorship
                            </span>
                        </a>
                    </div>
                </div>
                
                <a href="/artikel" @click="mobileOpen = false" class="{{ request()->is('artikel*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} block px-4 py-3 text-base font-medium transition-all duration-200 rounded-r-lg">
                    <span class="flex items-center">
                        @if(request()->is('artikel*'))
                            <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                        Artikel & Berita
                    </span>
                </a>
                <a href="/about-us" @click="mobileOpen = false" class="{{ request()->is('about*') ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} block px-4 py-3 text-base font-medium transition-all duration-200 rounded-r-lg">
                    <span class="flex items-center">
                        @if(request()->is('about*'))
                            <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                        Tentang Kami
                    </span>
                </a>
            </div>
            
            <!-- Mobile Authentication Section -->
            <div class="pt-4 border-t border-gray-200 dark:border-gray-600">
                @auth
                    <!-- Mobile User Info -->
                    <div class="px-3 py-2 bg-gray-50 dark:bg-gray-700 rounded-lg mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                @if(auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <span class="text-white font-medium">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                                <p class="text-xs text-green-600 dark:text-green-400">{{ auth()->user()->role_name }}</p>
                            </div>
                        </div>
                    
                    <!-- Mobile Dashboard & Profile Links -->
                    <div class="space-y-1 mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        <a href="{{ auth()->user()->dashboard_url }}" @click="mobileOpen = false" class="{{ (request()->is('dashboard*') && !request()->is('dashboard/profile*')) || request()->is('admin*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} flex items-center px-4 py-3 text-base font-medium transition-all duration-200 rounded-r-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                            Dashboard
                            @if((request()->is('dashboard*') && !request()->is('dashboard/profile*')) || request()->is('admin*'))
                                <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            @endif
                        </a>
                        <a href="/dashboard/profile" @click="mobileOpen = false" class="{{ request()->is('dashboard/profile*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 border-l-4 border-green-600 dark:border-green-400' : 'text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 border-l-4 border-transparent' }} flex items-center px-4 py-3 text-base font-medium transition-all duration-200 rounded-r-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7-7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile
                            @if(request()->is('dashboard/profile*'))
                                <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            @endif
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg text-base font-medium transition-colors border-l-4 border-transparent hover:border-red-300">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Mobile Login Button for Guests -->
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        <a href="/login" @click="mobileOpen = false" class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-3 rounded-lg text-base font-medium w-full flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Masuk
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
