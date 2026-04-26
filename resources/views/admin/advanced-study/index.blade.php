@extends('admin.layouts.app')

@section('title','Update About US')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update About US</h5>
                        <a href="{{ route('admin.advanced-study.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.advanced-study.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                             <div class="col-md-6">
                                <label class="form-label">Title One</label>
                                <input type="text" class="form-control" name="title_1"
                                    value="{{ old('title_1', $data->title_1) }}">
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Title Two</label>
                                <input type="text" class="form-control" name="title_2"
                                    value="{{ old('title_2', $data->title_2) }}">
                            </div>

                             <div class="col-md-8">
                                <label class="form-label">Description</label>
                                <textarea class="summernote" name="description" id="description" cols="3" rows="3">{!! $data->description !!}</textarea>
                            </div>

                                <div class="col-md-4">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                    @if($data->image)
                                    <img class="mt-2" src="{{Storage::url($data->image)}}" alt="empty" style="width:300px;">
                                    @endif
                                </div>

                                <hr>

                                <!-- Application -->

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Country Title</label>
                                        <input type="text" class="form-control" name="application_title"
                                            value="{{ old('application_title', $data->application_title) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Country Count</label>
                                        <input type="text" class="form-control" name="application_count"
                                            value="{{ old('application_count', $data->application_count) }}">
                                    </div>

                                <div class="col-md-4">
                                    <label for="application_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="application_image" name="application_image" value="{{ old('application_image') }}">
                                    @if($data->application_image)
                                    <img class="mt-2" src="{{Storage::url($data->application_image)}}" alt="empty" style="width: 80px;">
                                    @endif
                                </div>

                                 

                                </div>
                                <!-- Experience -->

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Students Title</label>
                                        <input type="text" class="form-control" name="experience_title"
                                            value="{{ old('experience_title', $data->experience_title) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Students Count</label>
                                        <input type="text" class="form-control" name="experience_count"
                                            value="{{ old('experience_count', $data->experience_count) }}">
                                    </div>

                                <div class="col-md-4">
                                    <label for="experience_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="experience_image" name="experience_image" value="{{ old('experience_image') }}">
                                    @if($data->experience_image)
                                    <img class="mt-2" src="{{Storage::url($data->experience_image)}}" alt="empty" style="width: 80px;">
                                    @endif
                                </div>

                                    
                                </div>

                                <!-- Satisfied -->

                                <div class="row mt-3">

                                    <div class="col-md-4">
                                        <label class="form-label">Years Experience Title</label>
                                        <input type="text" class="form-control" name="satisfied_title"
                                            value="{{ old('satisfied_title', $data->satisfied_title) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Years Experience Count</label>
                                        <input type="text" class="form-control" name="satisfied_count"
                                            value="{{ old('satisfied_count', $data->satisfied_count) }}">
                                    </div>

                                <div class="col-md-4">
                                    <label for="satisfied_image" class="form-label"> Image</label>
                                    <input type="file" class="form-control" id="satisfied_image" name="satisfied_image" value="{{ old('satisfied_image') }}">
                                    @if($data->satisfied_image)
                                    <img class="mt-2" src="{{Storage::url($data->satisfied_image)}}" alt="empty" style="width: 80px;">
                                    @endif
                                </div>

                
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