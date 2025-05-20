<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use Livewire\WithPagination;
class ShowTweets extends Component
{
    use WithPagination;
    public $content = '';
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];
    public function render()
    {

        $tweets =  Tweet::with('user')->latest()->paginate(7);
        return view('livewire.show-tweets',['tweets' => $tweets])->layout('layouts.app');
    }

    public function create(){
        $this->validate();
        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        $this->content = '';

    }
    public function like($idTweet){
        $tweet = Tweet::find($idTweet);
        if ($tweet->userLiked) {
            $tweet->likes()->where('user_id', auth()->id())->delete();
            $tweet->decrement('count_likes');
        } else {
            $tweet->likes()->create([
                'user_id' => auth()->id()
            ]);
            $tweet->increment('count_likes');
        }
    }
}
