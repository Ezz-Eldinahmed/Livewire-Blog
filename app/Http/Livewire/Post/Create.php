<?php

namespace App\Http\Livewire\Post;

use App\Models\Image;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $image;

    public function render()
    {
        return view('livewire.post.create');
    }

    protected $rules = [
        'title' => 'required|max:120',
        'body' => 'required|max:300',
        'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000' // max 10000kb
    ];

    public function updated($data)
    {
        $this->validateOnly($data);
    }

    public function create()
    {
        $data = $this->validate();

        $post = Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => auth()->user()->id
        ]);

        if ($this->image != null) {
            $image = $this->image->store('images');

            $post->image()->create([
                'image' => $image,
                'user_id' => auth()->user()->id
            ]);
        }

        $this->title = '';
        $this->body = '';
        $this->image = '';

        $this->emit('renderParent');
        $this->emit('PostCreated');
    }
}
