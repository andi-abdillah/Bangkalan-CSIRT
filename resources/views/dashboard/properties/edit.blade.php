@extends('dashboard.layouts.main')

@section('container')
    {{-- @dd($property) --}}
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Edit Property</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/properties/{{ $property->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="property" class="text-xl">Property</label>
                <input type="text" class="form-input" id="property" name="property" required
                    value="{{ old('property', $property->property) }}" readonly>
                @error('property')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="text-xl">Name</label>
                <input type="text" class="form-input" id="name" name="name" required
                    value="{{ old('name', $property->name) }}" autofocus>
                @error('name')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="text-xl">Image Property</label>
                @if ($property->image)
                    <img src="{{ asset('storage/' . $property->image) }}" class="img-preview my-3 w-64 rounded-lg block">
                @else
                    <img class="img-preview my-3 w-64 rounded-lg">
                @endif
                <input class="file-input file-input-bordered file-input-secondary w-full" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Update Property
                <span class="material-symbols-rounded">
                    edit_note
                </span>
            </button>
        </form>
    </section>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
