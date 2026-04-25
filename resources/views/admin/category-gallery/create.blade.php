@extends('admin.layouts.app')

@section('title','Add Gallery Category')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-8 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Gallery Category</h5>
                        <a href="{{ route('admin.category-gallery.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.category-gallery.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter Category name"
                                        value="{{ old('name') }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="">Select status</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Submit
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