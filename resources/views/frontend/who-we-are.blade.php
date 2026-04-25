@extends('layouts.app')
@section('title','Abouts')

@section('content')

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
                    <!-- <div class="text-start mt-8">
                        <a
                            href="#"
                            class="inline-flex items-center gap-3 bg-primary hover:bg-primary/80 text-white font-bold text-lg px-6 py-2 md:px-8  rounded-full shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                           
                            {{ \App\Helpers\TranslateHelper::translate(' Learn More') }}
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div> -->
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
    
</section>    

@endsection