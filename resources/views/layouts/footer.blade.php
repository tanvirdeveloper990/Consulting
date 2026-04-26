  <!-- Footer -->
 <!-- Modern Footer -->
{{--<footer class="bg-gradient-to-br from-secondary via-gray-800 to-secondary text-white">
  <!-- Main Footer Content -->
  <div class="container mx-auto px-4 md:px-6 lg:px-12 pt-16">
    
    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 mb-6">
      
      <!-- Office Address + Logo -->
      <div class="space-y-4">
       
        <!-- Logo (Moved Here) -->
        <div class="pt-2">
          <div class="border-2 border-primary bg-white rounded-2xl p-4 shadow-2xl inline-block">
            <img
              src="{{ Storage::url($setting->footer_logo)}}"
              alt="{{$setting->company_name}}"
              class="h-28 w-42 object-contain" />
          </div>
        </div>
        <div class="space-y-2 text-gray-300 leading-relaxed">
          <p class="font-semibold text-white">{{ \App\Helpers\TranslateHelper::translate($setting->company_name) }}</p>
          <p>{{ \App\Helpers\TranslateHelper::translate($setting->address) }}</p>
          <!-- <p>{{$setting->address_2}}</p>
          <p>{{$setting->address_3}}</p> -->
        </div>
        
        
      </div>

      <!-- Contact Us -->
      <div class="space-y-4">
        <h3 class="text-xl md:text-2xl font-bold text-primary mb-6 flex items-center gap-2">
          <i class="fas fa-phone-alt"></i>
         
          {{ \App\Helpers\TranslateHelper::translate(' Contact Us') }}
        </h3>
        <div class="space-y-4">
          
              <a href="tel:01717000311"
            class="flex items-center gap-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
            <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary transition-all duration-300">
              <i class="fas fa-phone text-primary group-hover:text-white text-sm"></i>
            </div>
            <span class="font-medium">{{$setting->phone_one}}</span>
          </a>
          
              <a href="tel:01907779899"
            class="flex items-center gap-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
            <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary transition-all duration-300">
              <i class="fas fa-phone text-primary group-hover:text-white text-sm"></i>
            </div>
            <span class="font-medium">{{$setting->phone_two}}</span>
          </a>
          
              <a href="mailto:info@advanced-study.com"
            class="flex items-center gap-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
            <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary transition-all duration-300">
              <i class="fas fa-envelope text-primary group-hover:text-white text-sm"></i>
            </div>
            <span class="font-medium break-all">{{$setting->email_one}}</span>
          </a>
           <div class="space-y-2 text-gray-300 leading-relaxed">
          <!-- <i class="fas fa-map-marker-alt"></i> -->
          <p>{{ \App\Helpers\TranslateHelper::translate($setting->address_2) }}</p>
          <p>{{ \App\Helpers\TranslateHelper::translate($setting->address_3) }}</p>
        </div>
        </div>
      </div>

      <!-- Quick Navigation -->
      <div class="space-y-4">
        <h3 class="text-xl md:text-2xl font-bold text-primary mb-6 flex items-center gap-2">
          <i class="fas fa-compass"></i>
         
          {{ \App\Helpers\TranslateHelper::translate(' Quick Navigation') }}
        </h3>
        <nav class="space-y-3">
          
           <a href="{{route('who-we-are')}}"
            class="block text-gray-300 hover:text-primary hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
            <i class="fas fa-chevron-right text-xs"></i>
            <span>{{ \App\Helpers\TranslateHelper::translate('Who We Are ') }}</span>
          </a>
          
              <a href="{{ route('index') }}#study_destination"
            class="block text-gray-300 hover:text-primary hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
            <i class="fas fa-chevron-right text-xs"></i>
            <span>{{ \App\Helpers\TranslateHelper::translate('Study Destinations') }}</span>
          </a>
          
              <a href="{{url('pages/privacy-policy')}}"
            class="block text-gray-300 hover:text-primary hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
            <i class="fas fa-chevron-right text-xs"></i>
            <span>{{ \App\Helpers\TranslateHelper::translate('Privacy Policy') }}</span>
          </a>
          
              <a href="{{url('pages/terms-and-condition')}}"
            class="block text-gray-300 hover:text-primary hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
            <i class="fas fa-chevron-right text-xs"></i>
            <span>{{ \App\Helpers\TranslateHelper::translate('Terms & Condition') }}</span>
          </a>
          
              <a href="{{route('contacts')}}"
            class="block text-gray-300 hover:text-primary hover:translate-x-2 transition-all duration-300 flex items-center gap-2">
            <i class="fas fa-chevron-right text-xs"></i>
            <span>{{ \App\Helpers\TranslateHelper::translate('Contact Us') }}</span>
          </a>
        </nav>
      </div>

      <!-- Google Map Location + Social Icons -->
      <div class="space-y-4">
        <h3 class="text-xl md:text-2xl font-bold text-primary mb-6 flex items-center gap-2">
          <i class="fas fa-map"></i>
          
          {{ \App\Helpers\TranslateHelper::translate('Find Us') }}
        </h3>
        <div class="space-y-4">
          <div class="bg-gray-800 rounded-2xl overflow-hidden shadow-xl border border-gray-700">
            <iframe
              src="{{$setting->google_maps}}"
              class="w-full h-32 border-0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
          
              <a href="https://shorturl.at/nvBH8"
            target="_blank"
            class="inline-flex items-center gap-2 text-gray-300 hover:text-primary transition-colors duration-300 group">
            <i class="fas fa-external-link-alt text-sm group-hover:rotate-12 transition-transform duration-300"></i>
            <span class="font-medium">{{ \App\Helpers\TranslateHelper::translate('View on Google Maps') }}</span>
          </a>
        </div>

        <!-- Social Media Icons (Moved Here) -->
        <div class="pt-4">
          <div class="flex items-center gap-4">
            
                <a href="{{$setting->facebook}}"
              target="_blank"
              class="w-12 h-12 bg-blue-600 hover:bg-blue-700 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300">
              <i class="fab fa-facebook-f text-white text-lg"></i>
            </a>
            
                <a href="{{$setting->youtube}}"
              target="_blank"
              class="w-12 h-12 bg-red-600 hover:bg-red-700 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300">
              <i class="fab fa-youtube text-white text-lg"></i>
            </a>
            
                <a href="{{$setting->instagram}}"
              target="_blank"
              class="w-12 h-12 bg-gradient-to-br from-purple-600 via-pink-600 to-orange-500 hover:from-purple-700 hover:via-pink-700 hover:to-orange-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300">
              <i class="fab fa-instagram text-white text-lg"></i>
            </a>
            
                <a href="{{$setting->linkedin}}"
              target="_blank"
              class="w-12 h-12 bg-blue-700 hover:bg-blue-800 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300">
              <i class="fab fa-linkedin-in text-white text-lg"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="border-t border-gray-700">
    <div class="container mx-auto px-4 md:px-6 lg:px-12 py-6">
      <div class="flex flex-col items-center justify-center text-center">
        <p class="text-gray-400 text-sm">
          © {{ date('Y') }}
          <span class="text-primary font-semibold"><a href="https://chowdhuryitsolutions.com" target="_blank">{{$setting->copyright}}</a></span>. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>--}}

  <!-- Floating Action Buttons Container -->
  {{--<div class="fixed bottom-0 left-0 right-0 pointer-events-none z-50">
    <!-- WhatsApp Button - Left Bottom -->
    @php
    $whatsappNumber = preg_replace('/[^0-9]/', '', $setting->phone_one);
    @endphp
    <a
      href="https://wa.me/{{$whatsappNumber}}"
      target="_blank"
      class="pointer-events-auto absolute bottom-[170px] right-6 md:bottom-[190px] md:right-8 w-14 h-14 md:w-16 md:h-16 bg-green-500 hover:bg-green-600 rounded-full shadow-lg hover:shadow-2xl flex items-center justify-center text-white hover-scale transition-all duration-300"
      aria-label="Contact us on WhatsApp">
      <!-- WhatsApp Icon SVG -->
      <svg
        class="w-7 h-7 md:w-8 md:h-8"
        fill="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path
          d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
      </svg>
    </a>

    <!-- Facebook Messenger Button - Right Bottom (above scroll button) -->
    @php
    $facebookUsername = str_replace(
    ['https://www.facebook.com/', 'https://facebook.com/', 'http://www.facebook.com/', 'http://facebook.com/', '/'],
    '',
    $setting->facebook
    );
    @endphp
    <a
      href="https://m.me/{{$facebookUsername}}"
      target="_blank"
      class="pointer-events-auto absolute bottom-24 right-6 md:bottom-28 md:right-8 w-14 h-14 md:w-16 md:h-16 bg-blue-600 hover:bg-blue-700 rounded-full shadow-lg hover:shadow-2xl flex items-center justify-center text-white hover-scale transition-all duration-300"
      aria-label="Message us on Facebook Messenger">
      <!-- Facebook Messenger Icon SVG -->
      <svg
        class="w-7 h-7 md:w-8 md:h-8"
        fill="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path
          d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.974 12-11.111C24 4.975 18.627 0 12 0zm1.193 14.963l-3.056-3.259-5.963 3.259L10.732 8l3.13 3.259L19.752 8l-6.559 6.963z" />
      </svg>
    </a>

    <!-- Scroll to Top Button - Right Bottom (your existing button) -->
    <button
      id="scrollToTopBtn"
      onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
      class="pointer-events-auto absolute bottom-6 right-6 md:bottom-8 md:right-8 w-14 h-14 md:w-16 md:h-16 bg-sky-500 hover:bg-sky-600 rounded-full shadow-lg hover:shadow-2xl flex items-center justify-center text-white hover-scale transition-all duration-300 opacity-0 invisible"
      aria-label="Scroll to top">
      <!-- Up Arrow Icon SVG -->
      <svg
        class="w-6 h-6 md:w-7 md:h-7"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
      </svg>
    </button>
  </div>

  <!-- Facebook SDK -->
  <div id="fb-root"></div>--}}