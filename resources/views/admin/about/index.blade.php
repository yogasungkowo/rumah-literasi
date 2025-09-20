<x-layouts.admin title="Kelola Tentang Kami" description="Kelola informasi tentang Rumah Literasi Ranggi">
    <div class="space-y-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Halaman Tentang Kami</h1>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                    Pratinjau dan kelola konten yang tampil di halaman publik.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('admin.about.edit', $about) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:ring-offset-slate-900 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                        <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                    </svg>
                    <span>Ubah Konten Halaman</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 text-sm rounded-lg p-4" role="alert">
                <span class="font-medium">Sukses!</span> {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Informasi Utama</h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Judul Utama</p>
                            <p class="mt-1 text-slate-900 dark:text-white">{{ $about->main_title }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Subjudul</p>
                            <p class="mt-1 text-slate-900 dark:text-white">{{ $about->subtitle ?? 'Belum diisi' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-2">Konten / Sejarah</p>
                            <div class="prose prose-sm dark:prose-invert max-w-none text-slate-600 dark:text-slate-300">
                                {!! $about->main_content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Pratinjau Banner</h3>
                    </div>
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Pratinjau Banner</h3>
                    </div>
                    <div class="p-6">
                        @if($about->banner_image)
                            <img src="{{ asset('storage/' . $about->banner_image) }}" alt="Banner" class="w-full h-auto rounded-lg shadow-md">
                        @else
                            <div class="text-center py-12 px-6 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-lg">
                                <p class="text-sm text-slate-500 dark:text-slate-400">Tidak ada gambar banner yang diunggah.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Organization Structure Section -->
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Struktur Organisasi</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">{{ $about->team_section_title ?? 'Tim Kami' }} - {{ $about->team_section_subtitle ?? 'Bertemu dengan tim yang berdedikasi' }}</p>
                    </div>
                    <div class="p-6">
                        @if($about->organizationMembers->count() > 0)
                            <div class="space-y-6">
                                @php
                                    $topLevelMembers = $about->organizationMembers->where('parent_id', null)->sortBy('display_order');
                                @endphp

                                @foreach($topLevelMembers as $member)
                                    <div class="bg-slate-50 dark:bg-slate-700/50 rounded-xl p-4">
                                        <div class="flex items-center space-x-4">
                                            @if($member->photo_path)
                                                <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-16 h-16 rounded-full object-cover flex-shrink-0">
                                            @else
                                                <div class="w-16 h-16 bg-slate-300 dark:bg-slate-600 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-8 h-8 text-slate-600 dark:text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <h4 class="text-lg font-semibold text-slate-900 dark:text-white">{{ $member->name }}</h4>
                                                <p class="text-slate-600 dark:text-slate-400 font-medium">{{ $member->position }}</p>
                                                @if($member->bio)
                                                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">{{ Str::limit($member->bio, 150) }}</p>
                                                @endif
                                                @if($member->linkedin_url || $member->instagram_url)
                                                    <div class="flex space-x-2 mt-2">
                                                        @if($member->linkedin_url)
                                                            <a href="{{ $member->linkedin_url }}" target="_blank" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        @if($member->instagram_url)
                                                            <a href="{{ $member->instagram_url }}" target="_blank" class="text-pink-600 hover:text-pink-700 dark:text-pink-400 dark:hover:text-pink-300">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M12.017 0C8.396 0 7.609.034 6.298.148 4.985.262 4.01.547 3.124.988 2.238 1.429 1.492 2.067 1.053 2.953.614 3.839.329 4.814.215 6.127.101 7.438.067 8.117.067 11.738c0 3.621.034 4.3.148 5.611.114 1.313.399 2.288.84 3.174.451.886 1.089 1.632 1.975 2.071.886.44 1.861.725 3.174.84 1.311.114 1.99.148 5.611.148s4.3-.034 5.611-.148c1.313-.115 2.288-.4 3.174-.84.886-.44 1.632-1.078 2.071-1.964.44-.886.725-1.861.84-3.174.114-1.311.148-1.99.148-5.611s-.034-4.3-.148-5.611c-.115-1.313-.4-2.288-.84-3.174-.44-.886-1.078-1.632-1.964-2.071C20.288.399 19.313.114 18 .148 16.689.034 15.91 0 12.289 0h-.272zm.068 2.38c3.526 0 3.947.013 5.34.093 1.312.076 2.028.272 2.5.455.547.211.947.464 1.36.877.413.413.666.813.877 1.36.183.472.379 1.188.455 2.5.08 1.393.093 1.814.093 5.34s-.013 3.947-.093 5.34c-.076 1.312-.272 2.028-.455 2.5-.211.547-.464.947-.877 1.36-.413.413-.813.666-1.36.877-.472.183-1.188.379-2.5.455-1.393.08-1.814.093-5.34.093s-3.947-.013-5.34-.093c-1.312-.076-2.028-.272-2.5-.455-.547-.211-.947-.464-1.36-.877-.413-.413-.666-.813-.877-1.36-.183-.472-.379-1.188-.455-2.5-.08-1.393-.093-1.814-.093-5.34s.013-3.947.093-5.34c.076-1.312.272-2.028.455-2.5.211-.547.464-.947.877-1.36.413-.413.813-.666 1.36-.877.472-.183 1.188-.379 2.5-.455 1.393-.08 1.814-.093 5.34-.093zm0 3.822c-3.636 0-6.58 2.944-6.58 6.58s2.944 6.58 6.58 6.58 6.58-2.944 6.58-6.58-2.944-6.58-6.58-6.58zm0 10.84c-2.35 0-4.26-1.91-4.26-4.26s1.91-4.26 4.26-4.26 4.26 1.91 4.26 4.26-1.91 4.26-4.26 4.26zm8.28-11.08c-.85 0-1.54-.69-1.54-1.54s.69-1.54 1.54-1.54 1.54.69 1.54 1.54-.69 1.54-1.54 1.54z"/>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Children/Subordinates -->
                                        @if($member->children->count() > 0)
                                            <div class="mt-4 ml-20 space-y-3">
                                                @foreach($member->children->sortBy('display_order') as $child)
                                                    <div class="flex items-center space-x-3 bg-white dark:bg-slate-600 rounded-lg p-3">
                                                        @if($child->photo_path)
                                                            <img src="{{ asset('storage/' . $child->photo_path) }}" alt="{{ $child->name }}" class="w-10 h-10 rounded-full object-cover flex-shrink-0">
                                                        @else
                                                            <div class="w-10 h-10 bg-slate-300 dark:bg-slate-500 rounded-full flex items-center justify-center flex-shrink-0">
                                                                <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                                                </svg>
                                                            </div>
                                                        @endif
                                                        <div class="flex-1">
                                                            <h5 class="font-medium text-slate-900 dark:text-white">{{ $child->name }}</h5>
                                                            <p class="text-sm text-slate-600 dark:text-slate-400">{{ $child->position }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12 px-6 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-lg">
                                <svg class="w-12 h-12 mx-auto mb-4 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <p class="text-slate-500 dark:text-slate-400">Belum ada anggota organisasi yang ditambahkan.</p>
                                <p class="text-sm text-slate-400 dark:text-slate-500 mt-1">Klik "Ubah Konten Halaman" untuk menambah anggota organisasi.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                    <div class="divide-y divide-slate-200 dark:divide-slate-700">
                        <div class="p-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 flex-shrink-0 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-blue-600 dark:text-blue-300"><path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" /><path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.18l.88-1.473a1.65 1.65 0 0 1 1.54-.882H4.48a1.65 1.65 0 0 1 1.54.882l.88 1.473a1.651 1.651 0 0 1 0 1.18l-.88 1.473a1.65 1.65 0 0 1-1.54.882H2.084a1.65 1.65 0 0 1-1.54-.882L.664 10.59ZM10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" clip-rule="evenodd" /></svg>
                                </div>
                                <h4 class="font-semibold text-slate-800 dark:text-white">{{ $about->vision_title ?? 'Visi' }}</h4>
                            </div>
                            <div class="mt-3 prose prose-sm dark:prose-invert max-w-none text-slate-600 dark:text-slate-300">
                                {!! $about->vision_content ?: '<p>Belum diisi.</p>' !!}
                            </div>
                        </div>
                        <div class="p-6">
                             <div class="flex items-center gap-3">
                                <div class="w-8 h-8 flex-shrink-0 bg-emerald-100 dark:bg-emerald-900/50 rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-emerald-600 dark:text-emerald-300"><path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 0 1-9.201-4.42 5.5 5.5 0 0 1 8.243-5.242 1 1 0 0 1 1.244 1.558 3.5 3.5 0 0 0-3.35 4.51 1 1 0 0 1 .523 1.753 3.5 3.5 0 0 0 4.51-3.35 1 1 0 0 1 1.558 1.244 5.5 5.5 0 0 1-3.527 3.94Z" clip-rule="evenodd" /></svg>
                                </div>
                                <h4 class="font-semibold text-slate-800 dark:text-white">{{ $about->mission_title ?? 'Misi' }}</h4>
                            </div>
                            <div class="mt-3 prose prose-sm dark:prose-invert max-w-none text-slate-600 dark:text-slate-300">
                                {!! $about->mission_content ?: '<p>Belum diisi.</p>' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.admin>