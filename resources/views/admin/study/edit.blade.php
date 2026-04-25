@extends('admin.layouts.app')

@section('title','Edit Study')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Edit Study</h5>
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

                        <form id="form" method="POST" action="{{ route('admin.study.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Study Basic Information -->
                                <div class="col-12">
                                    <h6 class="border-bottom pb-2 mb-3">Study Information</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $data->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Country ID</label>
                                     <select class="form-select" name="country_id"  required>
                                        <option value="">Select countries...</option>
                                        @foreach($countries as $item)
                                        <option value="{{$item->id}}" {{$data->country_id ==$item->id ? 'selected' : ''}}>{{$item->country}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2">{{ old('short_description', $data->short_description) }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $data->description) }}</textarea>
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
                                    @if($data->banner_image)
                                        <img id="bannerPreview" src="{{ Storage::url( $data->banner_image) }}" class="mt-2" style="max-width: 200px;">
                                    @else
                                        <img id="bannerPreview" class="mt-2" style="max-width: 200px; display: none;">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="0" {{ old('status', $data->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                        <option value="1" {{ old('status', $data->status) == '1' ? 'selected' : '' }}>Active</option>
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
                                    <input type="text" name="partner_university_title" class="form-control" value="{{ old('partner_university_title', $data->partner_university_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Partner University Count</label>
                                    <input type="text" name="partner_university_count" class="form-control" value="{{ old('partner_university_count', $data->partner_university_count) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Students Enrolled Title</label>
                                    <input type="text" name="students_enrolled_title" class="form-control" value="{{ old('students_enrolled_title', $data->students_enrolled_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Students Enrolled Count</label>
                                    <input type="text" name="students_enrolled_count" class="form-control" value="{{ old('students_enrolled_count', $data->students_enrolled_count) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Success Rate Title</label>
                                    <input type="text" name="success_rate_title" class="form-control" value="{{ old('success_rate_title', $data->success_rate_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Success Rate Count</label>
                                    <input type="text" name="success_rate_count" class="form-control" value="{{ old('success_rate_count', $data->success_rate_count) }}">
                                </div>

                                <!-- Study Items Section -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0">Study Items</h6>
                                        <button type="button" class="btn btn-primary btn-sm" id="addStudyItem">
                                            <i class="fa fa-plus me-1"></i> Add Study Item
                                        </button>
                                    </div>
                                    <div id="studyItemsContainer">
                                        @foreach($data->studyItems as $index => $item)
                                        <div class="dynamic-item">
                                            <input type="hidden" name="study_items[{{ $index }}][id]" value="{{ $item->id }}">
                                            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="removeExistingItem(this, {{ $item->id }}, 'study_item')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <h6 class="mb-3 text-primary">Study Item #{{ $index + 1 }}</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="study_items[{{ $index }}][title]" class="form-control" value="{{ old('study_items.' . $index . '.title', $item->title) }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Icon</label>
                                                    <input type="file" name="study_items[{{ $index }}][icon]" class="form-control" accept="image/*" onchange="previewImage(event, 'studyIconPreview{{ $index }}')">
                                                    @if($item->icon)
                                                        <img id="studyIconPreview{{ $index }}" src="{{ Storage::url($item->icon) }}" class="mt-2" style="max-width: 100px;">
                                                    @else
                                                        <img id="studyIconPreview{{ $index }}" class="mt-2" style="max-width: 100px; display: none;">
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="study_items[{{ $index }}][description]" class="form-control" rows="3">{{ old('study_items.' . $index . '.description', $item->description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Top Rated Section -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0">Add Top Universities</h6>
                                        <button type="button" class="btn btn-success btn-sm" id="addTopRated">
                                            <i class="fa fa-plus me-1"></i> Add Top Universities
                                        </button>
                                    </div>
                                    <div id="topRatedsContainer">
                                        @foreach($data->topRateds as $index => $topRated)
                                        <div class="dynamic-item">
                                            <input type="hidden" name="top_rateds[{{ $index }}][id]" value="{{ $topRated->id }}">
                                            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="removeExistingItem(this, {{ $topRated->id }}, 'top_rated')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <h6 class="mb-3 text-success">Top University #{{ $index + 1 }}</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="top_rateds[{{ $index }}][title]" class="form-control" value="{{ old('top_rateds.' . $index . '.title', $topRated->title) }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" name="top_rateds[{{ $index }}][image]" class="form-control" accept="image/*" onchange="previewImage(event, 'topRatedPreview{{ $index }}')">
                                                    @if($topRated->image)
                                                        <img id="topRatedPreview{{ $index }}" src="{{ Storage::url($topRated->image) }}" class="mt-2" style="max-width: 100px;">
                                                    @else
                                                        <img id="topRatedPreview{{ $index }}" class="mt-2" style="max-width: 100px; display: none;">
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="top_rateds[{{ $index }}][description]" class="form-control" rows="3">{{ old('top_rateds.' . $index . '.description', $topRated->description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                                <!-- Questions Section -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0">Questions</h6>
                                        <button type="button" class="btn btn-info btn-sm" id="addQuestion">
                                            <i class="fa fa-plus me-1"></i> Add Question
                                        </button>
                                    </div>
                                    <div id="questionsContainer">
                                        @foreach($data->questions as $index => $question)
                                        <div class="dynamic-item">
                                            <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $question->id }}">
                                            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="removeExistingItem(this, {{ $question->id }}, 'question')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <h6 class="mb-3 text-info">Question #{{ $index + 1 }}</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="questions[{{ $index }}][title]" class="form-control" value="{{ old('questions.' . $index . '.title', $question->title) }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="questions[{{ $index }}][description]" class="form-control" rows="3">{{ old('questions.' . $index . '.description', $question->description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Admission Requirements Section - NEW -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                        <h6 class="mb-0">Admission Requirements</h6>
                                        <button type="button" class="btn btn-warning btn-sm" id="addAdmissionRequirement">
                                            <i class="fa fa-plus me-1"></i> Add Admission Requirement
                                        </button>
                                    </div>
                                    <div id="admissionRequirementsContainer">
                                        @foreach($data->admissionRequirements as $index => $requirement)
                                        <div class="dynamic-item">
                                            <input type="hidden" name="admission_requirements[{{ $index }}][id]" value="{{ $requirement->id }}">
                                            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="removeExistingItem(this, {{ $requirement->id }}, 'admission_requirement')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <h6 class="mb-3 text-warning">Admission Requirement #{{ $index + 1 }}</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Icon</label>
                                                    <input type="file" name="admission_requirements[{{ $index }}][icon]" class="form-control" accept="image/*" onchange="previewImage(event, 'admissionIconPreview{{ $index }}')">
                                                    @if($requirement->icon)
                                                        <img id="admissionIconPreview{{ $index }}" src="{{ Storage::url($requirement->icon) }}" class="mt-2" style="max-width: 100px;">
                                                    @else
                                                        <img id="admissionIconPreview{{ $index }}" class="mt-2" style="max-width: 100px; display: none;">
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Text</label>
                                                    <textarea name="admission_requirements[{{ $index }}][text]" class="form-control" rows="3">{{ old('admission_requirements.' . $index . '.text', $requirement->text) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Hidden field for deleted items -->
                                <input type="hidden" name="deleted_study_items" id="deletedStudyItems" value="">
                                <input type="hidden" name="deleted_top_rateds" id="deletedTopRateds" value="">
                                <input type="hidden" name="deleted_questions" id="deletedQuestions" value="">
                                <input type="hidden" name="deleted_admission_requirements" id="deletedAdmissionRequirements" value="">

                            </div>

                            <div class="col-12 mt-3 text-end">
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
        z-index: 10;
    }
</style>

<script>
    let studyItemIndex = {{ count($data->studyItems) }};
    let topRatedIndex = {{ count($data->topRateds) }};
    let questionIndex = {{ count($data->questions) }};
    let admissionRequirementIndex = {{ count($data->admissionRequirements) }};
    let deletedQuestions = [];
    let deletedStudyItems = [];
    let deletedTopRateds = [];
    let deletedAdmissionRequirements = [];

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

    // Remove Existing Item - UPDATED
    function removeExistingItem(button, itemId, type) {
        if (confirm('Are you sure you want to delete this item?')) {
            if (type === 'study_item') {
                deletedStudyItems.push(itemId);
                document.getElementById('deletedStudyItems').value = deletedStudyItems.join(',');
            } else if (type === 'top_rated') {
                deletedTopRateds.push(itemId);
                document.getElementById('deletedTopRateds').value = deletedTopRateds.join(',');
            } else if (type === 'question') {
                deletedQuestions.push(itemId);
                document.getElementById('deletedQuestions').value = deletedQuestions.join(',');
            } else if (type === 'admission_requirement') {
                deletedAdmissionRequirements.push(itemId);
                document.getElementById('deletedAdmissionRequirements').value = deletedAdmissionRequirements.join(',');
            }
            button.parentElement.remove();
        }
    }

    // Add Study Item
    document.getElementById('addStudyItem').addEventListener('click', function() {
        const container = document.getElementById('studyItemsContainer');
        const itemDiv = document.createElement('div');
        itemDiv.className = 'dynamic-item';
        const currentCount = container.querySelectorAll('.dynamic-item').length + 1; // COUNT DYNAMICALLY
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-primary">Study Item #${currentCount}</h6>
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
        const currentCount = container.querySelectorAll('.dynamic-item').length + 1; // COUNT DYNAMICALLY
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-success">Top Rated University #${currentCount}</h6>
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
        const currentCount = container.querySelectorAll('.dynamic-item').length + 1; // COUNT DYNAMICALLY
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-info">Question #${currentCount}</h6>
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

    // Add Admission Requirement
    document.getElementById('addAdmissionRequirement').addEventListener('click', function() {
        const container = document.getElementById('admissionRequirementsContainer');
        const itemDiv = document.createElement('div');
        itemDiv.className = 'dynamic-item mb-3';
        const currentCount = container.querySelectorAll('.dynamic-item').length + 1; // COUNT DYNAMICALLY - FIX
        itemDiv.innerHTML = `
            <button type="button" class="btn btn-sm btn-danger remove-item-btn" onclick="this.parentElement.remove()">
                <i class="fa fa-trash"></i>
            </button>
            <h6 class="mb-3 text-warning">Admission Requirement #${currentCount}</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Icon</label>
                    <input type="file" name="admission_requirements[${admissionRequirementIndex}][icon]" class="form-control" accept="image/*" onchange="previewImage(event, 'admissionIconPreview${admissionRequirementIndex}')">
                    <img id="admissionIconPreview${admissionRequirementIndex}" class="mt-2" style="max-width: 100px; display: none;">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Text</label>
                    <textarea name="admission_requirements[${admissionRequirementIndex}][text]" class="form-control" Placeholder ="write something here..." rows="2"></textarea>
                </div>
            </div>
        `;
        container.appendChild(itemDiv);
        admissionRequirementIndex++;
    });

</script>

@endsection