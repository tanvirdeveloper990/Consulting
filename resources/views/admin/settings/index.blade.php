@extends('admin.layouts.app')

@section('title', 'Settings Update')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">

        <div class="card shadow-lg border-0 rounded-4 mx-auto mt-3">

            <!-- Header -->
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">
                    <i class="fa fa-cogs me-2"></i> Settings Update
                </h5>
            </div>

            <form id="form" action="{{ route('admin.settings.update', $data->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body px-4 py-4">

                    <div class="row g-3">

                        <!-- Website Name -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Website Name <span
                                    class="text-danger">*</span></label>
                            <input value="{{ $data->company_name }}" type="text" name="company_name"
                                class="form-control @error('company_name') is-invalid @enderror">
                            @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Address One -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Address One</label>
                            <input value="{{ $data->address }}" type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror">
                            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <!-- Address Two -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Address Two</label>
                            <input value="{{ $data->address_2 }}" type="text" name="address_2"
                                class="form-control @error('address_2') is-invalid @enderror">
                            @error('address_2') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <!-- Address Three -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Address Three</label>
                            <input value="{{ $data->address_3 }}" type="text" name="address_3"
                                class="form-control @error('address_3') is-invalid @enderror">
                            @error('address_3') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Phone Number (One)</label>
                            <input value="{{ $data->phone_one }}" type="text" name="phone_one"
                                class="form-control @error('phone_one') is-invalid @enderror">
                            @error('phone_one') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Phone Number (Two)</label>
                            <input value="{{ $data->phone_two }}" type="text" name="phone_two"
                                class="form-control @error('phone_two') is-invalid @enderror">
                            @error('phone_two') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Email One</label>
                            <input value="{{ $data->email_one }}" type="text" name="email_one"
                                class="form-control @error('email_one') is-invalid @enderror">
                            @error('email_one') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Email Two</label>
                            <input value="{{ $data->email_two }}" type="text" name="email_two"
                                class="form-control @error('email_two') is-invalid @enderror">
                            @error('email_two') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- 🟦 SOCIAL LINKS — ALL INDIVIDUALLY ADDED (NO LOOP) -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Facebook</label>
                            <input value="{{ $data->facebook }}" type="text" name="facebook"
                                class="form-control @error('facebook') is-invalid @enderror">
                            @error('facebook') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Twitter</label>
                            <input value="{{ $data->twitter }}" type="text" name="twitter"
                                class="form-control @error('twitter') is-invalid @enderror">
                            @error('twitter') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">LinkedIn</label>
                            <input value="{{ $data->linkedin }}" type="text" name="linkedin"
                                class="form-control @error('linkedin') is-invalid @enderror">
                            @error('linkedin') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">YouTube</label>
                            <input value="{{ $data->youtube }}" type="text" name="youtube"
                                class="form-control @error('youtube') is-invalid @enderror">
                            @error('youtube') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Instagram</label>
                            <input value="{{ $data->instagram }}" type="text" name="instagram"
                                class="form-control @error('instagram') is-invalid @enderror">
                            @error('instagram') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Copyright -->
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Copyright</label>
                            <input value="{{ $data->copyright }}" type="text" name="copyright"
                                class="form-control @error('copyright') is-invalid @enderror">
                            @error('copyright') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Google Maps -->
                        <div class="col-lg-12">
                            <label class="form-label fw-semibold">Google Maps</label>
                            <textarea name="google_maps" class="form-control"
                                rows="3">{!! $data->google_maps !!}</textarea>
                        </div>

                        <hr class="mt-4">

                        <!-- Image Uploads -->
                        @foreach([
                        'header_logo' => 'Header Logo',
                        'footer_logo' => 'Footer Logo',
                        'favicon' => 'Favicon'
                        ] as $key => $label)

                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">{{ $label }}</label>
                            <input type="file" name="{{ $key }}" id="{{ $key }}" class="form-control p-1">

                            <div class="mt-2">
                                <img id="preview-{{ $key }}" src="{{ $data->$key ? Storage::url($data->$key) : '' }}"
                                    width="120" height="120"
                                    style="object-fit: cover; border-radius: 8px; {{ $data->$key ? '' : 'display:none;' }}">
                            </div>
                        </div>

                        @endforeach

                        <hr class="mt-4">

                        <!-- Meta Data -->
                        <div class="col-lg-12">
                            <label class="form-label fw-semibold">Meta Title</label>
                            <input value="{{ $data->meta_title }}" type="text" name="meta_title" class="form-control">
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label fw-semibold">Meta Description</label>
                            <textarea name="meta_description" class="form-control"
                                rows="4">{!! $data->meta_description !!}</textarea>
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label fw-semibold">Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control"
                                rows="4">{!! $data->meta_keyword !!}</textarea>
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label fw-semibold">Meta Image</label>
                            <input type="file" name="meta_image" class="form-control p-1" id="meta_image">
                            <div class="mt-2">
                                <img id="preview-meta_image"
                                    src="{{ $data->meta_image ? Storage::url($data->meta_image) : '' }}" width="120"
                                    height="120"
                                    style="object-fit: cover; border-radius: 8px; {{ $data->meta_image ? '' : 'display:none;' }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Ready to Study Abroad Image</label>
                            <input type="file" name="study_image" class="form-control p-1" id="study_image">
                            <div class="mt-2">
                            @if($data->study_image)
                                <img 
                                    src="{{Storage::url($data->study_image)}}" width="100"height="80">
                             @endif       
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Why Choose US Section Background Image</label>
                            <input type="file" name="choose_us_image" class="form-control p-1" id="choose_us_image">
                            <div class="mt-2">
                            @if($data->choose_us_image)
                                <img 
                                    src="{{Storage::url($data->choose_us_image)}}" width="100"height="80">
                             @endif       
                            </div>
                        </div>

                        <hr class="mt-5 mb-5">

                        {{-- ================= Gallery Single Page LightBox ================= --}}
                        <div class="col-12">
                            <h6 class="fw-bold text-primary mt-4">Gallery Single Page LightBox</h6>
                            <hr>
                        </div>

                        {{-- Students --}}
                        <div class="col-md-6">
                            <label class="form-label">Student Title</label>
                            <input type="text" name="student_title" class="form-control"
                                value="{{ $data->student_title }}" placeholder="e.g. Our Students">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Student Count</label>
                            <input type="text" name="student_count" class="form-control"
                                value="{{ $data->student_count }}" placeholder="e.g. 1200+">
                        </div>

                        {{-- Success --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Success Title</label>
                            <input type="text" name="success_title" class="form-control"
                                value="{{ $data->success_title }}" placeholder="e.g. Success Stories">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Success Count</label>
                            <input type="text" name="success_count" class="form-control"
                                value="{{ $data->success_count }}" placeholder="e.g. 950+">
                        </div>

                        {{-- Partners --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Partner Title</label>
                            <input type="text" name="partner_title" class="form-control"
                                value="{{ $data->partner_title }}" placeholder="e.g. Our Partners">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Partner Count</label>
                            <input type="text" name="partner_count" class="form-control"
                                value="{{ $data->partner_count }}" placeholder="e.g. 45+">
                        </div>

                        {{-- Countries --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Country Title</label>
                            <input type="text" name="country_title" class="form-control"
                                value="{{ $data->country_title }}" placeholder="e.g. Countries">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Country Count</label>
                            <input type="text" name="country_count" class="form-control"
                                value="{{ $data->country_count }}" placeholder="e.g. 30+">
                        </div>


                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-end p-3">
                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                        <i class="fa fa-save me-1"></i> Update Settings
                    </button>
                </div>

            </form>
        </div>

    </div>
</section>
@endsection

@section('script')

<script>
    document.getElementById('header_logo').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-header_logo');
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
<script>
    document.getElementById('footer_logo').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-footer_logo');
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
<script>
    document.getElementById('favicon').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-favicon');
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
<script>
    document.getElementById('meta_image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-meta_image');
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
<script>
    document.getElementById('image1').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image1');
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
    // 2
    document.getElementById('image2').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image2');
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
    // 3
    document.getElementById('image3').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image3');
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
    // 4
    document.getElementById('image4').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image4');
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
    // 5
    document.getElementById('image5').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image5');
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