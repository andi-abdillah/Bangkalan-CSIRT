<!-- Footer Section -->
<footer class="relative bg-base-200">
    <div class="container footer mx-auto p-10 leading-snug">
        <div>
            <span class="footer-title lg:text-xl">Artikel Terbaru</span>
            @foreach ($posts->take(4) as $post)
                <a href="/posts/{{ $post->slug }}"
                    class="link link-hover lg:text-footer decoration-primary">{{ $post->title }}</a>
            @endforeach
        </div>
        <div>
            <span class="footer-title lg:text-xl">Kontak</span>
            @foreach ($footers->take(1) as $footer)
                <ul class="list-none lg:text-footer">
                    <li>{{ $footer->address }}</li>
                    <li>Email : {{ $footer->email }}</li>
                    <li>Telephone : {{ $footer->telephone }}</li>
                    @foreach ($keys->take(1) as $key)
                        <li>PGP key dapat diunduh <a class="underline decoration-primary"
                                href="{{ 'storage/' . $key->path }}"> di sini</a> </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
        <div class="w-full md:w-44 lg:w-72 h-44 md:h-64 lg:h-72 overflow-hidden">
            @foreach ($footers->take(1) as $footer)
                {!! $footer->maps !!}
            @endforeach
        </div>
    </div>
    <div class="text-center p-5 bg-base-300">
        <p>
            Copyright &copy; 2023 @foreach ($profils->take(1) as $profil)
                <span>{{ $profil->name }} .</span>
            @endforeach
            All Rights Reserved
        </p>
    </div>
    @foreach ($profils->take(1) as $profil)
        <a href="{{ $profil->whatsapp_link }}" target="_blank" id="whatsapp-icon"
            class="fixed bottom-5 right-5 w-14 h-14 transition ease-in-out duration-300 hover:scale-[1.15] z-20"></a>
    @endforeach
</footer>
<!-- End Footer Section -->
