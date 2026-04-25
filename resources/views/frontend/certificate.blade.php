@extends('layouts.app')
@section('title','Certificates')

@section('content')
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

    </div>
</section>

@endsection