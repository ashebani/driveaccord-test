<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAvatarPhoto extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')] // 1MB Max
    public $photo;
    
    public function render()
    {
        return view('livewire.update-avatar-photo');
    }

    public function save()
    {
        //        dd();
        $this->photo->store(path: 'avatars');
        auth()->user()->update(['image' => $this->photo->hashname()]);

        return $this->redirect('/profile');
    }
}
