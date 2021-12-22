<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Delete extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.post.delete');
    }

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function delete()
    {
        if ($this->post->image) {
            $this->post->image->delete();
        }

        $this->post->delete();

        $this->emit('renderParent');
        $this->emit('PostDeleted');
    }
}
