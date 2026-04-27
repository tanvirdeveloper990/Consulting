@extends('admin.layouts.app')
@section('title', 'Settings Update')

@section('content')
<section class="py-4 bg-light min-vh-100">
    <div class="container-lg">
        <div class="card border-0 shadow-sm rounded-4 mx-auto mt-2">

            {{-- Header --}}
            <div class="card-header bg-white border-bottom px-4 py-3 rounded-top-4">
                <h5 class="mb-0 fw-bold" style="color:#0A474C;">
                    <i class="fa fa-cogs me-2"></i> Settings Update
                </h5>
            </div>

            <form action="{{ route('admin.settings.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body px-4 py-4">

                    {{-- ── Section: General Info ── --}}
                    <div class="section-label">
                        <i class="fa fa-globe me-2"></i> General Information
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Website Name <span class="text-danger">*</span></label>
                            <input value="{{ $data->company_name }}" type="text" name="company_name"
                                class="form-control @error('company_name') is-invalid @enderror">
                            @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Copyright</label>
                            <input value="{{ $data->copyright }}" type="text" name="copyright"
                                class="form-control @error('copyright') is-invalid @enderror">
                            @error('copyright') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    {{-- ── Section: Address ── --}}
                    <div class="section-label">
                        <i class="fa fa-map-marker-alt me-2"></i> Address
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">Address One</label>
                            <input value="{{ $data->address }}" type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror">
                            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">Address Two</label>
                            <input value="{{ $data->address_2 }}" type="text" name="address_2"
                                class="form-control @error('address_2') is-invalid @enderror">
                            @error('address_2') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">Address Three</label>
                            <input value="{{ $data->address_3 }}" type="text" name="address_3"
                                class="form-control @error('address_3') is-invalid @enderror">
                            @error('address_3') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Google Maps Embed</label>
                            <textarea name="google_maps" class="form-control" rows="3">{!! $data->google_maps !!}</textarea>
                        </div>
                    </div>

                    {{-- ── Section: Contact ── --}}
                    <div class="section-label">
                        <i class="fa fa-phone me-2"></i> Contact Information
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">Phone One</label>
                            <input value="{{ $data->phone_one }}" type="text" name="phone_one"
                                class="form-control @error('phone_one') is-invalid @enderror">
                            @error('phone_one') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">Phone Two</label>
                            <input value="{{ $data->phone_two }}" type="text" name="phone_two"
                                class="form-control @error('phone_two') is-invalid @enderror">
                            @error('phone_two') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">Email One</label>
                            <input value="{{ $data->email_one }}" type="text" name="email_one"
                                class="form-control @error('email_one') is-invalid @enderror">
                            @error('email_one') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">Email Two</label>
                            <input value="{{ $data->email_two }}" type="text" name="email_two"
                                class="form-control @error('email_two') is-invalid @enderror">
                            @error('email_two') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    {{-- ── Section: Social Links ── --}}
                    <div class="section-label">
                        <i class="fa fa-share-alt me-2"></i> Social Media Links
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">
                                <i class="fab fa-facebook text-primary me-1"></i> Facebook
                            </label>
                            <input value="{{ $data->facebook }}" type="text" name="facebook"
                                class="form-control @error('facebook') is-invalid @enderror"
                                placeholder="https://facebook.com/...">
                            @error('facebook') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">
                                <i class="fab fa-twitter text-info me-1"></i> Twitter
                            </label>
                            <input value="{{ $data->twitter }}" type="text" name="twitter"
                                class="form-control @error('twitter') is-invalid @enderror"
                                placeholder="https://twitter.com/...">
                            @error('twitter') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">
                                <i class="fab fa-linkedin text-primary me-1"></i> LinkedIn
                            </label>
                            <input value="{{ $data->linkedin }}" type="text" name="linkedin"
                                class="form-control @error('linkedin') is-invalid @enderror"
                                placeholder="https://linkedin.com/...">
                            @error('linkedin') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">
                                <i class="fab fa-youtube text-danger me-1"></i> YouTube
                            </label>
                            <input value="{{ $data->youtube }}" type="text" name="youtube"
                                class="form-control @error('youtube') is-invalid @enderror"
                                placeholder="https://youtube.com/...">
                            @error('youtube') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">
                                <i class="fab fa-instagram text-danger me-1"></i> Instagram
                            </label>
                            <input value="{{ $data->instagram }}" type="text" name="instagram"
                                class="form-control @error('instagram') is-invalid @enderror"
                                placeholder="https://instagram.com/...">
                            @error('instagram') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    {{-- ── Section: Logos ── --}}
                    <div class="section-label">
                        <i class="fa fa-image me-2"></i> Logo & Favicon
                    </div>
                    <div class="row g-3 mb-4">
                        @foreach(['header_logo' => 'Header Logo', 'footer_logo' => 'Footer Logo', 'favicon' => 'Favicon'] as $key => $label)
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">{{ $label }}</label>
                            <input type="file" name="{{ $key }}" id="{{ $key }}" class="form-control p-1">
                            @if($data->$key)
                            <div class="mt-2 p-2 border rounded-3 bg-white d-inline-block">
                                <img id="preview-{{ $key }}"
                                     src="{{ Storage::url($data->$key) }}"
                                     width="80" height="80"
                                     style="object-fit:contain; border-radius:6px;">
                            </div>
                            @else
                            <img id="preview-{{ $key }}" src="" width="80" height="80"
                                 style="display:none; object-fit:contain; border-radius:6px; margin-top:8px;">
                            @endif
                        </div>
                        @endforeach
                    </div>

                    {{-- ── Section: Section Images ── --}}
                    <div class="section-label">
                        <i class="fa fa-images me-2"></i> Section Background Images
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Services Section Image</label>
                            <input type="file" name="study_image" class="form-control p-1" id="study_image">
                            @if($data->study_image)
                            <div class="mt-2 p-2 border rounded-3 bg-white d-inline-block">
                                <img src="{{ Storage::url($data->study_image) }}" width="100" height="70"
                                     style="object-fit:cover; border-radius:6px;">
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Why Choose Us Background Image</label>
                            <input type="file" name="choose_us_image" class="form-control p-1" id="choose_us_image">
                            @if($data->choose_us_image)
                            <div class="mt-2 p-2 border rounded-3 bg-white d-inline-block">
                                <img src="{{ Storage::url($data->choose_us_image) }}" width="100" height="70"
                                     style="object-fit:cover; border-radius:6px;">
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- ── Section: SEO / Meta ── --}}
                    <div class="section-label">
                        <i class="fa fa-search me-2"></i> SEO & Meta Data
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Meta Title</label>
                            <input value="{{ $data->meta_title }}" type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="4">{!! $data->meta_description !!}</textarea>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-semibold">Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control" rows="4">{!! $data->meta_keyword !!}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Meta Image</label>
                            <input type="file" name="meta_image" class="form-control p-1" id="meta_image">
                            @if($data->meta_image)
                            <div class="mt-2 p-2 border rounded-3 bg-white d-inline-block">
                                <img id="preview-meta_image"
                                     src="{{ Storage::url($data->meta_image) }}"
                                     width="120" height="80"
                                     style="object-fit:cover; border-radius:6px;">
                            </div>
                            @else
                            <img id="preview-meta_image" src="" width="120" height="80"
                                 style="display:none; object-fit:cover; border-radius:6px; margin-top:8px;">
                            @endif
                        </div>
                    </div>

                    {{-- ── Section: Gallery Stats ── --}}
                    {{--<div class="section-label">
                        <i class="fa fa-chart-bar me-2"></i> Gallery Single Page — Stats
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Student Title</label>
                            <input type="text" name="student_title" class="form-control"
                                value="{{ $data->student_title }}" placeholder="e.g. Our Students">
                        </div>
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Student Count</label>
                            <input type="text" name="student_count" class="form-control"
                                value="{{ $data->student_count }}" placeholder="e.g. 1200+">
                        </div>
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Success Title</label>
                            <input type="text" name="success_title" class="form-control"
                                value="{{ $data->success_title }}" placeholder="e.g. Success Stories">
                        </div>
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Success Count</label>
                            <input type="text" name="success_count" class="form-control"
                                value="{{ $data->success_count }}" placeholder="e.g. 950+">
                        </div>
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Partner Title</label>
                            <input type="text" name="partner_title" class="form-control"
                                value="{{ $data->partner_title }}" placeholder="e.g. Our Partners">
                        </div>
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Partner Count</label>
                            <input type="text" name="partner_count" class="form-control"
                                value="{{ $data->partner_count }}" placeholder="e.g. 45+">
                        </div>
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Country Title</label>
                            <input type="text" name="country_title" class="form-control"
                                value="{{ $data->country_title }}" placeholder="e.g. Countries">
                        </div>
                        <div class="col-lg-3 col-6">
                            <label class="form-label fw-semibold">Country Count</label>
                            <input type="text" name="country_count" class="form-control"
                                value="{{ $data->country_count }}" placeholder="e.g. 30+">
                        </div>
                    </div>--}}

                </div>{{-- card-body --}}

                <div class="card-footer bg-white border-top d-flex justify-content-end px-4 py-3 rounded-bottom-4">
                    <button type="submit" class="btn px-5 py-2 fw-semibold text-white rounded-3"
                            style="background:#0A474C;">
                        <i class="fa fa-save me-2"></i> Update Settings
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

<style>
.section-label {
    font-size: .7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: #0A474C;
    background: rgba(10,71,76,0.07);
    border-left: 3px solid #0A474C;
    padding: 6px 12px;
    border-radius: 0 6px 6px 0;
    margin-bottom: 1rem;
    margin-top: .5rem;
}
.form-control:focus { border-color: #0A474C; box-shadow: 0 0 0 .2rem rgba(10,71,76,.15); }
</style>
@endsection

@section('script')
<script>
['header_logo','footer_logo','favicon','meta_image'].forEach(function(id) {
    var el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('change', function(e) {
        var preview = document.getElementById('preview-' + id);
        var file = e.target.files[0];
        if (file && preview) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else if (preview) {
            preview.style.display = 'none';
        }
    });
});
</script>
@endsection