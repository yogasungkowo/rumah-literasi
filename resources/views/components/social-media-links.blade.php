@props(['class' => 'flex space-x-4'])

@php
    $socialMedia = \App\Models\SocialMedia::active()->ordered()->get();
@endphp

@if($socialMedia->count() > 0)
    <div {{ $attributes->merge(['class' => $class]) }}>
        @foreach($socialMedia as $platform)
            <a href="{{ $platform->display_url ?: $platform->url }}" 
               target="_blank" 
               rel="noopener noreferrer"
               class="text-gray-300 dark:text-gray-400 hover:text-white dark:hover:text-green-400 transition-colors duration-200"
               title="{{ $platform->platform_name }}">
                <i class="{{ $platform->icon_class }} text-xl"></i>
            </a>
        @endforeach
    </div>
@endif
