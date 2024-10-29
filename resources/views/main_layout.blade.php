<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Lina Bill</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('uploads/header_image/' . $headerdata->logo) }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!-- Wow -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Font Awsome icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/FontAwesome.Pro.6.5.2/css/all.css') }}">
    <style>
        .product-card__badge{
            z-index: 10;
        }

        .tooltip-inner {
            background-color: white !important; /* Set background to white */
            color: black !important; /* Set text color to black */
            border: 1px solid #ccc; /* Optional: Add a border for visibility */
        }
    </style>
</head> 
<body>
    
<!--==================== Preloader Start ====================-->
  <!-- <div class="preloader">
    <img src="assets/images/icon/preloader.gif" alt="">
    <div class="loader"></div>
  </div> -->
<!--==================== Preloader End ====================-->

<!--==================== Overlay Start ====================-->
<!-- <div class="overlay"></div> -->
<!--==================== Overlay End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<!-- <div class="side-overlay"></div> -->
<!--==================== Sidebar Overlay End ====================-->

<!-- ==================== Scroll to Top End Here ==================== -->
<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<!-- ==================== Scroll to Top End Here ==================== -->

<!-- ==================== Search Box Start Here ==================== -->
 <form action="{{ route('search') }}" method="get" class="search-box">
  <button type="button" class="search-box__close position-absolute inset-block-start-0 inset-inline-end-0 m-16 w-48 h-48 border border-gray-100 rounded-circle flex-center text-white hover-text-gray-800 hover-bg-white text-2xl transition-1">
    <i class="ph ph-x"></i>
  </button>
  <div class="container">
    <div class="position-relative">
      <input type="text" value="{{ request('query') }}" class="form-control py-16 px-24 text-xl rounded-pill pe-64" placeholder="Search for a product or brand">
      <button type="submit" class="w-48 h-48 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
        <i class="ph ph-magnifying-glass"></i>
      </button>
    </div>
  </div>
 </form>
<!-- ==================== Search Box End Here ==================== -->

<!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu scroll-sm d-lg-none d-block">
    <button type="button" class="close-button"> <i class="ph ph-x"></i> </button>
    <div class="mobile-menu__inner">
        <a href="index.html" class="mobile-menu__logo">
            <img src="{{ asset('uploads/header_image/' . $headerdata->logo) }}" alt="Logo">
        </a>
        <div class="mobile-menu__menu">
            <!-- Nav Menu Start -->
            <ul class="nav-menu flex-align nav-menu--mobile">
                <li class="on-hover-item nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">Eyeglasses</a>
                    <div class="common-dropdown nav-submenu on-hover-dropdown w-100 mt-0" aria-labelledby="navbarDropdown" >
                        <div class="container">
                            <div class="row my-4">
                            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                <p class="mb-0 list-group-item fw-bold">
                                    Shop By Material
                                </p>
                                @foreach ($materials as $item)
                                    <a href="{{ route('shop_by_material', $item->mat_name )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">{{$item->mat_name}}</a>
                                @endforeach
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2 mb-3 mb-lg-0">
                                <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                <p class="mb-0 list-group-item fw-bold">
                                    Shop By Type
                                </p>
                                <a href="{{ route('shop_by_frame', 'Full Frame' )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">Full Frame</a>
                                <a href="{{ route('shop_by_frame', 'Semi-Rimless' )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">Semi-Rimless</a>
                                <a href="{{ route('shop_by_frame', 'Rimless' )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">Rimless</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                    <p class="mb-0 list-group-item fw-bold">
                                        Shop By Color
                                    </p>
                                    <div class="flex-align" style="max-width: 250px">
                                        <div class="wrap-color">
                                            @foreach ($colors as $item)
                                            <a href="{{ route('shop_by_color', $item->color_name) }}" class="color" data-bs-toggle="tooltip" title="{{ $item->color_name}}">
                                                <div class="wrap-color-img">
                                                    <img src="{{ asset('uploads/color_image/' . $item->color_image) }}" style="width: 20px" alt="{{ $item->color_name}}">
                                                </div>
                                            </a>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                                <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                <p class="mb-0 list-group-item fw-bold">
                                    Shop By Shape
                                </p>
                                    <div class="wrap-shape" style="max-width: 250px">
                                        @foreach ($shapes as $item)
                                        <a href="{{ route('shop_by_shape', $item->shape_name)}}" class="shape">
                                            <img src="{{ asset('uploads/shape_images/' .$item->shape_image)}}" alt="{{$item->shape_name}}" style="width: 70px">
                                        </a>
                                        @endforeach
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="on-hover-item nav-menu__item">
                    <!-- <span class="badge-notification bg-warning-600 text-white text-sm py-2 px-8 rounded-4">New</span> -->
                    <a href="{{ route('new_in') }}" class="nav-menu__link">New In</a>
                </li>
                <li class="on-hover-item nav-menu__item">
                    <a href="{{ route('best_seller') }}" class="nav-menu__link">Best Seller</a>
                </li>
                <li class="nav-menu__item">
                    <a href="{{ route('flash_sale') }}" class="nav-menu__link">Flash Sale</a>
                </li>
            </ul>
            <!-- Nav Menu End -->
        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->


<!-- ======================= Middle Top Start ========================= -->
<div class="header-top bg-main-600 flex-between" style="height: 50px; background: url('{{ asset('assets/images/alert_back.avif') }}') no-repeat center center / cover;">
    <div class="container container-lg">
        <div class="flex-between flex-wrap gap-8" style="justify-content: center !important;">
            <img src="{{ asset('uploads/header_image/' . $headerdata->top_bar_image) }}">
        </div>
    </div>
</div>
<!-- ======================= Middle Top End ========================= -->

<!-- ======================= Middle Header Start ========================= -->
<header class="header1 bg-color-one border-bottom border-gray-100">
    <div class="container container-lg">
        <nav class="header-inner flex-between">
            <!-- Logo Start -->
            <div class="d-lg-block d-none">
                {{ $headerdata->heading_text }}
            </div>
            <!-- Logo End  -->

            <!-- Logo Start -->
            <div class="logo">
                <a href="{{ route('home') }}" class="link">
                    <img src="{{ asset('uploads/header_image/' . $headerdata->logo) }}" alt="Logo">
                </a>
            </div>
            <!-- Logo End  -->
             
            <!-- Header Middle Right start -->
            <div class="header-right flex-align d-lg-block d-none">
                <div class="flex-align flex-wrap gap-12">
                    <button type="button" class="search-icon flex-align d-lg-none d-flex gap-4 item-hover">
                        <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                            <i class="ph ph-magnifying-glass"></i>
                        </span>
                    </button>
                    <div class="on-hover-item">
                        <button class="flex-align gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                                <i class="fa-light fa-user"></i>
                            </span>
                        </button>
                        <ul class="on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm px-0 py-8">
                            @if (Auth::id())
                            <li class="nav-submenu__item">
                                <a href="{{ route('user.dashboard') }}" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                    <i class="demo-pli-unlock icon-lg icon-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('orders') }}" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                    <i class="demo-pli-unlock icon-lg icon-fw"></i> Orders
                                </a>
                            </li>
                            <li class="nav-submenu__item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                </a>
                            </li>
                            @else
                            <li class="nav-submenu__item">
                                <button data-bs-toggle="modal" data-bs-target="#sign_in_modal" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                    Sign In
                                </button>
                            </li>
                            <li class="nav-submenu__item">
                                <button data-bs-toggle="modal" data-bs-target="#sign_up_modal" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                    Sign Up
                                </button>
                            </li>
                            @endif
                            
                        </ul>
                    </div>
                    {{-- <a href="cart.html" class="flex-align gap-4 item-hover">
                        <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                            <i class="ph ph-heart"></i>
                            <span class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">2</span>
                        </span>
                    </a> --}}
                    <a href="{{ route('cart') }}" class="flex-align gap-4 item-hover">
                        <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                            <i class="fa-light fa-bag-shopping"></i>
                            <span class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">
                                {{ $cartItemCount ?? 0}}
                            </span>
                        </span>
                    </a>
                    {{-- <div class="on-hover-item"> --}}
                        <a href="{{ route('contact_us') }}" class="flex-align gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                                <i class="fa-light fa-headphones-simple"></i>
                            </span>
                        </a>
                        {{-- <ul class="on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm px-0 py-8">
                            <li class="nav-submenu__item">
                                <a href="#" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0"> 
                                    <span class="text-sm d-flex"><i class="ph ph-headset"></i></span>
                                    Call Center
                                </a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="#" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0"> 
                                    <span class="text-sm d-flex"><i class="ph ph-chat-circle-dots"></i></span>
                                    Live Chat
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    {{-- <a href="cart.html" class="flex-align gap-4 item-hover">
                        <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                            <i class="fa-light fa-globe"></i>
                        </span>
                    </a> --}}
                </div>
            </div>
            <!-- Header Middle Right End  -->
        </nav>
    </div>
</header>
<!-- ======================= Middle Header End ========================= -->

<!-- ==================== Header Start Here ==================== -->
<header class="header bg-white border-bottom border-gray-100">
    <div class="container container-lg">
        <nav class="header-inner d-flex justify-content-between gap-8">
            <div class="flex-align ">

                <div class="text-center">
                    <button type="button" class="toggle-mobileMenu d-lg-none ms-3n text-gray-800 text-4xl d-flex"> <i class="ph ph-list"></i> </button>
                </div>
                <!-- Menu Start  -->
                <div class="header-menu d-lg-block d-none">
                    <!-- Nav Menu Start -->
                    <ul class="nav-menu flex-align ">
                        <li class="on-hover-item nav-menu__item has-submenu">
                            <a href="javascript:void(0)" class="nav-menu__link">Eyeglasses</a>
                            <div class="common-dropdown nav-submenu on-hover-dropdown w-100 mt-0" aria-labelledby="navbarDropdown" style="min-width:1050px">
                                <div class="container">
                                    <div class="row my-4">
                                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                        <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                        <p class="mb-0 list-group-item fw-bold">
                                            Shop By Material
                                        </p>
                                        @foreach ($materials as $item)
                                            <a href="{{ route('shop_by_material', $item->mat_name )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">{{$item->mat_name}}</a>
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 mb-3 mb-lg-0">
                                        <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                        <p class="mb-0 list-group-item fw-bold">
                                            Shop By Type
                                        </p>
                                        <a href="{{ route('shop_by_frame', 'Full Frame' )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">Full Frame</a>
                                        <a href="{{ route('shop_by_frame', 'Semi-Rimless' )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">Semi-Rimless</a>
                                        <a href="{{ route('shop_by_frame', 'Rimless' )}}" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">Rimless</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                        <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                            <p class="mb-0 list-group-item fw-bold">
                                                Shop By Color
                                            </p>
                                            <div class="flex-align">
                                                <div class="wrap-color">
                                                    @foreach ($colors as $item)
                                                    <a href="{{ route('shop_by_color', $item->color_name) }}" class="color" data-bs-toggle="tooltip" title="{{ $item->color_name}}">
                                                        <div class="wrap-color-img">
                                                            <img src="{{ asset('uploads/color_image/' . $item->color_image) }}" width="40" height="auto" alt="{{ $item->color_name}}">
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                                        <div class="list-group list-group-flush common-dropdown__item nav-submenu__item">
                                        <p class="mb-0 list-group-item fw-bold">
                                            Shop By Shape
                                        </p>
                                            <div class="wrap-shape">
                                                @foreach ($shapes as $item)
                                                <a href="{{ route('shop_by_shape', $item->shape_name)}}" class="shape">
                                                    <img src="{{ asset('uploads/shape_images/' .$item->shape_image)}}" alt="{{$item->shape_name}}">
                                                </a>
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="on-hover-item nav-menu__item">
                            <!-- <span class="badge-notification bg-warning-600 text-white text-sm py-2 px-8 rounded-4">New</span> -->
                            <a href="{{ route('new_in') }}" class="nav-menu__link">New In</a>
                        </li>
                        <li class="on-hover-item nav-menu__item">
                            <a href="{{ route('best_seller') }}" class="nav-menu__link">Best Seller</a>
                        </li>
                        <li class="nav-menu__item">
                            <a href="{{ route('flash_sale') }}" class="nav-menu__link">Flash Sale</a>
                        </li>
                    </ul>
                    <!-- Nav Menu End -->
                </div>
                <!-- Menu End  -->
            </div>

            <!-- Header Right start -->
            <div class="header-right flex-align">
                <!-- form location Start -->
                <form action="{{ route('search') }}" method="GET" class="flex-align flex-wrap">
                    <div class="d-flex select-border-end-0 radius-end-0 search-form d-sm-flex d-none">
                        <div class="search-form__wrapper position-relative">
                            <input 
                                type="text" 
                                name="query" 
                                class="search-form__input common-input py-10 ps-16 pe-18 rounded-end-pill pe-44" 
                                placeholder="Search for a product or brand"
                                value="{{ request('query') }}" 
                                style="border-top-left-radius: 50rem; border-bottom-left-radius: 50rem;">
                            <button 
                                type="submit" 
                                class="w-32 h-32 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute translate-middle-y inset-inline-end-0 me-6 top-50">
                                <i class="ph ph-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- form location start -->
                
                <div class="me-16 d-lg-none d-block">
                    <div class="flex-align flex-wrap gap-12">
                        <button type="button" class="search-icon flex-align d-lg-none d-flex gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                                <i class="ph ph-magnifying-glass"></i>
                            </span>
                        </button>
                        <div class="on-hover-item">
                            <button class="flex-align gap-4 item-hover">
                                <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                                    <i class="fa-light fa-user"></i>
                                </span>
                            </button>
                            <ul class="on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm px-0 py-8">
                                @if (Auth::id())
                                <li class="nav-submenu__item">
                                    <a href="{{ route('user.dashboard') }}" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                        <i class="demo-pli-unlock icon-lg icon-fw"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('orders') }}" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                        <i class="demo-pli-unlock icon-lg icon-fw"></i> Orders
                                    </a>
                                </li>
                                <li class="nav-submenu__item">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                    </a>
                                </li>
                                @else
                                <li class="nav-submenu__item">
                                    <button data-bs-toggle="modal" data-bs-target="#sign_in_modal" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                        Sign In
                                    </button>
                                </li>
                                <li class="nav-submenu__item">
                                    <button data-bs-toggle="modal" data-bs-target="#sign_up_modal" class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0 w-100">
                                        Sign Up
                                    </button>
                                </li>
                                @endif
                                
                            </ul>
                        </div>
                        <a href="{{ route('cart') }}" class="flex-align gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                                <i class="ph ph-shopping-cart-simple"></i>
                                <span class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">{{ $cartItemCount ?? 0}}</span>
                            </span>
                            <span class="text-md text-gray-500 item-hover__text d-none d-lg-flex">Cart</span>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->



@yield('main_contant')




<!-- Sign In Modal -->
<div class="modal fade" id="sign_in_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body p-48">
            <div class="text-center">
                <h5 class="mb-16 roboto-regular">Sign In</h5>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top:5%; right: 5%"></button>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-16">
                        <input class="form-control" type="text" autocomplete="off" name="email" placeholder="Email Address">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12 mb-16">
                        <input class="form-control" type="password" autocomplete="off" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-main flex-center gap-8 rounded-8 py-14 fw-normal w-100">
                            Sign in
                        </button>
                    </div>
                    <div class="col-md-12 text-center py-8">
                        <a href="{{ route('password.request') }}" class="text-sm text-main-600 fw-semibold">Forgot Your Password ?</a>
                    </div>
                </div>

                {{-- <div class="tips">
                    <div class="flex-align">
                        <span class="el-checkbox__input me-8">
                            <input class="el-checkbox__original" type="checkbox">
                            <span class="el-checkbox__inner"></span>
                        </span>
                        <span class="el-checkbox__label">I'd like to receive discounts and news via emails &amp; sms from Vooglam</span>
                    </div>
                    <div>
                        <label class="el-checkbox">
                            <span class="el-checkbox__input me-5">
                                <input class="el-checkbox__original" type="checkbox">
                                <span class="el-checkbox__inner"></span>
                            </span>
                            <span class="el-checkbox__label"> I accept Vooglam 
                                <a href="/termsConditions" class="go">
                                    <span class="link-btn">Terms of Use</span>
                                </a> &amp; 
                                <a href="/privacySecurity" class="go">
                                    <span class="link-btn">Privacy Policy</span>
                                </a>
                            </span>
                        </label>
                    </div>
                </div> --}}
            </form>
            <ul class="third-part text-center">
                <li class="py-12">Or Use Your Account From</li>
                <li class="third-part-item">
                    <a href="{{ route('google.login') }}"><img id="login_modal-sign-google" src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMvaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA2LjAtYzAwNiA3OS5kYWJhY2JiLCAyMDIxLzA0LzE0LTAwOjM5OjQ0ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjIuNCAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpFMTcxOTA3OUE3ODExMUVFODk1OEIyRDVGQTUxMDNGNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpFMTcxOTA3QUE3ODExMUVFODk1OEIyRDVGQTUxMDNGNyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkUxNzE5MDc3QTc4MTExRUU4OTU4QjJENUZBNTEwM0Y3IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkUxNzE5MDc4QTc4MTExRUU4OTU4QjJENUZBNTEwM0Y3Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQAAgICAgICAgICAgMCAgID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" alt="vooglam glasses" width="150" height="50"></a>
                    <a href="{{ route('facebook.login') }}"><img id="login_modal-sign-fb" src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMvaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA2LjAtYzAwNiA3OS5kYWJhY2JiLCAyMDIxLzA0LzE0LTAwOjM5OjQ0ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjIuNCAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpFMTcxOTA3REE3ODExMUVFODk1OEIyRDVGQTUxMDNGNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpFMTcxOTA3RUE3ODExMUVFODk1OEIyRDVGQTUxMDNGNyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkUxNzE5MDdCQTc4MTExRUU4OTU4QjJENUZBNTEwM0Y3IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkUxNzE5MDdDQTc4MTExRUU4OTU4QjJENUZBNTEwM0Y3Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQAAgICAgICAgICAgMCAgID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" alt="vooglam glasses" width="150" height="50"></a>
                    
                </li>
            </ul>
        </div>
      </div>
    </div>
</div>


<!-- Sign Up Modal -->
<div class="modal fade" id="sign_up_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <div class="text-center">
                <h5 class="mb-16 roboto-regular">Sign Up</h5>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top:5%; right: 5%"></button>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-16">
                        <input class="form-control" type="text" autocomplete="off" name="name" placeholder="User Name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12 mb-16">
                        <input class="form-control" type="text" autocomplete="off" name="email" placeholder="Email Address">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12 mb-16">
                        <input class="form-control" type="password" autocomplete="off" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12 mb-16">
                        <input class="form-control" type="password" autocomplete="off" placeholder="Confirm Password" name="password_confirmation">
                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-main flex-center gap-8 rounded-8 py-14 fw-normal w-100">
                            Sign Up
                        </button>
                    </div>
                    {{-- <div class="col-md-12 text-center py-8">
                        <a href="" class="text-sm text-main-600 fw-semibold">Forgot Your Password ?</a>
                    </div> --}}
                </div>
            </form>
        </div>
      </div>
    </div>
</div>







<!-- =============================== Newsletter-two Section Start ============================ -->
<div class="newsletter-two bg-neutral-600 py-32">
    <div class="container container-lg">
        <div class="flex-between gap-20 flex-wrap">
            <div class="flex-align gap-22">
                <span class="d-flex"><img src="{{ asset('assets/images/icon/envelop.png') }}" alt=""></span>
                <div>
                    <h5 class="text-white mb-12 fw-medium">Join Our Newsletter, Get 10% Off</h5>
                    <p class="text-white fw-light">Get all latest information on events, sales and offer</p>
                </div>
            </div>
            <form action="{{ route('save_news_letter') }}" method="POST" class="newsletter-two__form w-50">
                @csrf
                <div class="flex-align gap-16">
                    <input type="text" name="email" class="common-input style-two rounded-8 flex-grow-1 py-14" placeholder="Enter your email address">
                    <button type="submit" class="btn btn-main-two flex-shrink-0 rounded-8 py-16"> Subscribe</button> 
                </div>
                @if (session('success'))
                        <p class="text-white">{{ session('success') }}</p>
                    @endif
            </form>
        </div>
    </div>
</div>
<!-- =============================== Newsletter-two Section End ============================ -->
    
    
<!-- ==================== Footer Two Start Here ==================== -->
<footer class="footer py-80">
    <div class="container container-lg">
        <div class="footer-item-two-wrapper d-flex align-items-start flex-wrap">
            <div class="footer-item max-w-275">
                <div class="footer-item__logo">
                    <a href="index.html"> <img src="{{ asset('uploads/header_image/'.$headerdata->logo) }}" alt=""></a>
                </div>
                <p class="mb-24">{{$headerdata->com_detail}}</p>
                <div class="flex-align gap-16 mb-16">
                    <span class="w-32 h-32 flex-center rounded-circle border border-gray-100 text-main-two-600 text-md flex-shrink-0"><i class="ph-fill ph-phone-call"></i></span>
                    <a href="tel:+00123456789" class="text-md text-gray-900 hover-text-main-600">{{$headerdata->com_phone}}</a>
                </div>
                <div class="flex-align gap-16 mb-16">
                    <span class="w-32 h-32 flex-center rounded-circle border border-gray-100 text-main-two-600 text-md flex-shrink-0"><i class="ph-fill ph-envelope"></i></span>
                    <a href="{{$headerdata->com_email}}" class="text-md text-gray-900 hover-text-main-600">{{$headerdata->com_email}}</a>
                </div>
                <div class="flex-align gap-16 mb-16">
                    <span class="w-32 h-32 flex-center rounded-circle border border-gray-100 text-main-two-600 text-md flex-shrink-0"><i class="ph-fill ph-map-pin"></i></span>
                    <span class="text-md text-gray-900 ">{{$headerdata->com_address}}</span>
                </div>
            </div>
            
            <div class="footer-item">
                <h6 class="footer-item__title">About us</h6>
                <ul class="footer-menu">
                    <li class="mb-16">
                        <a href="shop.html" class="text-gray-600 hover-text-main-600">Company Profile</a>
                    </li>
                    <li class="mb-16">
                        <a href="{{ route('contact_us') }}" class="text-gray-600 hover-text-main-600">Contact Us</a>
                    </li>
                    <li class="mb-16">
                        <a href="shop.html" class="text-gray-600 hover-text-main-600">Rules & Policy</a>
                    </li>
                </ul>
            </div>

            <div class="footer-item">
                <h6 class="footer-item__title">Shop By Color</h6>
                <ul class="footer-menu">
                    @foreach ($colors->take(8) as $item)
                        <li class="mb-16">
                            <a href="{{ route('shop_by_color', $item->color_name )}}" class="text-gray-600 hover-text-main-600">{{$item->color_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-item">
                <h6 class="footer-item__title">Shop By Shape</h6>
                <ul class="footer-menu">
                    @foreach ($shapes as $item)
                        <li class="mb-16">
                            <a href="{{ route('shop_by_material', $item->shape_name )}}" class="text-gray-600 hover-text-main-600">{{$item->shape_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-item">
                <h6 class="footer-item__title">Shop By Material</h6>
                <ul class="footer-menu">
                    @foreach ($materials as $item)
                        <li class="mb-16">
                            <a href="{{ route('shop_by_shape', $item->mat_name )}}" class="text-gray-600 hover-text-main-600">{{$item->mat_name}}</a>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
            
            <div class="footer-item">
                <h6 class="">Follow Us On</h6>
                {{-- <p class="mb-16">Marketpro App is available.  Get it now</p> --}}
                {{-- <div class="flex-align gap-8 my-32">
                    <a href="https://www.apple.com/store" class="">
                        <img src="{{ asset('assets/images/thumbs/store-img1.png') }}" alt="">
                    </a>
                    <a href="https://play.google.com/store/apps?hl=en" class="">
                        <img src="{{ asset('assets/images/thumbs/store-img2.png') }}" alt="">
                    </a>
                </div> --}}

                <ul class="flex-align gap-16">
                    @if ($headerdata->fb_link)
                        <li>
                            <a href="{{$headerdata->fb_link}}" class="w-44 h-44 flex-center bg-main-two-50 text-main-two-600 text-xl rounded-8 hover-bg-main-two-600 hover-text-white" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </li>
                    @endif
                    
                    @if ($headerdata->insta_link)
                        <li>
                            <a href="{{$headerdata->insta_link}}" class="w-44 h-44 flex-center bg-main-two-50 text-main-two-600 text-xl rounded-8 hover-bg-main-two-600 hover-text-white" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    @endif

                    @if ($headerdata->x_link)
                        <li>
                            <a href="{{$headerdata->x_link}}" class="w-44 h-44 flex-center bg-main-two-50 text-main-two-600 text-xl rounded-8 hover-bg-main-two-600 hover-text-white" target="_blank">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </li>
                    @endif

                    @if ($headerdata->youtube_link)
                        <li>
                            <a href="{{$headerdata->youtube_link}}" class="w-44 h-44 flex-center bg-main-two-50 text-main-two-600 text-xl rounded-8 hover-bg-main-two-600 hover-text-white" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                    @endif

                    @if ($headerdata->tiktok_link)
                        <li>
                            <a href="{{$headerdata->tiktok_link}}" class="w-44 h-44 flex-center bg-main-two-50 text-main-two-600 text-xl rounded-8 hover-bg-main-two-600 hover-text-white" target="_blank">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                        </li>
                    @endif
                </ul>
                
            </div>
        </div>
    </div>
</footer>

<!-- bottom Footer -->
<div class="bottom-footer bg-color-one py-8">
    <div class="container container-lg">
        <div class="bottom-footer__inner flex-between flex-wrap gap-16 py-16">
            <p class="bottom-footer__text "> &copy; 2024. All Rights Reserved </p>
            {{-- <div class="flex-align gap-8 flex-wrap">
                <span class="text-heading text-sm">We Are Acepting</span>
                <img src="{{ asset('assets/images/thumbs/payment-method.png') }}" alt="">
            </div> --}}
        </div>
    </div>
</div>
<!-- ==================== Footer Two End Here ==================== -->
  

    
    <!-- Jquery js -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('assets/js/boostrap.bundle.min.js') }}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('assets/js/phosphor-icon.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/js/count-down.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Font Awsome icon js-->
    <script src=" {{ asset('assets/plugins/FontAwesome.Pro.6.5.2/js/all.js') }}"></script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        
    </script>
    

    @yield('script')

    </body>
</html>