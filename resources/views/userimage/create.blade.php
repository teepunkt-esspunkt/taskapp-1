<x-layout title="Avatar Upload">

    <h2>Bildupload für den Benutzer {{$user->name}}</h2>
    <form method="POST" action="{{ route('userimage.store', $user) }}" enctype="multipart/form-data">
        @csrf
        <label for="alt">Alternativ-Text:</label><br>
        <input type="text" name="alt" id="alt" value="{{ old('alt') }}"><br>
        @error('alt')
            <div class="text-error">{{ $message }}</div>
        @enderror
        <label for="image">Bildauswahl:</label><br>
        <input type="file" name="image" id="image">
        @error('image')
            <div class="text-error">{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Speichern</button><br>
        <br>
        <a href="{{ route('users.index') }}">Abbrechen</a>
    </form> 
</x-layout>