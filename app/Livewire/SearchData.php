<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchData extends Component
{

    public $keyword;

    public function mount()
    {
        $getKeyword = explode('/', url()->current());
        $this->keyword = end($getKeyword);
    }

    public function render()
    {
        return view('livewire.search-data', ['posts' => Post::latest()->where('judul', 'like', '%' . $this->keyword . '%')->paginate(6)]);
    }
}
