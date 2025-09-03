<x-layouts.admin title="Donation Details" description="Review and manage donation details">
    <div class="max-w-4xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.donations.index') }}" 
               class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Donations
            </a>
        </div>

        <!-- Status and Actions -->
        <div class="mb-6 flex justify-between items-center">
            <div>
                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full
                    @if($donation->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                    @elseif($donation->status === 'approved') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                    @elseif($donation->status === 'picked_up') bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100
                    @elseif($donation->status === 'completed') bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100
                    @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @endif">
                    {{ ucfirst(str_replace('_', ' ', $donation->status)) }}
                </span>
            </div>

            <!-- Action Buttons -->
            @if($donation->status === 'pending')
                <div class="flex space-x-2">
                    <form action="{{ route('admin.donations.approve', $donation) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                                onclick="return confirm('Are you sure you want to approve this donation?')">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Approve
                        </button>
                    </form>
                    <form action="{{ route('admin.donations.reject', $donation) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                                onclick="return confirm('Are you sure you want to reject this donation?')">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Reject
                        </button>
                    </form>
                </div>
            @elseif($donation->status === 'approved')
                <div class="flex space-x-2">
                    <form action="{{ route('admin.donations.mark-picked-up', $donation) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                                onclick="return confirm('Mark this donation as picked up?')">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Mark as Picked Up
                        </button>
                    </form>
                </div>
            @elseif($donation->status === 'picked_up')
                <div class="flex space-x-2">
                    <form action="{{ route('admin.donations.complete', $donation) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                                onclick="return confirm('Mark this donation as completed?')">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Mark as Completed
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Donation Information -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Donor Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Donor Information</h3>
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                                <p class="text-gray-900 dark:text-white">{{ $donation->donor_name }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                                <p class="text-gray-900 dark:text-white">{{ $donation->donor_email }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone</label>
                                <p class="text-gray-900 dark:text-white">{{ $donation->donor_phone ?: 'Not provided' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Address</label>
                                <p class="text-gray-900 dark:text-white">{{ $donation->donor_address ?: 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Donation Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Donation Details</h3>
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Submitted On</label>
                                <p class="text-gray-900 dark:text-white">{{ $donation->created_at->format('F j, Y \a\t g:i A') }}</p>
                            </div>
                            @if($donation->verified_by)
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Verified By</label>
                                    <p class="text-gray-900 dark:text-white">{{ $donation->verifier->name ?? 'Unknown' }}</p>
                                </div>
                            @endif
                            @if($donation->verified_at)
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Verified At</label>
                                    <p class="text-gray-900 dark:text-white">{{ $donation->verified_at->format('F j, Y \a\t g:i A') }}</p>
                                </div>
                            @endif
                            @if($donation->notes)
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Notes</label>
                                    <p class="text-gray-900 dark:text-white">{{ $donation->notes }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Book Information -->
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Book Information</h3>
                    
                    @if($donation->book_data)
                        @php $bookData = is_string($donation->book_data) ? json_decode($donation->book_data, true) : $donation->book_data; @endphp
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Book Cover -->
                            @if(isset($bookData['cover']) && $bookData['cover'])
                                <div class="lg:col-span-1">
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400 block mb-2">Book Cover</label>
                                    <img src="{{ Storage::url($bookData['cover']) }}" 
                                         alt="Book Cover" 
                                         class="w-full max-w-48 rounded-lg shadow-md">
                                </div>
                            @endif
                            
                            <!-- Book Details -->
                            <div class="{{ isset($bookData['cover']) && $bookData['cover'] ? 'lg:col-span-2' : 'lg:col-span-3' }}">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @if(isset($bookData['title']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Title</label>
                                            <p class="text-gray-900 dark:text-white font-medium">{{ $bookData['title'] }}</p>
                                        </div>
                                    @endif
                                    
                                    @if(isset($bookData['author']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Author</label>
                                            <p class="text-gray-900 dark:text-white">{{ $bookData['author'] }}</p>
                                        </div>
                                    @endif
                                    
                                    @if(isset($bookData['category']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</label>
                                            <p class="text-gray-900 dark:text-white">{{ $bookData['category'] }}</p>
                                        </div>
                                    @endif
                                    
                                    @if(isset($bookData['condition']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Condition</label>
                                            <p class="text-gray-900 dark:text-white">{{ ucfirst($bookData['condition']) }}</p>
                                        </div>
                                    @endif
                                    
                                    @if(isset($bookData['isbn']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">ISBN</label>
                                            <p class="text-gray-900 dark:text-white">{{ $bookData['isbn'] ?: 'Not provided' }}</p>
                                        </div>
                                    @endif
                                    
                                    @if(isset($bookData['publisher']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Publisher</label>
                                            <p class="text-gray-900 dark:text-white">{{ $bookData['publisher'] ?: 'Not provided' }}</p>
                                        </div>
                                    @endif
                                    
                                    @if(isset($bookData['publication_year']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Publication Year</label>
                                            <p class="text-gray-900 dark:text-white">{{ $bookData['publication_year'] ?: 'Not provided' }}</p>
                                        </div>
                                    @endif
                                    
                                    @if(isset($bookData['pages']))
                                        <div>
                                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Pages</label>
                                            <p class="text-gray-900 dark:text-white">{{ $bookData['pages'] ? $bookData['pages'] . ' pages' : 'Not provided' }}</p>
                                        </div>
                                    @endif
                                </div>
                                
                                @if(isset($bookData['description']) && $bookData['description'])
                                    <div class="mt-4">
                                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</label>
                                        <p class="text-gray-900 dark:text-white mt-1">{{ $bookData['description'] }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No book information available.</p>
                    @endif
                </div>

                <!-- Admin Notes Section -->
                @if($donation->status !== 'pending')
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Add Admin Notes</h3>
                        <form action="{{ route('admin.donations.notes', $donation) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="space-y-4">
                                <div>
                                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Internal Notes</label>
                                    <textarea id="notes" 
                                              name="notes" 
                                              rows="3"
                                              class="mt-1 w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                              placeholder="Add internal notes about this donation...">{{ $donation->notes }}</textarea>
                                </div>
                                <div>
                                    <button type="submit" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors font-medium">
                                        Update Notes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.admin>
