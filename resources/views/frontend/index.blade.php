@extends('layouts.app')
@section('title','Home')

@section('content')

<section>


    <!-- HERO SLIDER -->
    <div id="heroSlider">

        <!-- Slide 1 -->
        @foreach($slider as $item)
        <div class="slide active">
            <div class="slide-bg" style="background-image: url('{{ Storage::url($item->image) }}');">
            </div>
            <div class="slide-overlay"></div>
            <div class="container">
                <div class="slide-content">
                    <div class="badge-line"><i class="fas fa-graduation-cap" style="font-size:11px;"></i> {{$item->title}}</div>
                    <h1>{{$item->description}} <span>{{$item->description_2}}</span></h1>
                    <div class="text-divider"></div>
                    <p>{{$item->text}}</p>
                    <a href="{{url('apply-now')}}" class="btn-consult">
                        <span class="btn-clock-wrap">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9.5" />
                                <polyline points="12 7 12 12 15.5 14.5" />
                            </svg>
                        </span>
                        <span class="btn-consult-text">Book Free Consultation</span>
                        <span class="btn-arrow-wrap">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="4" y1="12" x2="20" y2="12" />
                                <polyline points="14 6 20 12 14 18" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach


        <!-- Prev / Next controls only — dots removed -->
        <div class="slider-controls">
            <button class="slider-btn" onclick="prevSlide()"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-btn" onclick="nextSlide()"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>


    <!-- about section -->
    <section class="about-section py-5 overflow-hidden">
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

    <!--YOUR DESTINATION  -->
    <section class="py-5 px-3">
        <div class="container-xl">

            <h2 class="section-title text-center mb-5">
                <span class="title-select">SELECT </span>
                <span class="title-your">YOUR </span>
                <span class="title-dest">DESTINATION</span>
            </h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">

                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?w=700&q=80"
                                alt="Australia" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/au.png" alt="AU" />
                                AUSTRALIA
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in Australia</h3>
                            <p>Australia is a top destination for international students, offering a world-class education system,
                                diverse cultural experiences, and a vibrant lifestyle. We have partner 10+ universities.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=700&q=80"
                                alt="UK" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/gb.png" alt="UK" />
                                UK
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in UK</h3>
                            <p>The UK is home to some of the world's oldest and most prestigious universities. Experience rich
                                history, multicultural cities, and globally recognised qualifications. 15+ partner universities.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=700&q=80"
                                alt="USA" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/us.png" alt="US" />
                                USA
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in USA</h3>
                            <p>The USA offers unparalleled research opportunities, cutting-edge technology campuses, and vibrant
                                student life. Choose from thousands of programs with our 20+ partner universities.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=700&q=80"
                                alt="Japan" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/jp.png" alt="JP" />
                                JAPAN
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in Japan</h3>
                            <p>Japan blends ancient tradition with futuristic innovation. Study at world-class institutions known for
                                science and engineering while immersing in a unique cultural experience. 8+ partners.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=700&q=80"
                                alt="New Zealand" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/nz.png" alt="NZ" />
                                NEW ZEALAND
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in New Zealand</h3>
                            <p>New Zealand offers stunning landscapes, a safe and welcoming environment, and internationally
                                recognised qualifications. Discover quality education with a relaxed lifestyle. 6+ partners.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=700&q=80"
                                alt="Malaysia" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/my.png" alt="MY" />
                                MALAYSIA
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in Malaysia</h3>
                            <p>Malaysia is a vibrant hub for international students in Asia, offering affordable world-class
                                education, a multicultural society, and modern facilities. We partner with 12+ top universities.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=700&q=80"
                                alt="Malaysia" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/my.png" alt="MY" />
                                MALAYSIA
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in Malaysia</h3>
                            <p>Malaysia is a vibrant hub for international students in Asia, offering affordable world-class
                                education, a multicultural society, and modern facilities. We partner with 12+ top universities.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=700&q=80"
                                alt="Malaysia" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/my.png" alt="MY" />
                                MALAYSIA
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in Malaysia</h3>
                            <p>Malaysia is a vibrant hub for international students in Asia, offering affordable world-class
                                education, a multicultural society, and modern facilities. We partner with 12+ top universities.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="dest-wrapper">
                        <a href="#" class="dest-card">
                            <img class="card-photo" src="https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?w=700&q=80"
                                alt="Malaysia" />
                            <div class="dest-label">
                                <img class="flag" src="https://flagcdn.com/w80/my.png" alt="MY" />
                                MALAYSIA
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3>Study in Malaysia</h3>
                            <p>Malaysia is a vibrant hub for international students in Asia, offering affordable world-class
                                education, a multicultural society, and modern facilities. We partner with 12+ top universities.</p>
                            <a href="#" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- View All Button -->
            <div class="text-center mt-5">
                <a href="#" class="btn-view-services">
                    <span class="sweep-bg"></span>
                    <span class="btn-text">View All</span>
                </a>
            </div>
        </div>
    </section>

    <!--  Our Services-->
    <section class="services-section">
        <div class="container">

            <!-- TOP ROW: Title + Button (desktop only) -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-5 gap-3">
                <h2 class="section-title mb-0">Our Services</h2>
                <a href="{{route('all-services')}}" class="btn-view-services d-none d-lg-inline-block">
                    <span class="sweep-bg"></span>
                    <span class="btn-text">View Services</span>
                </a>
            </div>

            <!-- MAIN ROW -->
            <div class="row g-4 align-items-stretch">

                <!-- LEFT: 2×2 Card Grid — col-lg-7 (কমানো হয়েছে) -->
                <div class="col-12 col-lg-6">
                    <div class="row g-4 h-100">

                        <!-- Card 1 -->
                        @foreach($services->take(4) as $item)
                        <div class="col-12 col-sm-6">
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


                    </div><!-- /row cards -->
                </div><!-- /col-lg-7 -->

                <!-- RIGHT: Image — col-lg-5 (বাড়ানো হয়েছে) -->
                <div class="col-12 col-lg-6 d-flex align-items-stretch">
                    <img src="{{Storage::url($setting->study_image)}}"
                        alt="{{$setting->company_name}}" class="services-image" />
                </div>
            </div><!-- /main row -->

            <!-- Button: mobile only, cards এর নিচে -->
            <div class="mt-3 d-lg-none">
                <a href="{{route('all-services')}}" class="btn-view-services">View Services</a>
            </div>
        </div><!-- /container -->
    </section>


    <!-- Your Journey -->
    <section class="steps-section">
        <div class="container-xl px-3 px-lg-4 px-xxl-5">

            <!-- Heading -->
            <div class="text-center">
                <h2 class="main-title py-4">Your Journey, <em>Step by Step</em></h2>
            </div>

            @php
            $chunks = $steps->chunk(5);
            @endphp

            @foreach($chunks as $chunkIndex => $chunk)
            <div class="row-box {{ !$loop->last ? 'mb-4' : '' }}">

                @if($chunkIndex % 2 == 0)
                <div class="snake-right"></div>
                @else
                <div class="snake-left"></div>
                @endif

                <div class="steps-flex">
                    @foreach($chunk as $step)
                    @php
                    $stepNumber = $loop->parent->iteration * 5 - 5 + $loop->iteration;
                    $isEvenRow = $chunkIndex % 2 != 0;
                    $arrowIcon = $isEvenRow ? '‹' : '›';
                    $isLast = $loop->last;
                    @endphp

                    <!-- Step {{ $stepNumber }} -->
                    <div class="step-col ic{{ $stepNumber }}">
                        <div class="step-card">
                            <div class="icon-circle">
                                @if($step->image)
                                <img src="{{ Storage::url($step->image) }}" alt="{{ $step->title }}" width="44" height="44"
                                    style="object-fit:contain;">
                                @endif
                            </div>
                            <div class="step-badge">{{ str_pad($stepNumber, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="step-label">{{ $step->title }}</div>
                            <div class="step-desc">{{ $step->description }}</div>
                            <div class="card-dot"></div>
                        </div>
                    </div>

                    @if(!$isLast)
                    <div class="arrow-wrap d-none d-lg-flex">
                        <div class="arr-inner">
                            <div class="arr-dash"></div>
                            <div class="arr-btn">{{ $arrowIcon }}</div>
                            <div class="arr-dash"></div>
                        </div>
                    </div>
                    @endif

                    @endforeach
                </div>
            </div>
            @endforeach

        </div>
    </section>

<!--testimonial-section  -->
    <section class="testimonial-section py-5">
        <div class="container">
            <div class="row align-items-center bg-white p-4 p-md-5 rounded-4 shadow-sm">

                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="image-grid-container">
                        <div class="main-img-wrapper">
                            <img src="{{ $stories->isNotEmpty() && $stories->first()->image ? Storage::url($stories->first()->image) : './assets/img/about us/SHEC-STUDENT-TESTIMONIALS.webp' }}"
                                alt="Success Student" id="main-img" class="img-fluid rounded-4"
                                style="width:100%; height:380px; object-fit:cover;">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 ps-lg-5">
                    <div class="testimonial-content">

                        <h2 class="text-uppercase fw-bold mb-4" style="letter-spacing: 2px;">
                            <span id="title-1">{{ $stories->isNotEmpty() ? $stories->first()->title_1 : 'STORIES OF' }}</span>
                            <span class="text-danger" id="title-2">{{ $stories->isNotEmpty() ? $stories->first()->title_2 : 'SATISFACTION' }}</span>
                        </h2>

                        @if($stories->isNotEmpty())
                        <div class="quote-area">
                            <i class="fas fa-quote-left display-4 text-light-gray mb-3 d-block"></i>

                            <p class="fs-5 text-secondary lh-lg mb-4" id="quote-text">
                                {{ $stories->first()->description }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <div>
                                    <h5 class="fw-bold mb-0" id="author-name">{{ $stories->first()->name }}</h5>
                                    <small class="text-muted" id="visa-type">{{ $stories->first()->designation }}</small>
                                </div>

                                <div class="nav-controls d-flex align-items-center gap-3">
                                    <span class="text-muted fw-bold" id="current-num">01</span>
                                    <button id="btn-next-slide" class="btn-next-simple">
                                        Next <i class="fas fa-chevron-right ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Testimonial JS — inline এখানেই, @section('js') তে না --}}
    <script>
        (function() {
            var stories = [];
            @foreach($stories as $s)
            stories.push({
                name:        "{{ addslashes($s->name) }}",
                designation: "{{ addslashes($s->designation) }}",
                title_1:     "{{ addslashes($s->title_1) }}",
                title_2:     "{{ addslashes($s->title_2) }}",
                description: "{{ addslashes($s->description) }}",
                image:       "{{ $s->image_url }}"
            });
            @endforeach

            var current = 0;

            function setTransitions() {
                var transition = 'opacity .35s ease, transform .35s ease';
                ['quote-text','author-name','visa-type','title-1','title-2','current-num'].forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) el.style.transition = transition;
                });
                var img = document.getElementById('main-img');
                if (img) img.style.transition = 'opacity .35s ease';
            }

            function changeSlide() {
                if (stories.length <= 1) return;

                current = (current + 1) % stories.length;
                var s = stories[current];
                var ids = ['quote-text','author-name','visa-type','title-1','title-2','current-num'];

                // fade out
                ids.forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) { el.style.opacity = '0'; el.style.transform = 'translateY(8px)'; }
                });
                var mainImg = document.getElementById('main-img');
                if (mainImg) mainImg.style.opacity = '0';

                setTimeout(function() {
                    var el;

                    el = document.getElementById('title-1');
                    if (el) el.textContent = s.title_1 || '';

                    el = document.getElementById('title-2');
                    if (el) el.textContent = s.title_2 || '';

                    el = document.getElementById('quote-text');
                    if (el) el.textContent = s.description || '';

                    el = document.getElementById('author-name');
                    if (el) el.textContent = s.name || '';

                    el = document.getElementById('visa-type');
                    if (el) el.textContent = s.designation || '';

                    el = document.getElementById('current-num');
                    if (el) el.textContent = String(current + 1).padStart(2, '0');

                    var img = document.getElementById('main-img');
                    if (img) {
                        if (s.image) img.src = s.image;
                        img.style.opacity = '1';
                    }

                    // fade in
                    ids.forEach(function(id) {
                        var el2 = document.getElementById(id);
                        if (el2) { el2.style.opacity = '1'; el2.style.transform = 'translateY(0)'; }
                    });

                }, 300);
            }

            // Button click bind — onclick attribute এর বদলে addEventListener
            var btn = document.getElementById('btn-next-slide');
            if (btn) btn.addEventListener('click', changeSlide);

            // Set transitions after DOM ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', setTransitions);
            } else {
                setTransitions();
            }
        })();
    </script>



    <!-- OUR PARTNER -->
    <section class="partner-section">
        <div>

            <h2 class="section-heading">OUR PARTNER <span>UNIVERSITIES</span></h2>

            @if($partners->isNotEmpty())

            @php
                $row1 = $partners->take((int)ceil($partners->count() / 2));
                $row2 = $partners->skip((int)ceil($partners->count() / 2));
            @endphp

            <!-- ══════ ROW 1 — Right to Left ══════ -->
            <div class="marquee-outer">
                <div class="marquee-track rtl">

                    {{-- Original --}}
                    @foreach($row1 as $partner)
                    <div class="logo-card">
                        <img class="logo-img" src="{{ Storage::url($partner->image) }}" alt="{{ $partner->name }}"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block';" />
                        <span class="fallback-badge" style="display:none;">{{ $partner->name }}</span>
                    </div>
                    @endforeach

                    {{-- Seamless duplicate --}}
                    @foreach($row1 as $partner)
                    <div class="logo-card">
                        <img class="logo-img" src="{{ Storage::url($partner->image) }}" alt="{{ $partner->name }}"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block';" />
                        <span class="fallback-badge" style="display:none;">{{ $partner->name }}</span>
                    </div>
                    @endforeach

                </div>
            </div><!-- /row1 -->

            <!-- ══════ ROW 2 — Left to Right ══════ -->
            <div class="marquee-outer">
                <div class="marquee-track ltr">

                    {{-- Original --}}
                    @foreach($row2 as $partner)
                    <div class="logo-card">
                        <img class="logo-img" src="{{ Storage::url($partner->image) }}" alt="{{ $partner->name }}"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block';" />
                        <span class="fallback-badge" style="display:none;">{{ $partner->name }}</span>
                    </div>
                    @endforeach

                    {{-- Seamless duplicate --}}
                    @foreach($row2 as $partner)
                    <div class="logo-card">
                        <img class="logo-img" src="{{ Storage::url($partner->image) }}" alt="{{ $partner->name }}"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block';" />
                        <span class="fallback-badge" style="display:none;">{{ $partner->name }}</span>
                    </div>
                    @endforeach

                </div>
            </div><!-- /row2 -->

            @endif

        </div>
    </section>

    <!-- from  -->
    <section class="py-5 px-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">

                    <div class="form-card p-4 p-md-5">
                        <div class="position-relative" style="z-index:1">

                            <!-- Heading -->
                            <div class="text-center mb-5">
                                <span class="badge-pill mb-3 d-inline-block">Start Your Journey</span>
                                <h2 class="fw-bold mb-3" style="font-size:clamp(1.8rem,4vw,2.8rem);color:#024465;">
                                    Let us assist you!
                                </h2>
                                <p class="text-secondary mx-auto" style="max-width:640px;line-height:1.7;">
                                    Share your details, and our expert counselors will reach out to guide you toward the ideal course, university, destination, and scholarship options.
                                </p>
                            </div>

                            <!-- Form -->
                            <form action="#" method="POST">
                                <input type="hidden" name="_token" value="">

                                <!-- Full Name -->
                                <div class="mb-4">
                                    <div class="input-wrapper">
                                        <div class="icon-box"><i class="fas fa-user"></i></div>
                                        <input type="text" name="name" placeholder="Full Name">
                                    </div>
                                </div>

                                <!-- Phone & Email -->
                                <div class="row g-4 mb-4">
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrapper">
                                            <div class="icon-box"><i class="fas fa-phone"></i></div>
                                            <input type="text" name="phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrapper">
                                            <div class="icon-box"><i class="fas fa-envelope"></i></div>
                                            <input type="text" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>

                                <!-- Education & GPA -->
                                <div class="row g-4 mb-4">
                                    <div class="col-12 col-lg-6">
                                        <div class="position-relative">
                                            <input type="hidden" name="education" id="education_value">
                                            <div class="input-wrapper" style="cursor:pointer;"
                                                onclick="toggleDropdown('education-dropdown','education-chevron')">
                                                <div class="icon-box"><i class="fas fa-graduation-cap"></i></div>
                                                <span class="dropdown-label" id="education-label">Education Level</span>
                                                <i class="fas fa-chevron-down chevron ms-2" id="education-chevron" style="color:#024465;font-size:.8rem;"></i>
                                            </div>
                                            <ul class="custom-dropdown-menu" id="education-dropdown">
                                                <li onclick="selectOption('education','SSC','SSC')">SSC</li>
                                                <li onclick="selectOption('education','HSC','HSC')">HSC</li>
                                                <li onclick="selectOption('education','Diploma','Diploma')">Diploma</li>
                                                <li onclick="selectOption('education','Bachelor','Bachelor')">Bachelor</li>
                                                <li onclick="selectOption('education','Masters','Masters')">Masters</li>
                                                <li onclick="selectOption('education','PhD','PhD')">PhD</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrapper">
                                            <div class="icon-box"><i class="fas fa-chart-line"></i></div>
                                            <input type="text" name="type" placeholder="GPA / CGPA">
                                        </div>
                                    </div>
                                </div>

                                <!-- Passing Year & Destination -->
                                <div class="row g-4 mb-4">
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrapper">
                                            <div class="icon-box"><i class="fas fa-calendar-alt"></i></div>
                                            <input type="text" name="type_passing_year" placeholder="Passing Year">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="position-relative">
                                            <input type="hidden" name="study_destination" id="destination_value">
                                            <div class="input-wrapper" style="cursor:pointer;"
                                                onclick="toggleDropdown('destination-dropdown','destination-chevron')">
                                                <div class="icon-box"><i class="fas fa-globe"></i></div>
                                                <span class="dropdown-label" id="destination-label">Study Destination</span>
                                                <i class="fas fa-chevron-down chevron ms-2" id="destination-chevron" style="color:#024465;font-size:.8rem;"></i>
                                            </div>
                                            <div class="custom-dropdown-menu" id="destination-dropdown">
                                                <div class="dropdown-search-wrap">
                                                    <div class="dropdown-search-inner">
                                                        <i class="fas fa-search"></i>
                                                        <input type="text" id="country-search" placeholder="Search country..."
                                                            onclick="event.stopPropagation()" oninput="filterCountries()">
                                                    </div>
                                                </div>
                                                <ul class="country-scroll list-unstyled mb-0" id="country-list">
                                                    <li onclick="selectCountry('Australia')" data-country="australia">Australia</li>
                                                    <li onclick="selectCountry('Denmark')" data-country="denmark">Denmark</li>
                                                    <li onclick="selectCountry('New Zealand')" data-country="new zealand">New Zealand</li>
                                                    <li onclick="selectCountry('Canada')" data-country="canada">Canada</li>
                                                    <li onclick="selectCountry('Finland')" data-country="finland">Finland</li>
                                                    <li onclick="selectCountry('Cyprus')" data-country="cyprus">Cyprus</li>
                                                    <li onclick="selectCountry('Malta')" data-country="malta">Malta</li>
                                                    <li onclick="selectCountry('Hungary')" data-country="hungary">Hungary</li>
                                                    <li onclick="selectCountry('Sweden')" data-country="sweden">Sweden</li>
                                                    <li onclick="selectCountry('China')" data-country="china">China</li>
                                                    <li onclick="selectCountry('Scotland')" data-country="scotland">Scotland</li>
                                                    <li onclick="selectCountry('Italy')" data-country="italy">Italy</li>
                                                    <li onclick="selectCountry('Estonia')" data-country="estonia">Estonia</li>
                                                    <li onclick="selectCountry('Croatia')" data-country="croatia">Croatia</li>
                                                    <li onclick="selectCountry('Malaysia')" data-country="malaysia">Malaysia</li>
                                                    <li onclick="selectCountry('Dubai')" data-country="dubai">Dubai</li>
                                                </ul>
                                                <div class="no-results" id="no-results">
                                                    <i class="fas fa-search fa-2x mb-2 d-block" style="color:#d1d5db;"></i>
                                                    No country found
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- English Proficiency & Overall Score -->
                                <div class="row g-4 mb-4">
                                    <div class="col-12 col-lg-6">
                                        <div class="position-relative">
                                            <input type="hidden" name="english_proficiency" id="proficiency_value">
                                            <div class="input-wrapper" style="cursor:pointer;"
                                                onclick="toggleDropdown('proficiency-dropdown','proficiency-chevron')">
                                                <div class="icon-box"><i class="fas fa-language"></i></div>
                                                <span class="dropdown-label" id="proficiency-label">English Proficiency</span>
                                                <i class="fas fa-chevron-down chevron ms-2" id="proficiency-chevron" style="color:#024465;font-size:.8rem;"></i>
                                            </div>
                                            <ul class="custom-dropdown-menu" id="proficiency-dropdown">
                                                <li onclick="selectOption('proficiency','IELTS','IELTS')">IELTS</li>
                                                <li onclick="selectOption('proficiency','TOEFL','TOEFL')">TOEFL</li>
                                                <li onclick="selectOption('proficiency','PTE','PTE')">PTE</li>
                                                <li onclick="selectOption('proficiency','DUOLINGO','DUOLINGO')">DUOLINGO</li>
                                                <li onclick="selectOption('proficiency','None','None')">None</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrapper">
                                            <div class="icon-box"><i class="fas fa-star"></i></div>
                                            <input type="text" name="overall_score" placeholder="Overall Score">
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit -->
                                <div class="pt-2">
                                    <button type="submit" class="btn-submit">
                                        <span>Submit Application</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>











</section>

@endsection


@section('js')

@endsection