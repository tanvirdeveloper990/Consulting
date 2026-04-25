@extends('layouts.app')
@section('title','Verified Reviews')

@section('content')

    <!-- Verified Reviews Section -->
    <section class="py-6 px-4 mt-5 mb-5">
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
    
        </div>
    </section>


@endsection