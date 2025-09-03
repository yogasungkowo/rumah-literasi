<x-layouts.app :title="$title">
    <!-- Admin Navigation -->
    <x-admin-nav />
    
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Admin Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
                @if(isset($description))
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $description }}</p>
                @endif
            </div>

            <!-- Content -->
            <div class="space-y-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.app>
