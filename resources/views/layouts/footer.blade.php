<!-- Footer Section -->
<footer class="bg-base-200">
  <div class="container footer mx-auto p-10 lg:text-xl leading-snug">
    <div>
      <span class="footer-title">Article Category</span>
      @foreach ($categories as $category)
      <a href="/posts?category={{ $category->slug }}" class="link link-hover decoration-primary">{{ $category->name }}</a>
      @endforeach
    </div>
    <div>
      <span class="footer-title">Latest Article</span>
      @foreach ($posts->take(4) as $post)
      <a href="/posts/{{ $post->slug }}" class="link link-hover decoration-primary">{{ $post->title }}</a>
      @endforeach
    </div>
    <div>
      <span class="footer-title">Contact</span>
      @foreach ($footers->take(1) as $footer)
      <ul class="list-none">
        <li>{{ $footer->address }}</li>
        <li>Email : {{ $footer->email }}</li>
        <li>Telephone : {{ $footer->telephone }}</li>
        @foreach ($keys->take(1) as $key)
        <li>PGP key dapat diunduh <a class="underline decoration-primary" href="{{'storage/' .  $key->path }}"> di sini</a> </li>
        @endforeach
      </ul>
      @endforeach
    </div>
    <div class="w-full md:w-44 lg:w-72 h-44 md:h-full lg:h-96 overflow-hidden">
      @foreach ($footers->take(1) as $footer)
      {!! $footer->maps !!}
      @endforeach
    </div>
  </div>
  <div class="text-center p-5 bg-base-300">
    <p>
      Copyright &copy; 2022 @foreach ($profils->take(1) as $profil)<span>{{ $profil->name }} .</span> @endforeach
      All Rights Reserved
    </p>
  </div>
</footer>
<!-- End Footer Section -->