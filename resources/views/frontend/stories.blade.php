@extends('layouts.app')
@section('title','Success Stories')

@section('content')

    
    <!-- Success Stories Section -->
    <section class="py-6 px-4 mt-5 mb-5">
        <div class="container mx-auto">
            <!-- Section Header -->
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
    
            <!-- Videos Grid -->
                       <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($videoreview as $item)
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

        </div>
    </section>

@endsection