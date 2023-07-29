@extends('layouts.main')

@section('container')
<section class="my-24">
  <div class="w-11/12 md:w-10/12 lg:w-4/6 flex flex-wrap justify-between gap-8 bg-neutral/40 m-auto px-4 py-8 md:p-8 lg:p-10 rounded-[25px]">
    <div class="hidden lg:inline opacity-80 m-auto flex-1">
      <img class="w-11/12 mx-auto" src="image-property/register-img.png" alt="register-image">
    </div>
    <div class="flex-1">
      <form action="/dashboard/users" method="post">
        @csrf
        <h1 class="text-xl lg:text-2xl font-bold mb-5 text-center">Registration Form</h1>
        <div class="my-6">
          <input type="text" name="name" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
          @error('name')
          <p class="text-red-500 font-light">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="my-6">
          <input type="text" name="username" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
          @error('username')
          <p class="text-red-500 font-light">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="my-6">
          <input type="email" name="email" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary @error('email') is-invalid @enderror" id="email" placeholder="Email Address" required value="{{ old('email') }}">
          @error('email')
          <p class="text-red-500 font-light">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="mt-3 mb-2">
          <input type="password" name="password" class="input bg-neutral w-full transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-secondary @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
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
      <a class="mt-3 float-right underline underline-offset-4 transition ease-in-out duration-300 hover:decoration-secondary" href="/dashboard/users">Go Back To User Management</a>
    </div>
  </div>
</section>
@endsection