@extends('layouts.main')

@section('container')
    <!-- Service Section -->
    <div class="flex justify-center py-28">
        <div class="container flex justify-center">
            <div class="w-10/12 lg:w-3/5">
                @foreach ($profils->take(1) as $profil)
                    <h1 class="text-2xl lg:text-4xl font-bold my-8">Layanan {{ $profil->name }}</h1>
                @endforeach
                <article>
                    @foreach ($services->take(1) as $service)
                        {!! $service->content !!}
                    @endforeach
                </article>
            </div>
        </div>
    </div>
    <!-- End Service Section -->
@endsection
