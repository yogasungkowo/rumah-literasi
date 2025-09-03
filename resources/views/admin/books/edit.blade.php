<x-layouts.admin title="Edit Book" description="Update book information">
    <div class="max-w-2xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.books.show', $book) }}" 
               class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Book Details
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Current Cover Preview -->
                @if($book->cover_image)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Cover</label>
                        <img src="{{ Storage::url($book->cover_image) }}" 
                             alt="{{ $book->title }}" 
                             class="h-32 w-24 object-cover rounded shadow-sm">
                    </div>
                @endif

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Book Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $book->title) }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-300 @enderror"
                           placeholder="Enter book title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author -->
                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Author <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="author" 
                           name="author" 
                           value="{{ old('author', $book->author) }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('author') border-red-300 @enderror"
                           placeholder="Enter author name">
                    @error('author')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ISBN and Category -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="isbn" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">ISBN</label>
                        <input type="text" 
                               id="isbn" 
                               name="isbn" 
                               value="{{ old('isbn', $book->isbn) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('isbn') border-red-300 @enderror"
                               placeholder="Enter ISBN">
                        @error('isbn')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select id="category" 
                                name="category" 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-300 @enderror">
                            <option value="">Select Category</option>
                            <option value="Fiction" {{ old('category', $book->category) == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="Non-Fiction" {{ old('category', $book->category) == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                            <option value="Education" {{ old('category', $book->category) == 'Education' ? 'selected' : '' }}>Education</option>
                            <option value="Children" {{ old('category', $book->category) == 'Children' ? 'selected' : '' }}>Children</option>
                            <option value="Reference" {{ old('category', $book->category) == 'Reference' ? 'selected' : '' }}>Reference</option>
                            <option value="Biography" {{ old('category', $book->category) == 'Biography' ? 'selected' : '' }}>Biography</option>
                            <option value="History" {{ old('category', $book->category) == 'History' ? 'selected' : '' }}>History</option>
                            <option value="Science" {{ old('category', $book->category) == 'Science' ? 'selected' : '' }}>Science</option>
                            <option value="Technology" {{ old('category', $book->category) == 'Technology' ? 'selected' : '' }}>Technology</option>
                            <option value="Religion" {{ old('category', $book->category) == 'Religion' ? 'selected' : '' }}>Religion</option>
                            <option value="Arts" {{ old('category', $book->category) == 'Arts' ? 'selected' : '' }}>Arts</option>
                            <option value="Other" {{ old('category', $book->category) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Publisher and Publication Year -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="publisher" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Publisher</label>
                        <input type="text" 
                               id="publisher" 
                               name="publisher" 
                               value="{{ old('publisher', $book->publisher) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('publisher') border-red-300 @enderror"
                               placeholder="Enter publisher">
                        @error('publisher')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="publication_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Publication Year</label>
                        <input type="number" 
                               id="publication_year" 
                               name="publication_year" 
                               value="{{ old('publication_year', $book->publication_year) }}"
                               min="1000" 
                               max="{{ date('Y') + 1 }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('publication_year') border-red-300 @enderror"
                               placeholder="Enter publication year">
                        @error('publication_year')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Language and Pages -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="language" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Language</label>
                        <select id="language" 
                                name="language" 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('language') border-red-300 @enderror">
                            <option value="">Select Language</option>
                            <option value="Bahasa Indonesia" {{ old('language', $book->language) == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                            <option value="English" {{ old('language', $book->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Arabic" {{ old('language', $book->language) == 'Arabic' ? 'selected' : '' }}>Arabic</option>
                            <option value="Chinese" {{ old('language', $book->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $book->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                            <option value="Other" {{ old('language', $book->language) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('language')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pages" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Number of Pages</label>
                        <input type="number" 
                               id="pages" 
                               name="pages" 
                               value="{{ old('pages', $book->pages) }}"
                               min="1"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('pages') border-red-300 @enderror"
                               placeholder="Enter number of pages">
                        @error('pages')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status" 
                            name="status" 
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-300 @enderror">
                        <option value="available" {{ old('status', $book->status) == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="borrowed" {{ old('status', $book->status) == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                        <option value="maintenance" {{ old('status', $book->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-300 @enderror"
                              placeholder="Enter book description">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Internal Notes</label>
                    <textarea id="notes" 
                              name="notes" 
                              rows="3"
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('notes') border-red-300 @enderror"
                              placeholder="Internal notes for staff use">{{ old('notes', $book->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cover Image Upload -->
                <div>
                    <label for="cover_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Update Cover Image
                    </label>
                    <input type="file" 
                           id="cover_image" 
                           name="cover_image" 
                           accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('cover_image') border-red-300 @enderror">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Leave empty to keep current cover image. Accepted formats: JPG, PNG, GIF. Max size: 2MB.</p>
                    @error('cover_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.books.show', $book) }}" 
                       class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium transition-colors">
                        Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
