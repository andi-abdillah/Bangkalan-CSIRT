@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Edit Profil</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/profils/{{ ($profil->slug) }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="text-xl font-bold">Name</label>
      <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $profil->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="link" class="text-xl font-bold">Link Sistem Ticketing</label>
      <textarea class="form-textarea @error('link') is-invalid @enderror" id="link" name="link" required rows="2">{{ old('link', $profil->link) }}</textarea>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="content" class="text-xl font-bold">Content</label>
      @error('content')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="content" type="hidden" name="content" value="{{ old('content', $profil->content) }}">
      <trix-editor class="trix-content" input="content"></trix-editor>
    </div>
    <button type="submit" class="btn btn-add">
      Edit Profil
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