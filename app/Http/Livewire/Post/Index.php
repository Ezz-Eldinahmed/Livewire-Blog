<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $perPage = 5;

    protected $listeners = [
        'load-more' => 'loadMore',
        'renderParent',
    ];

    public function render()
    {
        return view(
            'livewire.post.index',
            [
                'posts' => Post::orderBy('updated_at', 'desc')->paginate($this->perPage)
            ]
        );
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function renderParent()
    {
        $this->mount();
        $this->render();
    }
}
