<div id="navbar" class="navbar transition ease-in-out duration-500 rounded-[15px] drop-shadow-lg">
  <div class="navbar-start w-full">
    <div class="drawer-content flex flex-col items-center justify-center">
      <label for="my-drawer-2" class="btn btn-ghost drawer-button lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </label>
    </div>
    @foreach ($profils->take(1) as $profil)
    <a class="normal-case text-xl lg:mx-3" href="/"><strong>{{ $profil->name }}</strong></a>
    @endforeach
  </div>
  <div class="navbar-end w-auto">
    @auth
    <div class="dropdown dropdown-end w-max">
      <label tabindex="0" class="text-xl mx-4 cursor-pointer">{{ auth()->user()->name }} <i class="fa-solid fa-caret-down"></i></label>
      <ul tabindex="0" class="dropdown-content z-[1] menu p-2 backdrop-blur-md bg-neutral/70 rounded-box w-max mt-6 drop-shadow-lg">
        <li><a class="flex gap-2" href="/register/showChangePasswordGet">Change Password <span data-feather="key"></span></a></li>
        <li>
          <form action="/logout" method="post">
            @csrf
            <button class="flex gap-2" type="submit">Logout <span data-feather="log-out"></span></button>
          </form>
        </li>
      </ul>
    </div>
    @endauth
  </div>
</div>

<!-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow justify-content-between">
  <div class="container-fluid">
    @foreach ($profils->take(1) as $profil)
    <a class="navbar-brand bg-dark col-md-3 col-lg-2 me-1 px-4 fs-6" href="/"><strong>{{ $profil->name }}</strong></a>
    @endforeach
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="form-control-dark w-100"></div>

    <div class="navbar-dark" style="margin-right: 6rem">
      @auth
      <ul class="text-decoration-none m-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white fs-6" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <strong>{{ auth()->user()->name }}</strong>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item py-1" href="/register/showChangePasswordGet">Change Password <span data-feather="key"></span></a></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item nav-link text-dark px-3 border-0">Logout <span data-feather="log-out"></span></button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
      @endauth
    </div>
  </div>
</header> -->