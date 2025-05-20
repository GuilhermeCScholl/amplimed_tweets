<div class="mt-2">

    <form method="post" wire:submit.prevent="create"
        class="max-w-xl mx-auto p-4 bg-white rounded-lg shadow-md space-y-4">
        <h1 class="text-2xl font-bold text-gray-800">Criar Tweet</h1>
        <textarea name="content" id="content" wire:model="content" rows="2" placeholder="O que está acontecendo?"
            class="w-full resize-none rounded-md border border-gray-300 focus:border-purple-600 focus:ring-1 focus:ring-purple-600 px-4 py-3 text-gray-900 placeholder-gray-400 transition"></textarea>

        @error('content')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="flex justify-end">
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition">
                Criar Tweet
            </button>
        </div>
    </form>

    @foreach ($tweets as $tweet)
        <div class="flex space-x-4 max-w-xl mx-auto p-4 border-b border-gray-200 hover:bg-gray-50 transition">
            <!-- Foto e nome -->
            <div class="flex-shrink-0">
                <img src="{{ $tweet->user->getImageAttribute() }}" alt="Foto de perfil"
                    class="rounded-full h-12 w-12 object-cover" />
            </div>

            <div class="flex-1">
                <div class="flex items-center space-x-2">
                    <h3 class="font-semibold text-gray-900">{{ $tweet->user->name }}</h3>
                    <span class="text-sm text-gray-500">{{ $tweet->created_at->diffForHumans() }}</span>
                </div>

                <p class="mt-1 text-gray-800 whitespace-pre-wrap">{{ $tweet->content }}</p>

                <div class="mt-3 flex items-center space-x-4 text-sm text-gray-600">
                    <button wire:click="like({{ $tweet->id }})"
                        class="flex items-center space-x-1 text-purple-600 hover:text-purple-700 focus:outline-none">
                        @if($tweet->userLiked)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                            </svg>
                            <span>Descurtir</span>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                            </svg>
                            <span>Curtir</span>
                        @endif
                    </button>

                    <span>{{ $tweet->count_likes }} {{ Str::plural('like', $tweet->count_likes) }}</span>
                </div>
            </div>
        </div>


    @endforeach
    <hr>
    <div class="max-w-xl mx-auto px-5 py-5">
        {{ $tweets->links() }}
    </div>
</div>