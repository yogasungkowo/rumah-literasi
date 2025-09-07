<x-layouts.app>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 via-green-700 to-emerald-600 py-12">
            <div class="container mx-auto px-4">
                <div class="text-center text-white">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                        <i class="fas fa-hands-helping text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold mb-2">Pelatihan untuk Relawan</h1>
                    <p class="text-green-100 max-w-2xl mx-auto">
                        Bergabunglah sebagai relawan dalam berbagai program pelatihan literasi dan berikan dampak positif untuk masyarakat
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
                <span class="text-gray-900 dark:text-white font-medium">Pelatihan Relawan</span>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Pelatihan Tersedia</h4>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $trainings->total() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-check text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Pendaftaran Saya</h4>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->volunteerRegistrations()->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-600 dark:text-yellow-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Status Menunggu</h4>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->volunteerRegistrations()->where('status', 'registered')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <a href="{{ route('volunteer.registrations.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                    <i class="fas fa-list mr-2"></i>
                    Pendaftaran Saya
                </a>
            </div>

            @if($trainings->count() > 0)
                <!-- Training List -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($trainings as $training)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-all duration-300">
                            <!-- Training Image -->
                            <div class="relative h-48 bg-gradient-to-br from-green-400 to-blue-500">
                                @if($training->image)
                                    <img src="{{ $training->image_url }}" 
                                         alt="{{ $training->title }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full">
                                        <i class="fas fa-chalkboard-teacher text-white text-4xl"></i>
                                    </div>
                                @endif
                                
                                <!-- Status Badge -->
                                <div class="absolute top-4 right-4">
                                    @if($training->hasVolunteerRegistered(auth()->id()))
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            <i class="fas fa-check-circle mr-1"></i>Terdaftar
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/90 text-gray-700 border border-gray-200">
                                            <i class="fas fa-plus-circle mr-1"></i>Daftar
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Training Content -->
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                    {{ $training->title }}
                                </h3>
                                
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                                    {{ strip_tags($training->description) }}
                                </p>

                                <!-- Training Details -->
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <i class="fas fa-user-tie w-4 text-green-500 mr-2"></i>
                                        <span>{{ $training->instructor_name }}</span>
                                    </div>
                                    
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <i class="fas fa-calendar w-4 text-green-500 mr-2"></i>
                                        <span>{{ $training->start_date->format('d M Y') }} - {{ $training->end_date->format('d M Y') }}</span>
                                    </div>
                                    
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <i class="fas fa-map-marker-alt w-4 text-green-500 mr-2"></i>
                                        <span>{{ $training->location ?: 'Online' }}</span>
                                    </div>

                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <i class="fas fa-users w-4 text-green-500 mr-2"></i>
                                        <span>{{ $training->confirmed_volunteers_count }} relawan terkonfirmasi</span>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('volunteer.trainings.show', $training) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        <i class="fas fa-eye mr-2"></i>
                                        Lihat Detail
                                    </a>
                                    
                                    @if(!$training->hasVolunteerRegistered(auth()->id()))
                                        <a href="{{ route('volunteer.trainings.register', $training) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                                            <i class="fas fa-hand-paper mr-2"></i>
                                            Daftar
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($trainings->hasPages())
                    <div class="mt-8">
                        {{ $trainings->links() }}
                    </div>
                @endif

            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="mx-auto h-24 w-24 text-gray-400 dark:text-gray-600 mb-6">
                        <i class="fas fa-calendar-times text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum ada pelatihan tersedia</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                        Saat ini belum ada pelatihan yang bisa diikuti sebagai relawan. Periksa kembali nanti.
                    </p>
                    <a href="{{ route('dashboard.relawan') }}" 
                       class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Dashboard
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
