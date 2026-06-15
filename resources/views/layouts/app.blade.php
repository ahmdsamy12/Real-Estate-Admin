<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — RE Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="h-full flex overflow-hidden">

    {{-- Mobile sidebar overlay --}}
    <div id="sidebar-overlay"
         class="hidden fixed inset-0 z-20 bg-slate-900/40 backdrop-blur-sm lg:hidden">
    </div>

    {{-- Sidebar --}}
    @include('includes.sidebar')

    {{-- Main content area --}}
    <div class="flex flex-col flex-1 min-w-0 overflow-hidden">

        {{-- Top navbar --}}
        @include('includes.navbar')

        {{-- Page content --}}
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('includes.footer')

    </div>

</body>
</html>
