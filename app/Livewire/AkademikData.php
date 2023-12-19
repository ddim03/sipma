<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

// use Livewire\WithPagination;

class AkademikData extends Component
{

    public $search = '';
    use WithPagination;
    public function render()
    {
        return view('livewire.akademik-data', ['posts' => Post::Latest()
            ->where('judul', 'like', '%' . $this->search . '%')
            ->where('is_validated', 1)
            ->where('category_id', 1)->paginate(6)]);
    }
}
