@extends('dashboard.layouts.main')

@section('container')
<div class="col-lg-8">
  <h1 class="text-2xl font-bold my-4">Create a New Footer</h1>
  <div class="divider"></div>
  <form method="post" action="/dashboard/footers" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="text-xl font-bold">CSIRT Name</label>
      <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="address" class="text-xl font-bold">Address</label>
      <input type="text" class="form-input @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address') }}">
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="maps" class="text-xl font-bold">Maps</label>
      <textarea class="form-textarea @error('maps') is-invalid @enderror" id="maps" name="maps" required rows="5">{{ old('maps') }}</textarea>
      @error('maps')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="telephone" class="text-xl font-bold">Telephone</label>
      <input type="text" class="form-input @error('telephone') is-invalid @enderror" id="telephone" name="telephone" required value="{{ old('telephone') }}">
      @error('telephone')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="email" class="text-xl font-bold">Email</label>
      <input type="text" class="form-input @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-add">
      Create Footer
      <span class="material-symbols-rounded">
        check_circle
      </span>
    </button>
  </form>
</div>



<script nonce="{{ csp_nonce() }}">
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection