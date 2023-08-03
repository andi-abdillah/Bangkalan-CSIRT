@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-4">
        <h1 class="text-2xl font-bold my-4">Edit video</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/videos/{{ $video->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="text-xl">Title</label>
                <input type="text" class="form-input @error('video') is-invalid @enderror" id="title" name="title"
                    required value="{{ old('video', $video->title) }}">
                @error('video')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video" class="text-xl">Video</label>
                @if ($video->video)
                    <video class="my-3 rounded-lg overflow-hidden" width="320" height="240" controls>
                        <source src="{{ asset('storage/' . $video->video) }}" class="video-preview w-full">
                    </video>
                @else
                    <video class="my-3 rounded-lg overflow-hidden" width="320" height="240" controls>
                        <source class="video-preview w-full">
                    </video>
                @endif
                <input
                    class="file-input file-input-bordered file-input-secondary w-full @error('video') is-invalid @enderror"
                    type="file" id="video" name="video" onchange="previewVideo()">
                @error('video')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Update video
                <span class="material-symbols-rounded">
                    edit_note
                </span>
            </button>
        </form>
    </section>

    <script>
        function previewVideo() {
            const video = document.querySelector('#video');
            const videoPreview = document.querySelector('.video-preview');

            videoPreview.style.display = 'block';

            const blob = URL.createObjectURL(video.files[0]);
            console.log(URL.createObjectURL(video.files[0]))
            videoPreview.src = blob;
        }
    </script>
@endsection
