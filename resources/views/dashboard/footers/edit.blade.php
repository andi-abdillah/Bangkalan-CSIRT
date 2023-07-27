@extends('dashboard.layouts.main')

@section('container')
<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Edit Footer</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/footers/{{ $footer->slug }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="text-xl">CSIRT Name</label>
      <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $footer->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="address" class="text-xl">Address</label>
      <input type="text" class="form-input @error('address') is-invalid @enderror" id="address" name="address" required autofocus value="{{ old('address', $footer->address) }}">
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="maps" class="text-xl">Maps</label>
      <textarea class="form-textarea @error('maps') is-invalid @enderror" id="maps" name="maps" required rows="5">{{ old('maps', $footer->maps) }}</textarea>
      @error('maps')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="telephone" class="text-xl">Telephone</label>
      <input type="text" class="form-input @error('telephone') is-invalid @enderror" id="telephone" name="telephone" required value="{{ old('telephone', $footer->telephone) }}">
      @error('telephone')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="text-xl">Email</label>
      <input type="text" class="form-input @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $footer->email) }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-add">
      Update Footer
      <span class="material-symbols-rounded">
        edit_note
      </span>
    </button>
  </form>
</section>
@endsection