@extends('layouts.app')
@section('title','Services & Support')

@section('content')

<main class="max-w-7xl mx-auto">
    <!-- Hero Banner Section -->
    <section class="relative w-full h-[300px] md:h-[400px] overflow-hidden rounded-2xl my-6">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="{{Storage::url($overview->service_support_image)}}"
                alt="{{ \App\Helpers\TranslateHelper::translate('Services & Support') }}"
                class="w-full h-full object-cover" />
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-rose-900/70 via-purple-900/50 to-sky-500/40"></div>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 h-full flex items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl w-full text-center">
                <!-- Title -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    {{ \App\Helpers\TranslateHelper::translate($overview->service_support_title) }}
                </h1>

                <!-- Paragraph -->
                <p class="text-base sm:text-lg md:text-xl text-white/95 mb-8 max-w-32xl mx-auto leading-relaxed px-4">
                    {{ \App\Helpers\TranslateHelper::translate($overview->service_support_description) }}
                </p>

                <!-- Call-to-Action Button -->
                <div class="flex justify-center">
                    <button class="bg-primary hover:bg-sky-600 text-white font-semibold text-base sm:text-lg px-8 py-4 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-primary/50">
                        {{ \App\Helpers\TranslateHelper::translate('Book free counseling') }}
                    </button>
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
                <p class="text-gray-500 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">
                    {{ \App\Helpers\TranslateHelper::translate($overview->student_support_description) }}
                </p>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                <!-- Left Side - Step Cards -->
                <div class="space-y-0">
                    <!-- Step 1 -->
                    <div class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-secondary/30 py-2 px-2" data-step="0">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 rounded-full bg-primary group-hover:bg-sky-600 transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img src="{{Storage::url($student->personalized_icon)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->personalized_title) }}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->personalized_title) }}
                                </h3>
                                <div class="para max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->personalized_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Connector Line -->
                        <div class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-secondary/30 py-2 px-2" data-step="1">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 rounded-full bg-primary group-hover:bg-sky-600 transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img src="{{Storage::url($student->university_icon)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->university_title) }}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->university_title) }}
                                </h3>
                                <div class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->university_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-secondary/30 py-2 px-2" data-step="2">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 rounded-full bg-primary group-hover:bg-sky-600 transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img src="{{Storage::url($student->admission_icon)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->admission_title) }}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->admission_title) }}
                                </h3>
                                <div class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->admission_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 3.5 -->
                    <div class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-gray-100 py-2 px-2" data-step="2">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 rounded-full bg-primary group-hover:bg-secondary transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img src="{{Storage::url($student->admission_icon1)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->admission_title1) }}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->admission_title1) }}
                                </h3>
                                <div class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->admission_description1) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-secondary/30 py-2 px-2" data-step="3">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 rounded-full bg-primary group-hover:bg-sky-600 transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img src="{{Storage::url($student->financial_icon)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->financial_title) }}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->financial_title) }}
                                </h3>
                                <div class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
                                    <p class="text-gray-600 text-sm leading-snug pt-0.5">
                                        {{ \App\Helpers\TranslateHelper::translate($student->financial_description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mt-1.5 mb-1.5 h-6 w-0.5 bg-gradient-to-b from-primary to-transparent opacity-30"></div>
                    </div>

                    <!-- Step 5 -->
                    <div class="step-card group cursor-pointer transition-all duration-500 ease-out rounded-xl hover:bg-secondary/30 py-2 px-2" data-step="4">
                        <div class="flex items-start gap-2.5">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 rounded-full bg-primary group-hover:bg-sky-600 transition-all duration-500 flex items-center justify-center shadow-lg group-hover:shadow-xl">
                                    <img src="{{Storage::url($student->visa_icon)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->visa_title) }}"
                                        class="w-5 h-5" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-bold text-gray-800 mb-0.5 group-hover:text-primary transition-colors duration-300">
                                    {{ \App\Helpers\TranslateHelper::translate($student->visa_title) }}
                                </h3>
                                <div class="max-h-0 overflow-hidden group-hover:max-h-16 transition-all duration-500 ease-out">
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
                            <div id="imageSlider" class="w-3/4 overflow-hidden rounded-2xl">
                                <!-- Image 1 -->
                                <div class="slider-image active transition-opacity duration-700 ease-in-out">
                                    <img src="{{Storage::url($student->personalized_image)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->personalized_title) }}"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 2 -->
                                <div class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img src="{{Storage::url($student->university_image)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->university_title) }}"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 3 -->
                                <div class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img src="{{Storage::url($student->admission_image)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->admission_title) }}"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 4 -->
                                <div class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img src="{{Storage::url($student->financial_image)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->financial_title) }}"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                                <!-- Image 5 -->
                                <div class="slider-image transition-opacity duration-700 ease-in-out opacity-0 absolute inset-0">
                                    <img src="{{Storage::url($student->visa_image)}}"
                                        alt="{{ \App\Helpers\TranslateHelper::translate($student->visa_title) }}"
                                        class="w-full h-full object-cover rounded-2xl" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our services -->
    <div class="max-w-7xl mx-auto px-4 md:px-0 py-12 space-y-16">
        @foreach($support as $item)
        @php
        $isEven = $loop->iteration % 2 == 0;
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            <!-- Image Column -->
            <div class="flex items-stretch {{ $isEven ? 'order-1 lg:order-2' : 'order-2 lg:order-1' }}">
                <div class="w-full h-full rounded-2xl overflow-hidden shadow-sm">
                    <img src="{{ Storage::url($item->image) }}"
                        alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                        class="w-full h-full object-cover" />
                </div>
            </div>

            <!-- Content Column -->
            <div class="flex flex-col justify-between bg-white rounded-2xl p-8 lg:p-12 shadow-sm {{ $isEven ? 'order-2 lg:order-1' : 'order-1 lg:order-2' }}">
                <div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                    </h2>

                    {!! \App\Helpers\TranslateHelper::translate($item->description) !!}
                </div>

                <div>
                    <button class="bg-primary hover:bg-secondary hover:text-black text-white font-semibold py-3 px-6 rounded-full inline-flex items-center transition-all duration-300 shadow-md hover:shadow-lg">
                        {{ \App\Helpers\TranslateHelper::translate('Request a callback') }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>

@section('js')
<script>
// Add your JavaScript here if needed
</script>
@endsection

@endsection