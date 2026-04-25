@extends('layouts.app')
@section('title','CONTACT US')

@section('content')

<main class="max-w-7xl mx-auto">
    <!-- Contact Us Section -->
    <section class="bg-gray-100 py-20 px-4 sm:px-6 lg:px-8 my-12 rounded-2xl">
        <div class="container mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <!-- Heading with Decorative Lines -->
                <div class="flex items-center justify-center gap-4 mb-6">
                    <div class="h-0.5 w-16 sm:w-24 bg-gradient-to-r from-transparent to-[#0EA5E9]"></div>
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-black tracking-wide">
                        {{ \App\Helpers\TranslateHelper::translate($overview->contact_us_title) }} 
                        <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->contact_us_title1) }}</span>
                    </h2>
                    <div class="h-0.5 w-16 sm:w-24 bg-gradient-to-l from-transparent to-[#0EA5E9]"></div>
                </div>

                <!-- Description Paragraph -->
                <p class="text-black text-base sm:text-lg max-w-4xl mx-auto leading-relaxed px-4">
                    {{ \App\Helpers\TranslateHelper::translate($overview->contact_us_description) }}
                </p>
            </div>

            <!-- Contact Cards Grid -->
           <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                <!-- Call Us Card -->
                <div class="bg-white backdrop-blur-sm rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 text-center border border-transparent border-gray-700/50 hover:border-[#0EA5E9]/50 hover:scale-105">
                    <div class="flex justify-center mb-5">
                        <div class="w-16 h-16 bg-[#0EA5E9]/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-phone-alt text-3xl text-[#0EA5E9]"></i>
                        </div>
                    </div>
                    <h3 class="text-black text-lg font-semibold mb-3">{{ \App\Helpers\TranslateHelper::translate('Call Us') }}</h3>
                    <p class="text-gray-900 text-base">{{$setting->phone_one}}</p>
                </div>

                <!-- Email Card -->
                <div class="bg-white backdrop-blur-sm rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 text-center border border-transparent border-gray-700/50 hover:border-[#0EA5E9]/50 hover:scale-105">
                    <div class="flex justify-center mb-5">
                        <div class="w-16 h-16 bg-[#0EA5E9]/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-3xl text-[#0EA5E9]"></i>
                        </div>
                    </div>
                    <h3 class="text-black text-lg font-semibold mb-3">{{ \App\Helpers\TranslateHelper::translate('Email') }}</h3>
                    <p class="text-gray-900 text-base break-words">
                        {{$setting->email_one}}
                    </p>
                </div>

                <!-- Address Card -->
                <div class="bg-white backdrop-blur-sm rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 text-center border border-transparent border-gray-700/50 hover:border-[#0EA5E9]/50 hover:scale-105">
                    <div class="flex justify-center mb-5">
                        <div class="w-16 h-16 bg-[#0EA5E9]/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-3xl text-[#0EA5E9]"></i>
                        </div>
                    </div>
                    <h3 class="text-black text-lg font-semibold mb-3">{{ \App\Helpers\TranslateHelper::translate('Address') }}</h3>
                    <p class="text-gray-900 text-base">
                        {{$setting->address}}
                        {{$setting->address_2}}
                        {{$setting->address_3}}
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

 {{--<main class="container mx-auto">
    <!-- Application Form Section -->
    <section class="py-16 px-4 md:px-6 lg:px-12">
        <div class="max-w-5xl mx-auto">

            <!-- Form -->
            <div class="bg-white rounded-3xl shadow-2xl p-4 md:p-8">
                <!-- Heading -->
                <div class="text-center mb-10">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        {{ \App\Helpers\TranslateHelper::translate($overview->apply_title) }}
                    </h2>
                    <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-xl mx-auto">
                        {{ \App\Helpers\TranslateHelper::translate($overview->apply_description) }}
                    </p>
                </div>

                <!-- Form -->
                <form class="space-y-5" action="{{ route('apply-store') }}" method="POST">
                    @csrf

                    <!-- Full Name -->
                    <div class="relative">
                        <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md">
                            <i class="fas fa-user text-white text-lg mr-4"></i>
                            <input type="text" name="name" placeholder="{{ \App\Helpers\TranslateHelper::translate('Name') }}"
                                class="w-full text-black outline-none font-medium" />
                        </div>
                    </div>

                    <!-- Phone & Email -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                        <div class="relative">
                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md">
                                <i class="fas fa-phone text-white text-lg mr-4"></i>
                                <input type="text" name="phone" placeholder="{{ \App\Helpers\TranslateHelper::translate('Phone Number') }}"
                                    class="w-full text-black outline-none font-medium" />
                            </div>
                        </div>

                        <div class="relative">
                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md">
                                <i class="fas fa-envelope text-white text-lg mr-4"></i>
                                <input type="email" name="email" placeholder="{{ \App\Helpers\TranslateHelper::translate('Email') }}"
                                    class="w-full text-black outline-none font-medium" />
                            </div>
                        </div>
                    </div>

                    <!-- Education & GPA -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                        <!-- Education -->
                        <div class="relative">
                            <input type="hidden" name="education" id="education_value">

                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md cursor-pointer"
                                onclick="toggleDropdown('education-dropdown')">
                                <i class="fas fa-graduation-cap text-white text-lg mr-4"></i>
                                <span id="education-selected" class="w-full text-gray-400 font-medium">{{ \App\Helpers\TranslateHelper::translate('Education Level') }}</span>
                                <i class="fas fa-chevron-down text-white ml-2"></i>
                            </div>

                            <ul id="education-dropdown" class="hidden absolute z-10 w-full mt-2 bg-white rounded-2xl shadow-xl">
                                <li onclick="selectValue('SSC')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('SSC') }}</li>
                                <li onclick="selectValue('HSC')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('HSC') }}</li>
                                <li onclick="selectValue('Diploma')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('Diploma') }}</li>
                                <li onclick="selectValue('Bachelor')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('Bachelor') }}</li>
                                <li onclick="selectValue('Masters')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('Masters') }}</li>
                                <li onclick="selectValue('PhD')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('PhD') }}</li>
                            </ul>
                        </div>

                        <!-- GPA -->
                        <div class="relative">
                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md">
                                <i class="fas fa-chart-line text-white text-lg mr-4"></i>
                                <input type="text" name="type" placeholder="{{ \App\Helpers\TranslateHelper::translate('Type GPA/CGPA') }}"
                                    class="w-full text-black outline-none font-medium" />
                            </div>
                        </div>
                    </div>

                    <!-- Passing Year & Destination -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                        <div class="relative">
                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md">
                                <i class="fas fa-calendar-alt text-white text-lg mr-4"></i>
                                <input type="text" name="type_passing_year" placeholder="{{ \App\Helpers\TranslateHelper::translate('Passing Year') }}"
                                    class="w-full text-black outline-none font-medium" />
                            </div>
                        </div>

                        <div class="relative">
                            <input type="hidden" name="study_destination" id="destination_value">

                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md cursor-pointer"
                                onclick="toggleDropdown('destination-dropdown')">
                                <i class="fas fa-globe text-white text-lg mr-4"></i>
                                <span id="destination-selected" class="w-full text-gray-400 font-medium">{{ \App\Helpers\TranslateHelper::translate('Study Destination') }}</span>
                                <i class="fas fa-chevron-down text-white ml-2"></i>
                            </div>

                            <ul id="destination-dropdown" class="hidden absolute z-10 w-full mt-2 bg-white rounded-2xl shadow-xl">
                                <li onclick="selectValue('Canada')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('Canada') }}</li>
                                <li onclick="selectValue('USA')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('USA') }}</li>
                                <li onclick="selectValue('UK')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('UK') }}</li>
                                <li onclick="selectValue('Australia')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('Australia') }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- English & Score -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                        <div class="relative">
                            <input type="hidden" name="english_proficiency" id="proficiency_value">

                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md cursor-pointer"
                                onclick="toggleDropdown('proficiency-dropdown')">
                                <i class="fas fa-language text-white text-lg mr-4"></i>
                                <span id="proficiency-selected" class="w-full text-gray-400 font-medium">{{ \App\Helpers\TranslateHelper::translate('English Proficiency') }}</span>
                                <i class="fas fa-chevron-down text-white ml-2"></i>
                            </div>

                            <ul id="proficiency-dropdown" class="hidden absolute z-10 w-full mt-2 bg-white rounded-2xl shadow-xl">
                                <li onclick="selectValue('IELTS')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('IELTS') }}</li>
                                <li onclick="selectValue('TOEFL')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('TOEFL') }}</li>
                                <li onclick="selectValue('PTE')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('PTE') }}</li>
                                <li onclick="selectValue('DUOLINGO')" class="px-6 py-3 hover:bg-secondary cursor-pointer">{{ \App\Helpers\TranslateHelper::translate('DUOLINGO') }}</li>
                            </ul>
                        </div>

                        <div class="relative">
                            <div class="flex items-center border border-gray-200 rounded-md px-6 py-4 shadow-md">
                                <i class="fas fa-star text-white text-lg mr-4"></i>
                                <input type="text" name="overall_score" placeholder="{{ \App\Helpers\TranslateHelper::translate('Overall Score') }}"
                                    class="w-full text-black outline-none font-medium" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gray-900 text-white py-5 rounded-md font-bold">
                        {{ \App\Helpers\TranslateHelper::translate('Submit') }}
                    </button>
                </form>

            </div>

        </div>
    </section>
</main>--}}

<!-- Map Section -->
<section class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center gap-4 mb-6">
                <div class="h-0.5 w-16 sm:w-24 bg-gradient-to-r from-transparent to-[#0EA5E9]"></div>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 tracking-wide">
                    {{ \App\Helpers\TranslateHelper::translate($overview->find_us_title) }}
                </h2>
                <div class="h-0.5 w-16 sm:w-24 bg-gradient-to-l from-transparent to-[#0EA5E9]"></div>
            </div>
            <p class="text-gray-600 text-base sm:text-lg max-w-3xl mx-auto leading-relaxed">
                {{ \App\Helpers\TranslateHelper::translate($overview->find_us_description) }}
            </p>
        </div>

        <!-- Map Container -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-4 border-[#0EA5E9]/20 hover:border-[#0EA5E9]/40 transition-all duration-300">
            <!-- Address Bar -->
            <div class="bg-gradient-to-r from-[#0EA5E9] to-blue-600 px-6 py-4 flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-white font-semibold text-lg">
                            {{$setting->address}}
                        </p>
                    </div>
                </div>
                <a href="#" target="_blank" class="bg-white text-[#0EA5E9] px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    {{ \App\Helpers\TranslateHelper::translate('Get Directions') }}
                </a>
            </div>

            <!-- Google Maps Embed -->
            <div class="relative w-full h-96 md:h-[500px] lg:h-[600px]">
                <iframe
                    src="{{$setting->google_maps}}"
                    width="100%"
                    height="100%"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-full">
                </iframe>
            </div>

            <!-- Contact Info Footer -->
            <div class="bg-gray-50 px-6 py-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#0EA5E9]/10 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-[#0EA5E9]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">{{ \App\Helpers\TranslateHelper::translate('Phone') }}</p>
                        <p class="text-gray-900 font-semibold">{{$setting->phone_one}}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#0EA5E9]/10 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-[#0EA5E9]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">{{ \App\Helpers\TranslateHelper::translate('Email') }}</p>
                        <p class="text-gray-900 font-semibold text-sm">
                            {{$setting->email_one}}
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#0EA5E9]/10 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-[#0EA5E9]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">
                            {{ \App\Helpers\TranslateHelper::translate('Business Hours') }}
                        </p>
                        <p class="text-gray-900 font-semibold">
                            {{ \App\Helpers\TranslateHelper::translate($overview->buisness_hours) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('js')
<script>
  function toggleDropdown(id) {
    document.querySelectorAll('ul[id$="-dropdown"]').forEach(drop => {
      if (drop.id !== id) drop.classList.add('hidden');
    });

    const el = document.getElementById(id);
    el.classList.toggle('hidden');
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

    if (openDropdown.id === 'destination-dropdown') {
      document.getElementById('destination_value').value = value;
      const el = document.getElementById('destination-selected');
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

  document.addEventListener('click', function (e) {
    if (!e.target.closest('.cursor-pointer')) {
      document.querySelectorAll('ul[id$="-dropdown"]').forEach(drop => {
        drop.classList.add('hidden');
      });
    }
  });
</script>
@endsection

@endsection