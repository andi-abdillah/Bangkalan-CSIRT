<!doctype html>
<html lang="en" data-theme="night">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard">

    @foreach ($properties->where('property', 'Logo')->take(1) as $property)
        <link rel="icon" href="{{ asset('storage/' . $property->image) }}">
    @endforeach

    @foreach ($profils->take(1) as $profil)
        <title>{{ $profil->name }}</title>
    @endforeach

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script nonce="{{ csp_nonce() }}" type="text/javascript" src="/js/trix.js"></script>

    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Fira Sans', sans-serif;
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        article {
            text-align: justify;
            text-justify: inter-word;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="/css/styles.css" rel="stylesheet">
</head>

<body class="overflow-x-hidden">
    <div class="flex">
        <aside class="fixed left-0 top-0 z-50">
            @include('dashboard.layouts.sidebar')
        </aside>
        <main class="relative w-full lg:ml-80 p-3 lg:py-4 lg:px-6">
            <header class="sticky top-5 z-30">
                @include('dashboard.layouts.header')
            </header>
            <div class="relative top-5 bottom-5">
                @yield('container')
            </div>
        </main>
    </div>

    <script nonce="{{ csp_nonce() }}" src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script nonce="{{ csp_nonce() }}" type="text/javascript">
        var navbar = document.getElementById("navbar");
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 50) {
                navbar.classList.remove("bg-neutral/20");
                navbar.classList.add("backdrop-blur-md", "bg-neutral/70");
            } else {
                navbar.classList.remove("backdrop-blur-md", "bg-neutral/70");
                navbar.classList.add("bg-neutral/20");
            }
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
