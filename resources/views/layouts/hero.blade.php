<!-- Hero Section -->
<div class="hero h-screen bg-fixed" id="home">
  <div class="absolute h-screen w-full bg-neutral opacity-60"></div>
  <div class="container relative flex justify-center">
    <div class="flex flex-col w-4/5 justify-center gap-4 text-white">
      @foreach ($profils->take(1) as $profil)
      <h1 class="text-center text-2xl md:text-4xl lg:text-6xl font-semibold">{{ $profil->name }}</h1>
      <article class="text-center text-lg md:text-xl lg:w-3/4 mx-auto">
        {{ Illuminate\Support\Str::limit(strip_tags($profil->content), 310) }}
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, molestias error quo eum dignissimos ut, delectus nam reprehenderit dolorem fuga ratione odit ullam excepturi aperiam accusantium ipsam. Earum, assumenda aperiam?
      </article>
      <div class="flex justify-center mt-4 gap-4">
        <a href="/profil" class="btn btn-outline btn-info rounded-none">Read More</a>
        <a href="{{ $profil->link }}" target="_blank" class="btn btn-outline btn-info rounded-none">Lapor Insiden</a>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- End Hero Section -->