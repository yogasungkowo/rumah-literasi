<x-layouts.admin title="Tambah Artikel" description="Buat artikel baru">
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            {{-- <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Artikel</h1>
                <p class="text-gray-600 dark:text-gray-400">Buat artikel baru untuk koleksi</p>
            </div> --}}
            <a href="{{ route('admin.articles.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div id="message-container" class="hidden mb-6"></div>
            <div id="category-message-container" class="hidden mb-4"></div>

            <form id="article-form" action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Judul Artikel *</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                placeholder="Masukkan judul artikel yang menarik"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ringkasan</label>
                            <textarea id="excerpt" name="excerpt" rows="3" placeholder="Tulis ringkasan singkat dari artikel Anda..."
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konten Artikel *</label>
                        <textarea id="content" name="content" rows="10" class="hidden">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gambar Artikel</label>
                        <div id="image-upload-container"
                            class="mt-1 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-blue-500 dark:hover:border-blue-400 transition-colors duration-300">

                            <div id="image-preview-wrapper" class="hidden text-center">
                                <img id="image-preview" src="#" alt="Pratinjau Gambar" class="max-h-48 mx-auto rounded-lg shadow-md mb-4" />
                                <button type="button" onclick="removeImage()" class="text-sm font-medium text-red-600 hover:text-red-500">
                                    Hapus atau Ganti Gambar
                                </button>
                            </div>

                            <div id="image-upload-prompt" class="space-y-2 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                    <label for="image"
                                        class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-green-600 dark:text-green-400 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                        <span>Pilih sebuah file</span>
                                        <input id="image" name="image" type="file" class="sr-only" accept="image/*"
                                            onchange="previewImage(event)">
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF hingga 5MB</p>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="category_select" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kategori
                                Utama</label>
                            <select id="category_select" name="category_id"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="new_category_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Atau Buat Kategori
                                Baru</label>
                            <div class="flex space-x-2">
                                <input type="text" id="new_category_name" name="new_category" placeholder="Nama kategori baru"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <button type="button" id="add-category-btn"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors whitespace-nowrap">
                                    Simpan Kategori
                                </button>
                            </div>
                            @error('new_category')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="is_published" name="is_published" value="1"
                                {{ old('is_published') ? 'checked' : '' }}
                                class="rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500 dark:bg-gray-700">
                            <label for="is_published" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Publish Sekarang</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                class="rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500 dark:bg-gray-700">
                            <label for="is_featured" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Featured</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="is_trending" name="is_trending" value="1" {{ old('is_trending') ? 'checked' : '' }}
                                class="rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500 dark:bg-gray-700">
                            <label for="is_trending" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Trending</label>
                        </div>
                    </div>

                    <div>
                        <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal Publish</label>
                        <input type="text" id="published_at" name="published_at" value="{{ old('published_at') }}"
                            placeholder="Pilih tanggal dan waktu publikasi"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kosongkan untuk publish sekarang jika dipilih.</p>
                        @error('published_at')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-6 pt-4 border-t dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Pengaturan SEO (Otomatis)</h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title') }}"
                                    placeholder="Judul yang akan tampil di mesin pencari"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                @error('meta_title')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Meta
                                    Description</label>
                                <input type="text" id="meta_description" name="meta_description" value="{{ old('meta_description') }}"
                                    placeholder="Deskripsi singkat untuk mesin pencari (maks 160 karakter)"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                @error('meta_description')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Meta Keywords</label>
                            <input type="text" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}"
                                placeholder="keyword1, keyword2, keyword3"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            @error('meta_keywords')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('admin.articles.index') }}"
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                        Simpan Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let ckeditorInstance;

                // --- Inisialisasi Library Pihak Ketiga ---
                flatpickr("#published_at", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    altInput: true,
                    altFormat: "d F Y, Pukul H:i",
                });

                ClassicEditor
                    .create(document.querySelector('#content'))
                    .then(editor => {
                        ckeditorInstance = editor;
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan saat memuat CKEditor:', error);
                    });


                // --- Fitur 1: Tambah Kategori via AJAX ---
                const addCategoryBtn = document.getElementById('add-category-btn');
                const newCategoryInput = document.getElementById('new_category_name');
                const categorySelect = document.getElementById('category_select');
                const additionalCategoriesContainer = document.getElementById('additional-categories-container');
                const categoryMessageContainer = document.getElementById('category-message-container');

                addCategoryBtn.addEventListener('click', function() {
                    const categoryName = newCategoryInput.value.trim();
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const originalBtnText = this.innerHTML;

                    if (!categoryName) {
                        alert('Nama kategori tidak boleh kosong.');
                        return;
                    }

                    this.disabled = true;
                    this.innerHTML = 'Menyimpan...';
                    categoryMessageContainer.className = 'hidden';

                    fetch('{{ route('admin.categories.store.ajax') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({
                                name: categoryName
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const newCategory = data.category;
                                const newOption = new Option(newCategory.name, newCategory.id);
                                categorySelect.add(newOption);

                                const newCheckboxLabel = document.createElement('label');
                                newCheckboxLabel.className = 'inline-flex items-center';
                                newCheckboxLabel.innerHTML = `
                            <input type="checkbox" name="categories[]" value="${newCategory.id}" class="rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500 dark:bg-gray-700">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">${newCategory.name}</span>`;
                                additionalCategoriesContainer.appendChild(newCheckboxLabel);

                                categorySelect.value = newCategory.id;
                                newCategoryInput.value = '';
                                categoryMessageContainer.className =
                                    'p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800';
                                categoryMessageContainer.textContent = data.message;
                            } else {
                                let errorMessage = data.message || 'Terjadi kesalahan.';
                                if (data.errors && data.errors.name) {
                                    errorMessage = data.errors.name[0];
                                }
                                categoryMessageContainer.className =
                                    'p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800';
                                categoryMessageContainer.textContent = errorMessage;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            categoryMessageContainer.className =
                                'p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800';
                            categoryMessageContainer.textContent = 'Gagal menambahkan kategori. Periksa koneksi Anda.';
                        })
                        .finally(() => {
                            addCategoryBtn.disabled = false;
                            addCategoryBtn.innerHTML = 'Simpan Kategori';
                        });
                });


                // --- Fitur 2: Auto-fill Meta Fields ---
                const titleInput = document.getElementById('title');
                const excerptInput = document.getElementById('excerpt');
                const metaTitleInput = document.getElementById('meta_title');
                const metaDescInput = document.getElementById('meta_description');
                const metaKeywordsInput = document.getElementById('meta_keywords');

                const generateKeywords = (text) => {
                    const stopWords = ['di', 'dan', 'atau', 'yang', 'untuk', 'dengan', 'ini', 'itu', 'adalah', 'sebagai', 'pada', 'ke', 'dari',
                        'sebuah'
                    ];
                    return text.toLowerCase().replace(/[^a-z0-9\s]/gi, '').split(/\s+/).filter(word => word.length > 3 && !stopWords.includes(
                        word)).join(', ');
                };

                titleInput.addEventListener('keyup', function() {
                    const titleValue = this.value;
                    metaTitleInput.value = titleValue;
                    metaKeywordsInput.value = generateKeywords(titleValue);
                });

                excerptInput.addEventListener('keyup', function() {
                    metaDescInput.value = this.value;
                });

                // --- Fitur 3: Submit Artikel Form via AJAX ---
                document.getElementById('article-form').addEventListener('submit', function(e) {
                    e.preventDefault();

                    if (ckeditorInstance) {
                        document.querySelector('#content').value = ckeditorInstance.getData();
                    }

                    const form = this;
                    const contentValue = (document.querySelector('#content').value || '').trim();
                    const submitButton = form.querySelector('button[type="submit"]');
                    const messageContainer = document.getElementById('message-container');

                    // Client-side validation: pastikan konten tidak kosong
                    if (!contentValue) {
                        messageContainer.className = 'mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
                        messageContainer.innerHTML = '<strong>Konten artikel tidak boleh kosong.</strong> Silakan tulis konten pada editor.';
                        // Re-enable button in case it was disabled
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Simpan Artikel';
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        return;
                    }

                    const formData = new FormData(form);

                    submitButton.disabled = true;
                    submitButton.innerHTML =
                        '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyimpan...';
                    messageContainer.className = 'hidden mb-6';

                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                messageContainer.className = 'mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg';
                                messageContainer.innerHTML = `
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Artikel berhasil disimpan!
                                </div>
                                <div class="flex space-x-2">
                                    <a href="${data.redirect || '{{ route('admin.articles.index') }}'}" class="text-green-700 hover:text-green-800 underline text-sm">Lihat Artikel</a>
                                    <button type="button" onclick="window.location.reload()" class="text-green-700 hover:text-green-800 underline text-sm">Buat Artikel Baru</button>
                                </div>
                            </div>`;
                                form.reset();
                                if (ckeditorInstance) {
                                    ckeditorInstance.setData('');
                                }
                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                });
                            } else {
                                let errorHtml = '<ul class="list-disc list-inside space-y-1">';
                                if (data.errors) {
                                    for (const messages of Object.values(data.errors)) {
                                        messages.forEach(message => errorHtml += `<li>${message}</li>`);
                                    }
                                } else {
                                    errorHtml += `<li>${data.message || 'Terjadi kesalahan tidak diketahui.'}</li>`;
                                }
                                errorHtml += '</ul>';

                                messageContainer.className = 'mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
                                messageContainer.innerHTML = `
                        <div class="flex items-center mb-2 font-semibold">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            Terjadi Kesalahan:
                        </div>
                        ${errorHtml}`;
                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            messageContainer.className = 'mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
                            messageContainer.innerHTML = `Terjadi kesalahan pada server. Silakan coba lagi.`;
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        })
                        .finally(() => {
                            submitButton.disabled = false;
                            submitButton.innerHTML = 'Simpan Artikel';
                        });
                });
                // --- FUNGSI UNTUK PRATINJAU GAMBAR ---
                const imageInput = document.getElementById('image');
                const imagePreviewWrapper = document.getElementById('image-preview-wrapper');
                const imagePreview = document.getElementById('image-preview');
                const imageUploadPrompt = document.getElementById('image-upload-prompt');

                // expose to global scope so inline onchange="previewImage(event)" works
                function handleImageFile(file) {
                    const messageContainer = document.getElementById('message-container');
                    // validate file type
                    if (!file.type.startsWith('image/')) {
                        messageContainer.className = 'mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
                        messageContainer.innerHTML = '<strong>Tipe file tidak valid.</strong> Harap pilih file gambar (PNG/JPG/GIF).';
                        // clear input
                        imageInput.value = null;
                        return;
                    }

                    // validate file size (max 5MB)
                    const maxSize = 5 * 1024 * 1024;
                    if (file.size > maxSize) {
                        messageContainer.className = 'mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
                        messageContainer.innerHTML = '<strong>Ukuran file terlalu besar.</strong> Maksimal 5MB.';
                        imageInput.value = null;
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Tampilkan pratinjau
                        imagePreview.src = e.target.result;
                        imagePreviewWrapper.classList.remove('hidden');

                        // Sembunyikan prompt upload
                        imageUploadPrompt.classList.add('hidden');
                    }
                    reader.readAsDataURL(file);
                }

                window.previewImage = function(event) {
                    const file = event.target.files && event.target.files[0];
                    if (file) handleImageFile(file);
                }

                window.removeImage = function() {
                    // Hapus file dari input
                    imageInput.value = null;

                    // Sembunyikan pratinjau
                    imagePreview.src = "#";
                    imagePreviewWrapper.classList.add('hidden');

                    // Tampilkan kembali prompt upload
                    imageUploadPrompt.classList.remove('hidden');
                }

                // Drag & drop support
                const imageUploadContainerEl = document.getElementById('image-upload-container');
                if (imageUploadContainerEl) {
                    imageUploadContainerEl.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        e.dataTransfer.dropEffect = 'copy';
                        imageUploadContainerEl.classList.add('ring-2', 'ring-blue-400');
                    });
                    imageUploadContainerEl.addEventListener('dragleave', function() {
                        imageUploadContainerEl.classList.remove('ring-2', 'ring-blue-400');
                    });
                    imageUploadContainerEl.addEventListener('drop', function(e) {
                        e.preventDefault();
                        imageUploadContainerEl.classList.remove('ring-2', 'ring-blue-400');
                        const dt = e.dataTransfer;
                        if (dt && dt.files && dt.files.length) {
                            const file = dt.files[0];
                            // populate file input for form submission
                            try {
                                const dataTransfer = new DataTransfer();
                                dataTransfer.items.add(file);
                                imageInput.files = dataTransfer.files;
                            } catch (err) {
                                // Some browsers disallow setting files programmatically; still preview without setting input
                                console.warn('Tidak bisa set input.files secara programatik, tetap menampilkan pratinjau.');
                            }
                            handleImageFile(file);
                        }
                    });
                }
            });
        </script>
    @endpush
</x-layouts.admin>
