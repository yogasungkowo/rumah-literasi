<x-layouts.app title="Sponsorship - Rumah Literasi Ranggi">

    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 text-white">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>

        <div class="relative z-10 container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <div data-aos="fade-down"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-8">
                    <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span class="text-sm font-medium text-white/90">Program Sponsorship</span>
                </div>
                <h1 data-aos="fade-up" class="text-5xl md:text-7xl font-extrabold mb-6 bg-gradient-to-r from-white via-blue-200 to-purple-300 bg-clip-text text-transparent">
                    Program Sponsorship
                </h1>
                <p data-aos="fade-up" data-aos-delay="200" class="text-xl md:text-2xl text-white/80 font-light leading-relaxed max-w-3xl mx-auto mb-12">
                    Bergabunglah dengan para sponsor yang mendukung gerakan literasi untuk Indonesia yang lebih cerdas
                </p>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-8">
                    <div data-aos="fade-up" data-aos-delay="300" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <p class="text-5xl font-bold bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">{{ $stats['active_sponsors'] ?? 0 }}</p>
                        <p class="text-lg font-medium text-white/80 mt-2">Sponsor Aktif</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="400" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <p class="text-5xl font-bold bg-gradient-to-r from-green-300 to-emerald-300 bg-clip-text text-transparent">{{ $stats['total_funding'] ?? '0' }}</p>
                        <p class="text-lg font-medium text-white/80 mt-2">Dana Terkumpul</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="500" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <p class="text-5xl font-bold bg-gradient-to-r from-purple-300 to-pink-300 bg-clip-text text-transparent">{{ $stats['funded_programs'] ?? 0 }}</p>
                        <p class="text-lg font-medium text-white/80 mt-2">Program Didanai</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="600" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <p class="text-5xl font-bold bg-gradient-to-r from-blue-300 to-cyan-300 bg-clip-text text-transparent">{{ number_format($stats['beneficiaries'] ?? 0) }}</p>
                        <p class="text-lg font-medium text-white/80 mt-2">Penerima Manfaat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Value Proposition Section with Modern Cards -->
    <div class="py-20 pb-32 bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="max-w-7xl mx-auto">
                <div data-aos="fade-up" class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">
                        Mengapa Menjadi Sponsor?
                    </h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                        Investasi Anda akan memberikan dampak jangka panjang bagi pendidikan Indonesia
                    </p>
                    <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full mt-6"></div>
                </div>

            <div class="flex flex-col md:flex-row justify-center gap-8">
                <!-- CSR Card -->
                <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl dark:shadow-2xl p-8 hover:shadow-2xl dark:hover:shadow-purple-500/10 transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 dark:from-purple-600 dark:to-purple-700 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">CSR yang Bermakna</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-center leading-relaxed">
                        Wujudkan program Corporate Social Responsibility dengan dampak nyata dan terukur untuk masyarakat
                    </p>
                </div>

                <!-- Brand Visibility Card -->
                <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl dark:shadow-2xl p-8 hover:shadow-2xl dark:hover:shadow-blue-500/10 transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-700">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Brand Visibility</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-center leading-relaxed">
                        Tingkatkan visibilitas brand Anda melalui platform digital dan berbagai kegiatan literasi kami
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Current Sponsors Section with Enhanced Design -->
    <div class="pt-32 pb-20 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="max-w-7xl mx-auto">
                <div data-aos="fade-up" class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">
                        Sponsor Terkini
                    </h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                        Perusahaan-perusahaan yang telah mempercayai kami sebagai partner dalam gerakan literasi
                    </p>
                    <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full mt-6"></div>
                </div>

            @if($activeSponsors->count() > 0)
                <!-- Enhanced Sponsors Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach($activeSponsors as $sponsorship)
                    <div class="group bg-white dark:bg-gray-900 rounded-2xl shadow-lg dark:shadow-2xl p-8 hover:shadow-xl dark:hover:shadow-purple-500/20 transition-all duration-300 hover:-translate-y-1 border border-gray-100 dark:border-gray-700">
                        <!-- Header with Logo and Badge -->
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center space-x-4">
                                @if($sponsorship->sponsor && $sponsorship->sponsor->investor)
                                    <img src="{{ $sponsorship->sponsor->investor->image_profile_url }}" 
                                         alt="{{ $sponsorship->company_name }}" 
                                         class="w-14 h-14 rounded-xl object-cover ring-2 ring-gray-100 dark:ring-gray-700">
                                @else
                                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 dark:from-purple-600 dark:to-purple-700 rounded-xl flex items-center justify-center">
                                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <h3 class="font-bold text-lg text-gray-900 dark:text-white">{{ $sponsorship->company_name }}</h3>
                                    @if($sponsorship->amount >= 50000000)
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900">
                                            ✨ Gold Sponsor
                                        </span>
                                    @elseif($sponsorship->amount >= 15000000)
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-slate-400 to-slate-500 text-slate-900">
                                            🥈 Silver Sponsor
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-amber-400 to-amber-500 text-amber-900">
                                            🥉 Bronze Sponsor
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Details Grid -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Total Kontribusi</span>
                                <span class="font-bold text-gray-900 dark:text-white">
                                    Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Jenis Sponsorship</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $sponsorship->sponsorship_type_label }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Status</span>
                                @if($sponsorship->status === 'active')
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                        {{ $sponsorship->status_label }}
                                    </span>
                                @elseif($sponsorship->status === 'approved')
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                        {{ $sponsorship->status_label }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100">
                                        {{ $sponsorship->status_label }}
                                    </span>
                                @endif
                            </div>
                            @if($sponsorship->start_date && $sponsorship->end_date)
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Periode</span>
                                <span class="font-semibold text-gray-900 dark:text-white">
                                    {{ $sponsorship->start_date->format('M Y') }} - {{ $sponsorship->end_date->format('M Y') }}
                                </span>
                            </div>
                            @endif
                        </div>
                        
                        @if($sponsorship->description)
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-3 leading-relaxed">
                                {{ $sponsorship->description }}
                            </p>
                        </div>
                        @endif
                        
                        <!-- Footer with Join Date -->
                        <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span>Sponsor sejak {{ $sponsorship->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($activeSponsors->hasPages())
                    <!-- Enhanced Pagination -->
                    <div class="flex justify-center">
                        {{ $activeSponsors->links() }}
                    </div>
                @endif
            @else
                <!-- Enhanced Empty State -->
                <div class="text-center py-16">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 dark:from-purple-600 dark:to-purple-700 w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Belum Ada Sponsor Aktif</h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
                        Jadilah yang pertama untuk mendukung program literasi kami
                    </p>
                </div>
            @endif
        </div>
    </div>

    <!-- Enhanced Impact Statistics -->
    <div class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 dark:from-purple-800 dark:via-purple-900 dark:to-indigo-900 text-white py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Ccircle cx="7" cy="7" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Dampak Bersama Sponsor</h2>
                <p class="text-xl text-purple-100 max-w-3xl mx-auto">Pencapaian luar biasa yang telah kita raih bersama</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Total Funding -->
                <div class="group bg-white/15 dark:bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 hover:bg-white/20 dark:hover:bg-white/15 transition-all duration-300 hover:scale-105 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-white group-hover:text-purple-100 transition-colors">{{ $stats['total_funding'] }}</div>
                    <div class="text-lg text-purple-200">Total Dana Sponsorship</div>
                </div>
                
                <!-- Funded Programs -->
                <div class="group bg-white/15 dark:bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 hover:bg-white/20 dark:hover:bg-white/15 transition-all duration-300 hover:scale-105 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-white group-hover:text-purple-100 transition-colors">{{ $stats['funded_programs'] }}</div>
                    <div class="text-lg text-purple-200">Program Terealisasi</div>
                </div>
                
                <!-- Beneficiaries -->
                <div class="group bg-white/15 dark:bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 hover:bg-white/20 dark:hover:bg-white/15 transition-all duration-300 hover:scale-105 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-white group-hover:text-purple-100 transition-colors">{{ number_format($stats['beneficiaries']) }}</div>
                    <div class="text-lg text-purple-200">Penerima Manfaat</div>
                </div>
                
                <!-- Active Sponsors -->
                <div class="group bg-white/15 dark:bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 hover:bg-white/20 dark:hover:bg-white/15 transition-all duration-300 hover:scale-105 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2 text-white group-hover:text-purple-100 transition-colors">{{ $stats['active_sponsors'] }}</div>
                    <div class="text-lg text-purple-200">Sponsor Aktif</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Call to Action Section -->
    <div class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div data-aos="zoom-in" class="max-w-4xl mx-auto text-center bg-gradient-to-br from-blue-600 via-purple-700 to-pink-700 text-white rounded-2xl p-10 md:p-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Menjadi Sponsor?</h2>
                <p class="text-xl md:text-2xl mb-10 text-white/80 leading-relaxed">
                    Bergabunglah dengan komunitas sponsor yang telah memberikan dampak positif bagi pendidikan Indonesia
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        @if(auth()->user()->hasRole(['Admin', 'Sponsor']))
                            <a href="{{ auth()->user()->dashboard_url }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-indigo-600 rounded-xl font-semibold shadow-lg transition-transform duration-300 hover:scale-105 active:scale-95">
                                Akses Dashboard
                            </a>
                        @else
                            <a href="{{ route('sponsorships.create') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-indigo-600 rounded-xl font-semibold shadow-lg transition-transform duration-300 hover:scale-105 active:scale-95">
                                Daftar sebagai Sponsor
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-indigo-600 rounded-xl font-semibold shadow-lg transition-transform duration-300 hover:scale-105 active:scale-95">
                            Masuk untuk Mendaftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            AOS.init({
                duration: 800,
                once: true,
            });
        </script>
    @endpush

</x-layouts.app>