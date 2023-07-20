@extends('layouts.main')

@section('container')

<div class="flex justify-center">
  <div class="container">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="flex justify-between items-center my-4 mx-auto pt-24 pb-12 lg:p-16">
      <div class="hidden lg:inline w-1/2 opacity-50">
        <img class="w-5/6 rounded-[15px] mx-auto" src="image-property/login-image.jpg" alt="login-image">
      </div>
      <div class="w-full md:w-3/4 lg:w-2/5 mx-auto">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-white md:text-2xl">
            Log in to your account
          </h1>
          <form class="space-y-4 md:space-y-6" action="/login" method="post">
            @csrf
            <div>
              <input type="email" name="email" id="email" placeholder="Your Email" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary rounded-none" autofocus required />
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div>
              <input type="password" name="password" autocomplete="off" id="password" placeholder="Password" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary rounded-none" required />
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input type="checkbox" value="" id="checkPassword" class="toggle toggle-primary">
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember">Show Password</label>
                </div>
              </div>
            </div>
            <div class="flex items-center justify-between">
              <div class="captcha w-full flex justify-between">
                <span>{!! captcha_img() !!}</span>
                <button type="button" class="btn btn-secondary rounded-none text-xl" class="reload" id="reload">
                  &#x21bb;
                </button>
              </div>
            </div>
            <div>
              <input type="text" name="captcha" autocomplete="off" id="captcha" placeholder="Enter Captcha" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary rounded-none" required>
              @error('captcha')
              <div class="invalid-feedback">
                <div class="alert alert-error rounded-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span>
                    Invalid Captcha!
                  </span>
                </div>
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline btn-secondary w-full rounded-none">Log in</button>
          </form>
        </div>
      </div>
    </div>

    <!-- <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control rounded @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
          <label for="email">Email Address</label>
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>


        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control rounded" autocomplete="off" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <div class="form-check m-0">
          <input class="form-check-input" type="checkbox" value="" id="checkPassword">
          <label class="form-check-label" for="flexCheckDefault">
            Show Password
          </label>
        </div>

        <div class="form-floating mt-3 mb-3">
          <div class="captcha">
            <span>{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-danger" class="reload" id="reload">
              &#x21bb;
            </button>
          </div>
        </div>

        <div class="form-floating mb-4">
          <input id="captcha" type="text" autocomplete="off" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha" required>
          <label for="captcha">Enter Captcha</label>
          @error('captcha')
          <div class="invalid-feedback"> Please provide a valid captcha.</div>
          @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Login</button>
      </form>
    </main> -->
  </div>
</div>

<script nonce="{{ csp_nonce() }}" type="text/javascript">
  const y = document.getElementById("checkPassword");
  y.addEventListener("click", myFunction);

  function myFunction() {
    const x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>


@endsection