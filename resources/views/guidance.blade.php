@extends('layouts.main')

@section('container')
    <!-- Guidance Section -->
    <div class="flex justify-center py-28">
        <div class="container">
            <h1 class="text-center text-2xl lg:text-4xl font-bold my-8">Panduan Penangan Insiden Siber</h1>
            <article class="overflow-x-auto w-11/12 lg:w-4/5 mx-auto">
                <table class="table table-zebra">
                    <thead class="bg-base-300 font-bold text-base">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guidances as $key => $guidance)
                            <tr class="lg:text-xl">
                                <th>{{ $guidances->firstItem() + $key }}</th>
                                <td><a class="transition ease-in-out duration-300 underline underline-offset-4 hover:decoration-primary"
                                        href="{{ 'storage/' . $guidance->path }}" target="_blank">{{ $guidance->name }}</a>
                                </td>
                                <td>{{ number_format(round($guidance->size / 1024, 2), 2, ',', '.') }} Kb</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <div class="mt-5">
                        Showing
                        {{ $guidances->firstItem() }}
                        to
                        {{ $guidances->lastItem() }}
                        of
                        {{ $guidances->total() }}
                        enteries
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
