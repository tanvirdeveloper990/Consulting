@extends('layouts.app')
@section('title','Excellent | Apply')

@section('content')

<main class="container mx-auto">
<!-- Application Form Section -->
<section class="py-16 px-4">
  <div class="max-w-6xl mx-auto">

    <!-- Form Container -->
    <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden">
      
      <!-- Decorative Background Pattern -->
      <div class="absolute top-0 right-0 w-64 h-64 bg-primary opacity-5 rounded-full -mr-32 -mt-32"></div>
      <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary opacity-5 rounded-full -ml-48 -mb-48"></div>
      
      <!-- Form Content -->
      <div class="relative z-10 p-6 md:p-12">
        
        <!-- Heading -->
        <div class="text-center mb-12">
          <div class="inline-block bg-primary/10 text-primary px-6 py-2 rounded-full text-sm font-semibold mb-4">
            {{ \App\Helpers\TranslateHelper::translate('Start Your Journey') }}
          </div>
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            {{ \App\Helpers\TranslateHelper::translate($overview->apply_title) }}
          </h2>
          <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-3xl mx-auto">
            {{ \App\Helpers\TranslateHelper::translate($overview->apply_description) }}
          </p>
        </div>

        <!-- Form -->
        <form class="space-y-6" action="{{ route('apply-store') }}" method="POST">
          @csrf
          
          <!-- Full Name (Full Width) -->
          <div class="relative group">
            <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 focus-within:border-primary focus-within:shadow-md">
              <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="fas fa-user text-primary text-lg"></i>
              </div>
              <input type="text" placeholder="{{ \App\Helpers\TranslateHelper::translate('Full Name') }}" name="name"
                class="w-full text-gray-800 outline-none font-medium bg-transparent placeholder-gray-400" />
            </div>
          </div>

          <!-- Phone and Email Row -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Phone Number -->
            <div class="relative group">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 focus-within:border-primary focus-within:shadow-md">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-phone text-primary text-lg"></i>
                </div>
                <input type="text" placeholder="{{ \App\Helpers\TranslateHelper::translate('Phone Number') }}" name="phone"
                  class="w-full text-gray-800 outline-none font-medium bg-transparent placeholder-gray-400" />
              </div>
            </div>

            <!-- Email -->
            <div class="relative group">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 focus-within:border-primary focus-within:shadow-md">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-envelope text-primary text-lg"></i>
                </div>
                <input type="text" placeholder="{{ \App\Helpers\TranslateHelper::translate('Email Address') }}" name="email"
                  class="w-full text-gray-800 outline-none font-medium bg-transparent placeholder-gray-400" />
              </div>
            </div>
          </div>

          <!-- Last Education and GPA Row -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Last Education Qualification -->
            <div class="relative group">
              <input type="hidden" name="education" id="education_value">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 cursor-pointer focus-within:border-primary focus-within:shadow-md"
                onclick="toggleDropdown('education-dropdown')">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-graduation-cap text-primary text-lg"></i>
                </div>
                <span class="w-full text-gray-400 outline-none font-medium" id="education-selected">{{ \App\Helpers\TranslateHelper::translate('Education Level') }}</span>
                <i class="fas fa-chevron-down text-primary text-sm ml-2 transition-transform group-hover:translate-y-0.5"></i>
              </div>
              <!-- Dropdown Menu -->
              <ul id="education-dropdown" class="hidden absolute z-10 w-full mt-2 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                <li onclick="selectValue('SSC')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('SSC') }}</li>
                <li onclick="selectValue('HSC')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('HSC') }}</li>
                <li onclick="selectValue('Diploma')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('Diploma') }}</li>
                <li onclick="selectValue('Bachelor')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('Bachelor') }}</li>
                <li onclick="selectValue('Masters')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('Masters') }}</li>
                <li onclick="selectValue('PhD')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('PhD') }}</li>
              </ul>
            </div>

            <!-- Type GPA/CGPA -->
            <div class="relative group">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 focus-within:border-primary focus-within:shadow-md">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-chart-line text-primary text-lg"></i>
                </div>
                <input type="text" placeholder="{{ \App\Helpers\TranslateHelper::translate('GPA / CGPA') }}" name="type"
                  class="w-full text-gray-800 outline-none font-medium bg-transparent placeholder-gray-400" />
              </div>
            </div>
          </div>

          <!-- Passing Year and Study Destination Row -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Type Passing Year -->
            <div class="relative group">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 focus-within:border-primary focus-within:shadow-md">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-calendar-alt text-primary text-lg"></i>
                </div>
                <input type="text" placeholder="{{ \App\Helpers\TranslateHelper::translate('Passing Year') }}" name="type_passing_year"
                  class="w-full text-gray-800 outline-none font-medium bg-transparent placeholder-gray-400" />
              </div>
            </div>

            <!-- Preferred Study Destination with Search -->
            <div class="relative group">
              <input type="hidden" name="study_destination" id="destination_value">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 cursor-pointer focus-within:border-primary focus-within:shadow-md"
                onclick="toggleDropdown('destination-dropdown')">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-globe text-primary text-lg"></i>
                </div>
                <span class="w-full text-gray-400 outline-none font-medium" id="destination-selected">{{ \App\Helpers\TranslateHelper::translate('Study Destination') }}</span>
                <i class="fas fa-chevron-down text-primary text-sm ml-2 transition-transform group-hover:translate-y-0.5"></i>
              </div>
              
              <!-- Dropdown Menu with Search -->
              <div id="destination-dropdown" class="hidden absolute z-10 w-full mt-2 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Search Input -->
                <div class="p-3 border-b border-gray-100 sticky top-0 bg-white">
                  <div class="flex items-center bg-gray-50 rounded-lg px-3 py-2">
                    <i class="fas fa-search text-gray-400 text-sm mr-2"></i>
                    <input 
                      type="text" 
                      id="country-search" 
                      class="w-full bg-transparent outline-none text-sm text-gray-700 placeholder-gray-400" 
                      placeholder="{{ \App\Helpers\TranslateHelper::translate('Search country...') }}"
                      onclick="event.stopPropagation()"
                      oninput="filterCountries()"
                    />
                  </div>
                </div>
                
                <!-- Country List -->
                <ul id="country-list" class="max-h-64 overflow-y-auto">
                  @foreach($country as $item)
                    <li onclick="selectCountry('{{ $item->country }}')" 
                        class="country-item px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors" 
                        data-country="{{ strtolower($item->country) }}">
                      {{ \App\Helpers\TranslateHelper::translate($item->country) }}
                    </li>
                  @endforeach
                </ul>
                
                <!-- No Results Message -->
                <div id="no-results" class="hidden px-6 py-4 text-center text-gray-500 text-sm">
                  <i class="fas fa-search mb-2 text-2xl text-gray-300"></i>
                  <p>{{ \App\Helpers\TranslateHelper::translate('No country found') }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- English Proficiency and Overall Score Row -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- English Proficiency -->
            <div class="relative group">
              <input type="hidden" name="english_proficiency" id="proficiency_value">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 cursor-pointer focus-within:border-primary focus-within:shadow-md"
                onclick="toggleDropdown('proficiency-dropdown')">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-language text-primary text-lg"></i>
                </div>
                <span class="w-full text-gray-400 outline-none font-medium" id="proficiency-selected">{{ \App\Helpers\TranslateHelper::translate('English Proficiency') }}</span>
                <i class="fas fa-chevron-down text-primary text-sm ml-2 transition-transform group-hover:translate-y-0.5"></i>
              </div>
              <!-- Dropdown Menu -->
              <ul id="proficiency-dropdown" class="hidden absolute z-10 w-full mt-2 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                <li onclick="selectValue('IELTS')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('IELTS') }}</li>
                <li onclick="selectValue('TOEFL')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('TOEFL') }}</li>
                <li onclick="selectValue('PTE')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('PTE') }}</li>
                <li onclick="selectValue('DUOLINGO')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('DUOLINGO') }}</li>
                <li onclick="selectValue('None')" class="px-6 py-3 hover:bg-primary/10 hover:text-primary cursor-pointer transition-colors">{{ \App\Helpers\TranslateHelper::translate('None') }}</li>
              </ul>
            </div>

            <!-- Overall Score -->
            <div class="relative group">
              <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 focus-within:border-primary focus-within:shadow-md">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                  <i class="fas fa-star text-primary text-lg"></i>
                </div>
                <input type="text" placeholder="{{ \App\Helpers\TranslateHelper::translate('Overall Score') }}" name="overall_score"
                  class="w-full text-gray-800 outline-none font-medium bg-transparent placeholder-gray-400" />
              </div>
            </div>
          </div>

          <!-- Low Band Score (Full Width) -->
          <div class="relative group">
            <div class="flex items-center border-2 border-gray-200 bg-white rounded-xl px-4 py-4 shadow-sm hover:border-primary/50 transition-all duration-300 focus-within:border-primary focus-within:shadow-md">
              <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="fas fa-signal text-primary text-lg"></i>
              </div>
              <input type="text" placeholder="{{ \App\Helpers\TranslateHelper::translate('Low Band Score') }}" name="score"
                class="w-full text-gray-800 outline-none font-medium bg-transparent placeholder-gray-400" />
            </div>
          </div>

          <!-- Submit Button -->
          <div class="pt-6">
            <button type="submit"
              class="w-full bg-gradient-to-r from-primary to-primary/90 hover:from-primary/90 hover:to-primary text-white font-bold text-lg py-5 rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-3">
              <span>{{ \App\Helpers\TranslateHelper::translate('Submit Application') }}</span>
              <i class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
            </button>
          </div>
        </form>

      </div>
    </div>

  </div>
</section>
</main>

   

@section('js')
<script>
  function toggleDropdown(id) {
    // Close all dropdowns except the one being toggled
    document.querySelectorAll('ul[id$="-dropdown"], div[id$="-dropdown"]').forEach(drop => {
      if (drop.id !== id) drop.classList.add('hidden');
    });

    const el = document.getElementById(id);
    el.classList.toggle('hidden');
    
    // Focus on search input when opening destination dropdown
    if (id === 'destination-dropdown' && !el.classList.contains('hidden')) {
      setTimeout(() => {
        document.getElementById('country-search').focus();
      }, 100);
    }
    
    // Reset search when opening
    if (id === 'destination-dropdown') {
      document.getElementById('country-search').value = '';
      filterCountries();
    }
  }

  function selectValue(value) {
    const openDropdown = document.querySelector('ul[id$="-dropdown"]:not(.hidden)');
    if (!openDropdown) return;

    if (openDropdown.id === 'education-dropdown') {
      document.getElementById('education_value').value = value;
      const el = document.getElementById('education-selected');
      el.innerText = value;
      el.classList.remove('text-gray-400');
      el.classList.add('text-black');
    }

    if (openDropdown.id === 'proficiency-dropdown') {
      document.getElementById('proficiency_value').value = value;
      const el = document.getElementById('proficiency-selected');
      el.innerText = value;
      el.classList.remove('text-gray-400');
      el.classList.add('text-black');
    }

    openDropdown.classList.add('hidden');
  }

  // Special function for country selection
  function selectCountry(country) {
    document.getElementById('destination_value').value = country;
    const el = document.getElementById('destination-selected');
    el.innerText = country;
    el.classList.remove('text-gray-400');
    el.classList.add('text-black');
    
    // Close dropdown
    document.getElementById('destination-dropdown').classList.add('hidden');
  }

  // Filter countries based on search input
  function filterCountries() {
    const searchInput = document.getElementById('country-search').value.toLowerCase();
    const countryItems = document.querySelectorAll('.country-item');
    const noResults = document.getElementById('no-results');
    let visibleCount = 0;

    countryItems.forEach(item => {
      const countryName = item.getAttribute('data-country');
      if (countryName.includes(searchInput)) {
        item.style.display = '';
        visibleCount++;
      } else {
        item.style.display = 'none';
      }
    });

    // Show/hide no results message
    if (visibleCount === 0) {
      noResults.classList.remove('hidden');
    } else {
      noResults.classList.add('hidden');
    }
  }

  // Close dropdown when clicking outside
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.cursor-pointer') && !e.target.closest('[id$="-dropdown"]')) {
      document.querySelectorAll('ul[id$="-dropdown"], div[id$="-dropdown"]').forEach(drop => {
        drop.classList.add('hidden');
      });
    }
  });
</script>
@endsection

@endsection