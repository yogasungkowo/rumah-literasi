<x-layouts.admin title="Tambah Buku Baru" description="Tambah buku baru ke perpustakaan">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-4">
                    <a href="{{ route('admin.books.index') }}" 
                       class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar Buku
                    </a>
                </div>
                
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tambah Buku Baru</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Isi informasi berikut untuk menambahkan buku baru ke perpustakaan.
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                <div class="p-6 lg:p-8">
                    <!-- Error Summary -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800 dark:text-red-200">
                                        Terdapat {{ $errors->count() }} kesalahan pada form
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- Basic Information -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-600 pb-2">
                                Informasi Dasar
                            </h3>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Title -->
                                <div class="lg:col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Judul Buku <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           placeholder="Masukkan judul buku"
                                           required>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Author -->
                                <div>
                                    <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Penulis <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="author" 
                                           name="author" 
                                           value="{{ old('author') }}"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           placeholder="Masukkan nama penulis"
                                           required>
                                    @error('author')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Kategori <span class="text-red-500">*</span>
                                    </label>
                                    <select id="category" 
                                            name="category" 
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                            required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="Fiction" {{ old('category') === 'Fiction' ? 'selected' : '' }}>Fiksi</option>
                                        <option value="Non-Fiction" {{ old('category') === 'Non-Fiction' ? 'selected' : '' }}>Non-Fiksi</option>
                                        <option value="Science" {{ old('category') === 'Science' ? 'selected' : '' }}>Sains</option>
                                        <option value="Technology" {{ old('category') === 'Technology' ? 'selected' : '' }}>Teknologi</option>
                                        <option value="History" {{ old('category') === 'History' ? 'selected' : '' }}>Sejarah</option>
                                        <option value="Biography" {{ old('category') === 'Biography' ? 'selected' : '' }}>Biografi</option>
                                        <option value="Education" {{ old('category') === 'Education' ? 'selected' : '' }}>Pendidikan</option>
                                        <option value="Religion" {{ old('category') === 'Religion' ? 'selected' : '' }}>Agama</option>
                                        <option value="Children" {{ old('category') === 'Children' ? 'selected' : '' }}>Anak-anak</option>
                                        <option value="Other" {{ old('category') === 'Other' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('category')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- ISBN -->
                                <div>
                                    <label for="isbn" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        ISBN
                                    </label>
                                    <input type="text" 
                                           id="isbn" 
                                           name="isbn" 
                                           value="{{ old('isbn') }}"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           placeholder="Masukkan ISBN (opsional)">
                                    @error('isbn')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Publisher -->
                                <div>
                                    <label for="publisher" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Penerbit
                                    </label>
                                    <input type="text" 
                                           id="publisher" 
                                           name="publisher" 
                                           value="{{ old('publisher') }}"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           placeholder="Masukkan nama penerbit">
                                    @error('publisher')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional Details -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-600 pb-2">
                                Detail Tambahan
                            </h3>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Publication Year -->
                                <div>
                                    <label for="publication_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Tahun Terbit
                                    </label>
                                    <input type="number" 
                                           id="publication_year" 
                                           name="publication_year" 
                                           value="{{ old('publication_year') }}"
                                           min="1900" 
                                           max="2030"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           placeholder="contoh: 2023">
                                    @error('publication_year')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Pages -->
                                <div>
                                    <label for="pages" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Jumlah Halaman
                                    </label>
                                    <input type="number" 
                                           id="pages" 
                                           name="pages" 
                                           value="{{ old('pages') }}"
                                           min="1"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           placeholder="contoh: 250">
                                    @error('pages')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Language -->
                                <div>
                                    <label for="language" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Bahasa
                                    </label>
                                    <select id="language" 
                                            name="language" 
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Pilih Bahasa</option>
                                        <option value="Indonesian" {{ old('language') === 'Indonesian' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                        <option value="English" {{ old('language') === 'English' ? 'selected' : '' }}>Bahasa Inggris</option>
                                        <option value="Arabic" {{ old('language') === 'Arabic' ? 'selected' : '' }}>Bahasa Arab</option>
                                        <option value="Other" {{ old('language') === 'Other' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('language')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Book Status -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-600 pb-2">
                                Status Buku
                            </h3>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Condition -->
                                <div>
                                    <label for="condition" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Kondisi <span class="text-red-500">*</span>
                                    </label>
                                    <select id="condition" 
                                            name="condition" 
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                            required>
                                        <option value="">Pilih Kondisi</option>
                                        <option value="new" {{ old('condition') === 'new' ? 'selected' : '' }}>Baru</option>
                                        <option value="good" {{ old('condition') === 'good' ? 'selected' : '' }}>Baik</option>
                                        <option value="fair" {{ old('condition') === 'fair' ? 'selected' : '' }}>Cukup</option>
                                        <option value="poor" {{ old('condition') === 'poor' ? 'selected' : '' }}>Kurang</option>
                                    </select>
                                    @error('condition')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select id="status" 
                                            name="status" 
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                            required>
                                        <option value="">Pilih Status</option>
                                        <option value="available" {{ old('status', 'available') === 'available' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="borrowed" {{ old('status') === 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                                        <option value="donated" {{ old('status') === 'donated' ? 'selected' : '' }}>Didonasikan</option>
                                        <option value="damaged" {{ old('status') === 'damaged' ? 'selected' : '' }}>Rusak</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-600 pb-2">
                                Deskripsi
                            </h3>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Deskripsi Buku
                                </label>
                                <textarea id="description" 
                                          name="description" 
                                          rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white resize-none"
                                          placeholder="Masukkan deskripsi singkat tentang buku...">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Cover Image -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-600 pb-2">
                                Gambar Sampul
                            </h3>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Upload Area -->
                                <div>
                                    <label for="cover_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Upload Sampul Buku
                                    </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-gray-400 dark:hover:border-gray-500 transition-colors">
                                        <div class="space-y-2 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                <label for="cover_image" class="relative cursor-pointer bg-white dark:bg-gray-700 rounded-md font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                    <span>Upload file</span>
                                                    <input id="cover_image" name="cover_image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                                </label>
                                                <p class="pl-1">atau drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG maksimal 2MB</p>
                                        </div>
                                    </div>
                                    @error('cover_image')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Preview Area -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Preview
                                    </label>
                                    <div id="image-preview" class="w-full h-64 bg-gray-100 dark:bg-gray-600 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-500 flex items-center justify-center overflow-hidden">
                                        <div class="text-center">
                                            <svg class="w-12 h-12 text-gray-400 dark:text-gray-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada gambar dipilih</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-600">
                            <a href="{{ route('admin.books.index') }}" 
                               class="px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Tambah Buku
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="w-full h-full object-cover rounded-lg">`;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `
                    <div class="text-center">
                        <svg class="w-12 h-12 text-gray-400 dark:text-gray-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada gambar dipilih</p>
                    </div>
                `;
            }
        }
    </script>
</x-layouts.admin>
