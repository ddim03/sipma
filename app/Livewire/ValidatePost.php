<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ValidatePost extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        $posts = Post::where('judul', 'like', '%' . $this->search . '%')->paginate(6);
        return view('livewire.validate-post', ['posts' => $posts]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
