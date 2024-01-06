<div class="w-full">
    <h1>{{ $page }}</h1>

    <button wire:click="increment">+</button>

    <button wire:click="decrement">-</button>

    <div>
        @foreach ($results as $result)
            @include('components.material-card', [
                'material' => $result,
            ])
        @endforeach
    </div>
</div>
