<!doctype html>
<html>

<head>
    @include('partials.head')

    @yield('head')

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    @livewireStyles
    @livewireScriptConfig
</head>
@yield('body')

</html>
