<?php

namespace App\Livewire;

use App\Models\Materials;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MaterialSearch extends Component
{
    public $results = [];

    public $name = '';
    public $teacher = '';
    public $subject = '';
    public $year = '';

    public function download(string $path)
    {
        $user = auth()->user();

        if (!$user || !$user->isTeacher) {
            abort(403, "Nemáte právo na sťahovanie materiálov.");
        }

        if (!Storage::disk('materials')->exists($path)) {
            abort(404, "Tento súbor bohužiaľ nebol plne nahratý na server.");
        }

        return Storage::disk('materials')->download($path);
    }

    public function render()
    {
        $user = auth()->user();

        if (!$user || !$user->isTeacher) {
            abort(403, "Nemáte právo na zobrazenie materiálov.");
        }

        $this->results = Materials::where('name', 'like', '%' . $this->name . '%')
            ->where('teacher', 'like', '%' . $this->teacher . '%')
            ->where('subject', 'like', '%' . $this->subject . '%')
            ->where('year', 'like', '%' . $this->year . '%')
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.material-search');
    }
}
