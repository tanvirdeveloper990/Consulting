@extends('admin.layouts.app')

@section('title','Update My Choose Us')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update My Choose Us</h5>
                        <a href="{{ route('admin.my-choose.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.my-choose.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Serial -->
                                <div class="col-lg-6">
                                    <label>Serial <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="count"
                                           class="form-control"
                                           value="{{ old('count', $data->count) }}">
                                    @error('count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Title -->
                                <div class="col-lg-6">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           value="{{ old('title', $data->title) }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-lg-12">
                                    <label>Description</label>
                                    <textarea name="description"
                                              class="form-control"
                                              rows="4">{{ old('description', $data->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                 <div class="col-md-6">
                                    <label for="icon" class="form-label">Icon</label>
                                    <input type="file" class="form-control" id="icon" name="icon" value="{{ old('icon') }}">
                                    @if($data->icon)
                                    <img class="mt-2" src="{{Storage::url($data->icon)}}" alt="empty" style="width: 100px;">
                                    @endif
                                </div>

                                <!-- Status -->
                                <div class="col-lg-6">
                                    <label>Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="text-end mt-4">
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
