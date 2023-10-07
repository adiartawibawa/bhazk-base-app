<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangePhotoUser extends Component
{
    use WithFileUploads;

    public $user;

    public $photo;
    public $preview;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.user.change-photo-user');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    public function  updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048', // Gambar dengan ukuran maksimum 2MB
        ]);

        $this->preview = $this->photo->temporaryUrl();
    }

    public function storePhoto()
    {
        $name = md5($this->photo . microtime()) . '.' . $this->photo->extension();

        $this->photo->storeAs('public/avatars', $name);

        $this->user->update(['avatar' => $name]);

        $this->clearPhoto();
    }

    public function cancelPhoto()
    {
        $this->clearPhoto();
    }

    public function clearPhoto()
    {
        $this->photo = null;
        $this->preview = null;
    }
}
