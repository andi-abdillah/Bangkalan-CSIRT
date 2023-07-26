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
  <link rel="stylesheet" href="{{mix('css/app.css')}}">

  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script nonce="{{ csp_nonce() }}" type="text/javascript" src="/js/trix.js"></script>

  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

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

    .table {
      border-spacing: 0 8px;
    }

    i {
      font-size: 1rem !important;
    }

    .table tr {
      border-radius: 20px;
    }

    tr td:nth-child(n+6),
    tr th:nth-child(n+6) {
      border-radius: 0 .625rem .625rem 0;
    }

    tr td:nth-child(1),
    tr th:nth-child(1) {
      border-radius: .625rem 0 0 .625rem;
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body class="overflow-x-hidden">
  <div class="flex">
    <aside class="fixed left-0 top-0 z-30">
      @include('dashboard.layouts.sidebar')
    </aside>
    <main class="relative w-full lg:ml-80 p-2 lg:p-4">
      <header class="sticky top-5 z-50">
        @include('dashboard.layouts.header')
      </header>
      <main class="relative top-5">
        @yield('container')
      </main>
    </main>
  </div>

  <script nonce="{{ csp_nonce() }}" src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script nonce="{{ csp_nonce() }}" src="/js/dashboard.js"></script>
  <script nonce="{{ csp_nonce() }}" type="text/javascript">
    var navbar = document.getElementById("navbar");
    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 50) {
        navbar.classList.add("backdrop-blur-md", "bg-neutral/70");
      } else {
        navbar.classList.remove("backdrop-blur-md", "bg-neutral/70");
      }
    })
  </script>
</body>

</html>