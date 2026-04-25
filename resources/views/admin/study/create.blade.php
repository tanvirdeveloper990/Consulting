@extends('admin.layouts.app')

@section('title','Add Study')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Study</h5>
                        <a href="{{ route('admin.study.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form id="form" method="POST" action="{{route('admin.study.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row g-3">
                                <!-- Study Basic Information -->
                                <div class="col-12">
                                    <h6 class="border-bottom pb-2 mb-3">Study Information</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Country </label>
                                     <select class="form-select" name="country_id"  required>
                                        <option value="">Select countries...</option>
                                        @foreach($countries as $item)
                                        <option value="{{$item->id}}">{{$item->country}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*" onchange="previewImage(event, 'bannerPreview')">
                                    @error('banner_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <img id="bannerPreview" class="mt-2" style="max-width: 200px; display: none;">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Statistics Section -->
                                <div class="col-12 mt-4">
                                    <h6 class="border-bottom pb-2 mb-3">Statistics</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Partner University Title</label>
                                    <input type="text" name="partner_university_title" class="form-control" value="{{ old('partner_university_title') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Partner University Count</label>
                                    <input type="text" name="partner_university_count" class="form-control" value="{{ old('partner_university_count') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Students Enrolled Title</label>
                                    <input type="text" name="students_enrolled_title" class="form-control" value="{{ old('students_enrolled_title') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Students Enrolled Count</label>
                                    <input type="text" name="students_enrolled_count" class="form-control" value="{{ old('students_enrolled_count') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Success Rate Title</label>
                                    <input type="text" name="success_rate_title" class="form-control" value="{{ old('success_rate_title') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Success Rate Count</label>
                                    <input type="text" name="success_rate_count" class="form-control" value="{{ old('success_rate_count') }}">
                                </div>

                                <!-- Study Items Section -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0">Study Items</h6>
                                        <button type="button" class="btn btn-info btn-sm" id="addStudyItem">
                                            <i class="fa fa-plus me-1"></i> Add Study Item
                                        </button>
                                    </div>
                                    <div id="studyItemsContainer"></div>
                                </div>

                                <!-- Top Rated Section -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0"> Add Top Universities</h6>
                                        <button type="button" class="btn btn-primary btn-sm" id="addTopRated">
                                            <i class="fa fa-plus me-1"></i> Add Top Universities
                                        </button>
                                    </div>
                                    <div id="topRatedsContainer"></div>
                                </div>

                                <!-- Questions Section -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0">Questions</h6>
                                        <button type="button" class="btn btn-success btn-sm" id="addQuestion">
                                            <i class="fa fa-plus me-1"></i> Add Question
                                        </button>
                                    </div>
                                    <div id="questionsContainer"></div>
                                </div>

                                <!-- Admission Requirements Section - NEW -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0">Admission Requirements</h6>
                                        <button type="button" class="btn btn-warning btn-sm" id="addAdmissionRequirement">
                                            <i class="fa fa-plus me-1"></i> Add Admission Requirement
                                        </button>
                                    </div>
                                    <div id="admissionRequirementsContainer"></div>
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

<style>
    .dynamic-item {
        border: 1px solid #e0e0e0;
        padding: 20px;
        margin-bottom: 15px;
        border-radius: 8px;
        background-color: #f8f9fa;
        position: relative;
    }
    .remove-item-btn {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>

<script>
    let studyItemIndex = 0;
    let topRatedIndex = 0;
    let questionIndex = 0;
    let admissionRequirementIndex = 0; // NEW

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

    // Add Study Item
    document.getElementById('addStudyItem').addEventListener('click', function() {
        const container = document.getElementById('studyItemsContainer');
        const itemDiv = document.createElement('div');
        itemDiv.className = 'dynamic-item';
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-primary">Study Item #${studyItemIndex + 1}</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="study_items[${studyItemIndex}][title]" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Icon</label>
                    <input type="file" name="study_items[${studyItemIndex}][icon]" class="form-control" accept="image/*" onchange="previewImage(event, 'studyIconPreview${studyItemIndex}')">
                    <img id="studyIconPreview${studyItemIndex}" class="mt-2" style="max-width: 100px; display: none;">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea name="study_items[${studyItemIndex}][description]" class="form-control" rows="3"></textarea>
                </div>
            </div>
        `;
        container.appendChild(itemDiv);
        studyItemIndex++;
    });


    // Add Top Rated
    document.getElementById('addTopRated').addEventListener('click', function() {
        const container = document.getElementById('topRatedsContainer');
        const itemDiv = document.createElement('div');
        itemDiv.className = 'dynamic-item';
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-success">Top Rated University #${topRatedIndex + 1}</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="top_rateds[${topRatedIndex}][title]" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="top_rateds[${topRatedIndex}][image]" class="form-control" accept="image/*" onchange="previewImage(event, 'topRatedPreview${topRatedIndex}')">
                    <img id="topRatedPreview${topRatedIndex}" class="mt-2" style="max-width: 100px; display: none;">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea name="top_rateds[${topRatedIndex}][description]" class="form-control" rows="3"></textarea>
                </div>
            </div>
        `;
        container.appendChild(itemDiv);
        topRatedIndex++;
    });

   // Add Question
    document.getElementById('addQuestion').addEventListener('click', function() {
        const container = document.getElementById('questionsContainer');
        const itemDiv = document.createElement('div');
        itemDiv.className = 'dynamic-item mb-3';
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-primary">Question #${questionIndex + 1}</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="questions[${questionIndex}][title]" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <textarea name="questions[${questionIndex}][description]" class="form-control" rows="3"></textarea>
                </div>
            </div>
        `;
        container.appendChild(itemDiv);
        questionIndex++;
    });

    // Add Admission Requirement - NEW
    document.getElementById('addAdmissionRequirement').addEventListener('click', function() {
        const container = document.getElementById('admissionRequirementsContainer');
        const itemDiv = document.createElement('div');
        itemDiv.className = 'dynamic-item mb-3';
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-warning">Admission Requirement #${admissionRequirementIndex + 1}</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Icon</label>
                    <input type="file" name="admission_requirements[${admissionRequirementIndex}][icon]" class="form-control" accept="image/*" onchange="previewImage(event, 'admissionIconPreview${admissionRequirementIndex}')">
                    <img id="admissionIconPreview${admissionRequirementIndex}" class="mt-2" style="max-width: 100px; display: none;">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Text</label>
                    <textarea name="admission_requirements[${admissionRequirementIndex}][text]" class="form-control"  placeholder ="write something here.." rows="2"></textarea>
                </div>
            </div>
        `;
        container.appendChild(itemDiv);
        admissionRequirementIndex++;
    });
</script>

@endsection