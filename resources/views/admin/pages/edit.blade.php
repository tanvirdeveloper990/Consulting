@extends('admin.layouts.app')

@section('title','Update Terms & Condition')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Terms & Condition</h5>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.pages.update', $data->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                {{-- Title --}}
                                <div class="col-md-6">
                                    <label class="form-label">
                                        Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           value="{{ old('title', $data->title) }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Slug --}}
                                <div class="col-md-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text"
                                           name="slug"
                                           id="slug"
                                           class="form-control"
                                           value="{{ old('slug', $data->slug) }}">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description"
                                              rows="6"
                                              class="summernote form-control">{{ old('description', $data->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>
                                            Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="text-end mt-4">
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
