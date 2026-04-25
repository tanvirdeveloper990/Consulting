@extends('admin.layouts.app')

@section('title','Update Study Item')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Study Item</h5>
                        <a href="{{ route('admin.study-item.index') }}" class="btn btn-success btn-sm float-end">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.study-item.update', $data->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                {{-- Study Select --}}
                                <div class="col-md-6">
                                    <label class="form-label">Study</label>
                                    <select class="form-select" name="study_id" required>
                                        <option value="">Select Study...</option>
                                        @foreach($study as $item)
                                            <option value="{{ $item->id }}" 
                                                {{ $data->study_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->country_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Title --}}
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           value="{{ old('title', $data->title) }}"
                                           placeholder="Enter Title" required>
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control"
                                              name="description"
                                              rows="3"
                                              placeholder="Enter Description">{{ old('description', $data->description) }}</textarea>
                                </div>

                                {{-- Image --}}
                                <div class="col-md-6">
                                    <label for="icon" class="form-label">Image</label>
                                    <input type="file"
                                           class="form-control"
                                           name="icon">

                                    @if($data->icon)
                                        <small class="d-block mt-2 text-muted">Current Image:</small>
                                        <img src="{{ Storage::url($data->icon) }}"
                                             class="img-thumbnail mt-2"
                                             width="120">
                                    @endif
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Deactive</option>
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
