@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Edit a Category</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="text-xl">Category</label>
      <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $category->name) }}">
      @error('name')
      <p class="text-red-500 font-light">
        {{ $message }}
      </p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="text-xl">Slug</label>
      <input type="text" class="form-input @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $category->slug) }}" readonly>
      @error('slug')
      <p class="text-red-500 font-light">
        {{ $message }}
      </p>
      @enderror
    </div>
    <button type="submit" class="btn btn-add">
      Update Category
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
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endsection