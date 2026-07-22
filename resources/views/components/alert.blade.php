@php
    $colorMap = [
        'info'    => 'border-blue-500 bg-blue-50 text-blue-800 dark:bg-blue-950 dark:text-blue-200',
        'danger'  => 'border-red-500 bg-red-50 text-red-800 dark:bg-red-950 dark:text-red-200',
        'success' => 'border-green-500 bg-green-50 text-green-800 dark:bg-green-950 dark:text-green-200',
        'warning' => 'border-yellow-500 bg-yellow-50 text-yellow-800 dark:bg-yellow-950 dark:text-yellow-200',
    ];
    $classes = $colorMap[$type] ?? $colorMap['info'];
@endphp

<div class="border-l-4 rounded-r-md p-4 {{ $classes }}" role="alert">
    <strong class="font-semibold">{{ $title }}</strong>
    <p class="mt-1 text-sm">{{ $slot }}</p>
</div>
