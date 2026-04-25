@extends('admin.layouts.app')

@section('title', 'Edit Message')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Message</h5>
                        <a href="{{ route('admin.message.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="quickForm" method="POST" action="{{ route('admin.message.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Title -->
                                <div class="col-md-2">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $data->title) }}" placeholder="Enter Title">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Name -->
                                <div class="col-md-5">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $data->name) }}" placeholder="Enter Founder's Name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Designation -->
                                <div class="col-md-5">
                                    <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="designation" name="designation"
                                        value="{{ old('designation', $data->designation) }}" placeholder="Enter Designation">
                                    @error('designation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="summernote form-control" id="description" name="description" rows="4" 
                                        placeholder="Write Description...">{{ old('description', $data->description) }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Current Image Preview -->
                                @if($data->image)
                                <div class="col-md-12">
                                    <label class="form-label">Current Image</label>
                                    <div>
                                        <img src="{{ Storage::url($data->image) }}" alt="Current Image" 
                                            class="img-thumbnail" style="max-width: 200px; max-height: 150px;">
                                    </div>
                                </div>
                                @endif

                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image @if($data->image)<small class="text-muted">(Leave empty to keep current image)</small>@endif</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1" {{ old('status', $data->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $data->status) == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-3 text-end">
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