@extends('layouts.main')

@section('container')
    <!-- Regulations Section -->
    <div class="container mx-auto pt-28 text-center">
        <h1 class="m-3 text-2xl lg:text-4xl font-bold capitalize">{{ $title }}</h1>
        <div class="flex justify-center my-8">
            <form action="/regulations" class="w-80 lg:w-96 font-bold">
                <input type="hidden" name="regulationCategory" value="{{ request('regulationCategory') }}">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 pl-10 pr-20 text-base bg-neutral transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-primary rounded-[12px]"
                        name="search" value="{{ request('search') }}" placeholder="Cari Peraturan Kebijakan...">
                    <button type="submit"
                        class="absolute right-0 top-0 btn btn-primary px-5 h-full rounded-l-none rounded-r-[12px]">Cari
                    </button>
                </div>
            </form>
        </div>
        <div class="dropdown">
            <button tabindex="0" class="btn btn-neutral m-1 w-64 capitalize">
                <span>
                    @if (!$selectedCategory)
                        Pilih Kategori
                    @else
                        {{ Str::limit($selectedCategory, 17) }}
                    @endif
                </span>
                <span class="material-symbols-rounded">
                    arrow_drop_down
                </span>
            </button>
            <ul tabindex="0"
                class="dropdown-content z-10 ml-1 mt-1 menu p-2 shadow-xl bg-neutral rounded-box w-64 capitalize">
                @if ($selectedCategory)
                    <li><a href="/regulations">Seluruh Peraturan Kebijakan</a></li>
                @endif
                @foreach ($regulationCategories as $regulationCategory)
                    @if (!$selectedCategory || $selectedCategory !== $regulationCategory->name)
                        <li class="w-60 rounded overflow-hidden"><a
                                href="/regulations?regulationCategory={{ $regulationCategory->slug }}">{{ $regulationCategory->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        @if ($regulations->count())
            <div class="overflow-x-auto md:overflow-visible w-11/12 lg:w-4/5 mx-auto my-12">
                <table class="table" style="font-family: 'Overpass Mono', monospace;">
                    <thead class="bg-base-200 font-bold text-base">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regulations as $key => $regulation)
                            <tr
                                class="lg:text-lg transition ease-in-out duration-300 bg-neutral/30 md:hover:scale-[1.05] hover:bg-neutral">
                                <td>{{ $regulations->firstItem() + $key }}.</td>
                                <td>
                                    <a class="transition ease-in-out duration-300 hover:underline underline-offset-4 decoration-primary"
                                        href="{{ 'storage/' . $regulation->path }}" target="_blank">
                                        {{ $regulation->name }}
                                    </a>
                                </td>
                                <td>{{ $regulation->regulationCategory->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <div class="my-8 text-start">
                        Menampilkan
                        {{ $regulations->firstItem() }}
                        hingga
                        {{ $regulations->lastItem() }}
                        dari
                        {{ $regulations->total() }}
                        item tersedia
                    </div>
                    <div class="pagination">
                        {{ $regulations->links() }}
                    </div>
                </div>
            </div>
        @else
            <p class="text-center my-24">Peraturan Kebijakan Tidak Ditemukan</p>
        @endif
    </div>
    <!-- End Regulations Section -->
@endsection
