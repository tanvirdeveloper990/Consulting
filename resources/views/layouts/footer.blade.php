  <!-- ══ MAIN FOOTER ══ -->
  <footer class="text-white" style="background:#022F44;">

    <!-- Main Footer Content -->
    <div class="container-xl px-4 px-md-5 pt-5">
      <div class="row g-5 mb-4">

        <!-- Col 1: Logo + Address -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="mb-4">
            <div class="d-inline-block p-3 bg-white rounded-3 shadow">
              <img s src="{{ Storage::url($setting->footer_logo)}}" alt="{{$setting->company_name}}"
                style="height:112px;width:auto;object-fit:contain;display:block;">
            </div>
          </div>
          <div class="text-white fw-semibold mb-1">{{$setting->address}}</div>
        </div>

        <!-- Col 2: Contact Us -->
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="fw-bold mb-4 d-flex align-items-center gap-2"
            style="color:#ffffff;font-size:clamp(1.1rem,1.5vw,1.4rem);">
            <i class="fas fa-phone-alt"></i> Contact Us
          </h3>
          <div class="d-flex flex-column gap-3">

            <a href="tel:+88{{$setting->phone_one}}"
              class="footer-contact-link d-flex align-items-center gap-3 text-decoration-none" style="color:#d1d5db;">
              <div class="footer-icon-box rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                style="width:40px;height:40px;background:#ffffff;">
                <i class="fas fa-phone" style="color:#0EA5E9;font-size:0.8rem;"></i>
              </div>
              <span class="fw-medium">{{$setting->phone_one}}</span>
            </a>



            <a href="mailto:eemc.dhaka@gmail.com"
              class="footer-contact-link d-flex align-items-center gap-3 text-decoration-none" style="color:#d1d5db;">
              <div class="footer-icon-box rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                style="width:40px;height:40px;background:#ffffff;">
                <i class="fas fa-envelope" style="color:#0EA5E9;font-size:0.8rem;"></i>
              </div>
              <span class="fw-medium text-break">{{$setting->email_one}}</span>
            </a>

            <div style="color:#d1d5db;line-height:1.7;">
              <p class="mb-0">{{$setting->address}}</p>
              <p class="mb-0">{{$setting->address_2}}</p>
              <p class="mb-0">{{$setting->address_3}}</p>
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
            <a href="{{route('about-us')}}" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>About Us</span>
            </a>
            <a href="{{ route('index') }}#study_destination" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>Study Destinations</span>
            </a>
            <a href="{{url('pages/privacy-policy')}}" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
              style="color:#d1d5db;">
              <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i><span>Privacy Policy</span>
            </a>
            <a href="{{url('pages/terms-and-condition')}}" class="footer-nav-link d-flex align-items-center gap-2 text-decoration-none"
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
              src="{{$setting->google_maps}}"
              class="w-full h-32 border-0"
              allowfullscreen=""
              loading="lazy"
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
            <a href="{{$setting->facebook}}" target="_blank"
              class="social-icon d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
              style="width:48px;height:48px;background:#2563EB;transition:all 0.3s;">
              <i class="fab fa-facebook-f fs-5"></i>
            </a>
            <a href="{{$setting->youtube}}" target="_blank"
              class="social-icon d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
              style="width:48px;height:48px;background:#DC2626;transition:all 0.3s;">
              <i class="fab fa-youtube fs-5"></i>
            </a>
            <a href="{{$setting->instagram}}" target="_blank"
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
           © {{ date('Y') }}
            <a href="https://chowdhuryitsolutions.com" target="_blank" class="fw-semibold text-decoration-none"
              style="color:#F8920D;">
              {{$setting->copyright}}
            </a>. All rights reserved.
          </p>
        </div>
      </div>
    </div>

  </footer>