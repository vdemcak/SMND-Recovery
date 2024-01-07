<!doctype html>
<html>

<head>
    @include('partials.head')

    @yield('head')

    @vite('resources/css/app.css')

    @livewireScripts
</head>
@yield('body')

</html>
