<!-- Navigation Bar -->
<nav class="relative">
    <div id="navbar"
        class="navbar fixed top-0 left-0 right-0 flex lg:justify-center text-white transition ease-in-out duration-500 font-bold z-50">
        <div class="navbar-start">
            <details class="dropdown">
                <summary class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </summary>
                <ul class="dropdown-content list-none mt-5 z-[1] p-2 shadow bg-neutral rounded-box w-52">
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('/') ? 'link-active' : '' !!}" href="/">Beranda</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('profile') ? 'link-active' : '' !!}" href="/profile">Profil</a>
                    </li>
                    <details class="collapse collapse-arrow">
                        <summary class="collapse-title">Publikasi</summary>
                        <ul class="collapse-content w-max list-none">
                            <li class="m-2 p-2"><a class="link-underline {!! Request::is('posts') ? 'link-active' : '' !!}"
                                    href="/posts">Artikel</a>
                            </li>
                            <li class="m-2 p-2"><a class="link-underline {!! Request::is('regulations') ? 'link-active' : '' !!}"
                                    href="/regulations">Peraturan
                                    Kebijakan</a>
                            </li>
                            <li class="m-2 p-2"><a class="link-underline {!! Request::is('file') ? 'link-active' : '' !!}"
                                    href="/file">RFC2350</a>
                            </li>
                            <li class="m-2 p-2"><a class="link-underline {!! Request::is('service') ? 'link-active' : '' !!}"
                                    href="/service">Layanan</a>
                            </li>
                        </ul>
                    </details>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('guidance') ? 'link-active' : '' !!}" href="/guidance">Panduan</a>
                    </li>
                    <li class="m-2 p-2"><a class="link-underline {!! Request::is('contact') ? 'link-active' : '' !!}" href="/contact">Kontak
                            Kami</a>
                    </li>
                </ul>
            </details>
            <a class="ml-3 lg:ml-7 my-1" href="/">
                @foreach ($properties->take(1) as $property)
                    <img class="h-14 w-14" src="{{ asset('storage/' . $property->image) }}"
                        alt="{{ $property->property }}">
                @endforeach
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="flex flex-row px-4 no-underline list-none">
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('/') ? 'link-active' : '' !!}" href="/">Beranda</a></li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('profile') ? 'link-active' : '' !!}" href="/profile">Profil</a></li>
                <li class="dropdown m-2 py-2 pl-1">
                    <label tabindex="0" class="flex link-underline cursor-pointer">
                        Publikasi
                        <span class="material-symbols-rounded p-0">
                            expand_more
                        </span>
                    </label>
                    <ul tabindex="0"
                        class="dropdown-content z-[1] mt-8 p-2 shadow-xl bg-neutral rounded-box w-max list-none">
                        <li class="m-4"><a class="link-underline {!! Request::is('posts') ? 'link-active' : '' !!}" href="/posts">Artikel</a>
                        </li>
                        <li class="m-4"><a class="link-underline {!! Request::is('regulations') ? 'link-active' : '' !!}"
                                href="/regulations">Peraturan
                                Kebijakan</a></li>
                        <li class="m-4"><a class="link-underline {!! Request::is('file') ? 'link-active' : '' !!}" href="/file">RFC2350</a>
                        </li>
                        <li class="m-4"><a class="link-underline {!! Request::is('service') ? 'link-active' : '' !!}"
                                href="/service">Layanan</a></li>
                    </ul>
                </li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('guidance') ? 'link-active' : '' !!}" href="/guidance">Panduan</a>
                </li>
                <li class="m-2 p-2"><a class="link-underline {!! Request::is('contact') ? 'link-active' : '' !!}" href="/contact">Kontak Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation Bar -->
