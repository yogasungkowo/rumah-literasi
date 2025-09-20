<x-layouts.admin title="Edit Tentang Kami" description="Edit informasi tentang Rumah Literasi Ranggi">
    <div x-data="aboutPageManager({{ $about->id }})" class="min-h-screen bg-slate-50 dark:bg-slate-900 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header dengan tombol Aksi --}}
            <div class="mb-8 bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="space-y-1">
                        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                            Edit Tentang Kami
                        </h1>
                        <p class="text-sm text-slate-600 dark:text-slate-400 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Perbarui informasi yang tampil di halaman publik
                        </p>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <a href="{{ route('admin.about.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:ring-offset-slate-900 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            <span>Batal</span>
                        </a>
                        <button type="submit" form="about-form" class="inline-flex items-center justify-center gap-2 rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:ring-offset-slate-900 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" /></svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- ============================================= --}}
            {{-- FORM UTAMA UNTUK EDIT HALAMAN 'TENTANG KAMI'  --}}
            {{-- ============================================= --}}
            <form id="about-form" action="{{ route('admin.about.update', $about) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                {{-- Card Informasi Utama --}}
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div class="px-8 py-6 border-b border-slate-200 dark:border-slate-700"><h3 class="text-lg font-bold text-slate-900 dark:text-white">Informasi Utama</h3></div>
                    <div class="p-8 space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label for="main_title" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Judul Utama <span class="text-red-500">*</span></label>
                                <input type="text" name="main_title" id="main_title" value="{{ old('main_title', $about->main_title) }}" required class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('main_title') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="subtitle" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Subjudul</label>
                                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $about->subtitle) }}" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('subtitle') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="main_content" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Konten / Sejarah <span class="text-red-500">*</span></label>
                            <textarea name="main_content" id="main_content" rows="8" required class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 resize-y">{{ old('main_content', $about->main_content) }}</textarea>
                            @error('main_content') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Card Gambar Banner --}}
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                     <div class="px-8 py-6 border-b border-slate-200 dark:border-slate-700"><h3 class="text-lg font-bold text-slate-900 dark:text-white">Gambar Banner</h3></div>
                    <div class="p-8">
                        {{-- ... (kode gambar banner tidak berubah, sudah bagus) ... --}}
                    </div>
                </div>

                {{-- Card Visi & Misi --}}
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div class="px-8 py-6 border-b border-slate-200 dark:border-slate-700"><h3 class="text-lg font-bold text-slate-900 dark:text-white">Visi & Misi</h3></div>
                    <div class="p-8 space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label for="vision_title" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Judul Visi</label>
                                <input type="text" name="vision_title" id="vision_title" value="{{ old('vision_title', $about->vision_title) }}" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('vision_title') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="mission_title" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Judul Misi</label>
                                <input type="text" name="mission_title" id="mission_title" value="{{ old('mission_title', $about->mission_title) }}" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('mission_title') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label for="vision_content" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Konten Visi</label>
                                <textarea name="vision_content" id="vision_content" rows="4" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 resize-y">{{ old('vision_content', $about->vision_content) }}</textarea>
                                @error('vision_content') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="prose dark:prose-invert max-w-none">
                                <label for="mission_content" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Konten Misi</label>
                                <textarea name="mission_content" id="mission_content" rows="4" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('mission_content', $about->mission_content) }}</textarea>
                                @error('mission_content') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </form> {{-- PENTING: FORM UTAMA BERAKHIR DI SINI --}}


            {{-- ====================================================== --}}
            {{-- SECTION STRUKTUR ORGANISASI (SEKARANG DI LUAR FORM)   --}}
            {{-- ====================================================== --}}
            <div class="mt-8 bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-200 dark:border-slate-700">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Struktur Organisasi</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">Kelola anggota dan struktur kepengurusan</p>
                </div>
                <div class="p-8 space-y-10">
                    {{-- FORM TAMBAH ANGGOTA BARU (SEKARANG TERPISAH DAN VALID) --}}
                    <div class="bg-slate-50 dark:bg-slate-800/50 rounded-xl p-6 border dark:border-slate-700">
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Tambah Anggota Baru</h4>
                        <form action="{{ route('admin.about.members.store', $about) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="flex flex-col md:flex-row gap-6">
                                {{-- Photo Uploader --}}
                                <div class="w-full md:w-1/3 text-center">
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Foto Profil</label>
                                    <div x-data="{ newPhotoPreview: null }" class="space-y-2">
                                        <div class="w-32 h-32 mx-auto rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-400 overflow-hidden">
                                            <template x-if="!newPhotoPreview">
                                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                            </template>
                                            <template x-if="newPhotoPreview">
                                                <img :src="newPhotoPreview" class="w-full h-full object-cover">
                                            </template>
                                        </div>
                                        <input type="file" name="photo" id="new_member_photo" accept="image/*" class="hidden" @change="newPhotoPreview = URL.createObjectURL($event.target.files[0])">
                                        <div class="flex justify-center items-center gap-2">
                                            <button type="button" @click="$refs.newPhotoInput.click()" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Pilih Foto</button>
                                            <input type="file" name="photo" x-ref="newPhotoInput" accept="image/*" class="hidden" @change="newPhotoPreview = URL.createObjectURL($event.target.files[0])">
                                        </div>
                                    </div>
                                </div>
                                {{-- Form Fields --}}
                                <div class="w-full md:w-2/3 space-y-4">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label for="member_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                            <input type="text" name="name" id="member_name" required class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label for="member_position" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Jabatan <span class="text-red-500">*</span></label>
                                            <input type="text" name="position" id="member_position" required class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label for="member_parent" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Atasan (Opsional)</label>
                                            <select name="parent_id" id="member_parent" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                <option value="">-- Tidak ada --</option>
                                                @foreach($about->organizationMembers as $member)
                                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="member_order" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Urutan</label>
                                            <input type="number" name="display_order" id="member_order" value="0" min="0" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Other Fields --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="member_linkedin" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">LinkedIn URL</label>
                                    <input type="url" name="linkedin_url" id="member_linkedin" placeholder="https://linkedin.com/in/..." class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="member_instagram" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Instagram URL</label>
                                    <input type="url" name="instagram_url" id="member_instagram" placeholder="https://instagram.com/..." class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                             <div>
                                <label for="member_bio" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Biografi</label>
                                <textarea name="bio" id="member_bio" rows="3" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 resize-y"></textarea>
                            </div>
                            <div class="flex justify-end pt-2">
                                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg border border-transparent bg-green-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                    <span>Tambah Anggota</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Existing Members List --}}
                    <div class="space-y-4">
                         <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Daftar Anggota Saat Ini</h4>
                        @if($about->organizationMembers->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @php
                                    $membersForJs = $about->organizationMembers->map(function ($member) {
                                        // Tambahkan URL foto secara manual jika belum ada
                                        $member->photo_url = $member->photo_path ? asset('storage/' . $member->photo_path) : null;
                                        return $member;
                                    });
                                @endphp
                                @foreach($membersForJs as $member)
                                    <div class="bg-slate-50 dark:bg-slate-800/50 rounded-xl p-4 border dark:border-slate-700 flex items-start gap-4">
                                        <img src="{{ $member->photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode($member->name).'&color=7F9CF5&background=EBF4FF' }}" alt="{{ $member->name }}" class="w-16 h-16 rounded-full object-cover flex-shrink-0 border-2 border-white dark:border-slate-600">
                                        <div class="flex-1 min-w-0">
                                            <h5 class="font-bold text-slate-900 dark:text-white truncate">{{ $member->name }}</h5>
                                            <p class="text-sm text-slate-600 dark:text-slate-400">{{ $member->position }}</p>
                                            @if($member->parent)
                                                <p class="text-xs text-slate-500 mt-1">Atasan: {{ $member->parent->name }}</p>
                                            @endif
                                            <div class="mt-2 flex items-center gap-2">
                                                <button @click="openEditModal({{ json_encode($member) }})" class="text-sm text-blue-600 hover:underline">Edit</button>
                                                <span class="text-slate-300 dark:text-slate-600">|</span>
                                                <form action="{{ route('admin.about.members.delete', [$about, $member]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-10 text-slate-500 dark:text-slate-400 border-2 border-dashed dark:border-slate-700 rounded-xl">
                                <p>Belum ada anggota organisasi yang ditambahkan.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Edit Member Modal --}}
            <div x-show="isEditModalOpen" @keydown.escape.window="isEditModalOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4" style="display: none;">
                <div @click.away="isEditModalOpen = false" class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 sticky top-0 bg-white dark:bg-slate-800">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Edit Anggota</h3>
                    </div>
                    <form :action="editFormUrl" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                        @csrf
                        @method('PUT')
                        {{-- Photo Uploader in Modal --}}
                        <div class="w-full text-center">
                             <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Foto Profil</label>
                            <div class="space-y-2">
                                <div class="w-32 h-32 mx-auto rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-400 overflow-hidden">
                                    <img x-show="editPhotoPreview" :src="editPhotoPreview" class="w-full h-full object-cover">
                                    <svg x-show="!editPhotoPreview" class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <div class="flex justify-center items-center gap-2">
                                    <button type="button" @click="$refs.editPhotoInput.click()" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Ganti Foto</button>
                                    <input type="file" name="photo" x-ref="editPhotoInput" accept="image/*" class="hidden" @change="editPhotoPreview = URL.createObjectURL($event.target.files[0])">
                                </div>
                            </div>
                        </div>
                        {{-- Form Fields in Modal --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" :value="memberData.name" required class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Jabatan <span class="text-red-500">*</span></label>
                                <input type="text" name="position" :value="memberData.position" required class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                             <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Atasan (Opsional)</label>
                                <select name="parent_id" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg">
                                    <option value="">-- Tidak ada --</option>
                                    @foreach($about->organizationMembers as $member)
                                        <option value="{{ $member->id }}" :selected="memberData.parent_id == {{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Urutan</label>
                                <input type="number" name="display_order" :value="memberData.display_order" min="0" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg">
                            </div>
                        </div>
                         <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">LinkedIn URL</label>
                                <input type="url" name="linkedin_url" :value="memberData.linkedin_url" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Instagram URL</label>
                                <input type="url" name="instagram_url" :value="memberData.instagram_url" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Biografi</label>
                            <textarea name="bio" rows="3" class="block w-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 rounded-lg resize-y" x-text="memberData.bio"></textarea>
                        </div>
                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button" @click="isEditModalOpen = false" class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Batal</button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- CKEditor (asumsikan sudah di-load dari layout utama) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#mission_content'), {
                    toolbar: { items: [ 'bold', 'italic', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo' ] },
                    placeholder: 'Tuliskan poin-poin misi organisasi di sini...'
                })
                .catch(error => console.error('Gagal memuat CKEditor:', error));
        });

        function aboutPageManager(aboutId) {
            return {
                isEditModalOpen: false,
                editFormUrl: '',
                memberData: {},
                editPhotoPreview: null,

                openEditModal(member) {
                    this.memberData = member;
                    this.editFormUrl = `/admin/about/${aboutId}/members/${member.id}`;
                    this.editPhotoPreview = member.photo_url || null;
                    this.isEditModalOpen = true;
                }
            }
        }
    </script>
    @endpush
</x-layouts.admin>