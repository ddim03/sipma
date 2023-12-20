<?php

namespace App\Livewire;

use App\Models\Arsip;
use Livewire\Component;
use Livewire\WithPagination;

class ArsipsTable extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        return view('livewire.arsips-table', ['arsips' => Arsip::where('nama', 'like', '%' . $this->search . '%')->paginate(6)]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
