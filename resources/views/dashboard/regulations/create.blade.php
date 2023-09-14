@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Create a New Regulation</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/regulations" class="mb-5" enctype="multipart/form-data">
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
                <label for="regulation_category_id" class="text-xl">Regulation Category</label>
                <select id="regulation_category_id" name="regulation_category_id" class="form-select">
                    @foreach ($regulationCategories as $regulationCategory)
                        @if (old('regulation_category_id') == $regulationCategory->id)
                            <option value="{{ $regulationCategory->id }}" selected>{{ $regulationCategory->name }}</option>
                        @else
                            <option value="{{ $regulationCategory->id }}">{{ $regulationCategory->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="text-xl">File</label>
                <input type="file" class="file-input file-input-bordered file-input-secondary w-full" id="file"
                    name="file" accept=".pdf" required value="{{ old('file') }}">
                @error('file')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
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
