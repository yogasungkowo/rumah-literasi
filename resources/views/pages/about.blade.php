<x-layouts.app title="{{ $about->main_title ?? 'Tentang Kami' }} - Rumah Literasi Ranggi" 
    description="Pelajari lebih lanjut tentang Rumah Literasi Ranggi, visi, misi, dan tim kami yang berdedikasi">

    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 text-white">
        @if($about->banner_image)
            <div class="absolute inset-0 bg-black/50">
                <img src="{{ asset('storage/' . $about->banner_image) }}" alt="Banner Tentang Kami" class="w-full h-full object-cover opacity-30">
            </div>
        @else
            <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
        @endif

        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute top-40 left-1/2 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <div data-aos="fade-down" class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-8">
                    <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span class="text-sm font-medium text-white/90">Tentang Kami</span>
                </div>

                <h1 data-aos="fade-up" class="text-5xl md:text-7xl font-extrabold mb-6 bg-gradient-to-r from-white via-blue-200 to-purple-300 bg-clip-text text-transparent leading-tight">
                    {{ $about->main_title ?? 'Tentang Kami' }}
                </h1>

                @if($about->subtitle)
                    <p data-aos="fade-up" data-aos-delay="200" class="text-xl md:text-2xl text-white/80 font-light leading-relaxed max-w-3xl mx-auto mb-12">
                        {{ $about->subtitle }}
                    </p>
                @endif

                <div data-aos="fade-up" data-aos-delay="400" class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('artikel') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-slate-900 rounded-xl font-semibold shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        Pelajari Lebih Lanjut
                    </a>
                    <a href="#tim-kami" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 border-2 border-white/50 text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:scale-105 hover:bg-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Kenali Tim Kami
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    @if($about->main_content)
    <section class="py-20 lg:py-32 bg-slate-50 dark:bg-slate-900 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,.15) 1px, transparent 0); background-size: 20px 20px;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="fade-up" class="max-w-4xl mx-auto">
                <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 dark:border-slate-700/50 p-8 md:p-12 lg:p-16 transition-all duration-500 hover:shadow-3xl hover:-translate-y-2">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Tentang Kami</h2>
                            <p class="text-slate-600 dark:text-slate-400">Mengenal lebih dalam Rumah Literasi Ranggi</p>
                        </div>
                    </div>
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        <div class="text-slate-700 dark:text-slate-300 leading-relaxed space-y-6">
                            {!! nl2br(e($about->main_content)) !!}
                        </div>
                    </div>

                    {{-- Decorative Elements --}}
                    <div class="absolute top-6 right-6 w-20 h-20 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-full blur-xl"></div>
                    <div class="absolute bottom-6 left-6 w-16 h-16 bg-gradient-to-br from-purple-400/20 to-pink-400/20 rounded-full blur-xl"></div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Vision & Mission Section --}}
    <section id="visi-misi" class="py-20 lg:py-32 bg-gradient-to-br from-white via-blue-50/30 to-purple-50/30 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-to-r from-blue-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-gradient-to-r from-purple-400/10 to-pink-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="fade-up" class="text-center mb-16">
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/10 to-purple-500/10 backdrop-blur-sm border border-blue-200/20 dark:border-blue-800/20 rounded-full px-6 py-3 mb-6">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Visi & Misi</span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-6">
                    Arah dan <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Tujuan Kami</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Panduan utama yang menginspirasi setiap langkah dan keputusan kami dalam mewujudkan literasi untuk semua.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                {{-- Vision Card --}}
                @if($about->vision_title || $about->vision_content)
                <div data-aos="fade-right" class="group">
                    <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 p-8 md:p-10 h-full transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $about->vision_title ?? 'Visi Kami' }}</h3>
                                <p class="text-slate-600 dark:text-slate-400">Pandangan masa depan</p>
                            </div>
                        </div>

                        <div class="text-slate-700 dark:text-slate-300 leading-relaxed">
                            {!! nl2br(e($about->vision_content ?? '')) !!}
                        </div>

                        {{-- Decorative Element --}}
                        <div class="absolute top-6 right-6 w-24 h-24 bg-gradient-to-br from-blue-400/20 to-blue-500/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
                @endif

                {{-- Mission Card --}}
                @if($about->mission_title || $about->mission_content)
                <div data-aos="fade-left" class="group">
                    <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 p-8 md:p-10 h-full transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $about->mission_title ?? 'Misi Kami' }}</h3>
                                <p class="text-slate-600 dark:text-slate-400">Langkah-langkah nyata</p>
                            </div>
                        </div>

                        <div class="text-slate-700 dark:text-slate-300 leading-relaxed">
                            {!! nl2br(e($about->mission_content ?? '')) !!}
                        </div>

                        {{-- Decorative Element --}}
                        <div class="absolute top-6 right-6 w-24 h-24 bg-gradient-to-br from-purple-400/20 to-purple-500/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    @if($about->topLevelMembers->isNotEmpty())
    <section id="tim-kami" class="py-20 lg:py-32 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-teal-50/30 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            <div class="absolute top-1/3 right-1/4 w-80 h-80 bg-gradient-to-r from-emerald-400/10 to-teal-400/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/3 left-1/4 w-72 h-72 bg-gradient-to-r from-teal-400/10 to-cyan-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 3s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="fade-up" class="text-center mb-16">
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 backdrop-blur-sm border border-emerald-200/20 dark:border-emerald-800/20 rounded-full px-6 py-3 mb-6">
                    <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="text-sm font-medium text-emerald-700 dark:text-emerald-300">Tim Kami</span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-6">
                    Orang-orang di <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Balik Layar</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Berkenalan dengan tim yang berdedikasi membangun ekosistem literasi yang lebih baik untuk semua.
                </p>
            </div>

            <div class="space-y-16">
                @foreach($about->topLevelMembers as $member)
                    <div data-aos="fade-up" class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-xl border border-white/20 dark:border-slate-700/50 p-8 md:p-10 transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:bg-white/90 dark:hover:bg-slate-800/90">
                        <div class="flex flex-col lg:flex-row items-center gap-8 text-center lg:text-left">
                            @if($member->photo_path)
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-40 h-40 rounded-full object-cover ring-4 ring-white dark:ring-slate-700 shadow-lg group-hover:ring-emerald-200 dark:group-hover:ring-emerald-800 transition-all duration-300 group-hover:scale-105">
                                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                </div>
                            @else
                                <div class="relative">
                                    <div class="w-40 h-40 rounded-full bg-gradient-to-br from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-600 flex items-center justify-center ring-4 ring-white dark:ring-slate-700 shadow-lg group-hover:ring-emerald-200 dark:group-hover:ring-emerald-800 transition-all duration-300 group-hover:scale-105">
                                        <svg class="w-20 h-20 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">{{ $member->name }}</h3>
                                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 backdrop-blur-sm border border-emerald-200/20 dark:border-emerald-800/20 rounded-full px-4 py-2 mb-4">
                                    <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm font-semibold text-emerald-700 dark:text-emerald-300">{{ $member->position }}</p>
                                </div>
                                @if($member->bio)
                                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-lg">{{ $member->bio }}</p>
                                @endif
                            </div>
                        </div>

                        @if($member->children->isNotEmpty())
                            <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700">
                                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                                    <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Tim Pendukung
                                </h4>
                                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                                    @foreach($member->children as $subMember)
                                        <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}" class="group bg-gradient-to-br from-slate-50 to-white dark:from-slate-800 dark:to-slate-700 rounded-2xl p-6 border border-slate-200/50 dark:border-slate-600/50 transition-all duration-300 hover:shadow-lg hover:-translate-y-2 hover:border-emerald-200 dark:hover:border-emerald-800">
                                            <div class="flex items-center gap-4">
                                                @if($subMember->photo_path)
                                                    <img src="{{ asset('storage/' . $subMember->photo_path) }}" alt="{{ $subMember->name }}" class="w-16 h-16 rounded-full object-cover ring-2 ring-white dark:ring-slate-700 group-hover:ring-emerald-200 dark:group-hover:ring-emerald-800 transition-all duration-300 shrink-0">
                                                @else
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-600 flex items-center justify-center ring-2 ring-white dark:ring-slate-700 group-hover:ring-emerald-200 dark:group-hover:ring-emerald-800 transition-all duration-300 shrink-0">
                                                        <svg class="w-8 h-8 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                                <div class="flex-1">
                                                    <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-700 dark:group-hover:text-emerald-300 transition-colors duration-300">{{ $subMember->name }}</h4>
                                                    <p class="text-sm font-medium text-slate-600 dark:text-slate-400 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors duration-300">{{ $subMember->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Decorative Elements --}}
                        <div class="absolute top-6 right-6 w-20 h-20 bg-gradient-to-br from-emerald-400/20 to-teal-400/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute bottom-6 left-6 w-16 h-16 bg-gradient-to-br from-teal-400/20 to-cyan-400/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Call to Action Section --}}
    <section class="py-20 lg:py-32 bg-gradient-to-br from-indigo-600 via-purple-700 to-pink-700 text-white relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-indigo-600/90 via-purple-700/90 to-pink-700/90"></div>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <span class="text-sm font-medium text-white/90">Mari Bergabung</span>
                </div>

                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Bersama <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Membangun</span> Literasi
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-white/90 leading-relaxed max-w-3xl mx-auto">
                    Mari bersama-sama menciptakan dampak positif melalui literasi. Setiap langkah kecil yang kita ambil hari ini akan membentuk masa depan yang lebih cerah.
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="{{ route('contact') }}" class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-3xl hover:-translate-y-1">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Hubungi Kami
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                    <a href="{{ route('pelatihan') }}" class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-white/10 border-2 border-white/30 text-white rounded-2xl font-bold text-lg shadow-xl backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:-translate-y-1 hover:bg-white/20 hover:border-white/50">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Lihat Program
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                {{-- Additional Info --}}
                <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div data-aos="fade-up" data-aos-delay="200" class="text-center">
                        <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/20">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Komunitas</h3>
                        <p class="text-white/80 text-sm">Bergabung dengan ribuan pembelajar aktif</p>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="400" class="text-center">
                        <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/20">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Pendidikan</h3>
                        <p class="text-white/80 text-sm">Akses materi pembelajaran berkualitas</p>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="600" class="text-center">
                        <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/20">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Dampak</h3>
                        <p class="text-white/80 text-sm">Menciptakan perubahan positif bersama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('styles')
        {{-- AOS Library CSS --}}
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @endpush

    @push('scripts')
        {{-- AOS Library JS --}}
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            // Initialize AOS
            AOS.init({
                duration: 800, // values from 0 to 3000, with step 50ms
                once: true,    // whether animation should happen only once - while scrolling down
            });
        </script>
    @endpush

</x-layouts.app>