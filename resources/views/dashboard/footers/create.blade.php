@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Create a New Footer</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/footers" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="text-xl">CSIRT Name</label>
                <input type="text" class="form-input" id="name" name="name" required autofocus
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="text-xl">Address</label>
                <input type="text" class="form-input" id="address" name="address" required
                    value="{{ old('address') }}">
                @error('address')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="maps" class="text-xl">Maps</label>
                <textarea class="form-textarea" id="maps" name="maps" required rows="5">{{ old('maps') }}</textarea>
                @error('maps')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telephone" class="text-xl">Telephone</label>
                <input type="text" class="form-input" id="telephone" name="telephone" required
                    value="{{ old('telephone') }}">
                @error('telephone')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="text-xl">Email</label>
                <input type="text" class="form-input" id="email" name="email" required value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Create Footer
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
