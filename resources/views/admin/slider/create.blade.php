@extends('admin.layouts.app')

@section('title','Add Slider')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Slider</h5>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.sliders.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="description" class="form-label">Title One</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ old('title') }}" placeholder="Enter Slider Title One" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="description_2" class="form-label">Title Two</label>
                                    <input type="text" class="form-control" id="description_2" name="description_2"
                                        value="{{ old('description_2') }}" placeholder="Enter Slider Title Two" required>
                                </div>

                                 <div class="col-md-4">
                                    <label for="title" class="form-label">Badge Text</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}" placeholder="Enter Slider Badge">
                                </div>

                                <div class="col-md-8">
                                    <label for="text" class="form-label">Description</label>
                                    <textarea class="form-control" id="text" name="text" rows="2" placeholder="write something here..."></textarea>
                                </div>
                
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
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