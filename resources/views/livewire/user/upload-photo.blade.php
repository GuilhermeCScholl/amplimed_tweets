<div>
    <h1> Upload foto de perfil</h1>
    <form action="" method="post" wire:submit.prevent="storage">
        <input type="file" wire:model="photo" >
        @error('photo')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <button class="submit" type="submit">Upload Foto</button>
    </form>
</div>