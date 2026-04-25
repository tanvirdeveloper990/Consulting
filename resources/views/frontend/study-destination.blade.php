@extends('layouts.app')
@section('title','Study Destinations')

@section('content')

<main class="max-w-7xl mx-auto">
    <!-- Hero Banner Section -->
    <section class="relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-2xl my-6">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="{{Storage::url($firstStudy?->banner_image)}}"
                alt="{{ \App\Helpers\TranslateHelper::translate('Study in ' . $country->country) }}"
                class="w-full h-full object-cover" />
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-rose-900/70 via-purple-900/50 to-sky-500/40"></div>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 h-full flex items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl w-full text-center">
                <!-- Title -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    {{ \App\Helpers\TranslateHelper::translate('Study in') }} {{ \App\Helpers\TranslateHelper::translate($country->country) }}
                </h1>

                <!-- Paragraph -->
                <p class="text-base sm:text-lg md:text-xl text-white/95 mb-8 max-w-2xl mx-auto leading-relaxed px-4">
                    {{ \App\Helpers\TranslateHelper::translate($firstStudy?->short_description) }}
                </p>

                <!-- Call-to-Action Button -->
                <div class="flex justify-center">
                     <a href="{{route('apply-now')}}">
                    <button class="bg-primary hover:bg-sky-600 text-white font-semibold text-base sm:text-lg px-8 py-4 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-primary/50">
                        {{ \App\Helpers\TranslateHelper::translate('Book free counseling') }}
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Content Section (Statistics) -->
    <section class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6">
                    <div class="text-4xl font-bold text-primary mb-2">{{$firstStudy?->partner_university_count}}+</div>
                    <p class="text-gray-600">
                        {{ \App\Helpers\TranslateHelper::translate($firstStudy?->partner_university_title) }}
                    </p>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-primary mb-2">{{$firstStudy?->students_enrolled_count}}+</div>
                    <p class="text-gray-600">
                        {{ \App\Helpers\TranslateHelper::translate($firstStudy?->students_enrolled_title) }}
                    </p>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-primary mb-2">{{$firstStudy?->success_rate_count}}%</div>
                    <p class="text-gray-600">
                        {{ \App\Helpers\TranslateHelper::translate($firstStudy?->success_rate_title) }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Study in Australia -->
    <section class="py-8 px-4 md:px-0">
        <!-- Heading -->
        <h1 class="text-3xl lg:text-4xl font-semibold text-center mb-6">
            {{ \App\Helpers\TranslateHelper::translate($firstStudy?->title) }}
            <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($country->country) }}</span>
        </h1>

        <!-- Paragraph -->
        <p class="text-gray-600 text-center max-w-6xl mx-auto mb-6 leading-relaxed text-sm sm:text-base">
            {{ \App\Helpers\TranslateHelper::translate($firstStudy?->description) }}
        </p>

        <!-- Cards Container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @if(!empty($firstStudy?->studyItems) && $firstStudy->studyItems->count())
            @foreach($firstStudy->studyItems as $item)
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="bg-blue-900 w-14 h-14 rounded-lg flex items-center justify-center mb-4 mx-auto">
                    <img src="{{Storage::url($item->icon)}}"
                        class="w-10 h-10 object-contain"
                        alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}" />
                </div>
                <h3 class="text-lg font-semibold text-gray-800 text-center mb-3">
                    {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                </h3>
                <p class="text-gray-600 text-sm text-center leading-relaxed flex-grow">
                    {{ \App\Helpers\TranslateHelper::translate($item->description) }}
                </p>
            </div>
            @endforeach
            @endif
        </div>

        <!-- Button -->
        <div class="text-center">
             <a href="{{route('apply-now')}}">
            <button class="bg-primary hover:bg-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                {{ \App\Helpers\TranslateHelper::translate('Book Free Counseling') }}
            </button>
            </a>
        </div>
    </section>

    <!-- Top-rated Universities -->
    <section class="py-6 px-4 md:px-6 lg:px-12">
        <div class="">
            <!-- Heading -->
            <div class="text-center mb-6 space-y-3">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 uppercase">
                    {{ \App\Helpers\TranslateHelper::translate('Top Universities in') }}
                    <span class="text-primary">{{ \App\Helpers\TranslateHelper::translate($country->country) }}</span>
                </h2>
                <p class="text-gray-600 text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    {{ \App\Helpers\TranslateHelper::translate($overview->top_rated_universities_description) }}
                </p>
            </div>

            <!-- University Cards Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-16">
                @if(!empty($firstStudy?->topRateds) && $firstStudy->topRateds->count())
                @foreach($firstStudy->topRateds as $item)
                <div data-country="finland"
                    class="university-card group bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 border border-gray-100 hover:border-primary/30 hover:bg-secondary flex flex-col items-center justify-between h-full">
                    <div class="w-20 h-20 mb-4 flex items-center justify-center rounded-full">
                        <img src="{{Storage::url($item->image)}}"
                            alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                            class="w-full h-full rounded-full object-cover" />
                    </div>
                    <div class="text-center space-y-2 flex-grow flex flex-col justify-center">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary transition-colors duration-300 line-clamp-2">
                            {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            {{ \App\Helpers\TranslateHelper::translate($item->description) }}
                        </p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Admission Requirements Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-secondary mb-4">
                {{ \App\Helpers\TranslateHelper::translate($overview->admission_requirement_title) }}
            </h2>
            <p class="text-gray-600 text-base sm:text-lg max-w-3xl mx-auto">
                {{ \App\Helpers\TranslateHelper::translate($overview->admission_requirement_description) }}
            </p>
        </div>

        <!-- Requirements Cards Grid -->
        <div class="max-w-5xl mx-auto mb-12">
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border-t-4 border-primary">
                @if(!empty($firstStudy?->admissionRequirements) && $firstStudy->admissionRequirements->count())
                @foreach($firstStudy->admissionRequirements as $item)
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                        <img src="{{ Storage::url($item->icon) }}" 
                             alt="{{ \App\Helpers\TranslateHelper::translate($item->text) }}" 
                             class="w-6 h-6 object-contain">
                    </div>
                    <h3 class="text-xl font-bold text-secondary">
                        {{ \App\Helpers\TranslateHelper::translate($item->text) }}
                    </h3>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Call to Action -->
        <div class="max-w-5xl mx-auto bg-gradient-to-r from-secondary to-secondary/90 rounded-2xl shadow-xl p-8 sm:p-10 text-center">
            <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                {{ \App\Helpers\TranslateHelper::translate($overview->book_free_title) }}
            </h3>
            <p class="text-gray-100 mb-6 max-w-2xl mx-auto">
                {{ \App\Helpers\TranslateHelper::translate($overview->book_free_description) }}
            </p>
             <a href="{{route('apply-now')}}"
               class="inline-block bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                {{ \App\Helpers\TranslateHelper::translate('Book Free Counseling') }}
            </a>
        </div>
    </section>

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
                @if(!empty($firstStudy?->questions) && $firstStudy->questions->count())
                @foreach($firstStudy->questions as $item)
                <div class="collapse collapse-plus bg-secondary/30 border-2 border-primary/20 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
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
                @endif
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="relative py-6 md:py-16 px-4 overflow-hidden my-12 rounded-2xl">
        <!-- Background Image -->
        <div class="h-[400px] absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ Storage::url($setting->study_image) }}')"></div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 w-[900px] h-[900px] md:translate-x-[20%] md:-translate-y-[50%] blur-3xl rounded-full bg-primary/70"></div>

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
                    <a href="{{route('contacts')}}"
                        class="group inline-flex items-center gap-3 bg-white text-primary px-8 md:px-8 py-4 md:py-3 rounded-full text-base md:text-lg font-semibold shadow-2xl hover:shadow-white/30 hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 w-full sm:w-auto justify-center border border-white">
                        <i class="fas fa-phone text-lg group-hover:rotate-12 transition-transform duration-300"></i>
                        {{ \App\Helpers\TranslateHelper::translate('Contact Us') }}
                    </a>

                    <!-- Apply Now Button -->
                    <a href="{{ route('apply-now')}}"
                        class="group inline-flex items-center gap-3 text-white px-8 md:px-8 py-4 md:py-3 rounded-full text-base md:text-lg font-semibold shadow-2xl hover:bg-white hover:text-primary transition-all duration-300 transform hover:scale-105 w-full sm:w-auto justify-center border border-white">
                        {{ \App\Helpers\TranslateHelper::translate('Apply Now') }}
                        <i class="fas fa-arrow-right text-lg group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection