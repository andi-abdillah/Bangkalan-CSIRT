@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">File RFC2350</h1>
  <div class="divider"></div>
  <a href="/dashboard/files/create" class="btn btn-add mb-3">Upload a New File <span class="material-symbols-rounded">add</span></a>
  <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
    <table class="table">
      <thead class="text-white">
        <tr>
          <th class="p-3">No.</th>
          <th class="p-3 text-left">Name</th>
          <th class="p-3 text-left">File Path</th>
          <th class="p-3 text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($files as $file)
        <tr>
          <td class="p-3">{{ $loop->iteration }} .</td>
          <td class="p-3">{{ $file->name }}</td>
          <td class="p-3">{{ $file->path }}</td>
          <td class="p-3 flex gap-2">
            <form class="tooltip" data-tip="Delete" action="/dashboard/files/{{ $file->name }}" method="post">
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