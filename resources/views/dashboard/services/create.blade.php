@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Create a New Service</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/services" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="text-xl">Name</label>
                <input type="text" class="form-input" id="name" name="name" required autofocus
                    value="{{ old('name') }}">
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
                <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                <trix-editor class="trix-content" input="content"></trix-editor>
            </div>
            <button type="submit" class="btn btn-add">
                Create Service
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
