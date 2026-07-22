@php
    $colorMap = [
        'info' => 'border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white',
        'danger' => 'border border-red-600 text-red-600 hover:bg-red-600 hover:text-white',
        'success' => 'border border-green-600 text-green-600 hover:bg-green-600 hover:text-white',
        'warning' => 'border border-yellow-500 text-yellow-600 hover:bg-yellow-500 hover:text-white',
    ];

    $classes = $colorMap[$type] ?? $colorMap['info'];
@endphp

<button type="button" class="inline-flex items-center justify-center rounded-lg px-4 py-2 text-sm font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed {{$classes}}">
    {{ $slot }}
</button>
