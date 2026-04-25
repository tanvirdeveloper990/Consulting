<style>
  .country-scroll::-webkit-scrollbar {
    width: 4px;
  }
  .country-scroll::-webkit-scrollbar-track {
    background: transparent;
  }
  .country-scroll::-webkit-scrollbar-thumb {
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 10px;
  }
  .country-scroll::-webkit-scrollbar-thumb:hover {
    background-color: rgba(255, 255, 255, 0.8);
  }
</style>

   
   
    <!-- Top Header Bar -->
    <div class="bg-primary border-b border-gray-200 hidden md:block">
      <div class="container mx-auto px-4">
        <div
          class="flex justify-between items-center py-2 text-sm text-gray-600">
          <form id="language-form" action="{{ route('setLocale') }}" method="POST">
            @csrf
            <div class="flex items-center">

              <button type="submit" name="locale" value="bn"
                class="bg-white text-secondary px-4 py-1 rounded-l-full font-medium text-sm transition-all duration-300">
                বাং
              </button>
              <button type="submit" name="locale" value="en"
                class="bg-white text-secondary px-4 py-1 rounded-r-full font-medium text-sm transition-all duration-300">
                Eng
              </button>
            </div>
          </form>
          <div class="flex gap-6">
            <a
              href="mailto:info@manusher.org"
              class="text-white transition-colors flex items-center gap-2">
              <svg
                class="w-4 h-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
              {{$setting->email_one}}
            </a>
            <a
              href="tel:880258053191"
              class="text-white transition-colors flex items-center gap-2">
              <svg
                class="w-4 h-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
              {{$setting->phone_one}}
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Navbar -->
    <!-- Main Navbar -->
    <nav id="navbar" class="bg-navbarBg sticky top-0 z-50 shadow-md">
      <div class="container mx-auto px-6 relative">

        <!-- Desktop Logo (Positioned Absolutely on Left) -->
        <div class="flex items-center absolute left-0 hidden lg:block z-10 ">
          <a href="{{url('/')}}" class="flex items-center">
            <div class="logo-container logo-large flex items-center justify-center ">
              <img
                src="{{ Storage::url($setting->header_logo)}}"
                alt="{{$setting->company_name}}"
                class="w-full h-full object-contain rounded-b-2xl" />
            </div>
          </a>
        </div>

        <!-- Main Content Container -->
        <div class="px-4 py-2">
          <div class="container mx-auto flex justify-between lg:justify-center items-center md:py-4">

            <!-- Mobile Logo (Shows on Mobile/Tablet Only) -->
            <div class="flex items-center lg:hidden">
              <a href="{{url('/')}}" class="flex items-center">
                <div class="w-16 h-16">
                  <img
                    src="{{ Storage::url($setting->header_logo)}}"
                    alt="{{$setting->company_name}}"
                    class="w-full h-full object-contain" />
                </div>
              </a>
            </div>

            <!-- Center Navigation Menu (Desktop Only) - Centered -->
            <div class="hidden lg:flex items-center space-x-8">
              <!-- Home -->
              <a
                href="{{url('/')}}"
                class="text-secondary font-normarl hover:text-primary transition-colors">

                {{ \App\Helpers\TranslateHelper::translate('Home') }}
              </a>

              
              
                            
              <!-- Abouts Us with Dropdown -->
              <div class="relative group">
                <a
                  href="#"
                  class="flex items-center gap-2 text-secondary font-normarl hover:text-primary transition-colors">

                  {{ \App\Helpers\TranslateHelper::translate('Abouts Us') }}
                  <svg
                    class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"></path>
                  </svg>
                </a>

                <!-- Dropdown Panel -->
                <div
                  class="dropdown-content absolute top-10 -left-4 mt-2 w-48 bg-secondary rounded-b-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 -translate-y-2 z-50">
                  <div class="">
                    <a href="{{ route('who-we-are') }}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Who we are') }}
                    </a>

                    <a href="{{ route('message') }}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Founder Message') }}
                    </a>
                  </div>
                </div>
              </div>
              
              
              
              

              <!--Countries -->
              <div class="relative group">
                <a
                  href="#"
                  class="flex items-center gap-2 text-secondary font-normarl hover:text-primary transition-colors">
                  {{ \App\Helpers\TranslateHelper::translate(' Countries') }}
                  <svg
                    class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"></path>
                  </svg>
                </a>

                <!-- Dropdown Panel -->
            <div class="dropdown-content absolute top-10 -left-4 mt-2 w-48 bg-secondary rounded-b-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 -translate-y-2 z-50">
            <div class="max-h-72 overflow-y-auto country-scroll">
                @foreach($countries as $item)

                    <a
                      href="{{ route('study.destination', $item->id) }}"
                      class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">
                      <img
                        src="{{ Storage::url($item->flag) }}"
                        alt=""
                        class="w-5 h-4" />
                      {{ \App\Helpers\TranslateHelper::translate($item->country) }}
                    </a>
                    @endforeach
                  </div>
                </div>
              </div>


              <!-- Our Services with Dropdown -->
              <div class="relative group">
                <a
                  href="#"
                  class="flex items-center gap-2 text-secondary font-normarl hover:text-primary transition-colors">

                  {{ \App\Helpers\TranslateHelper::translate(' Our Services') }}
                  <svg
                    class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"></path>
                  </svg>
                </a>

                <!-- Dropdown Panel -->
                <div
                  class="dropdown-content absolute top-10 -left-4 mt-2 w-48 bg-secondary rounded-b-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 -translate-y-2 z-50">
                  <div class="">
                    <a href="{{ route('services', 'university-admission') }}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('University Admission') }}
                    </a>

                    <a href="{{ route('services', 'work-permit') }}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Work Permit') }}
                    </a>

                    <a href="{{ route('services', 'language-program') }}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Language Program') }}
                    </a>

                    <a href="{{ route('services', 'others') }}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Others') }}
                    </a>

                  </div>
                </div>
              </div>
              
              
              
                <!--  Our Gallery with Dropdown -->
              <div class="relative group">
                <a
                  href="#"
                  class="flex items-center gap-2 text-secondary font-normarl hover:text-primary transition-colors">

                  {{ \App\Helpers\TranslateHelper::translate('Our Gallery') }}
                  <svg
                    class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"></path>
                  </svg>
                </a>

                <!-- Dropdown Panel -->
                <div
                  class="dropdown-content absolute top-10 -left-4 mt-2 w-48 bg-secondary rounded-b-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 -translate-y-2 z-50">
                  <div class="">
                    <a
                      href="{{route('galleries')}}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary hover:text-white transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Gallery') }}
                    </a>
                    <a
                      href="{{route('success-stories')}}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary hover:text-white transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Success Stories') }}
                    </a>
                    <a
                      href="{{route('verified-reviews')}}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary hover:text-white transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('verified Review') }}
                    </a>
                  </div>
                </div>
              </div>



              
              
              <!--  Success Stories with Dropdown -->
              <div class="relative group">
                <a
                  href="#"
                  class="flex items-center gap-2 text-secondary font-normarl hover:text-primary transition-colors">

                  {{ \App\Helpers\TranslateHelper::translate('Help Desk') }}
                  <svg
                    class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"></path>
                  </svg>
                </a>

                <!-- Dropdown Panel -->
                <div
                  class="dropdown-content absolute top-10 -left-4 mt-2 w-48 bg-secondary rounded-b-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 -translate-y-2 z-50">
                  <div class="">
                    <a
                      href="{{route('certificates')}}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary hover:text-white transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Certificates') }}
                    </a>
                    <a
                      href="{{route('career')}}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary hover:text-white transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Career') }}
                    </a>
                    <a
                      href="{{route('notice')}}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary hover:text-white transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Notice') }}
                    </a>
                    <a
                      href="{{route('contacts')}}"
                      class="flex items-center gap-2 px-6 py-3 text-sm text-white hover:bg-primary hover:text-white transition-colors">

                      {{ \App\Helpers\TranslateHelper::translate('Contact') }}
                    </a>
                  </div>
                </div>
              </div>
              
             

              <!-- Contact Us -->
              <!--<a-->
              <!--  href="{{route('contacts')}}"-->
              <!--  class="text-secondary font-normarl hover:text-primary transition-colors">-->

              <!--  {{ \App\Helpers\TranslateHelper::translate(' Contact Us') }}-->
              <!--</a>-->
            </div>

            <!-- Register Button - Positioned Absolutely on Right (Desktop Only) -->
            <div class="hidden lg:flex items-center absolute right-0">
              <a
                href="{{ route('apply-now')}}"
                class="bg-primary hover:bg-secondary text-white px-8 py-3 rounded-full font-normarl transition-all duration-300 hover:shadow-lg flex items-center gap-2 group">

                {{ \App\Helpers\TranslateHelper::translate('Register now') }}
                <svg
                  class="w-5 h-5 transition-transform group-hover:translate-x-1"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menuBtn" class="lg:hidden text-secondary">
              <svg
                class="w-7 h-7"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Mobile Sidebar -->
    <div
      id="sidebar"
      class="fixed top-0 left-0 h-full w-full bg-secondary text-gray-800 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden overflow-y-auto">
      <div class="p-6">
        <!-- Logo & Close Button -->
        <div class="flex items-center justify-between mb-8">
          <a href="{{url('/')}}">
            <img
              src="{{ Storage::url($setting->header_logo)}}"
              alt="{{$setting->company_name}}"
              class="w-24 h-12 object-contain" />
          </a>
          <button
            id="closeSidebar"
            class="text-white hover:text-primary transition-colors">
            <svg
              class="w-8 h-8"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <!-- Navigation Links -->
        <div class="space-y-1">
          <!-- Home -->
          <a
            href="{{url('/')}}"
            class="block py-3 px-4 text-white  hover:bg-white hover:text-primary transition-colors rounded-lg font-normarl">
            {{ \App\Helpers\TranslateHelper::translate('Home') }}
          </a>
          <!-- About Us -->
          <a
            href="{{route('service-support')}}"
            class="block py-3 px-4 text-white  hover:bg-white hover:text-primary transition-colors rounded-lg font-normarl">
            {{ \App\Helpers\TranslateHelper::translate('About Us') }}
          </a>



          <!--Countries with Dropdown -->
          <div>
            <button
              data-dropdown
              class="w-full flex items-center justify-between py-3 px-4 text-white  hover:bg-white hover:text-primary transition-colors rounded-lg font-normarl text-left">
              {{ \App\Helpers\TranslateHelper::translate(' Countries') }}
              <svg
                class="w-5 h-5 transition-transform duration-300"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <!-- Dropdown -->
            <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
            <div class="pl-2 space-y-1 py-2 max-h-64 overflow-y-auto country-scroll">
                @foreach($countries as $item)
                <a
                  href="{{ route('study.destination', $item->id) }}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">
                  <img
                    src="{{ Storage::url($item->flag) }}"
                    alt=""
                    class="w-5 h-4" />

                  {{ \App\Helpers\TranslateHelper::translate($item->country) }}
                </a>
                @endforeach

              </div>
            </div>
          </div>


          <!-- Our Services with Dropdown -->
          <div>
            <button
              data-dropdown
              class="w-full flex items-center justify-between py-3 px-4 text-white  hover:bg-white hover:text-primary transition-colors rounded-lg font-normarl text-left">

              {{ \App\Helpers\TranslateHelper::translate(' Our Services') }}
              <svg
                class="w-5 h-5 transition-transform duration-300"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <!-- Dropdown -->
            <div
              class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
              <div class="pl-2 space-y-1 py-2">

                <a href="{{ route('services', 'university-admission') }}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">
                  {{ \App\Helpers\TranslateHelper::translate('  University Admission') }}
                </a>

                <a href="{{ route('services', 'work-permit') }}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">

                  {{ \App\Helpers\TranslateHelper::translate('Work Permit') }}
                </a>

                <a href="{{ route('services', 'language-program') }}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">

                  {{ \App\Helpers\TranslateHelper::translate('Language Program') }}
                </a>

                <a href="{{ route('services', 'others') }}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">


                  {{ \App\Helpers\TranslateHelper::translate('Others') }}
                </a>
              </div>
            </div>
          </div>
          <!-- Our Services with Dropdown -->
          <div>
            <button
              data-dropdown
              class="w-full flex items-center justify-between py-3 px-4 text-white  hover:bg-white hover:text-primary transition-colors rounded-lg font-normarl text-left">

              {{ \App\Helpers\TranslateHelper::translate('Success Story') }}
              <svg
                class="w-5 h-5 transition-transform duration-300"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <!-- Dropdown -->
            <div
              class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
              <div class="pl-2 space-y-1 py-2">

                <a
                  href="{{route('galleries')}}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">

                  {{ \App\Helpers\TranslateHelper::translate('Gallery') }}
                </a>


                <a
                  href="{{route('certificates')}}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">
                  {{ \App\Helpers\TranslateHelper::translate('Certificates') }}

                </a>
                <a
                  href="{{route('career')}}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">
                  {{ \App\Helpers\TranslateHelper::translate('Career') }}

                </a>
                <a
                  href="{{route('notice')}}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">
                  {{ \App\Helpers\TranslateHelper::translate('Notice') }}

                </a>
                <a
                   href="{{route('message')}}"
                  class="flex items-center gap-2 px-6 py-3 text-white hover:bg-primary hover:text-white transition-colors">
                   {{ \App\Helpers\TranslateHelper::translate('Message') }}

                </a>
              </div>
            </div>
          </div>

          <!-- Services & Support -->
          <!-- <a
            href="{{route('service-support')}}"
            class="block py-3 px-4 text-white  hover:bg-white hover:text-primary transition-colors rounded-lg font-normarl">
            Services & Support
          </a> -->


          <!-- Contact Us -->
          <a
            href="{{route('service-support')}}"
            class="block py-3 px-4 text-white  hover:bg-white hover:text-primary transition-colors rounded-lg font-normarl">

            {{ \App\Helpers\TranslateHelper::translate('Contact Us') }}
          </a>


        </div>

        <!-- Apply Now Button -->
        <div class="mt-8">
          <a
            href="{{ route('apply-now')}}"
            class="flex items-center justify-center gap-2 w-full bg-primary  text-white px-6 py-3 rounded-full font-normarl transition-all group">
            {{ \App\Helpers\TranslateHelper::translate('Register now') }}
            <svg
              class="w-5 h-5 transition-transform group-hover:translate-x-1"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- End  Mobile sidebar  -->
    <!-- Navbar End -->