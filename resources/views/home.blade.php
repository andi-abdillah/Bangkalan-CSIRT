@extends('layouts.main')

@section('container')
<!-- Blog Section -->
<section class="bg-base-100 py-20" id="blog">
    <div class="container mx-auto">
        <div class="text-center pb-4">
            <h1 class="text-2xl lg:text-4xl">Latest Post</h1>
        </div>

        @if ($posts->count())
        <div class="flex flex-wrap justify-evenly gap-2">
            @php
            $lastPost = $posts->last();
            @endphp
            @foreach ($posts->take(6) as $post)
            <div class="flex flex-wrap lg:flex-row justify-center m-6">
                <div class="flex items-center justify-center lg:justify-start w-full lg:w-1/2">
                    <div id="laptop-container" class="w-[310px] h-[180px] md:w-[500px] md:h-[350px] lg:w-[34rem] lg:h-[21rem]">
                        <img class="child-img w-[210px] h-[145px] md:w-[410px] md:h-[280px] lg:w-[25rem] lg:h-[17rem] mt-3 md:mt-6 lg:mt-6 rounded md:rounded-xl lg:rounded-xl" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" />
                    </div>
                </div>
                <div class="flex flex-col gap-3 items-center lg:items-start lg:justify-center w-full lg:w-1/2 text-center lg:text-start">
                    <a class="underline text-xl md:text-2xl lg:text-2xl font-bold transition ease-in-out duration-300 hover:decoration-primary" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    <h2 class="text-xl md:text-2xl lg:text-2xl">{{ $post->title }}</h2>
                    <p>
                        By <a class="underline decoration-primary" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> at <span>{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                    </p>
                    <p class="w-11/12 md:w-4/5 lg:w-full">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-outline btn-secondary">Read More
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            @if ($post != $lastPost)
            <hr class="w-screen h-1 mx-auto bg-gradient-to-r from-base-100 to-base-200 border-0 rounded">
            @endif
            @endforeach
        </div>

        @else
        <p class="text-center">No Post Found</p>
        @endif

    </div>
</section>
<!-- End Blog Section -->
@endsection