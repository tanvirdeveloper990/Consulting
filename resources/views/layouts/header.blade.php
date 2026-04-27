 <!-- SIDEBAR OVERLAY -->
 <div id="sidebarOverlay" onclick="closeSidebar()"></div>

 <!-- MOBILE SIDEBAR -->
 <div id="mobileSidebar">
   <div class="sidebar-header">
     <img src="{{ Storage::url($setting->header_logo)}}" alt="{{$setting->company_name}}" class="sidebar-logo">
     <button class="sidebar-close" onclick="closeSidebar()"><i class="fas fa-times"></i></button>
   </div>
   <nav class="sidebar-nav">
     <a href="/" class="active"><i class="fas fa-home fa-fw"></i> Home</a>
     <a href="{{route('service-support')}}"><i class="fas fa-info-circle fa-fw"></i> About Us</a>
     <a href="#"><i class="fas fa-concierge-bell fa-fw"></i> Services</a>
     <li class="nav-item dropdown">
       <a class="nav-link d-flex align-items-center gap-2" href="#"
         data-bs-toggle="collapse" data-bs-target="#mobileCountries" aria-expanded="false">
         <i class="fas fa-globe fa-fw"></i> Countries
         <i class="fas fa-chevron-down ms-auto small"></i>
       </a>
       <div class="collapse" id="mobileCountries">
         <div style="max-height:260px; overflow-y:auto; background:rgba(0,0,0,0.03); border-radius:8px;">
           @foreach($countries as $item)
           <a href="{{ route('study.destination', $item->id) }}"
             class="d-flex align-items-center gap-2 px-4 py-2 text-decoration-none"
             style="color:#fff; font-size:.9rem;">
             <img src="{{ Storage::url($item->flag) }}" alt="{{ $item->country }}"
               style="width:20px; height:14px; object-fit:cover; border-radius:2px; flex-shrink:0;">
             {{ $item->country }}
           </a>
           @endforeach
         </div>
       </div>
     </li>
     <a href="{{ route('testimonial')}}"><i class="fas fa-star fa-fw"></i> Testimonials</a>
     <a href="{{ route('news-updates') }}"><i class="fas fa-newspaper fa-fw"></i> Blogs & Events</a>
     <a href="{{url('apply-now')}}"><i class="fas fa-envelope fa-fw"></i> Contact</a>
   </nav>
 </div>
 </div>

 <!-- NAVBAR -->
 <nav id="mainNavbar">
   <div class="container-fluid px-4 px-xl-5">
     <div class="navbar-inner">

       <!-- Logo — left -->
       <!-- Logo — left (placeholder ধরে রাখবে জায়গা) -->
       <div id="logo-wrapper" class="flex-shrink-0">
         <a href="/" class="text-decoration-none" id="logo-link">
           <img src="{{ Storage::url($setting->header_logo)}}" alt="{{$setting->company_name}}"
             class="navbar-logo" id="navbar-logo">
         </a>
       </div>
       <!-- Nav links — absolute center -->
       <div class="navbar-center" id="desktopNav">
         <a href="/" class="nav-link active">Home</a>
         <a href="{{route('about-us')}}" class="nav-link">About Us</a>
         <a href="{{route('all-services')}}" class="nav-link">Services</a>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Countries
           </a>
           <ul class="dropdown-menu border-0 shadow p-0 rounded-bottom-3" style="min-width:200px;">
             <li>
               <div style="max-height:280px; overflow-y:auto;">
                 @foreach($countries as $item)
                 <a href="{{ route('study.destination', $item->id) }}"
                   class="dropdown-item d-flex align-items-center gap-2 px-3 py-2">
                   <img src="{{ Storage::url($item->flag) }}" alt="{{ $item->country }}"
                     style="width:20px; height:14px; object-fit:cover; border-radius:2px;">
                   {{ $item->country }}
                 </a>
                 @endforeach
               </div>
             </li>
           </ul>
         </li>
         <a href="{{ route('testimonial')}}" class="nav-link">Testimonials</a>
         <a href="{{ route('news-updates') }}" class="nav-link">Blogs & Events</a>
         <a href="{{url('apply-now')}}" class="nav-link">Contact</a>
       </div>
       <!-- Apply Now -->
       <div class="d-none d-lg-flex align-items-center flex-shrink-0">
         <a href="{{url('apply-now')}}" class="btn-apply-custom">
           <span class="sweep-bg"></span>
           <span class="btn-text">Apply now</span>
           <svg class="btn-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
             </path>
           </svg>
         </a>
       </div>

       <!-- Mobile hamburger -->
       <div class="mobile-toggler-wrap">
         <button class="navbar-toggler" onclick="openSidebar()">
           <span class="bar"></span>
           <span class="bar"></span>
           <span class="bar"></span>
         </button>
       </div>

     </div>
   </div>
 </nav>