@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Edit a Post</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="text-xl">Title</label>
                <input type="text" class="form-input" id="title" name="title" required autofocus
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="text-xl">Slug</label>
                <input type="text" class="form-input" id="slug" name="slug" required
                    value="{{ old('slug', $post->slug) }}">
                @error('slug')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="text-xl">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="text-xl">Post Image</label>
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview my-3 w-64 rounded-lg block">
                @else
                    <img class="img-preview my-3 w-64 rounded-lg">
                @endif
                <input class="file-input file-input-bordered file-input-secondary w-full" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="text-xl">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor class="trix-content" input="body"></trix-editor>
            </div>
            <div class="mb-3 flex">
                <input type="checkbox" class="checkbox checkbox-info" id="published" name="published"
                    {{ $post->published ? 'checked' : '' }} value="">
                <label for="published" class="text-xl mx-2">Publish</label>
                @error('published')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Update Post
                <span class="material-symbols-rounded">
                    edit_note
                </span>
            </button>
        </form>
    </section>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
