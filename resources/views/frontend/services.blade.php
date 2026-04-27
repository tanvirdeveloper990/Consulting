@extends('layouts.app')

@section('css')
<style>
    .srv-banner {
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

    .srv-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255, 255, 255, .07) 1px, transparent 1px);
        background-size: 28px 28px;
        pointer-events: none;
    }

    .srv-banner .container {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .srv-banner__title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0;
        letter-spacing: -.02em;
        text-align: center;
    }

    @media (min-width: 992px) {
        .srv-banner {
            display: flex;
        }
    }
</style>
@endsection

@section('content')

<!-- PAGE BANNER (desktop only) -->
<div class="srv-banner">
    <div class="container">
        <h1 class="srv-banner__title">Our All Services</h1>
    </div>
</div>

<!--  Our Services-->
<section class="services-section">
    <div class="container">

        <!-- Mobile Title -->
        <div class="d-flex d-lg-none flex-wrap justify-content-between text-center mb-5 mt-5 p-2 gap-3">
            <h2 class="section-title mb-0">Our Services</h2>
        </div>

        <!-- SERVICES GRID: desktop 4 col, mobile 2 col -->
        <div class="row g-4">
            @foreach($services as $item)
            <div class="col-6 col-lg-3">
                <div class="service-card">
                    <div class="service-icon">
                        <img src="{{ Storage::url($item->icon) }}"
                            alt="{{ $item->title }}"
                            style="width:45px; height:45px; object-fit:contain;">
                    </div>

                    <h3 class="service-title">
                        {{ $item->title }}
                    </h3>

                    <p class="service-desc">
                        {{ $item->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

    </div><!-- /container -->
</section>

@endsection