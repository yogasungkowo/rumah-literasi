<x-layouts.app title="Ikuti Pelatihan - Rumah Literasi Ranggi"
    description="Tingkatkan kemampuan literasi Anda melalui program pelatihan berkualitas yang dirancang khusus untuk berbagai kalangan">

    {{-- Hero Section --}}
    <section
        class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 text-white">
        @if (isset($about) && $about->banner_image)
            <div class="absolute inset-0 bg-black/50">
                <img src="{{ asset('storage/' . $about->banner_image) }}" alt="Banner Pelatihan" class="w-full h-full object-cover opacity-30">
            </div>
        @else
            <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
        @endif

        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-40 left-1/2 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="relative z-10 container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <div data-aos="fade-down"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-8">
                    <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <span class="text-sm font-medium text-white/90">Program Pelatihan</span>
                </div>

                <h1 data-aos="fade-up"
                    class="text-5xl md:text-7xl font-extrabold mb-6 bg-gradient-to-r from-white via-blue-200 to-purple-300 bg-clip-text text-transparent leading-tight">
                    Tingkatkan <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Kemampuan Literasi</span>
                </h1>

                <p data-aos="fade-up" data-aos-delay="200"
                    class="text-xl md:text-2xl text-white/80 font-light leading-relaxed max-w-3xl mx-auto mb-12">
                    Bergabunglah dalam program pelatihan berkualitas yang dirancang khusus untuk meningkatkan kemampuan literasi Anda dan
                    berkontribusi pada masyarakat yang lebih melek huruf.
                </p>

                <div data-aos="fade-up" data-aos-delay="400" class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    @auth
                        @if ($userRole == 'Peserta Pelatihan')
                            <a href="{{ route('participant.trainings.index') }}"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white text-slate-900 rounded-xl font-semibold shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Dashboard Peserta
                            </a>
                        @elseif($userRole == 'Relawan')
                            <a href="{{ route('volunteer.trainings.index') }}"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white text-slate-900 rounded-xl font-semibold shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Dashboard Relawan
                            </a>
                        @endif
                    @endauth
                    <a href="#pelatihan-tersedia"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 border-2 border-white/50 text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:scale-105 hover:bg-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                        Lihat Pelatihan
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- User Status & Action Notice --}}
    @guest
        <section class="py-12 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/20 dark:to-orange-900/20">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto">
                    <div
                        class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-amber-200/50 dark:border-amber-800/50 p-8 md:p-10">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-gradient-to-r from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Perhatian!</h3>
                                <p class="text-slate-700 dark:text-slate-300 mb-6 leading-relaxed">
                                    Anda perlu masuk ke akun terlebih dahulu untuk dapat mendaftar pelatihan dan mengakses fitur lengkap platform kami.
                                </p>
                                <a href="{{ route('login') }}"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-xl shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Masuk Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        @if ($userRole == 'Peserta Pelatihan')
            <section class="py-12 bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/20">
                <div class="container mx-auto px-6">
                    <div class="max-w-4xl mx-auto">
                        <div
                            class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-emerald-200/50 dark:border-emerald-800/50 p-8 md:p-10">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-emerald-400 to-green-500 rounded-2xl flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Selamat Datang, Peserta!</h3>
                                    <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                                        Anda dapat mendaftar ke pelatihan yang tersedia. Klik tombol "Daftar Sebagai Peserta" untuk mendaftar pada
                                        pelatihan yang Anda minati.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @elseif($userRole == 'Relawan')
            <section class="py-12 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20">
                <div class="container mx-auto px-6">
                    <div class="max-w-4xl mx-auto">
                        <div
                            class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-blue-200/50 dark:border-blue-800/50 p-8 md:p-10">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Selamat Datang, Relawan!</h3>
                                    <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                                        Anda dapat mendaftar sebagai relawan untuk membantu pelatihan. Klik tombol "Daftar Sebagai Relawan" pada pelatihan
                                        yang diinginkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="py-12 bg-gradient-to-r from-slate-50 to-gray-50 dark:from-slate-900/20 dark:to-gray-900/20">
                <div class="container mx-auto px-6">
                    <div class="max-w-4xl mx-auto">
                        <div
                            class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-slate-200/50 dark:border-slate-700/50 p-8 md:p-10">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-slate-400 to-gray-500 rounded-2xl flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Informasi</h3>
                                    <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                                        Untuk dapat mendaftar pelatihan, Anda perlu memiliki role "Peserta Pelatihan" atau "Relawan". Silakan hubungi
                                        administrator untuk pengaturan role.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endguest

    {{-- Available Training Programs --}}
    <section id="pelatihan-tersedia"
        class="py-20 lg:py-32 bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/30 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-to-r from-blue-400/10 to-indigo-400/10 rounded-full blur-3xl animate-pulse">
            </div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-gradient-to-r from-indigo-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="fade-up" class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/10 to-indigo-500/10 backdrop-blur-sm border border-blue-200/20 dark:border-blue-800/20 rounded-full px-6 py-3 mb-6">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Program Pelatihan</span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-6">
                    Pilih Program yang <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Tepat Untuk
                        Anda</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Temukan program pelatihan yang sesuai dengan minat dan kebutuhan Anda untuk meningkatkan kemampuan literasi.
                </p>
            </div>

            @if ($trainings->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($trainings as $training)
                        <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}"
                            class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                            {{-- Training Image --}}
                            @if ($training->image)
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ $training->image_url }}" alt="{{ $training->title }}"
                                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                    <h3 class="absolute bottom-4 left-4 right-4 text-white text-lg font-bold drop-shadow-lg leading-tight">
                                        {{ Str::limit($training->title, 60) }}</h3>
                                </div>
                            @else
                                <div class="relative h-48 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                    <div class="text-center">
                                        <svg class="w-16 h-16 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <h3 class="text-white text-xl font-bold px-4 text-center">{{ Str::limit($training->title, 40) }}</h3>
                                    </div>
                                </div>
                            @endif

                            {{-- Training Content --}}
                            <div class="p-6">
                                <p class="text-slate-600 dark:text-slate-400 mb-6 text-sm leading-relaxed">
                                    {!! Str::limit(strip_tags($training->description), 120) !!}
                                </p>

                                {{-- Training Info --}}
                                <div class="space-y-3 text-sm text-slate-500 dark:text-slate-400 mb-6">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <span>Instruktur: {{ $training->instructor_name }}</span>
                                    </div>

                                    @if ($training->schedules && $training->schedules->count() > 0)
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-green-100 dark:bg-green-900/50 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <span>Mulai: {{ $training->schedules->sortBy('date')->first()->date->format('d M Y') }}</span>
                                        </div>
                                    @elseif($training->start_date)
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-green-100 dark:bg-green-900/50 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <span>Mulai: {{ $training->start_date->format('d M Y') }}</span>
                                        </div>
                                    @endif

                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 bg-purple-100 dark:bg-purple-900/50 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <span>Peserta: {{ $training->participants->where('status', '!=', 'cancelled')->count() }}
                                            @if ($training->max_participants)
                                                / {{ $training->max_participants }}
                                            @endif
                                        </span>
                                    </div>

                                    @if ($training->certificate_template)
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-emerald-100 dark:bg-emerald-900/50 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                                </svg>
                                            </div>
                                            <span class="text-emerald-600 dark:text-emerald-400 font-medium">Sertifikat Tersedia</span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Action Buttons --}}
                                <div class="space-y-3">
                                    {{-- View Details Button --}}
                                    @auth
                                        @if ($userRole == 'Admin')
                                            <a href="{{ route('admin.trainings.show', $training) }}"
                                                class="w-full inline-flex items-center justify-center gap-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100 py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:bg-slate-200 dark:hover:bg-slate-600 hover:shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Lihat Detail
                                            </a>
                                        @elseif($userRole == 'Peserta Pelatihan')
                                            <a href="{{ route('participant.trainings.show', $training) }}"
                                                class="w-full inline-flex items-center justify-center gap-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100 py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:bg-slate-200 dark:hover:bg-slate-600 hover:shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Lihat Detail
                                            </a>
                                        @elseif($userRole == 'Relawan')
                                            <a href="{{ route('volunteer.trainings.show', $training) }}"
                                                class="w-full inline-flex items-center justify-center gap-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100 py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:bg-slate-200 dark:hover:bg-slate-600 hover:shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Lihat Detail
                                            </a>
                                        @else
                                            <button onclick="showAccessDeniedAlert()"
                                                class="w-full inline-flex items-center justify-center gap-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100 py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:bg-slate-200 dark:hover:bg-slate-600 hover:shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Lihat Detail
                                            </button>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="w-full inline-flex items-center justify-center gap-2 bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100 py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:bg-slate-200 dark:hover:bg-slate-600 hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat Detail
                                        </a>
                                    @endauth

                                    @auth
                                        @if ($userRole == 'Peserta Pelatihan')
                                            @php
                                                $userRegistration = $userRegistrations->get($training->id);
                                            @endphp

                                            @if ($userRegistration)
                                                @if ($userRegistration->status == 'pending')
                                                    <button
                                                        class="w-full inline-flex items-center justify-center gap-2 bg-amber-500 text-white py-3 px-4 rounded-xl font-medium cursor-not-allowed"
                                                        disabled>
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Menunggu Persetujuan
                                                    </button>
                                                @elseif($userRegistration->status == 'approved')
                                                    <button
                                                        class="w-full inline-flex items-center justify-center gap-2 bg-emerald-500 text-white py-3 px-4 rounded-xl font-medium cursor-not-allowed"
                                                        disabled>
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        ✓ Terdaftar
                                                    </button>
                                                @elseif($userRegistration->status == 'rejected')
                                                    <button
                                                        class="w-full inline-flex items-center justify-center gap-2 bg-red-500 text-white py-3 px-4 rounded-xl font-medium cursor-not-allowed"
                                                        disabled>
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Ditolak
                                                    </button>
                                                @else
                                                    <a href="{{ route('participant.trainings.show', $training) }}"
                                                        class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:from-blue-600 hover:to-blue-700 hover:shadow-lg">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                        </svg>
                                                        Daftar Sebagai Peserta
                                                    </a>
                                                @endif
                                            @else
                                                @if ($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants)
                                                    <button
                                                        class="w-full inline-flex items-center justify-center gap-2 bg-slate-500 text-white py-3 px-4 rounded-xl font-medium cursor-not-allowed"
                                                        disabled>
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                                        </svg>
                                                        Kuota Penuh
                                                    </button>
                                                @else
                                                    <a href="{{ route('participant.trainings.show', $training) }}"
                                                        class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:from-blue-600 hover:to-blue-700 hover:shadow-lg">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                        </svg>
                                                        Daftar Sebagai Peserta
                                                    </a>
                                                @endif
                                            @endif
                                        @elseif($userRole == 'Relawan')
                                            <a href="{{ route('volunteer.trainings.show', $training) }}"
                                                class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:from-emerald-600 hover:to-emerald-700 hover:shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                                Daftar Sebagai Relawan
                                            </a>
                                        @else
                                            <button
                                                class="w-full inline-flex items-center justify-center gap-2 bg-slate-400 text-white py-3 px-4 rounded-xl font-medium cursor-not-allowed"
                                                disabled>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                                Role Tidak Diizinkan
                                            </button>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-4 rounded-xl font-medium transition-all duration-300 hover:from-blue-600 hover:to-blue-700 hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                            </svg>
                                            Masuk untuk Mendaftar
                                        </a>
                                    @endauth
                                </div>

                                {{-- Decorative Elements --}}
                                <div
                                    class="absolute top-6 right-6 w-20 h-20 bg-gradient-to-br from-blue-400/20 to-indigo-400/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="absolute bottom-6 left-6 w-16 h-16 bg-gradient-to-br from-indigo-400/20 to-purple-400/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-slate-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Belum Ada Pelatihan Tersedia</h3>
                    <p class="text-slate-600 dark:text-slate-400">Saat ini belum ada program pelatihan yang tersedia. Silakan cek kembali nanti.</p>
                </div>
            @endif
        </div>
    </section>
    {{-- Call to Action Section --}}
    <section class="py-20 lg:py-32 bg-gradient-to-br from-indigo-600 via-purple-700 to-pink-700 text-white relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/90 via-purple-700/90 to-pink-700/90"></div>
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-white/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            {{-- Floating Elements --}}
            <div class="absolute top-20 left-20 w-4 h-4 bg-white/20 rounded-full animate-bounce" style="animation-delay: 0s;"></div>
            <div class="absolute top-40 right-32 w-3 h-3 bg-white/30 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-32 left-1/3 w-5 h-5 bg-white/20 rounded-full animate-bounce" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 right-20 w-2 h-2 bg-white/40 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="zoom-in" class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-3 mb-8">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    <span class="text-sm font-medium text-white/90">Bergabung Sekarang</span>
                </div>

                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Mulai <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Perjalanan Literasi</span> Anda
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-white/90 leading-relaxed max-w-3xl mx-auto">
                    Bergabunglah dalam komunitas literasi yang berkembang. Setiap langkah kecil yang Anda ambil hari ini akan menciptakan dampak besar
                    untuk masa depan pendidikan.
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    @auth
                        @if (auth()->user()->hasRole('Peserta Pelatihan'))
                            <a href="{{ route('participant.trainings.index') }}"
                                class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-3xl hover:-translate-y-1">
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Dashboard Peserta
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        @elseif(auth()->user()->hasRole('Relawan'))
                            <a href="{{ route('volunteer.trainings.index') }}"
                                class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-3xl hover:-translate-y-1">
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Dashboard Relawan
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('contact') }}"
                                class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-3xl hover:-translate-y-1">
                                <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Hubungi Kami
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('register') }}"
                            class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-3xl hover:-translate-y-1">
                            <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Daftar Sekarang
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    @endauth

                    <a href="#pelatihan-tersedia"
                        class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-white/10 border-2 border-white/30 text-white rounded-2xl font-bold text-lg shadow-xl backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:-translate-y-1 hover:bg-white/20 hover:border-white/50">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                        Lihat Program
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                {{-- Additional Info --}}
                <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div data-aos="fade-up" data-aos-delay="200" class="text-center">
                        <div
                            class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/20">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Pendidikan</h3>
                        <p class="text-white/80 text-sm">Akses materi pembelajaran berkualitas</p>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="400" class="text-center">
                        <div
                            class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/20">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Komunitas</h3>
                        <p class="text-white/80 text-sm">Bergabung dengan ribuan pembelajar aktif</p>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="600" class="text-center">
                        <div
                            class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/20">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Sertifikat</h3>
                        <p class="text-white/80 text-sm">Dapatkan sertifikat resmi setelah menyelesaikan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section
        class="py-20 lg:py-32 bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/30 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            <div class="absolute top-1/3 left-1/3 w-80 h-80 bg-gradient-to-r from-blue-400/10 to-indigo-400/10 rounded-full blur-3xl animate-pulse">
            </div>
            <div class="absolute bottom-1/3 right-1/3 w-72 h-72 bg-gradient-to-r from-indigo-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 3s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="fade-up" class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/10 to-indigo-500/10 backdrop-blur-sm border border-blue-200/20 dark:border-blue-800/20 rounded-full px-6 py-3 mb-6">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Mengapa Ikuti Pelatihan?</span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-6">
                    Dapatkan Manfaat <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Jangka Panjang</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Program pelatihan kami dirancang untuk memberikan dampak positif yang berkelanjutan bagi kemampuan literasi dan karir Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div data-aos="fade-up" data-aos-delay="100"
                    class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 p-8 text-center transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Instruktur Berpengalaman</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Diajar oleh para ahli literasi berpengalaman dengan metodologi
                        pembelajaran yang terbukti efektif.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 p-8 text-center transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Sertifikat Resmi</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Dapatkan sertifikat yang diakui secara resmi setelah menyelesaikan
                        program pelatihan dengan baik.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 p-8 text-center transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Komunitas Belajar</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Bergabung dengan komunitas pembelajar yang suportif dan saling
                        menginspirasi satu sama lain.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="400"
                    class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 p-8 text-center transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Jadwal Fleksibel</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Waktu belajar yang disesuaikan dengan aktivitas Anda, sehingga
                        tidak mengganggu rutinitas harian.</p>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false,
            });

            function showAccessDeniedAlert() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Akses Ditolak',
                    text: 'Anda tidak memiliki akses untuk melihat detail pelatihan. Harap gunakan akun dengan role Relawan atau Peserta Pelatihan.',
                    confirmButtonText: 'Mengerti',
                    confirmButtonColor: '#3B82F6',
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-xl px-6 py-3 font-semibold'
                    }
                });
            }
        </script>
    @endpush
</x-layouts.app>
