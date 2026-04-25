@extends('admin.layouts.app')

@section('title','Update Review Stories')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Review Stories</h5>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.reviews.update', $data->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                {{-- Type --}}
                                <div class="col-md-6">
                                    <label class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="">Select Type</option>
                                        <option value="Success Stories"
                                            {{ $data->type == 'Success Stories' ? 'selected' : '' }}>
                                            Success Stories
                                        </option>
                                        <option value="Veryfied Stories"
                                            {{ $data->type == 'Veryfied Stories' ? 'selected' : '' }}>
                                            Veryfied Stories
                                        </option>
                                    </select>
                                </div>

                                {{-- Image / Text --}}
                                <div class="col-md-6" id="imageField">
                                    <label class="form-label" id="imageLabel">
                                        {{ $data->type == 'Success Stories' ? 'Text' : 'Image' }}
                                    </label>

                                    @if($data->type == 'Success Stories')
                                        <input type="text"
                                               name="image"
                                               id="imageInput"
                                               class="form-control"
                                               value="{{ $data->image }}"
                                               placeholder="Enter text here">
                                    @else
                                        <input type="file"
                                               name="image"
                                               id="imageInput"
                                               class="form-control">
                                        @if($data->image)
                                            <small class="text-muted d-block mt-1">
                                                Current: {{ $data->image }}
                                            </small>
                                        @endif
                                    @endif
                                </div>

                                {{-- Title --}}
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                           value="{{ old('title', $data->title) }}">
                                </div>

                                {{-- Subtitle --}}
                                <div class="col-md-6">
                                    <label class="form-label">Subtitle/Address</label>
                                    <input type="text" name="subtitle" class="form-control"
                                           value="{{ old('subtitle', $data->subtitle) }}">
                                </div>

                                {{-- Date --}}
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{ old('date', $data->date) }}">
                                </div>

                                {{-- Star --}}
                                <div class="col-md-6">
                                    <label class="form-label">Star Rating</label>
                                    <select name="star" class="form-select">
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{ $i }}"
                                                {{ $data->star == $i ? 'selected' : '' }}>
                                                {{ str_repeat('⭐',$i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                {{-- Text --}}
                                <div class="col-md-6">
                                    <label class="form-label">Review Text</label>
                                    <textarea name="text" rows="3" class="form-control">{{ old('text',$data->text) }}</textarea>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
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
@section('script')
<script>
    function toggleField(typeValue) {
        const imageInput = document.getElementById('imageInput');
        const imageLabel = document.getElementById('imageLabel');

        if (typeValue === 'Success Stories') {
            imageLabel.innerText = 'YouTube Video Link';
            imageInput.type = 'text';
            imageInput.placeholder = 'Enter link here';
        }
        else if (typeValue === 'Veryfied Stories') {
            imageLabel.innerText = 'Image';
            imageInput.type = 'file';
            imageInput.placeholder = '';
        }
    }

    // On change
    document.getElementById('type').addEventListener('change', function () {
        toggleField(this.value);
    });

    // On page load (IMPORTANT for edit)
    document.addEventListener('DOMContentLoaded', function () {
        toggleField(document.getElementById('type').value);
    });
</script>
@endsection
