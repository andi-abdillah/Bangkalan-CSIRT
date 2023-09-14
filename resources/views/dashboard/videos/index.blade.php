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
        <h1 class="text-2xl font-bold my-4">Video Profile</h1>
        <div class="divider"></div>
        @if (!$videos->count())
            <a href="/dashboard/videos/create" class="btn btn-add mb-3">Create a New Video
                <span class="material-symbols-rounded">add</span>
            </a>
        @endif
        <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Video</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }}.</td>
                            <td class="p-3">{{ $video->title }}</td>
                            <td class="p-3">
                                <video class="rounded-lg overflow-hidden" width="320" height="240" muted controls>
                                    <source src="{{ asset('storage/' . $video->video) }}" class="w-full">
                                </video>
                            </td>
                            <td class="p-3">{{ $video->show ? 'Show' : 'Hidden' }}</td>
                            <td class="p-3 m-auto">
                                <a class="icon-edit tooltip" data-tip="Edit"
                                    href="/dashboard/videos/{{ $video->slug }}/edit">
                                    <span class="material-symbols-rounded">
                                        edit
                                    </span>
                                </a>
                                <form class="tooltip" data-tip="Delete" action="/dashboard/videos/{{ $video->slug }}"
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
