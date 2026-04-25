@extends('admin.layouts.app')

@section('title','Update We Are')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update We are Advanced Study Solutions</h5>
                        <a href="{{ route('admin.advanced-study.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.advanced-study.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-12 mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                    @if($data->image)
                                    <img class="mt-2" src="{{Storage::url($data->image)}}" alt="empty" style="width: 80px;">
                                    @endif
                                </div>

                                <hr>

                                <!-- Application -->

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Application Title</label>
                                        <input type="text" class="form-control" name="application_title"
                                            value="{{ old('application_title', $data->application_title) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Application Count</label>
                                        <input type="text" class="form-control" name="application_count"
                                            value="{{ old('application_count', $data->application_count) }}">
                                    </div>

                                 

                                </div>
                                <!-- Experience -->

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Experience Title</label>
                                        <input type="text" class="form-control" name="experience_title"
                                            value="{{ old('experience_title', $data->experience_title) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Experience Count</label>
                                        <input type="text" class="form-control" name="experience_count"
                                            value="{{ old('experience_count', $data->experience_count) }}">
                                    </div>

                                    
                                </div>

                                <!-- Satisfied -->

                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Satisfied Title</label>
                                        <input type="text" class="form-control" name="satisfied_title"
                                            value="{{ old('satisfied_title', $data->satisfied_title) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Satisfied Count</label>
                                        <input type="text" class="form-control" name="satisfied_count"
                                            value="{{ old('satisfied_count', $data->satisfied_count) }}">
                                    </div>

                
                                </div>


                                <!-- University -->

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">University Title</label>
                                        <input type="text" class="form-control" name="university_title"
                                            value="{{ old('university_title', $data->university_title) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">University Count</label>
                                        <input type="text" class="form-control" name="university_count"
                                            value="{{ old('university_count', $data->university_count) }}">
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