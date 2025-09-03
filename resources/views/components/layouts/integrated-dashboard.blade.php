<x-layouts.app :title="$title">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="/" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">Beranda</a></li>
                    <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                    <li class="text-gray-900 dark:text-white font-medium">{{ $title }}</li>
                </ol>
            </nav>

            <!-- Dashboard Content -->
            <div class="space-y-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.app>
