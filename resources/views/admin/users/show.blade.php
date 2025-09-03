<x-layouts.admin title="User Details" description="View detailed information about {{ $user->name }}">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Users
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- User Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="text-center">
                    <!-- Profile Picture -->
                    <div class="mb-4">
                        @if($user->avatar)
                            <img class="h-32 w-32 rounded-full object-cover mx-auto" 
                                 src="{{ $user->avatar_url }}" 
                                 alt="{{ $user->name }}">
                        @else
                            <div class="h-32 w-32 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center mx-auto">
                                <span class="text-white font-semibold text-4xl">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Basic Info -->
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $user->name }}</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $user->email }}</p>

                    <!-- Status Badge -->
                    @if($user->email_verified_at)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 mb-4">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Verified Account
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300 mb-4">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            Unverified Account
                        </span>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col space-y-2 mt-6">
                        <a href="{{ route('admin.users.edit', $user) }}" 
                           class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit User
                        </a>
                        @if($user->id !== auth()->id())
                            <button onclick="deleteUser({{ $user->id }})" 
                                    class="inline-flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-md transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete User
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- User Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Personal Information</h4>
                </div>
                <div class="p-6">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Full Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->email }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone Number</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->phone ?? 'Not provided' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date of Birth</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->birth_date ? $user->birth_date->format('M d, Y') : 'Not provided' }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Address</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->address ?? 'Not provided' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Roles & Permissions -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Roles & Permissions</h4>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Assigned Roles</dt>
                        <dd class="flex flex-wrap gap-2">
                            @if($user->roles->count() > 0)
                                @foreach($user->roles as $role)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($role->name === 'Admin') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300
                                        @elseif($role->name === 'Donatur Buku') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                        @elseif($role->name === 'Relawan') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                                        @elseif($role->name === 'Peserta Pelatihan') bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300
                                        @elseif($role->name === 'Investor') bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-300
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300 @endif">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300">
                                    No roles assigned
                                </span>
                            @endif
                        </dd>
                    </div>

                    @if($user->roles->count() > 0)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Permissions</dt>
                            <dd>
                                <div class="max-h-32 overflow-y-auto">
                                    @php
                                        $permissions = $user->getAllPermissions()->unique('name');
                                    @endphp
                                    @if($permissions->count() > 0)
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($permissions as $permission)
                                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                                    {{ $permission->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-500 dark:text-gray-400">No specific permissions</span>
                                    @endif
                                </div>
                            </dd>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Account Activity -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Account Activity</h4>
                </div>
                <div class="p-6">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Created</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y \a\t g:i A') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->updated_at->format('M d, Y \a\t g:i A') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Verified</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $user->email_verified_at ? $user->email_verified_at->format('M d, Y \a\t g:i A') : 'Not verified' }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">User ID</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">#{{ $user->id }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.732 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mt-2">Delete User</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    Are you sure you want to delete <strong>{{ $user->name }}</strong>? This action cannot be undone.
                </p>
                <div class="items-center px-4 py-3 mt-4">
                    <form id="deleteForm" method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
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
        function deleteUser(userId) {
            document.getElementById('deleteModal').classList.remove('hidden');
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
