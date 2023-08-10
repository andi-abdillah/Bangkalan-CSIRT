@extends('dashboard.layouts.main')

@section('container')
    <section class="-mt-28 rounded-b-[25px] backdrop-blur-md bg-gradient-to-t from-neutral/90 to-base-100">
        <div class="hero w-5/6 h-96 translate-y-32 mx-auto rounded-[25px] overflow-hidden"
            style="background-image: url(https://daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.jpg);">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="text-center text-neutral-content">
                <div class="max-w-md">
                    <h1 class="mb-5 text-2xl md:text-4xl font-bold">Welcome back, {{ auth()->user()->name }}</h1>
                    <a href="/dashboard/posts" class="btn btn-add rounded-[13px]">Create Something
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
