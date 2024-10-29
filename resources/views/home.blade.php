@extends('main_layout')


@section('main_contant')
    
<!-- ============================ Banner Section start =============================== -->
<div class="banner">
    <div class="container container-lg g-0">
        <div class="banner-item overflow-hidden position-relative arrow-center">
            
            <div class="flex-align">
                <button type="button" id="banner-prev" class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="banner-next" class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>

            <div class="banner-slider">
                @foreach ($banner as $banner)
                    <div class="banner-slider__item">
                        <a href="{{ $banner->link }}">
                            <img src="{{ asset('uploads/banner_images/'.$banner->image) }}" alt="" class="object-fit-cover">
                        </a>
                    </div>
                @endforeach
                
            </div>  
        </div>
    </div>
</div>
<!-- ============================ Banner Section End =============================== -->

<!-- ========================== Shipping Section Start ============================ -->
 <section class="shipping py-20 pt-30" id="shipping">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xxl-3 col-sm-6">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-car-profile"></i></span>
                    <div class="">
                        <h6 class="mb-0">Free Shipping</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-hand-heart"></i></span>
                    <div class="">
                        <h6 class="mb-0"> 100% Satisfaction</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-credit-card"></i></span>
                    <div class="">
                        <h6 class="mb-0"> Secure Payments</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-chats"></i></span>
                    <div class="">
                        <h6 class="mb-0"> 24/7 Support</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- ========================== Shipping Section End ============================ -->

<!-- ========================= Big Deal Section Start =============================== -->
<div class="big-deal rounded-16 overflow-hidden flex-between position-relative py-20">
    <div class="container container-lg g-0">
        <div class="big-deal-box position-relative z-1 py-40 overflow-hidden">
            <img src="{{ asset('assets/images/bg/big-deal-pattern.png') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 cover-img">

            <div class="row gy-4 align-items-center">
                <div class="col-md-3 text-center d-md-block d-none">
                    {{-- <img src="{{ asset('assets/images/thumbs/big-deal1.png') }}" alt=""> --}}
                </div>
                <div class="col-md-6 big-deal-box__content text-center">
                    <h4 class="mb-5 text-uppercase">Your Fashionable Pair</h4>
                    <h6 class="fw-medium mb-20">Shine Your Color with This Pair</h6>
                    <p class="text-sm text-heading">Beyond your functional demand for eyewear, Vooglam crafts our high-quality prescription eyeglasses and sunglasses with inspiration from diversified cultures and personalities. May this pair be the bold statement on who you are.</p>
                    <div class="flex-align justify-content-center">
                        <a href="/shop" class="btn btn-main d-inline-flex align-items-center rounded-pill gap-8 mt-24 me-10">
                            Shop Eyeglasses
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span> 
                        </a>
                        <a href="/shop" class="btn btn-main d-inline-flex align-items-center rounded-pill gap-8 mt-24">
                            Shop Sunglasses
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span> 
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-center d-md-block d-none">
                    {{-- <img src="{{ asset('assets/images/thumbs/big-deal2.png') }}" alt=""> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================= Big Deal Section End =============================== -->
<!-- <style>
    .flash-sales__slider .slick-list .slick-track .slick-slide {
        width: 500px !important;
    }
</style> -->
<!-- ========================= hot-deals Start ================================ -->
<section class="hot-deals py-30">
    <div class="container container-lg">

        <div class="section-heading">
            <div class="text-center gap-8">
                <h5 class="mb-0">Featured Selections</h5>
                <p class="text-sm fw-medium text-gray-700 hover-text-main-600">Explore our handpicked collection of eyewear from top designers, all in one place</p>
            </div>
        </div>
        
        <div class="row g-12">
            <div class="col-md-12">
                <div class="hot-deals-slider arrow-style-two">
                    @foreach ($feature_selection as $item)
                    <div>
                        <div class="flash-sales-item rounded-16 overflow-hidden z-1 position-relative flex-0 gap-8" style="padding: 20px; height: 35vh; align-content: end;">
                            <img src="{{ asset('uploads/feature_selection/'. $item->image ) }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1 flash-sales-item__bg">
                            <div class="flash-sales-item__content ms-sm-auto flex-between" style="align-items: end;">
                                <div>
                                    <h6 class="text-32 mb-2 text-white">{{ $item->title }}</h6>
                                    <p class="text-sm fw-medium text-white hover-text-main-600">{{ $item->desc }}</p>
                                </div>
                                <a href="{{ $item->link }}" class="btn p-0 d-inline-flex text-white">
                                    Shop Now
                                    <span class="icon text-xl d-flex text-white" style="align-items: center;"><i class="ph ph-arrow-right"></i></span> 
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= hot-deals End ================================ -->

<!-- ============================ Banner Section start =============================== -->
<div class="banner">
    <div class="container container-lg g-0">
        <div class="banner-item overflow-hidden position-relative arrow-center">
            
            <div class="flex-align">
                <button type="button" id="banner-prev1" class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="banner-next1" class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>

            <div class="banner-slider1">
                @foreach ($new_banners as $item)
                <div class="banner-slider__item" style="height: 400px;">
                    <div class="discount-item overflow-hidden position-relative z-1 h-100 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('uploads/new_arrive_banner/'. $item->image ) }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1">
                        <div class="w-100 flex-between gap-20" style="padding-left: 10%; padding-right: 5%;">
                            <div class="discount-item__content">
                                <span class="fw-semibold text-white mb-20">{{ $item->desc }}</span>
                                <h6 class="mb-20 text-white">{{ $item->title }}</h6>
                                <a href="{{ $item->link }}" class="btn btn-outline-white rounded-pill gap-8" tabindex="0">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>  
        </div>
    </div>
</div>
<!-- ============================ Banner Section End =============================== -->

<!-- ========================= hot-deals Start ================================ -->
<section class="hot-deals">
    <div class="container container-lg g-0">
        <div class="row g-12">
            <div class="col-md-12">
                {{-- @dd($newest_product); --}}
                <div class="hot-deals-slider arrow-style-two pt-90 pb-90" style="background-image: url('assets/images/new_arraival.avif'); background-size: cover;">
                    @foreach ($newest_product  as $data)
                        <div>
                            <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                @if ($data->pro_discount_percent)
                                <span class="product-card__badge bg-danger-600 px-8 py-4 text-sm text-white">Sale {{$data->pro_discount_percent}}% </span>
                                @endif
                                
                                <a href="{{ route('product_detail', ['id' => $data->id, 'sku_id' => $data->first_sku_id ?? 0]) }}" class="product-card__thumb flex-center">
                                    <img class="product-image" src="{{ asset('uploads/product_thumbnails/'. $data->pro_image) }}" alt="Product Image">
            
                                    <!-- Hover image -->
                                    <img class="product-hover-image" src="{{ asset('uploads/product_thumbnails/'.$data->pro_second_image) }}" alt="Hover Product Image">
                                </a>
                                <div class="product-card__content p-sm-2 text-center" style="align-self: center;">
                                    <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                        <a href="{{ route('product_detail', ['id' => $data->id, 'sku_id' => $data->first_sku_id ?? 0]) }}" class="link text-line-2">{{ $data->pro_name }}</a>
                                    </h6>
            
                                    <div class="product-card__content mt-12">
                                        <div class="product-card__price mb-8">
                                            <span class="text-heading text-md fw-semibold ">${{ $data->pro_price }} 
                                                @if ($data->pro_discount)
                                                <span class="text-gray-500 fw-normal">/</span> 
                                                @endif
                                            </span>
                                            @if ($data->pro_discount)
                                            <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> ${{ $data->pro_discount }}</span>
                                            @endif
                                        </div>
                                        <div class="flex-align gap-6 justify-content-center">
                                            <span class="text-xs fw-bold text-gray-600">4.8</span>
                                            <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-bold text-gray-600">(17k)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= hot-deals End ================================ -->


<!-- ======================== promotional banner Start ============================== -->
<section class="promotional-banner pt-80">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="text-center gap-8">
                <h5 class="mb-0">Style Choices</h5>
                <p class="text-sm fw-medium text-gray-700 hover-text-main-600">Stylish Frames Rooted in Cultural Influences</p>
            </div>
        </div>
        <div class="row gy-4">
            @foreach ($style_choices as $item)
            <div class="col-xl-3 col-sm-6 col-xs-6">
                <div class=" position-relative rounded-24 overflow-hidden z-1" style="height: 300px;">
                    <a href="">
                        <img src="{{ asset('uploads/style_choices/'.$item->image) }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1">
                        <a href="{{ $item->link }}" class="btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 flex-align w-100 justify-content-center" style="position: absolute;bottom: 0;">
                                {{ $item->title }} 
                        </a>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- ======================== promotional banner End ============================== -->


<!-- ========================= Delivery Section Start ================================ -->
<div class="delivery-section mt-30">
    <div class="container container-lg">
        <div class="delivery position-relative rounded-16 bg-main-600 p-16 flex-align gap-16 flex-wrap z-1 justify-content-center">
            <img src="{{ asset('uploads/header_image/' . $header->banner1_image ) }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 rounded-16">
            <div class="row align-items-center">
                <div class="col-md-12 col-sm-7">
                    <div class="text-center">
                        <h4 class="text-white mb-8">{{ $header->banner1_title }}</h4>
                        <p class="text-white">{{ $header->banner1_desc }}</p>
                        <a href="{{ $header->banner1_link }}" class="mt-16 btn btn-main-two fw-medium d-inline-flex align-items-center rounded-pill gap-8" tabindex="0">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================= Delivery Section End ================================ -->


<!-- ========================= Deals Week Start ================================ -->
<section class="deals-weeek pt-10">
    <div class="container container-lg">
        <div class="p-24 rounded-16">
            <div class="section-heading mb-24">
                <div class="flex-between flex-wrap gap-8">
                    <h5 class="mb-0">Best Sellers</h5>
                    <div class="flex-align gap-16">
                        <a href="/shop" class="text-sm fw-medium text-gray-700 hover-text-main-600 hover-text-decoration-underline">View More</a>
                        <div class="flex-align gap-8">
                            <button type="button" id="deal-week-prev1" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-neutral-600 text-xl hover-bg-neutral-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="deal-week-next1" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-neutral-600 text-xl hover-bg-neutral-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="deals-week-slider1 arrow-style-two">
                @foreach ($best_seller as $item)
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('product_detail', ['id' => $item->id, 'sku_id' => $item->first_sku_id ?? 0]) }}" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Best Seller </span>
                                <img class="product-image" src="{{ asset('uploads/product_thumbnails/'.$item->pro_image) }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('uploads/product_thumbnails/'.$item->pro_second_image) }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center" style="margin: auto">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8 text-center">
                                <a href="{{ route('product_detail', ['id' => $item->id, 'sku_id' => $item->first_sku_id ?? 0]) }}" class="link text-line-2" tabindex="0">{{ $item->pro_name }}</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> ${{$item->pro_price}}</span>
                                @if ($item->pro_discount)
                                <span class="text-heading text-md fw-semibold ">${{$item->pro_discount}} </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- ========================= Deals Week End ================================ -->


<!-- ========================= Deals Week Start ================================ -->
<section class="deals-weeek pt-20">
    <div class="container container-lg">
        <div class="border border-gray-100 p-24 rounded-16">
            <div class="section-heading mb-24">
                <div class="flex-between flex-wrap gap-8">
                    <h5 class="mb-0">Deal of The Week</h5>
                    <div class="flex-align gap-16">
                        <a href="/shop" class="text-sm fw-medium text-gray-700 hover-text-main-600 hover-text-decoration-underline">View All Deals</a>
                        <div class="flex-align gap-8">
                            <button type="button" id="deal-week-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-neutral-600 text-xl hover-bg-neutral-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="deal-week-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-neutral-600 text-xl hover-bg-neutral-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="deal-week-box rounded-16 overflow-hidden flex-between position-relative z-1 mb-24">
                <img src="{{ asset('uploads/header_image/'. $header->banner2_image) }}" alt="" class="position-absolute inset-block-start-0 inset-block-start-0 w-100 h-100 z-n1 object-fit-cover">
                <div class="d-lg-block d-none ps-32 flex-shrink-0">
                    <img src="{{ asset('uploads/header_image/'. $header->banner2_left) }}" alt="">
                </div>
                {{-- <div class="deal-week-box__content px-sm-4 d-block w-100 text-center">
                    <h6 class="mb-20">Apple AirPods Max, Over Ear Headphones</h6>
                    <div class="countdown mt-20" id="countdown4">
                        <ul class="countdown-list style-four flex-center flex-wrap">
                            <li class="countdown-list__item flex-align flex-column text-sm fw-medium text-white rounded-circle bg-neutral-600">
                                <span class="days"></span>Days
                            </li>
                            <li class="countdown-list__item flex-align flex-column text-sm fw-medium text-white rounded-circle bg-neutral-600">
                                <span class="hours"></span>Hour
                            </li>
                            <li class="countdown-list__item flex-align flex-column text-sm fw-medium text-white rounded-circle bg-neutral-600">
                                <span class="minutes"></span>Min
                            </li>
                            <li class="countdown-list__item flex-align flex-column text-sm fw-medium text-white rounded-circle bg-neutral-600">
                                <span class="seconds"></span>Sec
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="d-lg-block d-none flex-shrink-0 pe-xl-5">
                    <div class="me-xxl-5">
                        <img src="{{ asset('uploads/header_image/'. $header->banner2_right) }}" alt="">
                    </div>
                </div>
            </div>
            
            <div class="deals-week-slider arrow-style-two">
                @foreach ($deal_of_the_week as $item)
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('product_detail', ['id' => $item->id, 'sku_id' => $item->first_sku_id ?? 0]) }}" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold </span>
                                <img class="product-image" src="{{ asset('uploads/product_thumbnails/'.$item->pro_image) }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('uploads/product_thumbnails/'.$item->pro_second_image) }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center" style="margin: auto">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="{{ route('product_detail', ['id' => $item->id, 'sku_id' => $item->first_sku_id ?? 0]) }}" class="link text-line-2" tabindex="0">{{ $item->pro_name }}</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> ${{$item->pro_price}}</span>
                                @if ($item->pro_discount)
                                <span class="text-heading text-md fw-semibold "><span class="text-gray-500 fw-normal">/</span> ${{$item->pro_discount}}  </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
<!-- ========================= Deals Week End ================================ -->


<!-- ========================= flash sales Start ================================ -->
<section class="flash-sales py-30">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="text-center gap-8">
                <h5 class="mb-0">Lens Selections</h5>
                <p class="text-sm fw-medium text-gray-700 hover-text-main-600">Find the lenses that suit you best and enhance both comfort and clarity</p>
            </div>
        </div>
        <div class="flash-sales__slider arrow-style-two">
            @foreach ($lens_selections as $item)
            <div>
                <div class="flash-sales-item rounded-16 overflow-hidden z-1 position-relative flex-0 gap-8" style="padding: 20px; height: 45vh; align-content: end;">
                    <img src="{{ asset('uploads/lens_selection/'. $item->image ) }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1 flash-sales-item__bg">
                    <div class="flash-sales-item__content ms-sm-auto flex-between" style="align-items: end;">
                        <div>
                            <h6 class="text-32 mb-2 text-white">{{ $item->title }}</h6>
                            <p class="text-sm fw-medium text-white hover-text-main-600">{{ $item->desc }}</p>
                        </div>
                        <a href="{{ $item->link }}" class="btn p-0 d-inline-flex text-white">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span> 
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- ========================= flash sales End ================================ -->


<!-- ========================== Shipping Section Start ============================ -->
 <section class="shipping py-20 pt-30" id="shipping">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="text-center gap-8">
                <h5 class="mb-0">Have Glasses Questions？</h5>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-xxl-3 col-sm-6">
                <a href="" class="w-100">
                    <div class="shipping-item text-center gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="w-56 h-56 rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-car-profile"></i></span>
                        <div class="mt-20">
                            <h5 class="mb-2">Read Prescription</h5>
                            <h6 class="mb-15">Quick and Easy Guide</h6>
                            <span class="text-sm text-heading">Understand your eye prescription perfactly for vision correction</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <a href="" class="w-100">
                    <div class="shipping-item text-center gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="w-56 h-56 rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-car-profile"></i></span>
                        <div class="mt-20">
                            <h5 class="mb-2">Measure PD</h5>
                            <h6 class="mb-15">Accurate Lens Positioning</h6>
                            <span class="text-sm text-heading">Measure your pupillary distance accurately for lens alignment.</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <a href="" class="w-100">
                    <div class="shipping-item text-center gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="w-56 h-56 rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-car-profile"></i></span>
                        <div class="mt-20">
                            <h5 class="mb-2">Choose Frames</h5>
                            <h6 class="mb-15">Match Your Unique Look</h6>
                            <span class="text-sm text-heading">Find the perfect frame style to match your unique face shape.</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <a href="" class="w-100">
                    <div class="shipping-item text-center gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="w-56 h-56 rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-car-profile"></i></span>
                        <div class="mt-20">
                            <h5 class="mb-2">Place Order</h5>
                            <h6 class="mb-15">Simple Step to Buy</h6>
                            <span class="text-sm text-heading">Step-by-step guide to place your order for stylish glasses.</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
 </section>
<!-- ========================== Shipping Section End ============================ -->



<!-- ========================== Video Section Start ============================ -->
 <section class="shipping pt-30" id="shipping">
    <div class="container container-lg g-0">
        <div class="home-page-brand-intro">
            <a href="/half-frame-glasses">
                <div class="brand-video">
                    <video id="home-page-brand-video" autoplay="autoplay" class="video-dom" muted="" poster="https://cdn.vooglam.com/home/30898681bc25f05d033fc2bd5934c03c.png" style="aspect-ratio:2.84;" aria-label="Vooglam Glasses - Ignite Your Inner Glam">
                        <source src="https://cdn.vooglam.com/home/0d1ab6195b7fdc2cb6537ed9e0f29240.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="brand-bd">
                    <div class="brand-text fade-in-up visible" style="color:#ffffff;">
                        <img class="brand-logo" src="https://cdn.vooglam.com/home/746c8bf959612717da191d2579bfad2d.png" alt="vooglam glasses" loading="lazy" style="aspect-ratio:2.18;">
                        <div class="p1">Ignite Your Inner Glam</div>
                        <div class="p2">Where eyewear becomes an expression of you. Explore our fashion-forward designs that empower self-expression and celebrate individuality, making every pair a statement piece.</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
 </section>
<!-- ========================== Video Section End ============================ -->


@endsection