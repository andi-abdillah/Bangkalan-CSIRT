@extends('layouts.main')

@section('container')
    <!-- Profil Section -->
    <div class="flex justify-center py-28">
        <div class="container flex justify-center">
            <div class="w-10/12 lg:w-3/5">
                @foreach ($profils->take(1) as $profil)
                    <h1 class="text-2xl lg:text-4xl font-bold my-8">Profil {{ $profil->name }}</h1>
                @endforeach
                <article>
                    @foreach ($profils->take(1) as $profil)
                        {!! $profil->content !!}
                    @endforeach
                </article>
            </div>
        </div>
    </div>
    <!-- End Profil Section -->
@endsection
