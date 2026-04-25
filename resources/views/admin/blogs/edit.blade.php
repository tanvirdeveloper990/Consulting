@extends('admin.layouts.app')

@section('title','Update Blog')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Blog</h5>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.blogs.update',$data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Category -->
                                <div class="form-group col-lg-6">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{$data->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Title -->
                                <div class="form-group col-lg-6">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title',$data->title) }}" placeholder="Enter Blog Title">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="form-group col-lg-12">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ old('slug',$data->slug) }}" readonly>
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Short Description -->
                                <div class="form-group col-lg-12">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" class="form-control" rows="2">{{$data->short_description}}</textarea>
                                    @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                               <div class="form-group col-lg-6">
                                    <label for="country"> Country <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country',$data->country) }}" placeholder="Enter Blog Study Level">
                                    @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="study_level"> Study Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="study_level" name="study_level" value="{{ old('study_level',$data->study_level) }}" placeholder="Enter Blog Study Level">
                                    @error('study_level')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="application_deadline">Application Deadline <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ old('application_deadline',$data->application_deadline) }}" placeholder="Enter Blog Application Deadline">
                                    @error('application_deadline')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                 <div class="form-group col-lg-6">
                                    <label for="intake">Intake <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="intake" name="intake" value="{{ old('intake',$data->intake) }}" placeholder="Enter intake">
                                    @error('intake')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Story Date -->
                                <div class="form-group col-lg-4">
                                    <label for="story_date">Story Date</label>
                                    <input type="date" name="story_date" class="form-control" value="{{ old('story_date',$data->story_date) }}">
                                    @error('story_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Story Post -->
                                <div class="form-group col-lg-4">
                                    <label for="story_post">Story Post</label>
                                    <input type="text" name="story_post" class="form-control" value="{{ old('story_post',$data->story_post) }}" placeholder="Post By">
                                    @error('story_post')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Story View -->
                                <div class="form-group col-lg-4">
                                    <label for="story_view">Story View</label>
                                    <input type="number" name="story_view" class="form-control" value="{{ old('story_view',$data->story_view) }}">
                                    @error('story_view')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group col-lg-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="summernote form-control" rows="5">{!!$data->description!!}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Tags -->
                                <div class="form-group col-lg-12">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="tags" class="form-control" value="{{ old('tags',$data->tags) }}">
                                    @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Thumbnail One -->
                                <div class="form-group col-lg-6">
                                    <label for="thumbnail_one">Thumbnail One</label>
                                    <input type="file" name="thumbnail_one" class="form-control p-1">
                                    <br>
                                    @if($data->thumbnail_one)
                                    <img src="{{Storage::url($data->thumbnail_one) }}" width="120">
                                    @endif
                                    @error('thumbnail_one')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Thumbnail Two -->
                                <div class="form-group col-lg-6">
                                    <label for="thumbnail_two">Thumbnail Two</label>
                                    <input type="file" name="thumbnail_two" class="form-control p-1">
                                    <br>
                                    @if($data->thumbnail_two)
                                    <img src="{{Storage::url($data->thumbnail_two) }}" width="120">
                                    @endif
                                    @error('thumbnail_two')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group col-lg-6">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{$data->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{$data->status == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

@section('script')

<script>
    $(document).ready(function() {

        function generateSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[\s_]+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-');
        }

        // Auto slug on title keyup
        $('#title').on('keyup', function() {
            $('#slug').val(generateSlug($(this).val()));
        });

    });
</script>

@endsection