@extends('layouts.app')
@section('title','Study Destinations')

@section('css')
<style>
:root { --primary: #0A474C; --primary-light: rgba(10,71,76,0.10); }

/* Hero Banner */
.hero-banner {
    position: relative; width: 100%;
    height: 500px; overflow: hidden;
    border-radius: 1rem; margin: 1.5rem 0;
}
@media(min-width:768px){ .hero-banner{ height: 600px; } }
.hero-banner img { width:100%; height:100%; object-fit:cover; }
.hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to right, rgba(136,19,55,0.70), rgba(88,28,135,0.50), rgba(14,165,233,0.40));
}
.hero-content {
    position: absolute; inset: 0; z-index: 2;
    display: flex; align-items: center; justify-content: center;
    text-align: center; padding: 0 1rem;
}
.hero-content h1 { font-size: clamp(2rem,6vw,4rem); font-weight:800; color:#fff; line-height:1.2; margin-bottom:1.25rem; }
.hero-content p  { font-size: clamp(1rem,2vw,1.2rem); color:rgba(255,255,255,0.95); max-width:600px; margin:0 auto 2rem; line-height:1.7; }
.btn-primary-custom {
    background: var(--primary); color:#fff; border:none;
    padding:14px 32px; border-radius:8px; font-weight:600; font-size:1rem;
    transition: all 0.3s; display:inline-block; text-decoration:none;
}
.btn-primary-custom:hover { background:#0d6068; color:#fff; transform:scale(1.05); }

/* Stats */
.stat-num { font-size:2.5rem; font-weight:800; color:var(--primary); }

/* Why Study Cards */
.why-card {
    background:#fff; border-radius:.75rem;
    box-shadow:0 2px 12px rgba(0,0,0,0.08);
    padding:1.5rem; border:1px solid #f0f0f0;
    transition: box-shadow 0.3s; height:100%;
    display:flex; flex-direction:column; align-items:center; text-align:center;
}
.why-card:hover { box-shadow:0 6px 24px rgba(0,0,0,0.12); }
.why-card .icon-wrap {
    width:56px; height:56px; border-radius:8px;
    background:#1e3a5f; display:flex; align-items:center; justify-content:center;
    margin-bottom:1rem;
}
.why-card .icon-wrap img { width:40px; height:40px; object-fit:contain; }
.why-card h3 { font-size:1rem; font-weight:700; color:#1a1a1a; margin-bottom:.5rem; }
.why-card p  { font-size:.875rem; color:#666; line-height:1.7; flex-grow:1; margin:0; }

/* University Cards */
.uni-card {
    background:#fff; border-radius:1.5rem;
    padding:1.5rem; box-shadow:0 4px 16px rgba(0,0,0,0.08);
    border:1px solid #f0f0f0; transition: all 0.5s;
    display:flex; flex-direction:column; align-items:center; text-align:center; height:100%;
}
.uni-card:hover {
    box-shadow:0 8px 32px rgba(10,71,76,0.15); transform:scale(1.05);
    border-color:rgba(10,71,76,0.3); background:rgba(10,71,76,0.04);
}
.uni-card img { width:80px; height:80px; border-radius:50%; object-fit:cover; margin-bottom:1rem; }
.uni-card h3 { font-size:1rem; font-weight:700; color:#1a1a1a; margin-bottom:.4rem;
    display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
.uni-card:hover h3 { color:var(--primary); }
.uni-card p  { font-size:.8rem; color:#888; margin:0; }

/* Admission Requirements */
.admission-card {
    background:#fff; border-radius:1rem;
    box-shadow:0 4px 16px rgba(0,0,0,0.08);
    padding:1.5rem; border-top:4px solid var(--primary);
    max-width:860px; margin:0 auto 3rem;
}
.admission-item { display:flex; align-items:center; margin-bottom:1rem; }
.admission-item:last-child { margin-bottom:0; }
.admission-icon {
    width:48px; height:48px; border-radius:8px; flex-shrink:0; margin-right:1rem;
    background:var(--primary-light); display:flex; align-items:center; justify-content:center;
}
.admission-icon img { width:24px; height:24px; object-fit:contain; }
.admission-item h3 { font-size:1.1rem; font-weight:700; color:#0A474C; margin:0; }

/* Book Free CTA Box */
.book-cta-box {
    background: var(--primary);
    border-radius:1rem; padding:2.5rem 2rem; text-align:center;
    max-width:860px; margin:0 auto;
}
.book-cta-box h3 { color:#fff; font-size:clamp(1.3rem,3vw,1.8rem); font-weight:800; margin-bottom:1rem; }
.book-cta-box p  { color:rgba(255,255,255,0.9); margin-bottom:1.5rem; }
.btn-white-custom {
    background:#fff; color:var(--primary); border:none;
    padding:14px 32px; border-radius:8px; font-weight:700;
    transition:all 0.3s; display:inline-block; text-decoration:none;
}
.btn-white-custom:hover { background:#f0f0f0; color:var(--primary); transform:scale(1.05); }

/* FAQ */
.faq-item { transition: background 0.3s, box-shadow 0.3s; }
.faq-item:hover { background-color:rgba(10,71,76,0.07) !important; box-shadow:0 4px 16px rgba(10,71,76,0.10); }
.accordion-button:not(.collapsed) { color:var(--primary) !important; background:transparent !important; box-shadow:none !important; }
.accordion-button:not(.collapsed)::after { filter:invert(25%) sepia(80%) saturate(600%) hue-rotate(155deg); }

/* CTA Section */
.cta-section {
    position:relative; border-radius:1rem; overflow:hidden;
    margin:3rem 0; min-height:400px; display:flex; align-items:center;
}
.cta-bg { position:absolute; inset:0; background-size:cover; background-position:center; }
.cta-overlay { position:absolute; inset:0; background:rgba(0,0,0,0.60); }
.cta-glow {
    position:absolute; width:700px; height:700px; border-radius:50%;
    background:rgba(10,71,76,0.65); filter:blur(80px);
    top:-50%; left:15%; z-index:1;
}
.cta-content { position:relative; z-index:2; text-align:center; width:100%; padding:3rem 1rem; }
.cta-content h1 { color:#fff; font-weight:800; font-size:clamp(1.8rem,5vw,3rem); line-height:1.2; margin-bottom:1rem; }
.cta-content p  { color:rgba(255,255,255,0.95); font-size:clamp(1rem,2.5vw,1.25rem); max-width:680px; margin:0 auto 2.5rem; line-height:1.7; }
.btn-cta-white {
    display:inline-flex; align-items:center; gap:10px;
    background:#fff; color:var(--primary); padding:14px 32px;
    border-radius:50px; font-weight:700; text-decoration:none; border:2px solid #fff; transition:all 0.3s;
}
.btn-cta-white:hover { background:var(--primary); color:#fff; transform:scale(1.05); }
.btn-cta-outline {
    display:inline-flex; align-items:center; gap:10px;
    background:transparent; color:#fff; padding:14px 32px;
    border-radius:50px; font-weight:700; text-decoration:none; border:2px solid #fff; transition:all 0.3s;
}
.btn-cta-outline:hover { background:#fff; color:var(--primary); transform:scale(1.05); }

/* Section divider */
.sec-divider { width:96px; height:4px; background:var(--primary); margin:0 auto 1.5rem; border:none; }
</style>
@endsection

@section('content')
<main class="container-xl px-3 px-md-4">

    {{-- Hero Banner --}}
    <div class="hero-banner">
        <img src="{{ Storage::url($firstStudy?->banner_image) }}"
             alt="Study in {{ $country->country }}">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div>
                <h1>Study in {{ $country->country }}</h1>
                <p>{{ $firstStudy?->short_description }}</p>
                <a href="{{ route('apply-now') }}" class="btn-primary-custom">
                    Book Free Counseling
                </a>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <section class="py-5">
        <div class="container" style="max-width:960px;">
            <div class="row text-center g-4">
                <div class="col-12 col-md-4">
                    <div class="p-4">
                        <div class="stat-num">{{ $firstStudy?->partner_university_count }}+</div>
                        <p class="text-secondary mt-1 mb-0">{{ $firstStudy?->partner_university_title }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="p-4">
                        <div class="stat-num">{{ $firstStudy?->students_enrolled_count }}+</div>
                        <p class="text-secondary mt-1 mb-0">{{ $firstStudy?->students_enrolled_title }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="p-4">
                        <div class="stat-num">{{ $firstStudy?->success_rate_count }}%</div>
                        <p class="text-secondary mt-1 mb-0">{{ $firstStudy?->success_rate_title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Study --}}
    <section class="py-4 px-2">
        <h2 class="text-center fw-semibold mb-3" style="font-size:clamp(1.4rem,3vw,2rem); color:#1a1a1a;">
            {{ $firstStudy?->title }}
            <span style="color:var(--primary);">{{ $country->country }}</span>
        </h2>
        <p class="text-center text-secondary mx-auto mb-5" style="max-width:900px; line-height:1.7; font-size:.95rem;">
            {{ $firstStudy?->description }}
        </p>

        <div class="row g-4 mb-5">
            @if(!empty($firstStudy?->studyItems) && $firstStudy->studyItems->count())
            @foreach($firstStudy->studyItems as $item)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="why-card">
                    <div class="icon-wrap">
                        <img src="{{ Storage::url($item->icon) }}" alt="{{ $item->title }}">
                    </div>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <div class="text-center">
            <a href="{{ route('apply-now') }}" class="btn-primary-custom" style="border-radius:50px;">
                Book Free Counseling
            </a>
        </div>
    </section>

    {{-- Top Universities --}}
    <section class="py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase mb-3" style="font-size:clamp(1.6rem,4vw,2.5rem); color:#1a1a1a;">
                Top Universities in
                <span style="color:var(--primary);">{{ $country->country }}</span>
            </h2>
            <p class="text-secondary mx-auto" style="max-width:700px; line-height:1.7;">
                {{ $overview->top_rated_universities_description }}
            </p>
        </div>

        <div class="row g-4 mb-5">
            @if(!empty($firstStudy?->topRateds) && $firstStudy->topRateds->count())
            @foreach($firstStudy->topRateds as $item)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="uni-card">
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}">
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>

    {{-- Admission Requirements --}}
    <section class="py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="font-size:clamp(1.4rem,3vw,2rem); color:#0A474C;">
                {{ $overview->admission_requirement_title }}
            </h2>
            <p class="text-secondary mx-auto" style="max-width:700px;">
                {{ $overview->admission_requirement_description }}
            </p>
        </div>

        <div class="admission-card">
            @if(!empty($firstStudy?->admissionRequirements) && $firstStudy->admissionRequirements->count())
            @foreach($firstStudy->admissionRequirements as $item)
            <div class="admission-item">
                <div class="admission-icon">
                    <img src="{{ Storage::url($item->icon) }}" alt="{{ $item->text }}">
                </div>
                <h3>{{ $item->text }}</h3>
            </div>
            @endforeach
            @endif
        </div>

        <div class="book-cta-box">
            <h3>{{ $overview->book_free_title }}</h3>
            <p>{{ $overview->book_free_description }}</p>
            <a href="{{ route('apply-now') }}" class="btn-white-custom">
                Book Free Counseling
            </a>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-5">
        <div class="container" style="max-width:860px;">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-uppercase mb-3" style="font-size:clamp(1.6rem,3vw,2rem); color:#1a1a1a;">
                    {{ $overview->frequently_asked_question_title }}
                    <span style="color:var(--primary);">{{ $overview->frequently_asked_question_title1 }}</span>
                </h2>
                <div class="sec-divider"></div>
                <p class="text-secondary mx-auto" style="max-width:560px; line-height:1.7;">
                    {{ $overview->frequently_asked_question_description }}
                </p>
            </div>

            <div class="accordion" id="faqAccordion">
                @if(!empty($firstStudy?->questions) && $firstStudy->questions->count())
                @foreach($firstStudy->questions as $index => $item)
                <div class="accordion-item faq-item mb-3 rounded-4 overflow-hidden border"
                     style="border-color:rgba(10,71,76,0.2) !important;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq{{ $index }}"
                                style="background:transparent; box-shadow:none; font-size:1rem; color:#1a1a1a;">
                            <i class="fas fa-user-plus me-3" style="color:var(--primary);"></i>
                            {{ $item->title }}
                        </button>
                    </h2>
                    <div id="faq{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary ps-5">
                            {{ $item->description }}
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

</main>
@endsection