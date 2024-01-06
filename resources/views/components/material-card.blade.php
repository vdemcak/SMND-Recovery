<div class="mt-6 grid grid-cols-[1fr_min-content] rounded-lg border border-gray-900/10 p-3 w-full">
    <div class="flex flex-col">
        <span class="text-lg font-bold">{{ $material->name }}</span>
        <span class="text-sm opacity-70">{{ $material->teacher }}</span>
        <span class="text-sm opacity-70">Odovzdané
            {{ $material->created_at }}</span>
    </div>

    <div class="flex flex-col items-end">
        <div class="flex gap-x-3">
            <span class="rounded bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800">
                {{ $material->subject }}
            </span>
            <span class="rounded bg-blue-100 px-2.5 py-0.5 text-sm font-medium capitalize text-blue-800">
                {{ $material->year }}
            </span>
        </div>
    </div>

    <div class="col-span-2 mt-5 flex flex-col">
        <span class="text-sm opacity-70">Súbory (Klikni na súbor pre stiahnutie)</span>

        <div class="mt-2 flex w-full flex-wrap gap-2">
            @foreach (explode(',', $material->files) as $file)
                <span wire:click="download('{{ $file }}')" title="{{ last(explode('/', $file)) }}"
                    class="cursor-pointer overflow-hidden text-ellipsis rounded px-2.5 py-0.5 text-xs font-medium bg-gray-100 text-gray-800">
                    {{ last(explode('/', $file)) }}
                </span>
            @endforeach

        </div>
    </div>
</div>
