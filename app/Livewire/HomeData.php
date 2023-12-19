<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class HomeData extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.home-data', ['posts' => Post::Latest()->where('judul', 'like', '%' . $this->search . '%')->where('is_validated', 1)->paginate(4)]);
    }
}
