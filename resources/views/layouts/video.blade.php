<!-- Video Section -->
@if ($videos->count())
    <div id="videoContainer" class="fixed top-0 w-screen h-screen bg-neutral/60 z-50">
        <div class="flex flex-col w-11/12 md:w-10/12 lg:w-8/12 my-32 md:my-56 lg:my-12 mx-auto">
            <button id="closeButton" class="self-end btn btn-sm btn-circle btn-ghost mb-1">✕</button>
            @foreach ($videos->take(1) as $video)
                <video id="videoPlayer" class="w-full rounded-xl overflow-hidden" autoplay muted controls>
                    <source src="{{ asset('storage/' . $video->video) }}" class="w-full">
                </video>
            @endforeach
        </div>
    </div>

    <script nonce="{{ csp_nonce() }}" type="text/javascript">
        function setCookie(name, value) {
            var expires = "";
            var date = new Date();
            date.setTime(date.getTime() + (2 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
            var encryptedValue = btoa(value);
            document.cookie = name + "=" + encryptedValue + expires + "; path=/";
        }

        function getCookie(name) {
            var cookieArr = document.cookie.split("; ");
            for (var i = 0; i < cookieArr.length; i++) {
                var cookiePair = cookieArr[i].split("=");
                if (name === cookiePair[0]) {
                    var decryptedValue = atob(cookiePair[1]);
                    return decodeURIComponent(decryptedValue);
                }
            }
            return null;
        }

        const videoContainer = document.getElementById('videoContainer');
        const closeButton = document.getElementById('closeButton');
        const videoPlayer = document.getElementById('videoPlayer');

        const isVideoHidden = getCookie('videoProfileHidden');
        if (isVideoHidden === 'true') {
            videoContainer.style.display = 'none';
        }

        closeButton.addEventListener('click', function() {
            videoContainer.style.display = 'none';
            setCookie('videoProfileHidden', 'true');
            videoPlayer.pause();
        });

        videoPlayer.addEventListener('ended', function() {
            setTimeout(function() {
                videoContainer.style.display = 'none';
                videoPlayer.pause();
                setCookie('videoProfileHidden', 'true');
            }, 4000);
        });
    </script>
@endif
<!-- End Video Section -->
