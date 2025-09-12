<x-layouts.admin title="Book Details" description="View detailed information about this book">
    <div class="max-w-4xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.books.index') }}" 
               class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Books
            </a>
        </div>

        <!-- Book Details -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Book Cover -->
                    <div class="lg:col-span-1">
                        @if($book->cover_image)
                            <img src="{{ Storage::url($book->cover_image) }}" 
                                 alt="{{ $book->title }}"
                                 class="w-full max-w-sm mx-auto rounded-lg shadow-lg">
                        @else
                            <div class="w-full max-w-sm mx-auto aspect-[3/4] bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                <svg class="h-24 w-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Book Information -->
                    <div class="lg:col-span-2">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $book->title }}</h1>
                                <p class="text-xl text-gray-600 dark:text-gray-400">by {{ $book->author }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.books.edit', $book) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Edit Book
                                </a>
                                <form action="{{ route('admin.books.destroy', $book) }}" 
                                      method="POST" 
                                      class="inline"
                                      id="delete-book-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                                            onclick="confirmDeleteBook('{{ $book->title }}')">
                                        Delete Book
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="mb-6">
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full
                                @if($book->status === 'available') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                @elseif($book->status === 'borrowed') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @endif">
                                {{ ucfirst($book->status) }}
                            </span>
                        </div>

                        <!-- Book Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">ISBN</h3>
                                <p class="text-lg text-gray-900 dark:text-white">{{ $book->isbn ?: 'Not available' }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Category</h3>
                                <p class="text-lg text-gray-900 dark:text-white">{{ $book->category }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Publication Year</h3>
                                <p class="text-lg text-gray-900 dark:text-white">{{ $book->publication_year ?: 'Not specified' }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Publisher</h3>
                                <p class="text-lg text-gray-900 dark:text-white">{{ $book->publisher ?: 'Not specified' }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Language</h3>
                                <p class="text-lg text-gray-900 dark:text-white">{{ $book->language ?: 'Not specified' }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Pages</h3>
                                <p class="text-lg text-gray-900 dark:text-white">{{ $book->pages ? $book->pages . ' pages' : 'Not specified' }}</p>
                            </div>
                        </div>

                        <!-- Description -->
                        @if($book->description)
                            <div class="mt-8">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Description</h3>
                                <div class="prose prose-lg text-gray-900 dark:text-white max-w-none">
                                    <p>{{ $book->description }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Additional Notes -->
                        @if($book->notes)
                            <div class="mt-8">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Internal Notes</h3>
                                <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
                                    <p class="text-gray-900 dark:text-white">{{ $book->notes }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer with metadata -->
            <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-4 bg-gray-50 dark:bg-gray-700">
                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                    <div>
                        <span>Added on {{ $book->created_at->format('F j, Y \a\t g:i A') }}</span>
                    </div>
                    @if($book->updated_at->ne($book->created_at))
                        <div>
                            <span>Last updated {{ $book->updated_at->format('F j, Y \a\t g:i A') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDeleteBook(bookTitle) {
            Swal.fire({
                title: 'Hapus Buku?',
                text: `Apakah Anda yakin ingin menghapus buku "${bookTitle}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-book-form').submit();
                }
            });
        }
    </script>
</x-layouts.admin>
