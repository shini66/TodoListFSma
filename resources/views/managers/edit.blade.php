<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Manager
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <a href="{{ route('managers.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Volver a managers</a>
            <h2 class="mt-4 text-3xl font-bold tracking-tight">Editar Manager</h2>
            <p class="mt-1 text-gray-600">Actualizá los datos del manager.</p>

            <div class="mt-6 max-w-lg rounded-lg bg-white p-6 shadow-sm">
                <form action="{{ route('managers.update', $manager) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="name" value="Nombre" />
                        <x-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name', $manager->name)" required autofocus />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="Email" />
                        <x-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email', $manager->email)" required />
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-2">
                        <a href="{{ route('managers.index') }}"
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
