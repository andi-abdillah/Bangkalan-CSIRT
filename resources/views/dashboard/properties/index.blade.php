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
        <h1 class="text-2xl font-bold my-4">Image Property</h1>
        <div class="divider"></div>
        <a href="/dashboard/properties/create" class="btn btn-add mb-3">Create a New Property <span
                class="material-symbols-rounded">add</span></a>
        <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3 text-left">Property</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Image</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }}.</td>
                            <td class="p-3">{{ $property->property }}</td>
                            <td class="p-3">{{ $property->name }}</td>
                            <td class="p-3">
                                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}"
                                    class="w-32 rounded-lg">
                            </td>
                            <td class="p-3 flex gap-2">
                                <a class="icon-edit tooltip" data-tip="Edit"
                                    href="/dashboard/properties/{{ $property->slug }}/edit">
                                    <span class="material-symbols-rounded">
                                        edit
                                    </span>
                                </a>
                                <form class="tooltip" data-tip="Delete" action="/dashboard/properties/{{ $property->slug }}"
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
