@extends('layouts.app')
@section('title','Notice')
@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-primary to-secondary py-8 md:py-16 lg:py-20 overflow-hidden">
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
            <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">
                {{ \App\Helpers\TranslateHelper::translate($overview->notice_title) }}
            </h1>
            <p class="text-sm md:text-lg mb-4 md:mb-6 text-white/90">
                {{ \App\Helpers\TranslateHelper::translate($overview->notice_description) }}
            </p>
        </div>
    </div>
</section>
        <!-- Notice Section -->
        <section class="my-16 container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Notice Image 1 -->
                @foreach($notice as $item)
                <div class="w-full h-[620px] md:h-96 lg:h-[570px] overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer"
                   onclick="openImageModal('{{ Storage::url($item->image) }}')">
                    <img src="{{Storage::url($item->image)}}" alt="empty"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                @endforeach
            </div>
        </section>

        <!-- Image Modal -->
        <div id="imageModal"
            class="fixed inset-0 bg-black bg-opacity-90 z-[9999] hidden items-center justify-center p-4"
            onclick="closeImageModal()">

            <!-- Modal Content -->
            <div class="relative max-w-7xl max-h-[90vh] w-full h-full flex items-center justify-center"
                onclick="event.stopPropagation()">

                <!-- Close Button -->
                <button onclick="closeImageModal()"
                    class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors duration-200 z-10 bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-70">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <!-- Modal Image -->
                <img id="modalImage" src="" alt="Notice Image"
                    class="max-w-full max-h-full object-contain rounded-lg shadow-2xl">
            </div>
        </div>



@endsection


@section('js')

<script>
    //================= Image Modal Functions =================
    function openImageModal(imageSrc) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        
        // Set the image source to modal
        modalImage.src = imageSrc;
        
        // Show the modal with flex display
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';
    }
    
    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        
        // Hide the modal
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        
        // Re-enable body scroll
        document.body.style.overflow = 'auto';
    }
    
    // Close modal when pressing ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeImageModal();
        }
    });

</script>

@endsection