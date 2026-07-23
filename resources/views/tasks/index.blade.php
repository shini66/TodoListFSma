<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis Tareas
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight">Mis Tareas</h2>
                    <p class="mt-1 text-gray-600">
                        Administrá tus tareas pendientes y completadas.
                    </p>
                </div>
                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-900">
                    + Nueva Tarea
                </a>
            </div>

            @if (session('status'))
                <div class="mb-4">
                    <x-alert type="success" title="Listo">
                        {{ session('status') }}
                    </x-alert>
                </div>
            @endif

            <div class="space-y-4">
                @forelse ($tasks as $task)
                    <x-card
                        :completed="$task->completed"
                        :title="$task->title"
                        :description="$task->description"
                    />
                @empty
                    <div class="rounded-lg bg-white p-8 text-center text-gray-500 shadow-sm">
                        No hay tareas registradas.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
