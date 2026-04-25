@extends('admin.layouts.app')

@section('title','Update Category')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-10 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Category</h5>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.category.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">


                             <!-- Name -->
                            <div class="form-group col-lg-6">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control"
                                       value="{{ old('name', $data->name) }}" placeholder="Enter Category Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Slug -->
                            <div class="form-group col-lg-6">
                                <label for="slug">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" readonly
                                       value="{{ old('slug', $data->slug) }}">
                                @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                    @if($data->image)
                                    <img class="mt-2" src="{{Storage::url($data->image)}}" alt="empty" style="width: 100px;">
                                    @else
                                    <img src="{{Storage::url($data->image)}}" alt="empty" style="width: 100px; display:none">
                                    @endif
                                </div>

                                <div class="col-md-6">
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

@section('script')
<script>
    $(document).ready(function() {

        function generateSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[\s\_]+/g, '-') 
                .replace(/[^\w\-]+/g, '') 
                .replace(/\-\-+/g, '-');  
        }

        // Auto slug on typing
        $('#name').on('keyup', function () {
            $('#slug').val(generateSlug($(this).val()));
        });

    });
</script>
@endsection