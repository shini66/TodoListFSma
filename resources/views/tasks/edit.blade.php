<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Tarea
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <a href="{{ route('tasks.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Volver a tareas</a>
            <h2 class="mt-4 text-3xl font-bold tracking-tight">Editar Tarea</h2>
            <p class="mt-1 text-gray-600">Actualizá los datos de la tarea.</p>

            <div class="mt-6 max-w-lg rounded-lg bg-white p-6 shadow-sm">
                <form action="{{ route('tasks.update', $task) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="title" value="Título" />
                        <x-input id="title" class="mt-1 block w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus />
                        <x-input-error for="title" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label for="description" value="Descripción" />
                        <textarea id="description" name="description" rows="3"
                                  class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $task->description) }}</textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label for="manager_id" value="Manager" />
                        <select name="manager_id" id="manager_id" required
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Seleccionar manager</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}" @selected(old('manager_id', $task->manager_id) == $manager->id)>
                                    {{ $manager->name }} ({{ $manager->email }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="manager_id" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="completed" class="flex items-center">
                            <x-checkbox id="completed" name="completed" :checked="old('completed', $task->completed)" />
                            <span class="ms-2 text-sm text-gray-600">Tarea completada</span>
                        </label>
                        <x-input-error for="completed" class="mt-2" />
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-2">
                        <a href="{{ route('tasks.index') }}"
                           class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Cancelar
                        </a>
                        <x-button>
                            Actualizar
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
