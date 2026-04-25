@extends('admin.layouts.app')

@section('title','Update Gallery Category')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Gallery Category</h5>
                        <a href="{{ route('admin.category-gallery.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category-gallery.update', $team->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label class="form-label"> Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter category name"
                                        value="{{ old('name', $team->name) }}">
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="">Select status</option>
                                        <option value="1" {{ old('status', $team->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $team->status) == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Update
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