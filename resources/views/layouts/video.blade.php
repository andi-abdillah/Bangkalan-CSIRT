<!-- Video Section -->
@if ($videoProfile->count())
    <div id="videoContainer"
        class="fixed top-0 left-0 right-0 w-screen h-screen transition-all ease-in-out duration-600 bg-neutral/60 z-50">
        <div class="flex flex-col w-11/12 md:w-max md:h-max mx-auto my-40 md:my-52 lg:my-20">
            <button id="closeButton" class="self-end btn btn-sm btn-circle btn-ghost mb-1">✕</button>
            @foreach ($videoProfile->take(1) as $video)
                <video id="videoPlayer" class="md:w-[38rem] lg:w-[48rem] rounded-2xl overflow-hidden" autoplay muted
                    controls>
                    <source src="{{ asset('storage/' . $video->video) }}" class="w-full">
                </video>
            @endforeach
        </div>
    </div>

    <script nonce="{{ csp_nonce() }}" type="text/javascript">
        function setCookie(name, value) {
            var expires = "";
            var date = new Date();
            date.setTime(date.getTime() + (6 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
            var encryptedValue = btoa(value);
            document.cookie = name + "=" + encryptedValue + expires + "; path=/";
        }

        function getCookie(name) {
            var cookieArr = document.cookie.split("; ");
            for (var i = 0; i < cookieArr.length; i++) {
                var cookiePair = cookieArr[i].split("=");
                if (name === cookiePair[0]) {
                    // Dekripsi nilai cookie sebelum dikembalikan
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
        });

        videoPlayer.addEventListener('ended', function() {
            setTimeout(function() {
                videoContainer.style.display = 'none';
                setCookie('videoProfileHidden', 'true');
            }, 4000);
        });
    </script>
@endif
<!-- End Video Section -->
