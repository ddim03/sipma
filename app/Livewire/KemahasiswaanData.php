<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class KemahasiswaanData extends Component
{
    public $search = '';
    use WithPagination;
    public function render()
    {
        return view('livewire.kemahasiswaan-data', ['posts' => Post::Latest()
            ->where('judul', 'like', '%' . $this->search . '%')
            ->where('is_validated', 1)
            ->where('category_id', 2)->paginate(6)]);
    }
}
