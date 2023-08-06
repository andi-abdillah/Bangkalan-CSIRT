<!-- Navigation Bar -->
<nav class="relative">
    <div id="navbar"
        class="navbar fixed top-0 left-0 right-0 flex lg:justify-center text-white transition ease-in-out duration-500 font-bold z-50">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="dropdown-content list-none mt-5 z-[1] p-2 shadow bg-neutral rounded-box w-52">
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('/') ? 'link-active' : '' !!}" href="/">Home</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('profil') ? 'link-active' : '' !!}" href="/profil">Profile</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('posts') ? 'link-active' : '' !!}" href="/posts">Article</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('file') ? 'link-active' : '' !!}" href="/file">RFC2350</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('service') ? 'link-active' : '' !!}" href="/service">Service</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('guidance') ? 'link-active' : '' !!}" href="/guidance">Guidance</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('contact') ? 'link-active' : '' !!}" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
            <a class="lg:ml-7 my-1" href="/">
                @foreach ($properties->take(1) as $property)
                    <img class="h-14 w-14" src="{{ asset('storage/' . $property->image) }}"
                        alt="{{ $property->property }}">
                @endforeach
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="flex flex-row px-4 no-underline list-none">
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('/') ? 'link-active' : '' !!}" href="/">Home</a></li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('profil') ? 'link-active' : '' !!}" href="/profil">Profile</a></li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('posts') ? 'link-active' : '' !!}" href="/posts">Article</a></li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('file') ? 'link-active' : '' !!}" href="/file">RFC2350</a></li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('service') ? 'link-active' : '' !!}" href="/service">Service</a></li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('guidance') ? 'link-active' : '' !!}" href="/guidance">Guidance</a>
                </li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('contact') ? 'link-active' : '' !!}" href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="absolute dropdown dropdown-end right-4 lg:static">
            <label tabindex="0" class="btn btn-ghost rounded-btn capitalize">Theme</label>
            <ul id="theme" tabindex="0"
                class="menu dropdown-content w-max mt-6 mx-4 p-2 shadow-xl bg-neutral rounded-box z-[1]">
                <li><button class="capitalize" value="dark">dark</button></li>
                <li><button class="capitalize" value="synthwave">synthwave</button></li>
                <li><button class="capitalize" value="night">night</button></li>
                <li><button class="capitalize" value="luxury">luxury</button></li>
                <li><button class="capitalize" value="dracula">dracula</button></li>
                <li><button class="capitalize" value="forest">forest</button></li>
                <li><button class="capitalize" value="business">business</button></li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation Bar -->
