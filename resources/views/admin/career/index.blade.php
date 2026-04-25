@extends('admin.layouts.app')

@section('title','Update Career')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Update Career</h5>
                        <a href="{{ route('admin.career.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('admin.career.update', $career->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                {{-- General --}}
                                <div class="col-12 mt-4">
                                    <h6 class="text-[#0A474C] border-bottom pb-2">Start Your Career</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter career title"
                                        value="{{ old('title', $career->title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="2"
                                        placeholder="write something here..">{{ old('description', $career->description) }}</textarea>
                                </div>

                                <p class="m-3"></p>

                                {{-- Box counts --}}
                                <div class="col-md-6">
                                    <label class="form-label">Students Title</label>
                                    <input type="text" name="box_one_title" class="form-control"
                                        placeholder="e.g. Team Members"
                                        value="{{ old('box_one_title', $career->box_one_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Students Count</label>
                                    <input type="text" name="box_one_count" class="form-control"
                                        placeholder="e.g. 50+"
                                        value="{{ old('box_one_count', $career->box_one_count) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Success Title</label>
                                    <input type="text" name="box_two_title" class="form-control"
                                        placeholder="e.g. Countries"
                                        value="{{ old('box_two_title', $career->box_two_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Success Count</label>
                                    <input type="text" name="box_two_count" class="form-control"
                                        placeholder="e.g. 12"
                                        value="{{ old('box_two_count', $career->box_two_count) }}">
                                </div>

                                <p class="m-3"></p>

                                {{-- Lists 1–3 --}}
                                @for($i=1; $i<=3; $i++)
                                    <div class="col-md-6">
                                        <label class="form-label">List {{ $i }} Title</label>
                                        <input type="text" name="list{{ $i }}_tile" class="form-control"
                                            placeholder="List {{ $i }} title"
                                            value="{{ old("list{$i}_tile", $career->{'list'.$i.'_tile'}) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">List {{ $i }} Subtitle</label>
                                        <textarea name="list{{ $i }}_subtitle" class="form-control" rows="2"
                                            placeholder="List {{ $i }} description">{{ old("list{$i}_subtitle", $career->{'list'.$i.'_subtitle'}) }}</textarea>
                                    </div>
                                @endfor

                                <p class="m-4"></p>

                                {{-- Why Work --}}
                                <!-- <div class="col-12 mt-4">
                                    <h6 class="text-[#0A474C] border-bottom pb-2">Why Work With Us?</h6>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Why Work Title</label>
                                    <input type="text" name="why_work_title" class="form-control"
                                        placeholder="Why work with us"
                                        value="{{ old('why_work_title', $career->why_work_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Why Work Description</label>
                                    <textarea name="why_work_description" class="form-control" rows="2"
                                        placeholder="Explain why someone should work here">{{ old('why_work_description', $career->why_work_description) }}</textarea>
                                </div>

                                <p class="m-3"></p>

                                {{-- Boxes 1–6 --}}
                                @for($i=1; $i<=6; $i++)
                                    <div class="col-md-4">
                                        <label class="form-label">Box {{ $i }} Icon</label>
                                        <input type="file" name="box{{ $i }}_icon" class="form-control">

                                        {{-- Old icon preview (edit page) --}}
                                        @if(!empty($career->{'box'.$i.'_icon'}))
                                            <div class="mt-2">
                                                <img src="{{ Storage::url($career->{'box'.$i.'_icon'}) }}"
                                                    alt="Box {{ $i }} Icon"
                                                    style="height: 40px;">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Box {{ $i }} Title</label>
                                        <input type="text" name="box{{ $i }}_title" class="form-control"
                                            placeholder="Box title"
                                            value="{{ old("box{$i}_title", $career->{'box'.$i.'_title'}) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Box {{ $i }} Description</label>
                                        <textarea name="box{{ $i }}_description" class="form-control" rows="2"
                                            placeholder="Box description">{{ old("box{$i}_description", $career->{'box'.$i.'_description'}) }}</textarea>
                                    </div>
                                @endfor

                                <p class="m-3"></p>

                                {{-- Current Opening --}}
                                <div class="col-12 mt-4">
                                    <h6 class="text-[#0A474C] border-bottom pb-2">Current Openings</h6>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Current Opening Title</label>
                                    <input type="text" name="current_opening_title" class="form-control"
                                        placeholder="Current job openings"
                                        value="{{ old('current_opening_title', $career->current_opening_title) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Current Opening Description</label>
                                    <textarea name="current_opening_description" class="form-control" rows="2"
                                        placeholder="write something here..">{{ old('current_opening_description', $career->current_opening_description) }}</textarea>
                                </div>

                                <p class="m-3"></p>

                                {{-- Job Listings 1-5 - FIXED --}}
                                @php
                                    $listNames = ['one', 'two', 'three', 'four', 'five'];
                                @endphp

                                @foreach($listNames as $index => $name)
                                    <div class="col-12 mt-3">
                                        <h6 class="text-secondary">Job Opening {{ $index + 1 }}</h6>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Title</label>
                                        <input type="text"
                                                name="list_{{ $name }}_tile"
                                                class="form-control"
                                                placeholder="Job Title"
                                                value="{{ old('list_'.$name.'_tile', $career->{'list_'.$name.'_tile'} ?? '') }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Time</label>
                                        <input type="text"
                                                name="list_{{ $name }}_time"
                                                class="form-control"
                                                placeholder="Full Time / Part Time"
                                                value="{{ old('list_'.$name.'_time', $career->{'list_'.$name.'_time'} ?? '') }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Country</label>
                                        <input type="text"
                                                name="list_{{ $name }}_country"
                                                class="form-control"
                                                placeholder="Bangladesh"
                                                value="{{ old('list_'.$name.'_country', $career->{'list_'.$name.'_country'} ?? '') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Description</label>
                                        <textarea name="list_{{ $name }}_description"
                                                    class="form-control"
                                                    rows="2"
                                                    placeholder="Job short description">{{ old('list_'.$name.'_description', $career->{'list_'.$name.'_description'} ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tag</label>
                                        <input type="text"
                                                name="list_{{ $name }}_tag"
                                                class="form-control"
                                                placeholder="Urgent / New"
                                                value="{{ old('list_'.$name.'_tag', $career->{'list_'.$name.'_tag'} ?? '') }}">
                                    </div>
                                @endforeach

                                <p class="m-3"></p> -->

                            </div>

                            <div class="mt-4 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Update Career
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