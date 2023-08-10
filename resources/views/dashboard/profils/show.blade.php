@extends('dashboard.layouts.main')

@section('container')
    <section class="flex flex-col gap-3 mb-8">
        <h1 class="text-2xl lg:text-3xl">{{ $profil->name }}</h1>
        <div class="flex gap-2">
            <a href="/dashboard/profils" class="btn btn-back">
                <span class="material-symbols-rounded">
                    arrow_back
                </span>
                Back
            </a>
            <a href="/dashboard/profils/{{ $profil->slug }}/edit" class="btn btn-edit">
                <span class="material-symbols-rounded">
                    edit_note
                </span>
                Edit
            </a>
            <form action="/dashboard/profils/{{ $profil->slug }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-delete" onclick="return confirm('Are you sure?')">
                    <span class="material-symbols-rounded">
                        delete
                    </span>
                    Delete
                </button>
            </form>
        </div>
        <article class="lg:text-xl">
            {!! $profil->content !!}
        </article>
    </section>
@endsection
