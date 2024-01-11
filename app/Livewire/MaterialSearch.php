<?php

namespace App\Livewire;

use App\Models\Materials;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class MaterialSearch extends Component
{
    use WireToast;

    public $results = [];

    public $name = '';
    public $teacher = '';
    public $subject = '';
    public $year = '';

    public function download(string $path)
    {
        $user = auth()->user();

        if (!$user || !$user->is_teacher) {
            toast()->danger('Nemáte právo na sťahovanie materiálov.')->push();
            return;
        }

        if (!Storage::disk('materials')->exists($path)) {
            toast()->danger('Tento súbor bohužiaľ nebol plne nahratý na server. Tento incident bol nahlásený administrátorovi.')->push();
            return;
        }

        return Storage::disk('materials')->download($path);
    }

    public function render()
    {
        $user = auth()->user();

        if (!$user || !$user->is_teacher) {
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
