@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-layouts.admin title="Books Management" description="Manage all books in the library collection">
    <!-- Action Bar -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div class="mb-4 sm:mb-0">
            <a href="{{ route('admin.books.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Add New Book
            </a>
        </div>
        
        <!-- Search -->
        <div class="flex flex-col sm:flex-row gap-2">
            <form method="GET" action="{{ route('admin.books.index') }}" class="flex gap-2">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="Search books..." 
                       class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <select name="status" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Status</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="borrowed" {{ request('status') == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                    <option value="donated" {{ request('status') == 'donated' ? 'selected' : '' }}>Donated</option>
                    <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>Lost</option>
                    <option value="damaged" {{ request('status') == 'damaged' ? 'selected' : '' }}>Damaged</option>
                </select>
                <button type="submit" 
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md transition-colors">
                    Search
                </button>
                @if(request('search') || request('status'))
                    <a href="{{ route('admin.books.index') }}" 
                       class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-md transition-colors">
                        Clear
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Books Grid -->
    @if($books->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-6">
            @foreach($books as $book)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <!-- Book Cover -->
                    <div class="aspect-w-3 aspect-h-4 bg-gray-100">
                        @php
                            // Get cover from book's cover_image or fallback to donation data
                            $coverUrl = null;
                            
                            // First try: use book's cover_image if available
                            if ($book->cover_image) {
                                $coverUrl = Storage::url($book->cover_image);
                            } 
                            // Second try: use linked donation
                            elseif ($book->donation && $book->donation->book_data) {
                                foreach ($book->donation->book_data as $bookData) {
                                    if (isset($bookData['title']) && $bookData['title'] === $book->title && isset($bookData['cover'])) {
                                        $coverUrl = Storage::url($bookData['cover']);
                                        break;
                                    }
                                }
                            }
                            // Third try: search all donations for matching book title (fallback)
                            else {
                                foreach ($allDonations as $donation) {
                                    if ($donation->book_data) {
                                        foreach ($donation->book_data as $bookData) {
                                            if (isset($bookData['title']) && $bookData['title'] === $book->title && isset($bookData['cover'])) {
                                                $coverUrl = Storage::url($bookData['cover']);
                                                break 2; // Break out of both loops
                                            }
                                        }
                                    }
                                }
                            }
                        @endphp
                        
                        @if($coverUrl)
                            <img src="{{ $coverUrl }}" 
                                 alt="{{ $book->title }}"
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Book Info -->
                    <div class="p-4 dark:bg-gray-800 dark:border-gray-700">
                        <h3 class="font-semibold text-gray-900 mb-1 line-clamp-2 dark:text-white">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-600 mb-2 dark:text-white">by {{ $book->author }}</p>
                        <p class="text-xs text-gray-500 mb-3 dark:text-white">{{ $book->category }}</p>
                        
                        <!-- Status Badge -->
                        @php
                            $statusConfig = [
                                'available' => ['bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300', 'Available'],
                                'borrowed' => ['bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300', 'Borrowed'], 
                                'donated' => ['bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300', 'Donated'],
                                'maintenance' => ['bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300', 'Maintenance'],
                                'lost' => ['bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300', 'Lost'],
                                'damaged' => ['bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300', 'Damaged'],
                            ];
                            
                            $currentStatus = $statusConfig[$book->status] ?? ['bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300', ucfirst($book->status)];
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mb-3 {{ $currentStatus[0] }}">
                            {{ $currentStatus[1] }}
                        </span>

                        <!-- Actions -->
                        <div class="flex gap-2 mt-3">
                            <a href="{{ route('admin.books.show', $book) }}" 
                               class="flex-1 text-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md transition-colors">
                                View
                            </a>
                            <a href="{{ route('admin.books.edit', $book) }}" 
                               class="flex-1 text-center px-3 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm rounded-md transition-colors">
                                Edit
                            </a>
                            <button onclick="deleteBook({{ $book->id }})" 
                                    class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-md transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $books->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No books found</h3>
            <p class="mt-1 text-sm text-gray-500">
                @if(request('search') || request('status'))
                    Try adjusting your search criteria or 
                    <a href="{{ route('admin.books.index') }}" class="text-blue-600 hover:text-blue-500">clear filters</a>.
                @else
                    Get started by adding your first book.
                @endif
            </p>
            @if(!request('search') && !request('status'))
                <div class="mt-6">
                    <a href="{{ route('admin.books.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Add First Book
                    </a>
                </div>
            @endif
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.732 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-2">Delete Book</h3>
                <p class="text-sm text-gray-500 mt-2">
                    Are you sure you want to delete this book? This action cannot be undone.
                </p>
                <div class="items-center px-4 py-3 mt-4">
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md hover:bg-red-700 mr-2 transition-colors">
                            Delete
                        </button>
                    </form>
                    <button onclick="closeDeleteModal()" 
                            class="px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md hover:bg-gray-400 transition-colors">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteBook(bookId) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/admin/books/${bookId}`;
            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>
</x-layouts.admin>
