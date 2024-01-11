@extends('layouts.app')

@section('head')
    <title>Portál | Obnova materiálov</title>
    <meta name="description"
        content="V dôsledku vyhorenia zborovne sa stratila vysoká kvantita edukačných materiálov. Ak by ste si našli chvíľku, aby ste nám pomohli s obnovou, boli by sme veľmi vďační.">
@stop

@section('content')
    <div class="mx-auto flex w-full max-w-3xl flex-col items-center">
        <h1 class="w-full text-center text-4xl font-bold">Odovzdané materiály</h1>
        <p class="mt-2 w-full text-center leading-6 text-gray-600 md:w-4/5">
            Momentálne sa v databáze nachádza <span class="font-bold">{{ $material_count }}</span>
            materiálov a cez <span class="font-bold">{{ $file_count }}</span> súborov. Nižšie nájdete všetky materiály
            a súbory, ktoré boli k ním priložené.
        </p>

        <livewire:material-search />
    </div>
@stop
