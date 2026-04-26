<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{ Storage::url($setting->favicon)}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">



@yield('css')
</head>

<body>


    @include('layouts.header')
    <main class="main">
        @yield('content')

    </main>
    @include('layouts.footer')
 


  <!-- ══ MAIN FOOTER ══ -->
  <footer class="text-white" style="background:#022F44;">

    <!-- Main Footer Content -->
    <div class="container-xl px-4 px-md-5 pt-5">
      <div class="row g-5 mb-4">

        <!-- Col 1: Logo + Address -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="mb-4">
            <div class="d-inline-block p-3 bg-white rounded-3 shadow">
              <img src="./assets/logo/footer-logo.jpg" alt="Excellent Education and Migration Centre"
                style="height:112px;width:auto;object-fit:contain;display:block;">
            </div>
          </div>
          <div class="text-white fw-semibold mb-1">Excellent Education and Migration Centre</div>
          <p class="mb-0" style="color:#d1d5db;">Excellent Education and Migration Centre</p>
        </div>

        <!-- Col 2: Contact Us -->
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="fw-bold mb-4 d-flex align-items-center gap-2"
            style="color:#ffffff;font-size:clamp(1.1rem,1.5vw,1.4rem);">
            <i class="fas fa-phone-alt"></i> Contact Us
          </h3>
          <div class="d-flex flex-column gap-3">

            <a href="tel:+8801890901611"
              class="footer-contact-link d-flex align-items-center gap-3 text-decoration-none" style="color:#d1d5db;">
              <div class="footer-icon-box rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                style="width:40px;height:40px;background:#ffffff;">
                <i class="fas fa-phone" style="color:#0EA5E9;font-size:0.8rem;"></i>
              </div>
              <span class="fw-medium">+8801890901611</span>
            </a>



            <a href="mailto:eemc.dhaka@gmail.com"
              class="footer-contact-link d-flex align-items-center gap-3 text-decoration-none" style="color:#d1d5db;">
              <div class="footer-icon-box rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                style="width:40px;height:40px;background:#ffffff;">
                <i class="fas fa-envelope" style="color:#0EA5E9;font-size:0.8rem;"></i>
              </div>
              <span class="fw-medium text-break">consulting@gmail.com</span>
            </a>

            <div style="color:#d1d5db;line-height:1.7;">
              <p class="mb-0">Suite:1302, Level:12, Shah Ali Plaza, Mirpur-10,</p>
              <p class="mb-0">Dhaka-1216, Bangladesh</p>
            </div>

          </div>
        </div>

        <!-- Col 3: Quick Navigation -->
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="fw-bold mb-4 d-flex align-items-center gap-2"
            style="color:#ffffff;font-size:clamp(1.1rem,1.5vw,1.4rem);">
            <i class="fas fa-compass"></i> Quick Navigation
          </h3>
          <nav class="d-flex flex-column gap-3">
            <a href="#" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>Who We Are</span>
            </a>
            <a href="#" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>Study Destinations</span>
            </a>
            <a href="#" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>Privacy Policy</span>
            </a>
            <a href="#" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>Terms &amp; Condition</span>
            </a>
            <a href="#" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>Contact Us</span>
            </a>
          </nav>
        </div>

        <!-- Col 4: Find Us + Social -->
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="fw-bold mb-4 d-flex align-items-center gap-2"
            style="color:#ffffff;font-size:clamp(1.1rem,1.5vw,1.4rem);">
            <i class="fas fa-map"></i> Find Us
          </h3>

          <!-- Map -->
          <div class="rounded-3 overflow-hidden mb-3" style="border:1px solid #374151;">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3363676855256!2d90.3664493748474!3d23.806635086616044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d692c00001%3A0x501c993338055ad0!2sExcellent%20Education%20and%20Migration%20Centre!5e0!3m2!1sen!2sbd!4v1769499081624!5m2!1sen!2sbd"
              width="100%" height="128" style="border:0;display:block;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>

          <!-- View on Maps link -->
          <a href="https://shorturl.at/nvBH8" target="_blank"
            class="footer-contact-link d-inline-flex align-items-center gap-2 text-decoration-none mb-4"
            style="color:#d1d5db;">
            <i class="fas fa-external-link-alt" style="font-size:0.85rem;"></i>
            <span class="fw-medium">View on Google Maps</span>
          </a>

          <!-- Social Icons -->
          <div class="d-flex align-items-center gap-3 pt-2 ms-3">
            <a href="#" target="_blank"
              class="social-icon d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
              style="width:48px;height:48px;background:#2563EB;transition:all 0.3s;">
              <i class="fab fa-facebook-f fs-5"></i>
            </a>
            <a href="#" target="_blank"
              class="social-icon d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
              style="width:48px;height:48px;background:#DC2626;transition:all 0.3s;">
              <i class="fab fa-youtube fs-5"></i>
            </a>
            <a href="#" target="_blank"
              class="social-icon d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
              style="width:48px;height:48px;background:linear-gradient(135deg,#9333EA,#EC4899,#F97316);transition:all 0.3s;">
              <i class="fab fa-instagram fs-5"></i>
            </a>
          </div>

        </div>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div style="border-top:1px solid #374151;">
      <div class="container-xl px-4 px-md-5 py-4">
        <div class="text-center">
          <p class="mb-0 text-sm" style="color:#9ca3af;font-size:0.875rem;">
            &copy; 2026
            <a href="https://chowdhuryitsolutions.com" target="_blank" class="fw-semibold text-decoration-none"
              style="color:#F8920D;">
              MAPS EDUCATION CONSULTANT
            </a>. All rights reserved.
          </p>
        </div>
      </div>
    </div>

  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- navbar js -->
  <script>
    // NAVBAR SCROLL
    const navbar = document.getElementById('mainNavbar');
    let isScrolled = false;
    window.addEventListener('scroll', () => {
      if (window.scrollY > 80) {
        if (!isScrolled) {
          isScrolled = true;
          navbar.classList.remove('slide-in');
          void navbar.offsetWidth;
          navbar.classList.add('scrolled', 'slide-in');
        }
      } else {
        isScrolled = false;
        navbar.classList.remove('scrolled', 'slide-in');
      }
    });

    // SIDEBAR
    function openSidebar() {
      document.getElementById('mobileSidebar').classList.add('open');
      document.getElementById('sidebarOverlay').classList.add('show');
      document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
      document.getElementById('mobileSidebar').classList.remove('open');
      document.getElementById('sidebarOverlay').classList.remove('show');
      document.body.style.overflow = '';
    }

    // SLIDER
    const slides = document.querySelectorAll('.slide');
    let current = 0, timer;
    function goToSlide(n) {
      slides[current].classList.remove('active');
      current = (n + slides.length) % slides.length;
      slides[current].classList.add('active');
      resetTimer();
    }
    function nextSlide() { goToSlide(current + 1); }
    function prevSlide() { goToSlide(current - 1); }
    function resetTimer() { clearInterval(timer); timer = setInterval(nextSlide, 6000); }
    resetTimer();
  </script>
  <!-- logo er js only desktope -->
  <script>
    // ===== LOGO SCROLL SHRINK — DESKTOP ONLY =====
    (function () {
      // শুধু ডেস্কটপে কাজ করবে
      function handleLogoScroll() {
        if (window.innerWidth < 992) return; // মোবাইল বাদ

        const logo = document.getElementById('navbar-logo');
        const navbar = document.querySelector('.navbar');

        if (!logo || !navbar) return;

        if (window.scrollY > 60) {
          logo.classList.add('logo-scrolled');
          navbar.classList.add('navbar-scrolled');
        } else {
          logo.classList.remove('logo-scrolled');
          navbar.classList.remove('navbar-scrolled');
        }
      }

      window.addEventListener('scroll', handleLogoScroll, { passive: true });
      handleLogoScroll(); // পেজ লোডেই একবার চেক করো
    })();
    // 
    (function () {
      function handleLogoScroll() {
        if (window.innerWidth < 992) return;

        const logo = document.getElementById('navbar-logo');
        const logoLink = document.getElementById('logo-link'); /* ← নতুন */
        const navbar = document.querySelector('.navbar');

        if (!logo || !navbar) return;

        if (window.scrollY > 60) {
          logo.classList.add('logo-scrolled');
          logoLink.classList.add('logo-scrolled'); /* ← নতুন */
          navbar.classList.add('navbar-scrolled');
        } else {
          logo.classList.remove('logo-scrolled');
          logoLink.classList.remove('logo-scrolled'); /* ← নতুন */
          navbar.classList.remove('navbar-scrolled');
        }
      }

      window.addEventListener('scroll', handleLogoScroll, { passive: true });
      handleLogoScroll();
    })();
  </script>
  <!--count dawn js  -->
  <script>
    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    const runCounter = () => {
      counters.forEach(counter => {
        const updateCount = () => {
          const target = +counter.getAttribute('data-target');
          const count = +counter.innerText.replace(/,/g, '');
          const inc = target / speed;

          if (count < target) {
            counter.innerText = Math.ceil(count + inc).toLocaleString();
            setTimeout(updateCount, 15);
          } else {
            counter.innerText = target.toLocaleString();
          }
        };
        updateCount();
      });
    };

    // Start counter when section is visible
    const observer = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting) {
        runCounter();
        observer.disconnect();
      }
    }, { threshold: 0.5 });

    observer.observe(document.querySelector('.about-section'));
  </script>

  <!-- from js -->
  <script>
    function toggleDropdown(menuId, chevronId) {
      const menu    = document.getElementById(menuId);
      const chevron = document.getElementById(chevronId);
      const isOpen  = menu.classList.contains('show');
      document.querySelectorAll('.custom-dropdown-menu').forEach(m => m.classList.remove('show'));
      document.querySelectorAll('.chevron').forEach(c => c.classList.remove('open'));
      if (!isOpen) {
        menu.classList.add('show');
        if (chevron) chevron.classList.add('open');
      }
    }
  
    function selectOption(type, value, label) {
      document.getElementById(type + '_value').value = value;
      const lbl = document.getElementById(type + '-label');
      lbl.textContent = label;
      lbl.classList.add('selected');
      document.getElementById(type + '-dropdown').classList.remove('show');
      document.getElementById(type + '-chevron').classList.remove('open');
    }
  
    function selectCountry(value) {
      document.getElementById('destination_value').value = value;
      const lbl = document.getElementById('destination-label');
      lbl.textContent = value;
      lbl.classList.add('selected');
      document.getElementById('destination-dropdown').classList.remove('show');
      document.getElementById('destination-chevron').classList.remove('open');
      document.getElementById('country-search').value = '';
      filterCountries();
    }
  
    function filterCountries() {
      const q     = document.getElementById('country-search').value.toLowerCase();
      const items = document.querySelectorAll('#country-list li');
      let   found = 0;
      items.forEach(li => {
        const match = li.dataset.country.includes(q);
        li.style.display = match ? '' : 'none';
        if (match) found++;
      });
      document.getElementById('no-results').style.display = found ? 'none' : 'block';
    }
  
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.position-relative')) {
        document.querySelectorAll('.custom-dropdown-menu').forEach(m => m.classList.remove('show'));
        document.querySelectorAll('.chevron').forEach(c => c.classList.remove('open'));
      }
    });
  </script>


 @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    @endif


@yield('js')
</body>
</html>