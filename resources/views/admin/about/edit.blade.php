<x-layouts.admin title="Edit Tentang Kami" description="Edit informasi tentang Rumah Literasi Ranggi">
    <div x-data="aboutPageManager({
        aboutId: {{ $about->id }},
        initialBannerUrl: '{{ $about->banner_image ? asset('storage/' . $about->banner_image) : '' }}',
        initialMembers: {{ $about->organizationMembers->map(function($member) { $member->photo_url = $member->photo_path ? asset('storage/' . $member->photo_path) : null; return $member; })->values() }}
    })" class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/40 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-xl rounded-2xl border border-white/20 dark:border-slate-700/50 p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 via-purple-500/5 to-pink-500/5 dark:from-blue-500/10 dark:via-purple-500/10 dark:to-pink-500/10"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-blue-400/20 to-transparent rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-purple-400/20 to-transparent rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <div class="p-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-300 bg-clip-text text-transparent">Edit Tentang Kami</h1>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 flex items-center gap-2 ml-16">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Perbarui informasi yang tampil di halaman publik
                        </p>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <a href="{{ route('admin.about.index') }}" class="group inline-flex items-center justify-center gap-2 rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm px-6 py-3 text-sm font-semibold text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:border-slate-300 dark:hover:border-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:ring-offset-slate-900 transition-all duration-200">
                            <svg class="w-4 h-4 group-hover:rotate-90 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            <span>Batal</span>
                        </a>
                        <button type="submit" form="about-form" class="group inline-flex items-center justify-center gap-2 rounded-xl border border-transparent bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:ring-offset-slate-900 transition-all duration-200 transform hover:scale-[1.02]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 group-hover:scale-110 transition-transform duration-200"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" /></svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </div>
            </div>

            <form id="about-form" action="{{ route('admin.about.update', $about) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-xl rounded-2xl border border-white/20 dark:border-slate-700/50 overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="px-8 py-6 bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-pink-500/10 dark:from-blue-500/20 dark:via-purple-500/20 dark:to-pink-500/20 border-b border-slate-200/50 dark:border-slate-700/50">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Informasi Utama</h3>
                        </div>
                    </div>
                    <div class="p-8 space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="main_title" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Judul Utama <span class="text-red-500">*</span></label>
                                <input type="text" name="main_title" id="main_title" value="{{ old('main_title', $about->main_title) }}" required placeholder="Masukkan judul utama" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                @error('main_title') <p class="text-sm text-red-500 mt-1 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="subtitle" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Subjudul</label>
                                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $about->subtitle) }}" placeholder="Masukkan subjudul" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                @error('subtitle') <p class="text-sm text-red-500 mt-1 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="main_content" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Konten / Sejarah <span class="text-red-500">*</span></label>
                            <textarea name="main_content" id="main_content" rows="8" required class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-y transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">{{ old('main_content', $about->main_content) }}</textarea>
                            @error('main_content') <p class="text-sm text-red-500 mt-1 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-xl rounded-2xl border border-white/20 dark:border-slate-700/50 overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="px-8 py-6 bg-gradient-to-r from-emerald-500/10 via-teal-500/10 to-cyan-500/10 dark:from-emerald-500/20 dark:via-teal-500/20 dark:to-cyan-500/20 border-b border-slate-200/50 dark:border-slate-700/50">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-emerald-100 dark:bg-emerald-900/50 rounded-lg">
                                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Gambar Banner</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Upload Gambar Banner</label>
                        <div @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false" @drop.prevent="handleDrop($event, 'banner')" 
                             :class="isDragging ? 'border-blue-500 bg-blue-50 dark:bg-blue-900/20 scale-[1.02]' : 'border-slate-300 dark:border-slate-600 hover:border-slate-400 dark:hover:border-slate-500'"
                             class="flex justify-center items-center px-6 py-12 border-2 border-dashed rounded-2xl transition-all duration-300 cursor-pointer group">
                            
                            <div x-show="bannerPreviewUrl" class="text-center space-y-4" style="display: none;">
                                <div class="relative inline-block group">
                                    <img :src="bannerPreviewUrl" alt="Pratinjau Banner" class="max-h-72 mx-auto rounded-2xl shadow-2xl border-4 border-white dark:border-slate-700 transform group-hover:scale-[1.02] transition-transform duration-300"/>
                                    <button @click="removeImage('banner')" type="button" class="absolute -top-3 -right-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-full p-2 shadow-xl opacity-90 hover:opacity-100 transition-all duration-300 hover:scale-110 hover:rotate-90">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                    </button>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 font-medium">Klik tombol merah untuk menghapus atau mengganti gambar</p>
                            </div>

                            <div x-show="!bannerPreviewUrl" class="space-y-6 text-center">
                                <div class="mx-auto w-20 h-20 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/50 dark:to-purple-900/50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="h-10 w-10 text-blue-500 dark:text-blue-400 group-hover:rotate-12 transition-transform duration-300" stroke="currentColor" fill="none" viewBox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="space-y-2">
                                    <div class="text-slate-600 dark:text-slate-400">
                                        <label for="banner_image" class="relative cursor-pointer font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-500 transition-colors duration-200">
                                            <span class="underline decoration-2 underline-offset-2">Pilih file gambar</span>
                                            <input @change="handleFileSelect($event, 'banner')" id="banner_image" name="banner_image" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <span class="text-slate-500"> atau drag and drop di sini</span>
                                    </div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-800/50 rounded-lg px-3 py-1 inline-block">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                            </div>
                        </div>
                        @error('banner_image') <p class="text-sm text-red-500 mt-3 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-xl rounded-2xl border border-white/20 dark:border-slate-700/50 overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="px-8 py-6 bg-gradient-to-r from-purple-500/10 via-pink-500/10 to-rose-500/10 dark:from-purple-500/20 dark:via-pink-500/20 dark:to-rose-500/20 border-b border-slate-200/50 dark:border-slate-700/50">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Visi & Misi</h3>
                        </div>
                    </div>
                    <div class="p-8 space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="vision_title" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Judul Visi</label>
                                <input type="text" name="vision_title" id="vision_title" value="{{ old('vision_title', $about->vision_title) }}" placeholder="Masukkkan Judul Visi" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500 placeholder:text-slate-400 dark:placeholder:text-slate-500">
                                @error('vision_title') <p class="text-sm text-red-500 mt-1 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="mission_title" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Judul Misi</label>
                                <input type="text" name="mission_title" id="mission_title" value="{{ old('mission_title', $about->mission_title) }}" placeholder="Masukkan Judul Misi" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500 placeholder:text-slate-400 dark:placeholder:text-slate-500">
                                @error('mission_title') <p class="text-sm text-red-500 mt-1 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="vision_content" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Konten Visi</label>
                                <textarea name="vision_content" id="vision_content" rows="4" placeholder="Masukkan Konten Visi" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-y transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500 placeholder:text-slate-400 dark:placeholder:text-slate-500">{{ old('vision_content', $about->vision_content) }}</textarea>
                                @error('vision_content') <p class="text-sm text-red-500 mt-1 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="mission_content" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Konten Misi</label>
                                <textarea name="mission_content" id="mission_content" rows="4" class="block w-full border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">{{ old('mission_content', $about->mission_content) }}</textarea>
                                @error('mission_content') <p class="text-sm text-red-500 mt-1 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="mt-8 bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-xl rounded-2xl border border-white/20 dark:border-slate-700/50 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="px-8 py-6 bg-gradient-to-r from-orange-500/10 via-amber-500/10 to-yellow-500/10 dark:from-orange-500/20 dark:via-amber-500/20 dark:to-yellow-500/20 border-b border-slate-200/50 dark:border-slate-700/50">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-orange-100 dark:bg-orange-900/50 rounded-lg">
                            <svg class="w-5 h-5 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Struktur Organisasi</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">Kelola anggota dan struktur kepengurusan</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 space-y-10">
                    <div class="bg-gradient-to-br from-slate-50 to-blue-50/30 dark:from-slate-800/50 dark:to-slate-700/50 rounded-2xl p-8 border-2 border-dashed border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-3 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-900 dark:text-white">Tambah Anggota Baru</h4>
                        </div>
                        <form action="{{ route('admin.about.members.store', $about) }}" method="POST" @submit.prevent="addMember($event)" id="add-member-form" class="space-y-6">
                            @csrf
                            <div class="flex flex-col md:flex-row gap-8">
                                <div class="w-full md:w-1/3 text-center">
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Foto Profil</label>
                                    <div class="space-y-4">
                                        <div class="w-36 h-36 mx-auto rounded-2xl bg-gradient-to-br from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-600 flex items-center justify-center text-slate-400 overflow-hidden shadow-xl ring-4 ring-white dark:ring-slate-600 transform hover:scale-105 transition-all duration-300">
                                            <img x-show="newMemberPhotoPreview" :src="newMemberPhotoPreview" class="w-full h-full object-cover">
                                            <div x-show="!newMemberPhotoPreview" class="text-center">
                                                <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                                <p class="text-xs text-slate-500">No Photo</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-center items-center gap-2">
                                            <input type="file" name="photo" @change="handleFileSelect($event, 'newMember')" x-ref="newMemberPhotoInput" accept="image/*" class="hidden">
                                            <button type="button" @click="$refs.newMemberPhotoInput.click()" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50 rounded-xl hover:bg-blue-100 dark:hover:bg-blue-900/70 transition-all duration-200 transform hover:scale-105">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                Pilih Foto
                                            </button>
                                        </div>
                                        <p x-show="memberFormErrors.photo" x-text="memberFormErrors.photo" x-cloak class="text-sm text-red-500 mt-2"></p>
                                    </div>
                                </div>
                                <div class="w-full md:w-2/3 space-y-6">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label for="member_name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Nama Lengkap <span class="text-red-500">*</span></label>
                                            <input type="text" name="name" id="member_name" required placeholder="Masukkan Nama Lengkap" class="placeholder:text-slate-400 dark:placeholder:text-slate-500 block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                            <p x-show="memberFormErrors.name" x-text="memberFormErrors.name" x-cloak class="text-sm text-red-500 mt-1"></p>
                                        </div>
                                        <div class="space-y-2">
                                            <label for="member_position" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Jabatan <span class="text-red-500">*</span></label>
                                            <input type="text" name="position" id="member_position" required placeholder="Masukkan Jabatan" class="placeholder:text-slate-400 dark:placeholder:text-slate-500 block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                            <p x-show="memberFormErrors.position" x-text="memberFormErrors.position" x-cloak class="text-sm text-red-500 mt-1"></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label for="member_parent" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Atasan (Opsional)</label>
                                            <select name="parent_id" id="member_parent" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                                <option value="">-- Tidak ada --</option>
                                                <template x-for="member in members" :key="member.id">
                                                    <option :value="member.id" x-text="member.name"></option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="space-y-2">
                                            <label for="member_order" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Urutan</label>
                                            <input type="number" name="display_order" id="member_order" value="0" min="0" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="member_linkedin" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">LinkedIn URL</label>
                                    <input type="url" name="linkedin_url" id="member_linkedin" placeholder="https://linkedin.com/in/..." class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                </div>
                                <div class="space-y-2">
                                    <label for="member_instagram" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Instagram URL</label>
                                    <input type="url" name="instagram_url" id="member_instagram" placeholder="https://instagram.com/..." class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500">
                                </div>
                            </div>
                             <div class="space-y-2">
                                <label for="member_bio" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Biografi</label>
                                <textarea name="bio" id="member_bio" rows="3" placeholder="Masukkan Biografi" class="placeholder:text-slate-400 dark:placeholder:text-slate-500 block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent resize-y transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-500"></textarea>
                            </div>
                            <div class="flex justify-end pt-4">
                                <button type="submit" :disabled="isSubmittingMember" class="group inline-flex items-center justify-center gap-2 rounded-xl border border-transparent bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 disabled:from-gray-400 disabled:to-gray-500 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl disabled:shadow-none focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.02] disabled:transform-none disabled:cursor-not-allowed">
                                    <svg x-show="isSubmittingMember" x-cloak class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0011.664 0l3.181-3.183m-3.181-4.991v4.99" /></svg>
                                    <span x-text="isSubmittingMember ? 'Menyimpan...' : 'Tambah Anggota'"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-indigo-100 dark:bg-indigo-900/50 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-900 dark:text-white">Daftar Anggota Saat Ini</h4>
                        </div>
                        <template x-if="members.length > 0">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <template x-for="member in members" :key="member.id">
                                    <div class="group bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm rounded-2xl p-6 border border-slate-200/50 dark:border-slate-700/50 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                                        <div class="flex items-start gap-4">
                                            <div class="relative flex-shrink-0">
                                                <img :src="member.photo_url || `https://ui-avatars.com/api/?name=${encodeURIComponent(member.name)}&color=7F9CF5&background=EBF4FF`" :alt="member.name" class="w-16 h-16 rounded-2xl object-cover border-4 border-white dark:border-slate-600 shadow-lg group-hover:shadow-xl transition-all duration-300">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h5 class="font-bold text-slate-900 dark:text-white truncate text-lg" x-text="member.name"></h5>
                                                <p class="text-sm text-slate-600 dark:text-slate-400 font-medium" x-text="member.position"></p>
                                                <div class="mt-4 flex items-center gap-3">
                                                    <button @click="openEditModal(member)" class="inline-flex items-center gap-1 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 transition-colors duration-200 group/btn">
                                                        <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                        Edit
                                                    </button>
                                                    <span class="text-slate-300 dark:text-slate-600">•</span>
                                                    <form :action="`/admin/about/${aboutId}/members/${member.id}`" method="POST" @submit.prevent="confirmDelete($event)">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center gap-1 text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-500 transition-colors duration-200 group/btn">
                                                            <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <div x-show="members.length === 0" class="text-center py-16 border-2 border-dashed border-slate-300 dark:border-slate-700 rounded-2xl bg-slate-50/50 dark:bg-slate-800/50" style="display: none;">
                            <div class="mx-auto w-16 h-16 bg-slate-200 dark:bg-slate-700 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                            <p class="text-slate-500 dark:text-slate-400 text-lg font-medium">Belum ada anggota organisasi</p>
                            <p class="text-slate-400 dark:text-slate-500 text-sm mt-2">Gunakan form di atas untuk menambahkan anggota baru</p>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="isEditModalOpen" @keydown.escape.window="isEditModalOpen = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4" style="display: none;">
                <div @click.away="isEditModalOpen = false" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto border border-white/20 dark:border-slate-700/50">
                    <div class="px-8 py-6 border-b border-slate-200/50 dark:border-slate-700/50 sticky top-0 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl z-10 rounded-t-3xl">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Edit Anggota</h3>
                            </div>
                            <button @click="isEditModalOpen = false" class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-700 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </div>
                    <form :action="editFormUrl" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                        @csrf @method('PUT')
                        <div class="w-full text-center">
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Foto Profil</label>
                            <div class="space-y-4">
                                <div class="w-36 h-36 mx-auto rounded-2xl bg-gradient-to-br from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-600 flex items-center justify-center text-slate-400 overflow-hidden shadow-xl ring-4 ring-white dark:ring-slate-600">
                                    <img x-show="editPhotoPreview" :src="editPhotoPreview" class="w-full h-full object-cover">
                                    <div x-show="!editPhotoPreview" class="text-center">
                                        <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                        <p class="text-xs text-slate-500">No Photo</p>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-2">
                                    <button type="button" @click="$refs.editPhotoInput.click()" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50 rounded-xl hover:bg-blue-100 dark:hover:bg-blue-900/70 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        Ganti Foto
                                    </button>
                                    <input type="file" name="photo" @change="handleFileSelect($event, 'editMember')" x-ref="editPhotoInput" accept="image/*" class="hidden">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" :value="memberData.name" required class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Jabatan <span class="text-red-500">*</span></label>
                                <input type="text" name="position" :value="memberData.position" required class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                             <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Atasan (Opsional)</label>
                                <select name="parent_id" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                    <option value="">-- Tidak ada --</option>
                                    <template x-for="member in members" :key="member.id">
                                        <option :value="member.id" :selected="memberData.parent_id == member.id" x-text="member.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Urutan</label>
                                <input type="number" name="display_order" :value="memberData.display_order" min="0" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            </div>
                        </div>
                         <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">LinkedIn URL</label>
                                <input type="url" name="linkedin_url" :value="memberData.linkedin_url" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Instagram URL</label>
                                <input type="url" name="instagram_url" :value="memberData.instagram_url" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Biografi</label>
                            <textarea name="bio" rows="3" class="block w-full px-4 py-3 border-slate-200 dark:border-slate-600 dark:bg-slate-700/50 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-y transition-all duration-200" x-text="memberData.bio"></textarea>
                        </div>
                        <div class="flex justify-end space-x-4 pt-6 border-t border-slate-200/50 dark:border-slate-700/50">
                            <button type="button" @click="isEditModalOpen = false" class="px-6 py-3 text-sm font-semibold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-600 transition-all duration-200 transform hover:scale-[1.02]">Batal</button>
                            <button type="submit" class="px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl hover:from-blue-700 hover:to-blue-800 shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-[1.02]">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('#mission_content')) {
                ClassicEditor
                    .create(document.querySelector('#mission_content'), {
                        toolbar: { items: [ 'bold', 'italic', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo' ] },
                        placeholder: 'Tuliskan poin-poin misi organisasi di sini...'
                    })
                    .catch(error => console.error('Gagal memuat CKEditor:', error));
            }
        });

        function aboutPageManager(config) {
            return {
                aboutId: config.aboutId,
                isEditModalOpen: false,
                isDragging: false,
                isSubmittingMember: false,
                bannerPreviewUrl: config.initialBannerUrl || null,
                newMemberPhotoPreview: null,
                editPhotoPreview: null,
                editFormUrl: '',
                memberData: {},
                members: config.initialMembers || [],
                memberFormErrors: {},

                addMember(event) {
                    this.isSubmittingMember = true;
                    this.memberFormErrors = {};
                    const form = event.target;
                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        credentials: 'same-origin',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    })
                    .then(response => {
                        if (response.status === 422) {
                            return response.json().then(data => Promise.reject(data));
                        }
                        if (!response.ok) {
                            throw new Error('Terjadi kesalahan pada server.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            this.members.push(data.member);
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: data.message,
                                timer: 2000,
                                showConfirmButton: false,
                                didClose: () => {
                                    form.reset();
                                    this.newMemberPhotoPreview = null;
                                }
                            });
                        }
                    })
                    .catch(errorData => {
                        if (errorData.errors) {
                            this.memberFormErrors = Object.fromEntries(
                                Object.entries(errorData.errors).map(([key, value]) => [key, value[0]])
                            );
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Validasi',
                                text: 'Periksa kembali isian form Anda.',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: errorData.message || 'Gagal terhubung ke server.',
                            });
                        }
                    })
                    .finally(() => {
                        this.isSubmittingMember = false;
                    });
                },
                
                confirmDelete(event) {
                    const form = event.target.closest('form');
                    Swal.fire({
                        title: 'Anda yakin?',
                        text: "Data anggota ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                },

                handleFileSelect(event, type) {
                    const file = event.target.files[0];
                    if (!file) return;
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire({ icon: 'error', title: 'Ukuran File Terlalu Besar', text: 'Ukuran file maksimal adalah 2MB.' });
                        event.target.value = '';
                        return;
                    }
                    const previewUrl = URL.createObjectURL(file);
                    if (type === 'banner') this.bannerPreviewUrl = previewUrl;
                    if (type === 'newMember') this.newMemberPhotoPreview = previewUrl;
                    if (type === 'editMember') this.editPhotoPreview = previewUrl;
                },

                handleDrop(event, type) {
                    this.isDragging = false;
                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        const fileInput = (type === 'banner') ? document.getElementById('banner_image') : null;
                        if (fileInput) {
                            fileInput.files = files;
                            fileInput.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                    }
                },

                removeImage(type) {
                    if (type === 'banner') {
                        this.bannerPreviewUrl = null;
                        document.getElementById('banner_image').value = '';
                    }
                },

                openEditModal(member) {
                    this.memberData = member;
                    this.editFormUrl = `/admin/about/${this.aboutId}/members/${member.id}`;
                    this.editPhotoPreview = member.photo_url || null;
                    this.isEditModalOpen = true;
                }
            }
        }
    </script>
    @endpush
</x-layouts.admin>