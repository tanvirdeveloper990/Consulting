@extends('admin.layouts.app')

@section('title','User List')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Users List</h5>
                        @can('create user')
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus me-1"></i> Add User
                        </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    @can('view user')
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ?? 'N/A' }}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                            <span class="badge bg-info me-1">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($user->status == 1)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                @can('view user')
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                @endcan
                                                @can('edit user')
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                @endcan
                                                @can('delete user')
                                                

                                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $user->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @endcan
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
