@extends('layouts.app')
@section('title','Abouts')

@section('content')


  <!-- about section -->
    <section class="about-section py-5 overflow-hidden">
        <div class="container custom-container py-lg-5">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="image-wrapper pe-xxl-5">
                        <div class="experience-badge shadow-lg">

                        </div>
                        <img  src="{{Storage::url($advanced->image)}}" alt="{{$advanced->title_1}}"
                            class="img-fluid main-about-img w-100 shadow-lg">

                        <div class="decorative-shape"></div>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="about-content ps-lg-4 ps-xxl-5">
                        <h2 class="main-heading fw-bold mb-4">
                            {{$advanced->title_1}} <span class="highlight">{{$advanced->title_2}}</span>
                        </h2>

                        <p class="lead-text mb-4">
                            {!! $advanced->description !!}
                        </p>


                        <div class="row g-2 g-md-3 stats-grid mb-5">
                            <div class="col-4">
                                <div class="stat-card color-1 h-100">
                                    <div class="stat-icon-wrap">
                                        <img src="{{ Storage::url($advanced->application_image) }}" 
                                        alt="{{ $advanced->application_title }}"
                                        style="width: 47px; height: 47px; object-fit: contain;">
                                    </div>
                                    <h3><span class="counter" data-target="{{$advanced->application_count}}">0</span>+</h3>
                                    <p>{{$advanced->application_title}}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-card color-2 h-100">
                                    <div class="stat-icon-wrap">
                                        <img src="{{ Storage::url($advanced->experience_image) }}" 
                                        alt="{{ $advanced->experience_title }}"
                                        style="width: 47px; height: 47px; object-fit: contain;">
                                    </div>
                                    <h3><span class="counter" data-target="{{$advanced->experience_count}}">0</span>+</h3>
                                    <p>{{$advanced->experience_title}}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-card color-3 h-100">
                                    <div class="stat-icon-wrap">
                                        <img src="{{ Storage::url($advanced->satisfied_image) }}" 
                                        alt="{{ $advanced->satisfied_title }}"
                                        style="width: 47px; height: 47px; object-fit: contain;">
                                    </div>
                                    <h3><span class="counter" data-target="{{ $advanced->satisfied_count }}">0</span>+</h3>
                                    <p>{{ $advanced->satisfied_title }}</p>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn-apply-custom about-btn">
                            <span class="sweep-bg"></span>
                            <span class="btn-text">About SHEC</span>
                            <svg class="btn-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection