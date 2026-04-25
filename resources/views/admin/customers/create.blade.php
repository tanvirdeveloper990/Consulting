@extends('admin.layouts.app')

@section('title','Add Customer')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add New Customer</h5>

                        @can('view user')
                        <a href="{{ route('admin.users.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                        @endcan
                    </div>

                    <div class="card-body">

                        <form id="form" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.customers.store') }}">

                            @csrf

                            <div class="row g-3">

                                <!-- name -->
                                <div class="col-md-6">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                    @error('name') <p class="text-danger small">{{ $message }}</p> @enderror
                                </div>

                                <!-- honesty -->
                                <div class="col-md-6">
                                    <label class="form-label">Honesty</label>
                                    <input type="text" name="honesty" class="form-control" value="{{ old('honesty') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Municipality</label>
                                    <input type="text" name="municipality" class="form-control"
                                        value="{{ old('municipality') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">ID Number</label>
                                    <input type="text" name="id_number" class="form-control"
                                        value="{{ old('id_number') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Sex</label>
                                    <input type="text" name="sex" class="form-control" value="{{ old('sex') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nationality</label>
                                    <input type="text" name="nationality" class="form-control"
                                        value="{{ old('nationality') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Health Certificate Number</label>
                                    <input type="text" name="health_certificate_number" class="form-control"
                                        value="{{ old('health_certificate_number') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Profession</label>
                                    <input type="text" name="profession" class="form-control"
                                        value="{{ old('profession') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Issuance Date (Hijri)</label>
                                    <input type="text" name="date_of_issuance_of_the_health_certificate_hijri_calendar"
                                        class="form-control"
                                        value="{{ old('date_of_issuance_of_the_health_certificate_hijri_calendar') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Issuance Date (Gregorian)</label>
                                    <input type="text"
                                        name="date_of_issuance_of_the_health_certificate_gregorian_calendar"
                                        class="form-control"
                                        value="{{ old('date_of_issuance_of_the_health_certificate_gregorian_calendar') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Expiry Date (Hijri)</label>
                                    <input type="text" name="health_certificate_expiry_date_hijri_calendar"
                                        class="form-control"
                                        value="{{ old('health_certificate_expiry_date_hijri_calendar') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Expiry Date (Gregorian)</label>
                                    <input type="text" name="health_certificate_expiry_date_gregorian_calendar"
                                        class="form-control"
                                        value="{{ old('health_certificate_expiry_date_gregorian_calendar') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Educational Program Type</label>
                                    <input type="text" name="type_of_educational_program" class="form-control"
                                        value="{{ old('type_of_educational_program') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Educational Program End Date</label>
                                    <input type="text" name="educational_program_end_date" class="form-control"
                                        value="{{ old('educational_program_end_date') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">License Number</label>
                                    <input type="text" name="license_number" class="form-control"
                                        value="{{ old('license_number') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Establishment Name</label>
                                    <input type="text" name="name_of_establishment" class="form-control"
                                        value="{{ old('name_of_establishment') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Establishment Number</label>
                                    <input type="text" name="establishment_number" class="form-control"
                                        value="{{ old('establishment_number') }}">
                                </div>


                                <!-- image -->
                                <div class="col-md-6">
                                    <label class="form-label">Image</label>

                                    <input type="file" name="image" class="form-control" id="imageInput"
                                        accept="image/*">

                                    @error('image')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror

                                    <!-- Preview image -->
                                    <img id="imagePreview"
                                        src="{{ isset($user) && $user->image ? asset('uploads/users/'.$user->image) : '#' }}"
                                        class="mt-2 d-none"
                                        style="width: 120px; height:120px; object-fit:cover; border-radius:8px; border:1px solid #ddd;">
                                </div>


                            </div>

                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Submit
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
    document.getElementById('imageInput').addEventListener('change', function (event) {
    let preview = document.getElementById('imagePreview');
    let file = event.target.files[0];

    if (file) {
        let reader = new FileReader();
        preview.classList.remove('d-none');

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
});
</script>

@endsection