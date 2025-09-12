<x-layouts.integrated-dashboard title="Manajemen Galeri">
    <!-- Header Section -->
    <div class="mb-8 bg-gradient-to-r from-purple-600 to-blue-600 dark:from-purple-700 dark:to-blue-700 rounded-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-2">Manajemen Galeri</h2>
                <p class="text-purple-100">Kelola foto-foto kegiatan untuk ditampilkan di halaman utama</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold">{{ $galleries->total() }}</div>
                    <div class="text-sm text-purple-100">Total Foto</div>
                </div>
                <a href="{{ route('admin.galleries.create') }}" 
                   class="bg-white text-purple-600 px-6 py-3 rounded-xl font-semibold hover:bg-purple-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-plus mr-2"></i>
                    Upload Foto
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Gallery Grid -->
    @if($galleries->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($galleries as $gallery)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <!-- Image -->
                    <div class="relative aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ $gallery->image_url }}" 
                             alt="{{ $gallery->title }}" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <!-- Status Badge -->
                        <div class="absolute top-3 left-3">
                            @if($gallery->is_active)
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-eye mr-1"></i>Aktif
                                </span>
                            @else
                                <span class="bg-gray-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-eye-slash mr-1"></i>Nonaktif
                                </span>
                            @endif
                        </div>

                        <!-- Category Badge -->
                        <div class="absolute top-3 right-3">
                            <span class="bg-black/50 backdrop-blur-sm text-white px-2 py-1 rounded-full text-xs font-medium">
                                {{ ucfirst($gallery->category) }}
                            </span>
                        </div>

                        <!-- Overlay Actions -->
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-2">
                            <a href="{{ route('admin.galleries.show', $gallery) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200"
                               title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition-colors duration-200"
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.galleries.toggle-status', $gallery) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                        class="bg-purple-500 hover:bg-purple-600 text-white p-2 rounded-lg transition-colors duration-200"
                                        title="{{ $gallery->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                    <i class="fas fa-{{ $gallery->is_active ? 'eye-slash' : 'eye' }}"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline" id="delete-gallery-form-{{ $gallery->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200"
                                        title="Hapus"
                                        onclick="confirmDeleteGallery({{ $gallery->id }}, '{{ $gallery->title }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">{{ $gallery->title }}</h3>
                        @if($gallery->description)
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">{{ $gallery->description }}</p>
                        @endif
                        
                        <!-- Meta Info -->
                        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-1"></i>
                                {{ $gallery->uploader->name }}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-1"></i>
                                {{ $gallery->created_at->format('d M Y') }}
                            </div>
                        </div>
                        
                        @if($gallery->sort_order > 0)
                            <div class="mt-2 text-xs text-purple-600 dark:text-purple-400">
                                <i class="fas fa-sort-numeric-up mr-1"></i>
                                Urutan: {{ $gallery->sort_order }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $galleries->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-images text-3xl text-gray-400"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Belum Ada Foto</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-md mx-auto">
                Mulai upload foto kegiatan untuk ditampilkan di galeri website
            </p>
            <a href="{{ route('admin.galleries.create') }}" 
               class="inline-flex items-center bg-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Upload Foto Pertama
            </a>
        </div>
    @endif

    <script>
        function confirmDeleteGallery(galleryId, galleryTitle) {
            Swal.fire({
                title: 'Hapus Foto?',
                text: `Apakah Anda yakin ingin menghapus foto "${galleryTitle}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-gallery-form-${galleryId}`).submit();
                }
            });
        }
    </script>
</x-layouts.integrated-dashboard>
