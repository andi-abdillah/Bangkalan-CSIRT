@extends('dashboard.layouts.main')

@section('container')
    <section class="flex flex-col justify-center mb-8">
        <h1 class="text-2xl text-center lg:text-3xl max-w-3xl mx-auto my-3">{{ $post->title }}</h1>
        <div class="flex justify-center gap-2">
            <a href="/dashboard/posts" class="btn btn-back">
                <span class="material-symbols-rounded">
                    arrow_back
                </span>
                Back
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-edit">
                <span class="material-symbols-rounded">
                    edit_note
                </span>
                Edit
            </a>
            @can('admin')
                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-delete" onclick="return confirm('Are you sure?')">
                        <span class="material-symbols-rounded">
                            delete
                        </span>
                        Delete
                    </button>
                </form>
            @endcan
        </div>
        <div class="max-w-xl my-3 rounded-[20px] overflow-hidden mx-auto">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="w-full">
        </div>
        <article class="max-w-[20rem] md:max-w-2xl lg:max-w-3xl mx-auto my-3 overflow-hidden">
            {!! $post->body !!}
        </article>
    </section>
@endsection
