@extends('dashboard.layouts.main')

@section('container')
<div>
  <h1>My Posts</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="flex items-center justify-center bg-gray-900 overflow-x-auto p-4">
  <div class="overflow-auto">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create a New Post</a>
    <table class="table text-gray-400 border-separate space-y-6">
      <thead class="table-header">
        <tr>
          <th class="p-3">No.</th>
          <th class="p-3 text-left">Title</th>
          @can ('admin') <th class="p-3 text-left">Author</th> @endcan
          <th class="p-3 text-left">Category</th>
          <th class="p-3 text-left">Status</th>
          <th class="p-3 text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr class="bg-gray-800">
          <td class="p-3">{{ $loop->iteration }} .</td>
          <td class="p-3">{{ $post->title }}</td>
          @can ('admin') <td class="p-3 font-bold">{{ $post->author->name }}</td> @endcan
          <td class="p-3">{{ $post->category->name }}</td>
          <td class="p-3">{{ $post->published ? 'Publish' : 'Unpublish' }}</td>
          <td class="p-3 flex gap-2">
            <a href="/dashboard/posts/{{ $post->slug }}">
              <i class="fa-solid fa-eye"></i>
            </a>
            @can('admin')
            <a href="/dashboard/posts/{{ $post->slug }}/edit">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post">
              @method('delete')
              @csrf
              <button onclick="return confirm('Are you sure?')">
                <i class="fa-solid fa-eraser"></i>
              </button>
            </form>
            @endcan
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- <div class="table-responsive col-md-10 mb-5">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Create">Create a New Post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        @can ('admin') <th scope="col">Author</th> @endcan
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->title }}</td>
        @can ('admin') <td>{{ $post->author->name }}</td> @endcan
        <td>{{ $post->category->name }}</td>
        <td>{{ $post->published ? 'Publish' : 'Unpublish' }}</td>
        <td>
          <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span data-feather="eye"></span></a>
          @can('admin')
          <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span data-feather="edit"></span></a>
          <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span data-feather="x-circle"></span></button>
          </form>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> -->
@endsection