@extends('admin.layouts.app')

@section('title','Update Join Our Team')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Join Our Team</h5>
                        <a href="{{ route('admin.teams.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.teams.update', $team->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="fname" class="form-control"
                                        placeholder="Enter first name"
                                        value="{{ old('fname', $team->fname) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="lname" class="form-control"
                                        placeholder="Enter last name"
                                        value="{{ old('lname', $team->lname) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter email address"
                                        value="{{ old('email', $team->email) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter phone number"
                                        value="{{ old('phone', $team->phone) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Position</label>
                                    <select name="position" class="form-select">
                                        <option value="">Select a position</option>
                                        @php
                                        $positions = [
                                        'Education Counselor',
                                        'Visa Processing Officer',
                                        'Marketing Executive',
                                        'Office Administrator',
                                        'Other'
                                        ];
                                        @endphp
                                        @foreach($positions as $position)
                                        <option value="{{ $position }}"
                                            {{ old('position', $team->position) == $position ? 'selected' : '' }}>
                                            {{ $position }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Years of Experience</label>
                                    <select name="years_of_experience" class="form-select">
                                        @php
                                        $experiences = [
                                        '0-1' => '0-1 years (Fresher)',
                                        '1-3' => '1-3 years',
                                        '3-5' => '3-5 years',
                                        '5+' => '5+ years',
                                        ];
                                        @endphp
                                        <option value="">Select experience</option>
                                        @foreach($experiences as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ old('years_of_experience', $team->years_of_experience) == $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Expected Salary</label>
                                    <input type="text" name="expected_salary" class="form-control"
                                        placeholder="e.g. 50,000 BDT"
                                        value="{{ old('expected_salary', $team->expected_salary) }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Why do you want to join us?</label>
                                    <textarea name="want_to_join_us"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Write a short message about why you want to join our team...">{{ old('want_to_join_us', $team->want_to_join_us) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">File</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    @if($team->file)
                                    <img src="{{Storage::url($team->file)}}" alt="{{$team->fname}}" class="mt-2">
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="">Select status</option>
                                        <option value="1" {{ old('status', $team->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $team->status) == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 mt-4 text-end">
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