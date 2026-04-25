@extends('admin.layouts.app')

@section('title','Update User')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update User</h5>
                        @can('view user')
                        <a href="{{ route('admin.users.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                        value="{{ old('name', $user->name ?? '') }}" placeholder="Enter full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                        value="{{ old('email', $user->email ?? '') }}" placeholder="Enter email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" 
                                        value="{{ old('phone', $user->phone ?? '') }}" placeholder="Enter phone number" 
                                        required minlength="10" maxlength="15" pattern="\d+">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password <span class="text-black-50">(Optional)</span></label>
                                    <input type="password" class="form-control" id="password" name="password" 
                                        placeholder="Leave blank to keep current password">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirmPassword" class="form-label">Confirm Password <span class="text-black-50">(Optional)</span></label>
                                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" 
                                        placeholder="Retype password">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Roles <span class="text-danger">*</span></label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                    name="roles[]" value="{{ $role->name }}"
                                                    id="role-{{ $role->id }}"
                                                    {{ isset($userRoles) && in_array($role->name, $userRoles) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="role-{{ $role->id }}">
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-edit me-1"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
