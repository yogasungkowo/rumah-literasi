<x-layouts.app>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Header dengan Gradient -->
        <div class="bg-gradient-to-r from-green-600 via-green-700 to-emerald-600 py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <!-- Navigation -->
                    <div class="flex items-center space-x-2 text-sm text-green-100 mb-6">
                        <a href="{{ route('dashboard.relawan') }}" class="hover:text-white transition-colors">
                            <i class="fas fa-home mr-1"></i>Dashboard
                        </a>
                        <i class="fas fa-chevron-right text-xs"></i>
                        <a href="{{ route('volunteer.trainings.index') }}" class="hover:text-white transition-colors">
                            Pelatihan Relawan
                        </a>
                        <i class="fas fa-chevron-right text-xs"></i>
                        <span class="text-white font-medium">Detail Pelatihan</span>
                    </div>

                    <div class="flex flex-col lg:flex-row lg:items-start lg:space-x-12 gap-8">
                        <!-- Training Image -->
                        <div class="flex-shrink-0 lg:w-72">
                            <div class="relative group">
                                <div class="w-full h-48 lg:h-64 bg-gradient-to-br from-white/20 to-white/10 rounded-2xl overflow-hidden backdrop-blur-sm shadow-2xl border border-white/30 group-hover:shadow-3xl transition-all duration-300">
                                    @if($training->image)
                                        <img src="{{ $training->image_url }}" 
                                             alt="{{ $training->title }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="flex items-center justify-center h-full bg-gradient-to-br from-emerald-500/20 to-green-600/20">
                                            <i class="fas fa-chalkboard-teacher text-white text-6xl opacity-80"></i>
                                        </div>
                                    @endif
                                </div>
                                <!-- Image overlay decoration -->
                                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-400/20 to-green-500/20 rounded-2xl blur opacity-75 group-hover:opacity-100 transition duration-300 -z-10"></div>
                            </div>
                        </div>

                        <!-- Training Info -->
                        <div class="flex-1 text-white space-y-8">
                            <!-- Title Section -->
                            <div class="space-y-4">
                                <h1 class="text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight bg-gradient-to-r from-white to-emerald-100 bg-clip-text text-transparent">
                                    {{ $training->title }}
                                </h1>
                                
                                <!-- Status Badge -->
                                <div class="flex items-center">
                                    @if($isRegistered)
                                        @php $status = $userRegistration->status @endphp
                                        @if($status === 'registered')
                                            <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-semibold bg-gradient-to-r from-yellow-400 to-orange-400 text-yellow-900 shadow-lg">
                                                <i class="fas fa-clock mr-2"></i>Menunggu Konfirmasi
                                            </span>
                                        @elseif($status === 'confirmed')
                                            <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-semibold bg-gradient-to-r from-green-400 to-emerald-400 text-green-900 shadow-lg">
                                                <i class="fas fa-check-circle mr-2"></i>Terkonfirmasi
                                            </span>
                                        @elseif($status === 'cancelled')
                                            <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-semibold bg-gradient-to-r from-red-400 to-pink-400 text-red-900 shadow-lg">
                                                <i class="fas fa-times-circle mr-2"></i>Dibatalkan
                                            </span>
                                        @endif
                                    @else
                                        <span class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-semibold bg-white/20 text-white border border-white/40 shadow-lg backdrop-blur-sm">
                                            <i class="fas fa-plus-circle mr-2"></i>Belum Terdaftar
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Training Meta -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="group bg-gradient-to-r from-white/15 to-white/10 rounded-xl px-6 py-5 backdrop-blur-sm shadow-xl border border-white/30 hover:from-white/20 hover:to-white/15 transition-all duration-300 hover:-translate-y-1">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-white/30 transition-colors duration-300">
                                            <i class="fas fa-user-tie text-white text-lg"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-white/70 text-sm font-medium mb-1">Instruktur</div>
                                            <div class="text-white font-semibold text-lg">{{ $training->instructor_name }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="group bg-gradient-to-r from-white/15 to-white/10 rounded-xl px-6 py-5 backdrop-blur-sm shadow-xl border border-white/30 hover:from-white/20 hover:to-white/15 transition-all duration-300 hover:-translate-y-1">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-white/30 transition-colors duration-300">
                                            <i class="fas fa-calendar text-white text-lg"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-white/70 text-sm font-medium mb-1">Tanggal</div>
                                            <div class="text-white font-semibold">{{ $training->start_date->format('d M Y') }} - {{ $training->end_date->format('d M Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="group bg-gradient-to-r from-white/15 to-white/10 rounded-xl px-6 py-5 backdrop-blur-sm shadow-xl border border-white/30 hover:from-white/20 hover:to-white/15 transition-all duration-300 hover:-translate-y-1">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-white/30 transition-colors duration-300">
                                            <i class="fas fa-map-marker-alt text-white text-lg"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-white/70 text-sm font-medium mb-1">Lokasi</div>
                                            <div class="text-white font-semibold">{{ $training->location ?: 'Online' }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="group bg-gradient-to-r from-white/15 to-white/10 rounded-xl px-6 py-5 backdrop-blur-sm shadow-xl border border-white/30 hover:from-white/20 hover:to-white/15 transition-all duration-300 hover:-translate-y-1">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-white/30 transition-colors duration-300">
                                            <i class="fas fa-users text-white text-lg"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-white/70 text-sm font-medium mb-1">Relawan</div>
                                            <div class="text-white font-semibold">{{ $training->confirmed_volunteers_count }} terkonfirmasi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                @if(!$isRegistered)
                                    <a href="{{ route('volunteer.trainings.register', $training) }}" 
                                       class="group inline-flex items-center justify-center px-8 py-4 bg-white hover:bg-gray-100 text-green-600 font-semibold rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 transform">
                                        <i class="fas fa-hand-paper mr-3 text-lg"></i>
                                        Daftar sebagai Relawan
                                    </a>
                                @elseif($userRegistration->status === 'registered')
                                    <form method="POST" action="{{ route('volunteer.trainings.cancel', $training) }}" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pendaftaran?')" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="inline-flex items-center justify-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">
                                            <i class="fas fa-times mr-2"></i>
                                            Batalkan Pendaftaran
                                        </button>
                                    </form>
                                @endif
                                
                                <a href="{{ route('volunteer.trainings.index') }}" 
                                   class="inline-flex items-center justify-center px-8 py-4 bg-white/20 hover:bg-white/30 text-white font-semibold rounded-xl backdrop-blur-sm border border-white/40 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 transform">
                                    <i class="fas fa-arrow-left mr-3 text-lg"></i>
                                    Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Description -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                <i class="fas fa-info-circle text-green-500 mr-2"></i>
                                Deskripsi Pelatihan
                            </h3>
                            <div class="prose dark:prose-invert max-w-none">
                                {!! $training->description !!}
                            </div>
                        </div>

                        @if($training->requirements)
                        <!-- Requirements -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                <i class="fas fa-list-check text-blue-500 mr-2"></i>
                                Persyaratan
                            </h3>
                            <div class="prose dark:prose-invert max-w-none">
                                {!! $training->requirements !!}
                            </div>
                        </div>
                        @endif

                        @if($training->schedule)
                        <!-- Schedule -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                <i class="fas fa-calendar-alt text-purple-500 mr-2"></i>
                                Jadwal Pelatihan
                            </h3>
                            <div class="space-y-4">
                                @foreach($training->schedule as $day => $daySchedule)
                                    <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-4">
                                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2 capitalize">
                                            {{ str_replace('_', ' ', $day) }} - {{ \Carbon\Carbon::parse($daySchedule['date'])->format('d M Y') }}
                                        </h4>
                                        <div class="space-y-2">
                                            @foreach($daySchedule['sessions'] as $session)
                                                <div class="flex items-start space-x-3 text-sm">
                                                    <span class="bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 px-2 py-1 rounded text-xs font-medium">
                                                        {{ $session['time'] }}
                                                    </span>
                                                    <div>
                                                        <div class="font-medium text-gray-900 dark:text-white">{{ $session['topic'] }}</div>
                                                        <div class="text-gray-600 dark:text-gray-400">{{ $session['description'] }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($isRegistered && $userRegistration)
                        <!-- My Registration Details -->
                        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-6">
                            <h3 class="text-xl font-semibold text-green-800 dark:text-green-300 mb-4">
                                <i class="fas fa-user-check mr-2"></i>
                                Detail Pendaftaran Anda
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-1">Status</label>
                                    <div class="text-green-900 dark:text-green-100 capitalize">{{ $userRegistration->status }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-1">Tanggal Daftar</label>
                                    <div class="text-green-900 dark:text-green-100">{{ $userRegistration->registered_at->format('d M Y H:i') }}</div>
                                </div>
                                @if($userRegistration->confirmed_at)
                                <div>
                                    <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-1">Tanggal Konfirmasi</label>
                                    <div class="text-green-900 dark:text-green-100">{{ $userRegistration->confirmed_at->format('d M Y H:i') }}</div>
                                </div>
                                @endif
                                <div>
                                    <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-1">Motivasi</label>
                                    <div class="text-green-900 dark:text-green-100">{{ $userRegistration->motivation }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-1">Keahlian</label>
                                    <div class="text-green-900 dark:text-green-100">{{ $userRegistration->skills }}</div>
                                </div>
                                @if($userRegistration->experience)
                                <div>
                                    <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-1">Pengalaman</label>
                                    <div class="text-green-900 dark:text-green-100">{{ $userRegistration->experience }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <!-- Training Info Card -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                <i class="fas fa-info text-blue-500 mr-2"></i>
                                Informasi Pelatihan
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Status</div>
                                    <div class="font-medium text-gray-900 dark:text-white capitalize">
                                        @if($training->status === 'published')
                                            <span class="text-green-600">Dibuka</span>
                                        @elseif($training->status === 'ongoing')
                                            <span class="text-blue-600">Berlangsung</span>
                                        @else
                                            <span class="text-gray-600">{{ $training->status }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                @if($training->price > 0)
                                <div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Biaya</div>
                                    <div class="font-medium text-gray-900 dark:text-white">Rp {{ number_format($training->price, 0, ',', '.') }}</div>
                                </div>
                                @else
                                <div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Biaya</div>
                                    <div class="font-medium text-green-600">Gratis</div>
                                </div>
                                @endif
                                
                                <div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Relawan Terkonfirmasi</div>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $training->confirmed_volunteers_count }} orang</div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        @if($training->instructor_email || $training->instructor_phone)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                <i class="fas fa-phone text-green-500 mr-2"></i>
                                Kontak Instruktur
                            </h3>
                            <div class="space-y-3">
                                @if($training->instructor_email)
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-gray-400 w-5 mr-3"></i>
                                    <a href="mailto:{{ $training->instructor_email }}" 
                                       class="text-blue-600 dark:text-blue-400 hover:underline">
                                        {{ $training->instructor_email }}
                                    </a>
                                </div>
                                @endif
                                
                                @if($training->instructor_phone)
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-gray-400 w-5 mr-3"></i>
                                    <a href="tel:{{ $training->instructor_phone }}" 
                                       class="text-blue-600 dark:text-blue-400 hover:underline">
                                        {{ $training->instructor_phone }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
