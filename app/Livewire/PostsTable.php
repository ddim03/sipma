<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsTable extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        $posts = Post::where('admin_id', auth()->user()->id)->where('judul', 'like', '%' . $this->search . '%')->paginate(6);
        return view('livewire.posts-table', ['posts' => $posts]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
