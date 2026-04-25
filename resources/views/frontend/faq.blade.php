@extends('layouts.app')
@section('title','Frequently Asked Questions')

@section('content')

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

@endsection