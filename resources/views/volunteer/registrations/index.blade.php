<x-layouts.app>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 via-green-700 to-emerald-600 py-12">
            <div class="container mx-auto px-4">
                <div class="text-center text-white">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                        <i class="fas fa-list-check text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold mb-2">Pendaftaran Relawan Saya</h1>
                    <p class="text-green-100 max-w-2xl mx-auto">
                        Lihat status pendaftaran Anda sebagai relawan dalam berbagai pelatihan
                    </p>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <!-- Navigation -->
            <div class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400 mb-6">
                <a href="{{ route('dashboard.relawan') }}" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                    <i class="fas fa-home mr-1"></i>Dashboard
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('volunteer.trainings.index') }}" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                    Pelatihan Relawan
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-900 dark:text-white font-medium">Pendaftaran Saya</span>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-list text-blue-600 dark:text-blue-400"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total</p>
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $registrations->total() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-600 dark:text-yellow-400"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Menunggu</p>
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $registrations->where('status', 'registered')->count() }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 dark:text-green-400"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Dikonfirmasi</p>
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $registrations->where('status', 'confirmed')->count() }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-times-circle text-red-600 dark:text-red-400"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Dibatalkan</p>
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $registrations->where('status', 'cancelled')->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <a href="{{ route('volunteer.trainings.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Daftar Pelatihan Baru
                </a>
            </div>

            @if($registrations->count() > 0)
                <!-- Registrations List -->
                <div class="space-y-6">
                    @foreach($registrations as $registration)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <div class="p-6">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                    <!-- Training Info -->
                                    <div class="flex-1 mb-4 lg:mb-0">
                                        <div class="flex items-start space-x-4">
                                            <!-- Training Image -->
                                            <div class="flex-shrink-0">
                                                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg overflow-hidden">
                                                    @if($registration->training->image)
                                                        <img src="{{ $registration->training->image_url }}" 
                                                             alt="{{ $registration->training->title }}" 
                                                             class="w-full h-full object-cover">
                                                    @else
                                                        <div class="flex items-center justify-center h-full">
                                                            <i class="fas fa-chalkboard-teacher text-white text-lg"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Training Details -->
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                                    {{ $registration->training->title }}
                                                </h3>
                                                
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-gray-600 dark:text-gray-400">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-user-tie w-4 text-green-500 mr-2"></i>
                                                        <span>{{ $registration->training->instructor_name }}</span>
                                                    </div>
                                                    
                                                    <div class="flex items-center">
                                                        <i class="fas fa-calendar w-4 text-green-500 mr-2"></i>
                                                        <span>{{ $registration->training->start_date->format('d M Y') }}</span>
                                                    </div>
                                                    
                                                    <div class="flex items-center">
                                                        <i class="fas fa-map-marker-alt w-4 text-green-500 mr-2"></i>
                                                        <span>{{ $registration->training->location ?: 'Online' }}</span>
                                                    </div>
                                                    
                                                    <div class="flex items-center">
                                                        <i class="fas fa-clock w-4 text-green-500 mr-2"></i>
                                                        <span>Daftar: {{ $registration->registered_at->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status and Actions -->
                                    <div class="flex flex-col lg:items-end space-y-3">
                                        <!-- Status Badge -->
                                        <div class="flex justify-start lg:justify-end">
                                            @if($registration->status === 'registered')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                    <i class="fas fa-clock mr-2"></i>Menunggu Konfirmasi
                                                </span>
                                            @elseif($registration->status === 'confirmed')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                                    <i class="fas fa-check-circle mr-2"></i>Dikonfirmasi
                                                </span>
                                            @elseif($registration->status === 'cancelled')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 border border-red-200">
                                                    <i class="fas fa-times-circle mr-2"></i>Dibatalkan
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex space-x-2">
                                            <a href="{{ route('volunteer.trainings.show', $registration->training) }}" 
                                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                                                <i class="fas fa-eye mr-2"></i>
                                                Detail
                                            </a>
                                            
                                            @if($registration->status === 'registered')
                                                <form method="POST" action="{{ route('volunteer.trainings.cancel', $registration->training) }}" 
                                                      onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pendaftaran?')" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                                                        <i class="fas fa-times mr-2"></i>
                                                        Batalkan
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if($registration->status === 'confirmed' && $registration->confirmed_at)
                                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                        <div class="flex items-center text-sm text-green-600 dark:text-green-400">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            <span>Dikonfirmasi pada {{ $registration->confirmed_at->format('d M Y H:i') }}</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Expandable Details -->
                                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                    <button type="button" 
                                            onclick="toggleDetails('{{ $registration->id }}')"
                                            class="flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transition-colors">
                                        <i class="fas fa-chevron-down mr-2 transform transition-transform" id="icon-{{ $registration->id }}"></i>
                                        Lihat Detail Pendaftaran
                                    </button>
                                    
                                    <div id="details-{{ $registration->id }}" class="hidden mt-3 space-y-3">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Motivasi</label>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                                {{ $registration->motivation }}
                                            </p>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Keahlian</label>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                                {{ $registration->skills }}
                                            </p>
                                        </div>
                                        
                                        @if($registration->experience)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pengalaman</label>
                                                <p class="text-sm text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                                    {{ $registration->experience }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($registrations->hasPages())
                    <div class="mt-8">
                        {{ $registrations->links() }}
                    </div>
                @endif

            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="mx-auto h-24 w-24 text-gray-400 dark:text-gray-600 mb-6">
                        <i class="fas fa-clipboard-list text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum ada pendaftaran</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                        Anda belum mendaftar sebagai relawan untuk pelatihan apapun. Mulai bergabung sekarang!
                    </p>
                    <a href="{{ route('volunteer.trainings.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-hand-paper mr-2"></i>
                        Daftar sebagai Relawan
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Toggle Details Script -->
    <script>
        function toggleDetails(id) {
            const details = document.getElementById('details-' + id);
            const icon = document.getElementById('icon-' + id);
            
            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                details.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }
    </script>
</x-layouts.app>
