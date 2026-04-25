@extends('admin.layouts.app')

@section('title','Add Join Our Team')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Join Our Team</h5>
                        <a href="{{ route('admin.teams.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.teams.store') }}"  enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="fname" class="form-control"
                                        placeholder="Enter first name"
                                        value="{{ old('fname') }}">
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="lname" class="form-control"
                                        placeholder="Enter last name"
                                        value="{{ old('lname') }}">
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter email address"
                                        value="{{ old('email') }}">
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter phone number"
                                        value="{{ old('phone') }}">
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Position</label>
                                    <select id="position" name="position" class="form-select" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200">
                                        <option value="">Select a position</option>
                                        <option value="Education Counselor">Education Counselor</option>
                                        <option value="Visa Processing Officer">Visa Processing Officer</option>
                                        <option value="Marketing Executive">Marketing Executive</option>
                                        <option value="Office Administrator">Office Administrator</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Years of Experience</label>
                                    <select id="years_of_experience" name="years_of_experience" class="form-select" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200">
                                        <option value="">Select experience</option>
                                        <option value="0-1">0-1 years (Fresher)</option>
                                        <option value="1-3">1-3 years</option>
                                        <option value="3-5">3-5 years</option>
                                        <option value="5+">5+ years</option>
                                    </select>
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Expected Salary</label>
                                    <input type="text" name="expected_salary" class="form-control"
                                        placeholder="e.g. 50,000 BDT"
                                        value="{{ old('expected_salary') }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Why do you want to join us?</label>
                                    <textarea name="want_to_join_us"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Write a short message about why you want to join our team...">{{ old('want_to_join_us') }}</textarea>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">File</label>
                                    <input type="file" name="file" id="file" class="form-control" value="">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="">Select status</option>
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