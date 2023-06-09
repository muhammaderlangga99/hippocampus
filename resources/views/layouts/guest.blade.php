<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hippcampus Indonesia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-montserrat text-gray-900 antialiased">
    <div class="grid md:grid-rows-2 lg:grid-rows-none lg:grid-cols-5 h-screen">
        <div
            class="col-span-5 lg:col-span-2 relative flex items-center justify-center md:row-start-2 lg:row-start-auto">


            <div class="login w-10/12 md:w-7/12 m-auto flex flex-col justify-center space-y-5 h-full">
                <div class="title">
                    @if (Route::is('login'))
                        <h2 class="text-xl font-semibold text-slate-900 text-center">Welcome back!</h2>
                    @else
                        <h2 class="text-xl font-semibold text-slate-900 text-center">Create an account</h2>
                    @endif
                    <p class="text-xs text-slate-500 text-center my-1">login to manage content here</p>
                </div>

                {{ $slot }}
            </div>

        </div>


        <div class="col-span-3 hidden relative md:flex bg-blue-50 row-start-1 w-screen lg:w-auto">
            <a href="/" class="absolute flex justify-center items-center top-5 left-3 lg:flex">
                <x-application-logo class="fill-current text-gray-800" />
                <h3 class="text-sm font-semibold text-blue-600 ml-2 inline">Admin only</h3>
            </a>
            @if (Route::is('register'))
                <img src="{{ asset('img/login.svg') }}" alt="" class="w-full m-auto">
            @elseif(Route::is('login'))
                <img src="{{ asset('img/registration.svg') }}" alt="" class="w-full m-auto">
            @endif
        </div>
    </div>

    </div>
</body>

</html>
