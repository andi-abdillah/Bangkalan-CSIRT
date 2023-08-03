@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-4">
        <h1 class="text-2xl font-bold my-4">Create a Video Profile</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/videos" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="text-xl">Title</label>
                <input type="text" class="form-input @error('title') is-invalid @enderror" id="title" name="title"
                    required value="{{ old('title') }}">
                @error('title')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video" class="text-xl">Video</label>
                <video class="video-preview my-3 w-64 rounded-lg" controls></video>
                <input
                    class="file-input file-input-bordered file-input-secondary w-full @error('video') is-invalid @enderror"
                    type="file" id="video" name="video" onchange="previewVideo()" accept="video/*" required>
                @error('video')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Create Video Profile
                <span class="material-symbols-rounded">
                    check_circle
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
            videoPreview.src = blob;
        }
    </script>
@endsection
