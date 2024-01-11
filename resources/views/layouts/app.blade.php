@extends('layouts.base')

@section('body')

    <body class="flex min-h-screen w-full flex-col">
        <livewire:toasts />

        @include('components.header')
        <main class="p-4 pt-12 md:p-8">
            @yield('content')
        </main>
    </body>
@stop
