@extends('layouts.app')

@section('head')
    <title>SMND | Obnova materiálov</title>
    <meta name="description"
        content="V dôsledku vyhorenia zborovne sa stratila vysoká kvantita edukačných materiálov. Ak by ste si našli chvíľku, aby ste nám pomohli s obnovou, boli by sme veľmi vďační.">
@stop

@section('content')
    <h1 class="text-3xl font-bold underline">
        Home
    </h1>
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth
@stop
