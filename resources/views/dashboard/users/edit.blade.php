@extends('dashboard.layouts.main')

@section('container')
    <section class="mb-8">
        <h1 class="text-2xl font-bold my-4">Edit User</h1>
        <div class="divider"></div>
        <form method="post" action="/dashboard/users/{{ $user->username }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="text-xl">Name</label>
                <input type="text" class="form-input" id="name" name="name" required autofocus
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="text-xl">Username</label>
                <input type="text" class="form-input" id="username" name="username" required
                    value="{{ old('username', $user->username) }}">
                @error('username')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="text-xl">Email</label>
                <input type="text" class="form-input" id="email" name="email" required
                    value="{{ old('email', $user->email) }}">
                @error('email')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3 {{ $user->is_superadmin ? 'hidden' : '' }}">
                <label for="password" class="text-xl">Password</label>
                <input type="password" class="form-input" id="password" name="password" autocomplete="off"
                    {{ $user->is_superadmin ? 'disabled' : 'required' }} aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="mb-3">
                    Minimal 8 Karakter yang berisi kombinasi huruf besar, huruf kecil, angka dan simbol.
                </div>
                <div class="mb-3 flex">
                    <input class="checkbox checkbox-info" type="checkbox" value="" id="checkPassword">
                    <label class="text-xl mx-2" for="flexCheckDefault">
                        Show Password
                    </label>
                </div>
                @error('password')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3 flex {{ $user->is_superadmin ? 'hidden' : '' }}">
                <input type="checkbox" class="checkbox checkbox-info" id="is_admin" name="is_admin"
                    {{ $user->is_admin ? 'checked' : '' }} {{ $user->is_superadmin ? 'disabled' : '' }} value="">
                <label for="flexCheckDefault" class="text-xl mx-2">Admin</label>
                @error('is_admin')
                    <p class="text-red-500 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-add">
                Update User
                <span class="material-symbols-rounded">
                    edit_note
                </span>
            </button>
        </form>
    </section>

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
