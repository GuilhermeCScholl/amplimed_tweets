<div>
    Tweets
    <form method="post" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        @error('content')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>
    @foreach ($tweets as $tweet)
        <div class="flex">
            <div class="w-2/8">
                <img src="{{ $tweet->user->getImageAttribute() }}" alt="Foto de perfil" class="rounded-full h-8 w-8" />
                {{ $tweet->user->name }}
            </div>
            <div class="w-6/8">
                {{ $tweet->content }}
                @if($tweet->userLiked)
                    <button wire:click="like({{ $tweet->id }})">Descurtir</button>
                @else
                    <button wire:click="like({{ $tweet->id }})">Curtir</button>
                @endif
                {{ $tweet->count_likes }} likes
            </div>
        </div>

    @endforeach
    <hr>
    <div>
        {{ $tweets->links() }}
    </div>
</div>