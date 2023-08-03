<!-- Video Section -->
<div id="videoContainer" class="fixed top-0 left-0 right-0 w-screen h-screen bg-neutral/50 z-50">
    <div class="flex flex-col w-11/12 md:w-max md:h-max justify-end mx-auto my-24">
        <button id="closeButton" class="self-end btn btn-sm btn-circle btn-ghost">✕</button>
        @foreach ($videoProfile->take(1) as $video)
            <video class="m-auto rounded-2xl overflow-hidden md:w-[38rem] lg:w-[48rem]" autoplay muted>
                <source src="{{ asset('storage/' . $video->video) }}" class="w-full">
            </video>
        @endforeach
    </div>
</div>

<script nonce="{{ csp_nonce() }}" type="text/javascript">
    const videoContainer = document.getElementById('videoContainer');
    const closeButton = document.getElementById('closeButton');

    const isVideoHidden = sessionStorage.getItem('videoProfileHidden');
    if (isVideoHidden === 'true') {
        videoContainer.style.display = 'none';
    }
    closeButton.addEventListener('click', function() {
        videoContainer.style.display = 'none';
        sessionStorage.setItem('videoProfileHidden', 'true');
    });
</script>
<!-- End Video Section -->
