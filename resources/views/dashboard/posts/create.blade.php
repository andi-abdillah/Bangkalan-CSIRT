@extends('dashboard.layouts.main')

@section('container')
<div class="">
  <h1 class="h2">Create a New Post</h1>
</div>

<div class="p-4">
  <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="text-xl font-bold">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title') }}" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary" autofocus required />
      <!-- <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}"> -->
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="slug" class="text-xl font-bold">Slug</label>
      <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary" required />
      <!-- <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}"> -->
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="category" class="text-xl font-bold">Category</label>
      <select name="category_id" class="select bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary font-bold">
        @foreach ($categories as $category)
        @if (old('category_id') == $category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="text-xl font-bold">Post Image</label>
      <img class="img-preview w-56 rounded-lg my-3">
      <input type="file" class="file-input file-input-bordered file-input-secondary w-full max-w-xs" id="image" name="image" onchange="previewImage()" required />
      <!-- <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" required> -->
      @error('image')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="body" class="text-xl font-bold">Body</label>
      @error('body')
      <p class="text-warning">{{ $message }}</p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor class="trix-content" input="body"></trix-editor>
    </div>

    @can('admin')
    <div class="mb-3">
      <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" value="">
      <label for="flexCheckDefault" class="form-check-label">Publish</label>
      @error('published')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    @endcan
    <button type="submit" class="btn btn-secondary">Create Post</button>
  </form>
</div>

<script nonce="{{ csp_nonce() }}">
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