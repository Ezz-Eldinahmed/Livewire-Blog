<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfilePicture extends Component
{
    use WithFileUploads;

    public $user;
    public $image;
    public $email;
    public $name;

    protected $rules = [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000' // max 10000kb
    ];

    public function updated($data)
    {
        $this->validateOnly($data);
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->image = $user->image;
    }

    public function render()
    {
        return view('livewire.user-profile-picture');
    }

    public function update()
    {
        $data = $this->validate();

        if ($this->image != null) {
            if (isset($this->user->image)) {
                $this->user->image->delete();
            }
            $image = $this->image->store('images');

            $this->user->profileImage()->create([
                'image' => $image,
                'user_id' => auth()->user()->id
            ]);
        }

        $this->user->update($data);

        $this->name = '';
        $this->email = '';
        $this->image = '';
    }
}
