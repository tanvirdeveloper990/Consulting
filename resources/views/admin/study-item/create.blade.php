@extends('admin.layouts.app')

@section('title','Add Study Item')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Study Item</h5>
                        <a href="{{ route('admin.study-item.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.study-item.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                           <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Study</label>
                                    <select class="form-select" name="study_id"  required>
                                        <option value="">Select country...</option>
                                        @foreach($study as $item)
                                        <option value="{{$item->id}}">{{$item->country_id}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}" placeholder="Enter Slider Title" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3"></textarea>
                                </div>

                                
                                <div class="col-md-6">
                                    <label for="icon" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="icon" name="icon" value="{{ old('icon') }}">
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