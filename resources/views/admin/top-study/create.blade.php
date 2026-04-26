@extends('admin.layouts.app')

@section('title','Add Satisfaction Stories')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Satisfaction Stories</h5>
                        <a href="{{ route('admin.stories-satisfaction.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.stories-satisfaction.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                {{-- Name --}}
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter Name">
                                </div>

                                {{-- Designation --}}
                                <div class="col-md-6">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation"
                                        value="{{ old('designation') }}" placeholder="Enter Designation">
                                </div>

                                {{-- Title 1 --}}
                                <div class="col-md-6">
                                    <label for="title_1" class="form-label">Title 1</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1"
                                        value="{{ old('title_1') }}" placeholder="Enter Title 1">
                                </div>

                                {{-- Title 2 --}}
                                <div class="col-md-6">
                                    <label for="title_2" class="form-label">Title 2</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2"
                                        value="{{ old('title_2') }}" placeholder="Enter Title 2">
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="4" placeholder="Enter Description">{{ old('description') }}</textarea>
                                </div>

                                {{-- Image --}}
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <div class="mt-2" id="image-preview-wrap" style="display:none;">
                                        <img id="image-preview" src="#" alt="Preview"
                                            style="height:80px; border-radius:8px; object-fit:cover; border:1px solid #dee2e6;">
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Submit
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

@section('js')
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('image-preview-wrap').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection