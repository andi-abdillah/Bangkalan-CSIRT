@extends('layouts.main')

@section('container')
    <!-- Posts Section -->
    <div class="container mx-auto pt-28 text-center">
        <h1 class="my-3 text-2xl lg:text-4xl font-bold capitalize">{{ $title }}</h1>
        <div class="flex justify-center my-8">
            <form action="/posts" class="w-80 lg:w-96 font-bold">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 pl-10 pr-24 text-lg bg-neutral transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-primary rounded-[12px]"
                        name="search" value="{{ request('search') }}" placeholder="Search...">
                    <button type="submit"
                        class="absolute right-0 top-0 btn btn-primary h-full rounded-l-none rounded-r-[12px]">Search
                    </button>
                </div>
            </form>
        </div>

        <div class="dropdown mt-6">
            <button tabindex="0" class="btn btn-neutral m-1 w-64 capitalize">
                <span id="myElement">
                    @if (empty(request()->query('category')))
                        Select Category
                    @else
                        {{ str_replace('-', ' ', request()->query('category')) }}
                    @endif
                </span>
                <span class="material-symbols-rounded">
                    arrow_drop_down
                </span>
            </button>
            <ul tabindex="0"
                class="dropdown-content z-10 ml-1 mt-1 menu p-2 shadow-xl bg-neutral rounded-box w-64 capitalize">
                @if (!empty(request()->query('category')))
                    <li><a href="/posts">All Posts</a></li>
                @endif
                @foreach ($categories as $category)
                    @if (empty(request()->query('category')) || request()->query('category') !== $category->slug)
                        <li><a href="/posts?category={{ $category->slug }}">{{ $category->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>


        @if ($posts->count())
            <div class="flex flex-wrap lg:flex-row justify-center mx-3 md:mx-4 my-12">
                <div class="flex items-center justify-center lg:justify-start w-full lg:w-1/2">
                    <div id="laptop-container"
                        class="w-[22rem] h-[14rem] md:w-[30rem] md:h-[19rem] lg:w-[34rem] lg:h-[21rem]">
                        <img class="child-img w-[16.5rem] h-[11rem] md:w-[22.5rem] md:h-[15rem] lg:w-[25rem] lg:h-[17rem] mt-4 md:mt-5 lg:mt-6 rounded md:rounded-xl"
                            src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" />
                    </div>
                </div>
                <div
                    class="flex flex-col gap-3 items-center lg:items-start lg:justify-center w-full lg:w-1/2 text-center lg:text-start">
                    <a class="underline text-xl md:text-2xl font-bold transition ease-in-out duration-300 hover:decoration-primary"
                        href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                    <h2 class="text-xl md:text-2xl">{{ $posts[0]->title }}</h2>
                    <p>
                        By <a class="underline decoration-primary"
                            href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> at
                        <span>{{ date('F d, Y', strtotime($posts[0]->created_at)) }}</span>
                    </p>
                    <p class="w-11/12 md:w-4/5 lg:w-full">{{ $posts[0]->excerpt }}</p>
                    <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-outline btn-secondary">Read More
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @else
            <p class="text-center my-24">No Post Found</p>
        @endif
        @if ($posts->skip(1)->count())
            <hr class="w-full h-1 mx-auto mb-24 bg-gradient-to-r from-base-100 to-base-200 border-0 rounded">
            <div class="flex flex-wrap justify-evenly gap-2 my-12">
                @foreach ($posts->skip(1) as $post)
                    <div class="group card mt-5 mb-16 w-72 lg:w-80 bg-neutral/50 shadow-xl">
                        <div id="laptop-container"
                            class="transition duration-500 ease-in-out -translate-y-12 -translate-x-8 lg:-translate-x-10 group-hover:-translate-y-32 w-[22rem] h-[14rem] lg:w-[25rem] lg:h-[16rem] z-20">
                            <img class="child-img w-[16.5rem] h-[11rem] lg:w-[19rem] lg:h-[13rem] mt-4 rounded md:rounded-xl"
                                src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" />
                        </div>
                        <div class="card-body -mt-[9.7rem] px-4 items-center text-center">
                            <a href="/posts/{{ $post->slug }}" class="btn btn-outline btn-secondary mb-2">Read
                                More
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                            <a class="underline text-base md:text-xl font-bold transition ease-in-out duration-300 hover:decoration-primary"
                                href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}
                            </a>
                            <h2 class="text-base md:text-lg font-bold">{{ $post->title }}</h2>
                            <p>
                                By <a class="underline decoration-primary"
                                    href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}
                                </a>
                                at <span>{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                            </p>
                            <div class="divider my-0"></div>
                            <p class="w-11/12 md:w-4/5 lg:w-full">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>
    <!-- End Posts Section -->
    <script nonce="{{ csp_nonce() }}" type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            let element = document.getElementById('myElement');
            let maxLength = 25;
            let text = element.innerHTML.trim();
            let truncatedText = text.length > maxLength ? text.substr(0, maxLength) + '...' : text;
            element.innerHTML = truncatedText;

            const elements = document.querySelectorAll('.dropdown-content li a');
            elements.forEach(function(element) {
                let text = element.textContent.trim();
                let truncatedText = text.length > maxLength ? text.substr(0, maxLength) + '...' : text;
                element.textContent = truncatedText;
            });
        })
    </script>

@endsection
