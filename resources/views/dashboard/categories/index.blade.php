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
        <h1 class="text-2xl font-bold my-4">Post Category</h1>
        <div class="divider"></div>
        <a href="/dashboard/categories/create" class="btn btn-add mb-3">Create a New Category <span
                class="material-symbols-rounded">add</span></a>
        <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3 text-left">Category Name</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = ($categories->currentpage()-1)* $categories->perpage() + 1;@endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td class="p-3">{{ $i }} .</td>
                            <td class="p-3 w-full">{{ $category->name }}</td>
                            <td class="p-3 flex gap-2">
                                <a class="icon-edit tooltip" data-tip="Edit"
                                    href="/dashboard/categories/{{ $category->slug }}/edit">
                                    <span class="material-symbols-rounded">
                                        edit
                                    </span>
                                </a>
                                <form class="tooltip" data-tip="Delete" action="/dashboard/categories/{{ $category->slug }}"
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
                        @php  $i += 1; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination md:justify-end m-6">
            {{ $categories->links() }}
        </div>
    </section>
@endsection
