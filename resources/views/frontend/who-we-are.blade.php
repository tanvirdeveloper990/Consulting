@extends('layouts.app')
@section('title','Abouts')

@section('css')
<style>
    /* ── Page Banner ── */
    .page-banner {
        width: 100%;
        min-height: 180px;
        background: linear-gradient(135deg, #0A474C 0%, #0d6b72 50%, #00B8D4 100%);
        display: none;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .page-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255, 255, 255, .07) 1px, transparent 1px);
        background-size: 28px 28px;
        pointer-events: none;
    }

    .page-banner .container {
        position: relative;
        z-index: 1;
    }

    .page-banner__title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0;
        letter-spacing: -.02em;
    }

    @media (min-width: 992px) {
        .page-banner {
            display: flex;
        }
    }
</style>
@endsection

@section('content')

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner__title">About Us</h1>
    </div>
</div>

<!-- about section -->
<section class="about-section py-5 mt-5 overflow-hidden">
    <div class="container custom-container py-lg-5">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="image-wrapper pe-xxl-5">
                    <div class="experience-badge shadow-lg">

                    </div>
                    <img src="{{Storage::url($advanced->image)}}" alt="{{$advanced->title_1}}"
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

{{-- FAQ Section --}}
<section class="py-5 px-3">
    <div class="container" style="max-width: 960px;">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase fs-2 mb-3">
                {{ $overview->frequently_asked_question_title }}
                <span style="color: #0A474C;">{{ $overview->frequently_asked_question_title1 }}</span>
            </h2>
            <div style="width:96px; height:4px; background:#0A474C; margin:0 auto 1.5rem;"></div>
            <p class="text-muted mx-auto" style="max-width:560px; line-height:1.7;">
                {{ $overview->frequently_asked_question_description }}
            </p>
        </div>

        <div class="accordion" id="faqAccordion">
            @foreach($frequently as $index => $item)
            <div class="accordion-item faq-item mb-3 rounded-4 overflow-hidden border"
                style="border-color: rgba(10,71,76,0.2) !important;">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold rounded-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq{{ $index }}"
                        style="background:transparent; box-shadow:none; font-size:1.05rem; color:#1a1a1a;">
                        <i class="fas fa-user-plus me-3" style="color:#0A474C;"></i>
                        {{ $item->title }}
                    </button>
                </h2>
                <div id="faq{{ $index }}"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary ps-5">
                        {{ $item->description }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .faq-item {
        transition: background 0.3s, box-shadow 0.3s;
    }

    .faq-item:hover {
        background-color: rgba(10, 71, 76, 0.07) !important;
        box-shadow: 0 4px 16px rgba(10, 71, 76, 0.10);
    }

    .accordion-button:not(.collapsed) {
        color: #0A474C !important;
        background: transparent !important;
        box-shadow: none !important;
    }

    .accordion-button:not(.collapsed)::after {
        filter: invert(25%) sepia(80%) saturate(600%) hue-rotate(155deg);
    }
</style>


@endsection