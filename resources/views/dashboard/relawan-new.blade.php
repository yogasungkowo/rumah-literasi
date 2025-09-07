<x-layouts.integrated-dashboard title="Dashboard Relawan">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-emerald-500 to-teal-600 dark:from-emerald-600 dark:to-teal-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h2>
        <p class="text-emerald-100">Temukan pelatihan yang tersedia dan daftarkan diri Anda sebagai relawan untuk membangun Indonesia yang lebih berbudaya baca.</p>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pelatihan Tersedia</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['available_trainings']) }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                    <i class="fas fa-calendar-alt text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Menunggu Konfirmasi</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['pending_registrations']) }}</p>
                </div>
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full">
                    <i class="fas fa-clock text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Dikonfirmasi</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['confirmed_registrations']) }}</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                    <i class="fas fa-check-circle text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pendaftaran</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_registrations']) }}</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full">
                    <i class="fas fa-list-check text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Available Trainings -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pelatihan Tersedia</h3>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $availableTrainings->count() }} pelatihan</span>
                    </div>
                </div>
                <div class="p-6">
                    @if($availableTrainings->count() > 0)
                        <div class="space-y-6">
                            @foreach($availableTrainings as $training)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
                                        <div class="flex-1">
                                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                                                {{ $training->title }}
                                            </h4>
                                            <div class="text-gray-600 dark:text-gray-300 mb-4 prose prose-sm dark:prose-invert max-w-none">
                                                {!! Str::limit(strip_tags($training->description), 150) !!}
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                    <i class="fas fa-calendar-alt mr-2 text-green-500"></i>
                                                    {{ $training->start_date->format('d M Y') }} - {{ $training->end_date->format('d M Y') }}
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                    <i class="fas fa-clock mr-2 text-blue-500"></i>
                                                    {{ $training->start_time->format('H:i') }} - {{ $training->end_time->format('H:i') }} WIB
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                    <i class="fas fa-map-marker-alt mr-2 text-purple-500"></i>
                                                    {{ $training->location }}
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                    <i class="fas fa-users mr-2 text-orange-500"></i>
                                                    Maks. {{ $training->max_participants }} peserta
                                                </div>
                                            </div>
                                            
                                            @if($training->instructor)
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                                    <i class="fas fa-chalkboard-teacher mr-2 text-indigo-500"></i>
                                                    Instruktur: {{ $training->instructor }}
                                                </div>
                                            @endif

                                            @if($training->price > 0)
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                                    <i class="fas fa-money-bill-wave mr-2 text-green-500"></i>
                                                    Biaya: Rp {{ number_format($training->price, 0, ',', '.') }}
                                                </div>
                                            @else
                                                <div class="flex items-center text-sm text-green-600 dark:text-green-400 mb-4">
                                                    <i class="fas fa-gift mr-2"></i>
                                                    Gratis
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="lg:ml-6 mt-4 lg:mt-0 flex-shrink-0">
                                            <a href="{{ route('volunteer.trainings.show', $training) }}" 
                                               class="w-full lg:w-auto inline-flex items-center justify-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                                                <i class="fas fa-eye mr-2"></i>
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-6 text-center">
                            <a href="{{ route('volunteer.trainings.index') }}" 
                               class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                Lihat Semua Pelatihan
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-calendar-times text-3xl text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum ada pelatihan tersedia</h3>
                            <p class="text-gray-500 dark:text-gray-400">Saat ini belum ada pelatihan yang dapat Anda ikuti sebagai relawan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-8">
            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aksi Cepat</h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('volunteer.trainings.index') }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>
                        Jelajahi Pelatihan
                    </a>
                    <a href="{{ route('volunteer.trainings.my-registrations') }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-list mr-2"></i>
                        Lihat Pendaftaran Saya
                    </a>
                </div>
            </div>

            <!-- My Registrations -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pendaftaran Saya</h3>
                </div>
                <div class="p-6">
                    @if($myRegistrations->count() > 0)
                        <div class="space-y-4">
                            @foreach($myRegistrations->take(5) as $registration)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                    <h4 class="font-medium text-gray-900 dark:text-white text-sm mb-2">
                                        {{ $registration->training->title }}
                                    </h4>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                            @if($registration->status === 'registered')
                                                bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300
                                            @elseif($registration->status === 'confirmed')
                                                bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                            @elseif($registration->status === 'cancelled')
                                                bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                            @endif
                                        ">
                                            @if($registration->status === 'registered')
                                                <i class="fas fa-clock mr-1"></i> Menunggu
                                            @elseif($registration->status === 'confirmed')
                                                <i class="fas fa-check mr-1"></i> Dikonfirmasi
                                            @elseif($registration->status === 'cancelled')
                                                <i class="fas fa-times mr-1"></i> Ditolak
                                            @endif
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        <i class="fas fa-calendar mr-1"></i>
                                        {{ $registration->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        
                        @if($myRegistrations->count() > 5)
                            <div class="mt-4 text-center">
                                <a href="{{ route('volunteer.trainings.my-registrations') }}" 
                                   class="text-sm text-emerald-600 dark:text-emerald-400 hover:text-emerald-500">
                                    Lihat semua ({{ $myRegistrations->count() }})
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8">
                            <div class="mx-auto w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-clipboard-list text-2xl text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <h3 class="text-sm font-medium text-gray-900 dark:text-white mb-1">Belum ada pendaftaran</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Anda belum mendaftar untuk pelatihan apapun.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.integrated-dashboard>
