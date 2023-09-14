<!doctype html>
<html lang="en" data-theme="night">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @foreach ($properties->take(1) as $property)
        <link rel="icon" href="{{ asset('storage/' . $property->image) }}">
    @endforeach

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script nonce="{{ csp_nonce() }}" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">

    <style>
        .hero {
            @foreach ($propertiez->take(1) as $property)
                background-image: url('{{ asset('storage/' . $property->image) }}');
            @endforeach
        }
    </style>
    @foreach ($profils->take(1) as $profil)
        <title>{{ $profil->name }}</title>
    @endforeach

</head>

<body class="flex flex-col min-h-screen">
    @include('layouts.navbar')

    @includeWhen($includeHero, 'layouts.hero')

    @includeWhen($includeVideo, 'layouts.video')

    <div class="grow m-0 p-0">
        @yield('container')
    </div>

    @include('layouts.footer')


    <script nonce="{{ csp_nonce() }}" type="text/javascript">
        var element = document.getElementById("navbar");

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 90) {
                element.classList.add("bg-neutral");
            } else {
                element.classList.remove("bg-neutral");
            }
        })

        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '/login/reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        })

        const alert = document.getElementById('alert');
        const closeBtn = document.getElementById('closeBtn');

        if (closeBtn && alert) {
            closeBtn.addEventListener('click', function() {
                alert.style.display = 'none';
            });
        }
    </script>
</body>

</html>
