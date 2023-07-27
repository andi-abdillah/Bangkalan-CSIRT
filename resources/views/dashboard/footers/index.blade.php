@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<section class="mb-4">
  <h1 class="text-2xl font-bold my-4">Post Footer</h1>
  <div class="divider"></div>
  <a href="/dashboard/footers/create" class="btn btn-add mb-3">Create a New Footer <span class="material-symbols-rounded">add</span></a>
  <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
    <table class="table">
      <thead class="text-white">
        <tr>
          <th class="p-3">No.</th>
          <th class="p-3 text-left">Name</th>
          <th class="p-3 text-left">Address</th>
          <th class="p-3 text-left">Maps</th>
          <th class="p-3 text-left">Telephone</th>
          <th class="p-3 text-left">Email</th>
          <th class="p-3 text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($footers as $footer)
        <tr>
          <td class="p-3">{{ $loop->iteration }} .</td>
          <td class="p-3">{{ $footer->name }}</td>
          <td class="p-3">{{ $footer->address }}</td>
          <td class="p-3 max-w-[150px] lg:max-w-[250px] text-ellipsis overflow-hidden">{{ $footer->maps }}</td>
          <td class="p-3">{{ $footer->telephone }}</td>
          <td class="p-3">{{ $footer->email }}</td>
          <td class="p-3 flex gap-2">
            <a class="icon-edit tooltip" data-tip="Edit" href="/dashboard/footers/{{ $footer->slug}}/edit">
              <span class="material-symbols-rounded">
                edit
              </span>
            </a>
            <form class="tooltip" data-tip="Delete" action="/dashboard/footers/{{ $footer->slug }}" method="post">
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