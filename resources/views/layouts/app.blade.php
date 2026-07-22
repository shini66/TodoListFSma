<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'To-Do List')</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-900 antialiased dark:bg-gray-950 dark:text-gray-100">

    <header class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur-sm dark:border-gray-800 dark:bg-gray-900/80">
        <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
            <a href="/" class="text-lg font-semibold tracking-tight hover:text-gray-600 dark:hover:text-gray-300">
                To-Do List
            </a>
            @include('partial.nav')
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
        <div class="mx-auto w-full max-w-7xl px-4 py-6 text-center text-sm text-gray-500 sm:px-6 lg:px-8">
            &copy; {{ date('Y') }} - To-Do List. Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>
