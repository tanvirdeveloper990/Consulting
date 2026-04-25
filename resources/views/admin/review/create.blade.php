@extends('admin.layouts.app')

@section('title','Add Review Stories')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Review Stories</h5>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.reviews.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                               {{-- Type --}}
                                <div class="col-md-6">
                                    <label class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="">Select Type</option>
                                        <option value="Success Stories">Success Stories</option>
                                        <option value="Veryfied Stories">Veryfied Stories</option>
                                    </select>
                                </div>

                                {{-- Image / Text --}}
                                <div class="col-md-6" id="imageField">
                                    <label class="form-label" id="imageLabel">Image / Video</label>
                                    <input type="file" name="image" class="form-control" id="imageInput">
                                </div>



                                {{-- Title --}}
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                           value="{{ old('title') }}" placeholder="Enter Title">
                                </div>

                                {{-- Subtitle --}}
                                <div class="col-md-6">
                                    <label class="form-label">Subtitle/Address</label>
                                    <input type="text" name="subtitle" class="form-control"
                                           value="{{ old('subtitle') }}" placeholder="Enter Subtitle">
                                </div>

                                {{-- Date --}}
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{ old('date') }}">
                                </div>

                                {{-- Star --}}
                                <div class="col-md-6">
                                    <label class="form-label">Star Rating</label>
                                    <select name="star" class="form-select">
                                        <option value="0">Select Rating</option>
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    </select>
                                </div>

                                {{-- Text --}}
                                <div class="col-md-6">
                                    <label class="form-label">Review Text</label>
                                    <textarea name="text" rows="3" class="form-control"
                                              placeholder="Enter Review Details">{{ old('text') }}</textarea>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mt-4 text-end">
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

@section('script')
<script>
    document.getElementById('type').addEventListener('change', function () {
        const imageField = document.getElementById('imageField');
        const imageInput = document.getElementById('imageInput');
        const imageLabel = document.getElementById('imageLabel');

        if (this.value === 'Success Stories') {
            imageLabel.innerText = 'YouTube Video Link';
            imageInput.type = 'text';
            imageInput.name = 'image';
            imageInput.placeholder = 'Enter link here';
        } 
        else if (this.value === 'Veryfied Stories') {
            imageLabel.innerText = 'Image';
            imageInput.type = 'file';
            imageInput.name = 'image';
        } 
        else {
            imageLabel.innerText = 'Image';
            imageInput.type = 'file';
        }
    });
</script>
@endsection

