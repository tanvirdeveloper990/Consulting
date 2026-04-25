@extends('admin.layouts.app')

@section('title','Profile Setting')

@section('content')

<section class="content py-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Profile Settings</h5>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('admin.profile.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <ul class="mb-3">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       name="name" id="name" value="{{ auth('admin')->user()->name }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" id="email" value="{{ auth('admin')->user()->email }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                       name="phone" id="phone" value="{{ auth('admin')->user()->phone }}" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control p-1 @error('image') is-invalid @enderror" 
                                       name="image" id="image" accept="image/*" value="{{ auth('admin')->user()->image }}">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                @if(auth('admin')->user()->image)
                                <div class="mt-2">
                                    <img id="preview-image" src="{{ Storage::url(auth('admin')->user()->image) }}" 
                                         alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                                </div>
                                @else
                                <div class="mt-2">
                                    <img id="preview-image" src="#" alt="Preview Image" style="display:none; width:120px; height:120px; object-fit:cover; border-radius:8px;">
                                </div>
                                @endif
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-edit me-1"></i> Update
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
    // Preview selected image
    document.getElementById('image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>
@endsection
