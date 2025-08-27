<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md border-b border-white/20 dark:border-gray-700/30 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo Section -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-bold text-green-600 dark:text-green-400">Rumah Literasi</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Literasi Ranggi</p>
                </div>
            </div>
            
            <!-- Desktop Navigation Menu -->
            <div class="hidden lg:flex items-center space-x-6">
                <a href="/" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Beranda</a>
                <a href="/donasi" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Donasi Buku</a>
                <a href="/pelatihan" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Ikuti Pelatihan</a>
                <a href="/sponsorship" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Sponsorship</a>
            </div>

            <!-- Desktop Right Side (Dark Mode Toggle + Login Button) -->
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
                
                <!-- Login Button -->
                <a href="/login" class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center transition-all duration-300 whitespace-nowrap">
                    <span class="hidden xl:inline">Masuk</span>
                    <span class="xl:hidden">Masuk</span>
                </a>
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
                <button class="mobile-menu-button p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300">
                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-300" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu hidden lg:hidden bg-white/95 dark:bg-gray-800/95 backdrop-blur-md border-t border-white/20 dark:border-gray-700/30">
        <div class="px-4 pt-4 pb-6 space-y-3">
            <!-- Mobile Navigation Links -->
            <div class="space-y-2">
                <a href="/" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">Beranda</a>
                <a href="/donasi" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">Donasi Buku</a>
                <a href="/pelatihan" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">Ikuti Pelatihan</a>
                <a href="/sponsorship" class="text-gray-900 dark:text-gray-100 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-50 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">Sponsorship</a>
            </div>
            
            <!-- Mobile Login Button -->
            <div class="pt-4 border-t border-gray-200 dark:border-gray-600">
                <a href="/login" class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-3 rounded-lg text-sm font-medium w-full flex items-center justify-center transition-all duration-300">
                    Masuk
                </a>
            </div>
        </div>
    </div>
</nav>
