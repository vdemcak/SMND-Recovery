<div class="relative" x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-data="{
        open: false,
        toggle() {
            if (this.open) {
                return this.close()
            }

            this.$refs.button.focus()

            this.open = true
        },
        close(focusAfter) {
            if (!this.open) return

            this.open = false

            focusAfter && focusAfter.focus()
        }
    }">
    <img class="h-10 w-10 cursor-pointer rounded-full" src="{{ auth()->user()->photo }}" alt="User dropdown" x-ref="button"
        x-on:click="toggle()" type="button">

    <!-- Dropdown menu -->
    <div class="absolute right-0 top-14 z-10 divide-y divide-gray-100 rounded-lg bg-white shadow" x-ref="panel"
        x-show="open" x-transition.origin.top.right x-on:click.outside="close($refs.button)"
        :id="$id('dropdown-button')">
        <div class="px-4 py-3 text-sm text-gray-900">
            <p>{{ auth()->user()->name }}</p>
            <p class="truncate font-medium">{{ auth()->user()->email }}</p>
        </div>
        <ul class="py-2 text-sm text-gray-700">
            <li>
                <a href="{{ route('home') }}" class="block px-4 py-2 hover:bg-gray-100">Domov</a>
            </li>
            <li>
                <a href="{{ route('portal') }}" class="block px-4 py-2 hover:bg-gray-100">Portál</a>
            </li>
        </ul>
        <div class="py-1">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100" type="submit">
                    Odhlásiť sa
                </button>
            </form>
        </div>
    </div>
</div>
