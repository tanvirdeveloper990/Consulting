@extends('admin.layouts.app')

@section('title','Update University Admission')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-10 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update University Admission</h5>
                        <a href="{{ route('admin.university-admission.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.university-admission.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label for="text" class="form-label">Message</label>
                                    <textarea name="text" id="text" class="summernote form-control @error('text') is-invalid @enderror" placeholder="Write something here.." rows="3">{{ old('text', $data->text) }}</textarea>
                                    @error('text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- <div class="col-md-6">
                                    <label for="icon" class="form-label">Icon</label>
                                    <input type="file" id="icon" name="icon" class="form-control @error('icon') is-invalid @enderror" accept="image/*" onchange="previewImage(event, 'iconPreview')">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($data->icon)
                                        <img id="iconPreview" src="{{ Storage::url($data->icon) }}" class="mt-2" style="max-width: 100px;">
                                    @else
                                        <img id="iconPreview" class="mt-2" style="max-width: 100px; display: none;">
                                    @endif
                                </div> -->

                                <div class="mb-3 col-md-6">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option value="">-- Select Type --</option>
                                        <option value="University Admission" {{$data->type == 'University Admission' ? 'selected' : ''}}>University Admission</option>
                                        <option value="Work Permit" {{$data->type == 'Work Permit' ? 'selected' : ''}}>Work Permit</option>
                                        <option value="Language Program" {{$data->type == 'Language Program' ? 'selected' : ''}}>Language Program</option>
                                        <option value="Others" {{$data->type == 'Others' ? 'selected' : ''}}>Others</option>
                                    </select>
                                    @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                        <option value="1" {{ old('status', $data->status) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $data->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-12 mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Image Preview Function
    function previewImage(event, previewId) {
        const preview = document.getElementById(previewId);
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection