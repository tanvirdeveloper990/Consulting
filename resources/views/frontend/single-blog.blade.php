@extends('layouts.app')
@section('title','Study Destinations')

@section('css')

<style>
    :root {
        --primary: #0A474C;
        --primary-light: rgba(10, 71, 76, 0.10);
        --primary-hover: #083a3e;
    }

    .text-primary {
        color: var(--primary) !important;
    }

    .bg-primary-custom {
        background-color: var(--primary) !important;
    }

    .border-primary {
        border-color: var(--primary) !important;
    }

    /* Breadcrumb */
    .breadcrumb-item a {
        color: #555;
        text-decoration: none;
        transition: color 0.2s;
    }

    .breadcrumb-item a:hover {
        color: var(--primary);
    }

    .breadcrumb-item.active {
        color: #1a1a1a;
        font-weight: 500;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        color: #aaa;
    }

    /* Meta badges */
    .meta-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.875rem;
        color: #555;
    }

    .meta-badge i {
        color: var(--primary);
    }

    /* Tags */
    .tag-pill {
        display: inline-block;
        padding: 6px 16px;
        background: var(--primary-light);
        color: var(--primary);
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
    }

    .tag-pill:hover {
        background: var(--primary);
        color: #fff;
    }

    /* Quick Info Card */
    .quick-info-card {
        background: var(--primary);
        border-radius: 1rem;
        padding: 1.5rem;
        color: #fff;
    }

    .quick-info-card .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 0.75rem;
        margin-bottom: 0.75rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        font-size: 0.9rem;
    }

    .quick-info-card .info-row:last-of-type {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .quick-info-card .info-label {
        opacity: 0.85;
    }

    .quick-info-card .info-value {
        font-weight: 600;
    }

    .btn-apply-white {
        width: 100%;
        background: #fff;
        color: var(--primary);
        font-weight: 700;
        padding: 12px;
        border-radius: 8px;
        border: none;
        margin-top: 1.25rem;
        transition: background 0.2s;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-apply-white:hover {
        background: #f0f0f0;
        color: var(--primary);
    }

    /* Sidebar cards */
    .sidebar-card {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .sidebar-card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1a1a1a;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 1rem;
        margin-bottom: 1.25rem;
        border-bottom: 2px solid var(--primary);
    }

    .sidebar-card-title i {
        color: var(--primary);
    }

    /* Related topics */
    .related-link {
        display: block;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #f0f0f0;
        margin-bottom: 8px;
        text-decoration: none;
        transition: background 0.2s;
    }

    .related-link:hover {
        background: #f8f8f8;
    }

    .related-link span {
        color: #444;
        font-size: 0.875rem;
        font-weight: 500;
        transition: color 0.2s;
    }

    .related-link:hover span {
        color: var(--primary);
    }

    .related-link i {
        color: var(--primary);
        margin-right: 10px;
        width: 16px;
    }

    /* Recent updates */
    .recent-item {
        display: flex;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
    }

    .recent-item:hover {
        background: #fafafa;
    }

    .recent-item .date {
        font-size: 0.75rem;
        color: var(--primary);
        margin-bottom: 4px;
    }

    .recent-item h4 {
        font-size: 0.875rem;
        font-weight: 600;
        color: #1a1a1a;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .recent-item h4:hover {
        color: var(--primary);
    }

    /* CTA Section */
    .cta-section {
        position: relative;
        padding: 4rem 1rem;
        border-radius: 1rem;
        overflow: hidden;
        margin: 3rem 0;
        min-height: 400px;
        display: flex;
        align-items: center;
    }

    .cta-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
    }

    .cta-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.60);
    }

    .cta-glow {
        position: absolute;
        width: 700px;
        height: 700px;
        border-radius: 50%;
        background: rgba(10, 71, 76, 0.65);
        filter: blur(80px);
        top: -50%;
        left: 15%;
        z-index: 1;
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
        width: 100%;
    }

    .btn-cta-white {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        color: var(--primary);
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        border: 2px solid #fff;
        transition: all 0.3s;
    }

    .btn-cta-white:hover {
        background: var(--primary);
        color: #fff;
        transform: scale(1.05);
    }

    .btn-cta-outline {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: transparent;
        color: #fff;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        border: 2px solid #fff;
        transition: all 0.3s;
    }

    .btn-cta-outline:hover {
        background: #fff;
        color: var(--primary);
        transform: scale(1.05);
    }

    /* Hero image */
    .hero-img-wrap {
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        height: 320px;
    }

    @media(min-width:576px) {
        .hero-img-wrap {
            height: 380px;
        }
    }

    @media(min-width:992px) {
        .hero-img-wrap {
            height: 420px;
        }
    }

    .hero-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .featured-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: var(--primary);
        color: #fff;
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Article card */
    .article-card {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        padding: 2rem;
        margin-bottom: 1.5rem;
    }

    .article-meta {
        border-bottom: 2px solid var(--primary-light);
        padding-bottom: 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }

    .article-tags {
        border-top: 2px solid #eee;
        padding-top: 1.25rem;
        margin-top: 1.5rem;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }

    /* Contact counselor btn */
    .btn-counselor {
        width: 100%;
        background: var(--primary);
        color: #fff;
        font-weight: 600;
        padding: 12px;
        border-radius: 8px;
        border: none;
        transition: background 0.2s;
        cursor: pointer;
    }

    .btn-counselor:hover {
        background: var(--primary-hover);
    }

    /* Sticky sidebar */
    @media(min-width:992px) {
        .sticky-sidebar {
            position: sticky;
            top: 112px;
        }
    }
</style>

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

    {{-- Breadcrumb --}}
    <section class="bg-white border-bottom py-3 mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('news-updates') }}">News &amp; Updates</a>
                </li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </section>

    {{-- Main Content --}}
    <section class="py-4 py-md-5">
        <div class="row g-4">

            {{-- Left: Main Content --}}
            <div class="col-12 col-lg-8">

                {{-- Hero Image --}}
                <div class="hero-img-wrap mb-4">
                    <img src="{{ Storage::url($data->thumbnail_one) }}" alt="{{ $data->title }}">
                    <span class="featured-badge">
                        <i class="fas fa-star me-1"></i> Featured News
                    </span>
                </div>

                {{-- Article --}}
                <div class="article-card">
                    <h1 class="fw-bold mb-3" style="font-size:clamp(1.5rem,4vw,2.2rem); line-height:1.3; color:#1a1a1a;">
                        {{ $data->title }}
                    </h1>

                    {{-- Meta --}}
                    <div class="article-meta">
                        <span class="meta-badge">
                            <i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($data->story_date)->format('F d, Y') }}
                        </span>
                        <span class="meta-badge">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $data->country }}
                        </span>
                        <span class="meta-badge">
                            <i class="far fa-folder"></i>
                            {{ $data->story_post }}
                        </span>
                        <span class="meta-badge">
                            <i class="far fa-eye"></i>
                            {{ number_format($data->story_view) }}
                        </span>
                    </div>

                    {{-- Description --}}
                    <div class="prose-content">
                        {!! $data->description !!}
                    </div>

                    {{-- Tags --}}
                    <div class="article-tags">
                        <span class="fw-semibold text-secondary me-1">Tags:</span>
                        @php $tags = explode(',', $data->tags); @endphp
                        @foreach($tags as $tag)
                        <span class="tag-pill">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Right: Sidebar --}}
            <div class="col-12 col-lg-4">
                <div class="sticky-sidebar">

                    {{-- Quick Information --}}
                    <div class="quick-info-card mb-4">
                        <h3 class="fw-bold mb-4" style="font-size:1.1rem; display:flex; align-items:center; gap:8px;">
                            <i class="fas fa-info-circle"></i> Quick Information
                        </h3>
                        <div class="info-row">
                            <span class="info-label">Country</span>
                            <span class="info-value">{{ $data->country }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Study Level</span>
                            <span class="info-value">{{ $data->study_level }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Application Deadline</span>
                            <span class="info-value">{{ \Carbon\Carbon::parse($data->application_deadline)->format('M d, Y') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Intake</span>
                            <span class="info-value">{{ $data->intake }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Category</span>
                            <span class="info-value">{{ $data->category?->name }}</span>
                        </div>
                        <a href="{{ route('apply-now') }}" class="btn-apply-white">Apply Now</a>
                    </div>


                    {{-- Recent Updates --}}
                    <div class="sidebar-card">
                        <div class="sidebar-card-title">
                            <i class="fas fa-newspaper"></i> Recent Updates
                        </div>
                        @foreach($blogs as $item)
                        <div class="recent-item">
                            <img src="{{ Storage::url($item->thumbnail_one) }}" alt="{{ $item->title }}">
                            <div>
                                <p class="date"><i class="far fa-calendar-alt me-1"></i>{{ $item->story_date }}</p>
                                <a href="{{ route('blog.single', $item->slug) }}" style="text-decoration:none;">
                                    <h4>{{ $item->title }}</h4>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </section>


</main>

@endsection