<x-layouts.integrated-dashboard title="Dashboard Investor">
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm animate-fade-in" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-sm animate-fade-in" role="alert">
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Enhanced Welcome Section with Profile -->
    <div class="mb-8 bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 dark:from-indigo-700 dark:via-purple-700 dark:to-blue-800 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="1.5" fill="white"/>
                <circle cx="40" cy="20" r="1.5" fill="white"/>
                <circle cx="60" cy="20" r="1.5" fill="white"/>
                <circle cx="80" cy="20" r="1.5" fill="white"/>
                <circle cx="20" cy="40" r="1.5" fill="white"/>
                <circle cx="40" cy="40" r="1.5" fill="white"/>
                <circle cx="60" cy="40" r="1.5" fill="white"/>
                <circle cx="80" cy="40" r="1.5" fill="white"/>
                <circle cx="20" cy="60" r="1.5" fill="white"/>
                <circle cx="40" cy="60" r="1.5" fill="white"/>
                <circle cx="60" cy="60" r="1.5" fill="white"/>
                <circle cx="80" cy="60" r="1.5" fill="white"/>
                <circle cx="20" cy="80" r="1.5" fill="white"/>
                <circle cx="40" cy="80" r="1.5" fill="white"/>
                <circle cx="60" cy="80" r="1.5" fill="white"/>
                <circle cx="80" cy="80" r="1.5" fill="white"/>
            </svg>
        </div>
        
        <div class="relative z-10">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ $user->investor?->image_profile_url ?? $user->avatar_url }}" 
                             alt="Profile" 
                             class="w-20 h-20 rounded-2xl object-cover border-3 border-white/30 shadow-lg">
                        <div class="absolute -bottom-2 -right-2 bg-green-500 w-6 h-6 rounded-full border-2 border-white flex items-center justify-center">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h1>
                        <p class="text-white/80 text-lg mb-2">{{ $user->investor?->company_name ?? $user->organization ?? 'Kelola profil perusahaan Anda' }}</p>
                        <div class="flex items-center space-x-3">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-white/20 backdrop-blur-sm">
                                <i class="fas fa-handshake mr-2"></i>
                                Investor Partner
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-500/20 text-green-200">
                                <i class="fas fa-shield-check mr-2"></i>
                                Verified
                            </span>
                        </div>
                    </div>
                </div>
                <button onclick="toggleProfileEdit()" class="bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 border border-white/20">
                    <i class="fas fa-user-edit mr-2"></i>Edit Profil
                </button>
            </div>
        </div>
    </div>

    <!-- Contact Us Button -->
    <div class="mb-8">
        <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105">
            <i class="fas fa-phone mr-2"></i>
            Hubungi Kami
        </a>
    </div>

    <!-- Enhanced Profile Edit Modal -->
    <div id="profile-edit-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
        <div class="relative max-w-md w-full bg-white dark:bg-gray-800 rounded-2xl shadow-2xl transform transition-all">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Edit Profil Investor</h3>
                    <button onclick="toggleProfileEdit()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form action="{{ route('investor.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Nama Perusahaan</label>
                        <input type="text" name="company_name" 
                               value="{{ old('company_name', $user->investor?->company_name ?? $user->organization) }}"
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:text-white transition-all"
                               placeholder="Masukkan nama perusahaan"
                               required>
                        @error('company_name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Logo/Foto Profil</label>
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 rounded-xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                                <img src="{{ $user->investor?->image_profile_url ?? $user->avatar_url }}" 
                                     alt="Current" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <input type="file" name="image_profile" accept="image/*"
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:text-white">
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG (max 2MB)</p>
                            </div>
                        </div>
                        @error('image_profile')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex space-x-3 pt-4">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                        <button type="button" onclick="toggleProfileEdit()" class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-xl font-semibold transition-all duration-300">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $sponsorships = $user->sponsorships ?? collect();
            $pendingCount = $sponsorships->where('status', 'pending')->count();
            $activeCount = $sponsorships->where('status', 'active')->count();
            $completedCount = $sponsorships->where('status', 'completed')->count();
            $totalAmount = $sponsorships->whereIn('status', ['active', 'completed'])->sum('amount');
        @endphp

        <!-- Pending Proposals -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Proposal Pending</h3>
                        <div class="p-3 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl shadow-lg">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $pendingCount }}</p>
                        <span class="text-sm text-yellow-600 font-medium">proposal</span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Menunggu review admin</p>
                </div>
            </div>
        </div>

        <!-- Active Sponsorships -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Sponsorship Aktif</h3>
                        <div class="p-3 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl shadow-lg">
                            <i class="fas fa-check-circle text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $activeCount }}</p>
                        <span class="text-sm text-green-600 font-medium">program</span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Sedang berjalan</p>
                </div>
            </div>
        </div>

        <!-- Completed Sponsorships -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Total Selesai</h3>
                        <div class="p-3 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl shadow-lg">
                            <i class="fas fa-trophy text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-baseline space-x-2">
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $completedCount }}</p>
                        <span class="text-sm text-blue-600 font-medium">program</span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Berhasil diselesaikan</p>
                </div>
            </div>
        </div>

        <!-- Total Investment -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Total Investasi</h3>
                        <div class="p-3 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl shadow-lg">
                            <i class="fas fa-coins text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-baseline space-x-1">
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">Rp</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalAmount, 0, ',', '.') }}</p>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Total kontribusi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Create New Proposal -->
        <div class="group bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden transform transition-all duration-300 hover:scale-105">
            <!-- Background Effects -->
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full"></div>
            <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-white/5 rounded-full"></div>
            
            <div class="relative z-10">
                <div class="flex items-center mb-4">
                    <div class="p-4 bg-white/20 rounded-2xl backdrop-blur-sm mr-4">
                        <i class="fas fa-rocket text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-1">Buat Proposal Baru</h3>
                        <p class="text-purple-100 text-sm">Wujudkan ide sponsorship Anda</p>
                    </div>
                </div>
                
                <p class="text-purple-100 mb-6 leading-relaxed">
                    Ajukan proposal sponsorship untuk mendukung program literasi dan ciptakan dampak positif bagi masyarakat.
                </p>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('sponsorships.create') }}" 
                       class="inline-flex items-center bg-white text-purple-700 px-6 py-3 rounded-xl font-semibold hover:bg-purple-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Mulai Proposal
                    </a>
                    <div class="text-white/60">
                        <i class="fas fa-arrow-right text-2xl transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Sponsorships -->
        <div class="group bg-gradient-to-br from-blue-600 via-blue-700 to-cyan-800 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden transform transition-all duration-300 hover:scale-105">
            <!-- Background Effects -->
            <div class="absolute top-0 left-0 -mt-6 -ml-6 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="absolute bottom-0 right-0 -mb-10 -mr-10 w-36 h-36 bg-white/5 rounded-full"></div>
            
            <div class="relative z-10">
                <div class="flex items-center mb-4">
                    <div class="p-4 bg-white/20 rounded-2xl backdrop-blur-sm mr-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-1">Kelola Sponsorship</h3>
                        <p class="text-blue-100 text-sm">Pantau semua program Anda</p>
                    </div>
                </div>
                
                <p class="text-blue-100 mb-6 leading-relaxed">
                    Lihat status, kelola, dan pantau progress dari semua proposal sponsorship yang telah Anda ajukan.
                </p>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('sponsorships.index') }}" 
                       class="inline-flex items-center bg-white text-blue-700 px-6 py-3 rounded-xl font-semibold hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-list-alt mr-2"></i>
                        Lihat Semua
                    </a>
                    <div class="text-white/60">
                        <i class="fas fa-arrow-right text-2xl transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Recent Sponsorships -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 px-8 py-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Sponsorship Terbaru</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola dan pantau proposal sponsorship Anda</p>
                </div>
                <a href="{{ route('sponsorships.index') }}" 
                   class="inline-flex items-center text-purple-600 hover:text-purple-700 dark:text-purple-400 font-semibold bg-purple-50 hover:bg-purple-100 dark:bg-purple-900/20 dark:hover:bg-purple-900/40 px-4 py-2 rounded-xl transition-all duration-300">
                    Lihat Semua 
                    <i class="fas fa-arrow-right ml-2 transform transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>

        <div class="p-8">
            @if($sponsorships->count() > 0)
                <div class="space-y-4">
                    @foreach($sponsorships->take(5) as $sponsorship)
                        <div class="group flex items-center justify-between p-6 bg-gray-50 dark:bg-gray-700/50 hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 dark:hover:from-gray-700 dark:hover:to-gray-600 rounded-2xl border border-gray-200 dark:border-gray-600 hover:border-purple-200 dark:hover:border-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                            <div class="flex items-center space-x-4 flex-1">
                                <!-- Company Logo/Icon -->
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                        {{ strtoupper(substr($sponsorship->company_name, 0, 2)) }}
                                    </div>
                                </div>
                                
                                <!-- Sponsorship Info -->
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-gray-900 dark:text-white text-lg group-hover:text-purple-700 dark:group-hover:text-purple-300 transition-colors">
                                        {{ $sponsorship->company_name }}
                                    </h4>
                                    <div class="flex items-center space-x-3 mt-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-tag mr-1 text-xs"></i>
                                            {{ $sponsorship->sponsorship_type_label }}
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300">
                                            <i class="fas fa-coins mr-1 text-xs"></i>
                                            Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 flex items-center">
                                        <i class="fas fa-clock mr-1 text-xs"></i>
                                        {{ $sponsorship->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Status and Actions -->
                            <div class="flex items-center space-x-4">
                                <span class="px-4 py-2 text-sm font-bold rounded-xl
                                    @if($sponsorship->status === 'pending') bg-gradient-to-r from-yellow-400 to-orange-500 text-white
                                    @elseif($sponsorship->status === 'approved') bg-gradient-to-r from-blue-400 to-blue-600 text-white
                                    @elseif($sponsorship->status === 'active') bg-gradient-to-r from-green-400 to-emerald-600 text-white
                                    @elseif($sponsorship->status === 'completed') bg-gradient-to-r from-gray-400 to-gray-600 text-white
                                    @else bg-gradient-to-r from-red-400 to-red-600 text-white
                                    @endif shadow-lg">
                                    @if($sponsorship->status === 'pending')
                                        <i class="fas fa-hourglass-half mr-1"></i>
                                    @elseif($sponsorship->status === 'approved')
                                        <i class="fas fa-thumbs-up mr-1"></i>
                                    @elseif($sponsorship->status === 'active')
                                        <i class="fas fa-play mr-1"></i>
                                    @elseif($sponsorship->status === 'completed')
                                        <i class="fas fa-check-double mr-1"></i>
                                    @else
                                        <i class="fas fa-times mr-1"></i>
                                    @endif
                                    {{ $sponsorship->status_label }}
                                </span>
                                <a href="{{ route('sponsorships.show', $sponsorship) }}" 
                                   class="p-3 text-purple-600 hover:text-white hover:bg-purple-600 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-600 rounded-xl border-2 border-purple-200 dark:border-purple-700 hover:border-purple-600 transition-all duration-300 transform hover:scale-110">
                                    <i class="fas fa-eye text-lg"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="relative mb-8">
                        <div class="w-32 h-32 bg-gradient-to-br from-purple-100 to-blue-100 dark:from-purple-900/20 dark:to-blue-900/20 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <i class="fas fa-handshake text-purple-500 text-4xl"></i>
                        </div>
                        <div class="absolute top-0 right-1/4 w-6 h-6 bg-yellow-400 rounded-full animate-bounce"></div>
                        <div class="absolute bottom-4 left-1/4 w-4 h-4 bg-blue-400 rounded-full animate-pulse"></div>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Belum Ada Sponsorship</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-md mx-auto leading-relaxed">
                        Mulai perjalanan Anda dalam mendukung literasi dengan membuat proposal sponsorship pertama
                    </p>
                    
                    <a href="{{ route('sponsorships.create') }}" 
                       class="inline-flex items-center bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-4 rounded-2xl font-bold transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <i class="fas fa-plus mr-3"></i>
                        Buat Proposal Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Enhanced JavaScript and Animations -->
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scale-in {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        .animate-scale-in {
            animation: scale-in 0.3s ease-out forwards;
        }

        /* Smooth hover effects */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Loading spinner for form submissions */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>

    <script>
        // Enhanced profile edit modal with animations
        function toggleProfileEdit() {
            const modal = document.getElementById('profile-edit-modal');
            const modalContent = modal.querySelector('.relative');
            
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                // Trigger animation
                setTimeout(() => {
                    modal.classList.add('animate-fade-in');
                    modalContent.classList.add('animate-scale-in');
                }, 10);
            } else {
                modal.classList.remove('animate-fade-in');
                modalContent.classList.remove('animate-scale-in');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // Close modal when clicking outside
        document.getElementById('profile-edit-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                toggleProfileEdit();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('profile-edit-modal');
                if (!modal.classList.contains('hidden')) {
                    toggleProfileEdit();
                }
            }
        });

        // Enhanced form submission with loading state
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.classList.add('loading');
                        submitBtn.disabled = true;
                        
                        // Re-enable if form validation fails
                        setTimeout(() => {
                            submitBtn.classList.remove('loading');
                            submitBtn.disabled = false;
                        }, 5000);
                    }
                });
            });

            // Add entrance animations to cards
            const cards = document.querySelectorAll('.hover-lift');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('animate-fade-in');
                        }, index * 100);
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                card.classList.add('hover-lift');
                observer.observe(card);
            });

            // Auto-refresh sponsorship data every 30 seconds
            setInterval(() => {
                // Only refresh if user is active and page is visible
                if (!document.hidden && Date.now() - lastActivity < 300000) { // 5 minutes
                    fetch(window.location.href, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        // Update only the sponsorship section
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newContent = doc.querySelector('.bg-white.dark\\:bg-gray-800.rounded-2xl');
                        const currentContent = document.querySelector('.bg-white.dark\\:bg-gray-800.rounded-2xl');
                        
                        if (newContent && currentContent) {
                            currentContent.replaceWith(newContent);
                        }
                    })
                    .catch(error => console.log('Auto-refresh failed:', error));
                }
            }, 30000);

            // Track user activity
            let lastActivity = Date.now();
            ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart'].forEach(event => {
                document.addEventListener(event, () => {
                    lastActivity = Date.now();
                });
            });
        });

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Toast notifications for better UX
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-x-full ${
                type === 'success' ? 'bg-green-600' : 'bg-red-600'
            }`;
            toast.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${type === 'success' ? 'check' : 'exclamation-triangle'} mr-2"></i>
                    ${message}
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);
            
            // Animate out and remove
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
    </script>
</x-layouts.integrated-dashboard>
