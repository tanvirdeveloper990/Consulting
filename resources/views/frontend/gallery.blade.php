@extends('layouts.app')
@section('title','Gallery')
@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-primary to-secondary py-20 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="gallery-pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white" />
                    <line x1="20" y1="0" x2="20" y2="40" stroke="white" stroke-width="0.5" />
                    <line x1="0" y1="20" x2="40" y2="20" stroke="white" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#gallery-pattern)" />
        </svg>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ \App\Helpers\TranslateHelper::translate($overview->our_gallery_title) }}
            </h1>
            <p class="text-lg md:text-xl text-white/90">
                {{ \App\Helpers\TranslateHelper::translate($overview->our_gallery_description) }}
            </p>
        </div>
    </div>
</section>

<!-- Gallery Categories Filter -->
<section class="py-12 bg-white border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-4">
            <!-- All Photos Button (Default Active) -->
            <button onclick="filterGallery('all')"
                class="filter-btn active px-6 py-3 rounded-lg font-semibold transition duration-300 bg-primary text-white hover:bg-primary/90"
                data-category="all">
                {{ \App\Helpers\TranslateHelper::translate('All Photos') }}
            </button>

            <!-- Dynamic Categories -->
            @foreach($categories as $category)
            <button onclick="filterGallery('{{ $category->id }}')"
                class="filter-btn px-6 py-3 rounded-lg font-semibold transition duration-300 bg-gray-100 text-gray-700 hover:bg-gray-200"
                data-category="{{ $category->id }}">
                {{ \App\Helpers\TranslateHelper::translate($category->name) }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="gallery-grid">

            @foreach($galleries as $index => $gallery)
            <!-- Gallery Item -->
            <div class="gallery-item group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer"
                data-category="{{ $gallery->gallery_id }}"
                onclick="openLightbox({{ $index }})">
                <div class="aspect-square bg-gray-200">
                    <img src="{{ Storage::url($gallery->image) }}"
                        alt="{{ \App\Helpers\TranslateHelper::translate($gallery->title) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>

                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <h3 class="text-white font-bold text-lg mb-2">
                        {{ \App\Helpers\TranslateHelper::translate($gallery->title) }}
                    </h3>
                    <p class="text-white/90 text-sm">
                        {{ \App\Helpers\TranslateHelper::translate($gallery->subtitle) }}
                    </p>
                </div>

                <!-- Category Badge -->
                @if($gallery->category)
                <div class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-xs font-semibold">
                    {{ \App\Helpers\TranslateHelper::translate($gallery->category->name) }}
                </div>
                @endif
            </div>
            @endforeach

        </div>

        <!-- Load More Button (Optional) -->
        @if($galleries->count() > 12)
        <div class="text-center mt-12">
            <button class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary/90 transition duration-300 shadow-lg hover:shadow-xl">
                {{ \App\Helpers\TranslateHelper::translate('Load More Photos') }}
            </button>
        </div>
        @endif
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">{{$setting->student_count}}+</div>
                <div class="text-gray-600 font-medium">
                    {{ \App\Helpers\TranslateHelper::translate($setting->student_title) }}
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-secondary mb-2">{{$setting->success_count}}%</div>
                <div class="text-gray-600 font-medium">
                    {{ \App\Helpers\TranslateHelper::translate($setting->success_title) }}
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">{{$setting->partner_count}}+</div>
                <div class="text-gray-600 font-medium">
                    {{ \App\Helpers\TranslateHelper::translate($setting->partner_title) }}
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-secondary mb-2">{{$setting->country_count}}+</div>
                <div class="text-gray-600 font-medium">
                    {{ \App\Helpers\TranslateHelper::translate($setting->country_title) }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden flex items-center justify-center p-4">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 transition duration-300">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <button onclick="prevImage()" class="absolute left-4 text-white hover:text-gray-300 transition duration-300">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <div class="max-w-5xl w-full">
        <img id="lightbox-img" src="" alt="" class="w-full h-auto rounded-lg shadow-2xl">
        <div class="text-center mt-6 text-white">
            <h3 id="lightbox-title" class="text-2xl font-bold mb-2"></h3>
            <p id="lightbox-desc" class="text-gray-300"></p>
        </div>
    </div>

    <button onclick="nextImage()" class="absolute right-4 text-white hover:text-gray-300 transition duration-300">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>

<script>
    function filterGallery(category) {
        // Get all gallery items
        const items = document.querySelectorAll('.gallery-item');
        const buttons = document.querySelectorAll('.filter-btn');

        // Remove active class from all buttons
        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-primary', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-700');
        });

        // Add active class to clicked button
        const activeBtn = document.querySelector(`[data-category="${category}"]`);
        activeBtn.classList.add('active', 'bg-primary', 'text-white');
        activeBtn.classList.remove('bg-gray-100', 'text-gray-700');

        // Filter items
        items.forEach(item => {
            if (category === 'all') {
                item.style.display = 'block';
            } else {
                if (item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
        });
    }
</script>
@endsection