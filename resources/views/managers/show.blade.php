<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $manager->name }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('managers.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Volver a managers</a>
                <div class="mt-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $manager->name }}</h2>
                        <p class="mt-1 text-gray-600">{{ $manager->email }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('managers.edit', $manager) }}"
                           class="inline-flex items-center rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-900">
                            Editar
                        </a>
                        <form action="{{ route('managers.destroy', $manager) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-red-700"
                                    onclick="return confirm('¿Eliminar este manager?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-semibold tracking-tight">Tareas asignadas</h3>
                <p class="mt-1 text-sm text-gray-600">Total: {{ $manager->tasks_count }} tareas</p>
            </div>

            <div class="space-y-4">
                @forelse ($manager->tasks as $task)
                    <x-card
                        :completed="$task->completed"
                        :title="$task->title"
                        :description="$task->description ?? 'Sin descripción'"
                    />
                @empty
                    <div class="rounded-lg bg-white p-8 text-center text-gray-500 shadow-sm">
                        Este manager no tiene tareas asignadas.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
