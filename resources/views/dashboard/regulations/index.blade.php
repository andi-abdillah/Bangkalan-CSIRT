@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div id="alert" class="alert alert-success flex justify-between" role="alert">
            <span>
                {{ session('success') }}
            </span>
            <button id="closeBtn" class="btn btn-neutral btn-circle btn-sm">X</button>
        </div>
    @endif

    <section class="mb-8">
        <div class="flex flex-col md:flex-row justify-between mt-4">
            <h1 class="text-2xl font-bold hidden md:inline">Regulations</h1>
            <form action="/dashboard/regulations" class="form-control self-end">
                <div class="input-group">
                    <input type="text" placeholder="Search…" name="searchRegulationsBy"
                        value="{{ request('searchRegulationsBy') }}"
                        class="input bg-neutral transition duration-300 focus:outline-none focus:ring focus:ring-2 focus:ring-sky-600" />
                    <button type="submit" class="btn bg-sky-600 hover:bg-sky-700 btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="divider"></div>
        <a href="/dashboard/regulations/create" class="btn btn-add mb-3">Create a New Regulation
            <span class="material-symbols-rounded">add</span>
        </a>
        <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Regulation Category</th>
                        <th class="p-3 text-left">File Path</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regulations as $key => $regulation)
                        <tr>
                            <td class="p-3">{{ $regulations->firstItem() + $key }}.</td>
                            <td class="p-3">{{ $regulation->name }}</td>
                            <td class="p-3">{{ $regulation->regulationCategory->name }}</td>
                            <td class="p-3">{{ $regulation->path }}</td>
                            <td class="p-3 flex gap-2">
                                <a class="icon-edit tooltip" data-tip="Edit"
                                    href="/dashboard/regulations/{{ $regulation->slug }}/edit">
                                    <span class="material-symbols-rounded">
                                        edit
                                    </span>
                                </a>
                                <form class="tooltip" data-tip="Delete"
                                    action="/dashboard/regulations/{{ $regulation->slug }}" method="post">
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
        <div class="pagination md:justify-end m-6">
            {{ $regulations->links() }}
        </div>
    </section>
@endsection
