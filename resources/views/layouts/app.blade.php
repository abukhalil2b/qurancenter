<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>الملتقيات القرآنية</title>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div class="min-h-screen bg-gray-100">

        <header class="p-3 bg-gray-700">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  flex justify-between items-center">
                <a href="/dashboard" class="text-white font-bold">
                    الملتقيات القرآنية
                </a>
                @include('layouts.dropdown')
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>