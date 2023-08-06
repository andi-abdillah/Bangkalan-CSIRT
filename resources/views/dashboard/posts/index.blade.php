@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success flex" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <section class="mb-4">
        <h1 class="text-2xl font-bold my-4">My Posts</h1>
        <div class="divider"></div>
        <a href="/dashboard/posts/create" class="btn btn-add mb-3">Create a New Post <span
                class="material-symbols-rounded">add</span></a>
        <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3 text-left">Title</th>
                        @can('admin')
                            <th class="p-3 text-left">Author</th>
                        @endcan
                        <th class="p-3 text-left">Category</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }} .</td>
                            <td class="p-3">{{ $post->title }}</td>
                            @can('admin')
                                <td class="p-3 font-bold">{{ $post->author->name }}</td>
                            @endcan
                            <td class="p-3">{{ $post->category->name }}</td>
                            <td class="p-3">{{ $post->published ? 'Publish' : 'Unpublish' }}</td>
                            <td class="p-3 flex gap-2">
                                <a class="icon-show tooltip" data-tip="Show" href="/dashboard/posts/{{ $post->slug }}">
                                    <span class="material-symbols-rounded">
                                        visibility
                                    </span>
                                </a>
                                <a class="icon-edit tooltip" data-tip="Edit"
                                    href="/dashboard/posts/{{ $post->slug }}/edit">
                                    <span class="material-symbols-rounded">
                                        edit
                                    </span>
                                </a>
                                @can('admin')
                                    <form class="tooltip" data-tip="Delete" action="/dashboard/posts/{{ $post->slug }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="icon-delete" onclick="return confirm('Are you sure?')">
                                            <span class="material-symbols-rounded">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
