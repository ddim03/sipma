<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardTable extends Component
{

    use WithPagination;
    public $search = '';

    public function render()
    {
        return view('livewire.dashboard-table', ['posts' => Post::where('judul', 'like', '%' . $this->search . '%')->paginate(6)]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
