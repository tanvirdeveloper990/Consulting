@extends('layouts.app')
@section('title','Excellent | Privacy Policy')

@section('content')

<main class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-sky-500 to-sky-700 py-16 rounded-b-3xl px-4">
        <div class="container mx-auto">
            <div class="text-center">
                <!-- Icon -->
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6">
                    <i class="fas fa-shield-alt text-4xl text-white"></i>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
                    {{ \App\Helpers\TranslateHelper::translate($page->title) }}
                </h1>

                <!-- Divider -->
                <div class="w-24 h-1 bg-white/40 mx-auto mb-6 rounded-full"></div>

                <!-- Description -->
                <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed mb-6">
                    {{ \App\Helpers\TranslateHelper::translate($page->short_description) }}
                </p>

                <!-- Last Updated Badge -->
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-5 py-2 rounded-full border border-white/20">
                    <i class="far fa-calendar-alt text-sm"></i>
                    <span class="text-sm font-medium">
                        {{ \App\Helpers\TranslateHelper::translate('Last Updated') }}: {{ $page->updated_at->format('F d, Y') }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 px-4">
        <div class="container mx-auto max-w-4xl">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                <div class="prose prose-lg max-w-none">
                    {!! \App\Helpers\TranslateHelper::translate($page->description) !!}
                </div>
            </div>
        </div>
    </section>
</main>

@endsection