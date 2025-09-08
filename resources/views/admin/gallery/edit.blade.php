<x-layouts.integrated-dashboard title="Edit Foto Galeri">
    <!-- Header Section -->
    <div class="mb-8 bg-gradient-to-r from-orange-600 to-red-600 dark:from-orange-700 dark:to-red-700 rounded-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-2">Edit Foto Galeri</h2>
                <p class="text-orange-100">Perbarui informasi foto galeri</p>
            </div>
            <a href="{{ route('admin.galleries.index') }}" 
               class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300 border border-white/30">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Current Image Display -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-image mr-2 text-orange-600"></i>
                    Foto Saat Ini
                </label>
                <div class="mb-4">
                    <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" 
                         class="w-full max-w-md h-64 object-cover rounded-lg shadow-lg">
                </div>
            </div>

            <!-- Image Upload (Optional) -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-image mr-2 text-orange-600"></i>
                    Ganti Foto (Opsional)
                </label>
                
                <div class="relative">
                    <div id="image-preview" class="hidden mb-4">
                        <img id="preview-img" src="" alt="Preview" class="w-full max-w-md h-64 object-cover rounded-lg shadow-lg">
                        <button type="button" id="remove-image" class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <div id="upload-area" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-8 text-center hover:border-orange-500 dark:hover:border-orange-400 transition-colors cursor-pointer">
                        <input type="file" id="image" name="image" accept="image/*" class="hidden">
                        <div class="space-y-4">
                            <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900/30 rounded-full flex items-center justify-center mx-auto">
                                <i class="fas fa-cloud-upload-alt text-2xl text-orange-600 dark:text-orange-400"></i>
                            </div>
                            <div>
                                <p class="text-lg font-medium text-gray-900 dark:text-white">Klik untuk ganti foto</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">atau drag & drop file di sini</p>
                            </div>
                            <p class="text-xs text-gray-400">PNG, JPG, GIF hingga 2MB</p>
                        </div>
                    </div>
                </div>
                
                @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-heading mr-2 text-orange-600"></i>
                    Judul Foto *
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $gallery->title) }}" required
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:bg-gray-700 dark:text-white transition-all"
                       placeholder="Masukkan judul foto">
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-align-left mr-2 text-orange-600"></i>
                    Deskripsi
                </label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:bg-gray-700 dark:text-white transition-all resize-none"
                          placeholder="Deskripsikan foto ini (opsional)">{{ old('description', $gallery->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-tags mr-2 text-orange-600"></i>
                    Kategori *
                </label>
                <select id="category" name="category" required
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:bg-gray-700 dark:text-white transition-all">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $gallery->category) == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-sort-numeric-up mr-2 text-orange-600"></i>
                    Urutan Tampil
                </label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}" min="0"
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:bg-gray-700 dark:text-white transition-all">
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Foto dengan urutan lebih kecil akan ditampilkan lebih awal. Kosongkan atau isi 0 untuk urutan default.
                </p>
                @error('sort_order')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-toggle-on mr-2 text-orange-600"></i>
                    Status
                </label>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                           class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500 transition-all">
                    <span class="text-gray-700 dark:text-gray-300">Aktifkan foto ini di galeri</span>
                </label>
                @error('is_active')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-600">
                <a href="{{ route('admin.galleries.index') }}" 
                   class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg hover:from-orange-700 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadArea = document.getElementById('upload-area');
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            const removeImageBtn = document.getElementById('remove-image');

            // Click to upload
            uploadArea.addEventListener('click', () => imageInput.click());

            // Drag & Drop
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('border-orange-500', 'bg-orange-50', 'dark:bg-orange-900/10');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('border-orange-500', 'bg-orange-50', 'dark:bg-orange-900/10');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('border-orange-500', 'bg-orange-50', 'dark:bg-orange-900/10');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    imageInput.files = files;
                    previewImage(files[0]);
                }
            });

            // File input change
            imageInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    previewImage(e.target.files[0]);
                }
            });

            // Remove image
            removeImageBtn.addEventListener('click', () => {
                imageInput.value = '';
                imagePreview.classList.add('hidden');
                uploadArea.classList.remove('hidden');
            });

            function previewImage(file) {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        uploadArea.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
</x-layouts.integrated-dashboard>
