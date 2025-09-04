<x-layouts.app>
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 text-white py-24 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="7" cy="7" r="1"/%3E%3Ccircle cx="27" cy="7" r="1"/%3E%3Ccircle cx="47" cy="7" r="1"/%3E%3Ccircle cx="7" cy="27" r="1"/%3E%3Ccircle cx="27" cy="27" r="1"/%3E%3Ccircle cx="47" cy="27" r="1"/%3E%3Ccircle cx="7" cy="47" r="1"/%3E%3Ccircle cx="27" cy="47" r="1"/%3E%3Ccircle cx="47" cy="47" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        
        <div class="relative max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-8 bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent leading-tight">
                    Investasi untuk Masa Depan Literasi
                </h1>
                <p class="text-xl md:text-2xl mb-12 text-purple-100 leading-relaxed">
                    Bergabunglah dengan komunitas investor yang percaya pada kekuatan literasi untuk mengubah Indonesia menjadi bangsa yang lebih cerdas dan maju
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="{{ route('login') }}" class="group bg-white text-purple-900 hover:bg-purple-50 px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center">
                        <i class="fas fa-user-plus mr-3 group-hover:scale-110 transition-transform"></i>
                        Bergabung Sebagai Investor
                    </a>
                    <a href="{{ route('sponsorships.create') }}" class="group border-2 border-white text-white hover:bg-white hover:text-purple-900 px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center">
                        <i class="fas fa-lightbulb mr-3 group-hover:scale-110 transition-transform"></i>
                        Ajukan Proposal
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-purple-400/20 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-32 h-32 bg-pink-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-indigo-400/20 rounded-full blur-xl animate-pulse delay-500"></div>
    </div>

    <!-- Login Notice -->
    @guest
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-700 p-6 rounded-2xl shadow-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center">
                        <i class="fas fa-info-circle text-blue-600 dark:text-blue-400 text-lg"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2">Mulai Perjalanan Investasi Anda</h3>
                    <p class="text-blue-700 dark:text-blue-300 mb-4">
                        Untuk mengajukan proposal sponsorship dan bergabung dengan komunitas investor literasi, silakan masuk atau buat akun terlebih dahulu.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk ke Akun
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors font-medium">
                            <i class="fas fa-user-plus mr-2"></i>
                            Daftar Akun Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest

    <!-- Investor Statistics -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Statistik Investasi Kami</h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                Melihat dampak nyata dari kontribusi para investor dalam membangun ekosistem literasi Indonesia
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <!-- Total Investor -->
            <div class="group bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2">{{ $stats['total_investors'] }}</div>
                <div class="text-gray-700 dark:text-gray-300 font-medium">Total Investor</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Terdaftar aktif</div>
            </div>

            <!-- Total Investasi -->
            <div class="group bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/30 dark:to-green-800/30 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2">Rp {{ number_format($stats['total_investment'] / 1000000, 1) }}M</div>
                <div class="text-gray-700 dark:text-gray-300 font-medium">Total Investasi</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Dana terkumpul</div>
            </div>

            <!-- Program Aktif -->
            <div class="group bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-project-diagram text-white text-2xl"></i>
                </div>
                <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">{{ $stats['active_programs'] }}</div>
                <div class="text-gray-700 dark:text-gray-300 font-medium">Program Aktif</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Sedang berjalan</div>
            </div>

            <!-- Tingkat Sukses -->
            <div class="group bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/30 dark:to-orange-800/30 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-award text-white text-2xl"></i>
                </div>
                <div class="text-4xl font-bold text-orange-600 dark:text-orange-400 mb-2">{{ $stats['success_rate'] }}%</div>
                <div class="text-gray-700 dark:text-gray-300 font-medium">Tingkat Sukses</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Program berhasil</div>
            </div>
        </div>
    </div>

    <!-- Featured Investors -->
    <div id="investor-list" class="bg-gradient-to-br from-gray-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-purple-900/20 py-20 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Investor Terpercaya Kami</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Para mitra yang telah bergabung dalam misi mencerdaskan bangsa melalui investasi literasi berkelanjutan
                </p>
            </div>

            <!-- Featured Investor Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse($featuredSponsorships->take(3) as $index => $sponsorship)
                    @php
                        $colorClasses = [
                            [
                                'gradient' => 'bg-gradient-to-br from-purple-500 to-purple-600',
                                'text' => 'text-purple-600 dark:text-purple-400',
                                'bg' => 'bg-purple-600',
                                'hover' => 'hover:bg-purple-700',
                                'light' => 'bg-purple-100 dark:bg-purple-900/30',
                                'light_hover' => 'hover:bg-purple-200 dark:hover:bg-purple-900/50'
                            ],
                            [
                                'gradient' => 'bg-gradient-to-br from-blue-500 to-blue-600',
                                'text' => 'text-blue-600 dark:text-blue-400',
                                'bg' => 'bg-blue-600',
                                'hover' => 'hover:bg-blue-700',
                                'light' => 'bg-blue-100 dark:bg-blue-900/30',
                                'light_hover' => 'hover:bg-blue-200 dark:hover:bg-blue-900/50'
                            ],
                            [
                                'gradient' => 'bg-gradient-to-br from-green-500 to-green-600',
                                'text' => 'text-green-600 dark:text-green-400',
                                'bg' => 'bg-green-600',
                                'hover' => 'hover:bg-green-700',
                                'light' => 'bg-green-100 dark:bg-green-900/30',
                                'light_hover' => 'hover:bg-green-200 dark:hover:bg-green-900/50'
                            ]
                        ];
                        $color = $colorClasses[$index % 3];
                        
                        $statusClasses = [
                            'pending' => 'bg-yellow-400 text-yellow-900',
                            'approved' => 'bg-blue-400 text-blue-900', 
                            'active' => 'bg-green-400 text-green-900',
                            'completed' => 'bg-green-400 text-green-900',
                            'rejected' => 'bg-red-400 text-red-900'
                        ];
                        $statusClass = $statusClasses[$sponsorship->status] ?? 'bg-gray-400 text-gray-900';
                        $initials = strtoupper(substr($sponsorship->company_name, 0, 2));
                    @endphp
                    
                    <!-- Investor Card {{ $index + 1 }} -->
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                        <div class="{{ $color['gradient'] }} p-6 text-white">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                    <span class="text-xl font-bold">{{ $initials }}</span>
                                </div>
                                <span class="{{ $statusClass }} px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $sponsorship->status_label }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold mb-2">{{ $sponsorship->company_name }}</h3>
                            <p class="text-white/80 text-sm">{{ $sponsorship->sponsorship_type_label }}</p>
                        </div>
                        <div class="p-6">
                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-1">{{ Str::limit($sponsorship->description, 50) }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $sponsorship->contact_person }}</p>
                            </div>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-2xl font-bold {{ $color['text'] }}">
                                        Rp {{ number_format($sponsorship->amount / 1000000, 0) }}M
                                    </p>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Total Investasi</p>
                                </div>
                                {{-- <div class="text-right">
                                    @if($sponsorship->start_date && $sponsorship->end_date)
                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $sponsorship->start_date->diffInMonths($sponsorship->end_date) }} Bulan
                                        </p>
                                        <p class="text-gray-500 dark:text-gray-400 text-sm">Durasi</p>
                                    @else
                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">Fleksibel</p>
                                        <p class="text-gray-500 dark:text-gray-400 text-sm">Durasi</p>
                                    @endif
                                </div> --}}
                            </div>
                            <div class="flex gap-3">
                                @auth
                                    <a href="{{ route('sponsorships.show', $sponsorship) }}" class="flex-1 {{ $color['bg'] }} text-white py-2 px-4 rounded-lg {{ $color['hover'] }} transition-colors text-sm font-medium text-center">
                                        <i class="fas fa-eye mr-2"></i>Detail
                                    </a>
                                @else
                                    <button onclick="alert('Silakan login untuk melihat detail')" class="flex-1 {{ $color['bg'] }} text-white py-2 px-4 rounded-lg {{ $color['hover'] }} transition-colors text-sm font-medium">
                                        <i class="fas fa-eye mr-2"></i>Detail
                                    </button>
                                @endauth
                                @if($sponsorship->proposal_file)
                                    <a href="{{ $sponsorship->proposal_url }}" target="_blank" class="{{ $color['light'] }} {{ $color['text'] }} py-2 px-4 rounded-lg {{ $color['light_hover'] }} transition-colors text-sm">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- No Data Message -->
                    <div class="col-span-full">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-12 text-center">
                            <div class="w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-building text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum Ada Investor</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-6">
                                Jadilah investor pertama yang bergabung dalam misi literasi Indonesia
                            </p>
                            <a href="{{ route('sponsorships.create') }}" class="bg-purple-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-purple-700 transition-colors">
                                <i class="fas fa-plus mr-2"></i>Ajukan Proposal Pertama
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- View All Investors -->
            <div class="text-center">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 max-w-2xl mx-auto">
                    <div class="flex items-center justify-center w-16 h-16 bg-purple-100 dark:bg-purple-900/30 rounded-full mx-auto mb-4">
                        <i class="fas fa-users text-purple-600 dark:text-purple-400 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Bergabung dengan {{ $stats['total_investors'] }}{{ $stats['total_investors'] > 0 ? '+' : '' }} Investor
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        @if($stats['total_investors'] > 0)
                            Lihat semua investor yang telah mempercayai platform kami untuk investasi literasi yang berkelanjutan
                        @else
                            Jadilah investor pertama yang bergabung dalam misi memajukan literasi Indonesia
                        @endif
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @auth
                            <a href="{{ route('sponsorships.index') }}" class="bg-purple-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <i class="fas fa-list mr-2"></i>
                                Lihat Investasi Saya
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="bg-purple-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                @if($stats['total_investors'] > 0)
                                    Lihat Semua Investor
                                @else
                                    Mulai Investasi
                                @endif
                            </a>
                        @endauth
                        <a href="{{ route('sponsorships.create') }}" class="border-2 border-purple-600 text-purple-600 dark:text-purple-400 px-8 py-3 rounded-xl font-semibold hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-all duration-300">
                            <i class="fas fa-plus mr-2"></i>
                            Ajukan Proposal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="relative bg-gradient-to-br from-purple-900 via-indigo-900 to-purple-800 text-white py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="7" cy="7" r="1"/%3E%3Ccircle cx="27" cy="7" r="1"/%3E%3Ccircle cx="47" cy="7" r="1"/%3E%3Ccircle cx="7" cy="27" r="1"/%3E%3Ccircle cx="27" cy="27" r="1"/%3E%3Ccircle cx="47" cy="27" r="1"/%3E%3Ccircle cx="7" cy="47" r="1"/%3E%3Ccircle cx="27" cy="47" r="1"/%3E%3Ccircle cx="47" cy="47" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        
        <div class="relative max-w-6xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">
                    Siap Menjadi Bagian dari Perubahan?
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-purple-100 leading-relaxed">
                    Bergabunglah dengan komunitas eksklusif investor literasi yang telah mempercayai kami untuk membangun masa depan Indonesia yang lebih cerdas
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <!-- Feature 1 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-purple-400/30 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">ROI Transparan</h3>
                        <p class="text-purple-200 text-sm">Pantau dampak investasi Anda secara real-time</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-purple-400/30 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Investasi Aman</h3>
                        <p class="text-purple-200 text-sm">Platform terpercaya dengan track record 98% sukses</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-purple-400/30 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hands-helping text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Dampak Nyata</h3>
                        <p class="text-purple-200 text-sm">Berkontribusi langsung pada kemajuan literasi bangsa</p>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('login') }}" class="group bg-white text-purple-900 hover:bg-purple-50 px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center">
                        <i class="fas fa-rocket mr-3 group-hover:scale-110 transition-transform"></i>
                        Mulai Investasi Sekarang
                    </a>
                    <a href="{{ route('register') }}" class="group border-2 border-white text-white hover:bg-white hover:text-purple-900 px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center">
                        <i class="fas fa-user-plus mr-3 group-hover:scale-110 transition-transform"></i>
                        Buat Akun Gratis
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-purple-400/20 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-indigo-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
    </div>

    <!-- Impact Section -->
    <div class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-900/20 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Dampak Nyata Investasi Kami</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Setiap rupiah yang diinvestasikan menciptakan perubahan berkelanjutan dalam ekosistem literasi Indonesia
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Books Distributed -->
                <div class="group text-center bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-purple-500 to-purple-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-book text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                            <i class="fas fa-plus text-purple-600 dark:text-purple-400 text-xs"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-2">{{ number_format($impact['books_distributed']) }}+</h3>
                    <p class="text-gray-900 dark:text-white font-semibold mb-1">Buku Didistribusikan</p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Ke seluruh Indonesia</p>
                </div>
                
                <!-- People Trained -->
                <div class="group text-center bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <i class="fas fa-arrow-up text-blue-600 dark:text-blue-400 text-xs"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">{{ number_format($impact['people_trained']) }}+</h3>
                    <p class="text-gray-900 dark:text-white font-semibold mb-1">Peserta Terlatih</p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Guru dan pengajar</p>
                </div>
                
                <!-- Regions Reached -->
                <div class="group text-center bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-green-500 to-green-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-green-600 dark:text-green-400 text-xs"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-green-600 dark:text-green-400 mb-2">{{ $impact['regions_reached'] }}+</h3>
                    <p class="text-gray-900 dark:text-white font-semibold mb-1">Daerah Terjangkau</p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Termasuk daerah terpencil</p>
                </div>
                
                <!-- Partner Institutions -->
                <div class="group text-center bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-orange-500 to-orange-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-building text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-orange-100 dark:bg-orange-900/30 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-orange-600 dark:text-orange-400 text-xs"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-orange-600 dark:text-orange-400 mb-2">{{ $impact['partner_institutions'] }}+</h3>
                    <p class="text-gray-900 dark:text-white font-semibold mb-1">Lembaga Partner</p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Sekolah dan institusi</p>
                </div>
            </div>
            
            <!-- Achievement Timeline -->
            <div class="mt-16 bg-gradient-to-r from-purple-50 to-blue-50 dark:from-purple-900/20 dark:to-blue-900/20 rounded-3xl p-8">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Pencapaian Terbaru</h3>
                    <p class="text-gray-600 dark:text-gray-300">Milestone penting yang telah kami raih bersama</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-4 h-4 bg-purple-500 rounded-full mx-auto mb-3"></div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Q4 2023</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Mencapai 1000 sekolah partner</p>
                    </div>
                    <div class="text-center">
                        <div class="w-4 h-4 bg-blue-500 rounded-full mx-auto mb-3"></div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Q1 2024</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Program literasi digital diluncurkan</p>
                    </div>
                    <div class="text-center">
                        <div class="w-4 h-4 bg-green-500 rounded-full mx-auto mb-3"></div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Q2 2024</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Total investasi mencapai Rp 2.5M</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
