@extends('layouts.app')

@section('title','Contact Us')

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
    background-image: radial-gradient(rgba(255,255,255,.07) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none;
}
.srv-banner .container { position: relative; z-index: 1; text-align: center; }
.srv-banner__title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #ffffff;
    margin: 0;
    letter-spacing: -.02em;
    text-align: center;
}
@media (min-width: 992px) {
    .srv-banner { display: flex; }
}

/* Dropdown fix — max-height + scroll */
.custom-dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 999;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,.1);
    max-height: 220px;
    overflow-y: auto;
    margin-top: 4px;
}
.custom-dropdown-menu li {
    padding: 10px 18px;
    cursor: pointer;
    list-style: none;
    font-size: .95rem;
    color: #374151;
    transition: background .15s;
}
.custom-dropdown-menu li:hover {
    background: rgba(0, 184, 212, .1);
    color: #0A474C;
}

/* Success toast */
.success-toast {
    position: fixed;
    top: 24px;
    right: 24px;
    z-index: 9999;
    background: #0A474C;
    color: #fff;
    padding: 16px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: .95rem;
    box-shadow: 0 8px 24px rgba(0,0,0,.15);
    display: flex;
    align-items: center;
    gap: 10px;
    animation: toastIn .3s ease;
}
@keyframes toastIn {
    from { opacity: 0; transform: translateY(-12px); }
    to   { opacity: 1; transform: translateY(0); }
}


.form-card,
.form-card *,
.row,
.col-12,
.col-lg-6 {
    overflow: visible !important;
}

.custom-dropdown-menu {
    display: none;
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    right: 0;
    z-index: 9999 !important;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0,0,0,.12);
    max-height: 240px;
    overflow-y: auto !important;
    -webkit-overflow-scrolling: touch;
}

.custom-dropdown-menu li {
    padding: 11px 18px;
    cursor: pointer;
    list-style: none;
    font-size: .95rem;
    color: #374151;
    border-bottom: 1px solid #f9fafb;
}

.custom-dropdown-menu li:last-child { border-bottom: none; }

.custom-dropdown-menu li:hover {
    background: rgba(0,184,212,.1);
    color: #0A474C;
}
</style>
@endsection

@section('content')

    <!-- Success Toast -->
    @if(session('success'))
    <div class="success-toast" id="successToast">
        <i class="fas fa-check-circle" style="color:#00B8D4;font-size:1.2rem;"></i>
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            var t = document.getElementById('successToast');
            if (t) t.style.display = 'none';
        }, 4000);
    </script>
    @endif

    <!-- PAGE BANNER (desktop only) -->
    <div class="srv-banner">
        <div class="container">
            <h1 class="srv-banner__title">Contact Us</h1>
        </div>
    </div>

    <!-- Mobile Title -->
    <div class="d-flex d-lg-none flex-wrap justify-content-center text-center mb-4 mt-5 p-2">
        <h2 class="section-title mb-0">Contact Us</h2>
    </div>

    <!-- form  -->
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
                                    {{ $overview->apply_title ?? 'Let us assist you!' }}
                                </h2>
                                <p class="text-secondary mx-auto" style="max-width:640px;line-height:1.7;">
                                    {{ $overview->apply_description ?? 'Share your details, and our expert counselors will reach out to guide you.' }}
                                </p>
                            </div>

                            <!-- Form -->
                            <form action="{{ route('apply-store') }}" method="POST">
                                @csrf

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
                                                onclick="toggleDropdown('education-dropdown')">
                                                <div class="icon-box"><i class="fas fa-graduation-cap"></i></div>
                                                <span class="dropdown-label" id="education-label">Education Level</span>
                                                <i class="fas fa-chevron-down ms-auto" style="color:#024465;font-size:.8rem;"></i>
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
                                                onclick="toggleDropdown('destination-dropdown')">
                                                <div class="icon-box"><i class="fas fa-globe"></i></div>
                                                <span class="dropdown-label" id="destination-label">Study Destination</span>
                                                <i class="fas fa-chevron-down ms-auto" style="color:#024465;font-size:.8rem;"></i>
                                            </div>
                                            <div class="custom-dropdown-menu" id="destination-dropdown" style="max-height:260px;">
                                                <div style="padding:10px 12px;border-bottom:1px solid #f0f0f0;position:sticky;top:0;background:#fff;">
                                                    <div style="display:flex;align-items:center;background:#f8f9fa;border-radius:8px;padding:6px 12px;gap:8px;">
                                                        <i class="fas fa-search" style="color:#9ca3af;font-size:.8rem;"></i>
                                                        <input type="text" id="country-search" placeholder="Search country..."
                                                            style="border:none;background:transparent;outline:none;width:100%;font-size:.9rem;"
                                                            onclick="event.stopPropagation()" oninput="filterCountries()">
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled mb-0" id="country-list">
                                                    @foreach($country as $item)
                                                    <li onclick="selectCountry('{{ $item->country }}')"
                                                        data-country="{{ strtolower($item->country) }}"
                                                        style="padding:10px 18px;cursor:pointer;font-size:.95rem;color:#374151;transition:background .15s;"
                                                        onmouseover="this.style.background='rgba(0,184,212,.1)'"
                                                        onmouseout="this.style.background=''">
                                                        {{ $item->country }}
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div id="no-results" style="display:none;text-align:center;padding:16px;color:#9ca3af;font-size:.9rem;">
                                                    <i class="fas fa-search d-block mb-1"></i> No country found
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
                                                onclick="toggleDropdown('proficiency-dropdown')">
                                                <div class="icon-box"><i class="fas fa-language"></i></div>
                                                <span class="dropdown-label" id="proficiency-label">English Proficiency</span>
                                                <i class="fas fa-chevron-down ms-auto" style="color:#024465;font-size:.8rem;"></i>
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

@endsection

@section('js')
<script>
    function toggleDropdown(id) {
        var allDropdowns = document.querySelectorAll('.custom-dropdown-menu');
        allDropdowns.forEach(function(drop) {
            if (drop.id !== id) drop.style.display = 'none';
        });
        var el = document.getElementById(id);
        el.style.display = (el.style.display === 'block') ? 'none' : 'block';

        if (id === 'destination-dropdown' && el.style.display === 'block') {
            document.getElementById('country-search').value = '';
            filterCountries();
            setTimeout(function() {
                document.getElementById('country-search').focus();
            }, 100);
        }
    }

    function selectOption(type, value, label) {
        if (type === 'education') {
            document.getElementById('education_value').value = value;
            document.getElementById('education-label').innerText = label;
            document.getElementById('education-dropdown').style.display = 'none';
        }
        if (type === 'proficiency') {
            document.getElementById('proficiency_value').value = value;
            document.getElementById('proficiency-label').innerText = label;
            document.getElementById('proficiency-dropdown').style.display = 'none';
        }
    }

    function selectCountry(country) {
        document.getElementById('destination_value').value = country;
        document.getElementById('destination-label').innerText = country;
        document.getElementById('destination-dropdown').style.display = 'none';
    }

    function filterCountries() {
        var search = document.getElementById('country-search').value.toLowerCase();
        var items = document.querySelectorAll('#country-list li');
        var visible = 0;
        items.forEach(function(item) {
            var name = item.getAttribute('data-country') || '';
            if (name.includes(search)) {
                item.style.display = '';
                visible++;
            } else {
                item.style.display = 'none';
            }
        });
        document.getElementById('no-results').style.display = (visible === 0) ? 'block' : 'none';
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.position-relative')) {
            document.querySelectorAll('.custom-dropdown-menu').forEach(function(drop) {
                drop.style.display = 'none';
            });
        }
    });
</script>
@endsection