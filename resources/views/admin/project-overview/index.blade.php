@extends('admin.layouts.app')

@section('title','Update Project Overview')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Update Project Overview</h5>
                        <a href="{{ route('admin.project-overview.index') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-angle-left me-1"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.project-overview.update',$data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">

                               
 {{-- ================= Top Study Destination ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Top Study Destination</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title One</label>
                                    <input type="text" name="top_study_destination_title" class="form-control"
                                        value="{{ $data->top_study_destination_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title Two</label>
                                    <input type="text" name="top_study_destination_title1" class="form-control"
                                        value="{{ $data->top_study_destination_title1 }}" placeholder="Enter Title">
                                </div>

                                <!-- <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="top_study_destination_description" class="form-control" rows="3"
                                        placeholder="Write something here..">{!! $data->top_study_destination_description !!}</textarea>
                                </div> -->

                                {{-- ================= Our Service ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Our Service</h6>
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="gallery_title1" class="form-control"
                                        value="{{ $data->gallery_title1 }}" placeholder="Enter Title">
                                </div>

                                {{-- ================= Your Journey, Step by Step ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Your Journey, Step by Step</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title One</label>
                                    <input type="text" name="still_have_questions_title" class="form-control"
                                        value="{{ $data->still_have_questions_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title Two</label>
                                    <input type="text" name="still_have_questions_title1" class="form-control"
                                        value="{{ $data->still_have_questions_title1 }}" placeholder="Enter Title">
                                </div>

                                {{-- ================= Frequently Asked Question ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Frequently Asked Question</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title One</label>
                                    <input type="text" name="frequently_asked_question_title" class="form-control"
                                        value="{{ $data->frequently_asked_question_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title Two</label>
                                    <input type="text" name="frequently_asked_question_title1" class="form-control"
                                        value="{{ $data->frequently_asked_question_title1 }}" placeholder="Enter Title">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="frequently_asked_question_description" class="form-control" rows="3"
                                        placeholder="Write something here..">{!! $data->frequently_asked_question_description !!}</textarea>
                                </div>

                                {{-- ================= News and Updates ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">News and Updates</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title One</label>
                                    <input type="text" name="news_and_updates_title" class="form-control"
                                        value="{{ $data->news_and_updates_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title Two</label>
                                    <input type="text" name="news_and_updates_title1" class="form-control"
                                        value="{{ $data->news_and_updates_title1 }}" placeholder="Enter Title">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="news_and_updates_description" class="form-control" rows="3"
                                        placeholder="Write something here..">{!! $data->news_and_updates_description !!}</textarea>
                                </div>

                                {{-- ================= Our Partners ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Our Partners</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title One</label>
                                    <input type="text" name="our_parents_title" class="form-control"
                                        value="{{ $data->our_parents_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title Two</label>
                                    <input type="text" name="our_parents_title1" class="form-control"
                                        value="{{ $data->our_parents_title1 }}" placeholder="Enter Title">
                                </div>

<!-- 
                                {{-- ================= Contact Us ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Contact Us</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title One</label>
                                    <input type="text" name="contact_us_title" class="form-control"
                                        value="{{ $data->contact_us_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title Two</label>
                                    <input type="text" name="contact_us_title1" class="form-control"
                                        value="{{ $data->contact_us_title1 }}" placeholder="Enter Title">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="contact_us_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->contact_us_description !!}</textarea>
                                </div> -->


                                {{-- ================= Apply Form Page ================= --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Apply Form Page</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="apply_title" class="form-control"
                                        value="{{ $data->apply_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="apply_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->apply_description !!}</textarea>
                                </div>

                                {{-- ================= Contact Page Find US Section ================= --}}
                                {{--<div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Contact Page Find US Section</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="find_us_title" class="form-control"
                                        value="{{ $data->find_us_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Business Hours</label>
                                    <input type="text" name="buisness_hours" class="form-control"
                                        value="{{ $data->buisness_hours }}" placeholder="Enter Business Hours">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="find_us_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->find_us_description !!}</textarea>
                                </div>--}}


                                {{-- ================= Service & Support Page ================= --}}
                                {{--<div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Service & Support Page</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slider Title</label>
                                    <input type="text" name="service_support_title" class="form-control"
                                        value="{{ old('service_support_title', $data->service_support_title) }}" placeholder="Enter Slider Title">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slider Image</label>
                                    <input type="file" name="service_support_image" class="form-control">

                                    @if($data->service_support_image)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($data->service_support_image) }}" alt="Service Support Image"
                                                class="img-thumbnail" width="120" height="80">
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Slider Description</label>
                                    <textarea name="service_support_description" class="form-control" rows="3" placeholder="Write something here..">{{ old('service_support_description', $data->service_support_description) }}</textarea>
                                </div>--}}


                                
                                {{-- ================= Admission Requirements Country Page ================= --}}
                                {{--<div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Admission Requirements Country Page</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="admission_requirement_title" class="form-control"
                                        value="{{ $data->admission_requirement_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="admission_requirement_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->admission_requirement_description !!}</textarea>
                                </div>--}}

                                
                                {{-- ================= Not sure if you meet the requirements ================= --}}
                                {{--<div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Not sure if you meet the requirements</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="book_free_title" class="form-control"
                                        value="{{ $data->book_free_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="book_free_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->book_free_description !!}</textarea>
                                </div>--}}


                                {{-- ================= Join Our Team ================= --}}
                                {{--<div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Join Our Team</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="join_our_team_title" class="form-control"
                                        value="{{ $data->join_our_team_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="join_our_team_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->join_our_team_description !!}</textarea>
                                </div>--}}

                                {{-- ================= Founder Message ================= --}}
                                {{--<div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Founder Message</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="message_title" class="form-control"
                                        value="{{ $data->message_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="message_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->message_description !!}</textarea>
                                </div>--}}


                                  {{-- ================= Gallery Single Page ================= --}}
                                {{--<div class="col-12">
                                    <h6 class="fw-bold text-primary mt-3">Gallery Single Page</h6>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="our_gallery_title" class="form-control"
                                        value="{{ $data->our_gallery_title }}" placeholder="Enter Title">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="our_gallery_description" class="form-control" rows="3" placeholder="Write something here..">{!! $data->our_gallery_description !!}</textarea>
                                </div>--}}


                            </div>


                            {{-- Submit --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">
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