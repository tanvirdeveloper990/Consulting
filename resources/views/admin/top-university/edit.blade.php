@extends('admin.layouts.app')

@section('title','Update Top-Rated University')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Top-Rated University</h5>
                        <a href="{{ route('admin.top-university.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.top-university.update',$data->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                 <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <select class="form-select" name="country_id"  required>
                                        <option value="">Select countries...</option>
                                        @foreach($countries as $item)
                                        <option value="{{$item->id}}" {{$data->country_id ==$item->id ? 'selected' : ''}}>{{$item->country}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{ old('title',$data->title) }}" required>
                                </div>

                                <!-- Description / Address -->
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="description"
                                           value="{{ old('description',$data->description) }}" required>
                                </div>

                                <!-- Image -->
                                <div class="col-md-6">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image">
                                    @if($data->image)
                                        <img src="{{ Storage::url($data->image) }}" class="mt-2" style="height:80px;">
                                    @endif
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Deactive</option>
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
