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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum beatae, itaque officiis assumenda atque praesentium voluptas aperiam voluptatum aspernatur repudiandae distinctio accusamus officia maxime explicabo aliquam obcaecati consectetur, accusantium porro a voluptatibus optio blanditiis vel ad. Dignissimos reprehenderit fugit minus odit nisi quo illum mollitia, consequatur error libero harum excepturi architecto inventore minima exercitationem obcaecati eaque quas explicabo adipisci deleniti id, officiis temporibus dolorem vitae. Nesciunt quas, fugit quis enim corrupti distinctio magnam consequuntur a impedit! Tempore placeat similique exercitationem voluptate deleniti autem non. Veniam soluta eum ratione earum ex sunt, repudiandae, asperiores expedita dolores iusto est architecto ab reprehenderit nam sint rem cupiditate dolore. Laboriosam autem mollitia ducimus tenetur impedit corporis minima officia, soluta blanditiis vitae veritatis atque voluptates rem cupiditate vero. Labore illum distinctio libero quam minima voluptatum, error aliquam! Qui quia est nulla ullam. Quibusdam dignissimos est voluptates dicta doloribus fugiat suscipit cum deserunt ex. Voluptates, a!
            </article>
        </div>
    </div>
</div>
<!-- End Profil Section -->
@endsection