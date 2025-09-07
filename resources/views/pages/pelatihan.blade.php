<x-layouts.app title="Ikuti Pelatihan - Rumah Literasi">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Program Pelatihan
                </h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto">
                    Tingkatkan kemampuan literasi Anda melalui program pelatihan berkualitas yang dirancang khusus untuk berbagai kalangan
                </p>
                @auth
                    @if($userRole == 'participant')
                        <a href="{{ route('participant.trainings.index') }}" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Lihat Dashboard Peserta
                        </a>
                    @elseif($userRole == 'volunteer')
                        <a href="{{ route('volunteer.trainings.index') }}" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Lihat Dashboard Relawan
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <!-- User Status & Action Notice -->
    @guest
        <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 dark:border-yellow-500 p-6 mb-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400 dark:text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700 dark:text-yellow-300">
                            <strong>Perhatian:</strong> Anda perlu masuk ke akun terlebih dahulu untuk dapat mendaftar pelatihan.
                            <a href="{{ route('login') }}" class="ml-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                                Masuk Sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if($userRole == 'participant')
            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-400 dark:border-green-500 p-6 mb-8">
                <div class="max-w-7xl mx-auto">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400 dark:text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 dark:text-green-300">
                                <strong>Selamat datang, Peserta!</strong> Anda dapat mendaftar ke pelatihan yang tersedia. Klik tombol "Daftar Sebagai Peserta" untuk mendaftar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($userRole == 'volunteer')
            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-400 dark:border-blue-500 p-6 mb-8">
                <div class="max-w-7xl mx-auto">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400 dark:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700 dark:text-blue-300">
                                <strong>Selamat datang, Relawan!</strong> Anda dapat mendaftar sebagai relawan untuk membantu pelatihan. Klik tombol "Daftar Sebagai Relawan" pada pelatihan yang diinginkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-gray-50 dark:bg-gray-900/20 border-l-4 border-gray-400 dark:border-gray-500 p-6 mb-8">
                <div class="max-w-7xl mx-auto">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                <strong>Informasi:</strong> Untuk dapat mendaftar pelatihan, Anda perlu memiliki role "Peserta Pelatihan" atau "Relawan". Silakan hubungi administrator untuk pengaturan role.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endguest

    <!-- Available Training Programs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Program Pelatihan Tersedia</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">Pilih program pelatihan yang sesuai dengan kebutuhan Anda</p>
        </div>

        @if($trainings->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($trainings as $training)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-colors duration-300">
                        @if($training->image)
                            <div class="h-48 bg-gray-200 dark:bg-gray-700 relative">
                                <img src="{{ $training->image_url }}" 
                                     alt="{{ $training->title }}"
                                     class="w-full h-48 object-cover block"
                                     loading="lazy"
                                     style="display: block;">
                                <!-- Overlay for title -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex items-end">
                                    <h3 class="text-white text-lg font-bold p-4 drop-shadow-lg leading-tight">{{ Str::limit($training->title, 60) }}</h3>
                                </div>
                            </div>
                        @else
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-48 flex items-center justify-center">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <h3 class="text-white text-xl font-bold px-4 text-center">{{ Str::limit($training->title, 40) }}</h3>
                                </div>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                                {!! Str::limit(strip_tags($training->description), 120) !!}
                            </p>
                            
                            <div class="space-y-2 text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Instruktur: {{ $training->instructor_name }}</span>
                                </div>
                                
                                @if($training->schedules && $training->schedules->count() > 0)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Mulai: {{ $training->schedules->sortBy('date')->first()->date->format('d M Y') }}</span>
                                    </div>
                                @elseif($training->start_date)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Mulai: {{ $training->start_date->format('d M Y') }}</span>
                                    </div>
                                @endif
                                
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span>Peserta: {{ $training->participants->where('status', '!=', 'cancelled')->count() }}
                                        @if($training->max_participants)
                                            / {{ $training->max_participants }}
                                        @endif
                                    </span>
                                </div>

                                @if($training->certificate_template)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                        </svg>
                                        <span class="text-green-600 dark:text-green-400 font-medium">Sertifikat Tersedia</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-2">
                                <!-- View Details Button -->
                                <a href="{{ route('participant.trainings.show', $training) }}" 
                                   class="w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 py-2 px-4 rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition text-center block">
                                    Lihat Detail
                                </a>

                                @auth
                                    @if($userRole == 'participant')
                                        @php
                                            $userRegistration = $userRegistrations->get($training->id);
                                        @endphp
                                        
                                        @if($userRegistration)
                                            @if($userRegistration->status == 'pending')
                                                <button class="w-full bg-yellow-500 text-white py-2 px-4 rounded cursor-not-allowed" disabled>
                                                    Menunggu Persetujuan
                                                </button>
                                            @elseif($userRegistration->status == 'approved')
                                                <button class="w-full bg-green-500 text-white py-2 px-4 rounded cursor-not-allowed" disabled>
                                                    ✓ Terdaftar
                                                </button>
                                            @elseif($userRegistration->status == 'rejected')
                                                <button class="w-full bg-red-500 text-white py-2 px-4 rounded cursor-not-allowed" disabled>
                                                    Ditolak
                                                </button>
                                            @else
                                                <a href="{{ route('participant.trainings.show', $training) }}" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition text-center block">
                                                    Daftar Sebagai Peserta
                                                </a>
                                            @endif
                                        @else
                                            @if($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants)
                                                <button class="w-full bg-gray-500 text-white py-2 px-4 rounded cursor-not-allowed" disabled>
                                                    Kuota Penuh
                                                </button>
                                            @else
                                                <a href="{{ route('participant.trainings.show', $training) }}" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition text-center block">
                                                    Daftar Sebagai Peserta
                                                </a>
                                            @endif
                                        @endif
                                    @elseif($userRole == 'volunteer')
                                        <a href="{{ route('volunteer.trainings.show', $training) }}" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition text-center block">
                                            Daftar Sebagai Relawan
                                        </a>
                                    @else
                                        <button class="w-full bg-gray-400 text-white py-2 px-4 rounded cursor-not-allowed" disabled>
                                            Role Tidak Diizinkan
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition text-center block">
                                        Masuk untuk Mendaftar
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Belum Ada Pelatihan Tersedia</h3>
                <p class="text-gray-500 dark:text-gray-400">Saat ini belum ada program pelatihan yang tersedia. Silakan cek kembali nanti.</p>
            </div>
        @endif
    </div>
    <!-- Call to Action -->
    <div class="bg-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Bergabunglah dengan Komunitas Literasi</h2>
            <p class="text-xl mb-8">Jadilah bagian dari perubahan positif di dunia pendidikan dan literasi.</p>
            
            @auth
                @if(auth()->user()->hasRole('Peserta Pelatihan'))
                    <a href="{{ route('dashboard.peserta') }}" class="inline-block bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition">
                        Akses Dashboard Peserta
                    </a>
                @elseif(auth()->user()->hasRole('Relawan'))
                    <a href="{{ route('dashboard.relawan') }}" class="inline-block bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition">
                        Akses Dashboard Relawan
                    </a>
                @else
                    <a href="{{ route('contact') }}" class="inline-block bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition">
                        Hubungi Kami
                    </a>
                @endif
            @else
                <a href="{{ route('register') }}" class="inline-block bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition">
                    Daftar Sekarang
                </a>
            @endauth
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="bg-gray-50 dark:bg-gray-800 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Mengapa Ikuti Pelatihan Literasi?</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">Dapatkan manfaat jangka panjang dari program pelatihan kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Instruktur Berpengalaman</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Diajar oleh para ahli literasi berpengalaman</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-green-100 dark:bg-green-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Sertifikat Resmi</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Dapatkan sertifikat yang diakui setelah menyelesaikan pelatihan</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-purple-100 dark:bg-purple-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Komunitas Belajar</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Bergabung dengan komunitas pembelajar yang suportif</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-orange-100 dark:bg-orange-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Jadwal Fleksibel</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Waktu belajar yang disesuaikan dengan aktivitas Anda</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
