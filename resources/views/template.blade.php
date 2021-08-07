<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Time To Sweat</title>
    @livewireStyles
</head>
<body class="bg-gray-700">

<main class="p-2">
    @if (session()->has('success'))
        <x-alert>
            {{ session('success') }}
        </x-alert>
    @endif

    @yield('content')

    <div class="relative mt-3 mb-2">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-green-300"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="px-2 bg-green-500 text-sm">
              Menu
            </span>
        </div>
    </div>

    @include('menu')
</main>

@livewireScripts
</body>
</html>
