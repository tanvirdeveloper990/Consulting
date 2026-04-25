@extends('admin.layouts.app')

@section('title','Update Frequently Asked Questions')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-9 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Frequently Asked Questions</h5>
                        <a href="{{ route('admin.frequently-asked.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.frequently-asked.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Title -->
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $data->title) }}" placeholder="Enter Questions Title" required>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter Questions Description" rows="4" required>{{ old('description', $data->description) }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="col-md-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="">Select Option</option>
                                        <option value="1" {{ old('status', $data->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $data->status) == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mt-3 text-end">
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
