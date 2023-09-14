@extends('layouts.main')

@section('container')
    <!-- Guidance Section -->
    <div class="flex justify-center pt-28">
        <div class="container">
            <h1 class="text-center text-2xl lg:text-4xl font-bold my-8">Panduan Penangan Insiden Siber</h1>
            <article class="mt-12 w-11/12 lg:w-2/3 mx-auto">
                <ul class="list-none">
                    @foreach ($guidances as $key => $guidance)
                        <div class="divider -my-2"></div>
                        <li
                            class="flex justify-between items-center gap-8 px-4 md:px-8 py-3 transition ease-in-out duration-300 hover:text-black hover:scale-[1.05] hover:bg-info sm:rounded-full">
                            <div class="flex gap-1">
                                <span>{{ $guidances->firstItem() + $key }}.</span>
                                <span>{{ $guidance->name }}</span>
                            </div>
                            <a class="text-black bg-accent-focus px-4 py-2 rounded-full"
                                href="{{ 'storage/' . $guidance->path }}" target="_blank">Lihat</a>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-12">
                    <div class="my-6">
                        Menampilkan
                        {{ $guidances->firstItem() }}
                        hingga
                        {{ $guidances->lastItem() }}
                        dari
                        {{ $guidances->total() }}
                        item tersedia
                    </div>
                    <div class="pagination">
                        {{ $guidances->links() }}
                    </div>
                </div>
            </article>
        </div>
    </div>
    <!-- End Guidance Section -->
@endsection
