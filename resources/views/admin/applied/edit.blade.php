@extends('admin.layouts.app')

@section('title','Update Apply')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Apply</h5>
                        <a href="{{ route('admin.applied.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.applied.update', $data->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           value="{{ old('name', $data->name) }}">
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control"
                                           name="phone"
                                           value="{{ old('phone', $data->phone) }}">
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control"
                                           name="email"
                                           value="{{ old('email', $data->email) }}">
                                </div>

                                <!-- Education -->
                                <div class="col-md-6">
                                    <label class="form-label">Education</label>
                                    <select class="form-select" name="education">
                                        <option value="">Select Education</option>
                                        @foreach(['SSC','HSC','Diploma','Bachelor','Masters','PhD'] as $edu)
                                            <option value="{{ $edu }}"
                                                {{ old('education', $data->education) == $edu ? 'selected' : '' }}>
                                                {{ $edu }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- GPA / CGPA -->
                                <div class="col-md-6">
                                    <label class="form-label">Type GPA/CGPA</label>
                                    <input type="text" class="form-control"
                                           name="type"
                                           value="{{ old('type', $data->type) }}">
                                </div>

                                <!-- Passing Year -->
                                <div class="col-md-6">
                                    <label class="form-label">Passing Year</label>
                                    <input type="text" class="form-control"
                                           name="type_passing_year"
                                           value="{{ old('type_passing_year', $data->type_passing_year) }}">
                                </div>

                                <!-- Study Destination -->
                                <div class="col-md-6">
                                    <label class="form-label">Study Destination</label>
                                    <select class="form-select" name="study_destination">
                                        <option value="">Select Destination</option>
                                         @foreach($countries as $country)
                                        <option value="{{$country->country}}"{{$data->study_destination ==$country->country ? 'selected' : ''}}>{{$country->country}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- English Proficiency -->
                                <div class="col-md-6">
                                    <label class="form-label">English Proficiency</label>
                                    <select class="form-select" name="english_proficiency">
                                        <option value="">Select Proficiency</option>
                                        @foreach(['IELTS','TOEFL','PTE','DUOLINGO'] as $eng)
                                            <option value="{{ $eng }}"
                                                {{ old('english_proficiency', $data->english_proficiency) == $eng ? 'selected' : '' }}>
                                                {{ $eng }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Overall Score -->
                                <div class="col-md-6">
                                    <label class="form-label">Overall Score</label>
                                    <input type="text" class="form-control"
                                           name="overall_score"
                                           value="{{ old('overall_score', $data->overall_score) }}">
                                </div>


                                 <div class="col-md-6">
                                    <label for="score" class="form-label">Low Band Score</label>
                                    <input type="text" class="form-control" id="score" name="score" value="{{ old('score',$data->score) }}" placeholder="Enter Overall Score">
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="1" {{ old('status', $data->status) == 1 ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="0" {{ old('status', $data->status) == 0 ? 'selected' : '' }}>
                                            Deactive
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="mt-4 text-end">
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

@endsection
