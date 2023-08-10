@extends('layouts.main')

@section('container')
    <section class="my-24">
        @if (session()->has('success'))
            <div id="alert" class="alert alert-success flex justify-between w-11/12 md:w-10/12 lg:w-4/6 mx-auto mb-3">
                <span class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </span>
                <button id="closeBtn" class="btn btn-neutral btn-circle btn-sm">X</button>
            </div>
        @endif

        @if (session()->has('registerError'))
            <div id="alert" class="alert alert-error flex justify-between w-11/12 md:w-10/12 lg:w-4/6 mx-auto mb-3">
                <span class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('registerError') }}</span>
                </span>
                <button id="closeBtn" class="btn btn-neutral btn-circle btn-sm">X</button>
            </div>
        @endif
        <div
            class="w-11/12 md:w-10/12 lg:w-4/6 flex flex-wrap justify-between gap-8 bg-neutral/40 m-auto px-4 py-8 md:p-8 lg:p-10 rounded-[25px]">
            <div class="hidden lg:inline opacity-80 m-auto flex-1">
                <img class="w-11/12 mx-auto" src="image-property/register-img.png" alt="register-image">
            </div>
            <div class="flex-1">
                <form action="/register" method="post">
                    @csrf
                    <h1 class="text-xl lg:text-2xl font-bold mb-5 text-center">Registration Form</h1>
                    <div class="my-6">
                        <input type="text" name="name"
                            class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary"
                            id="name" placeholder="Name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="my-6">
                        <input type="text" name="username"
                            class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary"
                            id="username" placeholder="Username" value="{{ old('username') }}" required>
                        @error('username')
                            <p class="text-red-500 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="my-6">
                        <input type="email" name="email"
                            class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary"
                            id="email" placeholder="Email Address" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="text-red-500 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-2">
                        <input type="password" name="password"
                            class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary"
                            id="password" placeholder="Password" required>
                        <div id="passwordHelpBlock" class="text-sm mt-2">
                            Minimal 8 Karakter yang berisi kombinasi huruf besar, huruf kecil, angka dan simbol.
                        </div>
                        @error('password')
                            <p class="text-red-500 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button class="btn btn-secondary w-full" type="submit">Create Account</button>
                </form>
                <a class="mt-3 float-right underline underline-offset-4 transition ease-in-out duration-300 hover:decoration-secondary"
                    href="/dashboard/users">Back To User Management</a>
            </div>
        </div>
    </section>
@endsection
