<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{
    use WithFileUploads;
    public $photo;
    public function render()
    {
        return view('livewire.user.upload-photo')->layout('layouts.app');
    }
    public function storage(){
        $this->validate(['photo' => 'image|max:1024|required']);
        $user = auth()->user();
        $nameFile = Str::slug(auth()->user()->name) . '-' . time() . '.' . $this->photo->extension();
        $path = $this->photo->storeAs('users', $nameFile);
        if($path){
            $user->update([
                'profile_photo_path' => $path
            ]);
        }
        return redirect()->route('tweets.index');
    }
}
