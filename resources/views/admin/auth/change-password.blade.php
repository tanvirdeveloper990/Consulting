@extends('admin.layouts.app')

@section('title','Update Password')

@section('content')

<section class="content py-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Update Password</h5>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('admin.change.password.update') }}" method="POST">
                            @csrf
                            @method('PUT')


                            @if ($errors->any())
                            <ul class="mb-3">
                                @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" required>
                                @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password" required>
                                @error('new_password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password"
                                    class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                    name="new_password_confirmation" required>
                                @error('new_password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>





                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-edit me-1"></i> Update
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection