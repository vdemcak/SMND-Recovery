@extends('layouts.app')

@section('head')
    <title>SMND | Obnova materiálov</title>
    <meta name="description"
        content="V dôsledku vyhorenia zborovne sa stratila vysoká kvantita edukačných materiálov. Ak by ste si našli chvíľku, aby ste nám pomohli s obnovou, boli by sme veľmi vďační.">
@stop

@section('content')
    <div class="flex flex-col max-w-3xl mx-auto w-full items-center">
        <h1 class="text-4xl font-bold">Obnova edukačných materiálov</h1>
        <p class="mt-2 text-center leading-6 text-gray-600 w-4/5">
            V dôsledku vyhorenia zborovne sa stratila vysoká kvantita edukačných materiálov. Ak by ste si našli chvíľku,
            aby ste nám pomohli s obnovou, boli by sme veľmi vďační.
        </p>

        <form class="w-full" method="POST" action="{{ route('home.submit') }}">
            @csrf

            <div class="w-full border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-y-4 md:grid-cols-6 md:gap-x-6 md:gap-y-8 ">
                    {{-- Material name --}}
                    <div class="col-span-full">
                        <label for="name" class="block text-sm font-medium text-gray-700">Meno materiálu</label>
                        <div class="mt-1">
                            <input id="name" type="text" name="name"
                                class="shadow-sm focus:ring-smnd-blue focus:border-smnd-blue block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="Západná Európa">
                        </div>
                    </div>

                    {{-- Teacher --}}
                    <div class="col-span-2">
                        <label for="teacher" class="block text-sm font-medium text-gray-700">Meno učiteľa</label>
                        <select id="teacher" name="teacher"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-smnd-blue focus:border-smnd-blue sm:text-sm rounded-md">
                            @foreach (\App\Enums\Teacher::cases() as $teacher)
                                @if ($teacher === \App\Enums\Teacher::OTHER)
                                    <option value="{{ $teacher }}">Iné (zadajte do mena materiálu)</option>
                                @else
                                    <option value="{{ $teacher }}">{{ $teacher }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Year --}}
                    <div class="col-span-2">
                        <label for="year" class="block text-sm font-medium text-gray-700">Trieda</label>
                        <select id="year" name="year"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-smnd-blue focus:border-smnd-blue sm:text-sm rounded-md">
                            @foreach (\App\Enums\Year::cases() as $year)
                                @if ($year === \App\Enums\Year::OTHER)
                                    <option value="{{ $year }}">Iné (zadajte do mena materiálu)</option>
                                @else
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Subject --}}
                    <div class="col-span-2">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Predmet</label>
                        <select id="subject" name="subject"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-smnd-blue focus:border-smnd-blue sm:text-sm rounded-md">
                            @foreach (\App\Enums\Subject::cases() as $subject)
                                @if ($subject === \App\Enums\Subject::OTHER)
                                    <option value="{{ $subject }}">Iné (zadajte do mena materiálu)</option>
                                @else
                                    <option value="{{ $subject }}">{{ $subject }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- File Input --}}
                    <div
                        class="col-span-full mt-2 flex flex-col items-center rounded-lg border border-dashed py-14 border-gray-900/50">
                        <div class="mx-auto flex flex-col items-center text-sm leading-6 text-gray-600">
                            <label for="files"
                                class="cursor-pointer font-semibold text-indigo-600 hover:text-indigo-500">
                                <span>Vyberte súbory</span>
                                <input class="hidden" id="files" type="file" multiple />
                            </label>
                            <span>alebo ich sem presuňte</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 flex flex-col-reverse md:flex-row gap-y-3 items-center justify-between">
                <p class="text-xs text-gray-600">
                    Made with ❤️ by
                    <a class="font-bold text-indigo-600" href="https://www.linkedin.com/in/vdemcak/">
                        Viktor Demčák
                    </a>
                    -
                    <a class="font-bold" href="https://github.com/vdemcak/smnd-recovery">
                        Contribute
                    </a>
                </p>
                <div class="gap-x-5">
                    <span class="text-xs text-red-600 font-bold">
                        Odovzdávanie materiálov je dočasne pozastavené.
                    </span>
                    {{-- <button disabled type="submit" --}}
                    {{--    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 disabled:opacity-40"> --}}
                    {{--    Odoslať --}}
                    {{-- </button> --}}
                </div>
            </div>
        </form>

    </div>
@stop
