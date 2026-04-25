@extends('admin.layouts.app')

@section('title','Add Country')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-10 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Country</h5>
                        <a href="{{ route('admin.country.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.country.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row g-3">
                                <!-- Country -->
                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                                        placeholder="Enter your country" value="{{ old('country')}}" required>
                                    @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="flag" class="form-label">Flag</label>
                                    <input type="file" class="form-control" id="flag" name="flag" value="{{ old('flag') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="0">Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>


                            </div>

                            <div class="col-12 mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Submit
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