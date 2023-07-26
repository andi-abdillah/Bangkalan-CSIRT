<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @foreach ($properties->take(1) as $property)
  <link rel="icon" href="{{ asset('storage/' . $property->image) }}">
  @endforeach

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <script nonce="{{ csp_nonce() }}" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: 'Fira Sans', sans-serif;
    }

    .hero {
      @foreach ($propertiez->take(1) as $property) background-image: url('{{ asset(' storage/' . $property->image) }}');
      @endforeach
    }

    .pdfobject-container {
      height: 100vh;
      border: 1rem solid rgba(0, 0, 0, .1);
    }

    .link-underline {
      border-bottom-width: 0;
      background-image: linear-gradient(transparent, transparent), linear-gradient(hsl(var(--s)), hsl(var(--s)));
      background-size: 0 2.5px;
      background-position: 0 100%;
      background-repeat: no-repeat;
      transition: background-size .3s ease-in-out;
      text-decoration: none;
    }

    .link-underline:hover {
      background-size: 100% 2.5px;
    }

    .link-active {
      background-size: 100% 2.5px;
    }

    #laptop-container {
      background-image: url("image-property/laptop-container.png");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      display: flex;
      justify-content: center;
      transform-style: preserve-3d;
    }

    .child-img {
      transform: translateZ(-10px)
    }
  </style>
  @foreach ($profils->take(1) as $profil)
  <title>{{ $profil->name }}</title>
  @endforeach

</head>

<body>
  @include('layouts.navbar')

  @includeWhen($includeHero, 'layouts.hero')

  <div class="m-0 p-0">
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

    window.addEventListener("DOMContentLoaded", function() {
      let themeValue = localStorage.getItem("myCsirtTheme") || "dark";
      document.documentElement.setAttribute("data-theme", themeValue);

      const buttons = document.querySelectorAll("#theme button");

      buttons.forEach(function(button) {
        if (button.value === themeValue) {
          button.classList.add("bg-secondary");
        }

        button.addEventListener("click", function() {
          const value = this.value;
          document.documentElement.setAttribute("data-theme", value);

          buttons.forEach(function(btn) {
            btn.classList.remove("bg-secondary");
          });

          this.classList.add("bg-secondary");

          themeValue = value;
          localStorage.setItem("myCsirtTheme", themeValue);
        });
      });
    });
  </script>
</body>

</html>