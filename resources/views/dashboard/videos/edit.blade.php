@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Edit video</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/videos/{{ $video->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="text-xl">Title</label>
                <input type="text" class="form-input" id="title" name="title" required
                    value="{{ old('video', $video->title) }}">
                @error('video')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video" class="text-xl">Video</label>
                <video class="my-3 rounded-lg overflow-hidden" width="320" height="240" muted controls>
                    @if ($video->video)
                        <source src="{{ asset('storage/' . $video->video) }}" class="video-preview w-full">
                    @else
                        <source class="video-preview w-full">
                    @endif
                </video>
                <input class="file-input file-input-bordered file-input-secondary w-full" type="file" id="video"
                    name="video" accept="video/*" onchange="previewVideo()">
                @error('video')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3 flex">
                <input type="checkbox" class="checkbox checkbox-info" id="show" name="show"
                    {{ $video->show ? 'checked' : '' }} value="">
                <label for="flexCheckDefault" class="text-xl mx-2">Show</label>
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
