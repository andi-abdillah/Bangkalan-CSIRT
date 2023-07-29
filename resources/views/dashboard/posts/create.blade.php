@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Create a New Post</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="text-xl">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-input @error('title') is-invalid @enderror" autofocus required />
      @error('title')
      <p class="text-red-500 font-light">
        {{ $message }}
      </p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="text-xl">Slug</label>
      <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="form-input @error('slug') is-invalid @enderror" required />
      @error('slug')
      <p class="text-red-500 font-light">
        {{ $message }}
      </p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="text-xl">Category</label>
      <select name="category_id" class="form-select">
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
      <label for="image" class="text-xl">Post Image</label>
      <img class="img-preview my-3 w-64 rounded-lg">
      <input type="file" class="file-input file-input-bordered file-input-secondary w-full @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()" required />
      @error('image')
      <p class="text-red-500 font-light">
        {{ $message }}
      </p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="body" class="text-xl">Body</label>
      @error('body')
      <p class="text-orange-600">{{ $message }}</p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor class="trix-content" input="body"></trix-editor>
    </div>
    @can('admin')
    <div class="mb-3 flex">
      <input type="checkbox" class="checkbox checkbox-info" id="published" name="published" value="" />
      <label for="published" class="text-xl mx-2">Publish</label>
      @error('published')
      <p class="text-red-500 font-light">
        {{ $message }}
      </p>
      @enderror
    </div>
    @endcan
    <button type="submit" class="btn btn-add">
      Create Post
      <span class="material-symbols-rounded">
        check_circle
      </span>
    </button>
  </form>
</section>

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