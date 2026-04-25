@extends('admin.layouts.app')

@section('title','Roles List')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-gradient-primary text-white">
                        <h5 class="mb-0">Roles List</h5>
                        @can('create role')
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus me-1"></i> Add Role
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
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                    @can('view role')
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                            <span class="badge bg-primary me-1">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                             <div class="d-flex gap-1">
                                            @can('edit role')
                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning me-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('delete role')
                                            <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $role->id }}">
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