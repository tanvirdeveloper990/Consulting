@extends('admin.layouts.app')

@section('title','Add Role')

@section('content')

<section class="content pt-5">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add New Role</h5>
                        @can('view role')
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.roles.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" placeholder="Enter role name" required>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><strong>Permissions</strong> <span class="text-black-50">(Optional)</span></label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="select-all-permissions">
                                        <label class="form-check-label" for="select-all-permissions">
                                            Select All Permissions
                                        </label>
                                    </div>
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                       id="permission_{{ $permission->id }}" name="permissions[]"
                                                       value="{{ $permission->name }}">
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ ucwords(str_replace('-', ' ', $permission->name)) }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-1"></i> Save
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

@section('script')
<script>
    // Select/Deselect all permissions
    $('#select-all-permissions').on('change', function() {
        $('.permission-checkbox').prop('checked', this.checked);
    });
</script>
@endsection