<x-layouts.app title="Sponsorship - Rumah Literasi">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-700 dark:from-purple-600 dark:to-purple-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Program Sponsorship
                </h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan para sponsor yang mendukung gerakan literasi untuk Indonesia yang lebih cerdas
                </p>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-3xl font-bold mb-2">{{ $stats['active_sponsors'] }}</div>
                        <div class="text-sm opacity-90">Sponsor Aktif</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-3xl font-bold mb-2">{{ $stats['total_funding'] }}</div>
                        <div class="text-sm opacity-90">Dana Terkumpul</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-3xl font-bold mb-2">{{ $stats['funded_programs'] }}</div>
                        <div class="text-sm opacity-90">Program Didanai</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-3xl font-bold mb-2">{{ number_format($stats['beneficiaries']) }}</div>
                        <div class="text-sm opacity-90">Penerima Manfaat</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Value Proposition Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Mengapa Menjadi Sponsor?</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Investasi Anda akan memberikan dampak jangka panjang bagi pendidikan Indonesia
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Corporate Social Responsibility -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                <div class="bg-purple-100 dark:bg-purple-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">CSR yang Bermakna</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Wujudkan program Corporate Social Responsibility dengan dampak nyata dan terukur untuk masyarakat
                </p>
            </div>

            <!-- Brand Visibility -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                <div class="bg-blue-100 dark:bg-blue-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Brand Visibility</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Tingkatkan visibilitas brand Anda melalui platform digital dan berbagai kegiatan literasi kami
                </p>
            </div>

            <!-- Tax Benefits -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                <div class="bg-green-100 dark:bg-green-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Manfaat Pajak</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Dapatkan keringanan pajak sesuai ketentuan yang berlaku untuk donasi bidang pendidikan
                </p>
            </div>
        </div>
    </div>



    <!-- Current Sponsors Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Sponsor Terkini</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Perusahaan-perusahaan yang telah mempercayai kami sebagai partner dalam gerakan literasi
            </p>
        </div>

        @if($activeSponsors->count() > 0)
            <!-- Featured Sponsors -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($activeSponsors as $sponsorship)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            @if($sponsorship->sponsor && $sponsorship->sponsor->investor)
                                <img src="{{ $sponsorship->sponsor->investor->image_profile_url }}" 
                                     alt="{{ $sponsorship->company_name }}" 
                                     class="w-12 h-12 rounded-lg object-cover mr-4">
                            @else
                                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-800 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">{{ $sponsorship->company_name }}</h3>
                                <span class="inline-block px-2 py-1 text-xs font-medium 
                                    @if($sponsorship->amount >= 50000000) bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                    @elseif($sponsorship->amount >= 15000000) bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100
                                    @else bg-orange-100 text-orange-800 dark:bg-orange-800 dark:text-orange-100 @endif rounded-full">
                                    @if($sponsorship->amount >= 50000000) Gold
                                    @elseif($sponsorship->amount >= 15000000) Silver
                                    @else Bronze @endif Sponsor
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Total Kontribusi</span>
                            <span class="font-semibold text-gray-900 dark:text-white">
                                Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Jenis Sponsorship</span>
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $sponsorship->sponsorship_type_label }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Status</span>
                            <span class="font-semibold 
                                @if($sponsorship->status === 'active') text-green-600 dark:text-green-400
                                @elseif($sponsorship->status === 'approved') text-blue-600 dark:text-blue-400
                                @else text-gray-600 dark:text-gray-400 @endif">
                                {{ $sponsorship->status_label }}
                            </span>
                        </div>
                        @if($sponsorship->start_date && $sponsorship->end_date)
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Periode</span>
                            <span class="font-semibold text-gray-900 dark:text-white">
                                {{ $sponsorship->start_date->format('M Y') }} - {{ $sponsorship->end_date->format('M Y') }}
                            </span>
                        </div>
                        @endif
                    </div>
                    
                    @if($sponsorship->description)
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                            {{ $sponsorship->description }}
                        </p>
                    </div>
                    @endif
                    
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>Sponsor sejak {{ $sponsorship->created_at->format('M Y') }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($activeSponsors->hasPages())
                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $activeSponsors->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Sponsor Aktif</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Jadilah yang pertama untuk mendukung program literasi kami
                </p>
            </div>
        @endif
    </div>

    <!-- Impact Statistics -->
    <div class="bg-purple-600 dark:bg-purple-700 text-white py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Dampak Bersama Sponsor</h2>
                <p class="text-lg text-purple-100">Pencapaian luar biasa yang telah kita raih bersama</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-purple-100">{{ $stats['total_funding'] }}</div>
                    <div class="text-lg text-purple-200">Total Dana Sponsorship</div>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-purple-100">{{ $stats['funded_programs'] }}</div>
                    <div class="text-lg text-purple-200">Program Terealisasi</div>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-purple-100">{{ number_format($stats['beneficiaries']) }}</div>
                    <div class="text-lg text-purple-200">Penerima Manfaat</div>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-purple-100">{{ $stats['active_sponsors'] }}</div>
                    <div class="text-lg text-purple-200">Sponsor Aktif</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="bg-gray-50 dark:bg-gray-700 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Siap Menjadi Sponsor?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan komunitas sponsor yang telah memberikan dampak positif bagi pendidikan Indonesia
            </p>
            
            @auth
                @if(auth()->user()->hasRole(['Admin', 'Sponsor']))
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg max-w-md mx-auto border dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Dashboard Sponsor</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">Kelola program sponsorship dan lihat dampak kontribusi Anda</p>
                        <a href="{{ auth()->user()->dashboard_url }}" 
                           class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Akses Dashboard
                        </a>
                    </div>
                @else
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 max-w-md mx-auto">
                        <p class="text-blue-800 dark:text-blue-200 mb-4">
                            Untuk bergabung sebagai sponsor, silakan hubungi tim partnership kami untuk diskusi lebih lanjut.
                        </p>
                        <a href="mailto:partnership@rumahliterasi.com" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Hubungi Partnership Team
                        </a>
                    </div>
                @endif
            @else
                <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg max-w-md mx-auto border dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Daftar sebagai Sponsor</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">Masuk ke akun Anda untuk memulai proses pendaftaran sponsor</p>
                    <a href="{{ route('login') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg text-lg font-medium flex items-center justify-center w-full transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Masuk ke Akun
                    </a>
                </div>
            @endauth
        </div>
    </div>

    @push('scripts')
    <script>
        // Additional scripts if needed in the future
    </script>
    @endpush
</x-layouts.app>
