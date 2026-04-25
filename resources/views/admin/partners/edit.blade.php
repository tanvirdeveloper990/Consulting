@extends('admin.layouts.app')

@section('title','Update Our Partners')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-9 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Our Partners</h5>
                        <a href="{{ route('admin.our-partners.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.our-partners.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                    @if($data->image)
                                    <img class="mt-2" src="{{Storage::url($data->image)}}" alt="empty" style="width: 100px;">
                                    @else
                                    <img src="{{Storage::url($data->image)}}" alt="empty" style="width: 100px; display:none">
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label for="title" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
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