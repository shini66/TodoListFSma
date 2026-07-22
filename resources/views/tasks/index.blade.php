@extends('layouts.app')

@section('title', 'Mis Tareas')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-bold tracking-tight">Mis Tareas</h2>
        <p class="mt-1 text-gray-600">
            Administrá tus tareas pendientes y completadas.
        </p>
    </div>

    <div class="space-y-4">
        <x-card :completed='false' title="Primera tarea 1" description="Descripción 1"/>
        <x-card :completed='true' title="Primera tarea 2" description="Descripción 2"/>
        <x-card :completed='false' title="Primera tarea 2" description="Descripción 2"/>
        <x-card :completed='false' title="Primera tarea 2" description="Descripción 2"/>
        <x-card :completed='false' title="Primera tarea 2" description="Descripción 2"/>
    </div>

    <x-alert type='danger' title='Error'>
        Hubo un error en el procesado
    </x-alert>
    <x-button type='success'>Cerrar</x-button>
@endsection
