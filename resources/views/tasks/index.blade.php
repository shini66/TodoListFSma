@extends('layouts.app')

@section('title', 'Mis Tareas')

@section('content')
    <h2>Bienvenido a tu lista de Tareas</h2>
    <p>Acá vas a ver tus tareas</p>

    <x-alert type='danger' title='Error'>
        Hubo un error en el procesado
    </x-alert>

@endsection
