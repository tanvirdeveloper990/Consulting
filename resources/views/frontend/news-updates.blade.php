@extends('layouts.app')
@section('title','News And Updates')

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
        <h1 class="page-banner__title">Blogs & Events</h1>
    </div>
</div>

<main class="container-xl px-3 px-md-4">




    <section class="py-5">
        <div class="container">

            {{-- Section Header --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold text-uppercase mb-3" style="font-size:clamp(1.8rem,4vw,2.5rem); color:#1a1a1a;">
                    {{ $overview->news_and_updates_title }}
                    <span style="color:var(--primary);">{{ $overview->news_and_updates_title1 }}</span>
                </h2>
                <div class="section-divider"></div>
                <p class="text-muted mx-auto" style="max-width:680px; font-size:1rem; line-height:1.7;">
                    {{ $overview->news_and_updates_description }}
                </p>
            </div>

            {{-- Cards Grid --}}
            <div class="row g-4 px-2 px-lg-4">
                @foreach($blogs as $blog)
                <div class="col-12 col-lg-6">
                    <div class="bg-white h-100 border rounded-4 overflow-hidden"
                        style="border-color:#e8e8e8 !important; transition: all 0.5s;"
                        onmouseover="this.style.boxShadow='0 8px 32px rgba(10,71,76,0.13)'; this.style.borderColor='rgba(10,71,76,0.2)';"
                        onmouseout="this.style.boxShadow='none'; this.style.borderColor='#e8e8e8';">
                        <div class="row g-0 h-100">

                            {{-- Left: Text Content --}}
                            <div class="col-12 col-md-7 p-4 d-flex flex-column justify-content-between">
                                <div>
                                    {{-- Location --}}
                                    <div class="d-flex align-items-center gap-2 mb-2 small text-secondary">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <strong class="text-dark">{{ $blog->country }}</strong>
                                    </div>

                                    {{-- Date --}}
                                    <div class="d-flex align-items-center gap-2 mb-3 small text-secondary">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($blog->story_date)->format('F d, Y') }}
                                    </div>

                                    {{-- Title --}}
                                    <a href="{{ route('blog.single', $blog->slug) }}" class="text-decoration-none">
                                        <h5 class="fw-bold mb-3 lh-sm"
                                            style="color:#1a1a1a; transition: color 0.3s;"
                                            onmouseover="this.style.color='#0A474C'"
                                            onmouseout="this.style.color='#1a1a1a'">
                                            {{ $blog->title }}
                                        </h5>

                                        {{-- Description --}}
                                        <p class="text-secondary small lh-lg"
                                            style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                                            {{ $blog->short_description }}
                                        </p>
                                    </a>
                                </div>
                            </div>

                            {{-- Right: Image --}}
                            <div class="col-12 col-md-5 d-flex align-items-end justify-content-center p-4">
                                <a href="{{ route('blog.single', $blog->slug) }}">
                                    <img src="{{ Storage::url($blog->thumbnail_one) }}"
                                        alt="{{ $blog->title }}"
                                        class="rounded-3 shadow"
                                        style="width:160px; height:210px; object-fit:cover; transition: transform 0.5s;"
                                        onmouseover="this.style.transform='scale(1.05)'"
                                        onmouseout="this.style.transform='scale(1)'">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

</main>

@endsection