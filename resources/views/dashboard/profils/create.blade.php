@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Create a New Profil</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/profils" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="text-xl">Name</label>
      <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="link" class="text-xl">Link Sistem Ticketing</label>
      <textarea class="form-textarea @error('link') is-invalid @enderror" id="link" name="link" required rows="2">{{ old('link') }}</textarea>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="content" class="text-xl">Content</label>
      @error('content')
      <p class="text-orange-600">{{ $message }}</p>
      @enderror
      <input id="content" type="hidden" name="content" value="{{ old('content') }}">
      <trix-editor class="trix-content" input="content"></trix-editor>
    </div>
    <button type="submit" class="btn btn-add">
      Create Profil
      <span class="material-symbols-rounded">
        check_circle
      </span>
    </button>
  </form>
</section>

<script nonce="{{ csp_nonce() }}">
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection