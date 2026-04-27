@php
    $countries = App\Models\Country::where('status', 1)->get();
@endphp

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


   


@yield('js')
</body>
</html>