@extends('layouts.app')
@section('title','Excellent | Study Solutions')

@section('content')
<header>
    <!-- Banner Slider Section -->
    <section class="">
        <div class="banner-slider">
            <!-- Slide 2 -->
            @foreach($slider as $item)
            <div class="relative">
                <img
                    class="w-full h-[350px] md:h-[500px]  object-cover "
                    src="{{Storage::url($item->image)}}"
                    alt="{{$item->title}}" />
                <!-- Overlay Content -->
                <div
                    class="absolute inset-0 flex items-center justify-center  bg-gradient-to-r from-blue-600/60 to-primary/60">
                    <div
                        class="text-center px-6 space-y-3 md:space-y-4 max-w-5xl p-8 md:p-12">
                        <span class="bg-secondary/50 w-24 flex justify-center items-center px-4 py-2 block mx-auto font-bold text-sm text-white leading-relaxed rounded-xl">

                            {{ \App\Helpers\TranslateHelper::translate(' Welcome') }}
                        </span>
                        <h1
                            class="text-3xl md:text-5xl font-bold text-white leading-tight">
                            {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                        </h1>
                        <p class="text-sm md:text-xl text-white leading-relaxed">{{ \App\Helpers\TranslateHelper::translate($item->description) }}</p>
                        <a
                            href="{{ route('apply-now')}}"
                            class="inline-flex items-center gap-2 bg-primary hover:bg-primary text-white px-6 py-2 md:px-8 md:py-3 rounded-full font-semibold text-lg transition-all hover:shadow-2xl hover:scale-105">
                            {{ \App\Helpers\TranslateHelper::translate('Register Now') }}
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
</header>

<section class="container mx-auto">
    
    <!-- About Us Section -->
    <section class="py-12 md:py-16 lg:py-20 px-4 md:px-6 lg:px-12">
        <div class="">



            <!-- Main Content: Two-Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-stretch">

                <!-- Left Side: Image -->
                <div class="w-full h-full min-h-[300px] lg:min-h-[500px]">
                    <img
                        src="{{Storage::url($advanced->image)}}"
                        alt="{{$advanced->title_1}}"
                        class="w-full h-full object-cover rounded-2xl shadow-lg" />
                </div>

                <!-- Right Side: Content -->
                <div class="flex flex-col justify-center space-y-6">

                    <!-- Large Heading -->
                    <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold text-secondary leading-tight">
                        {{ \App\Helpers\TranslateHelper::translate($overview->we_are_title) }} <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->we_are_title1) }}</span>
                    </h3>

                    <!-- Long Description Paragraph -->
                    <p class="text-gray-600 text-base md:text-lg leading-relaxed">
                        {{ \App\Helpers\TranslateHelper::translate($overview->we_are_description) }}
                    </p>

                    <!-- Small Icons Row -->
                    <div class="flex flex-wrap items-center gap-4 md:gap-6 pt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-blue-600 text-sm"></i>
                            </div>
                            <span class="text-sm md:text-base text-gray-700 font-medium">{{$advanced->application_count}}+
                                {{ \App\Helpers\TranslateHelper::translate($advanced->application_title) }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-star text-green-600 text-sm"></i>
                            </div>
                            <span class="text-sm md:text-base text-gray-700 font-medium">{{$advanced->experience_count}}+
                                {{ \App\Helpers\TranslateHelper::translate($advanced->experience_title) }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-shield-alt text-purple-600 text-sm"></i>
                            </div>
                            <span class="text-sm md:text-base text-gray-700 font-medium">{{$advanced->satisfied_count}}+
                                {{ \App\Helpers\TranslateHelper::translate($advanced->satisfied_title) }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-rocket text-orange-600 text-sm"></i>
                            </div>
                            <span class="text-sm md:text-base text-gray-700 font-medium">{{$advanced->university_count}}+
                                {{ \App\Helpers\TranslateHelper::translate($advanced->university_title) }}</span>
                        </div>
                    </div>
                    <!-- Learn More Button -->
                     <div class="text-start mt-8">
                        <a
                            href="{{route('who-we-are')}}"
                            class="inline-flex items-center gap-3 bg-primary hover:bg-primary/80 text-white font-bold text-lg px-6 py-2 md:px-8  rounded-full shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                           
                            {{ \App\Helpers\TranslateHelper::translate(' Learn More') }}
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Students support -->
    <section class="py-6 px-4 md:px-6">
        <div class="">
            <!-- Heading -->
            <div class="text-center mb-10 space-y-2">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase">
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->student_support_title) }}</span>
                    <span class="text-gray-800">{{ \App\Helpers\TranslateHelper::translate($overview->student_support_title1) }}</span>
                </h2>
                <p
                    class="text-gray-500 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">

                    {{ \App\Helpers\TranslateHelper::translate($overview->student_support_description) }}
                </p>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                <!-- Left Side - Step Cards -->
                <div class="space-y-0">
                    <!-- Step 1 -->
                    <div
                        class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-gray-100 py-2 px-2"
                        data-step="0">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-11 h-11 rounded-full bg-primary group-hover:bg-secondary transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img
                                        src="{{Storage::url($student->personalized_icon)}}"
                                        alt=""
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">

                                    {{ \App\Helpers\TranslateHelper::translate($student->personalized_title) }}
                                </h3>
                                <div
                                    class="para max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->personalized_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Connector Line -->
                        <div
                            class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 2 -->
                    <div
                        class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-gray-100 py-2 px-2"
                        data-step="1">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-11 h-11 rounded-full bg-primary group-hover:bg-secondary transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img
                                        src="{{Storage::url($student->university_icon)}}"
                                        alt="{{$student->university_title}}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">

                                    {{ \App\Helpers\TranslateHelper::translate($student->university_title) }}
                                </h3>
                                <div
                                    class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">

                                        {{ \App\Helpers\TranslateHelper::translate($student->university_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 3 -->
                    <div
                        class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-gray-100 py-2 px-2"
                        data-step="2">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-11 h-11 rounded-full bg-primary group-hover:bg-secondary transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img
                                        src="{{Storage::url($student->admission_icon)}}"
                                        alt="{{$student->admission_title}}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">

                                    {{ \App\Helpers\TranslateHelper::translate($student->admission_title) }}
                                </h3>
                                <div
                                    class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->admission_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>
                    <!-- Step 4 -->
                    <div
                        class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-gray-100 py-2 px-2"
                        data-step="2">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-11 h-11 rounded-full bg-primary group-hover:bg-secondary transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img
                                        src="{{Storage::url($student->admission_icon1)}}"
                                        alt="{{$student->admission_title1}}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->admission_title1) }}
                                </h3>
                                <div
                                    class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->admission_description1) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 4 -->
                    <div
                        class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-gray-100 py-2 px-2"
                        data-step="3">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-11 h-11 rounded-full bg-primary group-hover:bg-secondary transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img
                                        src="{{Storage::url($student->financial_icon)}}"
                                        alt=" {{$student->financial_title}}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->financial_title) }}
                                </h3>
                                <div
                                    class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">

                                        {{ \App\Helpers\TranslateHelper::translate($student->financial_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 5 -->
                    <div
                        class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-gray-100 py-2 px-2"
                        data-step="4">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-11 h-11 rounded-full bg-primary group-hover:bg-secondary transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img
                                        src="{{Storage::url($student->visa_icon)}}"
                                        alt=" {{$student->visa_title}}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->visa_title) }}
                                </h3>
                                <div
                                    class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->visa_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Image Slider -->
                <div class="lg:sticky lg:top-24">
                    <div class="overflow-hidden rounded-2xl">
                        <!-- Image Container -->
                        <div class="relative z-10">
                            <div
                                id="imageSlider"
                                class="w-3/4 overflow-hidden rounded-2xl">
                                <!-- Image 1 -->
                                <div
                                    class="slider-image active transition-opacity duration-700 ease-in-out">
                                    <img
                                        src="{{Storage::url($student->personalized_image)}}"
                                        alt="Consultation"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 2 -->
                                <div
                                    class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img
                                        src="{{Storage::url($student->university_image)}}"
                                        alt="University Selection"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 3 -->
                                <div
                                    class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img
                                        src="{{Storage::url($student->admission_image)}}"
                                        alt="Documents"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 4 -->
                                <div
                                    class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img
                                        src="{{Storage::url($student->financial_image)}}"
                                        alt="Visa Application"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 5 -->
                                <div
                                    class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img
                                        src="{{Storage::url($student->visa_image)}}"
                                        alt="Travel"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 px-6">
        <div class="container mx-auto max-w-7xl">

            <!-- Section Title -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    {{ \App\Helpers\TranslateHelper::translate($overview->why_choose_us_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->why_choose_us_title1) }}</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    {{ \App\Helpers\TranslateHelper::translate($overview->why_choose_us_description) }}
                </p>
            </div>

            <!-- Three Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 items-center">

                <!-- Left Column - Two Cards Stacked -->
                <div class="flex flex-col gap-6 lg:gap-8">

                    <!-- Card 1 & 2: First Two Items -->
                    @foreach($mychoose->take(2) as $index => $item)
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-secondary">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                                <img src="{{ Storage::url($item->icon) }}"
                                    alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                                    class="w-10 h-10 object-contain">
                            </div>
                            <h3 class="text-2xl font-bold text-secondary mb-4">
                                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                {{ \App\Helpers\TranslateHelper::translate($item->description) }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Center Column - Large Image Card -->
                <div class="order-first lg:order-none">
                    <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-2xl overflow-hidden shadow-xl h-full flex items-center justify-center p-4">
                        <img
                            src="{{ Storage::url($setting->study_image) }}"
                            alt="{{ \App\Helpers\TranslateHelper::translate($setting->company_name) }}"
                            class="w-full h-full object-cover rounded-xl" />
                    </div>
                </div>

                <!-- Right Column - Two Cards Stacked -->
                <div class="flex flex-col gap-6 lg:gap-8">

                    <!-- Card 3 & 4: Next Two Items -->
                    @foreach($mychoose->slice(2)->take(2) as $index => $item)
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-secondary">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                                <img src="{{ Storage::url($item->icon) }}"
                                    alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                                    class="w-10 h-10 object-contain">
                            </div>
                            <h3 class="text-2xl font-bold text-secondary mb-4">
                                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                {{ \App\Helpers\TranslateHelper::translate($item->description) }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>
        <button class="block mx-auto mt-12 bg-primary hover:bg-secondary text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:shadow-lg">
            {{ \App\Helpers\TranslateHelper::translate('Get Started Today') }}
        </button>
    </section>


    <!-- Top Study Destinations Section -->
    <section class="py-6 px-4 overflow-hidden" id="study_destination">
        <div class="container mx-auto max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->top_study_destination_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->top_study_destination_title1) }}</span>
                </h2>
                <p class="text-gray-600 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">
                    {{ \App\Helpers\TranslateHelper::translate($overview->top_study_destination_description) }}
                </p>
            </div>

            <!-- Marquee Container -->
            <div class="marquee-container relative w-full overflow-hidden">
                <!-- Marquee Wrapper -->
                <div class="flex animate-marquee">
                    <!-- First Set of Cards -->
                    <div class="flex gap-6 md:gap-8 flex-shrink-0 pr-6 md:pr-8">
                        @foreach($country as $item)
                        <div class="flex flex-col items-center w-40 md:w-48 lg:w-56 flex-shrink-0">
                            <a href="{{ route('study.destination',$item->id) }}">
                                <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-4 shadow-md">
                                    <img
                                        src="{{Storage::url($item->thumbnail)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($item->country) }}"
                                        class="w-full h-full object-cover" />
                                </div>
                            </a>
                            <a href="{{ route('study.destination',$item->id) }}">
                                <h3 class="text-gray-800 font-bold text-base md:text-lg text-center">
                                    {{ \App\Helpers\TranslateHelper::translate($item->country) }}
                                </h3>
                            </a>
                        </div>
                        @endforeach
                    </div>

                    <!-- Duplicate Set of Cards for Seamless Loop -->
                    <div class="flex gap-6 md:gap-8 flex-shrink-0 pr-6 md:pr-8" aria-hidden="true">
                        @foreach($topstudy as $item)
                        <div class="flex flex-col items-center w-40 md:w-48 lg:w-56 flex-shrink-0">
                            <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-4 shadow-md">
                                <img
                                    src="{{Storage::url($item->image)}}"
                                    alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                                    class="w-full h-full object-cover" />
                            </div>
                            <h3 class="text-gray-800 font-bold text-base md:text-lg text-center">
                                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                            </h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inspiring Stories & Reviews -->
    {{--<section class="py-6 px-4 mt-2">
        <div class="container mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-8">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->inspiring_stories_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->inspiring_stories_title1) }}</span>
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    {{ \App\Helpers\TranslateHelper::translate($overview->inspiring_stories_description) }}
                </p>
            </div>

            <!-- Toggle Buttons -->
            <div class="flex justify-center gap-4 mb-7">
                <button
                    id="videosBtn"
                    class="toggle-btn px-4 md:px-8 py-3 rounded-full font-bold text-sm md:text-lg transition-all duration-300 shadow-md hover:shadow-lg border border-transparent hover:border-[#0EA5E9]/30 bg-white text-gray-700 hover:text-[#0EA5E9]">
                    {{ \App\Helpers\TranslateHelper::translate('Success Stories') }}
                </button>
                <button
                    id="photosBtn"
                    class="toggle-btn px-4 md:px-8 py-3 rounded-full font-bold text-sm md:text-lg transition-all duration-300 shadow-md hover:shadow-lg border border-transparent hover:border-[#0EA5E9]/30 bg-white text-gray-700 hover:text-[#0EA5E9]">
                    {{ \App\Helpers\TranslateHelper::translate('Verified Reviews') }}
                </button>
            </div>

            <!-- Photos Grid -->
            <div id="photosGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($photoreview as $item)
                <div class="group bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 hover:border-[#0EA5E9]/30 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full relative overflow-hidden">
                    <!-- Header with Profile and Google Logo -->
                    <div class="flex items-start justify-between mb-3 z-10 relative">
                        <div class="flex items-center gap-3">
                            <img
                                src="{{Storage::url($item->image)}}"
                                alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                                class="w-12 h-12 rounded-full border-2 border-[#E1F5FF] object-cover flex-shrink-0" />
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-gray-800 text-sm leading-tight">
                                    {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                                </h4>
                                <p class="text-xs text-gray-500 leading-tight mt-0.5">
                                    {{ \App\Helpers\TranslateHelper::translate($item->subtitle) }}
                                </p>
                            </div>
                        </div>
                        <svg class="w-8 h-8 flex-shrink-0 ml-2" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                    </div>

                    <!-- Star Rating and Date -->
                    <div class="flex items-center justify-between mb-3 z-10 relative">
                        <div class="flex text-yellow-400 text-base">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $item->star ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                @endfor
                        </div>
                        <p class="text-xs text-gray-400 font-medium">{{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</p>
                    </div>

                    <!-- Review Text -->
                    <div class="flex-grow z-10 relative">
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ \App\Helpers\TranslateHelper::translate($item->text) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Videos Grid -->
            <div id="videosGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 hidden">
                @foreach($videoreview as $item)
                <div class="bg-white rounded-2xl p-4 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
                    <div class="relative rounded-xl overflow-hidden aspect-video shadow-inner mb-4">
                        <div class="fb-video" data-href="{{$item->image}}" data-width="500" data-show-text="false">
                            <blockquote cite="{{$item->image}}" class="fb-xfbml-parse-ignore">
                                <a href="{{$item->image}}">Facebook Video</a>
                            </blockquote>
                        </div>
                    </div>
                    <div class="flex justify-between items-start px-2">
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">
                                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                            </h3>
                            <p class="text-gray-500 text-sm mt-1">
                                {{ \App\Helpers\TranslateHelper::translate($item->subtitle) }}
                            </p>
                        </div>
                        <span class="flex items-center gap-1 bg-[#E1F5FF] text-[#0EA5E9] text-[10px] font-bold px-2 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ \App\Helpers\TranslateHelper::translate('Verified') }}
                        </span>
                    </div>
                    <div class="mt-3 pt-3 border-t border-gray-50 flex items-center gap-2 px-2">
                        <div class="text-xs text-gray-400 font-medium">
                            {{ \App\Helpers\TranslateHelper::translate($item->text) }}
                        </div>
                        <div class="ml-auto text-yellow-400 text-xs">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $item->star ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                @endfor
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Conditional Action Buttons -->
            <div class="text-center mt-8">
                <!-- Single button for Success Stories -->
                <div id="successStoriesButtons" class="hidden">
                    <a href="{{route('stories-and-reviews')}}"
                        class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-secondary text-white px-6 py-2 md:px-10 md:py-4 rounded-full text-lg font-bold shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        {{ \App\Helpers\TranslateHelper::translate('More Stories & Reviews') }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Three buttons for Verified Reviews -->
                <div id="verifiedReviewsButtons" class="flex flex-wrap items-center justify-center gap-3 md:gap-4">
                    <a href="{{route('stories-and-reviews')}}"
                        class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-secondary text-white px-6 py-2 md:px-10 md:py-4 rounded-full text-lg font-bold shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        <span class="hidden sm:inline">{{ \App\Helpers\TranslateHelper::translate('More Stories & Reviews') }}</span>
                        <span class="sm:hidden">{{ \App\Helpers\TranslateHelper::translate('Stories') }}</span>
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>--}}
    
    
    
    <!-- Success Stories Section -->
    <section class="py-6 px-4 mt-2">
        <div class="container mx-auto">
             
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->inspiring_stories_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->inspiring_stories_title1) }}</span>
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    {{ \App\Helpers\TranslateHelper::translate($overview->inspiring_stories_description) }}
                </p>
            </div>
    
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($videoreview->take(6) as $item)
                <div class="bg-white rounded-2xl p-4 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 hover:border-[#0EA5E9]/30 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <div class="relative rounded-xl overflow-hidden aspect-video shadow-inner mb-4">
                       @php
                            $videoUrl = trim($item->image);
                            $videoId = '';
                        
                            $urlParts = parse_url($videoUrl);
                        
                            // youtube.com/watch?v=XXXX
                            if (isset($urlParts['query'])) {
                                parse_str($urlParts['query'], $query);
                                $videoId = $query['v'] ?? '';
                            }
                        
                            // youtu.be/XXXX
                            if (!$videoId && isset($urlParts['host']) && str_contains($urlParts['host'], 'youtu.be')) {
                                $videoId = ltrim($urlParts['path'], '/');
                            }
                        
                            // youtube.com/embed/XXXX
                            if (!$videoId && isset($urlParts['path']) && str_contains($urlParts['path'], 'embed')) {
                                $segments = explode('/', $urlParts['path']);
                                $videoId = end($segments);
                            }
                        @endphp

                        
                      @if($videoId)
                            <iframe
                                class="w-full h-full"
                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                frameborder="0"
                                allowfullscreen>
                            </iframe>
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-500">Invalid video URL</p>
                            </div>
                        @endif

                    </div>
                    <div class="flex justify-between items-start px-2">
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">
                                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                            </h3>
                            <p class="text-gray-500 text-sm mt-1">
                                {{ \App\Helpers\TranslateHelper::translate($item->subtitle) }}
                            </p>
                        </div>
                        <span class="flex items-center gap-1 bg-[#E1F5FF] text-[#0EA5E9] text-[10px] font-bold px-2 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ \App\Helpers\TranslateHelper::translate('Verified') }}
                        </span>
                    </div>
                    <div class="mt-3 pt-3 border-t border-gray-50 flex items-center gap-2 px-2">
                        <div class="text-xs text-gray-400 font-medium">
                            {{ \App\Helpers\TranslateHelper::translate($item->text) }}
                        </div>
                        <div class="ml-auto text-yellow-400 text-xs">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $item->star ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                            @endfor
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    
            
            <div class="text-center mt-8">
                <a href="{{route('success-stories')}}"
                    class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-secondary text-white px-6 py-2 md:px-10 md:py-4 rounded-full text-lg font-bold shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    {{ \App\Helpers\TranslateHelper::translate('More Success Stories') }}
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Verified Reviews Section -->
    <section class="py-6 px-4">
        <div class="container mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->verified_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->verified_title1) }}</span>
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    {{ \App\Helpers\TranslateHelper::translate($overview->verified_description) }}
                </p>
            </div>
    
            <!-- Photos Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($photoreview->take(6) as $item)
                <div class="group bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 hover:border-[#0EA5E9]/30 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full relative overflow-hidden">
                    <!-- Header with Profile and Google Logo -->
                    <div class="flex items-start justify-between mb-3 z-10 relative">
                        <div class="flex items-center gap-3">
                            <img
                                src="{{Storage::url($item->image)}}"
                                alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                                class="w-12 h-12 rounded-full border-2 border-[#E1F5FF] object-cover flex-shrink-0" />
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-gray-800 text-sm leading-tight">
                                    {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                                </h4>
                                <p class="text-xs text-gray-500 leading-tight mt-0.5">
                                    {{ \App\Helpers\TranslateHelper::translate($item->subtitle) }}
                                </p>
                            </div>
                        </div>
                        <svg class="w-8 h-8 flex-shrink-0 ml-2" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                    </div>
    
                    <!-- Star Rating and Date -->
                    <div class="flex items-center justify-between mb-3 z-10 relative">
                        <div class="flex text-yellow-400 text-base">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $item->star ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                            @endfor
                        </div>
                        <p class="text-xs text-gray-400 font-medium">{{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</p>
                    </div>
    
                    <!-- Review Text -->
                    <div class="flex-grow z-10 relative">
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ \App\Helpers\TranslateHelper::translate($item->text) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
    
            <!-- Action Button -->
            <div class="text-center mt-8">
                <a href="{{route('verified-reviews')}}"
                    class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-secondary text-white px-6 py-2 md:px-10 md:py-4 rounded-full text-lg font-bold shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    <span class="hidden sm:inline">{{ \App\Helpers\TranslateHelper::translate('More Reviews') }}</span>
                    <span class="sm:hidden">{{ \App\Helpers\TranslateHelper::translate('Reviews') }}</span>
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Top-rated Universities Section -->
    <!-- <section class="py-6 px-4 md:px-6 lg:px-12">
        <div class="">
            <div class="text-center mb-6 space-y-3">
                <h2
                    class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 uppercase">
                    {{$overview->top_rated_universities_title}} <span class="text-primary">{{$overview->top_rated_universities_title1}}</span>
                </h2>
                <p
                    class="text-gray-600 text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    {{$overview->top_rated_universities_description}}
                </p>
            </div>

            <div class="countriesBtnSLider mb-8 flex flex-wrap gap-2">
                @foreach($country as $item)
                <button onclick="filterCountry('{{ $item->country }}', {{ $item->id }})"
                    data-tab="{{ $item->country }}"
                    data-id="{{ $item->id }}"
                    class="country-tab group flex items-center justify-center gap-3 px-8 py-4 rounded-full shadow-md transition-all duration-300 border-2 my-8 mx-2
        {{ $loop->first ? 'active-tab bg-primary text-white border-primary' : 'bg-white text-gray-800 border-gray-100' }}">
                    <img src="{{ Storage::url($item->flag) }}" alt="" class="w-5 h-4" />
                    <span class="text-base md:text-lg">{{ $item->country }}</span>
                </button>
                @endforeach
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-16">
                @foreach($country as $item)
                @foreach($item->study as $study)
                @foreach($study->topRateds as $top)
                <div data-country="{{ $item->country }}"
                    class="university-card group bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 border border-gray-100 hover:border-primary/30 hover:bg-secondary flex flex-col items-center justify-between h-full
            {{ $loop->parent->parent->first ? '' : 'hidden' }}">
                    <div class="w-20 h-20 mb-4 flex items-center justify-center rounded-full">
                        <img src="{{ Storage::url($top->image) }}" alt="{{ $top->title }}" class="w-full h-full rounded-full object-cover" />
                    </div>
                    <div class="text-center space-y-2 flex-grow flex flex-col justify-center">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-white transition-colors duration-300 line-clamp-2">
                            {{ $top->title }}
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-3 group-hover:text-white transition-colors duration-300">{{ $top->description }}</p>
                    </div>
                </div>
                @endforeach
                @endforeach
                @endforeach
            </div>

            <div class="text-center">
                <a href="#" id="checkMoreBtn"
                    class="inline-flex items-center gap-3 bg-primary hover:bg-secondary text-white font-bold text-lg px-6 py-2 md:px-10 md:py-4 rounded-full shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    Check more
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

        </div>
    </section> -->



    <!-- FAQ Section -->
    <section class="py-6 px-4">
        <div class="container mx-auto max-w-5xl">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->frequently_asked_question_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->frequently_asked_question_title1) }}</span>
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    {{ \App\Helpers\TranslateHelper::translate($overview->frequently_asked_question_description) }}
                </p>
            </div>

            <!-- FAQ Accordion Items -->
            <div class="space-y-4">
                @foreach($frequently as $item)
                <div class="collapse collapse-plus hover:bg-primary/20 border-2 border-primary/20 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                    <input type="checkbox" class="faq-toggle" />
                    <div class="collapse-title text-lg font-bold text-gray-900 pr-12">
                        <i class="fas fa-user-plus text-primary mr-3"></i>
                        {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                    </div>
                    <div class="collapse-content">
                        <p class="text-gray-700 leading-relaxed pl-8">
                            {{ \App\Helpers\TranslateHelper::translate($item->description) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- News and Updates Section -->
    <section class="py-6 px-4">
        <div class="container mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-8">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->news_and_updates_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->news_and_updates_title1) }}</span>
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    {{ \App\Helpers\TranslateHelper::translate($overview->news_and_updates_description) }}
                </p>
            </div>

            <!-- Stories Grid - 2 Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 px-4 lg:px-8">
                @foreach($blogs->take(4) as $blog)
                <!-- Story Card -->
                <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 hover:border-primary/20">
                    <div class="flex flex-col md:flex-row h-full">

                        <!-- Left Side: Text Content -->
                        <div class="flex-1 p-6 lg:p-8 flex flex-col justify-between">
                            <!-- Location Badge -->
                            <div class="flex items-center gap-2 mb-4">
                                <div class="flex items-center gap-2 text-sm">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="font-semibold text-gray-700">
                                        {{ \App\Helpers\TranslateHelper::translate($blog->country) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Date Badge -->
                            <div class="flex items-center gap-2 mb-4">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($blog->story_date)->format('F d, Y') }}
                                </span>
                            </div>

                            <!-- Title -->
                            <a href="{{ route('blog.single',$blog->slug) }}">
                                <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-4 leading-tight line-clamp-2 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($blog->title) }}
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-600 text-sm lg:text-base leading-relaxed mb-6 line-clamp-3 flex-grow">
                                    {{ \App\Helpers\TranslateHelper::translate($blog->short_description) }}
                                </p>
                            </a>
                        </div>

                        <!-- Right Side: Image Area -->
                        <div class="relative w-full md:w-2/5  rounded-bl-3xl md:rounded-bl-none md:rounded-tr-3xl md:rounded-br-3xl overflow-hidden min-h-[280px] md:min-h-0 flex items-end justify-center p-6">
                            <!-- Red Accent Background (Behind Image) -->
                            <!--<div class="absolute top-0 left-0 w-32 h-32 bg-primary rounded-br-full"></div>-->

                            <!-- Main Image -->
                            <a href="{{ route('blog.single',$blog->slug) }}">
                                <div class="relative z-20 w-48 h-48 lg:w-56 lg:h-[260px] mb-0">
                                    <img src="{{Storage::url($blog->thumbnail_one)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($blog->title) }}"
                                        class="w-full h-full object-cover rounded-2xl shadow-2xl transition-transform duration-700 group-hover:scale-105" />
                                </div>
                            </a>

                            <!-- Red Accent Background (Bottom Right) -->
                            <!--<div class="absolute bottom-0 right-0 w-32 h-32 bg-primary rounded-tl-full"></div>-->
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-8">
                <a href="{{route('news-updates')}}"
                    class="inline-block bg-primary hover:bg-secondary text-white px-6 py-2 md:px-10 md:py-4 rounded-full text-lg font-semibold shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                    {{ \App\Helpers\TranslateHelper::translate('View All Stories') }}
                </a>
            </div>
        </div>
    </section>
    
    
     <!-- Notice Section -->
        <section class="my-16 container mx-auto px-4">
            
            <!-- Section Header -->
            <div class="text-center mb-8">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->notice_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->notice_title1) }}</span>
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    {{ \App\Helpers\TranslateHelper::translate($overview->news_and_updates_description) }}
                </p>
            </div>
            
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Notice Image 1 -->
                @foreach($notice->take(8) as $item)
                <div class="w-full h-[620px] md:h-96 lg:h-[570px] overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer"
                   onclick="openImageModal('{{ Storage::url($item->image) }}')">
                    <img src="{{Storage::url($item->image)}}" alt="empty"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                @endforeach
            </div>
            
            
            <!-- View All Button -->
            <div class="text-center mt-8">
                <a href="{{route('notice')}}"
                    class="inline-block bg-primary hover:bg-secondary text-white px-6 py-2 md:px-10 md:py-4 rounded-full text-lg font-semibold shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                    {{ \App\Helpers\TranslateHelper::translate('View All Notice') }}
                </a>
            </div>
        </section>

    <!-- Photo Gallery Section -->
    <!-- Photo Gallery Section -->
    <section class="py-16 px-4 bg-white">
        <div class="container mx-auto">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-block bg-primary/10 text-primary px-6 py-2 rounded-full text-sm font-semibold mb-4">
                    <i class="fas fa-images mr-2"></i>
                    {{ \App\Helpers\TranslateHelper::translate($overview->gallery_message) }}
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">
                    {{ \App\Helpers\TranslateHelper::translate($overview->gallery_title1) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->gallery_title2) }}</span>
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-3xl mx-auto">
                    {{ \App\Helpers\TranslateHelper::translate($overview->gallery_description) }}
                </p>
            </div>

            <!-- Gallery Grid - Masonry Style Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($galleries->take(8) as $index => $gallery)
                @php
                // First item large (2x2)
                if($index === 0) {
                $colSpan = 'sm:col-span-2 sm:row-span-2';
                $height = 'h-[520px]';
                $textSize = 'text-xl';
                $subTextSize = 'text-sm';
                $padding = 'p-6';
                }
                // 6th item wide (2x1)
                elseif($index === 5) {
                $colSpan = 'sm:col-span-2';
                $height = 'h-64';
                $textSize = 'text-lg';
                $subTextSize = 'text-xs';
                $padding = 'p-4';
                }
                // Standard items (1x1)
                else {
                $colSpan = '';
                $height = 'h-64';
                $textSize = 'text-lg';
                $subTextSize = 'text-xs';
                $padding = 'p-4';
                }
                @endphp

                <div class="gallery-item group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 {{ $colSpan }} cursor-pointer {{ $height }}">
                    <img src="{{ Storage::url($gallery->image) }}"
                        alt="{{ \App\Helpers\TranslateHelper::translate($gallery->title) }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end {{ $padding }}">
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-white font-bold {{ $textSize }} mb-{{ $index === 0 ? '2' : '1' }}">
                                {{ \App\Helpers\TranslateHelper::translate($gallery->title) }}
                            </h3>
                            <p class="text-gray-200 {{ $subTextSize }}">
                                {{ \App\Helpers\TranslateHelper::translate($gallery->subtitle) }}
                            </p>
                        </div>

                        <div class="absolute top-{{ $index === 0 ? '4' : '3' }} right-{{ $index === 0 ? '4' : '3' }} w-{{ $index === 0 ? '10' : '8' }} h-{{ $index === 0 ? '10' : '8' }} bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-expand text-white {{ $index === 0 ? '' : 'text-sm' }}"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <a href="{{route('galleries')}}">
                    <button class="inline-flex items-center gap-3 bg-secondary hover:bg-secondary/90 text-white font-semibold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-images"></i>
                        <span>{{ \App\Helpers\TranslateHelper::translate('View Full Gallery') }}</span>
                    </button>
                </a>
            </div>

        </div>
    </section>

    <!-- Certificates Section -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-block bg-primary/10 text-primary px-6 py-2 rounded-full text-sm font-semibold mb-4">
                    {{ \App\Helpers\TranslateHelper::translate($overview->certificate_message) }}
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary mb-4">
                    {{ \App\Helpers\TranslateHelper::translate($overview->certificate_title1) }}
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-3xl mx-auto">
                    {{ \App\Helpers\TranslateHelper::translate($overview->certificate_description) }}
                </p>
            </div>

            <!-- Certificates Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <!-- Certificate Cards -->
                @foreach($certificates as $certificate)
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                    <div class="relative overflow-hidden">
                        <!-- Certificate Image -->
                        <img src="{{Storage::url($certificate->image)}}"
                            alt="{{ \App\Helpers\TranslateHelper::translate($certificate->title) }}"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500">

                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 via-secondary/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <div class="text-white">
                                <h4 class="font-bold text-lg mb-1">
                                    {{ \App\Helpers\TranslateHelper::translate($certificate->title) }}
                                </h4>
                                <p class="text-sm text-gray-200">
                                    {{ \App\Helpers\TranslateHelper::translate($certificate->subtitle) }}
                                </p>
                                <p class="text-xs text-gray-300 mt-1">
                                    {{ \App\Helpers\TranslateHelper::translate($certificate->text) }}
                                </p>
                            </div>
                        </div>

                        <!-- Success Badge -->
                        <div class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                            ✓ {{ \App\Helpers\TranslateHelper::translate($certificate->approved) }}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- View More Button -->
            <div class="text-center mt-12">
                <a href="{{route('certificates')}}"
                    class="inline-flex items-center gap-3 bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <span>{{ \App\Helpers\TranslateHelper::translate('View All Certificates') }}</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- Logo Marquee Section -->
    <section class="py-6 px-4">
        <div class="container mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->our_parents_title) }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($overview->our_parents_title1) }}</span>
                </h2>
                <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto">
                    {{ \App\Helpers\TranslateHelper::translate($overview->our_parents_description) }}
                </p>
            </div>

            <!-- Marquee Container -->
            <div class="marquee-container relative overflow-hidden py-4">
                <div class="flex animate-scroll">
                    <!-- First Set of Logos -->
                    <div class="flex items-center gap-12 md:gap-16 px-2 flex-shrink-0">
                        @foreach($partners as $item)
                        <img
                            src="{{Storage::url($item->image)}}"
                            alt="{{ \App\Helpers\TranslateHelper::translate($setting->company_name) }}"
                            class="h-12 md:h-16 w-auto object-contain" />
                        @endforeach
                    </div>

                    <!-- Duplicate Set for Seamless Loop -->
                    <div class="flex items-center gap-12 md:gap-16 px-8 flex-shrink-0">
                        @foreach($partners as $item)
                        <img
                            src="{{Storage::url($item->image)}}"
                            alt="{{ \App\Helpers\TranslateHelper::translate($setting->company_name) }}"
                            class="h-12 md:h-16 w-auto object-contain" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="relative py-6 md:py-16 px-4 overflow-hidden my-12 rounded-2xl">
        <!-- Background Image -->
        <div
            class="h-[400px] absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ Storage::url($setting->study_image) }}')"></div>

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 w-[900px] h-[900px] md:translate-x-[20%] md:-translate-y-[50%] blur-3xl rounded-full bg-primary/10"></div>

        <!-- Content Container -->
        <div class="relative z-10 container mx-auto max-w-6xl">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Main Heading -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight uppercase">
                    {{ \App\Helpers\TranslateHelper::translate($overview->ready_to_study_title) }}
                </h1>

                <!-- Subheading -->
                <p class="text-lg md:text-xl lg:text-2xl text-white/95 mb-10 leading-relaxed max-w-3xl mx-auto font-light">
                    {{ \App\Helpers\TranslateHelper::translate($overview->ready_to_study_description) }}
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 md:gap-6">
                    <!-- Contact Us Button -->
                    <a 
                    href="{{route('contacts')}}"
                    class="group inline-flex items-center gap-3 bg-white text-primary px-8 md:px-8 py-4 md:py-3 rounded-full text-base md:text-lg font-semibold shadow-2xl hover:shadow-white/30 hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 w-full sm:w-auto justify-center border border-white">
                    <i class="fas fa-phone text-lg group-hover:rotate-12 transition-transform duration-300"></i>
                    {{ \App\Helpers\TranslateHelper::translate('Contact Us') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

</section>
@endsection


@section('js')
<script>
    let currentCountryId = {
        {
            $country - > first() - > id ?? 'null'
        }
    };
    let currentCountryName = '{{ $country->first()->country ?? '
    ' }}';

    function filterCountry(country, id) {
        console.log('Filtering country:', country, 'ID:', id);

        // Store current country
        currentCountryId = id;
        currentCountryName = country;

        // Get ALL tabs including cloned ones from Slick slider
        const allTabs = document.querySelectorAll(".country-tab");
        console.log('Total tabs found (including clones):', allTabs.length);

        // Remove active class from ALL tabs (original + clones)
        allTabs.forEach((tab) => {
            tab.classList.remove("active-tab", "bg-primary", "text-white", "border-primary");
            tab.classList.add("bg-white", "text-gray-800", "border-gray-100");
        });

        // Find ALL tabs with matching country (original + clones)
        const activeTabs = document.querySelectorAll(`[data-tab="${country}"]`);
        console.log('Active tabs found (including clones):', activeTabs.length);

        // Apply active style to ALL matching tabs
        activeTabs.forEach((activeTab) => {
            if (activeTab) {
                activeTab.classList.remove("bg-white", "text-gray-800", "border-gray-100");
                activeTab.classList.add("active-tab", "bg-primary", "text-white", "border-primary");
            }
        });

        console.log('All tabs updated successfully');

        // Show/Hide university cards
        const cards = document.querySelectorAll(".university-card");
        let visibleCount = 0;
        cards.forEach((card) => {
            if (card.dataset.country === country) {
                card.classList.remove("hidden");
                visibleCount++;
            } else {
                card.classList.add("hidden");
            }
        });
        console.log('Visible cards:', visibleCount);

        // Update "Check More" button
        updateCheckMoreButton(country, id);
    }

    function updateCheckMoreButton(country, id) {
        const checkMoreBtn = document.getElementById('checkMoreBtn');
        const countryNameSpan = document.getElementById('countryName');

        if (checkMoreBtn && countryNameSpan) {
            countryNameSpan.textContent = country;
            checkMoreBtn.href = "{{ url('study-destination') }}/" + id;
        }
    }

    // Initialize first country as active on page load
    document.addEventListener("DOMContentLoaded", function() {
        console.log('Page loaded, initializing...');

        // Wait for Slick slider to initialize
        setTimeout(() => {
            const firstTab = document.querySelector(".country-tab");
            if (firstTab) {
                const country = firstTab.dataset.tab;
                const id = firstTab.dataset.id;
                console.log('First tab:', country, id);
                filterCountry(country, id);
            } else {
                console.error('No country tabs found!');
            }
        }, 500); // Wait 500ms for Slick to initialize
    });
</script>
@endsection