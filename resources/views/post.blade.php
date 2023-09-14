@extends('layouts.main')

@section('container')
    <!-- Post Section -->
    <div class="flex justify-center py-28">
        <div class="container">
            <div class="mx-auto w-11/12 md:w-4/5 lg:w-3/5 text-base md:text-lg">
                <h1 class="text-2xl lg:text-4xl font-bold my-8">{{ $post->title }}</h1>
                <p class="pb-4">By <a href="/posts?author={{ $post->author->username }}"
                        class="underline decoration-primary">{{ $post->author->name }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                <div class="max-h-[400px] pb-4 rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="w-full">
                </div>
                <article class="my-4 overflow-hidden">
                    {!! $post->body !!}
                </article>
                <a href="{{ url()->previous() }}" class="text-xl transition ease-in-out duration-300 hover:text-primary">
                    < Kembali </a>
            </div>
        </div>
    </div>
    <!-- End Post Section -->
@endsection
