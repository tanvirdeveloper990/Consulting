@extends('admin.layouts.app')

@section('title','Apply Now')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Apply Now</h5>
                        <a href="{{ route('admin.applied.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.applied.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                </div>

                                <div class="col-md-6">
                                    <label for="education" class="form-label">Education</label>
                                    <select class="form-select" id="education" name="education">
                                        <option value="">Select Education</option>
                                        <option value="SSC">SSC</option>
                                        <option value="HSC">HSC</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Masters">Masters</option>
                                        <option value="PhD">PhD</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="type" class="form-label">Type GPA/CGPA</label>
                                    <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" placeholder="Enter Type">
                                </div>

                                <div class="col-md-6">
                                    <label for="type_passing_year" class="form-label">Type Passing Year</label>
                                    <input type="text" class="form-control" id="type_passing_year" name="type_passing_year" value="{{ old('type_passing_year') }}" placeholder="Enter Type Passing Year">
                                </div>

                                <div class="col-md-6">
                                    <label for="study_destination" class="form-label">Study Destination</label>
                                <select class="form-select" id="study_destination" name="study_destination">
                                        <option value="">Select Destination</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->country}}">{{$country->country}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="english_proficiency" class="form-label">English Proficiency</label>
                                   <select class="form-select"  id="english_proficiency" name="english_proficiency">
                                        <option value="">Select Proficiency</option>
                                        <option value="IELTS">IELTS</option>
                                        <option value="TOEFL">TOEFL</option>
                                        <option value="PTE">PTE</option>
                                        <option value="DUOLINGO">DUOLINGO</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="overall_score" class="form-label">Overall Score</label>
                                    <input type="text" class="form-control" id="overall_score" name="overall_score" value="{{ old('overall_score') }}" placeholder="Enter Overall Score">
                                </div>
                                <div class="col-md-6">
                                    <label for="score" class="form-label">Low Band Score</label>
                                    <input type="text" class="form-control" id="score" name="score" value="{{ old('score') }}" placeholder="Enter Overall Score">
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 mt-3 text-end">
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
