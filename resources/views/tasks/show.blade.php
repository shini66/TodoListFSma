<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $task->title }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('tasks.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Volver a tareas</a>
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex items-start gap-3">
                        <div>
                            <h2 class="text-3xl font-bold tracking-tight">{{ $task->title }}</h2>
                            <div class="mt-2 flex items-center gap-3">
                                <span @class([
                                    'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium',
                                    'bg-green-100 text-green-800' => $task->completed,
                                    'bg-yellow-100 text-yellow-800' => !$task->completed,
                                ])>
                                    {{ $task->completed ? 'Completada' : 'Pendiente' }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    Asignada a: {{ $task->manager?->name ?? 'Sin manager' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="inline-flex items-center rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-900">
                            Editar
                        </a>
                        @unless ($task->completed)
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-green-700">
                                    Completar
                                </button>
                            </form>
                        @endunless
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-red-700"
                                    onclick="return confirm('¿Eliminar esta tarea?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-sm">
                @if ($task->description)
                    <p class="text-gray-700">{{ $task->description }}</p>
                @else
                    <p class="text-gray-400 italic">Sin descripción.</p>
                @endif
            </div>

            <div class="mt-6 text-sm text-gray-500">
                Creada: {{ $task->created_at->format('d/m/Y H:i') }}
                @if ($task->updated_at !== $task->created_at)
                    | Actualizada: {{ $task->updated_at->format('d/m/Y H:i') }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
