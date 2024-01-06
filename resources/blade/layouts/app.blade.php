@extends('layouts.base')

@section('body')

    <body class="flex flex-col w-full min-h-screen">
        @include('partials.header')
        <main class="p-8">
            @yield('content')
        </main>
    </body>
@stop
