@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Upload File</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/guidances" class="mb-5" enctype="multipart/form-data">
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
      <label for="file" class="text-xl">File</label>
      <input type="file" class="file-input file-input-bordered file-input-secondary w-full @error('file') is-invalid @enderror" id="file" name="file" required value="{{ old('file') }}">
      @error('file')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-add">
      Upload
      <span class="material-symbols-rounded">
        check_circle
      </span>
    </button>
  </form>
</section>
@endsection