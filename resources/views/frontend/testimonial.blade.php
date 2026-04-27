@extends('layouts.app')
@section('title','STORIES OF SATISFACTION')

@section('css')
<style>
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
    background-image: radial-gradient(rgba(255,255,255,.07) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none;
}
.page-banner .container { position: relative; z-index: 1; }
.page-banner__title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #ffffff;
    margin: 0;
    letter-spacing: -.02em;
}
@media (min-width: 992px) {
    .page-banner { display: flex; }
}

/* Story Cards */
.story-card {
    background: #fff;
    border-radius: 1.25rem;
    box-shadow: 0 2px 16px rgba(10,71,76,0.08);
    overflow: hidden;
    margin-bottom: 2rem;
}
.story-card .story-img {
    width: 100%;
    height: 100%;
    min-height: 320px;
    object-fit: cover;
}
.story-card .story-body {
    padding: 2.5rem 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
}
.story-card .quote-icon {
    font-size: 2.5rem;
    color: rgba(10,71,76,0.15);
    line-height: 1;
    margin-bottom: 1rem;
}
.story-card .story-title { color: #1a1a1a; font-size: 1.3rem; font-weight: 800; margin-bottom: 1rem; letter-spacing: 1px; }
.story-card .story-title span { color: #0A474C; }
.story-card .story-desc { color: #555; line-height: 1.8; font-size: 1rem; margin-bottom: 1.5rem; }
.story-card .story-author { font-weight: 700; color: #1a1a1a; margin-bottom: 2px; }
.story-card .story-designation { font-size: 0.85rem; color: #888; }
.story-divider {
    width: 50px; height: 3px;
    background: #0A474C;
    border-radius: 2px;
    margin-bottom: 1.25rem;
}
</style>
@endsection

@section('content')

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner__title">Testimonials</h1>
    </div>
</div>

<section class="py-5">
    <div class="container">

        {{-- Section Header --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase mb-3" style="font-size:clamp(1.6rem,3vw,2.2rem); color:#1a1a1a;">
                Stories of <span style="color:#0A474C;">Satisfaction</span>
            </h2>
            <div style="width:96px; height:4px; background:#0A474C; margin:0 auto 1.5rem;"></div>
            <p class="text-muted mx-auto" style="max-width:580px; line-height:1.7;">
                Real experiences from our students who achieved their dreams of studying abroad.
            </p>
        </div>

        {{-- Stories Loop --}}
        @foreach($stories as $index => $story)

        <div class="story-card">
            <div class="row g-0 align-items-stretch">

                @if($index % 2 == 0)
                {{-- Even: Image LEFT, Content RIGHT --}}
                <div class="col-12 col-lg-5">
                    <img src="{{ $story->image_url ?: asset('assets/img/placeholder.webp') }}"
                         alt="{{ $story->name }}"
                         class="story-img">
                </div>
                <div class="col-12 col-lg-7">
                    <div class="story-body">
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="story-divider"></div>
                        <h4 class="story-title text-uppercase">
                            {{ $story->title_1 }}
                            <span>{{ $story->title_2 }}</span>
                        </h4>
                        <p class="story-desc">{{ $story->description }}</p>
                        <div>
                            <p class="story-author mb-0">{{ $story->name }}</p>
                            <span class="story-designation">{{ $story->designation }}</span>
                        </div>
                    </div>
                </div>

                @else
                {{-- Odd: Content LEFT, Image RIGHT --}}
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <div class="story-body">
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="story-divider"></div>
                        <h4 class="story-title text-uppercase">
                            {{ $story->title_1 }}
                            <span>{{ $story->title_2 }}</span>
                        </h4>
                        <p class="story-desc">{{ $story->description }}</p>
                        <div>
                            <p class="story-author mb-0">{{ $story->name }}</p>
                            <span class="story-designation">{{ $story->designation }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 order-1 order-lg-2">
                    <img src="{{ $story->image_url ?: asset('assets/img/placeholder.webp') }}"
                         alt="{{ $story->name }}"
                         class="story-img">
                </div>

                @endif

            </div>
        </div>

        @endforeach

        @if($stories->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="fas fa-comment-slash fa-2x mb-3 d-block"></i>
            No stories found.
        </div>
        @endif

    </div>
</section>

@endsection