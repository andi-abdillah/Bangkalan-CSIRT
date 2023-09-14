@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Edit Profile</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/profils/{{ $profil->slug }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="text-xl">Name</label>
                <input type="text" class="form-input" id="name" name="name" required autofocus
                    value="{{ old('name', $profil->name) }}">
                @error('name')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="link" class="text-xl">Link Sistem Ticketing</label>
                <textarea class="form-textarea" id="link" name="link" required rows="2">{{ old('link', $profil->link) }}</textarea>
                @error('link')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="whatsapp_link" class="text-xl">Whatsapp Link</label>
                <textarea class="form-textarea" id="whatsapp_link" name="whatsapp_link" required rows="2"
                    value="{{ old('whatsapp_link', $profil->whatsapp_link) }}">{{ old('whatsapp_link', $profil->whatsapp_link) }}</textarea>
                @error('whatsapp_link')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="text-xl">Content</label>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="content" type="hidden" name="content" value="{{ old('content', $profil->content) }}">
                <trix-editor class="trix-content" input="content"></trix-editor>
            </div>
            <button type="submit" class="btn btn-add">
                Edit Profile
                <span class="material-symbols-rounded">
                    edit_note
                </span>
            </button>
        </form>
    </section>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
