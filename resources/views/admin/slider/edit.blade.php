@extends('admin.layouts.app')

@section('title','Update Slider')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Slider</h5>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.sliders.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title',$data->title) }}" placeholder="Enter Slider Title" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="description" class="form-label">Description One</label>
                                     <textarea class="form-control" id="description" name="description" rows="2"> {!!$data->description!!}</textarea>
                                </div>


                                <div class="col-md-6">
                                    <label for="description_2" class="form-label">Description Two</label>
                                     <textarea class="form-control" id="description_2" name="description_2" rows="2"> {!!$data->description_2!!}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                    @if($data->image)
                                    <img class="mt-2" src="{{Storage::url($data->image)}}" alt="empty" style="width: 100px;" >
                                    @else
                                     <img src="{{Storage::url($data->image)}}" alt="empty" style="width: 100px; display:none" >
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="0">Select Option</option>
                                        <option value="1" {{$data->status ==1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$data->status ==0 ? 'selected' : ''}}>Deactive</option>
                                    </select>
                                </div>


                            </div>

                            <div class="col-12 mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Update
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