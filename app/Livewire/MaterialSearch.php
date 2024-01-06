<?php

namespace App\Livewire;

use App\Models\Materials;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MaterialSearch extends Component
{
    public $page = 1;


    public $search = '';

    public $results = [];

    public function increment()
    {
        $this->page++;
    }

    public function decrement()
    {
        $this->page--;
    }

    public function download(string $path)
    {
        if (!Storage::disk('materials')->exists($path)) {
            return abort(404);
        }

        return Storage::disk('materials')->download($path);
    }

    public function render()
    {
        $this->results = Materials::orderBy('id', 'desc')->paginate(10, ['*'], 'page', $this->page)->items();

        return view('livewire.material-search');
    }
}
