@extends('admin.layouts.app')

@section('title','Add Blog')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Blog</h5>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.blogs.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row g-3">
                                <!-- Category -->
                                <div class="form-group col-lg-6">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $item)
                                        <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group col-lg-6">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Blog Title">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" readonly>
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Short Description -->
                                <div class="form-group col-lg-12">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" class="form-control" rows="2" placeholder="Enter short description">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group col-lg-6">
                                    <label for="country"> Country <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}" placeholder="Enter Blog Study Level">
                                    @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="study_level"> Study Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="study_level" name="study_level" value="{{ old('study_level') }}" placeholder="Enter Blog Study Level">
                                    @error('study_level')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="application_deadline">Application Deadline <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ old('application_deadline') }}" placeholder="Enter Blog Application Deadline">
                                    @error('application_deadline')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                 <div class="form-group col-lg-6">
                                    <label for="intake">Intake <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="intake" name="intake" value="{{ old('intake') }}" placeholder="Enter intake">
                                    @error('intake')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Story Date -->
                                <div class="form-group col-lg-4">
                                    <label for="story_date">Story Date</label>
                                    <input type="date" name="story_date" class="form-control" value="{{ old('story_date') }}">
                                    @error('story_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Story Post -->
                                <div class="form-group col-lg-4">
                                    <label for="story_post">Story Post</label>
                                    <input type="text" name="story_post" class="form-control" value="{{ old('story_post') }}" placeholder="Post By">
                                    @error('story_post')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Story View -->
                                <div class="form-group col-lg-4">
                                    <label for="story_view">Story View</label>
                                    <input type="number" name="story_view" class="form-control" value="{{ old('story_view') }}" placeholder="View Count">
                                    @error('story_view')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group col-lg-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" class=" summernote form-control" rows="5" placeholder="Blog Full Description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Tags -->
                                <div class="form-group col-lg-12">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="tags" class="form-control" value="{{ old('tags') }}" placeholder="Use comma separated tags">
                                    @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Thumbnail One -->
                                <div class="form-group col-lg-6">
                                    <label for="thumbnail_one">Thumbnail One</label>
                                    <input type="file" name="thumbnail_one" class="form-control p-1">
                                    @error('thumbnail_one')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Thumbnail Two -->
                                <div class="form-group col-lg-6">
                                    <label for="thumbnail_two">Thumbnail Two</label>
                                    <input type="file" name="thumbnail_two" class="form-control p-1">
                                    @error('thumbnail_two')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group col-lg-6">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-12 mt-3 text-end">
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
    $(document).ready(function() {

        function generateSlug(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/[\s\_]+/g, '-') // space → hyphen
                .replace(/[^\w\-]+/g, '') // remove invalid chars
                .replace(/\-\-+/g, '-'); // remove double hyphen
        }

        $('#title').on('keyup', function() {
            let title = $(this).val();
            $('#slug').val(generateSlug(title));
        });

    });
</script>
@endsection