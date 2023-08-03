@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <section class="mb-4">
        <h1 class="text-2xl font-bold my-4">File Panduan</h1>
        <div class="divider"></div>
        <a href="/dashboard/guidances/create" class="btn btn-add mb-3">Upload a New File <span
                class="material-symbols-rounded">add</span></a>

        <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Size</th>
                        <th class="p-3 text-left">File Path</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guidances as $guidance)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }} .</td>
                            <td class="p-3">{{ $guidance->name }}</td>
                            <td class="p-3">{{ number_format(round($guidance->size / 1024, 2), 2, ',', '.') }} Kb</td>
                            <td class="p-3">{{ $guidance->path }}</td>
                            <td class="p-3 flex gap-2">
                                <a class="icon-edit tooltip" data-tip="Edit"
                                    href="/dashboard/guidances/{{ $guidance->slug }}/edit">
                                    <span class="material-symbols-rounded">
                                        edit
                                    </span>
                                </a>
                                <form class="tooltip" data-tip="Delete" action="/dashboard/guidances/{{ $guidance->slug }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="icon-delete" onclick="return confirm('Are you sure?')">
                                        <span class="material-symbols-rounded">
                                            delete
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
