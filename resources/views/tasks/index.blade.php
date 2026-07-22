@extends('layouts.app')

@section('title', 'Mis Tareas')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-bold tracking-tight">Mis Tareas</h2>
        <p class="mt-1 text-gray-600 dark:text-gray-400">
            Administrá tus tareas pendientes y completadas.
        </p>
    </div>

    <div class="space-y-4">
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <div class="flex items-start justify-between gap-4">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold">Tarea de ejemplo</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Descripción de la tarea pendiente.
                    </p>
                </div>
                <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                    Pendiente
                </span>
            </div>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-3 flex-1">
                    <svg class="mt-1 h-5 w-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold line-through text-gray-400 dark:text-gray-500">Tarea completada</h3>
                        <p class="mt-1 text-sm text-gray-400 dark:text-gray-500">
                            Esta tarea ya fue finalizada.
                        </p>
                    </div>
                </div>
                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
                    Completada
                </span>
            </div>
        </div>
    </div>

    <x-alert type='danger' title='Error'>
        Hubo un error en el procesado
    </x-alert>
    <x-button type='success'>Cerrar</x-button>
@endsection
