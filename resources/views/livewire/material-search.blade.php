<div class="mt-10 w-full">
    {{-- Page title --}}
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Meno materiálu</label>
        <div class="mt-1">
            <input wire:model.live="name" id="name" type="text" name="name"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-smnd-blue focus:ring-smnd-blue sm:text-sm"
                placeholder="Západná Európa">
        </div>
    </div>

    {{-- Filters --}}
    <div class="mt-5 flex w-full grid-cols-3 flex-col gap-x-5 gap-y-5 md:grid">
        <div>
            <label for="teacher" class="block text-sm font-medium text-gray-700">Meno učiteľa</label>
            <select wire:model.live="teacher" id="teacher" name="teacher"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-smnd-blue focus:outline-none focus:ring-smnd-blue sm:text-sm">
                <option value="">Všetci</option>
                @foreach (\App\Enums\Teacher::cases() as $teacher)
                    <option value="{{ $teacher }}">{{ $teacher }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="subject" class="block text-sm font-medium text-gray-700">Predmet</label>
            <select wire:model.live="subject" id="subject" name="subject"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-smnd-blue focus:outline-none focus:ring-smnd-blue sm:text-sm">
                <option value="">Všetky</option>
                @foreach (\App\Enums\Subject::cases() as $subject)
                    <option value="{{ $subject }}">{{ $subject }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Trieda</label>
            <select wire:model.live="year" id="year" name="year"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-smnd-blue focus:outline-none focus:ring-smnd-blue sm:text-sm">
                <option value="">Všetky</option>
                @foreach (\App\Enums\Year::cases() as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Results --}}
    <div class="flex flex-col">
        @foreach ($results as $result)
            @include('components.material-card', [
                'material' => $result,
            ])
        @endforeach
    </div>
</div>
