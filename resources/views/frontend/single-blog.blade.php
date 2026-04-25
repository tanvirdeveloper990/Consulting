@extends('layouts.app')
@section('title','Study Destinations')

@section('content')

<main class="max-w-7xl mx-auto">
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4 mt-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">
                    {{ \App\Helpers\TranslateHelper::translate('Home') }}
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('news-updates') }}" class="hover:text-primary transition-colors">
                    {{ \App\Helpers\TranslateHelper::translate('News & Updates') }}
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-900 font-medium">{{ \App\Helpers\TranslateHelper::translate('Details') }}</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 sm:py-12 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Side - Main Content -->
                <div class="lg:col-span-2">
                    <!-- Hero Section -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                        <div class="relative h-64 sm:h-80 lg:h-96">
                            <img src="{{Storage::url($data->thumbnail_one)}}" 
                                 alt="{{ \App\Helpers\TranslateHelper::translate($data->title) }}" 
                                 class="w-full h-full object-cover" />
                            <div class="absolute top-4 left-4">
                                <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                    <i class="fas fa-star mr-1"></i> {{ \App\Helpers\TranslateHelper::translate('Featured News') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <article class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 lg:p-10">
                        <!-- Title -->
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                            {{ \App\Helpers\TranslateHelper::translate($data->title) }}
                        </h1>

                        <!-- Meta Info -->
                        <div class="flex flex-wrap items-center gap-4 mb-8 pb-6 border-b-2 border-primary/20">
                            <div class="flex items-center gap-2 text-gray-600">
                                <i class="far fa-calendar-alt text-primary"></i>
                                <span class="text-sm font-medium">
                                    {{ \Carbon\Carbon::parse($data->story_date)->format('F d, Y') }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                <span class="text-sm font-medium">
                                    {{ \App\Helpers\TranslateHelper::translate($data->country) }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600">
                                <i class="far fa-folder text-primary"></i>
                                <span class="text-sm font-medium">
                                    {{ \App\Helpers\TranslateHelper::translate($data->story_post) }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600">
                                <i class="far fa-eye text-primary"></i>
                                <span class="text-sm font-medium">{{ number_format($data->story_view) }}</span>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <div class="prose max-w-none">
                            {!! \App\Helpers\TranslateHelper::translate($data->description) !!}
                        </div>

                        <!-- Tags -->
                        <div class="flex flex-wrap items-center gap-2 pt-6 border-t-2 border-gray-200">
                            <span class="text-gray-600 font-semibold">{{ \App\Helpers\TranslateHelper::translate('Tags') }}:</span>
                            @php
                            $tags = explode(',', $data->tags);
                            @endphp

                            @foreach($tags as $tag)
                            <span class="px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-medium hover:bg-primary hover:text-white transition-colors cursor-pointer">
                                {{ \App\Helpers\TranslateHelper::translate(trim($tag)) }}
                            </span>
                            @endforeach
                        </div>
                    </article>
                </div>

                <!-- Right Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-28 space-y-6">
                        <!-- Quick Information Card -->
                        <div class="bg-gradient-to-br from-primary to-sky-600 rounded-2xl shadow-lg p-6 text-white">
                            <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                                <i class="fas fa-info-circle"></i>
                                {{ \App\Helpers\TranslateHelper::translate('Quick Information') }}
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between pb-3 border-b border-white/20">
                                    <span class="text-sm opacity-90">{{ \App\Helpers\TranslateHelper::translate('Country') }}</span>
                                    <span class="font-semibold">{{ \App\Helpers\TranslateHelper::translate($data->country) }}</span>
                                </div>
                                <div class="flex items-center justify-between pb-3 border-b border-white/20">
                                    <span class="text-sm opacity-90">{{ \App\Helpers\TranslateHelper::translate('Study Level') }}</span>
                                    <span class="font-semibold">{{ \App\Helpers\TranslateHelper::translate($data->study_level) }}</span>
                                </div>
                                <div class="flex items-center justify-between pb-3 border-b border-white/20">
                                    <span class="text-sm opacity-90">{{ \App\Helpers\TranslateHelper::translate('Application Deadline') }}</span>
                                    <span class="font-semibold">{{ \Carbon\Carbon::parse($data->application_deadline)->format('F d, Y') }}</span>
                                </div>
                                <div class="flex items-center justify-between pb-3 border-b border-white/20">
                                    <span class="text-sm opacity-90">{{ \App\Helpers\TranslateHelper::translate('Intake') }}</span>
                                    <span class="font-semibold">{{ \App\Helpers\TranslateHelper::translate($data->intake) }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm opacity-90">{{ \App\Helpers\TranslateHelper::translate('Category') }}</span>
                                    <span class="font-semibold">{{ \App\Helpers\TranslateHelper::translate($data->category?->name) }}</span>
                                </div>
                            </div>
                            <a href="{{route('apply-now')}}">
                                <button class="w-full bg-white text-primary font-bold py-3 rounded-lg mt-6 hover:bg-gray-100 transition-colors shadow-md">
                                    {{ \App\Helpers\TranslateHelper::translate('Apply Now') }}
                                </button>
                            </a>
                        </div>

                        <!-- Related Topics -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2 pb-4 border-b-2 border-primary">
                                <i class="fas fa-bookmark text-primary"></i>
                                {{ \App\Helpers\TranslateHelper::translate('Related Topics') }}
                            </h3>
                            <div class="space-y-3">
                                <a href="#" class="block p-3 rounded-lg hover:bg-gray-50 transition-colors border border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-graduation-cap text-primary"></i>
                                        <span class="text-gray-700 font-medium text-sm hover:text-primary">
                                            {{ \App\Helpers\TranslateHelper::translate('Study in Australia Guide') }}
                                        </span>
                                    </div>
                                </a>
                                <a href="#" class="block p-3 rounded-lg hover:bg-gray-50 transition-colors border border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-university text-primary"></i>
                                        <span class="text-gray-700 font-medium text-sm hover:text-primary">
                                            {{ \App\Helpers\TranslateHelper::translate('Top Australian Universities') }}
                                        </span>
                                    </div>
                                </a>
                                <a href="#" class="block p-3 rounded-lg hover:bg-gray-50 transition-colors border border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-file-alt text-primary"></i>
                                        <span class="text-gray-700 font-medium text-sm hover:text-primary">
                                            {{ \App\Helpers\TranslateHelper::translate('Visa Requirements') }}
                                        </span>
                                    </div>
                                </a>
                                <a href="#" class="block p-3 rounded-lg hover:bg-gray-50 transition-colors border border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-dollar-sign text-primary"></i>
                                        <span class="text-gray-700 font-medium text-sm hover:text-primary">
                                            {{ \App\Helpers\TranslateHelper::translate('Cost of Living') }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Contact Card -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <i class="fas fa-headset text-primary"></i>
                                {{ \App\Helpers\TranslateHelper::translate('Need Assistance?') }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ \App\Helpers\TranslateHelper::translate('Our expert counselors are here to help you with your study abroad journey.') }}
                            </p>
                            <button class="w-full bg-primary text-white font-semibold py-3 rounded-lg hover:bg-sky-600 transition-colors">
                                {{ \App\Helpers\TranslateHelper::translate('Contact Counselor') }}
                            </button>
                        </div>

                        <!-- Recent Updates -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2 pb-4 border-b-2 border-primary">
                                <i class="fas fa-newspaper text-primary"></i>
                                {{ \App\Helpers\TranslateHelper::translate('Recent Updates') }}
                            </h3>
                            <div class="space-y-4">
                                @foreach($blogs as $item)
                                <div class="flex gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-300 cursor-pointer border-b border-gray-100">
                                    <img src="{{Storage::url($item->thumbnail_one)}}"
                                         alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                                         class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <p class="text-xs text-[#0EA5E9] mb-1 flex items-center gap-1">
                                            <i class="far fa-calendar-alt"></i>
                                            {{$item->story_date}}
                                        </p>
                                        <a href="{{ route('blog.single',$item->slug) }}">
                                            <h4 class="text-sm font-semibold text-gray-900 line-clamp-2 hover:text-[#0EA5E9] transition-colors duration-300">
                                                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
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

@section('js')
<script>
// Add your JavaScript here if needed
</script>
@endsection

@endsection