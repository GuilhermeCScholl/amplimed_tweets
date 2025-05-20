<div class="container flex flex-col justify-center items-center mx-auto mt-8 max-w-md p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-purple-700 mb-6">Upload de foto de perfil</h1>

    <form action="" method="post" wire:submit.prevent="storage" class="w-full">
        @csrf

        @if ($photo)
            <div class="flex justify-center mb-4">
                <img src="{{ $photo->temporaryUrl() }}" alt="Foto de perfil" class="w-32 h-32 object-cover rounded-full shadow-md" />
            </div>
        @endif

        <label
            for="photo"
            class="flex items-center justify-center gap-2 px-4 py-2 bg-purple-600 text-white rounded-lg shadow cursor-pointer hover:bg-purple-800 transition focus:outline-none focus:ring-2 focus:ring-purple-400"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0L8 12m4-4v12" />
            </svg>
            <span>Selecionar arquivo</span>
            <input type="file" id="photo" class="hidden" wire:model="photo" />
        </label>

        @error('photo')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="mt-6 flex justify-center">
            <button
                type="submit"
                class="bg-purple-600 hover:bg-purple-800 text-white font-semibold px-6 py-2 rounded-md shadow transition focus:outline-none focus:ring-2 focus:ring-purple-400"
            >
                Upload Foto
            </button>
        </div>
    </form>
</div>
