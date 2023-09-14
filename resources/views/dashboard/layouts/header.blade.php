<div id="navbar"
    class="navbar {{ Request::is('dashboard') ? 'bg-neutral/70' : 'bg-neutral/20' }} transition ease-in-out duration-500 rounded-[15px] drop-shadow-lg">
    <div class="navbar-start w-full">
        <div class="drawer-content flex flex-col items-center justify-center">
            <label for="my-drawer-2" class="btn btn-ghost drawer-button lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
        </div>
        @foreach ($properties->take(1) as $property)
            <img class="h-12 w-12 ml-3 lg:ml-5" src="{{ asset('storage/' . $property->image) }}"
                alt="{{ $property->property }}">
        @endforeach
        @foreach ($profils->take(1) as $profil)
            <a class="text-xl ml-3 hidden md:inline" href="/"><strong>{{ $profil->name }}</strong></a>
        @endforeach
    </div>
    <div class="navbar-end w-auto">
        @auth
            <div class="dropdown dropdown-end w-max">
                <div tabindex="0" class="text-xl mx-4 flex content-center cursor-pointer">
                    <span id="username">
                        {{ auth()->user()->name }}
                    </span>
                    <span class="material-symbols-rounded">
                        arrow_drop_down
                    </span>
                </div>
                <ul tabindex="0"
                    class="dropdown-content z-[1] menu -mr-2 p-2 backdrop-blur-md bg-neutral/70 rounded-box w-max mt-6 drop-shadow-lg">
                    <li>
                        <a class="flex gap-2" href="/register/showChangePasswordGet">
                            Change Password
                            <span class="material-symbols-rounded">
                                key
                            </span>
                        </a>
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="flex gap-2" type="submit">Logout
                                <span class="material-symbols-rounded">
                                    logout
                                </span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</div>

<script nonce="{{ csp_nonce() }}" type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        let username = document.querySelector('#username')
        let maxLength = 6;
        let text = username.innerHTML.trim();
        let truncatedText = text.length > maxLength ? text.substr(0, maxLength) + '..' : text;
        username.innerHTML = truncatedText;
    })
</script>
