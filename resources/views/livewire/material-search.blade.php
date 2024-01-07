<div class="w-full">
    <div class="mt-10">
        <label for="name" class="block text-sm font-medium text-gray-700">Meno materiálu</label>
        <div class="mt-1">
            <input wire:model.live="name" id="name" type="text" name="name"
                class="shadow-sm focus:ring-smnd-blue focus:border-smnd-blue block w-full sm:text-sm border-gray-300 rounded-md"
                placeholder="Západná Európa">
        </div>
    </div>
    <div class="mt-5 grid grid-cols-3 gap-x-5 w-full">
        <div>
            <label for="teacher" class="block text-sm font-medium text-gray-700">Meno učiteľa</label>
            <select wire:model.live="teacher" id="teacher" name="teacher"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-smnd-blue focus:border-smnd-blue sm:text-sm rounded-md">
                <option value="">Všetci</option>
                @foreach (\App\Enums\Teacher::cases() as $teacher)
                    <option value="{{ $teacher }}">{{ $teacher }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="subject" class="block text-sm font-medium text-gray-700">Predmet</label>
            <select wire:model.live="subject" id="subject" name="subject"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-smnd-blue focus:border-smnd-blue sm:text-sm rounded-md">
                <option value="">Všetky</option>
                @foreach (\App\Enums\Subject::cases() as $subject)
                    <option value="{{ $subject }}">{{ $subject }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Trieda</label>
            <select wire:model.live="year" id="year" name="year"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-smnd-blue focus:border-smnd-blue sm:text-sm rounded-md">
                <option value="">Všetky</option>
                @foreach (\App\Enums\Year::cases() as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div>
        @foreach ($results as $result)
            @include('components.material-card', [
                'material' => $result,
            ])
        @endforeach
    </div>
</div>
