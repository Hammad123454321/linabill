<!-- ========== Menu ========== -->
<div class="app-menu">  

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="" class="logo-light">
            <img src="{{ asset('uploads/header_image/' . $headerdata->logo) }}" alt="logo" class="logo-lg">
            <img src="{{ asset('uploads/header_image/' . $headerdata->logo) }}" alt="small logo" class="logo-sm">
        </a>

        <!-- Brand Logo Dark -->
        <a href="" class="logo-dark">
            <img src="{{ asset('uploads/header_image/' . $headerdata->logo) }}" alt="dark logo" height="50">
            <img src="{{ asset('uploads/header_image/' . $headerdata->logo) }}" alt="small logo" class="logo-sm">
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('backend_assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block" data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted mb-0">Admin Head</p>
        </div>

        <!--- Menu -->
        <ul class="menu">

            <li class="menu-title">Navigation</li>


            {{-- <li class="menu-title">Apps</li> --}}

            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="airplay"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('received_orders') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Orders </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('color') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Colors </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('lenses') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Lenses </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('shapes') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Shapes </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('sizes') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Sizes </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('materials') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Materials </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="#menuEcommerce" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="shopping-cart"></i></span>
                    <span class="menu-text"> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuEcommerce">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="{{ route('all_products') }}" class="menu-link">
                                <span class="menu-text">All Products</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('add_product') }}" class="menu-link">
                                <span class="menu-text">Add Product</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="{{ route('header') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Header </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('main_banner') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Main Banner </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('feature_selection') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Feature Section </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('new_banner') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> New Arrive Banne Section </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('style_choice') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Style Choice </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('lens_selection') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Lens Selection </span>
                </a>
            </li>

            {{-- <li class="menu-item">
                <a href="#menuEcommerce" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="shopping-cart"></i></span>
                    <span class="menu-text"> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuEcommerce">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="ecommerce-dashboard.html" class="menu-link">
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-products.html" class="menu-link">
                                <span class="menu-text">Products</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-product-detail.html" class="menu-link">
                                <span class="menu-text">Product Detail</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-product-edit.html" class="menu-link">
                                <span class="menu-text">Add Product</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-customers.html" class="menu-link">
                                <span class="menu-text">Customers</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-orders.html" class="menu-link">
                                <span class="menu-text">Orders</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-order-detail.html" class="menu-link">
                                <span class="menu-text">Order Detail</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-sellers.html" class="menu-link">
                                <span class="menu-text">Sellers</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-cart.html" class="menu-link">
                                <span class="menu-text">Shopping Cart</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ecommerce-checkout.html" class="menu-link">
                                <span class="menu-text">Checkout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}


        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left menu End ========== -->