<?php

namespace App\Http\Livewire\Post;

use App\Models\Image;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $image;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->body = $post->body;
    }

    public function render()
    {
        return view('livewire.post.update');
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

    public function update()
    {
        $data = $this->validate();

        if ($this->image != null) {
            if (isset($this->post->image)) {
                $this->post->image->delete();
            }
            $image = $this->image->store('images');

            $this->post->image()->create([
                'image' => $image,
                'user_id' => auth()->user()->id
            ]);

            $data['image'] = $image;
        }

        $this->post->update($data);

        $this->title = '';
        $this->body = '';
        $this->image = '';

        $this->emit('renderParent');
        $this->emit('PostUpdated');
    }
}
