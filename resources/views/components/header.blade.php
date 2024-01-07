<header class="py-2 flex items-center px-5 border-b-2 border-b-gray-200 justify-between">
    <a href="{{ route('home') }}" class="flex items-center gap-x-2">
        <img class="h-10" src="/images/smnd-logo.svg" alt="SMND Logo">
        <span class="text-xl font-bold">Portál obnovy materiálov</span>
    </a>
    @auth
        <div class="flex gap-x-5">
            <div class="flex items-center gap-x-2">
                <img src="{{ auth()->user()->photo }}" alt="photo" class="w-10 h-10 rounded-full border border-gray-400">
                <div class="flex flex-col gap-y-0.5">
                    <span class="leading-none font-semibold text-smnd-blue">{{ auth()->user()->name }}</span>
                    <span class="text-gray-500 leading-none text-sm">{{ auth()->user()->email }}</span>
                </div>
            </div>

            @if (auth()->user()->isTeacher)
                <a href="{{ route('portal') }}"
                    class="border-smnd-blue text-smnd-blue text-sm border-2 px-4 py-2 font-bold rounded-full">
                    Prejsť do portálu
                </a>
            @endif
        </div>
    @endauth

    @guest
        <a href="{{ route('login') }}"
            class="border-smnd-blue text-smnd-blue text-sm border-2 px-4 py-2 font-bold rounded-full">
            Prihlásiť sa do portálu
        </a>
    @endguest
</header>
