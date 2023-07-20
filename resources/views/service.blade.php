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
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga ullam quo veritatis! Dolore debitis iste voluptas architecto unde quisquam, quia itaque aut deserunt, pariatur iure tenetur, obcaecati ipsa. Voluptatem voluptate tenetur cumque, eligendi laboriosam quam fugiat quasi veniam tempore assumenda molestiae quis dolorem recusandae modi, quos dolor illum esse quas facere. Cumque molestias nisi cum odit dicta fugiat itaque aliquam totam laboriosam enim iusto ut debitis quos ratione expedita, eius earum. Impedit dolores autem culpa commodi sunt quaerat magni soluta?
            </article>
        </div>
    </div>
</div>
<!-- End Service Section -->
@endsection