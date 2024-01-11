<header class="sticky top-0 z-10 flex items-center justify-between border-b border-gray-200 bg-white px-5 py-2">
    <a href="{{ route('home') }}" class="flex items-center gap-x-2">
        <img class="h-10" src="/images/smnd-logo.svg" alt="SMND Logo">
        <span class="hidden font-bold sm:block md:text-xl">Portál obnovy materiálov</span>
    </a>
    @auth
        <div class="flex gap-x-5">
            @if (auth()->user()->is_teacher && !request()->routeIs('portal'))
                <a href="{{ route('portal') }}"
                    class="rounded-full border-2 border-smnd-blue px-4 py-2 text-sm font-bold text-smnd-blue">
                    Prejsť do portálu
                </a>
            @endif

            @if (request()->routeIs('portal'))
                <a href="{{ route('home') }}"
                    class="rounded-full border-2 border-smnd-blue px-4 py-2 text-sm font-bold text-smnd-blue">
                    Prejsť na hlavnú stránku
                </a>
            @endif

            @include('components.user-profile')
        </div>
    @endauth

    @guest
        <a href="{{ route('login') }}"
            class="rounded-full border-2 border-smnd-blue px-4 py-2 text-sm font-bold text-smnd-blue">
            Prihlásiť sa do portálu
        </a>
    @endguest
</header>
