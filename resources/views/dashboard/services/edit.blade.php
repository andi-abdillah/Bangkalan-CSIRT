@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Edit a Service</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/services/{{ $service->slug }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="text-xl">Name</label>
      <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $service->name) }}">
      @error('name')
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
      <input id="content" type="hidden" name="content" value="{{ old('content', $service->content) }}">
      <trix-editor class="trix-content" input="content"></trix-editor>
    </div>
    <button type="submit" class="btn btn-add">
      Update Service
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