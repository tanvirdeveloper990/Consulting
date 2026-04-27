<!-- Sidebar -->
<div id="sidebar">
    <div class="sidebar-header">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</div>

    <ul class="list-unstyled">
        @can('view dashboard')
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge"></i>
            <a class="text-decoration-none text-light ms-2" href="{{ route('admin.dashboard') }}"> Dashboard</a>
        </li>
        @endcan

        @canany([
        'create project-overview','edit project-overview','view project-overview','delete project-overview',
        'create slider','edit slider','view slider','delete slider',
        'create we-are','edit we-are','view we-are','delete we-are',
        'create student-support','edit student-support','view student-support','delete student-support',
        'create mychoose-us','edit mychoose-us','view mychoose-us','delete mychoose-us',
        'create top-study','edit top-study','view top-study','delete top-study',
        'create frequently','edit frequently','view frequently','delete frequently',
        'create our-partner','edit our-partner','view our-partner','delete our-partner',
        'create review','edit review','view review','delete review',
        'create setting','edit setting','view setting','delete setting',
        'create certificates','edit certificates','view certificates','delete certificates',
        'create university-admission','edit university-admission','view university-admission','delete university-admission',
        ])

        <li class="dropdown-btn">
            <span><i class="fa-solid fa-desktop "></i> Website</span>
            <i class="fa-solid fa-angle-down float-end mt-1"></i>
        </li>
        <ul class="submenu list-unstyled">

            @canany(['create project-overview','edit project-overview','view project-overview','delete project-overview'])
            <li class="{{ request()->routeIs('admin.project-overview.*') ? 'active' : '' }}">
                <a href="{{ route('admin.project-overview.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-chart-line me-2"></i> All Title
                </a>
            </li>
            @endcanany

            @canany(['create slider','edit slider','view slider','delete slider'])
            <li class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                <a href="{{ route('admin.sliders.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-images me-2"></i> Sliders
                </a>
            </li>
            @endcanany

           @canany(['create we-are','edit we-are','view we-are','delete we-are'])
                <li class="{{ request()->routeIs('admin.advanced-study.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.advanced-study.index') }}" class="nva-link ms-4">
                        <i class="fa-solid fa-circle-info me-2"></i> About Us
                    </a>
                </li>
            @endcanany


           @canany(['create student-support','edit student-support','view student-support','delete student-support'])
            <li class="{{ request()->routeIs('admin.journey-steps.*') ? 'active' : '' }}">
                <a href="{{ route('admin.journey-steps.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-list-check me-2"></i> Journey Steps
                </a>
            </li>
            @endcanany

            @canany(['create mychoose-us','edit mychoose-us','view mychoose-us','delete mychoose-us'])
            <li class="{{ request()->routeIs('admin.service.*') ? 'active' : '' }}">
                <a href="{{ route('admin.service.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-handshake-angle me-2"></i> Services
                </a>
            </li>
            @endcanany

            @canany(['create top-study','edit top-study','view top-study','delete top-study'])
            <li class="{{ request()->routeIs('admin.stories-satisfaction.*') ? 'active' : '' }}">
                <a href="{{ route('admin.stories-satisfaction.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-comments me-2"></i> Satisfaction Stories
                </a>
            </li>
            @endcanany

           @canany(['create frequently','edit frequently','view frequently','delete frequently'])
            <li class="{{ request()->routeIs('admin.frequently-asked.*') ? 'active' : '' }}">
                <a href="{{ route('admin.frequently-asked.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-question-circle me-2"></i> FAQ
                </a>
            </li>
            @endcanany

             {{--@canany(['create certificates','edit certificates','view certificates','delete certificates'])
            <li class="{{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                <a href="{{ route('admin.certificates.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-certificate me-2"></i> Certificate
                </a>
            </li>
            @endcanany

            
            @canany(['create review','edit review','view review','delete review'])
            <li class="{{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <a href="{{ route('admin.reviews.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-star me-2"></i> Reviews
                </a>
            </li>
            @endcanany

            @canany(['create university-admission','edit university-admission','view university-admission','delete university-admission'])
            <li class="{{ request()->routeIs('admin.university-admission.*') ? 'active' : '' }}">
                <a href="{{ route('admin.university-admission.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-graduation-cap me-2"></i> Our Service
                </a>
            </li>
            @endcanany--}}


            @canany(['create our-partner','edit our-partner','view our-partner','delete our-partner'])
            <li class="{{ request()->routeIs('admin.our-partners.*') ? 'active' : '' }}">
                <a href="{{ route('admin.our-partners.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-handshake me-2"></i> Our Partners
                </a>
            </li>
            @endcanany


            @canany(['create setting','edit setting','view setting','delete setting'])
            <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-cog"></i> Settings
                </a>
            </li>
            @endcanany

        </ul>
        @endcanany
        
       @canany([
        'create country','edit country','view country','delete country',
        'create study','edit study','view study','delete study'
        ])
        <li class="dropdown-btn">
            <span><i class="fa-solid fa-university"></i>Study Destination</span>
            <i class="fa-solid fa-angle-down float-end mt-1"></i>
        </li>
        <ul class="submenu list-unstyled">

            @canany(['create country','edit country','view country','delete country'])
            <li class="{{ request()->routeIs('admin.country.*') ? 'active' : '' }}">
                <a href="{{ route('admin.country.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-earth-asia me-2"></i> Country
                </a>
            </li>
            @endcanany

            @canany(['create study','edit study','view study','delete study'])
            <li class="{{ request()->routeIs('admin.study.*') ? 'active' : '' }}">
                <a href="{{ route('admin.study.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-book-open me-2"></i> Study
                </a>
            </li>
            @endcanany

        </ul>
        @endcanany


        @canany([
        'create career','edit career','view career','delete career',
        'create teams','edit teams','view teams','delete teams'
        ])
        {{--<li class="dropdown-btn">
            <span><i class="fa-solid fa-briefcase me-2"></i> Career</span>
            <i class="fa-solid fa-angle-down float-end mt-1"></i>
        </li>
        <ul class="submenu list-unstyled">

            @canany(['create career','edit career','view career','delete career'])
            <li class="{{ request()->routeIs('admin.career.*') ? 'active' : '' }}">
                <a href="{{ route('admin.career.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-briefcase me-2"></i> Career
                </a>
            </li>
            @endcanany

            @canany(['create teams','edit teams','view teams','delete teams'])
            <li class="{{ request()->routeIs('admin.teams.*') ? 'active' : '' }}">
                <a href="{{ route('admin.teams.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-users me-2"></i> Apply
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.message.*') ? 'active' : '' }}">
                <a href="{{ route('admin.message.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-quote-left me-2"></i> Founder Message
                </a>
            </li>
           <li class="{{ request()->routeIs('admin.notice.*') ? 'active' : '' }}">
                <a href="{{ route('admin.notice.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-bullhorn me-2"></i> Notice
                </a>
            </li>

            @endcanany




        </ul>--}}
        @endcanany

        @canany([
        'create category','edit category','view category','delete category',
        'create blog','edit blog','view blog','delete blog'
        ])
        <li class="dropdown-btn">
            <span> <i class="fa-solid fa-blog me-2"></i>Blogs</span>
            <i class="fa-solid fa-angle-down float-end mt-1"></i>
        </li>
        <ul class="submenu list-unstyled">
            @canany(['create category','edit category','view category','delete category'])
            <li class="{{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                <a href="{{ route('admin.category.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-folder-open me-2"></i> Category
                </a>
            </li>
            @endcanany

            @canany(['create blog','edit blog','view blog','delete blog'])
            <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                <a href="{{ route('admin.blogs.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Blog Post
                </a>
            </li>
            @endcanany

        </ul>
        @endcanany
        @canany([
        'create category-gallery','edit category-gallery','view category-gallery','delete category-gallery',
        'create gallery','edit gallery','view gallery','delete gallery'
        ])
        {{--<li class="dropdown-btn">
            <span>
                <i class="fa-solid fa-images me-2"></i> Gallery
            </span>
            <i class="fa-solid fa-chevron-down float-end mt-1"></i>
        </li>

        <ul class="submenu list-unstyled">
            @canany(['create category-gallery','edit category-gallery','view category-gallery','delete category-gallery'])
            <li class="{{ request()->routeIs('admin.category-gallery.*') ? 'active' : '' }}">
                <a href="{{ route('admin.category-gallery.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-folder-tree me-2"></i> Category
                </a>
            </li>
            @endcanany

            @canany(['create gallery','edit gallery','view gallery','delete gallery'])
            <li class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery.index') }}" class="nva-link ms-4">
                    <i class="fa-solid fa-image me-2"></i> Gallery
                </a>
            </li>
            @endcanany
        </ul>--}}

        @endcanany

        @canany(['create service-support','edit service-support','view service-support','delete service-support'])
        {{--<li class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
            <i class="fa-solid fa-headset"></i>
            <a class="text-decoration-none text-light ms-2"
                href="{{ route('admin.services.index') }}">
                Service & Support
            </a>
        </li>--}}
        @endcanany


        @canany(['create applied','edit applied','view applied','delete applied'])
        <li class="{{ request()->routeIs('admin.applied.*') ? 'active' : '' }}">
            <i class="fa-solid fa-file-alt"></i>
            <a class="text-decoration-none text-light ms-2"
                href="{{ route('admin.applied.index') }}">
                Applied
            </a>
        </li>
        @endcanany

        @canany(['create pages','edit pages','view pages','delete pages'])
        <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
            <i class="fa-solid fa-book-open"></i>
            <a class="text-decoration-none text-light ms-2"
                href="{{ route('admin.pages.index') }}">
                Pages
            </a>
        </li>
        @endcanany



        @canany(['create user','edit user','view user','delete user','create role','edit role','view role','delete
        role'])
        <li class="dropdown-btn">
            <span><i class="fa-solid fa-layer-group"></i> Management</span>
            <i class="fa-solid fa-angle-down float-end mt-1"></i>
        </li>
        <ul class="submenu list-unstyled">
            @can('view user')
            <li class="">
                <a href="{{ route('admin.users.index') }}"
        class="nva-link text-light text-decoration-none ms-4">Users</a>
        </li>
        @endcan
        @can('view role')
        <li class="">
            <a href="{{ route('admin.roles.index') }}"
                class="nva-link text-light text-decoration-none ms-4">Roles</a>
        </li>
        <li class="">
            <a href="{{ route('admin.roles.index') }}"
                class="nva-link text-light text-decoration-none ms-4">Permissions</a>
        </li>
        @endcan
    </ul>
    @endcanany



    <li>
        <i class="fa-solid fa-right-from-bracket"></i>
        <a href="{{ route('admin.logout') }}" class="text-decoration-none text-light"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">@csrf</form>
    </li>
    </ul>
</div>