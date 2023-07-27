@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8 mb-4">
  <h1 class="text-2xl font-bold my-4">Post Category</h1>
  <div class="divider"></div>
  <a href="/dashboard/categories/create" class="btn btn-add mb-3">Create a New Category <span class="material-symbols-rounded">add</span></a>
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
        @foreach ($categories as $category)
        <tr>
          <td class="p-3">{{ $loop->iteration }} .</td>
          <td class="p-3 w-full">{{ $category->name }}</td>
          <td class="p-3 flex gap-2">
            <a class="icon-edit tooltip" data-tip="Edit" href="/dashboard/categories/{{ $category->slug }}/edit">
              <span class="material-symbols-rounded">
                edit
              </span>
            </a>
            <form class="tooltip" data-tip="Delete" action="/dashboard/categories/{{ $category->slug }}" method="post">
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



  <!-- <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td class="text-center">
          <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span data-feather="edit"></span></a>
          <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table> -->
</div>
@endsection