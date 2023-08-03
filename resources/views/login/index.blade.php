@extends('layouts.main')

@section('container')
    <div class="flex justify-center">
        <div class="container py-28">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('loginError') }}</span>
                </div>
            @endif

            <div
                class="w-11/12 md:w-10/12 lg:w-4/6 flex justify-between gap-8 bg-neutral/40 m-auto px-4 py-8 md:p-8 lg:p-10 rounded-[25px]">
                <div class="hidden lg:inline flex-1 m-auto">
                    <img class="w-11/12 mx-auto" src="image-property/login-img.png" alt="login-image">
                </div>
                <form class="flex-1" action="/login" method="post">
                    @csrf
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-white md:text-2xl">
                        Log in to your account
                    </h1>
                    <div class="my-4">
                        <input type="email" name="email" id="email" placeholder="Your Email"
                            class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary"
                            autofocus required />
                        @error('email')
                            <p class="text-red-700 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="my-4">
                        <input type="password" name="password" autocomplete="off" id="password" placeholder="Password"
                            class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary"
                            required />
                    </div>
                    <div class="flex my-4">
                        <input type="checkbox" value="" id="checkPassword" class="toggle toggle-primary">
                        <label class="ml-3" for="remember">Show Password</label>
                    </div>
                    <div class="flex justify-between">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-secondary text-xl" class="reload" id="reload">
                            &#x21bb;
                        </button>
                    </div>
                    <div class="my-4">
                        <input type="text" name="captcha" autocomplete="off" id="captcha" placeholder="Enter Captcha"
                            class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary"
                            required>
                        @error('captcha')
                            <div class="alert alert-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>
                                    Invalid Captcha!
                                </span>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-secondary w-full">Log in</button>
                </form>
            </div>
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
