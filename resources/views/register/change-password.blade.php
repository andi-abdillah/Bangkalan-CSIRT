@extends('dashboard.layouts.main')

@section('container')
    <div class="mb-4">
        <h1 class="text-2xl font-bold my-4">Change Password</h1>
        <div class="divider"></div>

        <div class="panel-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success flex">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form class="form-horizontal" autocomplete="off" method="POST" action="/register/showChangePasswordGet">
                {{ csrf_field() }}
                <div class="{{ $errors->has('current-password') ? ' has-error' : '' }} mb-3">
                    <label for="current-password" class="text-xl">Current Password</label>
                    <div class="col-md-6">
                        <input id="current-password" type="password" class="form-input" name="current-password" required
                            autofocus>
                        @if ($errors->has('current-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="{{ $errors->has('new-password') ? ' has-error' : '' }} mb-3">
                    <label for="new-password" class="text-xl">New Password</label>
                    <div class="col-md-6">
                        <input id="new-password" type="password" class="form-input" name="new-password" required
                            aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock">
                            Minimal 8 Karakter yang berisi kombinasi huruf besar, huruf kecil, angka dan simbol.
                        </div>
                        @if ($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="new-password-confirm" class="text-xl">Confirm New Password</label>
                    <div class="col-md-6 mb-1">
                        <input id="confirm-password" type="password" class="form-input" name="new-password_confirmation"
                            required>
                    </div>
                </div>
                <div class="mb-3 flex">
                    <input class="checkbox checkbox-info" type="checkbox" value="" id="checkPassword">
                    <label class="text-xl mx-2" for="flexCheckDefault">
                        Show Password
                    </label>
                </div>
                <button type="submit" class="btn btn-add">
                    Change Password
                    <span class="material-symbols-rounded">
                        lock_reset
                    </span>
                </button>
            </form>
        </div>
    </div>

    <script nonce="{{ csp_nonce() }}" type="text/javascript">
        const y = document.getElementById("checkPassword");
        y.addEventListener("click", myFunction);

        function myFunction() {
            const collection = document.getElementsByClassName("form-input");
            for (let i = 0; i < collection.length; i++) {
                if (collection[i].type === "password") {
                    collection[i].type = "text";
                } else {
                    collection[i].type = "password";
                }
            }
        }
    </script>
@endsection
