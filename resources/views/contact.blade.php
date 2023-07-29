@extends('layouts.main')

@section('container')
<!-- Contact Section -->
<div class="flex justify-center py-28">
  <div class="container">
    <h1 class="text-center my-3 text-2xl lg:text-4xl font-bold">Hubungi Kami</h1>
    <article class="flex flex-col gap-2 mx-auto my-3 w-11/12 md:w-10/12 lg:w-3/5 text-xl">
      @foreach ($keys->take(1) as $key)
      @foreach ($footers->take(1) as $footer)
      <p>Lokasi {{ $footer->name }}</p>

      {{ $footer->address }}

      <div class="my-3 overflow-hidden h-80">
        {!! $footer->maps !!}
      </div>

      <p>{{ $footer->name }} dapat dihubungi melalui : </p>
      <p>Email : {{ $footer->email }} (Silahkan gunakan PGP untuk komunikasi e-mail terenkripsi) PGP Key dapat diunduh <a class="underline decoration-primary" href="{{'storage/' .  $key->path }}">di sini</a></p>
      <p>Telephone : {{ $footer->telephone }}</p>
      @endforeach
      @endforeach
    </article>
  </div>
</div>
<!-- End Contact Section -->
@endsection