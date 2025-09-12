<x-layouts.integrated-dashboard title="Detail Foto Galeri">
    <!-- Header Section -->
    <div class="mb-8 bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-700 dark:to-indigo-700 rounded-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-2">Detail Foto Galeri</h2>
                <p class="text-blue-100">Informasi lengkap foto galeri</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                   class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300 border border-white/30">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <a href="{{ route('admin.galleries.index') }}" 
                   class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300 border border-white/30">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Image Section -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="aspect-video relative">
                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" 
                     class="w-full h-full object-cover">
                
                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    @if($gallery->is_active)
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-eye mr-1"></i>
                            Aktif
                        </span>
                    @else
                        <span class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-eye-slash mr-1"></i>
                            Tidak Aktif
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Info Section -->
        <div class="space-y-6">
            <!-- Basic Info Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-600"></i>
                    Informasi Foto
                </h3>
                
                <div class="space-y-4">
                    <!-- Title -->
                    <div>
                        <label class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                            Judul
                        </label>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">{{ $gallery->title }}</p>
                    </div>

                    <!-- Description -->
                    @if($gallery->description)
                        <div>
                            <label class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                Deskripsi
                            </label>
                            <p class="text-gray-700 dark:text-gray-300 mt-1 leading-relaxed">{{ $gallery->description }}</p>
                        </div>
                    @endif

                    <!-- Category -->
                    <div>
                        <label class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                            Kategori
                        </label>
                        <div class="mt-1">
                            @php
                                $categoryLabels = [
                                    'general' => 'Umum',
                                    'donation' => 'Donasi Buku',
                                    'training' => 'Pelatihan',
                                    'workshop' => 'Workshop',
                                    'seminar' => 'Seminar',
                                    'community' => 'Komunitas',
                                ];
                                $categoryColors = [
                                    'general' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                                    'donation' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                    'training' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                                    'workshop' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
                                    'seminar' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300',
                                    'community' => 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $categoryColors[$gallery->category] ?? $categoryColors['general'] }}">
                                <i class="fas fa-tag mr-2"></i>
                                {{ $categoryLabels[$gallery->category] ?? ucfirst($gallery->category) }}
                            </span>
                        </div>
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                            Urutan Tampil
                        </label>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">{{ $gallery->sort_order }}</p>
                    </div>
                </div>
            </div>

            <!-- Meta Info Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-clock mr-3 text-blue-600"></i>
                    Informasi Upload
                </h3>
                
                <div class="space-y-4">
                    <!-- Uploader -->
                    <div>
                        <label class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                            Diupload oleh
                        </label>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1 flex items-center">
                            <i class="fas fa-user mr-2 text-gray-400"></i>
                            {{ $gallery->uploader->name }}
                        </p>
                    </div>

                    <!-- Upload Date -->
                    <div>
                        <label class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                            Tanggal Upload
                        </label>
                        <p class="text-gray-700 dark:text-gray-300 mt-1 flex items-center">
                            <i class="fas fa-calendar mr-2 text-gray-400"></i>
                            {{ $gallery->created_at->format('d F Y, H:i') }} WIB
                        </p>
                    </div>

                    <!-- Last Updated -->
                    @if($gallery->updated_at != $gallery->created_at)
                        <div>
                            <label class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                Terakhir Diperbarui
                            </label>
                            <p class="text-gray-700 dark:text-gray-300 mt-1 flex items-center">
                                <i class="fas fa-edit mr-2 text-gray-400"></i>
                                {{ $gallery->updated_at->format('d F Y, H:i') }} WIB
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Actions Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-cogs mr-3 text-blue-600"></i>
                    Aksi
                </h3>
                
                <div class="flex flex-wrap gap-3">
                    <!-- Edit Button -->
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                       class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Foto
                    </a>

                    <!-- Toggle Status Button -->
                    <form action="{{ route('admin.galleries.toggle-status', $gallery) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        @if($gallery->is_active)
                            <button type="submit" 
                                    class="flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-eye-slash mr-2"></i>
                                Nonaktifkan
                            </button>
                        @else
                            <button type="submit" 
                                    class="flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-eye mr-2"></i>
                                Aktifkan
                            </button>
                        @endif
                    </form>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline" 
                          id="delete-gallery-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" 
                                class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:scale-105"
                                onclick="confirmDeleteGallery('{{ $gallery->title }}')">
                            <i class="fas fa-trash mr-2"></i>
                            Hapus Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDeleteGallery(galleryTitle) {
            Swal.fire({
                title: 'Hapus Foto?',
                text: `Apakah Anda yakin ingin menghapus foto "${galleryTitle}"? Tindakan ini tidak dapat dibatalkan.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-gallery-form').submit();
                }
            });
        }
    </script>
</x-layouts.integrated-dashboard>
