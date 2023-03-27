<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Tuyen Doan">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('backend/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('backend/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Sweet Alert2-->
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main CSS-->
    <link href="{{asset('backend/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">

<div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="{{asset('backend/images/icon/logo.png')}}" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="
                    @if(strpos(Request::route()->getName(), 'admin.categories') === 0)
                        active
                    @endif
                    ">
                        <a href="{{route('admin.categories.index')}}">
                            <i class="fas fa-chart-bar"></i>Category
                        </a>
                    </li>
                    <li class="
                    @if(strpos(Request::route()->getName(), 'admin.subcategories') === 0)
                        active
                    @endif
                    ">
                        <a href="{{route('admin.subcategories.index')}}">
                            <i class="fas fa-chart-bar"></i>Subcategory
                        </a>
                    </li>
                    <li class="
                    @if(strpos(Request::route()->getName(), 'admin.products') === 0)
                        active
                    @endif
                    ">
                        <a href="{{route('admin.products.index')}}">
                            <i class="fas fa-chart-bar"></i>Product
                        </a>
                    </li>

                    <li class="
                    @if(strpos(Request::route()->getName(), 'admin.posts') === 0)
                        active
                    @endif
                    ">
                        <a href="{{route('admin.posts.index')}}">
                            <i class="fas fa-chart-bar"></i>Post
                        </a>
                    </li>

                    <li class="
                    @if(strpos(Request::route()->getName(), 'admin.admins') === 0)
                        active
                    @endif
                    ">
                        <a href="{{route('admin.admins.index')}}">
                            <i class="fas fa-chart-bar"></i>Admin
                        </a>
                    </li>

                    <li class="
                    @if(strpos(Request::route()->getName(), 'admin.roles') === 0)
                        active
                    @endif
                    ">
                        <a href="{{route('admin.roles.index')}}">
                            <i class="fas fa-chart-bar"></i>Role
                        </a>
                    </li>
                    <li class="
                    @if(strpos(Request::route()->getName(), 'admin.permissions') === 0)
                        active
                    @endif
                    ">
                        <a href="{{route('admin.permissions.index')}}">
                            <i class="fas fa-chart-bar"></i>Permission
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">

                        <form class="form-header" action="" method="POST">
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for..." />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>

                        <div class="header-button">
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{asset('backend/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ auth('admin')->user()->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{asset('backend/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ auth('admin')->user()->name }}</a>
                                                </h5>
                                                <span class="email">{{ auth('admin')->user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account
                                                </a>
                                            </div>

                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="#"
                                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="zmdi zmdi-power"></i>Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div style="padding-top: 90px" class="main-content">
            <div class="section__content">
                <div class="container-fluid">

                    {{--Start Table--}}
                    @yield('content')
                    {{--End Table--}}

                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->

    </div>
    <!-- END PAGE CONTAINER-->

</div>

<!-- Jquery JS-->
<script src="{{asset('backend/vendor/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap JS-->
<script src="{{asset('backend/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

<!-- Vendor JS       -->
<script src="{{asset('backend/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('backend/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('backend/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('backend/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('backend/vendor/counter-up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('backend/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('backend/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('backend/vendor/select2/select2.min.js')}}"></script>

<!-- Main JS-->
<script src="{{asset('backend/js/main.js')}}"></script>

<script>
    @if(session('alert-error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{session('alert-error')}}",
            timerProgressBar: true,
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
        });
    @endif

    @if(session('alert-success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{session('alert-success')}}",
            timerProgressBar: true,
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
        });
    @endif

    $(document).ready(function(){
        $('.submitDeleteForm').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents().children('form');
            Swal.fire({
                title: '',
                text: "Bạn có chắc chắn muốn xoá không ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        });
    });


</script>

</body>

</html>
<!-- end document-->
