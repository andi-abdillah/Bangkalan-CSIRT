@extends('layouts.main')

@section('container')

<div class="flex justify-center py-28">
  <div class="container">
    <div class="mx-auto w-11/12 md:w-4/5 lg:w-3/5 text-lg">
      <h1 class="text-2xl lg:text-4xl font-bold my-8">{{ $post->title }}</h1>
      <p class="pb-4">By <a href="/posts?author={{ $post->author->username }}" class="underline decoration-primary">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
      <div class="pb-4" style="max-height: 400px; overflow:hidden">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="w-full">
      </div>
      <article class="my-4">
        {!! $post->body !!}
      </article>
      <a href="/posts" class="text-xl transition ease-in-out duration-300 underline underline-offset-4 hover:decoration-primary">Back to Posts</a>
    </div>
  </div>
</div>
@endsection