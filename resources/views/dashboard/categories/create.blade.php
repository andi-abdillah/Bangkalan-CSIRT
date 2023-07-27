@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Create a New Category</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/categories" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="text-xl font-bold">Name</label>
      <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="text-xl font-bold">Slug</label>
      <input type="text" class="form-input @error('slug') is-invalid @enderror" id="slug" name="slug" readonly required value="{{ old('slug') }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-add">
      Create Categories
      <span class="material-symbols-rounded">
        check_circle
      </span>
    </button>
  </form>
</section>

<script nonce="{{ csp_nonce() }}">
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endsection