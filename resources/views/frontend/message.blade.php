@extends('layouts.app')
@section('title','Founder')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-primary to-secondary py-14 md:py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white" />
                    <line x1="20" y1="0" x2="20" y2="40" stroke="white" stroke-width="0.5" />
                    <line x1="0" y1="20" x2="40" y2="20" stroke="white" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ \App\Helpers\TranslateHelper::translate($overview->message_title) }}
            </h1>
            <p class="text-lg md:text-xl mb-8 text-white/90">
                {{ \App\Helpers\TranslateHelper::translate($overview->message_description) }}
            </p>
        </div>
    </div>
</section>

<!-- Founder Message Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8">
  <div class="container mx-auto space-y-12">
    
    @foreach($message as $index => $item)
    <!-- Main Content Card -->
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
      <div class="grid grid-cols-1 lg:grid-cols-5 gap-0">

        @if($index % 2 == 0)
          <!-- Even: Image on Left -->
          <!-- Left Side - Founder Image -->
          <div class="lg:col-span-2 relative group">
            <div class="relative h-[400px] lg:h-full min-h-[500px]">
              <img src="{{Storage::url($item->image)}}"
                alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                class="w-full h-full object-cover">

              <!-- Gradient Overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

              <!-- Name Bar with Primary Color -->
              <div class="absolute bottom-0 left-0 right-0 bg-[#FF482F] px-8 py-6">
                <h3 class="text-2xl lg:text-3xl font-bold text-white mb-1">
                  {{ \App\Helpers\TranslateHelper::translate($item->name) }}
                </h3>
                <p class="text-lg text-white/90 font-medium">
                  {{ \App\Helpers\TranslateHelper::translate($item->designation) }}
                </p>
              </div>
            </div>
          </div>

          <!-- Right Side - Message Content -->
          <div class="lg:col-span-3 p-8 lg:p-12 flex flex-col justify-center">

            <!-- Content Title -->
            <div class="mb-8">
              <div class="inline-block px-4 py-2 bg-[#FF482F]/10 rounded-full mb-4">
                <span class="text-sm font-semibold text-[#FF482F] uppercase tracking-wide">
                  {{ \App\Helpers\TranslateHelper::translate($item->designation) }}
                </span>
              </div>
              <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">
                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
              </h2>
            </div>

            <!-- Message Paragraphs -->
            <div class="space-y-6">
              <p class="text-base lg:text-lg text-gray-700 leading-relaxed">
                {!! \App\Helpers\TranslateHelper::translate($item->description) !!}
              </p>
            </div>

            <!-- Signature Line -->
            <div class="mt-10 pt-8 border-t-2 border-gray-200">
              <div class="flex items-center gap-4">
                <div class="h-0.5 w-16 bg-[#FF482F]"></div>
                <p class="text-xl font-bold text-gray-900">
                  {{ \App\Helpers\TranslateHelper::translate($item->name) }}
                </p>
              </div>
              <p class="text-sm text-gray-500 mt-2 ml-20">
                {{ \App\Helpers\TranslateHelper::translate($item->designation) }}
              </p>
            </div>
          </div>

        @else
          <!-- Odd: Content on Left, Image on Right -->
          <!-- Left Side - Message Content -->
          <div class="lg:col-span-3 p-8 lg:p-12 flex flex-col justify-center order-2 lg:order-1">

            <!-- Content Title -->
            <div class="mb-8">
              <div class="inline-block px-4 py-2 bg-[#FF482F]/10 rounded-full mb-4">
                <span class="text-sm font-semibold text-[#FF482F] uppercase tracking-wide">
                  {{ \App\Helpers\TranslateHelper::translate($item->designation) }}
                </span>
              </div>
              <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">
                {{ \App\Helpers\TranslateHelper::translate($item->title) }}
              </h2>
            </div>

            <!-- Message Paragraphs -->
            <div class="space-y-6">
              <p class="text-base lg:text-lg text-gray-700 leading-relaxed">
                {!! \App\Helpers\TranslateHelper::translate($item->description) !!}
              </p>
            </div>

            <!-- Signature Line -->
            <div class="mt-10 pt-8 border-t-2 border-gray-200">
              <div class="flex items-center gap-4">
                <div class="h-0.5 w-16 bg-[#FF482F]"></div>
                <p class="text-xl font-bold text-gray-900">
                  {{ \App\Helpers\TranslateHelper::translate($item->name) }}
                </p>
              </div>
              <p class="text-sm text-gray-500 mt-2 ml-20">
                {{ \App\Helpers\TranslateHelper::translate($item->designation) }}
              </p>
            </div>
          </div>

          <!-- Right Side - Founder Image -->
          <div class="lg:col-span-2 relative group order-1 lg:order-2">
            <div class="relative h-[400px] lg:h-full min-h-[500px]">
              <img src="{{Storage::url($item->image)}}"
                alt="{{ \App\Helpers\TranslateHelper::translate($item->title) }}"
                class="w-full h-full object-cover">

              <!-- Gradient Overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

              <!-- Name Bar with Primary Color -->
              <div class="absolute bottom-0 left-0 right-0 bg-[#FF482F] px-8 py-6">
                <h3 class="text-2xl lg:text-3xl font-bold text-white mb-1">
                  {{ \App\Helpers\TranslateHelper::translate($item->name) }}
                </h3>
                <p class="text-lg text-white/90 font-medium">
                  {{ \App\Helpers\TranslateHelper::translate($item->designation) }}
                </p>
              </div>
            </div>
          </div>
        @endif

      </div>
    </div>
    @endforeach

    <!-- Bottom Accent -->
    <div class="mt-8 flex justify-center gap-2">
      <div class="h-2 w-2 rounded-full bg-[#0EA5E9]"></div>
      <div class="h-2 w-2 rounded-full bg-[#0EA5E9]/60"></div>
      <div class="h-2 w-2 rounded-full bg-[#0EA5E9]/30"></div>
    </div>

  </div>
</section>

@endsection