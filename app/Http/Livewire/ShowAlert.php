<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAlert extends Component
{
    protected $listeners = [
        'PostCreated', 'PostDeleted', 'PostUpdated'
    ];

    public function render()
    {
        return view('livewire.show-alert');
    }

    public function PostCreated()
    {
        session()->flash('message', 'Post Created Successfully');
    }

    public function PostDeleted()
    {
        session()->flash('message', 'Post Deleted Successfully');
    }

    public function PostUpdated()
    {
        session()->flash('message', 'Post Update Successfully');
    }
}
