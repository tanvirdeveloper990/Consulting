@extends('admin.layouts.app')

@section('title','Add Terms & Condition')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Add Terms & Condition</h5>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{route('admin.pages.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row g-3">


                            <div class="col-md-6">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text"
                                    name="title"
                                    class="form-control"
                                    value="{{ old('title') }}"
                                    placeholder="Enter page title">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Slug</label>
                                <input type="text"
                                    name="slug"
                                    id="slug"
                                    class="form-control"
                                    value="{{ old('slug') }}"
                                    placeholder="terms-and-condition">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="short_description"
                                        rows="6"
                                        class="form-control"
                                        placeholder="Write terms & condition here...">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="description"
                                        rows="6"
                                        class=" summernote form-control"
                                        placeholder="Write terms & condition here...">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
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
    document.addEventListener('DOMContentLoaded', function () {
        const titleInput = document.querySelector('input[name="title"]');
        const slugInput  = document.querySelector('#slug');

        titleInput.addEventListener('keyup', function () {
            let slug = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/&/g, 'and')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.value = slug;
        });
    });
</script>

@endsection