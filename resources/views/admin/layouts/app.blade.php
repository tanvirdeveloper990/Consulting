@php
$setting = \App\Models\Setting::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ Storage::url($setting->favicon) }}" type="image/x-icon">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    <!-- Custom CSS for flags -->
    <style>
        .country-flag {
            width: 20px;
            height: 15px;
            margin-right: 10px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }
        
        .select2-results__option {
            padding: 8px;
        }
        
        .select2-selection__rendered {
            padding-left: 8px !important;
        }
    </style>

    <style>
        /* Sidebar */
        #sidebar {
            width: 250px;
            height: 100vh;
            background: #1f2937;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            transition: 0.3s;
            overflow-y: auto;
            z-index: 1000;
        }

        #sidebar.collapsed {
            left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #111827;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        /* Make entire li clickable */
        #sidebar ul li {
            padding: 12px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #sidebar ul li a {
            display: block;
            width: 100%;
            color: inherit;
            text-decoration: none;
        }


        #sidebar ul li:hover {
            background: #374151;
        }

        #sidebar ul li i {
            width: 25px;
        }

        /* Dropdown */
        .submenu {
            display: none;
            background: #2d3748;
        }

        .submenu li {
            padding-left: 50px;
        }

        /* Content */
        #content {
            margin-left: 250px;
            transition: 0.3s;
            /* padding: 20px; */
        }

        #content.expanded {
            margin-left: 0;
        }

        /* Top Navbar */
        .topbar {
            height: 60px;
            background: #4f46e5;
            /* custom bg color */
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .topbar .icon-btn {
            font-size: 22px;
            cursor: pointer;
        }

        /* Profile dropdown */
        .profile-area {
            position: relative;
            cursor: pointer;
        }

        .profile-dropdown {
            position: absolute;
            top: 55px;
            right: 0;
            background: white;
            width: 200px;
            display: none;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            z-index: 2000;
        }

        .profile-dropdown a {
            padding: 10px 15px;
            display: block;
            color: #333;
            text-decoration: none;
        }

        .profile-dropdown a:hover {
            background: #f3f4f6;
        }

        /* Responsive */
        @media(max-width: 768px) {
            #sidebar {
                left: -250px;
            }

            #sidebar.active {
                left: 0;
            }

            #content {
                margin-left: 0 !important;
            }
        }

        #sidebar .active {
            background: rebeccapurple;
        }

        .card-header {
            background: linear-gradient(135deg, #4b79a1, #283e51);
            align-items: center;
            color: #FFF;
        }
    </style>
    @yield('css')

</head>

<body>

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')


    <!-- Main Content -->
    <div id="content">

        <!-- Top Bar -->
        <div class="topbar">
            <i class="fa-solid fa-bars icon-btn" id="toggleBtn"></i>

            <div class="profile-area" id="profileMenu">
                <img src="{{ Storage::url(Auth::guard('admin')->user()->image) }}" width="35" height="35"
                    style="border-radius:50%; border:2px solid white;">
                <span class="ms-2 fw-bold">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                <i class="fa-solid fa-angle-down ms-1"></i>

                <!-- Dropdown -->
                <div class="profile-dropdown" id="dropdownMenu">
                    <a href="{{ route('admin.profile.settings') }}"><i class="fa-regular fa-user me-2"></i> Profile</a>
                    {{-- <a href="{{ route('admin.profile.settings') }}"><i class="fa-solid fa-gear me-2"></i> Settings</a> --}}
                    <a href="{{ route('admin.change.password') }}"><i class="fa-solid fa-key me-2"></i> Change Password</a>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>
        </div>

        <main class="p-3">
            @yield('content')


        </main>

    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            // Sidebar dropdown toggle - full li clickable & only one open at a time
            $('#sidebar .dropdown-btn').click(function(e) {
                e.stopPropagation(); // Prevent body click

                var submenu = $(this).next('.submenu');

                // Close all other submenus except current
                $('.submenu').not(submenu).slideUp();
                $('.dropdown-btn').not(this).removeClass('active');

                // Toggle current submenu
                submenu.slideToggle();
                $(this).toggleClass('active');
            });

            // Open submenu if it contains active li on page load
            $('.submenu').each(function() {
                if ($(this).find('li.active').length > 0) {
                    $(this).show();
                    $(this).prev('.dropdown-btn').addClass('active');
                }
            });

            // Sidebar toggle for mobile & desktop
            $('#toggleBtn').click(function(event) {
                event.stopPropagation();
                let sidebar = $('#sidebar');
                if (window.innerWidth <= 768) {
                    sidebar.toggleClass('active');
                } else {
                    sidebar.toggleClass('collapsed');
                    $('#content').toggleClass('expanded');
                }
            });

            // Click outside sidebar closes sidebar (mobile) and profile dropdown
            $(document.body).click(function() {
                if (window.innerWidth <= 768) {
                    $('#sidebar').removeClass('active');
                }
                $('#dropdownMenu').hide();
            });

            // Prevent sidebar click from closing
            $('#sidebar').click(function(e) {
                e.stopPropagation();
            });

            // Profile dropdown toggle
            $('#profileMenu').click(function(e) {
                $('#dropdownMenu').toggle();
                e.stopPropagation();
            });

            // Make submenu links clickable full li area
            $('#sidebar .submenu li').click(function() {
                $(this).addClass('active').siblings().removeClass('active');
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('#adminForm').validate({
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    if (element.prop('type') === 'checkbox') {
                        error.insertAfter(element.next('label'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass(errorClass).addClass(validClass);
                },
                submitHandler: function(form) {
                    alert('Form Submitted Successfully!');
                    form.reset();
                }
            });
        });
    </script> -->
    <script>
        $(function() {
            $('#form').validate({
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
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
    @if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
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
    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function(e) {
                e.preventDefault();
                var itemId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this item?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete-form-' + itemId).submit();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Not Deleted!',
                            text: 'You have cancelled the deletion.'
                        });
                    }
                });


            });
        });
    </script>




<!-- jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>


<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250,
            placeholder: 'Write blog description here...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>



    @yield('script')

</body>

</html>