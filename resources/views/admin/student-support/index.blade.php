@extends('admin.layouts.app')

@section('title','Update Student Support')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Student Support</h5>
                        <a href="{{ route('admin.student_support.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.student_support.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                {{-- ================= Personalized ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary">Personalized Support</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Title"
                                        name="personalized_title"
                                        value="{{ old('personalized_title', $data->personalized_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="2" placeholder="Description"
                                        name="personalized_description">{{ old('personalized_description', $data->personalized_description) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="form-control" name="personalized_icon">
                                    @if($data->personalized_icon)
                                    <img src="{{ Storage::url($data->personalized_icon) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="personalized_image">
                                    @if($data->personalized_image)
                                    <img src="{{ Storage::url($data->personalized_image) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                {{-- ================= University ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary">University Selection</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Title"
                                        name="university_title"
                                        value="{{ old('university_title', $data->university_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="2" placeholder="Description"
                                        name="university_description">{{ old('university_description', $data->university_description) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="form-control" placeholder="Icon class"
                                        name="university_icon">
                                    @if($data->university_icon)
                                    <img src="{{ Storage::url($data->university_icon) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="university_image">
                                    @if($data->university_image)
                                    <img src="{{ Storage::url($data->university_image) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                {{-- ================= Admission ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary">Admission Guidance</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Title"
                                        name="admission_title"
                                        value="{{ old('admission_title', $data->admission_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="2" placeholder="Description"
                                        name="admission_description">{{ old('admission_description', $data->admission_description) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="form-control" name="admission_icon">
                                    @if($data->admission_icon)
                                    <img src="{{ Storage::url($data->admission_icon) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="admission_image">
                                    @if($data->admission_image)
                                    <img src="{{ Storage::url($data->admission_image) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>
                                
                                {{-- ================= Admission One ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary">Documentation support</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Title"
                                        name="admission_title1"
                                        value="{{ old('admission_title1', $data->admission_title1) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="2" placeholder="Description"
                                        name="admission_description1">{{ old('admission_description1', $data->admission_description1) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="form-control" name="admission_icon1">
                                    @if($data->admission_icon1)
                                    <img src="{{ Storage::url($data->admission_icon1) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="admission_image1">
                                    @if($data->admission_image1)
                                    <img src="{{ Storage::url($data->admission_image1) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>


                                {{-- ================= Financial ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary">Financial Assistance</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Title"
                                        name="financial_title"
                                        value="{{ old('financial_title', $data->financial_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="2" placeholder="Description"
                                        name="financial_description">{{ old('financial_description', $data->financial_description) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="form-control" name="financial_icon">
                                    @if($data->financial_icon)
                                    <img src="{{ Storage::url($data->financial_icon) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="financial_image">
                                    @if($data->financial_image)
                                    <img src="{{ Storage::url($data->financial_image) }}" class="mt-2" width="80">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                {{-- ================= Visa ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary">Visa Support</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Title"
                                        name="visa_title"
                                        value="{{ old('visa_title', $data->visa_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="2" placeholder="Description"
                                        name="visa_description">{{ old('visa_description', $data->visa_description) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="form-control" name="visa_icon">
                                    @if($data->visa_icon)
                                    <img src="{{ Storage::url($data->visa_icon) }}" class="mt-2" width="80">
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="visa_image">
                                    @if($data->visa_image)
                                    <img src="{{ Storage::url($data->visa_image) }}" class="mt-2" width="80">
                                    @endif
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