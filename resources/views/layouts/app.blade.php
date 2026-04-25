@php
$setting = App\Models\Setting::first();
$countries = App\Models\Country::where('status',1)->get();
@endphp

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url($setting->favicon)}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        body {
            font-family: "Poppins", sans-serif;
        }

        /* Logo scroll animation styles - ADD THESE TO YOUR CSS */
    .logo-container {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .logo-large {
       width: 170px;
        height: 170px;
    }
    
    .logo-small {
     width: 70px;
        height: 70px;
    }
   
    
    /* Smooth navbar height transition */
    #navbar {
      transition: all 0.3s ease-in-out;
    }

        /* Smooth dropdown transitions */
        .dropdown-content {
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        }

        /*End Navbar logo animation */

        /* Floating animation for UCL Section images */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .float-animation-delay-1 {
            animation: float 3.5s ease-in-out infinite;
            animation-delay: 0.5s;
        }

        .float-animation-delay-2 {
            animation: float-slow 4s ease-in-out infinite;
            animation-delay: 1s;
        }

        .float-animation-delay-3 {
            animation: float-slow 3.8s ease-in-out infinite;
            animation-delay: 1.5s;
        }

        /* Inspire and reviews section */
        /* Smooth transitions for gallery items */
        .gallery-item {
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        /* Video responsive container */
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Marqee section */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            animation: scroll 10s linear infinite;
        }

        .marquee-container:hover .animate-scroll {
            animation-play-state: paused;
        }

        /* Fade edges effect */
        .marquee-container::before,
        .marquee-container::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            width: 150px;
            z-index: 10;
            pointer-events: none;
        }

        .marquee-container::before {
            left: 0;
            background: linear-gradient(to right,
                    rgba(249, 250, 251, 1) 0%,
                    rgba(249, 250, 251, 0) 100%);
        }

        .marquee-container::after {
            right: 0;
            background: linear-gradient(to left,
                    rgba(249, 250, 251, 1) 0%,
                    rgba(249, 250, 251, 0) 100%);
        }

        /* Fix button alignment in Slick slider */
        .countriesBtnSLider .slick-slide {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .countriesBtnSLider .slick-slide>div {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }

        /* Top Study destination Marqee  */
        @layer utilities {
            @keyframes marquee {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }

            .animate-marquee {
                animation: marquee 30s linear infinite;
            }

            .animate-marquee:hover {
                animation-play-state: paused;
            }
        }

        /* .country-tab {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: auto !important;
        margin: 8px auto !important;
      } */

        /* footer social icon styles */

        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px) scale(1.05);
            filter: drop-shadow(0 0 12px currentColor);
        }

        .facebook-icon {
            background: #1877f2;
        }

        .facebook-icon:hover {
            box-shadow: 0 0 20px rgba(24, 119, 242, 0.6);
        }

        .gmail-icon {
            background: #ea4335;
        }

        .gmail-icon:hover {
            box-shadow: 0 0 20px rgba(234, 67, 53, 0.6);
        }

        .instagram-icon {
            background: linear-gradient(45deg,
                    #f09433 0%,
                    #e6683c 25%,
                    #dc2743 50%,
                    #cc2366 75%,
                    #bc1888 100%);
        }

        .instagram-icon:hover {
            box-shadow: 0 0 20px rgba(228, 64, 95, 0.7);
        }

        .linkedin-icon {
            background: #0a66c2;
        }

        .linkedin-icon:hover {
            box-shadow: 0 0 20px rgba(10, 102, 194, 0.6);
        }

        .youtube-icon {
            background: #ff0000;
        }

        .youtube-icon:hover {
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
        }

        .pinterest-icon {
            background: #e60023;
        }

        .pinterest-icon:hover {
            box-shadow: 0 0 20px rgba(230, 0, 35, 0.6);
        }

        /* News update slider */

        /* Custom Arrow Styling */
        .slick-prev,
        .slick-next {
            width: 50px;
            height: 50px;
            z-index: 10;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .slick-prev:hover,
        .slick-next:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .slick-prev {
            left: 20px;
        }

        .slick-next {
            right: 20px;
        }

        .slick-prev:before,
        .slick-next:before {
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 20px;
            color: white;
            opacity: 1;
        }

        .slick-prev:before {
            content: "\f053";
            /* Left arrow icon */
        }

        .slick-next:before {
            content: "\f054";
            /* Right arrow icon */
        }

        /* Dots Styling */
        .slick-dots {
            bottom: 25px;
        }

        .slick-dots li button:before {
            font-size: 12px;
            color: white;
            opacity: 0.5;
        }

        .slick-dots li.slick-active button:before {
            opacity: 1;
            color: #eab308;
            /* yellow-500 */
        }

        /* Mobile responsive arrows */
        @media (max-width: 768px) {

            .slick-prev,
            .slick-next {
                width: 40px;
                height: 40px;
            }

            .slick-prev {
                left: 10px;
            }

            .slick-next {
                right: 10px;
            }

            .slick-prev:before,
            .slick-next:before {
                font-size: 16px;
            }
        }

        /* Floting social icon top of our website */
        @layer utilities {
            .hover-scale {
                transition: transform 0.3s ease;
            }

            .hover-scale:hover {
                transform: scale(1.1);
            }
        }
        .tabs_active{
            background-color: #0ea5e9;
        }
    </style>
    @yield('css')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#FF482F",
                        secondary: "#0A474C",
                        navbarBg:"#F7F7F7"
                    },
                },
            },
        };
    </script>
</head>

<body>

    @include('layouts.header')
    <main class="main">
        @yield('content')

    </main>
    @include('layouts.footer')

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    <script>
        const successBtn = document.getElementById("videosBtn"); // Success Stories button
        const reviewsBtn = document.getElementById("photosBtn"); // Verified Reviews button
        const successGrid = document.getElementById("videosGrid"); // Success Stories grid
        const reviewsGrid = document.getElementById("photosGrid"); // Verified Reviews grid

        // Function to show Success Stories and hide Reviews
        function showSuccessStories() {
            // Add active class to Success Stories button
            successBtn.classList.add("active");
            successBtn.classList.remove("inactive");

            // Remove active class from Reviews button
            reviewsBtn.classList.remove("active");
            reviewsBtn.classList.add("inactive");

            // Show success stories grid
            successGrid.classList.remove("hidden");

            // Hide reviews grid
            reviewsGrid.classList.add("hidden");
        }

        // Function to show Reviews and hide Success Stories
        function showReviews() {
            // Add active class to Reviews button
            reviewsBtn.classList.add("active");
            reviewsBtn.classList.remove("inactive");

            // Remove active class from Success Stories button
            successBtn.classList.remove("active");
            successBtn.classList.add("inactive");

            // Show reviews grid
            reviewsGrid.classList.remove("hidden");

            // Hide success stories grid
            successGrid.classList.add("hidden");
        }

        // Add click event listeners to buttons
        successBtn.addEventListener("click", showSuccessStories);
        reviewsBtn.addEventListener("click", showReviews);

        // Apply initial button styles using CSS
        const style = document.createElement("style");
        style.textContent = `
  .toggle-btn {
    background: white;
    color: #1f2937;
    border: 2px solid #e5e7eb;
  }

  .toggle-btn.active {
    background: #0EA5E9;
    color: white;
    border-color: #0EA5E9;
  }

  .toggle-btn.inactive {
    background: white;
    color: #6b7280;
    border-color: #e5e7eb;
  }

  .toggle-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  }
`;
        document.head.appendChild(style);

        // Set Success Stories as active by default on page load
        document.addEventListener("DOMContentLoaded", function() {
            showSuccessStories();
        });
    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    @endif

    @yield('js')
</body>

</html>