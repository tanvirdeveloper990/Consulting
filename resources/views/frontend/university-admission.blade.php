@extends('layouts.app')
@section('title','University Admission')

@section('content')

<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <!-- Section Header -->
    <div class="text-center mb-12">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-secondary mb-4">
            {{ \App\Helpers\TranslateHelper::translate($typeTitle) }}
        </h2>
        <p class="text-gray-600 text-base sm:text-lg max-w-3xl mx-auto">
            {{ \App\Helpers\TranslateHelper::translate($overview->admission_requirement_description) }}
        </p>
    </div>

    <!-- Requirements Cards Grid -->
    <div class="max-w-5xl mx-auto mb-12">
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border-t-4 border-primary">
            @foreach($admission as $item)
            <div class="mb-4">
                {!! \App\Helpers\TranslateHelper::translate($item->text) !!}
            </div>
            @endforeach
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
        <a href="{{url('apply-now')}}" 
           class="inline-block bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            {{ \App\Helpers\TranslateHelper::translate('Book Free Counseling') }}
        </a>
    </div>

</section>

@endsection