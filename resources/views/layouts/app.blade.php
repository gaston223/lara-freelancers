<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
       <script src="https://kit.fontawesome.com/3a35c19d1d.js" crossorigin="anonymous"></script>

       {{-- CDN Alpine js --}}
       {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <title>Lara-freelancers</title>
    @livewireStyles
</head>

<body>
    <div class="container mx-auto px-4">
        @include('partials.navbar')
        @yield('content')

    </div>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
