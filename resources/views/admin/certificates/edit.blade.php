@extends('admin.layouts.app')

@section('title','Update Certificates')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Certificates</h5>
                        <a href="{{ route('admin.certificates.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.certificates.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="form-group col-lg-6">
                                    <label for="title">Title </label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ old('title',$data->title) }}" placeholder="Enter Title Number">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="subtitle">Country Text </label>
                                    <input type="text" id="subtitle" name="subtitle" class="form-control"
                                        value="{{ old('subtitle',$data->subtitle) }}" placeholder="Enter Country Text">
                                    @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="text">Year Text </label>
                                    <input type="text" id="text" name="text" class="form-control"
                                        value="{{ old('text',$data->text) }}" placeholder="Enter Year Text">
                                    @error('text')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="approved">Approved</label>
                                    <input type="approved" id="approved" name="approved" class="form-control"
                                        value="{{$data->approved}}" placeholder="Enter Certificate Aproved ">
                                    @error('approved')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="image">Certificate Image</label>
                                    <input type="file" id="image" name="image" class="form-control"
                                        value="{{ old('image') }}">
                                    @if($data->image)
                                    <img class="mt-2" src="{{Storage::url($data->image)}}" alt="empty" style="width: 100px;">
                                    @endif
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="">Select Option</option>
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
