@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Edit a Regulation Category</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/regulation-categories/{{ $regulationCategory->slug }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="text-xl">Regulation Category</label>
                <input type="text" class="form-input" id="name" name="name" required autofocus
                    value="{{ old('name', $regulationCategory->name) }}">
                @error('name')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="text-xl">Slug</label>
                <input type="text" class="form-input" id="slug" name="slug" required
                    value="{{ old('slug', $regulationCategory->slug) }}" readonly>
                @error('slug')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Update Regulation Category
                <span class="material-symbols-rounded">
                    edit_note
                </span>
            </button>
        </form>
    </section>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/regulation-categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
