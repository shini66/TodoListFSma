<div  {{ $attributes->merge([
    'class' => 'rounded-xl border border-gray-200 bg-white p-6 shadow-sm'
]) }} >
    <div class="flex items-start justify-between gap-4">
        <div class="flex items-start gap-3 flex-1">
            @if ($completed)
                <svg class="mt-1 h-5 w-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @endif
            <div>
                <h3 class='text-lg font-semibold {{ $completed ? "line-through text-gray-400" : "text-gray-900" }}'>{{ $title }}</h3>
                @if($completed)
                    <p class="mt-1 text-sm text-gray-400">
                        Esta tarea ya fue finalizada.
                    </p>
                @else
                    <p class="mt-1 text-sm text-gray-600">
                        {{ $description }}
                    </p>
                @endif

            </div>
        </div>
        <span @class([
            'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium',
            'bg-green-100 text-green-800' => $completed,
            'bg-yellow-100 text-yellow-800' => !$completed,
        ])>
            {{ $completed ? 'Completada' : 'Pendiente' }}
        </span>
    </div>

    <div class="mt-5 flex items-center gap-3">
        <x-danger-button type="button">
            Eliminar
        </x-danger-button>

        @unless ($completed)
            <x-button type="button">
                Completar
            </x-button>
        @endunless
    </div>
</div>
