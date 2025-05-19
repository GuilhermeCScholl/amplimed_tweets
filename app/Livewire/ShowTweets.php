<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweet;
class ShowTweets extends Component
{

    public $message = 'Teste';
    public function render()
    {

        $tweets =  Tweet::with('user')->get();
        return view('livewire.show-tweets',['tweets' => $tweets]);
    }
}
