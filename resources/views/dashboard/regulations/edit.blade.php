@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Update Regulation</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/regulations/{{ $regulation->slug }}" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="text-xl">Nama Panduan</label>
                <input type="text" class="form-input" id="name" name="name" required autofocus
                    value="{{ old('name', $regulation->name) }}">
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
                        @if (old('regulation_category_id', $regulation->regulation_category_id) == $regulationCategory->id)
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
                    name="file" accept=".pdf" value="{{ old('file') }}">
                @error('file')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Update Regulation
                <span class="material-symbols-rounded">
                    edit_note
                </span>
            </button>
        </form>
    </section>
@endsection
