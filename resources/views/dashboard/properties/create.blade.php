@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Create a Property</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/properties" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="text-xl">Name</label>
                <input type="text" class="form-input" id="name" name="name" required value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="property" class="text-xl">Property</label>
                <select class="form-select" id="property" name="property">
                    <option value="Logo">Logo</option>
                    <option value="Banner">Banner</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="text-xl">Image Property</label>
                <img class="img-preview my-3 w-64 rounded-lg">
                <input class="file-input file-input-bordered file-input-secondary w-full" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Create Property
                <span class="material-symbols-rounded">
                    check_circle
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
