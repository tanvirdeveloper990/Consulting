@extends('admin.layouts.app')

@section('title','Update Country')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-10 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Country</h5>
                        <a href="{{ route('admin.country.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.country.update',$data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Country -->
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                        placeholder="Enter your Title" value="{{$data->title}}">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea
                                        name="description"
                                        id="description"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Write something here...">{{$data->description}}</textarea>
                                </div>

                                <!-- Country -->
                                <div class="col-md-6">
                                    <label class="form-label">Country Name</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                                        placeholder="Enter your country" value="{{$data->country}}" required>
                                    @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Flag -->
                                <div class="col-md-6">
                                    <label class="form-label">Country Flag</label>
                                    <input type="file" class="form-control" name="flag">
                                    @if($data->flag)
                                    <img src="{{ Storage::url($data->flag) }}" class="mt-2" style="height:50px;">
                                    @endif
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-6">
                                    <label class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail">
                                    @if($data->thumbnail)
                                    <img src="{{ Storage::url($data->thumbnail) }}" class="mt-2" style="height:50px;">
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