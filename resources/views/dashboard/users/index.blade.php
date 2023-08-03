@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <section class="mb-4">
        <h1 class="text-2xl font-bold my-4">User Management</h1>
        <div class="divider"></div>
        <a href="/register" class="btn btn-add mb-3">Create A New Account <span
                class="material-symbols-rounded">person_add</span></a>
        <div class="p-4 bg-neutral/70 rounded-[20px] overflow-x-auto">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Username</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Admin</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }} .</td>
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->username }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">
                                @if ($user->is_admin)
                                    Admin
                                @else
                                    User
                                @endif
                            </td>
                            <td class="p-3 flex gap-2">
                                <a class="icon-edit tooltip" data-tip="Edit"
                                    href="/dashboard/users/{{ $user->username }}/edit">
                                    <span class="material-symbols-rounded">
                                        edit
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
