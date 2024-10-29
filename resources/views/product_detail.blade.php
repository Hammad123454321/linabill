@extends('main_layout')


@section('main_contant')

<style>
    .space-evenly {
        align-content: space-evenly;
    }

    .product-details__content {
        top: 80px;
    }

    #right_column {
        z-index: 1 !important;
    }
</style>
<style>
    /* Full-screen modal */
    .modal-content {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        z-index: 9999;
        /* Ensure the modal is on top */
        overflow-y: auto;
        /* Enable scrolling if content overflows */
    }
</style>

<!-- ========================== Product Details Two Start =========================== -->
<section class="product-details py-10">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-8 order-2 order-xl-1">
                <!-- ========================= Breadcrumb Start =============================== -->
                <div class="breadcrumb py-10 bg-main-two-50 rounded-8 mb-8">
                    <div class="container container-lg">
                        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">

                            <ul class="flex-align gap-8 flex-wrap">
                                <li class="text-sm">
                                    <a href="index.html" class="text-gray-900 flex-align gap-8 hover-text-main-600">
                                        <i class="ph ph-house"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="flex-align">
                                    <i class="ph ph-caret-right"></i>
                                </li>
                                <li class="text-sm text-main-600"> {{ $products->pro_name }} </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ========================= Breadcrumb End =============================== -->
                <div class="product-details__left">
                    <div class="row">
                        <div class="col-xl-3 order-2 order-xl-1">
                            <div class="">
                                <div class="product-details__images-slider">
                                    @if(count($product_images) > 0)
                                    @foreach($product_images as $image)
                                    <div>
                                        <div class="max-w-120 max-h-120 h-100 flex-center rounded-8">
                                            <img class="rounded-8"
                                                src="{{ asset('uploads/product_images/' .$image->pro_image) }}" alt="">
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-9 order-1 order-xl-2">
                            <div class="product-details__thumb-slider border border-gray-100 rounded-16 p-0">
                                @if(count($product_images) > 0)
                                @foreach($product_images as $image)
                                <div class="">
                                    <div class="product-details__thumb flex-center">
                                        <img src="{{ asset('uploads/product_images/' .$image->pro_image) }}" alt="">
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <style>
                        .product-details__images-slider {
                            max-height: 500px;
                            overflow-y: hidden;
                            display: block;
                        }

                        .product-details__images-slider .slick-track {
                            display: flex !important;
                            flex-direction: column;
                        }

                        /* Mobile styles */
                        @media (max-width: 768px) {
                            .product-details__images-slider {
                                max-height: auto;
                            }

                            .product-details__images-slider .slick-track {
                                flex-direction: row;
                                /* For horizontal layout on mobile */
                            }

                            /* Optional: Add spacing between the main image and thumbnails */
                            .product-details__thumb-slider {
                                margin-bottom: 20px;
                            }
                        }
                    </style>

                </div>


                <div class="pt-48">
                    <div class="product-dContent border rounded-12">
                        <div
                            class="product-dContent__header border-bottom border-gray-100 flex-between flex-wrap gap-16">
                            <ul class="nav common-tab nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-description" type="button" role="tab"
                                        aria-controls="pills-description" aria-selected="true">Description</button>
                                </li>
                            </ul>
                            <a href="#"
                                class="btn bg-color-one rounded-8 flex-align gap-8 text-main-600 hover-bg-main-600 hover-text-white">
                                <img src="{{ asset('assets/images/icon/satisfaction-icon.png') }}" alt="">
                                100% Satisfaction Guaranteed
                            </a>
                        </div>

                        <div class="p-16">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                                    aria-labelledby="pills-description-tab" tabindex="0">

                                    <div class="bg-gray-100 p-32">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <span class="text-gray-900 d-block mb-12">
                                                    SKU：
                                                    <span class="fw-medium">{{ $pro_sku->pro_sku }}</span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    Series：
                                                    <span class="fw-medium">{{ $products->pro_series }}</span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    Rim：
                                                    <span class="fw-medium"><a href=""
                                                            class="text-gray-900 hover-text-main-600 text-decoration-underline">{{
                                                            $products->pro_rim }}</a></span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    Color：
                                                    <span class="fw-medium"><a href=""
                                                            class="text-gray-900 hover-text-main-600 text-decoration-underline">{{
                                                            $pro_sku->color_name }}</a></span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    Materials：
                                                    <span class="fw-medium"><a href=""
                                                            class="text-gray-900 hover-text-main-600 text-decoration-underline">{{
                                                            $products->mat_name }}</a></span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    Shape：
                                                    <span class="fw-medium"><a href=""
                                                            class="text-gray-900 hover-text-main-600 text-decoration-underline">{{
                                                            $products->shape_name }}</a></span>
                                                </span>
                                            </div>
                                            <div class="col-xl-3">
                                                <span class="text-gray-900 d-block mb-12">
                                                    Size:
                                                    <span class="fw-medium">{{ $products->size_name }}
                                                        <a href="#" id="size_name_tip"
                                                            class="text-gray-900 hover-text-main-600"><i
                                                                class="fa-light fa-circle-question"></i></a></span>

                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    Frame Weight:
                                                    <span class="fw-medium">{{ $products->pro_weight }}g</span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    RX Range:
                                                    <span class="fw-medium">{{ $products->pro_rx_range }} <a href="#"
                                                            id="rx_range_tip"
                                                            class="text-gray-900 hover-text-main-600"><i
                                                                class="fa-light fa-circle-question"></i></a></span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    PD Range:
                                                    <span class="fw-medium">{{ $products->pro_pd_range }} <a href="#"
                                                            id="pd_range_tip"
                                                            class="text-gray-900 hover-text-main-600"><i
                                                                class="fa-light fa-circle-question"></i></a></span>
                                                </span>
                                                <span class="text-gray-900 d-block mb-12">
                                                    Spring Hinge:
                                                    <span class="fw-medium">{{ $products->spring_hing }}</span>
                                                </span>
                                            </div>
                                            <div class="col-xl-6 col-sm-12">
                                                <div class="detail-img-wrap">
                                                    <div class="detail-right-word">
                                                        <span id="mm" class="hover">MM</span>
                                                        <span id="in" class="">IN</span>
                                                    </div>
                                                    <div class="glass-box">
                                                        <div class="glass1">
                                                            <img src="{{ asset('assets/images/frame1.avif') }}"
                                                                width="100%" alt="Frame width" loading="lazy">
                                                            <ul>
                                                                <li>
                                                                    <span>Frame width</span>
                                                                    <span><span id="frame_width">{{
                                                                            number_format($products->pro_frame_width)
                                                                            }}</span><span
                                                                            class="mm_and_in">mm</span></span>
                                                                </li>
                                                                <li>
                                                                    <span>Lens width</span>
                                                                    <span><span id="lens_width">{{
                                                                            number_format($products->pro_lens_width)
                                                                            }}</span><span
                                                                            class="mm_and_in">mm</span></span>
                                                                </li>
                                                                <li>
                                                                    <span>Lens height</span>
                                                                    <span><span id="lens_height">{{
                                                                            number_format($products->pro_lens_height)
                                                                            }}</span><span
                                                                            class="mm_and_in">mm</span></span>
                                                                </li>
                                                                <li>
                                                                    <span>Bridge</span>
                                                                    <span><span id="bridge">{{
                                                                            number_format($products->pro_bridge)
                                                                            }}</span><span
                                                                            class="mm_and_in">mm</span></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="glass2">
                                                            <img src="{{ asset('assets/images/frame2.avif') }}"
                                                                alt="Temple length" loading="lazy">
                                                            <div>
                                                                <span>Temple</span>
                                                                <span><span id="temple">{{
                                                                        number_format($products->pro_temple)
                                                                        }}</span><span
                                                                        class="mm_and_in">mm</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <p class="text-xs">Due to the different measurements methods, the
                                                    measurements printed on the inside of the temple arm may vary from
                                                    those showing on our website. </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-24">
                                    <div class="row">
                                        <div class="col-xl-6 text-center">
                                            <img src="{{ asset('uploads/product_thumbnails/'.$products->pro_image) }}"
                                                style="height: 400px">
                                        </div>
                                        <div class="col-xl-6">
                                            <h6 class="mb-24">About {{ $products->pro_name }}</h6>
                                            <p>{{ $products->pro_description }}</p>
                                            <p class="text-xs mt-12">PS:There might be some visual differences due to
                                                different lights in sunlight and screen.Goods shall in kind Prevail</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-24">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <img src="{{ asset('assets/images/pro-banner.webp') }}"
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <!-- ========================== Shipping Section Start ============================ -->
                                <section class="shipping py-20" id="shipping">
                                    <div class="container container-lg">
                                        <div class="row gy-2">
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
                                                    <div class="text-center">
                                                        <h6 class="mb-0">3 Million+</h6>
                                                        <span class="text-sm text-heading">Glasses Sold</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
                                                    <div class="text-center">
                                                        <h6 class="mb-0">10K+ Reviews</h6>
                                                        <span class="text-sm text-heading">Trustpilot</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
                                                    <div class="text-center">
                                                        <h6 class="mb-0">Award-Winning</h6>
                                                        <span class="text-sm text-heading">Customer Service</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
                                                    <div class="text-center">
                                                        <h6 class="mb-0">30-Day</h6>
                                                        <span class="text-sm text-heading">Peace Of Mind Returns</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- ========================== Shipping Section End ============================ -->

                                <!-- ========================== Shipping Section Start ============================ -->
                                <section class="shipping py-20" id="shipping">
                                    <div class="container container-lg">
                                        <div class="section-heading mb-24">
                                            <div class="gap-8 text-center">
                                                <h5 class="mb-0">Customer Reviews</h5>
                                                <p>({{ $total_reviews }})</p>
                                            </div>
                                        </div>




                                        <div class="row gy-2 rounded-8 p-20" style="background-color: #f6f6f6;">
                                            <div class="col-xl-6 col-sm-12">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-sm-12">
                                                            <div
                                                                class="rounded-8 flex-center flex-column  text-center py-20 px-24">
                                                                <h3 class="mb-4 text-main-600">{{
                                                                    number_format($ratings->rating, 1) }}</h3>
                                                                <div class="flex-center gap-4">
                                                                    @php
                                                                    $rating = $ratings->rating; // Your rating value
                                                                    $fullStars = floor($rating); // Number of full stars
                                                                    $halfStar = ($rating - $fullStars) >= 0.5; //
                                                                    Whether to show a half star
                                                                    $emptyStars = 5 - ceil($rating); // Number of empty
                                                                    stars
                                                                    @endphp

                                                                    {{-- Full Stars --}}
                                                                    @for ($i = 0; $i < $fullStars; $i++) <span
                                                                        class="text-15 fw-medium text-warning-600 d-flex">
                                                                        <i class="ph-fill ph-star"></i></span>
                                                                        @endfor

                                                                        {{-- Half Star --}}
                                                                        @if ($halfStar)
                                                                        <span
                                                                            class="text-15 fw-medium text-warning-600 d-flex"><i
                                                                                class="ph-fill ph-star-half"></i></span>
                                                                        @endif

                                                                        {{-- Empty Stars --}}
                                                                        @for ($i = 0; $i < $emptyStars; $i++) <span
                                                                            class="text-15 fw-medium text-warning-600 d-flex">
                                                                            <i class="ph ph-star"></i></span>
                                                                            @endfor
                                                                </div>
                                                                <span class="mt-4 text-gray-500">Average Rating</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-8 col-sm-12">
                                                            <div class="rounded-8 px-24 py-20 flex-grow-1">
                                                                <div class="flex-align gap-8 mb-10">
                                                                    <span class="text-gray-900 flex-shrink-0">Quality
                                                                    </span>
                                                                    <span class="text-gray-900 flex-shrink-0"> {{
                                                                        number_format($ratings->quality, 1) }}</span>
                                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8"
                                                                        role="progressbar" aria-label="Basic example"
                                                                        aria-valuenow="{{ number_format($ratings->quality, 1) }}"
                                                                        aria-valuemin="0" aria-valuemax="5">
                                                                        <div class="progress-bar bg-main-600 rounded-pill"
                                                                            style="width: {{ number_format(($ratings->rating / 5) * 100, 1) }}%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-align gap-8 mb-10">
                                                                    <span class="text-gray-900 flex-shrink-0">Style
                                                                    </span>
                                                                    <span class="text-gray-900 flex-shrink-0"> &nbsp;
                                                                        &nbsp;{{ number_format($ratings->style, 1)
                                                                        }}</span>
                                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8"
                                                                        role="progressbar" aria-label="Basic example"
                                                                        aria-valuenow="50" aria-valuemin="0"
                                                                        aria-valuemax="5">
                                                                        <div class="progress-bar bg-main-600 rounded-pill"
                                                                            style="width: {{ number_format(($ratings->style / 5) * 100, 1) }}%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-align gap-8 mb-10">
                                                                    <span class="text-gray-900 flex-shrink-0">Fit
                                                                    </span>
                                                                    <span class="text-gray-900 flex-shrink-0"> &nbsp;
                                                                        &nbsp; &nbsp;&nbsp;&nbsp;{{
                                                                        number_format($ratings->fit, 1) }}</span>
                                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8"
                                                                        role="progressbar" aria-label="Basic example"
                                                                        aria-valuenow="35" aria-valuemin="0"
                                                                        aria-valuemax="5">
                                                                        <div class="progress-bar bg-main-600 rounded-pill"
                                                                            style="width: {{ number_format(($ratings->fit / 5) * 100, 1) }}%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-sm-12 feature m-0">
                                                <div class="review-box-r arrow-center">
                                                    <div class="flex-align">
                                                        <button type="button" id="feature-item-wrapper-prev1"
                                                            class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                                                            <i class="ph ph-caret-left"></i>
                                                        </button>
                                                        <button type="button" id="feature-item-wrapper-next1"
                                                            class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                                                            <i class="ph ph-caret-right"></i>
                                                        </button>
                                                    </div>
                                                    <div class="right-reviews">
                                                        <div class="feature-item-wrapper1">

                                                            @foreach ($review_images as $image)
                                                            <div class="swiper-slide item-reviews"
                                                                style="margin-right: 10px;">
                                                                <div class="img-box">
                                                                    <div>
                                                                        <img class="right-review-img"
                                                                            src="{{ asset('uploads/review_images/'.$image->image) }}"
                                                                            lazy="loaded">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- ========================== Shipping Section End ============================ -->

                                <div class="mt-24">
                                    @foreach ($reviews as $review)
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="review-list-l">
                                                <h6 class="text-gray-400 roboto-bold mb-8">
                                                    “{{ $review->review_title}}” </h6>
                                                <div class="flex-align mb-10">
                                                    <div class="tips-li">Quality {{ number_format($review->quality, 1)
                                                        }}</div>
                                                    <div class="tips-li">Style {{ number_format($review->style, 1) }}
                                                    </div>
                                                    <div class="tips-li">Fit {{ number_format($review->fit, 1) }}</div>
                                                </div>
                                                <div class="middle">
                                                    <div>{{ $review->review_details}}</div>
                                                </div>
                                                <div class="review-list-b flex-align py-10 mt-24">
                                                    <div>
                                                        <span class="time">{{
                                                            \Carbon\Carbon::parse($review->created_at)->format('d M Y')
                                                            }}, </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="review-list-r">
                                                {{-- @dd($review->id, $review_images_grouped); --}}
                                                @if (isset($review_images_grouped[$review->id]))
                                                @foreach ($review_images_grouped[$review->id] as $image)
                                                <img class="review-img"
                                                    src="{{ asset('uploads/review_images/'.$image) }}">
                                                @endforeach
                                                @endif

                                            </div>
                                        </div>
                                        <hr class="mb-20">
                                    </div>
                                    @endforeach
                                    <div class="row">

                                        <div class="col-xl-12 text-center">
                                            <a href="{{ route('all_reviews', $products->id) }}"
                                                class="btn btn-main rounded-8 py-14 fw-normal">
                                                Read All Reviews
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-4 order-1 order-xl-2" id="right_column">
                <div class="product-details__content sticky-top">

                    <h5 class="mb-5 roboto-regular">{{ $products->pro_name }}</h5>
                    <div class="flex-align flex-wrap gap-8">
                        <div class="flex-align gap-8 flex-wrap">
                            <div class="flex-center gap-4">
                                @php
                                $rating = $ratings->rating; // Your rating value
                                $fullStars = floor($rating); // Number of full stars
                                $halfStar = ($rating - $fullStars) >= 0.5; // Whether to show a half star
                                $emptyStars = 5 - ceil($rating); // Number of empty stars
                                @endphp

                                {{-- Full Stars --}}
                                @for ($i = 0; $i < $fullStars; $i++) <span
                                    class="text-15 fw-medium text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                    @endfor

                                    {{-- Half Star --}}
                                    @if ($halfStar)
                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star-half"></i></span>
                                    @endif

                                    {{-- Empty Stars --}}
                                    @for ($i = 0; $i < $emptyStars; $i++) <span
                                        class="text-15 fw-medium text-warning-600 d-flex"><i
                                            class="ph ph-star"></i></span>
                                        @endfor
                            </div>
                            <span class="text-sm fw-medium text-neutral-600">{{ number_format($ratings->rating, 1) }}
                                Star Rating</span>
                            <span class="text-sm fw-medium text-gray-500">({{ number_format($total_reviews, 0)
                                }})</span>
                        </div>
                    </div>

                    <div class="my-12 rounded-8 border border-gray-200 p-16 pt-10 pb-10" style="background:white;">
                        <div class="flex-align gap-8 flex-wrap">

                            @if ($products->pro_discount)
                            <div class="flex-align gap-8">
                                <h4 class="mb-0 text-main-two-600 gilroy-bold">${{
                                    number_format($products->pro_discount, 2) }}</h4>
                            </div>
                            <div class="flex-align gap-8">
                                <h6 class="text-xl text-gray-400 mb-0 gilroy-bold"
                                    style="text-decoration:line-through;">${{ number_format($products->pro_price, 2) }}
                                </h6>
                            </div>
                            @else
                            <div class="flex-align gap-8">
                                <h4 class="mb-0 text-main-two-600 gilroy-bold">${{ number_format($products->pro_price,
                                    2) }}</h4>
                            </div>
                            @endif
                            @if ($products->pro_discount_percent)
                            <div class="flex-align gap-8">
                                <div class="flex-align gap-8 text-main-two-600">
                                    <i class="ph-fill ph-seal-percent text-xl"></i>
                                    -{{ number_format($products->pro_discount_percent, 2) }}%
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="flex-align gap-8 flex-wrap">
                            <div class="flex-align gap-8 mt-10">
                                <div class="gap-8 ">
                                    4 interest-free instalments of
                                    <span class="text-main-two-600">
                                        @if ($products->pro_discount)
                                        ${{ number_format($products->pro_discount / 4, 2) }}
                                        @else
                                        ${{ number_format($products->pro_price / 4, 2) }}
                                        @endif
                                    </span> with
                                    <img src="{{ asset('assets/images/after_pay.avif') }}" style="height: 20px;">
                                    or
                                    <img src="{{ asset('assets/images/klarna.png') }}" style="height: 20px;">
                                    <i class="fa-sharp-duotone fa-solid fa-circle-info"></i>
                                </div>
                            </div>
                        </div>
                        <div class="px-16 py-8 bg-main-50 rounded-8 flex-between gap-24 mb-5 mt-14">
                            <span class="text-main-600">
                                <i class="fa-sharp-duotone fa-solid fa-ticket"></i> <span class="text-sm">$10 Off
                                    Sitewide</span>
                            </span>
                            <a href="">
                                <span class="text-sm text-main-600 fw-semibold">Get Coupons</span>
                            </a>

                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flex-between align-items-start flex-wrap gap-16">
                            <div>
                                <span class="text-gray-900 d-block mb-8">
                                    Frame Color:
                                    <span class="fw-medium">{{ $pro_sku->color_name }}</span>
                                </span>
                                <div class="color-list flex-align gap-8">
                                    @foreach($product_skus as $index => $sku)

                                    <a href="{{ route('product_detail', ['id' => $sku->pro_id, 'sku_id' => $sku->id]) }}"
                                        class="color-list__button w-60 h-60 border border-2 sku-item space-evenly"
                                        style="background:white;">
                                        <img src="{{ asset('uploads/color_thumbnails/' . $sku->pro_color_image) }}">
                                    </a>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flex-between align-items-start flex-wrap gap-16">
                            <div>
                                <span class="text-gray-900 d-block">
                                    Size:
                                    <span class="fw-medium">{{ $products->size_name }}</span>
                                    <a href="">
                                        <span class="text-sm text-main-600 ms-12">Find Your Size</span>
                                    </a>
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="flex-align gap-8 flex-wrap">
                        <div class="flex-align gap-8 mt-8">
                            <div class="gap-8 text-xs">
                                <i class="fa-regular fa-arrows-rotate"></i> 30 Days Return Warranty <i
                                    class="fa-light fa-shield-check ms-16"></i> 365 Days Quality Warranty
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="row g-2">
                            <div class="col-md-6 col-sm-6">
                                {{-- @if(Auth::check()) --}}
                                <!-- User is logged in, show the normal Add to Cart button -->
                                {{-- <form action="{{ route('add_to_cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="pro_id" class="form-control" value="{{ $products->id }}">
                                    <input type="hidden" name="sku_id" class="form-control" value="{{ $pro_sku->id }}">
                                    <button type="submit"
                                        class="btn btn-main flex-center gap-8 rounded-8 py-16 fw-normal w-100 cbtn">
                                        ADD LENS
                                    </button>
                                </form> --}}
                                <button data-bs-toggle="modal" data-bs-target="#add_lens_modal"
                                    class="btn btn-main flex-center gap-8 rounded-8 py-16 fw-normal w-100 cbtn">
                                    ADD LENS
                                </button>
                                {{-- @else
                                <!-- User is not logged in, show the Login required button -->
                                <button data-bs-toggle="modal" data-bs-target="#error_modal"
                                    class="btn btn-main flex-center gap-8 rounded-8 py-14 fw-normal w-100 cbtn">
                                    FRAME ONLY
                                </button>
                                @endif --}}

                            </div>
                            <div class="col-md-6 col-sm-6">
                                {{-- @if(Auth::check()) --}}
                                <!-- User is logged in, show the normal Add to Cart button -->
                                <button data-bs-toggle="modal" data-bs-target="#frame_only"
                                    class="btn btn-outline-main rounded-8 py-16 fw-normal bg-main-50 w-100 cbtn">
                                    FRAME ONLY
                                </button>
                                {{-- @else
                                <!-- User is not logged in, show the Login required button -->
                                <button data-bs-toggle="modal" data-bs-target="#error_modal"
                                    class="btn btn-outline-main rounded-8 py-14 fw-normal bg-main-50 w-100 cbtn">
                                    ADD TO CART
                                </button>
                                @endif --}}
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button data-bs-toggle="modal" data-bs-target="#tryOnModal"
                                    class="btn btn-black flex-center gap-8 rounded-8 py-12 w-100 cbtn">
                                    <img src="{{ asset('assets/images/glasses.png') }}">
                                    TRY-ON
                                </button>
                            </div>
                        </div>



                    </div>



                </div>
            </div>

        </div>

        <!-- Error Modal -->
        <div class="modal fade" id="error_modal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        You need to be logged in to add items to the cart.
                    </div>
                    <div class="modal-footer">
                        <button data-bs-toggle="modal" data-bs-target="#sign_in_modal" class="btn btn-main">
                            Login
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- ========================== Product Details Two End =========================== -->


<!-- ========================= Deals Week Start ================================ -->
<section class="deals-weeek pt-10">
    <div class="container container-lg">
        <div class="p-24 rounded-16">
            <div class="section-heading mb-24">
                <div class="flex-between flex-wrap gap-8">
                    <h5 class="mb-0">You Might Also Like</h5>
                    <div class="flex-align gap-16">
                        <a href="shop.html"
                            class="text-sm fw-medium text-gray-700 hover-text-main-600 hover-text-decoration-underline">View
                            More</a>
                        <div class="flex-align gap-8">
                            <button type="button" id="deal-week-prev1"
                                class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-neutral-600 text-xl hover-bg-neutral-600 hover-text-white transition-1">
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="deal-week-next1"
                                class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-neutral-600 text-xl hover-bg-neutral-600 hover-text-white transition-1">
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="deals-week-slider1 arrow-style-two">
                @foreach ($related_product as $item)
                <div>
                    <div
                        class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('product_detail', ['id' => $item->id, 'sku_id' => $item->first_sku_id ?? 0]) }}"
                            class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                            <span
                                class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold
                            </span>
                            <img class="product-image" src="{{ asset('uploads/product_thumbnails/'.$item->pro_image) }}"
                                alt="Product Image">

                            <!-- Hover image -->
                            <img class="product-hover-image"
                                src="{{ asset('uploads/product_thumbnails/'.$item->pro_second_image) }}"
                                alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center" style="margin: auto">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">{{
                                    $item->pro_name }}</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    ${{$item->pro_price}}</span>
                                @if ($item->pro_discount)
                                <span class="text-heading text-md fw-semibold "><span
                                        class="text-gray-500 fw-normal">/</span> ${{$item->pro_discount}} </span>
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



<!-- Fullscreen Modal -->
<div class="modal fade" id="frame_only" tabindex="-1" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body pt-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 20px; top: 20px"></button>
                <form action="{{ route('add_to_cart') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="add-frame-left">
                                <div class="frame-image">
                                    <img src="https://cdn.vooglam.com/media/catalog/product/0/1/01_349.jpg"
                                        alt="vooglam Glasses" class="default_img">
                                </div>
                                {{-- <div class="between">
                                    <span>{{ $products->pro_name }} ({{ $pro_sku->color_name }})</span>
                                </div> --}}
                                <div class="between bold-box">
                                    <span class="bold">Frame: <span style="font-weight: 100">{{ $products->pro_name }}
                                            ({{ $pro_sku->color_name }})</span></span>
                                    {{-- <span class="original-price notranslate num">$24.99</span> --}}
                                    <span class="price notranslate num" id="frame_price">$
                                        <span>
                                            @if ($products->pro_discount)
                                            {{ number_format($products->pro_discount) }}
                                            @else
                                            {{ number_format($products->pro_price) }}
                                            @endif
                                        </span>
                                    </span>
                                </div>
                                {{-- @dd($sku_id) --}}


                                <div class="between bold-box">
                                    <span class="bold">Lens: <span id="lens_name_span"></span><span
                                            id="lens_color_span"></span></span>
                                    <span class="price notranslate num">$<span id="lens_price">0.00</span></span>
                                </div>

                                <div class="between bold-box">
                                    <span class="bold">Coating: <span id="coating_name_span"></span></span>
                                    <span class="price notranslate num">$<span id="coating_price">0.00</span></span>
                                </div>

                                <input type="hidden" name="pro_id" class="form-control" value="{{ $products->id }}">
                                <input type="hidden" name="sku_id" class="form-control" value="{{ $pro_sku->id }}">
                                <input type="hidden" name="lens_name" id="lens_name_input" class="form-control">
                                <input type="hidden" name="lens_color" id="lens_color_input" class="form-control">
                                <input type="hidden" name="lens_price" id="lens_price_input" class="form-control">
                                <input type="hidden" name="coating_name" id="coating_name_input" class="form-control">
                                <input type="hidden" name="coating_price" id="coating_price_input" class="form-control">

                                <p class="between sub-price">
                                    <span>Total</span>
                                    <span class="notranslate num">
                                        $<span id="total_price">
                                            @if ($products->pro_discount)
                                            {{ number_format($products->pro_discount) }}
                                            @else
                                            {{ number_format($products->pro_price) }}
                                            @endif</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8" style="background-color: #f5f7f9; height: 100%">

                            <!-- Step 1 -->
                            <div class="step active">
                                <div class="add-frame-right mb-16">
                                    {{-- <div class="top">
                                        <i class="iconfont icon-fanhui"></i>
                                        <div class="progress">
                                            <div class="step-progress-wrap len-2">
                                                <ul>
                                                    <li class="status-2">
                                                        <i class="iconfont icon-checked"></i>
                                                        <span></span>
                                                        <p>Lenses</p>
                                                    </li>
                                                    <li class="status-0">
                                                        <i class="iconfont icon-checked"></i>
                                                        <span></span>
                                                        <p>Coating</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="middle" id="fo-container">
                                        <div class="__view">
                                            <div class="lens-type-container">
                                                <p class="title">Select a lens type</p>
                                                <ul class="list">
                                                    <li class="item lensss" data-item="2">
                                                        <div class="content-box sel">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        data-src="https://cdn.vooglam.com/product/f135996ce40be9a66056db86eb0d4f91.png"
                                                                        src="https://cdn.vooglam.com/product/f135996ce40be9a66056db86eb0d4f91.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Frame Only </p>
                                                                        <p class="list-desc">Plastic Lenses</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$0.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <<li class="item lensss" data-item="2">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://cdn.vooglam.com/product/1d676f74e60d4ad07b7f25dc526bb930.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Standard Lenses </p>
                                                                        <p class="list-desc">Traditional, transparent
                                                                            lenses perfect for everyday use</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$5.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li class="item lensss" data-item="2">
                                                            <div class="content-box">
                                                                <div class="content">
                                                                    <div class="left">
                                                                        <img alt="vooglam eyewear prescription form"
                                                                            src="https://cdn.vooglam.com/product/4dace1b912a6d72d5561c44a4529841c.png"
                                                                            lazy="loaded">
                                                                        <div>
                                                                            <p class="list-title">Blue Light Blocking
                                                                            </p>
                                                                            <p class="list-desc">Protect your eyes from
                                                                                the negative side effects of digital
                                                                                screens</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <p class="notranslate">$20.00</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item lensss" data-item="2">
                                                            <div class="content-box" id="transition_li">
                                                                <div class="content">
                                                                    <div class="left">
                                                                        <img alt="vooglam eyewear prescription form"
                                                                            src="https://cdn.vooglam.com/product/353080318fa55764bfddb47fbe810bd2.png"
                                                                            lazy="loaded">
                                                                        <div>
                                                                            <p class="list-title">
                                                                                Transitions®&amp;Photochromic </p>
                                                                            <p class="list-desc">Automatically adapt to
                                                                                changing light, dark outdoors and clear
                                                                                indoors.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="children d-none" id="children">
                                                                <div class="child-item content-box">
                                                                    <div class="child-item-content"
                                                                        id="standerd_photochromic">
                                                                        <img src="https://cdn.vooglam.com/product/fbeb23b446b098c9e0e34fffafc9a89f.png"
                                                                            class="child-left"
                                                                            alt="vooglam eyewear prescription form">
                                                                        <div class="child-center">
                                                                            <p class="child-name list-title">Standard
                                                                                Photochromic <i
                                                                                    class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"></i>
                                                                            </p>
                                                                            <p class="child-desc list-desc">
                                                                                Light-adjusting, block 100%UV. Adapt
                                                                                seamlessly to dynamic needs with
                                                                                versatile photochromic lenses.</p>
                                                                        </div>
                                                                        <div class="price child-price">
                                                                            <p class="notranslate">$35.00</p>
                                                                        </div>
                                                                    </div>
                                                                    <section class="d-none"
                                                                        id="standerd_photochromic_color">
                                                                        <div class="color-container level2">
                                                                            <span>Color</span>
                                                                            <ul>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Gray" data-title="Gray">
                                                                                    <img src="https://cdn.vooglam.com/product/73ef115d5fc9ee22d833b146898a9de9.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger color_outline">
                                                                                </li>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Amber" data-title="Amber">
                                                                                    <img src="https://cdn.vooglam.com/lens-setting/300bc485559b7226d5a17b8dd24bf557.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger">
                                                                                </li>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Pink" data-title="Pink">
                                                                                    <img src="https://cdn.vooglam.com/product/a853dc5c3f18267854e1bdc05606004b.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger">
                                                                                </li>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Blue" data-title="Blue">
                                                                                    <img src="https://cdn.vooglam.com/lens-setting/df2f3718635fac931b4c0ef954259198.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger">
                                                                                </li>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Purple" data-title="Purple">
                                                                                    <img src="https://cdn.vooglam.com/product/928af425863e04ca7d89c92046fd876e.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger">
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                                <div class="child-item content-box">
                                                                    <div class="child-item-content"
                                                                        id="transition_signature">
                                                                        <img src="https://cdn.vooglam.com/product/c846aca2a471d16f37fc4998deacf4a1.png"
                                                                            class="child-left"
                                                                            alt="vooglam eyewear prescription form">
                                                                        <div class="child-center">
                                                                            <p class="child-name list-title">
                                                                                TRANSITIONS® SIGNATURE® GEN8™ <i
                                                                                    class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"></i>
                                                                            </p>
                                                                            <p class="child-desc list-desc">The perfect
                                                                                everyday lens. Available in 5 different
                                                                                vibrant colors.</p>
                                                                        </div>
                                                                        <div class="price child-price">
                                                                            <p class="notranslate">$100.00</p>
                                                                        </div>
                                                                    </div>
                                                                    <section class="d-none"
                                                                        id="transition_signature_color">
                                                                        <div class="color-container level2">
                                                                            <span>Color</span>
                                                                            <ul>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Gray" data-title="Gray">
                                                                                    <img src="https://cdn.vooglam.com/lens-setting/0391509b7887fec026ccae5bc7a09cd0.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger color_outline">
                                                                                </li>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Brown" data-title="Brown">
                                                                                    <img src="https://cdn.vooglam.com/lens-setting/8a0c4d276441463d6af96c5ffd435a8c.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger">
                                                                                </li>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Graphite Green"
                                                                                    data-title="Graphite Green">
                                                                                    <img src="https://cdn.vooglam.com/lens-setting/d949ff03e4a0ee0af306a918c5d02026.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger">
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                                <div class="child-item content-box">
                                                                    <div class="child-item-content"
                                                                        id="transition_xtractive">
                                                                        <img src="https://cdn.vooglam.com/product/5b8c4c1d7581da4c148500d77a01ec11.png"
                                                                            class="child-left"
                                                                            alt="vooglam eyewear prescription form">
                                                                        <div class="child-center">
                                                                            <p class="child-name list-title">
                                                                                TRANSITIONS® XTRACTIVE® New Generation
                                                                                <i data-v-134834db=""
                                                                                    class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"
                                                                                    style="display: none;"></i></p>
                                                                            <p class="child-desc list-desc">The darkest
                                                                                in hot temperatures, providing up to 35%
                                                                                faster fadeback, activates even in the
                                                                                car.</p>
                                                                        </div>
                                                                        <div class="price child-price">
                                                                            <p class="notranslate">$130.00</p>
                                                                        </div>
                                                                    </div>
                                                                    <section class="d-none"
                                                                        id="transition_xtractive_color">
                                                                        <div class="color-container level2">
                                                                            <span>Color</span>
                                                                            <ul>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Gray" data-title="Gray">
                                                                                    <img src="https://cdn.vooglam.com/lens-setting/944acbb8b0546dca31cb42cf66310ebc.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger color_outline">
                                                                                </li>
                                                                                <li data-bs-toggle="tooltip"
                                                                                    title="Brown" data-title="Brown">
                                                                                    <img src="https://cdn.vooglam.com/lens-setting/1552fa3d0bf8a6602b220c63ace06ff4.png"
                                                                                        alt="vooglam"
                                                                                        class="el-tooltip__trigger">
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item lensss" data-item="2">
                                                            <div class="content-box">
                                                                <div class="content" id="color_tint">
                                                                    <div class="left">
                                                                        <img alt="vooglam eyewear prescription form"
                                                                            src="https://cdn.vooglam.com/product/21328d74ac2fd3c7644c075f36ca9dde.png"
                                                                            lazy="loaded">
                                                                        <div>
                                                                            <p class="list-title">Color Tint </p>
                                                                            <p class="list-desc">Tint or coat your
                                                                                lenses and turn regular lenses into
                                                                                sunglasses</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <p class="notranslate">$35.00</p>
                                                                    </div>
                                                                </div>
                                                                <section class="d-none" id="color_tint_color">
                                                                    <div class="color-container level1">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Dark Gray"
                                                                                data-title="Dark Gray">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/80dee2ca89f1eef0ea85c1bf09a8c731.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger color_outline">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Gradient Gray"
                                                                                data-title="Gradient Gray">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/49357be06c7a2e47cccb6d411aa67d0d.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Dark Brown"
                                                                                data-title="Dark Brown">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/e69f5c58dc64678aa2ec01bb2562b436.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Gradient Brown"
                                                                                data-title="Gradient Brown">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/19f71e2565a20bb32cab56be22433b39.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Light Red"
                                                                                data-title="Light Red">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/06fd511062cce769e7c0a14fd55859a4.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Light Yellow"
                                                                                data-title="Light Yellow">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/aa3697996379891c9c6cbaef72638f90.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Light Brown"
                                                                                data-title="Light Brown">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/42f78ce7119de5249bce6e113a927bc5.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Dark Green"
                                                                                data-title="Dark Green">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/821b8378c36ac20ecb5d6336c6aae86a.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </li>
                                                        <li class="item lensss" data-item="2">
                                                            <div class="content-box">
                                                                <div class="content">
                                                                    <div class="left">
                                                                        <img alt="vooglam eyewear prescription form"
                                                                            src="https://cdn.vooglam.com/product/f14309c6ac0dfbc6e7db678d0534b33b.png"
                                                                            lazy="loaded">
                                                                        <div>
                                                                            <p class="list-title">Driving Lenses </p>
                                                                            <p class="list-desc">Safer driving day and
                                                                                night; UV blocking</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <p class="notranslate">$35.00</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item lensss" data-item="2">
                                                            <div class="content-box">
                                                                <div class="content" id="polarizes_lens">
                                                                    <div class="left">
                                                                        <img alt="vooglam eyewear prescription form"
                                                                            src="https://cdn.vooglam.com/product/546ea655396994809f3a67379e785b7f.png"
                                                                            lazy="loaded">
                                                                        <div>
                                                                            <p class="list-title">Polarized Lenses </p>
                                                                            <p class="list-desc">Reduce extra bright
                                                                                light glares and hazy vision</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <p class="notranslate">$35.00</p>
                                                                    </div>
                                                                </div>
                                                                <section class="d-none" id="polarizes_lens_color">
                                                                    <div class="color-container level1">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li data-bs-toggle="tooltip" title="Gray"
                                                                                data-title="Gray">
                                                                                <img src="https://cdn.vooglam.com/product/73ef115d5fc9ee22d833b146898a9de9.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger color_outline">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Amber"
                                                                                data-title="Amber">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/300bc485559b7226d5a17b8dd24bf557.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Green"
                                                                                data-title="Green">
                                                                                <img src="https://cdn.vooglam.com/product/de2ae9a10624aa0368d889df3e477781.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Yellow"
                                                                                data-title="Yellow">
                                                                                <img src="https://cdn.vooglam.com/product/b4a520e6e0e913495de30545ec434a3a.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="step">
                                <div class="coating-container mb-16">
                                    <p class="title"> Select a coating <i class="iconfont icon-querstion4"></i></p>
                                    <ul class="list">
                                        <li>
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/de2b31b19b481fe309a234256867d057.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Standard Coatings</p>
                                                        </div>
                                                        <p class="intro-desc">Reduces light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$4.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="li-recommend">
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/77f79e786be1aff4bf1a2f14eda76ea8.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Advanced Coatings</p>
                                                            <div class="intro-recommend">Recommended</div>
                                                        </div>
                                                        <p class="intro-desc">Water-resistant, easy to clean reduces
                                                            light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$8.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content sel">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/47aaad525e9b18f2c0fc974aaf892768.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Ultimate Coatings</p>
                                                        </div>
                                                        <p class="intro-desc">Oil-Resistant and water-resistant; reduces
                                                            light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$9.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/ef7bc5b712c5e56e1955da89c9682882.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>No Coating</p>
                                                        </div>
                                                        <p class="intro-desc">Not recommended, may result in glare and
                                                            harsh reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$0.00</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="modal-footer text-center" style="display: block;">
                                <button type="button" class="btn btn-outline-main bg-main-50" id="prevBtn"
                                    disabled>Previous</button>
                                <button type="button" class="btn btn-main" id="nextBtn">Next</button>
                                <button type="submit" class="btn btn-main" id="submitBtn" style="display: none;">Add To
                                    Cart</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Fullscreen Modal -->
<div class="modal fade" id="add_lens_modal" tabindex="-1" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body pt-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 20px; top: 20px"></button>
                <form action="{{ route('add_to_cart') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="add-frame-left">
                                <div class="frame-image">
                                    <img src="https://cdn.vooglam.com/media/catalog/product/0/1/01_349.jpg"
                                        alt="vooglam Glasses" class="default_img">
                                </div>
                                {{-- <div class="between">
                                    <span>{{ $products->pro_name }} ({{ $pro_sku->color_name }})</span>
                                </div> --}}
                                <div class="between bold-box">
                                    <span class="bold">Frame: <span style="font-weight: 100">{{ $products->pro_name }}
                                            ({{ $pro_sku->color_name }})</span></span>
                                    {{-- <span class="original-price notranslate num">$24.99</span> --}}
                                    <span class="price notranslate num" id="frame_price1">$
                                        <span>
                                            @if ($products->pro_discount)
                                            {{ number_format($products->pro_discount) }}
                                            @else
                                            {{ number_format($products->pro_price) }}
                                            @endif
                                        </span>
                                    </span>
                                </div>
                                {{-- @dd($sku_id) --}}


                                <div class="between bold-box">
                                    <span class="bold">Lens: <span id="lens_name_span1"></span><span
                                            id="lens_color_span1"></span></span>
                                    <span class="price notranslate num">$<span id="lens_price1">0.00</span></span>
                                </div>

                                <div class="between bold-box">
                                    <span class="bold">Coating: <span id="coating_name_span1"></span></span>
                                    <span class="price notranslate num">$<span id="coating_price1">0.00</span></span>
                                </div>

                                <input type="hidden" name="pro_id" class="form-control" value="{{ $products->id }}">
                                <input type="hidden" name="sku_id" class="form-control" value="{{ $pro_sku->id }}">
                                <input type="hidden" name="lens_name" id="lens_name_input1" class="form-control">
                                <input type="hidden" name="lens_color" id="lens_color_input1" class="form-control">
                                <input type="hidden" name="lens_price" id="lens_price_input1" class="form-control">
                                <input type="hidden" name="coating_name" id="coating_name_input1" class="form-control">
                                <input type="hidden" name="coating_price" id="coating_price_input1"
                                    class="form-control">

                                <p class="between sub-price">
                                    <span>Total</span>
                                    <span class="notranslate num">
                                        $<span id="total_price1">
                                            @if ($products->pro_discount)
                                            {{ number_format($products->pro_discount) }}
                                            @else
                                            {{ number_format($products->pro_price) }}
                                            @endif</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8" style="background-color: #f5f7f9; height: 100%">



                            <!-- Step 1 -->
                            <div class="lens_step active">
                                <div class="add-frame-right mb-16">
                                    <div class="middle" id="fo-container">
                                        <div class="__view">
                                            <div class="lens-type-container" id="persc_type_div">

                                                <div
                                                    style="display: flex;justify-content: space-between;width: 50%;max-width: 600px;align-items: center;position: relative;margin-top: 5%;margin-left: 26%;">

                                                    <!-- Connecting Line -->
                                                    <div
                                                        style="position: absolute;top: 12%;left: 15%;width: 70%;height: 5.3%;background-color: #ccc;z-index: 0;">
                                                    </div>

                                                    <!-- Step 1 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Prescription</div>
                                                    </div>

                                                    <!-- Step 2 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Lenses</div>
                                                    </div>

                                                    <!-- Step 3 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Coating</div>
                                                    </div>

                                                </div>

                                                <p class="title">Select a Prescription Type</p>
                                                <ul class="list">
                                                    <li class="item" id="single_vision_li">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/single-vision.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Single Vision


                                                                            <!-- Tooltip Link -->

                                                                            <span class="custom-tooltip-link"> <a
                                                                                    href="#"
                                                                                    class="text-gray-900 hover-text-main-600 ">
                                                                                    <!-- SVG Icon -->
                                                                                    <svg class="svg-inline--fa fa-circle-question"
                                                                                        aria-hidden="true"
                                                                                        focusable="false"
                                                                                        data-prefix="fal"
                                                                                        data-icon="circle-question"
                                                                                        role="img"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 512 512"
                                                                                        data-fa-i2svg="">
                                                                                        <path fill="currentColor"
                                                                                            d="M480 256A224 224 0 1 0 32 256a224 224 0 1 0 448 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm168.7-86.2c6.5-24.6 28.7-41.8 54.2-41.8H280c35.5 0 64 29 64 64.3c0 24-13.4 46.2-34.9 57.2L272 268.3V288c0 8.8-7.2 16-16 16s-16-7.2-16-16V258.5c0-6 3.4-11.5 8.7-14.3l45.8-23.4c10.7-5.4 17.5-16.6 17.5-28.7c0-17.8-14.4-32.3-32-32.3H222.9c-10.9 0-20.5 7.4-23.2 17.9l-.2 .7c-2.2 8.5-11 13.7-19.5 11.4s-13.7-11-11.4-19.5l.2-.7zM232 352a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                                                                        </path>
                                                                                    </svg>

                                                                                </a></span>
                                                                        <div class="custom-tooltip">
                                                                            <strong>Single vision</strong>
                                                                            <br />the most common lens type, features a
                                                                            single field of vision, <br />
                                                                            or one prescription power throughout the
                                                                            entire lens.
                                                                            Single<br /> vision glasses can be
                                                                            prescribed for distance vision,<br />
                                                                            near-vision, or reading glasses.
                                                                        </div>



                                                                        </p>
                                                                        <p class="list-desc">Distance, intermediate, or
                                                                            near vision</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                    <li class="item" id="progressive_li">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/progressive.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Progressive

                                                                            <span class="custom-tooltip-link2"> <a
                                                                                    href="#"
                                                                                    class="text-gray-900 hover-text-main-600 ">
                                                                                    <!-- SVG Icon -->
                                                                                    <svg class="svg-inline--fa fa-circle-question"
                                                                                        aria-hidden="true"
                                                                                        focusable="false"
                                                                                        data-prefix="fal"
                                                                                        data-icon="circle-question"
                                                                                        role="img"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 512 512"
                                                                                        data-fa-i2svg="">
                                                                                        <path fill="currentColor"
                                                                                            d="M480 256A224 224 0 1 0 32 256a224 224 0 1 0 448 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm168.7-86.2c6.5-24.6 28.7-41.8 54.2-41.8H280c35.5 0 64 29 64 64.3c0 24-13.4 46.2-34.9 57.2L272 268.3V288c0 8.8-7.2 16-16 16s-16-7.2-16-16V258.5c0-6 3.4-11.5 8.7-14.3l45.8-23.4c10.7-5.4 17.5-16.6 17.5-28.7c0-17.8-14.4-32.3-32-32.3H222.9c-10.9 0-20.5 7.4-23.2 17.9l-.2 .7c-2.2 8.5-11 13.7-19.5 11.4s-13.7-11-11.4-19.5l.2-.7zM232 352a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                                                                        </path>
                                                                                    </svg>

                                                                                </a></span>
                                                                        <div class="custom-tooltip2">
                                                                            <strong>Progressives</strong>
                                                                            <br />Progressives are multifocal lenses
                                                                            with three viewing areas:<br />
                                                                            distance, intermediate, and near vision. The
                                                                            top portion is used<br />
                                                                            for distance-vision, the middle portion for
                                                                            mid-range vision,<br />
                                                                            and the bottom portion for the near-vision
                                                                            or reading.
                                                                        </div>

                                                                        </p>
                                                                        <p class="list-desc">No-line multifocal lenses
                                                                            for both far, middle or near </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item" id="bifocal_li">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/bifocal.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Bifocal

                                                                            <span class="custom-tooltip-link3"> <a
                                                                                    href="#"
                                                                                    class="text-gray-900 hover-text-main-600 ">
                                                                                    <!-- SVG Icon -->
                                                                                    <svg class="svg-inline--fa fa-circle-question"
                                                                                        aria-hidden="true"
                                                                                        focusable="false"
                                                                                        data-prefix="fal"
                                                                                        data-icon="circle-question"
                                                                                        role="img"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 512 512"
                                                                                        data-fa-i2svg="">
                                                                                        <path fill="currentColor"
                                                                                            d="M480 256A224 224 0 1 0 32 256a224 224 0 1 0 448 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm168.7-86.2c6.5-24.6 28.7-41.8 54.2-41.8H280c35.5 0 64 29 64 64.3c0 24-13.4 46.2-34.9 57.2L272 268.3V288c0 8.8-7.2 16-16 16s-16-7.2-16-16V258.5c0-6 3.4-11.5 8.7-14.3l45.8-23.4c10.7-5.4 17.5-16.6 17.5-28.7c0-17.8-14.4-32.3-32-32.3H222.9c-10.9 0-20.5 7.4-23.2 17.9l-.2 .7c-2.2 8.5-11 13.7-19.5 11.4s-13.7-11-11.4-19.5l.2-.7zM232 352a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                                                                        </path>
                                                                                    </svg>

                                                                                </a></span>
                                                                        <div class="custom-tooltip3">

                                                                            <strong>Bifocal</strong>
                                                                            <br />Bifocal lens has two separate and
                                                                            distinct fields of vision:<br /> distance &
                                                                            near. A visible line separates the two.
                                                                        </div>

                                                                        </p>
                                                                        <p class="list-desc">Lenses with visible line
                                                                            for both far and near</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item" id="reading_glass_li">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/reading-glasses.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Reading Glasses

                                                                            <span class="custom-tooltip-link4"> <a
                                                                                    href="#"
                                                                                    class="text-gray-900 hover-text-main-600 ">
                                                                                    <!-- SVG Icon -->
                                                                                    <svg class="svg-inline--fa fa-circle-question"
                                                                                        aria-hidden="true"
                                                                                        focusable="false"
                                                                                        data-prefix="fal"
                                                                                        data-icon="circle-question"
                                                                                        role="img"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 512 512"
                                                                                        data-fa-i2svg="">
                                                                                        <path fill="currentColor"
                                                                                            d="M480 256A224 224 0 1 0 32 256a224 224 0 1 0 448 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm168.7-86.2c6.5-24.6 28.7-41.8 54.2-41.8H280c35.5 0 64 29 64 64.3c0 24-13.4 46.2-34.9 57.2L272 268.3V288c0 8.8-7.2 16-16 16s-16-7.2-16-16V258.5c0-6 3.4-11.5 8.7-14.3l45.8-23.4c10.7-5.4 17.5-16.6 17.5-28.7c0-17.8-14.4-32.3-32-32.3H222.9c-10.9 0-20.5 7.4-23.2 17.9l-.2 .7c-2.2 8.5-11 13.7-19.5 11.4s-13.7-11-11.4-19.5l.2-.7zM232 352a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                                                                        </path>
                                                                                    </svg>

                                                                                </a></span>
                                                                        <div class="custom-tooltip4">
                                                                            <strong>Reading Glasses</strong>
                                                                            <br />"Reader" lenses have prescriptions
                                                                            starting with a plus ( + ) sign<br />
                                                                            and are designed for those who have trouble
                                                                            focusing their eyes while reading. <br />
                                                                            These lenses are designed to help correct
                                                                            farsightedness <br />
                                                                            caused by hyperopia or presbyopia.
                                                                        </div>

                                                                        </p>
                                                                        <p class="list-desc">One magnification field for
                                                                            reading</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="collapse d-none" id="reading_glass_option">
                                                                <div class="active" id="use_my_presc">Use my
                                                                    prescription</div>
                                                                <div class="" id="reader_magni">Readers / Magnification
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li class="item" id="non_presc">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/non-prescription.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Non-Prescription </p>
                                                                        <p class="list-desc">Lenses without vision
                                                                            correction</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="lens-type-container d-none" id="single_vision">
                                                <i id="single_vision_back" class="fa-solid fa-arrow-left"
                                                    style="position: absolute; left: 0; top: 35px; font-size: 22px; cursor: pointer"></i>
                                                <div
                                                    style="display: flex; justify-content: space-between; width: 50%; max-width: 600px; align-items: center; position: relative; margin-top: 5%; margin-left: 26%;">

                                                    <!-- Connecting Line -->
                                                    <div
                                                        style="position: absolute; top: 12%; left: 15%; width: 70%; height: 5.3%; background-color: #ccc; z-index: 0;">
                                                    </div>

                                                    <!-- Step 1 (Active) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid orange; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div
                                                            style="margin-top: 10px; font-size: 1.2vw; color: #000; font-weight: normal;">
                                                            Prescription</div>
                                                    </div>

                                                    <!-- Step 2 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Lenses</div>
                                                    </div>

                                                    <!-- Step 3 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Coating</div>
                                                    </div>

                                                </div>


                                                <p class="title">Enter your prescription </p>
                                                <div class="box p-48" style="background-color: white">
                                                    <div class="prescription-container">
                                                        <div class="info-box">
                                                            <table class="table lens_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="text-center">SPH</th>
                                                                        <th class="text-center">CYL</th>
                                                                        <th class="text-center">AXIS</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>OD-Right</td>
                                                                        <td class="text-center px-24">
                                                                            <div class="custom-select-wrapper">
                                                                                <select name="" id="od_right_sph"
                                                                                    class="form-control text-center custom-select">
                                                                                    <option value="-20.00">-20.00
                                                                                    </option>
                                                                                    <option value="-19.75">-19.75
                                                                                    </option>
                                                                                    <option value="-19.50">-19.50
                                                                                    </option>
                                                                                    <option value="-19.25">-19.25
                                                                                    </option>
                                                                                    <option value="-19.00">-19.00
                                                                                    </option>
                                                                                    <option value="-18.75">-18.75
                                                                                    </option>
                                                                                    <option value="-18.50">-18.50
                                                                                    </option>
                                                                                    <option value="-18.25">-18.25
                                                                                    </option>
                                                                                    <option value="-18.00">-18.00
                                                                                    </option>
                                                                                    <option value="-17.75">-17.75
                                                                                    </option>
                                                                                    <option value="-17.50">-17.50
                                                                                    </option>
                                                                                    <option value="-17.25">-17.25
                                                                                    </option>
                                                                                    <option value="-17.00">-17.00
                                                                                    </option>
                                                                                    <option value="-16.75">-16.75
                                                                                    </option>
                                                                                    <option value="-16.50">-16.50
                                                                                    </option>
                                                                                    <option value="-16.25">-16.25
                                                                                    </option>
                                                                                    <option value="-16.00">-16.00
                                                                                    </option>
                                                                                    <option value="-15.75">-15.75
                                                                                    </option>
                                                                                    <option value="-15.50">-15.50
                                                                                    </option>
                                                                                    <option value="-15.25">-15.25
                                                                                    </option>
                                                                                    <option value="-15.00">-15.00
                                                                                    </option>
                                                                                    <option value="-14.75">-14.75
                                                                                    </option>
                                                                                    <option value="-14.50">-14.50
                                                                                    </option>
                                                                                    <option value="-14.25">-14.25
                                                                                    </option>
                                                                                    <option value="-14.00">-14.00
                                                                                    </option>
                                                                                    <option value="-13.75">-13.75
                                                                                    </option>
                                                                                    <option value="-13.50">-13.50
                                                                                    </option>
                                                                                    <option value="-13.25">-13.25
                                                                                    </option>
                                                                                    <option value="-13.00">-13.00
                                                                                    </option>
                                                                                    <option value="-12.75">-12.75
                                                                                    </option>
                                                                                    <option value="-12.50">-12.50
                                                                                    </option>
                                                                                    <option value="-12.25">-12.25
                                                                                    </option>
                                                                                    <option value="-12.00">-12.00
                                                                                    </option>
                                                                                    <option value="-11.75">-11.75
                                                                                    </option>
                                                                                    <option value="-11.50">-11.50
                                                                                    </option>
                                                                                    <option value="-11.25">-11.25
                                                                                    </option>
                                                                                    <option value="-11.00">-11.00
                                                                                    </option>
                                                                                    <option value="-10.75">-10.75
                                                                                    </option>
                                                                                    <option value="-10.50">-10.50
                                                                                    </option>
                                                                                    <option value="-10.25">-10.25
                                                                                    </option>
                                                                                    <option value="-10.00">-10.00
                                                                                    </option>
                                                                                    <option value="-9.75">-9.75</option>
                                                                                    <option value="-9.50">-9.50</option>
                                                                                    <option value="-9.25">-9.25</option>
                                                                                    <option value="-9.00">-9.00</option>
                                                                                    <option value="-8.75">-8.75</option>
                                                                                    <option value="-8.50">-8.50</option>
                                                                                    <option value="-8.25">-8.25</option>
                                                                                    <option value="-8.00">-8.00</option>
                                                                                    <option value="-7.75">-7.75</option>
                                                                                    <option value="-7.50">-7.50</option>
                                                                                    <option value="-7.25">-7.25</option>
                                                                                    <option value="-7.00">-7.00</option>
                                                                                    <option value="-6.75">-6.75</option>
                                                                                    <option value="-6.50">-6.50</option>
                                                                                    <option value="-6.25">-6.25</option>
                                                                                    <option value="-6.00">-6.00</option>
                                                                                    <option value="-5.75">-5.75</option>
                                                                                    <option value="-5.50">-5.50</option>
                                                                                    <option value="-5.25">-5.25</option>
                                                                                    <option value="-5.00">-5.00</option>
                                                                                    <option value="-4.75">-4.75</option>
                                                                                    <option value="-4.50">-4.50</option>
                                                                                    <option value="-4.25">-4.25</option>
                                                                                    <option value="-4.00">-4.00</option>
                                                                                    <option value="-3.75">-3.75</option>
                                                                                    <option value="-3.50">-3.50</option>
                                                                                    <option value="-3.25">-3.25</option>
                                                                                    <option value="-3.00">-3.00</option>
                                                                                    <option value="-2.75">-2.75</option>
                                                                                    <option value="-2.50">-2.50</option>
                                                                                    <option value="-2.25">-2.25</option>
                                                                                    <option value="-2.00">-2.00</option>
                                                                                    <option value="-1.75">-1.75</option>
                                                                                    <option value="-1.50">-1.50</option>
                                                                                    <option value="-1.25">-1.25</option>
                                                                                    <option value="-1.00">-1.00</option>
                                                                                    <option value="-0.75">-0.75</option>
                                                                                    <option value="-0.50">-0.50</option>
                                                                                    <option value="-0.25">-0.25</option>
                                                                                    <option value="0.00" selected>0.00
                                                                                    </option>
                                                                                    <option value="PL">PL</option>
                                                                                    <option value="+0.25">+0.25</option>
                                                                                    <option value="+0.50">+0.50</option>
                                                                                    <option value="+0.75">+0.75</option>
                                                                                    <option value="+1.00">+1.00</option>
                                                                                    <option value="+1.25">+1.25</option>
                                                                                    <option value="+1.50">+1.50</option>
                                                                                    <option value="+1.75">+1.75</option>
                                                                                    <option value="+2.00">+2.00</option>
                                                                                    <option value="+2.25">+2.25</option>
                                                                                    <option value="+2.50">+2.50</option>
                                                                                    <option value="+2.75">+2.75</option>
                                                                                    <option value="+3.00">+3.00</option>
                                                                                    <option value="+3.25">+3.25</option>
                                                                                    <option value="+3.50">+3.50</option>
                                                                                    <option value="+3.75">+3.75</option>
                                                                                    <option value="+4.00">+4.00</option>
                                                                                    <option value="+4.25">+4.25</option>
                                                                                    <option value="+4.50">+4.50</option>
                                                                                    <option value="+4.75">+4.75</option>
                                                                                    <option value="+5.00">+5.00</option>
                                                                                    <option value="+5.25">+5.25</option>
                                                                                    <option value="+5.50">+5.50</option>
                                                                                    <option value="+5.75">+5.75</option>
                                                                                    <option value="+6.00">+6.00</option>
                                                                                    <option value="+6.25">+6.25</option>
                                                                                    <option value="+6.50">+6.50</option>
                                                                                    <option value="+6.75">+6.75</option>
                                                                                    <option value="+7.00">+7.00</option>
                                                                                    <option value="+7.25">+7.25</option>
                                                                                    <option value="+7.50">+7.50</option>
                                                                                    <option value="+7.75">+7.75</option>
                                                                                    <option value="+8.00">+8.00</option>
                                                                                    <option value="+8.25">+8.25</option>
                                                                                    <option value="+8.50">+8.50</option>
                                                                                    <option value="+8.75">+8.75</option>
                                                                                    <option value="+9.00">+9.00</option>
                                                                                    <option value="+9.25">+9.25</option>
                                                                                    <option value="+9.50">+9.50</option>
                                                                                    <option value="+9.75">+9.75</option>
                                                                                    <option value="+10.00">+10.00
                                                                                    </option>
                                                                                    <option value="+10.25">+10.25
                                                                                    </option>
                                                                                    <option value="+10.50">+10.50
                                                                                    </option>
                                                                                    <option value="+10.75">+10.75
                                                                                    </option>
                                                                                    <option value="+11.00">+11.00
                                                                                    </option>
                                                                                    <option value="+11.25">+11.25
                                                                                    </option>
                                                                                    <option value="+11.50">+11.50
                                                                                    </option>
                                                                                    <option value="+11.75">+11.75
                                                                                    </option>
                                                                                    <option value="+12.00">+12.00
                                                                                    </option>
                                                                                    <option value="+12.25">+12.25
                                                                                    </option>
                                                                                    <option value="+12.50">+12.50
                                                                                    </option>
                                                                                    <option value="+12.75">+12.75
                                                                                    </option>
                                                                                    <option value="+13.00">+13.00
                                                                                    </option>
                                                                                    <option value="+13.25">+13.25
                                                                                    </option>
                                                                                    <option value="+13.50">+13.50
                                                                                    </option>
                                                                                    <option value="+13.75">+13.75
                                                                                    </option>
                                                                                    <option value="+14.00">+14.00
                                                                                    </option>
                                                                                    <option value="+14.25">+14.25
                                                                                    </option>
                                                                                    <option value="+14.50">+14.50
                                                                                    </option>
                                                                                    <option value="+14.75">+14.75
                                                                                    </option>
                                                                                    <option value="+15.00">+15.00
                                                                                    </option>
                                                                                    <option value="+15.25">+15.25
                                                                                    </option>
                                                                                    <option value="+15.50">+15.50
                                                                                    </option>
                                                                                    <option value="+15.75">+15.75
                                                                                    </option>
                                                                                    <option value="+16.00">+16.00
                                                                                    </option>
                                                                                    <option value="+16.25">+16.25
                                                                                    </option>
                                                                                    <option value="+16.50">+16.50
                                                                                    </option>
                                                                                    <option value="+16.75">+16.75
                                                                                    </option>
                                                                                    <option value="+17.00">+17.00
                                                                                    </option>
                                                                                    <option value="+17.25">+17.25
                                                                                    </option>
                                                                                    <option value="+17.50">+17.50
                                                                                    </option>
                                                                                    <option value="+17.75">+17.75
                                                                                    </option>
                                                                                    <option value="+18.00">+18.00
                                                                                    </option>
                                                                                    <option value="+18.25">+18.25
                                                                                    </option>
                                                                                    <option value="+18.50">+18.50
                                                                                    </option>
                                                                                    <option value="+18.75">+18.75
                                                                                    </option>
                                                                                    <option value="+19.00">+19.00
                                                                                    </option>
                                                                                    <option value="+19.25">+19.25
                                                                                    </option>
                                                                                    <option value="+19.50">+19.50
                                                                                    </option>
                                                                                    <option value="+19.75">+19.75
                                                                                    </option>
                                                                                    <option value="+20.00">+20.00
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_right_cyl"
                                                                                class="form-control text-center">
                                                                                <option value="-6.00">-6.00</option>
                                                                                <option value="-5.75">-5.75</option>
                                                                                <option value="-5.50">-5.50</option>
                                                                                <option value="-5.25">-5.25</option>
                                                                                <option value="-5.00">-5.00</option>
                                                                                <option value="-4.75">-4.75</option>
                                                                                <option value="-4.50">-4.50</option>
                                                                                <option value="-4.25">-4.25</option>
                                                                                <option value="-4.00">-4.00</option>
                                                                                <option value="-3.75">-3.75</option>
                                                                                <option value="-3.50">-3.50</option>
                                                                                <option value="-3.25">-3.25</option>
                                                                                <option value="-3.00">-3.00</option>
                                                                                <option value="-2.75">-2.75</option>
                                                                                <option value="-2.50">-2.50</option>
                                                                                <option value="-2.25">-2.25</option>
                                                                                <option value="-2.00">-2.00</option>
                                                                                <option value="-1.75">-1.75</option>
                                                                                <option value="-1.50">-1.50</option>
                                                                                <option value="-1.25">-1.25</option>
                                                                                <option value="-1.00">-1.00</option>
                                                                                <option value="-0.75">-0.75</option>
                                                                                <option value="-0.50">-0.50</option>
                                                                                <option value="-0.25">-0.25</option>
                                                                                <option value="0.00" selected>0.00
                                                                                </option>
                                                                                <option value="SPH/DS">SPH/DS</option>
                                                                                <option value="+0.25">+0.25</option>
                                                                                <option value="+0.50">+0.50</option>
                                                                                <option value="+0.75">+0.75</option>
                                                                                <option value="+1.00">+1.00</option>
                                                                                <option value="+1.25">+1.25</option>
                                                                                <option value="+1.50">+1.50</option>
                                                                                <option value="+1.75">+1.75</option>
                                                                                <option value="+2.00">+2.00</option>
                                                                                <option value="+2.25">+2.25</option>
                                                                                <option value="+2.50">+2.50</option>
                                                                                <option value="+2.75">+2.75</option>
                                                                                <option value="+3.00">+3.00</option>
                                                                                <option value="+3.25">+3.25</option>
                                                                                <option value="+3.50">+3.50</option>
                                                                                <option value="+3.75">+3.75</option>
                                                                                <option value="+4.00">+4.00</option>
                                                                                <option value="+4.25">+4.25</option>
                                                                                <option value="+4.50">+4.50</option>
                                                                                <option value="+4.75">+4.75</option>
                                                                                <option value="+5.00">+5.00</option>
                                                                                <option value="+5.25">+5.25</option>
                                                                                <option value="+5.50">+5.50</option>
                                                                                <option value="+5.75">+5.75</option>
                                                                                <option value="+6.00">+6.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_right_axis"
                                                                                class="form-control text-center">
                                                                                <option value="" selected>None</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>
                                                                                <option value="10">10</option>
                                                                                <option value="11">11</option>
                                                                                <option value="12">12</option>
                                                                                <option value="13">13</option>
                                                                                <option value="14">14</option>
                                                                                <option value="15">15</option>
                                                                                <option value="16">16</option>
                                                                                <option value="17">17</option>
                                                                                <option value="18">18</option>
                                                                                <option value="19">19</option>
                                                                                <option value="20">20</option>
                                                                                <option value="21">21</option>
                                                                                <option value="22">22</option>
                                                                                <option value="23">23</option>
                                                                                <option value="24">24</option>
                                                                                <option value="25">25</option>
                                                                                <option value="26">26</option>
                                                                                <option value="27">27</option>
                                                                                <option value="28">28</option>
                                                                                <option value="29">29</option>
                                                                                <option value="30">30</option>
                                                                                <option value="31">31</option>
                                                                                <option value="32">32</option>
                                                                                <option value="33">33</option>
                                                                                <option value="34">34</option>
                                                                                <option value="35">35</option>
                                                                                <option value="36">36</option>
                                                                                <option value="37">37</option>
                                                                                <option value="38">38</option>
                                                                                <option value="39">39</option>
                                                                                <option value="40">40</option>
                                                                                <option value="41">41</option>
                                                                                <option value="42">42</option>
                                                                                <option value="43">43</option>
                                                                                <option value="44">44</option>
                                                                                <option value="45">45</option>
                                                                                <option value="46">46</option>
                                                                                <option value="47">47</option>
                                                                                <option value="48">48</option>
                                                                                <option value="49">49</option>
                                                                                <option value="50">50</option>
                                                                                <option value="51">51</option>
                                                                                <option value="52">52</option>
                                                                                <option value="53">53</option>
                                                                                <option value="54">54</option>
                                                                                <option value="55">55</option>
                                                                                <option value="56">56</option>
                                                                                <option value="57">57</option>
                                                                                <option value="58">58</option>
                                                                                <option value="59">59</option>
                                                                                <option value="60">60</option>
                                                                                <option value="61">61</option>
                                                                                <option value="62">62</option>
                                                                                <option value="63">63</option>
                                                                                <option value="64">64</option>
                                                                                <option value="65">65</option>
                                                                                <option value="66">66</option>
                                                                                <option value="67">67</option>
                                                                                <option value="68">68</option>
                                                                                <option value="69">69</option>
                                                                                <option value="70">70</option>
                                                                                <option value="71">71</option>
                                                                                <option value="72">72</option>
                                                                                <option value="73">73</option>
                                                                                <option value="74">74</option>
                                                                                <option value="75">75</option>
                                                                                <option value="76">76</option>
                                                                                <option value="77">77</option>
                                                                                <option value="78">78</option>
                                                                                <option value="79">79</option>
                                                                                <option value="80">80</option>
                                                                                <option value="81">81</option>
                                                                                <option value="82">82</option>
                                                                                <option value="83">83</option>
                                                                                <option value="84">84</option>
                                                                                <option value="85">85</option>
                                                                                <option value="86">86</option>
                                                                                <option value="87">87</option>
                                                                                <option value="88">88</option>
                                                                                <option value="89">89</option>
                                                                                <option value="90">90</option>
                                                                                <option value="91">91</option>
                                                                                <option value="92">92</option>
                                                                                <option value="93">93</option>
                                                                                <option value="94">94</option>
                                                                                <option value="95">95</option>
                                                                                <option value="96">96</option>
                                                                                <option value="97">97</option>
                                                                                <option value="98">98</option>
                                                                                <option value="99">99</option>
                                                                                <option value="100">100</option>
                                                                                <option value="101">101</option>
                                                                                <option value="102">102</option>
                                                                                <option value="103">103</option>
                                                                                <option value="104">104</option>
                                                                                <option value="105">105</option>
                                                                                <option value="106">106</option>
                                                                                <option value="107">107</option>
                                                                                <option value="108">108</option>
                                                                                <option value="109">109</option>
                                                                                <option value="110">110</option>
                                                                                <option value="111">111</option>
                                                                                <option value="112">112</option>
                                                                                <option value="113">113</option>
                                                                                <option value="114">114</option>
                                                                                <option value="115">115</option>
                                                                                <option value="116">116</option>
                                                                                <option value="117">117</option>
                                                                                <option value="118">118</option>
                                                                                <option value="119">119</option>
                                                                                <option value="120">120</option>
                                                                                <option value="121">121</option>
                                                                                <option value="122">122</option>
                                                                                <option value="123">123</option>
                                                                                <option value="124">124</option>
                                                                                <option value="125">125</option>
                                                                                <option value="126">126</option>
                                                                                <option value="127">127</option>
                                                                                <option value="128">128</option>
                                                                                <option value="129">129</option>
                                                                                <option value="130">130</option>
                                                                                <option value="131">131</option>
                                                                                <option value="132">132</option>
                                                                                <option value="133">133</option>
                                                                                <option value="134">134</option>
                                                                                <option value="135">135</option>
                                                                                <option value="136">136</option>
                                                                                <option value="137">137</option>
                                                                                <option value="138">138</option>
                                                                                <option value="139">139</option>
                                                                                <option value="140">140</option>
                                                                                <option value="141">141</option>
                                                                                <option value="142">142</option>
                                                                                <option value="143">143</option>
                                                                                <option value="144">144</option>
                                                                                <option value="145">145</option>
                                                                                <option value="146">146</option>
                                                                                <option value="147">147</option>
                                                                                <option value="148">148</option>
                                                                                <option value="149">149</option>
                                                                                <option value="150">150</option>
                                                                                <option value="151">151</option>
                                                                                <option value="152">152</option>
                                                                                <option value="153">153</option>
                                                                                <option value="154">154</option>
                                                                                <option value="155">155</option>
                                                                                <option value="156">156</option>
                                                                                <option value="157">157</option>
                                                                                <option value="158">158</option>
                                                                                <option value="159">159</option>
                                                                                <option value="160">160</option>
                                                                                <option value="161">161</option>
                                                                                <option value="162">162</option>
                                                                                <option value="163">163</option>
                                                                                <option value="164">164</option>
                                                                                <option value="165">165</option>
                                                                                <option value="166">166</option>
                                                                                <option value="167">167</option>
                                                                                <option value="168">168</option>
                                                                                <option value="169">169</option>
                                                                                <option value="170">170</option>
                                                                                <option value="171">171</option>
                                                                                <option value="172">172</option>
                                                                                <option value="173">173</option>
                                                                                <option value="174">174</option>
                                                                                <option value="175">175</option>
                                                                                <option value="176">176</option>
                                                                                <option value="177">177</option>
                                                                                <option value="178">178</option>
                                                                                <option value="179">179</option>
                                                                                <option value="180">180</option>

                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OD-Left</td>
                                                                        <td class="text-center px-24">
                                                                            <div class="custom-select-wrapper">
                                                                                <select name="" id="od_left_sph"
                                                                                    class="form-control text-center custom-select">
                                                                                    <option value="-20.00">-20.00
                                                                                    </option>
                                                                                    <option value="-19.75">-19.75
                                                                                    </option>
                                                                                    <option value="-19.50">-19.50
                                                                                    </option>
                                                                                    <option value="-19.25">-19.25
                                                                                    </option>
                                                                                    <option value="-19.00">-19.00
                                                                                    </option>
                                                                                    <option value="-18.75">-18.75
                                                                                    </option>
                                                                                    <option value="-18.50">-18.50
                                                                                    </option>
                                                                                    <option value="-18.25">-18.25
                                                                                    </option>
                                                                                    <option value="-18.00">-18.00
                                                                                    </option>
                                                                                    <option value="-17.75">-17.75
                                                                                    </option>
                                                                                    <option value="-17.50">-17.50
                                                                                    </option>
                                                                                    <option value="-17.25">-17.25
                                                                                    </option>
                                                                                    <option value="-17.00">-17.00
                                                                                    </option>
                                                                                    <option value="-16.75">-16.75
                                                                                    </option>
                                                                                    <option value="-16.50">-16.50
                                                                                    </option>
                                                                                    <option value="-16.25">-16.25
                                                                                    </option>
                                                                                    <option value="-16.00">-16.00
                                                                                    </option>
                                                                                    <option value="-15.75">-15.75
                                                                                    </option>
                                                                                    <option value="-15.50">-15.50
                                                                                    </option>
                                                                                    <option value="-15.25">-15.25
                                                                                    </option>
                                                                                    <option value="-15.00">-15.00
                                                                                    </option>
                                                                                    <option value="-14.75">-14.75
                                                                                    </option>
                                                                                    <option value="-14.50">-14.50
                                                                                    </option>
                                                                                    <option value="-14.25">-14.25
                                                                                    </option>
                                                                                    <option value="-14.00">-14.00
                                                                                    </option>
                                                                                    <option value="-13.75">-13.75
                                                                                    </option>
                                                                                    <option value="-13.50">-13.50
                                                                                    </option>
                                                                                    <option value="-13.25">-13.25
                                                                                    </option>
                                                                                    <option value="-13.00">-13.00
                                                                                    </option>
                                                                                    <option value="-12.75">-12.75
                                                                                    </option>
                                                                                    <option value="-12.50">-12.50
                                                                                    </option>
                                                                                    <option value="-12.25">-12.25
                                                                                    </option>
                                                                                    <option value="-12.00">-12.00
                                                                                    </option>
                                                                                    <option value="-11.75">-11.75
                                                                                    </option>
                                                                                    <option value="-11.50">-11.50
                                                                                    </option>
                                                                                    <option value="-11.25">-11.25
                                                                                    </option>
                                                                                    <option value="-11.00">-11.00
                                                                                    </option>
                                                                                    <option value="-10.75">-10.75
                                                                                    </option>
                                                                                    <option value="-10.50">-10.50
                                                                                    </option>
                                                                                    <option value="-10.25">-10.25
                                                                                    </option>
                                                                                    <option value="-10.00">-10.00
                                                                                    </option>
                                                                                    <option value="-9.75">-9.75</option>
                                                                                    <option value="-9.50">-9.50</option>
                                                                                    <option value="-9.25">-9.25</option>
                                                                                    <option value="-9.00">-9.00</option>
                                                                                    <option value="-8.75">-8.75</option>
                                                                                    <option value="-8.50">-8.50</option>
                                                                                    <option value="-8.25">-8.25</option>
                                                                                    <option value="-8.00">-8.00</option>
                                                                                    <option value="-7.75">-7.75</option>
                                                                                    <option value="-7.50">-7.50</option>
                                                                                    <option value="-7.25">-7.25</option>
                                                                                    <option value="-7.00">-7.00</option>
                                                                                    <option value="-6.75">-6.75</option>
                                                                                    <option value="-6.50">-6.50</option>
                                                                                    <option value="-6.25">-6.25</option>
                                                                                    <option value="-6.00">-6.00</option>
                                                                                    <option value="-5.75">-5.75</option>
                                                                                    <option value="-5.50">-5.50</option>
                                                                                    <option value="-5.25">-5.25</option>
                                                                                    <option value="-5.00">-5.00</option>
                                                                                    <option value="-4.75">-4.75</option>
                                                                                    <option value="-4.50">-4.50</option>
                                                                                    <option value="-4.25">-4.25</option>
                                                                                    <option value="-4.00">-4.00</option>
                                                                                    <option value="-3.75">-3.75</option>
                                                                                    <option value="-3.50">-3.50</option>
                                                                                    <option value="-3.25">-3.25</option>
                                                                                    <option value="-3.00">-3.00</option>
                                                                                    <option value="-2.75">-2.75</option>
                                                                                    <option value="-2.50">-2.50</option>
                                                                                    <option value="-2.25">-2.25</option>
                                                                                    <option value="-2.00">-2.00</option>
                                                                                    <option value="-1.75">-1.75</option>
                                                                                    <option value="-1.50">-1.50</option>
                                                                                    <option value="-1.25">-1.25</option>
                                                                                    <option value="-1.00">-1.00</option>
                                                                                    <option value="-0.75">-0.75</option>
                                                                                    <option value="-0.50">-0.50</option>
                                                                                    <option value="-0.25">-0.25</option>
                                                                                    <option value="0.00" selected>0.00
                                                                                    </option>
                                                                                    <option value="PL">PL</option>
                                                                                    <option value="+0.25">+0.25</option>
                                                                                    <option value="+0.50">+0.50</option>
                                                                                    <option value="+0.75">+0.75</option>
                                                                                    <option value="+1.00">+1.00</option>
                                                                                    <option value="+1.25">+1.25</option>
                                                                                    <option value="+1.50">+1.50</option>
                                                                                    <option value="+1.75">+1.75</option>
                                                                                    <option value="+2.00">+2.00</option>
                                                                                    <option value="+2.25">+2.25</option>
                                                                                    <option value="+2.50">+2.50</option>
                                                                                    <option value="+2.75">+2.75</option>
                                                                                    <option value="+3.00">+3.00</option>
                                                                                    <option value="+3.25">+3.25</option>
                                                                                    <option value="+3.50">+3.50</option>
                                                                                    <option value="+3.75">+3.75</option>
                                                                                    <option value="+4.00">+4.00</option>
                                                                                    <option value="+4.25">+4.25</option>
                                                                                    <option value="+4.50">+4.50</option>
                                                                                    <option value="+4.75">+4.75</option>
                                                                                    <option value="+5.00">+5.00</option>
                                                                                    <option value="+5.25">+5.25</option>
                                                                                    <option value="+5.50">+5.50</option>
                                                                                    <option value="+5.75">+5.75</option>
                                                                                    <option value="+6.00">+6.00</option>
                                                                                    <option value="+6.25">+6.25</option>
                                                                                    <option value="+6.50">+6.50</option>
                                                                                    <option value="+6.75">+6.75</option>
                                                                                    <option value="+7.00">+7.00</option>
                                                                                    <option value="+7.25">+7.25</option>
                                                                                    <option value="+7.50">+7.50</option>
                                                                                    <option value="+7.75">+7.75</option>
                                                                                    <option value="+8.00">+8.00</option>
                                                                                    <option value="+8.25">+8.25</option>
                                                                                    <option value="+8.50">+8.50</option>
                                                                                    <option value="+8.75">+8.75</option>
                                                                                    <option value="+9.00">+9.00</option>
                                                                                    <option value="+9.25">+9.25</option>
                                                                                    <option value="+9.50">+9.50</option>
                                                                                    <option value="+9.75">+9.75</option>
                                                                                    <option value="+10.00">+10.00
                                                                                    </option>
                                                                                    <option value="+10.25">+10.25
                                                                                    </option>
                                                                                    <option value="+10.50">+10.50
                                                                                    </option>
                                                                                    <option value="+10.75">+10.75
                                                                                    </option>
                                                                                    <option value="+11.00">+11.00
                                                                                    </option>
                                                                                    <option value="+11.25">+11.25
                                                                                    </option>
                                                                                    <option value="+11.50">+11.50
                                                                                    </option>
                                                                                    <option value="+11.75">+11.75
                                                                                    </option>
                                                                                    <option value="+12.00">+12.00
                                                                                    </option>
                                                                                    <option value="+12.25">+12.25
                                                                                    </option>
                                                                                    <option value="+12.50">+12.50
                                                                                    </option>
                                                                                    <option value="+12.75">+12.75
                                                                                    </option>
                                                                                    <option value="+13.00">+13.00
                                                                                    </option>
                                                                                    <option value="+13.25">+13.25
                                                                                    </option>
                                                                                    <option value="+13.50">+13.50
                                                                                    </option>
                                                                                    <option value="+13.75">+13.75
                                                                                    </option>
                                                                                    <option value="+14.00">+14.00
                                                                                    </option>
                                                                                    <option value="+14.25">+14.25
                                                                                    </option>
                                                                                    <option value="+14.50">+14.50
                                                                                    </option>
                                                                                    <option value="+14.75">+14.75
                                                                                    </option>
                                                                                    <option value="+15.00">+15.00
                                                                                    </option>
                                                                                    <option value="+15.25">+15.25
                                                                                    </option>
                                                                                    <option value="+15.50">+15.50
                                                                                    </option>
                                                                                    <option value="+15.75">+15.75
                                                                                    </option>
                                                                                    <option value="+16.00">+16.00
                                                                                    </option>
                                                                                    <option value="+16.25">+16.25
                                                                                    </option>
                                                                                    <option value="+16.50">+16.50
                                                                                    </option>
                                                                                    <option value="+16.75">+16.75
                                                                                    </option>
                                                                                    <option value="+17.00">+17.00
                                                                                    </option>
                                                                                    <option value="+17.25">+17.25
                                                                                    </option>
                                                                                    <option value="+17.50">+17.50
                                                                                    </option>
                                                                                    <option value="+17.75">+17.75
                                                                                    </option>
                                                                                    <option value="+18.00">+18.00
                                                                                    </option>
                                                                                    <option value="+18.25">+18.25
                                                                                    </option>
                                                                                    <option value="+18.50">+18.50
                                                                                    </option>
                                                                                    <option value="+18.75">+18.75
                                                                                    </option>
                                                                                    <option value="+19.00">+19.00
                                                                                    </option>
                                                                                    <option value="+19.25">+19.25
                                                                                    </option>
                                                                                    <option value="+19.50">+19.50
                                                                                    </option>
                                                                                    <option value="+19.75">+19.75
                                                                                    </option>
                                                                                    <option value="+20.00">+20.00
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_left_cyl"
                                                                                class="form-control text-center">
                                                                                <option value="-6.00">-6.00</option>
                                                                                <option value="-5.75">-5.75</option>
                                                                                <option value="-5.50">-5.50</option>
                                                                                <option value="-5.25">-5.25</option>
                                                                                <option value="-5.00">-5.00</option>
                                                                                <option value="-4.75">-4.75</option>
                                                                                <option value="-4.50">-4.50</option>
                                                                                <option value="-4.25">-4.25</option>
                                                                                <option value="-4.00">-4.00</option>
                                                                                <option value="-3.75">-3.75</option>
                                                                                <option value="-3.50">-3.50</option>
                                                                                <option value="-3.25">-3.25</option>
                                                                                <option value="-3.00">-3.00</option>
                                                                                <option value="-2.75">-2.75</option>
                                                                                <option value="-2.50">-2.50</option>
                                                                                <option value="-2.25">-2.25</option>
                                                                                <option value="-2.00">-2.00</option>
                                                                                <option value="-1.75">-1.75</option>
                                                                                <option value="-1.50">-1.50</option>
                                                                                <option value="-1.25">-1.25</option>
                                                                                <option value="-1.00">-1.00</option>
                                                                                <option value="-0.75">-0.75</option>
                                                                                <option value="-0.50">-0.50</option>
                                                                                <option value="-0.25">-0.25</option>
                                                                                <option value="0.00" selected>0.00
                                                                                </option>
                                                                                <option value="SPH/DS">SPH/DS</option>
                                                                                <option value="+0.25">+0.25</option>
                                                                                <option value="+0.50">+0.50</option>
                                                                                <option value="+0.75">+0.75</option>
                                                                                <option value="+1.00">+1.00</option>
                                                                                <option value="+1.25">+1.25</option>
                                                                                <option value="+1.50">+1.50</option>
                                                                                <option value="+1.75">+1.75</option>
                                                                                <option value="+2.00">+2.00</option>
                                                                                <option value="+2.25">+2.25</option>
                                                                                <option value="+2.50">+2.50</option>
                                                                                <option value="+2.75">+2.75</option>
                                                                                <option value="+3.00">+3.00</option>
                                                                                <option value="+3.25">+3.25</option>
                                                                                <option value="+3.50">+3.50</option>
                                                                                <option value="+3.75">+3.75</option>
                                                                                <option value="+4.00">+4.00</option>
                                                                                <option value="+4.25">+4.25</option>
                                                                                <option value="+4.50">+4.50</option>
                                                                                <option value="+4.75">+4.75</option>
                                                                                <option value="+5.00">+5.00</option>
                                                                                <option value="+5.25">+5.25</option>
                                                                                <option value="+5.50">+5.50</option>
                                                                                <option value="+5.75">+5.75</option>
                                                                                <option value="+6.00">+6.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_left_axis"
                                                                                class="form-control text-center">
                                                                                <option value="" selected>None</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>
                                                                                <option value="10">10</option>
                                                                                <option value="11">11</option>
                                                                                <option value="12">12</option>
                                                                                <option value="13">13</option>
                                                                                <option value="14">14</option>
                                                                                <option value="15">15</option>
                                                                                <option value="16">16</option>
                                                                                <option value="17">17</option>
                                                                                <option value="18">18</option>
                                                                                <option value="19">19</option>
                                                                                <option value="20">20</option>
                                                                                <option value="21">21</option>
                                                                                <option value="22">22</option>
                                                                                <option value="23">23</option>
                                                                                <option value="24">24</option>
                                                                                <option value="25">25</option>
                                                                                <option value="26">26</option>
                                                                                <option value="27">27</option>
                                                                                <option value="28">28</option>
                                                                                <option value="29">29</option>
                                                                                <option value="30">30</option>
                                                                                <option value="31">31</option>
                                                                                <option value="32">32</option>
                                                                                <option value="33">33</option>
                                                                                <option value="34">34</option>
                                                                                <option value="35">35</option>
                                                                                <option value="36">36</option>
                                                                                <option value="37">37</option>
                                                                                <option value="38">38</option>
                                                                                <option value="39">39</option>
                                                                                <option value="40">40</option>
                                                                                <option value="41">41</option>
                                                                                <option value="42">42</option>
                                                                                <option value="43">43</option>
                                                                                <option value="44">44</option>
                                                                                <option value="45">45</option>
                                                                                <option value="46">46</option>
                                                                                <option value="47">47</option>
                                                                                <option value="48">48</option>
                                                                                <option value="49">49</option>
                                                                                <option value="50">50</option>
                                                                                <option value="51">51</option>
                                                                                <option value="52">52</option>
                                                                                <option value="53">53</option>
                                                                                <option value="54">54</option>
                                                                                <option value="55">55</option>
                                                                                <option value="56">56</option>
                                                                                <option value="57">57</option>
                                                                                <option value="58">58</option>
                                                                                <option value="59">59</option>
                                                                                <option value="60">60</option>
                                                                                <option value="61">61</option>
                                                                                <option value="62">62</option>
                                                                                <option value="63">63</option>
                                                                                <option value="64">64</option>
                                                                                <option value="65">65</option>
                                                                                <option value="66">66</option>
                                                                                <option value="67">67</option>
                                                                                <option value="68">68</option>
                                                                                <option value="69">69</option>
                                                                                <option value="70">70</option>
                                                                                <option value="71">71</option>
                                                                                <option value="72">72</option>
                                                                                <option value="73">73</option>
                                                                                <option value="74">74</option>
                                                                                <option value="75">75</option>
                                                                                <option value="76">76</option>
                                                                                <option value="77">77</option>
                                                                                <option value="78">78</option>
                                                                                <option value="79">79</option>
                                                                                <option value="80">80</option>
                                                                                <option value="81">81</option>
                                                                                <option value="82">82</option>
                                                                                <option value="83">83</option>
                                                                                <option value="84">84</option>
                                                                                <option value="85">85</option>
                                                                                <option value="86">86</option>
                                                                                <option value="87">87</option>
                                                                                <option value="88">88</option>
                                                                                <option value="89">89</option>
                                                                                <option value="90">90</option>
                                                                                <option value="91">91</option>
                                                                                <option value="92">92</option>
                                                                                <option value="93">93</option>
                                                                                <option value="94">94</option>
                                                                                <option value="95">95</option>
                                                                                <option value="96">96</option>
                                                                                <option value="97">97</option>
                                                                                <option value="98">98</option>
                                                                                <option value="99">99</option>
                                                                                <option value="100">100</option>
                                                                                <option value="101">101</option>
                                                                                <option value="102">102</option>
                                                                                <option value="103">103</option>
                                                                                <option value="104">104</option>
                                                                                <option value="105">105</option>
                                                                                <option value="106">106</option>
                                                                                <option value="107">107</option>
                                                                                <option value="108">108</option>
                                                                                <option value="109">109</option>
                                                                                <option value="110">110</option>
                                                                                <option value="111">111</option>
                                                                                <option value="112">112</option>
                                                                                <option value="113">113</option>
                                                                                <option value="114">114</option>
                                                                                <option value="115">115</option>
                                                                                <option value="116">116</option>
                                                                                <option value="117">117</option>
                                                                                <option value="118">118</option>
                                                                                <option value="119">119</option>
                                                                                <option value="120">120</option>
                                                                                <option value="121">121</option>
                                                                                <option value="122">122</option>
                                                                                <option value="123">123</option>
                                                                                <option value="124">124</option>
                                                                                <option value="125">125</option>
                                                                                <option value="126">126</option>
                                                                                <option value="127">127</option>
                                                                                <option value="128">128</option>
                                                                                <option value="129">129</option>
                                                                                <option value="130">130</option>
                                                                                <option value="131">131</option>
                                                                                <option value="132">132</option>
                                                                                <option value="133">133</option>
                                                                                <option value="134">134</option>
                                                                                <option value="135">135</option>
                                                                                <option value="136">136</option>
                                                                                <option value="137">137</option>
                                                                                <option value="138">138</option>
                                                                                <option value="139">139</option>
                                                                                <option value="140">140</option>
                                                                                <option value="141">141</option>
                                                                                <option value="142">142</option>
                                                                                <option value="143">143</option>
                                                                                <option value="144">144</option>
                                                                                <option value="145">145</option>
                                                                                <option value="146">146</option>
                                                                                <option value="147">147</option>
                                                                                <option value="148">148</option>
                                                                                <option value="149">149</option>
                                                                                <option value="150">150</option>
                                                                                <option value="151">151</option>
                                                                                <option value="152">152</option>
                                                                                <option value="153">153</option>
                                                                                <option value="154">154</option>
                                                                                <option value="155">155</option>
                                                                                <option value="156">156</option>
                                                                                <option value="157">157</option>
                                                                                <option value="158">158</option>
                                                                                <option value="159">159</option>
                                                                                <option value="160">160</option>
                                                                                <option value="161">161</option>
                                                                                <option value="162">162</option>
                                                                                <option value="163">163</option>
                                                                                <option value="164">164</option>
                                                                                <option value="165">165</option>
                                                                                <option value="166">166</option>
                                                                                <option value="167">167</option>
                                                                                <option value="168">168</option>
                                                                                <option value="169">169</option>
                                                                                <option value="170">170</option>
                                                                                <option value="171">171</option>
                                                                                <option value="172">172</option>
                                                                                <option value="173">173</option>
                                                                                <option value="174">174</option>
                                                                                <option value="175">175</option>
                                                                                <option value="176">176</option>
                                                                                <option value="177">177</option>
                                                                                <option value="178">178</option>
                                                                                <option value="179">179</option>
                                                                                <option value="180">180</option>

                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>PD</td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id=""
                                                                                class="form-control text-center">
                                                                                <option value="0.00">0.00</option>
                                                                                <option value="54.00">54.00</option>
                                                                                <option value="54.50">54.50</option>
                                                                                <option value="55.00">55.00</option>
                                                                                <option value="55.50">55.50</option>
                                                                                <option value="56.00">56.00</option>
                                                                                <option value="56.50">56.50</option>
                                                                                <option value="57.00">57.00</option>
                                                                                <option value="57.50">57.50</option>
                                                                                <option value="58.00">58.00</option>
                                                                                <option value="58.50">58.50</option>
                                                                                <option value="59.00">59.00</option>
                                                                                <option value="59.50">59.50</option>
                                                                                <option value="60.00">60.00</option>
                                                                                <option value="60.50">60.50</option>
                                                                                <option value="61.00">61.00</option>
                                                                                <option value="61.50">61.50</option>
                                                                                <option value="62.00">62.00</option>
                                                                                <option value="62.50">62.50</option>
                                                                                <option value="63.00">63.00</option>
                                                                                <option value="63.50">63.50</option>
                                                                                <option value="64.00">64.00</option>
                                                                                <option value="64.50">64.50</option>
                                                                                <option value="65.00">65.00</option>
                                                                                <option value="65.50">65.50</option>
                                                                                <option value="66.00">66.00</option>
                                                                                <option value="66.50">66.50</option>
                                                                                <option value="67.00">67.00</option>
                                                                                <option value="67.50">67.50</option>
                                                                                <option value="68.00">68.00</option>
                                                                                <option value="68.50">68.50</option>
                                                                                <option value="69.00">69.00</option>
                                                                                <option value="69.50">69.50</option>
                                                                                <option value="70.00">70.00</option>
                                                                                <option value="70.50">70.50</option>
                                                                                <option value="71.00">71.00</option>
                                                                                <option value="71.50">71.50</option>
                                                                                <option value="72.00">72.00</option>
                                                                                <option value="72.50">72.50</option>
                                                                                <option value="73.00">73.00</option>
                                                                                <option value="73.50">73.50</option>
                                                                                <option value="74.00">74.00</option>
                                                                                <option value="74.50">74.50</option>
                                                                                <option value="75.00">75.00</option>
                                                                                <option value="75.50">75.50</option>
                                                                                <option value="76.00">76.00</option>
                                                                                <option value="76.50">76.50</option>
                                                                                <option value="77.00">77.00</option>
                                                                                <option value="77.50">77.50</option>
                                                                                <option value="78.00">78.00</option>

                                                                            </select>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lens-type-container d-none" id="progressive">
                                                <i id="progressive_back" class="fa-solid fa-arrow-left"
                                                    style="position: absolute; left: 0; top: 35px; font-size: 22px; cursor: pointer"></i>
                                                <div
                                                    style="display: flex; justify-content: space-between; width: 50%; max-width: 600px; align-items: center; position: relative; margin-top: 5%; margin-left: 26%;">

                                                    <!-- Connecting Line -->
                                                    <div
                                                        style="position: absolute; top: 12%; left: 15%; width: 70%; height: 5.3%; background-color: #ccc; z-index: 0;">
                                                    </div>

                                                    <!-- Step 1 (Active) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid orange; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div
                                                            style="margin-top: 10px; font-size: 1.2vw; color: #000; font-weight: normal;">
                                                            Prescription</div>
                                                    </div>

                                                    <!-- Step 2 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Lenses</div>
                                                    </div>

                                                    <!-- Step 3 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Coating</div>
                                                    </div>

                                                </div>

                                                <p class="title">Enter your prescription </p>
                                                <div class="box p-48" style="background-color: white">
                                                    <div class="prescription-container">
                                                        <div class="info-box">
                                                            <table class="table lens_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="text-center">SPH</th>
                                                                        <th class="text-center">CYL</th>
                                                                        <th class="text-center">AXIS</th>
                                                                        <th class="text-center">ADD</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>OD-Right</td>
                                                                        <td class="text-center px-24">
                                                                            <div class="custom-select-wrapper">
                                                                                <select name="" id="od_right_sph"
                                                                                    class="form-control text-center custom-select">
                                                                                    <option value="-20.00">-20.00
                                                                                    </option>
                                                                                    <option value="-19.75">-19.75
                                                                                    </option>
                                                                                    <option value="-19.50">-19.50
                                                                                    </option>
                                                                                    <option value="-19.25">-19.25
                                                                                    </option>
                                                                                    <option value="-19.00">-19.00
                                                                                    </option>
                                                                                    <option value="-18.75">-18.75
                                                                                    </option>
                                                                                    <option value="-18.50">-18.50
                                                                                    </option>
                                                                                    <option value="-18.25">-18.25
                                                                                    </option>
                                                                                    <option value="-18.00">-18.00
                                                                                    </option>
                                                                                    <option value="-17.75">-17.75
                                                                                    </option>
                                                                                    <option value="-17.50">-17.50
                                                                                    </option>
                                                                                    <option value="-17.25">-17.25
                                                                                    </option>
                                                                                    <option value="-17.00">-17.00
                                                                                    </option>
                                                                                    <option value="-16.75">-16.75
                                                                                    </option>
                                                                                    <option value="-16.50">-16.50
                                                                                    </option>
                                                                                    <option value="-16.25">-16.25
                                                                                    </option>
                                                                                    <option value="-16.00">-16.00
                                                                                    </option>
                                                                                    <option value="-15.75">-15.75
                                                                                    </option>
                                                                                    <option value="-15.50">-15.50
                                                                                    </option>
                                                                                    <option value="-15.25">-15.25
                                                                                    </option>
                                                                                    <option value="-15.00">-15.00
                                                                                    </option>
                                                                                    <option value="-14.75">-14.75
                                                                                    </option>
                                                                                    <option value="-14.50">-14.50
                                                                                    </option>
                                                                                    <option value="-14.25">-14.25
                                                                                    </option>
                                                                                    <option value="-14.00">-14.00
                                                                                    </option>
                                                                                    <option value="-13.75">-13.75
                                                                                    </option>
                                                                                    <option value="-13.50">-13.50
                                                                                    </option>
                                                                                    <option value="-13.25">-13.25
                                                                                    </option>
                                                                                    <option value="-13.00">-13.00
                                                                                    </option>
                                                                                    <option value="-12.75">-12.75
                                                                                    </option>
                                                                                    <option value="-12.50">-12.50
                                                                                    </option>
                                                                                    <option value="-12.25">-12.25
                                                                                    </option>
                                                                                    <option value="-12.00">-12.00
                                                                                    </option>
                                                                                    <option value="-11.75">-11.75
                                                                                    </option>
                                                                                    <option value="-11.50">-11.50
                                                                                    </option>
                                                                                    <option value="-11.25">-11.25
                                                                                    </option>
                                                                                    <option value="-11.00">-11.00
                                                                                    </option>
                                                                                    <option value="-10.75">-10.75
                                                                                    </option>
                                                                                    <option value="-10.50">-10.50
                                                                                    </option>
                                                                                    <option value="-10.25">-10.25
                                                                                    </option>
                                                                                    <option value="-10.00">-10.00
                                                                                    </option>
                                                                                    <option value="-9.75">-9.75</option>
                                                                                    <option value="-9.50">-9.50</option>
                                                                                    <option value="-9.25">-9.25</option>
                                                                                    <option value="-9.00">-9.00</option>
                                                                                    <option value="-8.75">-8.75</option>
                                                                                    <option value="-8.50">-8.50</option>
                                                                                    <option value="-8.25">-8.25</option>
                                                                                    <option value="-8.00">-8.00</option>
                                                                                    <option value="-7.75">-7.75</option>
                                                                                    <option value="-7.50">-7.50</option>
                                                                                    <option value="-7.25">-7.25</option>
                                                                                    <option value="-7.00">-7.00</option>
                                                                                    <option value="-6.75">-6.75</option>
                                                                                    <option value="-6.50">-6.50</option>
                                                                                    <option value="-6.25">-6.25</option>
                                                                                    <option value="-6.00">-6.00</option>
                                                                                    <option value="-5.75">-5.75</option>
                                                                                    <option value="-5.50">-5.50</option>
                                                                                    <option value="-5.25">-5.25</option>
                                                                                    <option value="-5.00">-5.00</option>
                                                                                    <option value="-4.75">-4.75</option>
                                                                                    <option value="-4.50">-4.50</option>
                                                                                    <option value="-4.25">-4.25</option>
                                                                                    <option value="-4.00">-4.00</option>
                                                                                    <option value="-3.75">-3.75</option>
                                                                                    <option value="-3.50">-3.50</option>
                                                                                    <option value="-3.25">-3.25</option>
                                                                                    <option value="-3.00">-3.00</option>
                                                                                    <option value="-2.75">-2.75</option>
                                                                                    <option value="-2.50">-2.50</option>
                                                                                    <option value="-2.25">-2.25</option>
                                                                                    <option value="-2.00">-2.00</option>
                                                                                    <option value="-1.75">-1.75</option>
                                                                                    <option value="-1.50">-1.50</option>
                                                                                    <option value="-1.25">-1.25</option>
                                                                                    <option value="-1.00">-1.00</option>
                                                                                    <option value="-0.75">-0.75</option>
                                                                                    <option value="-0.50">-0.50</option>
                                                                                    <option value="-0.25">-0.25</option>
                                                                                    <option value="0.00" selected>0.00
                                                                                    </option>
                                                                                    <option value="PL">PL</option>
                                                                                    <option value="+0.25">+0.25</option>
                                                                                    <option value="+0.50">+0.50</option>
                                                                                    <option value="+0.75">+0.75</option>
                                                                                    <option value="+1.00">+1.00</option>
                                                                                    <option value="+1.25">+1.25</option>
                                                                                    <option value="+1.50">+1.50</option>
                                                                                    <option value="+1.75">+1.75</option>
                                                                                    <option value="+2.00">+2.00</option>
                                                                                    <option value="+2.25">+2.25</option>
                                                                                    <option value="+2.50">+2.50</option>
                                                                                    <option value="+2.75">+2.75</option>
                                                                                    <option value="+3.00">+3.00</option>
                                                                                    <option value="+3.25">+3.25</option>
                                                                                    <option value="+3.50">+3.50</option>
                                                                                    <option value="+3.75">+3.75</option>
                                                                                    <option value="+4.00">+4.00</option>
                                                                                    <option value="+4.25">+4.25</option>
                                                                                    <option value="+4.50">+4.50</option>
                                                                                    <option value="+4.75">+4.75</option>
                                                                                    <option value="+5.00">+5.00</option>
                                                                                    <option value="+5.25">+5.25</option>
                                                                                    <option value="+5.50">+5.50</option>
                                                                                    <option value="+5.75">+5.75</option>
                                                                                    <option value="+6.00">+6.00</option>
                                                                                    <option value="+6.25">+6.25</option>
                                                                                    <option value="+6.50">+6.50</option>
                                                                                    <option value="+6.75">+6.75</option>
                                                                                    <option value="+7.00">+7.00</option>
                                                                                    <option value="+7.25">+7.25</option>
                                                                                    <option value="+7.50">+7.50</option>
                                                                                    <option value="+7.75">+7.75</option>
                                                                                    <option value="+8.00">+8.00</option>
                                                                                    <option value="+8.25">+8.25</option>
                                                                                    <option value="+8.50">+8.50</option>
                                                                                    <option value="+8.75">+8.75</option>
                                                                                    <option value="+9.00">+9.00</option>
                                                                                    <option value="+9.25">+9.25</option>
                                                                                    <option value="+9.50">+9.50</option>
                                                                                    <option value="+9.75">+9.75</option>
                                                                                    <option value="+10.00">+10.00
                                                                                    </option>
                                                                                    <option value="+10.25">+10.25
                                                                                    </option>
                                                                                    <option value="+10.50">+10.50
                                                                                    </option>
                                                                                    <option value="+10.75">+10.75
                                                                                    </option>
                                                                                    <option value="+11.00">+11.00
                                                                                    </option>
                                                                                    <option value="+11.25">+11.25
                                                                                    </option>
                                                                                    <option value="+11.50">+11.50
                                                                                    </option>
                                                                                    <option value="+11.75">+11.75
                                                                                    </option>
                                                                                    <option value="+12.00">+12.00
                                                                                    </option>
                                                                                    <option value="+12.25">+12.25
                                                                                    </option>
                                                                                    <option value="+12.50">+12.50
                                                                                    </option>
                                                                                    <option value="+12.75">+12.75
                                                                                    </option>
                                                                                    <option value="+13.00">+13.00
                                                                                    </option>
                                                                                    <option value="+13.25">+13.25
                                                                                    </option>
                                                                                    <option value="+13.50">+13.50
                                                                                    </option>
                                                                                    <option value="+13.75">+13.75
                                                                                    </option>
                                                                                    <option value="+14.00">+14.00
                                                                                    </option>
                                                                                    <option value="+14.25">+14.25
                                                                                    </option>
                                                                                    <option value="+14.50">+14.50
                                                                                    </option>
                                                                                    <option value="+14.75">+14.75
                                                                                    </option>
                                                                                    <option value="+15.00">+15.00
                                                                                    </option>
                                                                                    <option value="+15.25">+15.25
                                                                                    </option>
                                                                                    <option value="+15.50">+15.50
                                                                                    </option>
                                                                                    <option value="+15.75">+15.75
                                                                                    </option>
                                                                                    <option value="+16.00">+16.00
                                                                                    </option>
                                                                                    <option value="+16.25">+16.25
                                                                                    </option>
                                                                                    <option value="+16.50">+16.50
                                                                                    </option>
                                                                                    <option value="+16.75">+16.75
                                                                                    </option>
                                                                                    <option value="+17.00">+17.00
                                                                                    </option>
                                                                                    <option value="+17.25">+17.25
                                                                                    </option>
                                                                                    <option value="+17.50">+17.50
                                                                                    </option>
                                                                                    <option value="+17.75">+17.75
                                                                                    </option>
                                                                                    <option value="+18.00">+18.00
                                                                                    </option>
                                                                                    <option value="+18.25">+18.25
                                                                                    </option>
                                                                                    <option value="+18.50">+18.50
                                                                                    </option>
                                                                                    <option value="+18.75">+18.75
                                                                                    </option>
                                                                                    <option value="+19.00">+19.00
                                                                                    </option>
                                                                                    <option value="+19.25">+19.25
                                                                                    </option>
                                                                                    <option value="+19.50">+19.50
                                                                                    </option>
                                                                                    <option value="+19.75">+19.75
                                                                                    </option>
                                                                                    <option value="+20.00">+20.00
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_right_cyl"
                                                                                class="form-control text-center">
                                                                                <option value="-6.00">-6.00</option>
                                                                                <option value="-5.75">-5.75</option>
                                                                                <option value="-5.50">-5.50</option>
                                                                                <option value="-5.25">-5.25</option>
                                                                                <option value="-5.00">-5.00</option>
                                                                                <option value="-4.75">-4.75</option>
                                                                                <option value="-4.50">-4.50</option>
                                                                                <option value="-4.25">-4.25</option>
                                                                                <option value="-4.00">-4.00</option>
                                                                                <option value="-3.75">-3.75</option>
                                                                                <option value="-3.50">-3.50</option>
                                                                                <option value="-3.25">-3.25</option>
                                                                                <option value="-3.00">-3.00</option>
                                                                                <option value="-2.75">-2.75</option>
                                                                                <option value="-2.50">-2.50</option>
                                                                                <option value="-2.25">-2.25</option>
                                                                                <option value="-2.00">-2.00</option>
                                                                                <option value="-1.75">-1.75</option>
                                                                                <option value="-1.50">-1.50</option>
                                                                                <option value="-1.25">-1.25</option>
                                                                                <option value="-1.00">-1.00</option>
                                                                                <option value="-0.75">-0.75</option>
                                                                                <option value="-0.50">-0.50</option>
                                                                                <option value="-0.25">-0.25</option>
                                                                                <option value="0.00" selected>0.00
                                                                                </option>
                                                                                <option value="SPH/DS">SPH/DS</option>
                                                                                <option value="+0.25">+0.25</option>
                                                                                <option value="+0.50">+0.50</option>
                                                                                <option value="+0.75">+0.75</option>
                                                                                <option value="+1.00">+1.00</option>
                                                                                <option value="+1.25">+1.25</option>
                                                                                <option value="+1.50">+1.50</option>
                                                                                <option value="+1.75">+1.75</option>
                                                                                <option value="+2.00">+2.00</option>
                                                                                <option value="+2.25">+2.25</option>
                                                                                <option value="+2.50">+2.50</option>
                                                                                <option value="+2.75">+2.75</option>
                                                                                <option value="+3.00">+3.00</option>
                                                                                <option value="+3.25">+3.25</option>
                                                                                <option value="+3.50">+3.50</option>
                                                                                <option value="+3.75">+3.75</option>
                                                                                <option value="+4.00">+4.00</option>
                                                                                <option value="+4.25">+4.25</option>
                                                                                <option value="+4.50">+4.50</option>
                                                                                <option value="+4.75">+4.75</option>
                                                                                <option value="+5.00">+5.00</option>
                                                                                <option value="+5.25">+5.25</option>
                                                                                <option value="+5.50">+5.50</option>
                                                                                <option value="+5.75">+5.75</option>
                                                                                <option value="+6.00">+6.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_right_axis"
                                                                                class="form-control text-center">
                                                                                <option value="" selected>None</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>
                                                                                <option value="10">10</option>
                                                                                <option value="11">11</option>
                                                                                <option value="12">12</option>
                                                                                <option value="13">13</option>
                                                                                <option value="14">14</option>
                                                                                <option value="15">15</option>
                                                                                <option value="16">16</option>
                                                                                <option value="17">17</option>
                                                                                <option value="18">18</option>
                                                                                <option value="19">19</option>
                                                                                <option value="20">20</option>
                                                                                <option value="21">21</option>
                                                                                <option value="22">22</option>
                                                                                <option value="23">23</option>
                                                                                <option value="24">24</option>
                                                                                <option value="25">25</option>
                                                                                <option value="26">26</option>
                                                                                <option value="27">27</option>
                                                                                <option value="28">28</option>
                                                                                <option value="29">29</option>
                                                                                <option value="30">30</option>
                                                                                <option value="31">31</option>
                                                                                <option value="32">32</option>
                                                                                <option value="33">33</option>
                                                                                <option value="34">34</option>
                                                                                <option value="35">35</option>
                                                                                <option value="36">36</option>
                                                                                <option value="37">37</option>
                                                                                <option value="38">38</option>
                                                                                <option value="39">39</option>
                                                                                <option value="40">40</option>
                                                                                <option value="41">41</option>
                                                                                <option value="42">42</option>
                                                                                <option value="43">43</option>
                                                                                <option value="44">44</option>
                                                                                <option value="45">45</option>
                                                                                <option value="46">46</option>
                                                                                <option value="47">47</option>
                                                                                <option value="48">48</option>
                                                                                <option value="49">49</option>
                                                                                <option value="50">50</option>
                                                                                <option value="51">51</option>
                                                                                <option value="52">52</option>
                                                                                <option value="53">53</option>
                                                                                <option value="54">54</option>
                                                                                <option value="55">55</option>
                                                                                <option value="56">56</option>
                                                                                <option value="57">57</option>
                                                                                <option value="58">58</option>
                                                                                <option value="59">59</option>
                                                                                <option value="60">60</option>
                                                                                <option value="61">61</option>
                                                                                <option value="62">62</option>
                                                                                <option value="63">63</option>
                                                                                <option value="64">64</option>
                                                                                <option value="65">65</option>
                                                                                <option value="66">66</option>
                                                                                <option value="67">67</option>
                                                                                <option value="68">68</option>
                                                                                <option value="69">69</option>
                                                                                <option value="70">70</option>
                                                                                <option value="71">71</option>
                                                                                <option value="72">72</option>
                                                                                <option value="73">73</option>
                                                                                <option value="74">74</option>
                                                                                <option value="75">75</option>
                                                                                <option value="76">76</option>
                                                                                <option value="77">77</option>
                                                                                <option value="78">78</option>
                                                                                <option value="79">79</option>
                                                                                <option value="80">80</option>
                                                                                <option value="81">81</option>
                                                                                <option value="82">82</option>
                                                                                <option value="83">83</option>
                                                                                <option value="84">84</option>
                                                                                <option value="85">85</option>
                                                                                <option value="86">86</option>
                                                                                <option value="87">87</option>
                                                                                <option value="88">88</option>
                                                                                <option value="89">89</option>
                                                                                <option value="90">90</option>
                                                                                <option value="91">91</option>
                                                                                <option value="92">92</option>
                                                                                <option value="93">93</option>
                                                                                <option value="94">94</option>
                                                                                <option value="95">95</option>
                                                                                <option value="96">96</option>
                                                                                <option value="97">97</option>
                                                                                <option value="98">98</option>
                                                                                <option value="99">99</option>
                                                                                <option value="100">100</option>
                                                                                <option value="101">101</option>
                                                                                <option value="102">102</option>
                                                                                <option value="103">103</option>
                                                                                <option value="104">104</option>
                                                                                <option value="105">105</option>
                                                                                <option value="106">106</option>
                                                                                <option value="107">107</option>
                                                                                <option value="108">108</option>
                                                                                <option value="109">109</option>
                                                                                <option value="110">110</option>
                                                                                <option value="111">111</option>
                                                                                <option value="112">112</option>
                                                                                <option value="113">113</option>
                                                                                <option value="114">114</option>
                                                                                <option value="115">115</option>
                                                                                <option value="116">116</option>
                                                                                <option value="117">117</option>
                                                                                <option value="118">118</option>
                                                                                <option value="119">119</option>
                                                                                <option value="120">120</option>
                                                                                <option value="121">121</option>
                                                                                <option value="122">122</option>
                                                                                <option value="123">123</option>
                                                                                <option value="124">124</option>
                                                                                <option value="125">125</option>
                                                                                <option value="126">126</option>
                                                                                <option value="127">127</option>
                                                                                <option value="128">128</option>
                                                                                <option value="129">129</option>
                                                                                <option value="130">130</option>
                                                                                <option value="131">131</option>
                                                                                <option value="132">132</option>
                                                                                <option value="133">133</option>
                                                                                <option value="134">134</option>
                                                                                <option value="135">135</option>
                                                                                <option value="136">136</option>
                                                                                <option value="137">137</option>
                                                                                <option value="138">138</option>
                                                                                <option value="139">139</option>
                                                                                <option value="140">140</option>
                                                                                <option value="141">141</option>
                                                                                <option value="142">142</option>
                                                                                <option value="143">143</option>
                                                                                <option value="144">144</option>
                                                                                <option value="145">145</option>
                                                                                <option value="146">146</option>
                                                                                <option value="147">147</option>
                                                                                <option value="148">148</option>
                                                                                <option value="149">149</option>
                                                                                <option value="150">150</option>
                                                                                <option value="151">151</option>
                                                                                <option value="152">152</option>
                                                                                <option value="153">153</option>
                                                                                <option value="154">154</option>
                                                                                <option value="155">155</option>
                                                                                <option value="156">156</option>
                                                                                <option value="157">157</option>
                                                                                <option value="158">158</option>
                                                                                <option value="159">159</option>
                                                                                <option value="160">160</option>
                                                                                <option value="161">161</option>
                                                                                <option value="162">162</option>
                                                                                <option value="163">163</option>
                                                                                <option value="164">164</option>
                                                                                <option value="165">165</option>
                                                                                <option value="166">166</option>
                                                                                <option value="167">167</option>
                                                                                <option value="168">168</option>
                                                                                <option value="169">169</option>
                                                                                <option value="170">170</option>
                                                                                <option value="171">171</option>
                                                                                <option value="172">172</option>
                                                                                <option value="173">173</option>
                                                                                <option value="174">174</option>
                                                                                <option value="175">175</option>
                                                                                <option value="176">176</option>
                                                                                <option value="177">177</option>
                                                                                <option value="178">178</option>
                                                                                <option value="179">179</option>
                                                                                <option value="180">180</option>

                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_right_add"
                                                                                class="form-control text-center">
                                                                                <option value="0.00" selected>0.00
                                                                                </option>
                                                                                <option value="+0.50">+0.50</option>
                                                                                <option value="+0.75">+0.75</option>
                                                                                <option value="+1.00">+1.00</option>
                                                                                <option value="+1.25">+1.25</option>
                                                                                <option value="+1.50">+1.50</option>
                                                                                <option value="+1.75">+1.75</option>
                                                                                <option value="+2.00">+2.00</option>
                                                                                <option value="+2.25">+2.25</option>
                                                                                <option value="+2.50">+2.50</option>
                                                                                <option value="+2.75">+2.75</option>
                                                                                <option value="+3.00">+3.00</option>
                                                                                <option value="+3.25">+3.25</option>
                                                                                <option value="+3.50">+3.50</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OD-Left</td>
                                                                        <td class="text-center px-24">
                                                                            <div class="custom-select-wrapper">
                                                                                <select name="" id="od_left_sph"
                                                                                    class="form-control text-center custom-select">
                                                                                    <option value="-20.00">-20.00
                                                                                    </option>
                                                                                    <option value="-19.75">-19.75
                                                                                    </option>
                                                                                    <option value="-19.50">-19.50
                                                                                    </option>
                                                                                    <option value="-19.25">-19.25
                                                                                    </option>
                                                                                    <option value="-19.00">-19.00
                                                                                    </option>
                                                                                    <option value="-18.75">-18.75
                                                                                    </option>
                                                                                    <option value="-18.50">-18.50
                                                                                    </option>
                                                                                    <option value="-18.25">-18.25
                                                                                    </option>
                                                                                    <option value="-18.00">-18.00
                                                                                    </option>
                                                                                    <option value="-17.75">-17.75
                                                                                    </option>
                                                                                    <option value="-17.50">-17.50
                                                                                    </option>
                                                                                    <option value="-17.25">-17.25
                                                                                    </option>
                                                                                    <option value="-17.00">-17.00
                                                                                    </option>
                                                                                    <option value="-16.75">-16.75
                                                                                    </option>
                                                                                    <option value="-16.50">-16.50
                                                                                    </option>
                                                                                    <option value="-16.25">-16.25
                                                                                    </option>
                                                                                    <option value="-16.00">-16.00
                                                                                    </option>
                                                                                    <option value="-15.75">-15.75
                                                                                    </option>
                                                                                    <option value="-15.50">-15.50
                                                                                    </option>
                                                                                    <option value="-15.25">-15.25
                                                                                    </option>
                                                                                    <option value="-15.00">-15.00
                                                                                    </option>
                                                                                    <option value="-14.75">-14.75
                                                                                    </option>
                                                                                    <option value="-14.50">-14.50
                                                                                    </option>
                                                                                    <option value="-14.25">-14.25
                                                                                    </option>
                                                                                    <option value="-14.00">-14.00
                                                                                    </option>
                                                                                    <option value="-13.75">-13.75
                                                                                    </option>
                                                                                    <option value="-13.50">-13.50
                                                                                    </option>
                                                                                    <option value="-13.25">-13.25
                                                                                    </option>
                                                                                    <option value="-13.00">-13.00
                                                                                    </option>
                                                                                    <option value="-12.75">-12.75
                                                                                    </option>
                                                                                    <option value="-12.50">-12.50
                                                                                    </option>
                                                                                    <option value="-12.25">-12.25
                                                                                    </option>
                                                                                    <option value="-12.00">-12.00
                                                                                    </option>
                                                                                    <option value="-11.75">-11.75
                                                                                    </option>
                                                                                    <option value="-11.50">-11.50
                                                                                    </option>
                                                                                    <option value="-11.25">-11.25
                                                                                    </option>
                                                                                    <option value="-11.00">-11.00
                                                                                    </option>
                                                                                    <option value="-10.75">-10.75
                                                                                    </option>
                                                                                    <option value="-10.50">-10.50
                                                                                    </option>
                                                                                    <option value="-10.25">-10.25
                                                                                    </option>
                                                                                    <option value="-10.00">-10.00
                                                                                    </option>
                                                                                    <option value="-9.75">-9.75</option>
                                                                                    <option value="-9.50">-9.50</option>
                                                                                    <option value="-9.25">-9.25</option>
                                                                                    <option value="-9.00">-9.00</option>
                                                                                    <option value="-8.75">-8.75</option>
                                                                                    <option value="-8.50">-8.50</option>
                                                                                    <option value="-8.25">-8.25</option>
                                                                                    <option value="-8.00">-8.00</option>
                                                                                    <option value="-7.75">-7.75</option>
                                                                                    <option value="-7.50">-7.50</option>
                                                                                    <option value="-7.25">-7.25</option>
                                                                                    <option value="-7.00">-7.00</option>
                                                                                    <option value="-6.75">-6.75</option>
                                                                                    <option value="-6.50">-6.50</option>
                                                                                    <option value="-6.25">-6.25</option>
                                                                                    <option value="-6.00">-6.00</option>
                                                                                    <option value="-5.75">-5.75</option>
                                                                                    <option value="-5.50">-5.50</option>
                                                                                    <option value="-5.25">-5.25</option>
                                                                                    <option value="-5.00">-5.00</option>
                                                                                    <option value="-4.75">-4.75</option>
                                                                                    <option value="-4.50">-4.50</option>
                                                                                    <option value="-4.25">-4.25</option>
                                                                                    <option value="-4.00">-4.00</option>
                                                                                    <option value="-3.75">-3.75</option>
                                                                                    <option value="-3.50">-3.50</option>
                                                                                    <option value="-3.25">-3.25</option>
                                                                                    <option value="-3.00">-3.00</option>
                                                                                    <option value="-2.75">-2.75</option>
                                                                                    <option value="-2.50">-2.50</option>
                                                                                    <option value="-2.25">-2.25</option>
                                                                                    <option value="-2.00">-2.00</option>
                                                                                    <option value="-1.75">-1.75</option>
                                                                                    <option value="-1.50">-1.50</option>
                                                                                    <option value="-1.25">-1.25</option>
                                                                                    <option value="-1.00">-1.00</option>
                                                                                    <option value="-0.75">-0.75</option>
                                                                                    <option value="-0.50">-0.50</option>
                                                                                    <option value="-0.25">-0.25</option>
                                                                                    <option value="0.00" selected>0.00
                                                                                    </option>
                                                                                    <option value="PL">PL</option>
                                                                                    <option value="+0.25">+0.25</option>
                                                                                    <option value="+0.50">+0.50</option>
                                                                                    <option value="+0.75">+0.75</option>
                                                                                    <option value="+1.00">+1.00</option>
                                                                                    <option value="+1.25">+1.25</option>
                                                                                    <option value="+1.50">+1.50</option>
                                                                                    <option value="+1.75">+1.75</option>
                                                                                    <option value="+2.00">+2.00</option>
                                                                                    <option value="+2.25">+2.25</option>
                                                                                    <option value="+2.50">+2.50</option>
                                                                                    <option value="+2.75">+2.75</option>
                                                                                    <option value="+3.00">+3.00</option>
                                                                                    <option value="+3.25">+3.25</option>
                                                                                    <option value="+3.50">+3.50</option>
                                                                                    <option value="+3.75">+3.75</option>
                                                                                    <option value="+4.00">+4.00</option>
                                                                                    <option value="+4.25">+4.25</option>
                                                                                    <option value="+4.50">+4.50</option>
                                                                                    <option value="+4.75">+4.75</option>
                                                                                    <option value="+5.00">+5.00</option>
                                                                                    <option value="+5.25">+5.25</option>
                                                                                    <option value="+5.50">+5.50</option>
                                                                                    <option value="+5.75">+5.75</option>
                                                                                    <option value="+6.00">+6.00</option>
                                                                                    <option value="+6.25">+6.25</option>
                                                                                    <option value="+6.50">+6.50</option>
                                                                                    <option value="+6.75">+6.75</option>
                                                                                    <option value="+7.00">+7.00</option>
                                                                                    <option value="+7.25">+7.25</option>
                                                                                    <option value="+7.50">+7.50</option>
                                                                                    <option value="+7.75">+7.75</option>
                                                                                    <option value="+8.00">+8.00</option>
                                                                                    <option value="+8.25">+8.25</option>
                                                                                    <option value="+8.50">+8.50</option>
                                                                                    <option value="+8.75">+8.75</option>
                                                                                    <option value="+9.00">+9.00</option>
                                                                                    <option value="+9.25">+9.25</option>
                                                                                    <option value="+9.50">+9.50</option>
                                                                                    <option value="+9.75">+9.75</option>
                                                                                    <option value="+10.00">+10.00
                                                                                    </option>
                                                                                    <option value="+10.25">+10.25
                                                                                    </option>
                                                                                    <option value="+10.50">+10.50
                                                                                    </option>
                                                                                    <option value="+10.75">+10.75
                                                                                    </option>
                                                                                    <option value="+11.00">+11.00
                                                                                    </option>
                                                                                    <option value="+11.25">+11.25
                                                                                    </option>
                                                                                    <option value="+11.50">+11.50
                                                                                    </option>
                                                                                    <option value="+11.75">+11.75
                                                                                    </option>
                                                                                    <option value="+12.00">+12.00
                                                                                    </option>
                                                                                    <option value="+12.25">+12.25
                                                                                    </option>
                                                                                    <option value="+12.50">+12.50
                                                                                    </option>
                                                                                    <option value="+12.75">+12.75
                                                                                    </option>
                                                                                    <option value="+13.00">+13.00
                                                                                    </option>
                                                                                    <option value="+13.25">+13.25
                                                                                    </option>
                                                                                    <option value="+13.50">+13.50
                                                                                    </option>
                                                                                    <option value="+13.75">+13.75
                                                                                    </option>
                                                                                    <option value="+14.00">+14.00
                                                                                    </option>
                                                                                    <option value="+14.25">+14.25
                                                                                    </option>
                                                                                    <option value="+14.50">+14.50
                                                                                    </option>
                                                                                    <option value="+14.75">+14.75
                                                                                    </option>
                                                                                    <option value="+15.00">+15.00
                                                                                    </option>
                                                                                    <option value="+15.25">+15.25
                                                                                    </option>
                                                                                    <option value="+15.50">+15.50
                                                                                    </option>
                                                                                    <option value="+15.75">+15.75
                                                                                    </option>
                                                                                    <option value="+16.00">+16.00
                                                                                    </option>
                                                                                    <option value="+16.25">+16.25
                                                                                    </option>
                                                                                    <option value="+16.50">+16.50
                                                                                    </option>
                                                                                    <option value="+16.75">+16.75
                                                                                    </option>
                                                                                    <option value="+17.00">+17.00
                                                                                    </option>
                                                                                    <option value="+17.25">+17.25
                                                                                    </option>
                                                                                    <option value="+17.50">+17.50
                                                                                    </option>
                                                                                    <option value="+17.75">+17.75
                                                                                    </option>
                                                                                    <option value="+18.00">+18.00
                                                                                    </option>
                                                                                    <option value="+18.25">+18.25
                                                                                    </option>
                                                                                    <option value="+18.50">+18.50
                                                                                    </option>
                                                                                    <option value="+18.75">+18.75
                                                                                    </option>
                                                                                    <option value="+19.00">+19.00
                                                                                    </option>
                                                                                    <option value="+19.25">+19.25
                                                                                    </option>
                                                                                    <option value="+19.50">+19.50
                                                                                    </option>
                                                                                    <option value="+19.75">+19.75
                                                                                    </option>
                                                                                    <option value="+20.00">+20.00
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_left_cyl"
                                                                                class="form-control text-center">
                                                                                <option value="-6.00">-6.00</option>
                                                                                <option value="-5.75">-5.75</option>
                                                                                <option value="-5.50">-5.50</option>
                                                                                <option value="-5.25">-5.25</option>
                                                                                <option value="-5.00">-5.00</option>
                                                                                <option value="-4.75">-4.75</option>
                                                                                <option value="-4.50">-4.50</option>
                                                                                <option value="-4.25">-4.25</option>
                                                                                <option value="-4.00">-4.00</option>
                                                                                <option value="-3.75">-3.75</option>
                                                                                <option value="-3.50">-3.50</option>
                                                                                <option value="-3.25">-3.25</option>
                                                                                <option value="-3.00">-3.00</option>
                                                                                <option value="-2.75">-2.75</option>
                                                                                <option value="-2.50">-2.50</option>
                                                                                <option value="-2.25">-2.25</option>
                                                                                <option value="-2.00">-2.00</option>
                                                                                <option value="-1.75">-1.75</option>
                                                                                <option value="-1.50">-1.50</option>
                                                                                <option value="-1.25">-1.25</option>
                                                                                <option value="-1.00">-1.00</option>
                                                                                <option value="-0.75">-0.75</option>
                                                                                <option value="-0.50">-0.50</option>
                                                                                <option value="-0.25">-0.25</option>
                                                                                <option value="0.00" selected>0.00
                                                                                </option>
                                                                                <option value="SPH/DS">SPH/DS</option>
                                                                                <option value="+0.25">+0.25</option>
                                                                                <option value="+0.50">+0.50</option>
                                                                                <option value="+0.75">+0.75</option>
                                                                                <option value="+1.00">+1.00</option>
                                                                                <option value="+1.25">+1.25</option>
                                                                                <option value="+1.50">+1.50</option>
                                                                                <option value="+1.75">+1.75</option>
                                                                                <option value="+2.00">+2.00</option>
                                                                                <option value="+2.25">+2.25</option>
                                                                                <option value="+2.50">+2.50</option>
                                                                                <option value="+2.75">+2.75</option>
                                                                                <option value="+3.00">+3.00</option>
                                                                                <option value="+3.25">+3.25</option>
                                                                                <option value="+3.50">+3.50</option>
                                                                                <option value="+3.75">+3.75</option>
                                                                                <option value="+4.00">+4.00</option>
                                                                                <option value="+4.25">+4.25</option>
                                                                                <option value="+4.50">+4.50</option>
                                                                                <option value="+4.75">+4.75</option>
                                                                                <option value="+5.00">+5.00</option>
                                                                                <option value="+5.25">+5.25</option>
                                                                                <option value="+5.50">+5.50</option>
                                                                                <option value="+5.75">+5.75</option>
                                                                                <option value="+6.00">+6.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_left_axis"
                                                                                class="form-control text-center">
                                                                                <option value="" selected>None</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>
                                                                                <option value="10">10</option>
                                                                                <option value="11">11</option>
                                                                                <option value="12">12</option>
                                                                                <option value="13">13</option>
                                                                                <option value="14">14</option>
                                                                                <option value="15">15</option>
                                                                                <option value="16">16</option>
                                                                                <option value="17">17</option>
                                                                                <option value="18">18</option>
                                                                                <option value="19">19</option>
                                                                                <option value="20">20</option>
                                                                                <option value="21">21</option>
                                                                                <option value="22">22</option>
                                                                                <option value="23">23</option>
                                                                                <option value="24">24</option>
                                                                                <option value="25">25</option>
                                                                                <option value="26">26</option>
                                                                                <option value="27">27</option>
                                                                                <option value="28">28</option>
                                                                                <option value="29">29</option>
                                                                                <option value="30">30</option>
                                                                                <option value="31">31</option>
                                                                                <option value="32">32</option>
                                                                                <option value="33">33</option>
                                                                                <option value="34">34</option>
                                                                                <option value="35">35</option>
                                                                                <option value="36">36</option>
                                                                                <option value="37">37</option>
                                                                                <option value="38">38</option>
                                                                                <option value="39">39</option>
                                                                                <option value="40">40</option>
                                                                                <option value="41">41</option>
                                                                                <option value="42">42</option>
                                                                                <option value="43">43</option>
                                                                                <option value="44">44</option>
                                                                                <option value="45">45</option>
                                                                                <option value="46">46</option>
                                                                                <option value="47">47</option>
                                                                                <option value="48">48</option>
                                                                                <option value="49">49</option>
                                                                                <option value="50">50</option>
                                                                                <option value="51">51</option>
                                                                                <option value="52">52</option>
                                                                                <option value="53">53</option>
                                                                                <option value="54">54</option>
                                                                                <option value="55">55</option>
                                                                                <option value="56">56</option>
                                                                                <option value="57">57</option>
                                                                                <option value="58">58</option>
                                                                                <option value="59">59</option>
                                                                                <option value="60">60</option>
                                                                                <option value="61">61</option>
                                                                                <option value="62">62</option>
                                                                                <option value="63">63</option>
                                                                                <option value="64">64</option>
                                                                                <option value="65">65</option>
                                                                                <option value="66">66</option>
                                                                                <option value="67">67</option>
                                                                                <option value="68">68</option>
                                                                                <option value="69">69</option>
                                                                                <option value="70">70</option>
                                                                                <option value="71">71</option>
                                                                                <option value="72">72</option>
                                                                                <option value="73">73</option>
                                                                                <option value="74">74</option>
                                                                                <option value="75">75</option>
                                                                                <option value="76">76</option>
                                                                                <option value="77">77</option>
                                                                                <option value="78">78</option>
                                                                                <option value="79">79</option>
                                                                                <option value="80">80</option>
                                                                                <option value="81">81</option>
                                                                                <option value="82">82</option>
                                                                                <option value="83">83</option>
                                                                                <option value="84">84</option>
                                                                                <option value="85">85</option>
                                                                                <option value="86">86</option>
                                                                                <option value="87">87</option>
                                                                                <option value="88">88</option>
                                                                                <option value="89">89</option>
                                                                                <option value="90">90</option>
                                                                                <option value="91">91</option>
                                                                                <option value="92">92</option>
                                                                                <option value="93">93</option>
                                                                                <option value="94">94</option>
                                                                                <option value="95">95</option>
                                                                                <option value="96">96</option>
                                                                                <option value="97">97</option>
                                                                                <option value="98">98</option>
                                                                                <option value="99">99</option>
                                                                                <option value="100">100</option>
                                                                                <option value="101">101</option>
                                                                                <option value="102">102</option>
                                                                                <option value="103">103</option>
                                                                                <option value="104">104</option>
                                                                                <option value="105">105</option>
                                                                                <option value="106">106</option>
                                                                                <option value="107">107</option>
                                                                                <option value="108">108</option>
                                                                                <option value="109">109</option>
                                                                                <option value="110">110</option>
                                                                                <option value="111">111</option>
                                                                                <option value="112">112</option>
                                                                                <option value="113">113</option>
                                                                                <option value="114">114</option>
                                                                                <option value="115">115</option>
                                                                                <option value="116">116</option>
                                                                                <option value="117">117</option>
                                                                                <option value="118">118</option>
                                                                                <option value="119">119</option>
                                                                                <option value="120">120</option>
                                                                                <option value="121">121</option>
                                                                                <option value="122">122</option>
                                                                                <option value="123">123</option>
                                                                                <option value="124">124</option>
                                                                                <option value="125">125</option>
                                                                                <option value="126">126</option>
                                                                                <option value="127">127</option>
                                                                                <option value="128">128</option>
                                                                                <option value="129">129</option>
                                                                                <option value="130">130</option>
                                                                                <option value="131">131</option>
                                                                                <option value="132">132</option>
                                                                                <option value="133">133</option>
                                                                                <option value="134">134</option>
                                                                                <option value="135">135</option>
                                                                                <option value="136">136</option>
                                                                                <option value="137">137</option>
                                                                                <option value="138">138</option>
                                                                                <option value="139">139</option>
                                                                                <option value="140">140</option>
                                                                                <option value="141">141</option>
                                                                                <option value="142">142</option>
                                                                                <option value="143">143</option>
                                                                                <option value="144">144</option>
                                                                                <option value="145">145</option>
                                                                                <option value="146">146</option>
                                                                                <option value="147">147</option>
                                                                                <option value="148">148</option>
                                                                                <option value="149">149</option>
                                                                                <option value="150">150</option>
                                                                                <option value="151">151</option>
                                                                                <option value="152">152</option>
                                                                                <option value="153">153</option>
                                                                                <option value="154">154</option>
                                                                                <option value="155">155</option>
                                                                                <option value="156">156</option>
                                                                                <option value="157">157</option>
                                                                                <option value="158">158</option>
                                                                                <option value="159">159</option>
                                                                                <option value="160">160</option>
                                                                                <option value="161">161</option>
                                                                                <option value="162">162</option>
                                                                                <option value="163">163</option>
                                                                                <option value="164">164</option>
                                                                                <option value="165">165</option>
                                                                                <option value="166">166</option>
                                                                                <option value="167">167</option>
                                                                                <option value="168">168</option>
                                                                                <option value="169">169</option>
                                                                                <option value="170">170</option>
                                                                                <option value="171">171</option>
                                                                                <option value="172">172</option>
                                                                                <option value="173">173</option>
                                                                                <option value="174">174</option>
                                                                                <option value="175">175</option>
                                                                                <option value="176">176</option>
                                                                                <option value="177">177</option>
                                                                                <option value="178">178</option>
                                                                                <option value="179">179</option>
                                                                                <option value="180">180</option>

                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="od_left_add"
                                                                                class="form-control text-center">
                                                                                <option value="0.00" selected>0.00
                                                                                </option>
                                                                                <option value="+0.50">+0.50</option>
                                                                                <option value="+0.75">+0.75</option>
                                                                                <option value="+1.00">+1.00</option>
                                                                                <option value="+1.25">+1.25</option>
                                                                                <option value="+1.50">+1.50</option>
                                                                                <option value="+1.75">+1.75</option>
                                                                                <option value="+2.00">+2.00</option>
                                                                                <option value="+2.25">+2.25</option>
                                                                                <option value="+2.50">+2.50</option>
                                                                                <option value="+2.75">+2.75</option>
                                                                                <option value="+3.00">+3.00</option>
                                                                                <option value="+3.25">+3.25</option>
                                                                                <option value="+3.50">+3.50</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>PD</td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id=""
                                                                                class="form-control text-center">
                                                                                <option value="0.00">0.00</option>
                                                                                <option value="54.00">54.00</option>
                                                                                <option value="54.50">54.50</option>
                                                                                <option value="55.00">55.00</option>
                                                                                <option value="55.50">55.50</option>
                                                                                <option value="56.00">56.00</option>
                                                                                <option value="56.50">56.50</option>
                                                                                <option value="57.00">57.00</option>
                                                                                <option value="57.50">57.50</option>
                                                                                <option value="58.00">58.00</option>
                                                                                <option value="58.50">58.50</option>
                                                                                <option value="59.00">59.00</option>
                                                                                <option value="59.50">59.50</option>
                                                                                <option value="60.00">60.00</option>
                                                                                <option value="60.50">60.50</option>
                                                                                <option value="61.00">61.00</option>
                                                                                <option value="61.50">61.50</option>
                                                                                <option value="62.00">62.00</option>
                                                                                <option value="62.50">62.50</option>
                                                                                <option value="63.00">63.00</option>
                                                                                <option value="63.50">63.50</option>
                                                                                <option value="64.00">64.00</option>
                                                                                <option value="64.50">64.50</option>
                                                                                <option value="65.00">65.00</option>
                                                                                <option value="65.50">65.50</option>
                                                                                <option value="66.00">66.00</option>
                                                                                <option value="66.50">66.50</option>
                                                                                <option value="67.00">67.00</option>
                                                                                <option value="67.50">67.50</option>
                                                                                <option value="68.00">68.00</option>
                                                                                <option value="68.50">68.50</option>
                                                                                <option value="69.00">69.00</option>
                                                                                <option value="69.50">69.50</option>
                                                                                <option value="70.00">70.00</option>
                                                                                <option value="70.50">70.50</option>
                                                                                <option value="71.00">71.00</option>
                                                                                <option value="71.50">71.50</option>
                                                                                <option value="72.00">72.00</option>
                                                                                <option value="72.50">72.50</option>
                                                                                <option value="73.00">73.00</option>
                                                                                <option value="73.50">73.50</option>
                                                                                <option value="74.00">74.00</option>
                                                                                <option value="74.50">74.50</option>
                                                                                <option value="75.00">75.00</option>
                                                                                <option value="75.50">75.50</option>
                                                                                <option value="76.00">76.00</option>
                                                                                <option value="76.50">76.50</option>
                                                                                <option value="77.00">77.00</option>
                                                                                <option value="77.50">77.50</option>
                                                                                <option value="78.00">78.00</option>

                                                                            </select>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lens-type-container d-none" id="reader_magnification">
                                                <i id="reader_magnification_back" class="fa-solid fa-arrow-left"
                                                    style="position: absolute; left: 0; top: 35px; font-size: 22px; cursor: pointer"></i>
                                                <p class="title">Select a Magnification Strength </p>
                                                <div class="box p-48" style="background-color: white">
                                                    <div class="prescription-container">
                                                        <div class="info-box">
                                                            <table class="table lens_table" style="min-width: auto">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="0.25" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="0.50" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="0.75" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="1.00" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="1.25" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="1.50" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="1.75" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="2.00" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="2.25" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="2.50" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="2.75" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="3.00" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="3.25" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="3.50" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="3.75" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="4.00" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="4.25" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="4.50" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="4.75" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="5.00" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="5.25" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="5.50" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="5.75" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input type="text"
                                                                                class="form-control text-center reading_magni_value"
                                                                                value="6.00" readonly
                                                                                style="cursor: pointer">
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Step 2 -->
                            <div class="lens_step">
                                <div class="add-frame-right mb-16">
                                    {{-- <div class="top">
                                        <i class="iconfont icon-fanhui"></i>
                                        <div class="progress">
                                            <div class="step-progress-wrap len-2">
                                                <ul>
                                                    <li class="status-2">
                                                        <i class="iconfont icon-checked"></i>
                                                        <span></span>
                                                        <p>Lenses</p>
                                                    </li>
                                                    <li class="status-0">
                                                        <i class="iconfont icon-checked"></i>
                                                        <span></span>
                                                        <p>Coating</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="middle" id="fo-container">
                                        <div class="__view">
                                            <div class="lens-type-container">
                                                <div
                                                    style="display: flex; justify-content: space-between; width: 50%; max-width: 600px; align-items: center; position: relative; margin-top: 5%; margin-left: 26%;">

                                                    <!-- Connecting Line -->
                                                    <div
                                                        style="position: absolute; top: 12%; left: 15%; width: 70%; height: 5.3%; background-color: #ccc; z-index: 0;">
                                                    </div>

                                                    <!-- Step 1 (Active) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid orange; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div
                                                            style="margin-top: 10px; font-size: 1.2vw; color: #000; font-weight: normal;">
                                                            Prescription</div>
                                                    </div>

                                                    <!-- Step 2 (Active) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid orange; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Lenses</div>
                                                    </div>

                                                    <!-- Step 3 (Inactive) -->
                                                    <div
                                                        style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                                        <div
                                                            style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid gray; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                            <div
                                                                style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">
                                                            Coating</div>
                                                    </div>

                                                </div>
                                                <p class="title">Select a lens type</p>
                                                <ul class="list">
                                                    <li class="item lensss" data-item="2">
                                                        <div class="content-box sel">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        data-src="https://cdn.vooglam.com/product/f135996ce40be9a66056db86eb0d4f91.png"
                                                                        src="https://cdn.vooglam.com/product/f135996ce40be9a66056db86eb0d4f91.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Frame Only </p>
                                                                        <p class="list-desc">Plastic Lenses</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$0.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item lensss" data-item="2">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://cdn.vooglam.com/product/1d676f74e60d4ad07b7f25dc526bb930.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Standard Lenses </p>
                                                                        <p class="list-desc">Traditional, transparent
                                                                            lenses perfect for everyday use</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$5.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item lensss" data-item="2">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://cdn.vooglam.com/product/4dace1b912a6d72d5561c44a4529841c.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Blue Light Blocking </p>
                                                                        <p class="list-desc">Protect your eyes from the
                                                                            negative side effects of digital screens</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$20.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item lensss" data-item="2">
                                                        <div class="content-box" id="transition_li1">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://cdn.vooglam.com/product/353080318fa55764bfddb47fbe810bd2.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">
                                                                            Transitions®&amp;Photochromic </p>
                                                                        <p class="list-desc">Automatically adapt to
                                                                            changing light, dark outdoors and clear
                                                                            indoors.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="children d-none" id="children1">
                                                            <div class="child-item content-box">
                                                                <div class="child-item-content"
                                                                    id="standerd_photochromic">
                                                                    <img src="https://cdn.vooglam.com/product/fbeb23b446b098c9e0e34fffafc9a89f.png"
                                                                        class="child-left"
                                                                        alt="vooglam eyewear prescription form">
                                                                    <div class="child-center">
                                                                        <p class="child-name list-title">Standard
                                                                            Photochromic <i
                                                                                class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"></i>
                                                                        </p>
                                                                        <p class="child-desc list-desc">Light-adjusting,
                                                                            block 100%UV. Adapt seamlessly to dynamic
                                                                            needs with versatile photochromic lenses.
                                                                        </p>
                                                                    </div>
                                                                    <div class="price child-price">
                                                                        <p class="notranslate">$35.00</p>
                                                                    </div>
                                                                </div>
                                                                <section class="d-none"
                                                                    id="standerd_photochromic_color1">
                                                                    <div class="color-container level2">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li data-bs-toggle="tooltip" title="Gray"
                                                                                data-title="Gray">
                                                                                <img src="https://cdn.vooglam.com/product/73ef115d5fc9ee22d833b146898a9de9.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger color_outline">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Amber"
                                                                                data-title="Amber">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/300bc485559b7226d5a17b8dd24bf557.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Pink"
                                                                                data-title="Pink">
                                                                                <img src="https://cdn.vooglam.com/product/a853dc5c3f18267854e1bdc05606004b.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Blue"
                                                                                data-title="Blue">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/df2f3718635fac931b4c0ef954259198.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Purple"
                                                                                data-title="Purple">
                                                                                <img src="https://cdn.vooglam.com/product/928af425863e04ca7d89c92046fd876e.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                            <div class="child-item content-box">
                                                                <div class="child-item-content"
                                                                    id="transition_signature1">
                                                                    <img src="https://cdn.vooglam.com/product/c846aca2a471d16f37fc4998deacf4a1.png"
                                                                        class="child-left"
                                                                        alt="vooglam eyewear prescription form">
                                                                    <div class="child-center">
                                                                        <p class="child-name list-title">TRANSITIONS®
                                                                            SIGNATURE® GEN8™ <i
                                                                                class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"></i>
                                                                        </p>
                                                                        <p class="child-desc list-desc">The perfect
                                                                            everyday lens. Available in 5 different
                                                                            vibrant colors.</p>
                                                                    </div>
                                                                    <div class="price child-price">
                                                                        <p class="notranslate">$100.00</p>
                                                                    </div>
                                                                </div>
                                                                <section class="d-none"
                                                                    id="transition_signature_color1">
                                                                    <div class="color-container level2">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li data-bs-toggle="tooltip" title="Gray"
                                                                                data-title="Gray">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/0391509b7887fec026ccae5bc7a09cd0.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger color_outline">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Brown"
                                                                                data-title="Brown">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/8a0c4d276441463d6af96c5ffd435a8c.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip"
                                                                                title="Graphite Green"
                                                                                data-title="Graphite Green">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/d949ff03e4a0ee0af306a918c5d02026.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                            <div class="child-item content-box">
                                                                <div class="child-item-content"
                                                                    id="transition_xtractive1">
                                                                    <img src="https://cdn.vooglam.com/product/5b8c4c1d7581da4c148500d77a01ec11.png"
                                                                        class="child-left"
                                                                        alt="vooglam eyewear prescription form">
                                                                    <div class="child-center">
                                                                        <p class="child-name list-title">TRANSITIONS®
                                                                            XTRACTIVE® New Generation <i
                                                                                data-v-134834db=""
                                                                                class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"
                                                                                style="display: none;"></i></p>
                                                                        <p class="child-desc list-desc">The darkest in
                                                                            hot temperatures, providing up to 35% faster
                                                                            fadeback, activates even in the car.</p>
                                                                    </div>
                                                                    <div class="price child-price">
                                                                        <p class="notranslate">$130.00</p>
                                                                    </div>
                                                                </div>
                                                                <section class="d-none"
                                                                    id="transition_xtractive_color1">
                                                                    <div class="color-container level2">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li data-bs-toggle="tooltip" title="Gray"
                                                                                data-title="Gray">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/944acbb8b0546dca31cb42cf66310ebc.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger color_outline">
                                                                            </li>
                                                                            <li data-bs-toggle="tooltip" title="Brown"
                                                                                data-title="Brown">
                                                                                <img src="https://cdn.vooglam.com/lens-setting/1552fa3d0bf8a6602b220c63ace06ff4.png"
                                                                                    alt="vooglam"
                                                                                    class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item lensss" data-item="2">
                                                        <div class="content-box">
                                                            <div class="content" id="color_tint1">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://cdn.vooglam.com/product/21328d74ac2fd3c7644c075f36ca9dde.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Color Tint </p>
                                                                        <p class="list-desc">Tint or coat your lenses
                                                                            and turn regular lenses into sunglasses</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$35.00</p>
                                                                </div>
                                                            </div>
                                                            <section class="d-none" id="color_tint_color1">
                                                                <div class="color-container level1">
                                                                    <span>Color</span>
                                                                    <ul>
                                                                        <li data-bs-toggle="tooltip" title="Dark Gray"
                                                                            data-title="Dark Gray">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/80dee2ca89f1eef0ea85c1bf09a8c731.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger color_outline">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip"
                                                                            title="Gradient Gray"
                                                                            data-title="Gradient Gray">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/49357be06c7a2e47cccb6d411aa67d0d.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip" title="Dark Brown"
                                                                            data-title="Dark Brown">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/e69f5c58dc64678aa2ec01bb2562b436.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip"
                                                                            title="Gradient Brown"
                                                                            data-title="Gradient Brown">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/19f71e2565a20bb32cab56be22433b39.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip" title="Light Red"
                                                                            data-title="Light Red">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/06fd511062cce769e7c0a14fd55859a4.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip"
                                                                            title="Light Yellow"
                                                                            data-title="Light Yellow">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/aa3697996379891c9c6cbaef72638f90.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip" title="Light Brown"
                                                                            data-title="Light Brown">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/42f78ce7119de5249bce6e113a927bc5.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip" title="Dark Green"
                                                                            data-title="Dark Green">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/821b8378c36ac20ecb5d6336c6aae86a.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </li>
                                                    <li class="item lensss" data-item="2">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://cdn.vooglam.com/product/f14309c6ac0dfbc6e7db678d0534b33b.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Driving Lenses </p>
                                                                        <p class="list-desc">Safer driving day and
                                                                            night; UV blocking</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$35.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content" id="polarizes_lens1">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form"
                                                                        src="https://cdn.vooglam.com/product/546ea655396994809f3a67379e785b7f.png"
                                                                        lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Polarized Lenses </p>
                                                                        <p class="list-desc">Reduce extra bright light
                                                                            glares and hazy vision</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$35.00</p>
                                                                </div>
                                                            </div>
                                                            <section class="d-none" id="polarizes_lens_color1">
                                                                <div class="color-container level1">
                                                                    <span>Color</span>
                                                                    <ul>
                                                                        <li data-bs-toggle="tooltip" title="Gray"
                                                                            data-title="Gray">
                                                                            <img src="https://cdn.vooglam.com/product/73ef115d5fc9ee22d833b146898a9de9.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger color_outline">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip" title="Amber"
                                                                            data-title="Amber">
                                                                            <img src="https://cdn.vooglam.com/lens-setting/300bc485559b7226d5a17b8dd24bf557.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip" title="Green"
                                                                            data-title="Green">
                                                                            <img src="https://cdn.vooglam.com/product/de2ae9a10624aa0368d889df3e477781.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li data-bs-toggle="tooltip" title="Yellow"
                                                                            data-title="Yellow">
                                                                            <img src="https://cdn.vooglam.com/product/b4a520e6e0e913495de30545ec434a3a.png"
                                                                                alt="vooglam"
                                                                                class="el-tooltip__trigger">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="lens_step">
                                <div class="coating-container mb-16">
                                    <div
                                        style="display: flex; justify-content: space-between; width: 50%; max-width: 600px; align-items: center; position: relative; margin-top: 5%; margin-left: 26%;">

                                        <!-- Connecting Line -->
                                        <div
                                            style="position: absolute; top: 12%; left: 15%; width: 70%; height: 5.3%; background-color: #ccc; z-index: 0;">
                                        </div>

                                        <!-- Step 1 (Active) -->
                                        <div style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                            <div
                                                style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid orange; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                <div
                                                    style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                </div>
                                            </div>
                                            <div
                                                style="margin-top: 10px; font-size: 1.2vw; color: #000; font-weight: normal;">
                                                Prescription</div>
                                        </div>

                                        <!-- Step 2 (Active) -->
                                        <div style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                            <div
                                                style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid orange; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                <div
                                                    style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                </div>
                                            </div>
                                            <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">Lenses</div>
                                        </div>

                                        <!-- Step 3 (Active) -->
                                        <div style="text-align: center; flex: 1; position: relative; z-index: 1;">
                                            <div
                                                style="width: 12%; height: 0; padding-bottom: 10%; border: 1.7px solid orange; background-color: white; border-radius: 50%; margin: 0 auto; position: relative;">
                                                <div
                                                    style="width: 40%; height: 40%; background-color: white; border-radius: 50%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                </div>
                                            </div>
                                            <div style="margin-top: 10px; font-size: 1.2vw; color: #888;">Coating</div>
                                        </div>

                                    </div>
                                    <p class="title"> Select a coating <i class="iconfont icon-querstion4"></i></p>
                                    <ul class="list">
                                        <li>
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/de2b31b19b481fe309a234256867d057.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Standard Coatings</p>
                                                        </div>
                                                        <p class="intro-desc">Reduces light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$4.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="li-recommend">
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/77f79e786be1aff4bf1a2f14eda76ea8.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Advanced Coatings</p>
                                                            <div class="intro-recommend">Recommended</div>
                                                        </div>
                                                        <p class="intro-desc">Water-resistant, easy to clean reduces
                                                            light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$8.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content sel">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/47aaad525e9b18f2c0fc974aaf892768.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Ultimate Coatings</p>
                                                        </div>
                                                        <p class="intro-desc">Oil-Resistant and water-resistant; reduces
                                                            light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$9.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form"
                                                        data-src="https://cdn.vooglam.com/product/ef7bc5b712c5e56e1955da89c9682882.png"
                                                        src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png"
                                                        lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>No Coating</p>
                                                        </div>
                                                        <p class="intro-desc">Not recommended, may result in glare and
                                                            harsh reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$0.00</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="modal-footer text-center" style="display: block;">
                                <button type="button" class="btn btn-outline-main bg-main-50" id="lens_prevBtn"
                                    disabled>Previous</button>
                                <button type="button" class="btn btn-main" id="lens_nextBtn">Next</button>
                                <button type="submit" class="btn btn-main" id="lens_submitBtn"
                                    style="display: none;">Add To Cart</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Sign In Modal -->
<div class="modal fade" id="size_name_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body p-12">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute; top:5%; right: 5%"></button>
                <div class="detail-container">
                    <p class="title">Our Frame Sizes</p>
                    <p class="detail-right-word">
                        <span>Esadowa(S)</span>
                    </p>
                    <div class="frame-size">
                        <p class="txt">Vooglam offers 3 different frame sizes (Small, Medium, Large). So choosing the
                            right one is key to ensuring you're getting the right fit.</p>
                        <table>
                            <tr>
                                <td>Size</td>
                                <td>Frame Width(mm)</td>
                            </tr>
                            <tr class="bold">
                                <td>S</td>
                                <td>≤130mm</td>
                            </tr>
                            <tr class="">
                                <td>M</td>
                                <td>131mm - 139mm</td>
                            </tr>
                            <tr class="">
                                <td>L</td>
                                <td>≥140mm</td>
                            </tr>
                        </table>
                    </div>
                    <div class="glass">
                        <img width="0" alt="frame width"
                            src="https://www.vooglam.com/_vooglam/frame-size-dialog-img.22a356f2.png" lazy="loaded">
                        <span>130mm</span>
                    </div>
                    <p class="bottom-txt">We suggest you measure your frame dimensions to make sure your new glasses
                        correctly fit your face.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sign In Modal -->
<div class="modal fade" id="rx_range_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body p-48">
                <div class="text-left">
                    <h5 class="mb-16 roboto-regular">RX Range</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute; top:5%; right: 5%"></button>
                <div class="el-dialog__body">
                    <p> Rx is customarily part of the superscription of a prescription, for a patient to purchase a
                        prescription drug from a pharmacist. It can only be made in certain prescriptions. This is an
                        approximate range based on the spherical (SPH) value. If you have astigmatism (CYL) in your
                        prescription, this range may be further limited. Please enter your prescription on the order
                        page to check whether the glasses are suitable for you. </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sign In Modal -->
<div class="modal fade" id="pd_range_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body p-48">
                <div class="text-left">
                    <h5 class="mb-16 roboto-regular">PD Range</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute; top:5%; right: 5%"></button>
                <div class="el-dialog__body">
                    <p> Pupillary Distance (PD) is the distance, in millimeters, between the center of one pupil to the
                        center of the other. The PD is needed to manufacture your eyeglasses because it determines the
                        exact optical center of the lens, which is the point where you look through the lens. PD is
                        especially important for manufacturing progressive lenses.

                        Once you have your PD, you can upload your photo to the Frame Fit tool and begin trying on
                        glasses. The Frame Fit tool allows you to see exactly what the glasses look like on you and how
                        well they fit the size and shape of your face. If you don’t have your PD, you can find out how
                        to measure it here. </p>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .step {
        display: none;
        /* Hide all steps by default */
    }

    .step.active {
        display: block;
        /* Show the active step */
    }

    .lens_step {
        display: none;
        /* Hide all steps by default */
    }

    .lens_step.active {
        display: block;
        /* Show the active step */
    }

    .lens_table tr th {
        padding: 0 32px 0 32px !important;
    }

    .lens_table tr td {
        padding: 10px !important;
    }
</style>


<div class="modal fade" id="tryOnModal" tabindex="-1" role="dialog" aria-labelledby="tryOnModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <!-- Face Image and Glasses Preview -->
                    <div class="col-md-7">
                        <div class="face-preview-container" style="position: relative;">
                            <!-- User uploaded face image will appear here -->
                            <img id="uploadedFace" class="img-fluid" src="{{ asset('uploads/try_on_faces/1.png') }}"
                                alt="Face" style="max-width: 500px; max-height: 500px; margin-bottom: 20px;">
                            <!-- Glasses image overlay -->
                            <img id="glassesOverlay" class="img-fluid glasses-overlay"
                                src="{{ asset('uploads/color_thumbnails/'.$pro_sku->pro_color_image) }}" alt="Glasses">
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('uploads/try_on_faces/1.png') }}" class="face-selector img-thumbnail"
                                    alt="Face 1" width="100" />
                                <img src="{{ asset('uploads/try_on_faces/2.png') }}" class="face-selector img-thumbnail"
                                    alt="Face 2" width="100" />
                                <img src="{{ asset('uploads/try_on_faces/3.png') }}" class="face-selector img-thumbnail"
                                    alt="Face 3" width="100" />
                                <img src="{{ asset('uploads/try_on_faces/4.png') }}" class="face-selector img-thumbnail"
                                    alt="Face 3" width="100" />
                                <img src="{{ asset('uploads/try_on_faces/5.png') }}" class="face-selector img-thumbnail"
                                    alt="Face 3" width="100" />
                                <img src="{{ asset('uploads/try_on_faces/6.png') }}" class="face-selector img-thumbnail"
                                    alt="Face 3" width="100" />
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar: Upload and Instructions -->
                    <div class="col-md-5 text-center">
                        <h5>Try Glasses</h5>
                        <p>Upload your image to try on glasses. Adjust the glasses to fit. Just for style reference. Not
                            Size.</p>
                        <button id="uploadBtn" class="btn btn-main my-24">Upload image</button>
                        <input type="file" id="uploadInput" accept="image/*" style="display: none;">

                        <!-- Glasses controls -->
                        <div class="mt-4">
                            <h6>Adjust Glasses</h6>
                            {{-- <div class="form-group">
                                <label class="my-8">Move Glasses</label><br>
                                <button id="moveUp" class="btn btn-sm btn-outline-main bg-main-50">Up</button>
                                <button id="moveDown" class="btn btn-sm btn-outline-main bg-main-50">Down</button>
                                <button id="moveLeft" class="btn btn-sm btn-outline-main bg-main-50">Left</button>
                                <button id="moveRight" class="btn btn-sm btn-outline-main bg-main-50">Right</button>
                            </div> --}}
                            <div class="form-group">
                                <label class="my-8">Resize Glasses</label><br>
                                <button id="sizeIncrease"
                                    class="btn btn-sm btn-outline-main bg-main-50">Increase</button>
                                <button id="sizeDecrease"
                                    class="btn btn-sm btn-outline-main bg-main-50">Decrease</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles for Positioning -->
<style>
    #uploadedFace {
        position: relative;
    }

    #glassesOverlay {
        position: absolute;
        top: 32%;
        left: 24.5%;
        width: 30%;
        z-index: 1;
        cursor: move;
    }


    .cbtn {
        border-radius: 6px !important;
        font-family: basic-sans-sf-bold !important;
        font-size: max(1.1458333333vw, 12px) !important;
        height: 3.125vw !important;
        position: relative !important;

    }

    #right_column {
        background: #f6f6f6;
        box-sizing: border-box;
        padding: 1.25vw 5.2083333333vw 1.875vw 3.125vw;



    }
</style>


@endsection


@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script defer src="{{ asset('face-api/dist/face-api.js') }}"></script>


<script>
    $(document).ready(function () {

    // Make the glasses draggable
    $('#glassesOverlay').draggable();

    // Load Face-api.js models
    Promise.all([
        faceapi.nets.tinyFaceDetector.loadFromUri('/face-api/weights'),
        faceapi.nets.faceLandmark68Net.loadFromUri('/face-api/weights')
    ]).then(() => {
        console.log('Models loaded');
    });

    // Adjust sunglasses when modal opens
    $('#tryOnModal').on('shown.bs.modal', function () {
        detectFaceAndAdjustGlasses(); // Call the function to detect face and adjust glasses
    });

    // Handle switching faces when clicking on predefined images
    $('.face-selector').on('click', function () {
        var newFaceSrc = $(this).attr('src');
        $('#uploadedFace').attr('src', newFaceSrc); // Change the face image
        
        // Ensure the face is fully loaded before adjusting the glasses
        $('#uploadedFace').on('load', function() {
            detectFaceAndAdjustGlasses(); // Adjust glasses after changing the face
        });
    });

    // Show file input when upload button is clicked
    $('#uploadBtn').on('click', function () {
        $('#uploadInput').click();
    });

    // Handle image preview after upload
    $('#uploadInput').on('change', function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadedFace').attr('src', e.target.result).show(); // Show uploaded image
            
            // Ensure the uploaded image is fully loaded before adjusting the glasses
            $('#uploadedFace').on('load', function() {
                detectFaceAndAdjustGlasses(); // Adjust glasses after uploading a new face
            });
        };
        reader.readAsDataURL(this.files[0]); // Read the uploaded file
    });

    // Initial variables for position and size
    let glassesTop = 50;
    let glassesLeft = 50;
    let glassesWidth = 30;


        // Function to move glasses
        function moveGlasses(dx, dy) {
            glassesTop += dy;
            glassesLeft += dx;
            $('#glassesOverlay').css({
                top: glassesTop + 'px',
                left: glassesLeft + 'px'
            });
        }

        // Move glasses controls
        $('#moveUp').on('click', function () {
            moveGlasses(0, -10); // Move up by 10px
        });

        $('#moveDown').on('click', function () {
            moveGlasses(0, 10); // Move down by 10px
        });

        $('#moveLeft').on('click', function () {
            moveGlasses(-10, 0); // Move left by 10px
        });

        $('#moveRight').on('click', function () {
            moveGlasses(10, 0); // Move right by 10px
        });


        // Resize glasses controls
        $('#sizeIncrease').on('click', function () {
            glassesWidth += 1; // Increase size by 5%
            $('#glassesOverlay').css('width', glassesWidth + '%');
        });

        $('#sizeDecrease').on('click', function () {
            glassesWidth -= 1; // Decrease size by 5%
            if (glassesWidth > 1) { // Prevent shrinking below 5%
                $('#glassesOverlay').css('width', glassesWidth + '%');
            }
        });


    // Function to detect eyes and automatically adjust the sunglasses
    async function detectFaceAndAdjustGlasses() {
        let faceImage = document.getElementById('uploadedFace');
        let glasses = $('#glassesOverlay');

        

        // Detect face and landmarks
        const detection = await faceapi.detectSingleFace(faceImage, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks();

        if (detection) {
            // Get the landmarks for the eyes
            const landmarks = detection.landmarks;
            const leftEye = landmarks.getLeftEye();
            const rightEye = landmarks.getRightEye();

            // Calculate the center points for the eyes
            const leftEyeCenter = {
                x: (leftEye[0].x + leftEye[3].x) / 2,
                y: (leftEye[1].y + leftEye[4].y) / 2
            };
            const rightEyeCenter = {
                x: (rightEye[0].x + rightEye[3].x) / 2,
                y: (rightEye[1].y + rightEye[4].y) / 2
            };

            // Calculate the distance between the eyes (to determine the size of the glasses)
            const eyeDistance = Math.sqrt(Math.pow(rightEyeCenter.x - leftEyeCenter.x, 2) + Math.pow(rightEyeCenter.y - leftEyeCenter.y, 2));

            // Fine-tune the position of the glasses based on the eyes' center points
            const glassesTop = (leftEyeCenter.y + rightEyeCenter.y) / 2.5 - (glasses.height() / 2); // Adjust the top position for better fit
            const glassesLeft = leftEyeCenter.x - (glasses.width() / 1.9); // Center the glasses horizontally

            // Adjust the width of the glasses based on the eye distance
            const glassesWidth = eyeDistance * 1.9; // Adjust this multiplier for better sizing

            // Apply the calculated positions and size to the glasses
            glasses.css({
                top: glassesTop + 'px',
                left: glassesLeft + 'px',
                width: glassesWidth + 'px',
                position: 'absolute'
            });
        } else {
            console.log('No face detected');
        }
    }
    });
</script>

<script>
    $(document).ready(function() {

        $('#single_vision_li').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').addClass('d-none');
            $('#single_vision').removeClass('d-none');
        });

        $('#single_vision_back').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').removeClass('d-none');
            $('#single_vision').addClass('d-none');
            $('#reading_glass_option').addClass('d-none');
        });

        $('#progressive_li').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').addClass('d-none');
            $('#progressive').removeClass('d-none');
        });

        $('#progressive_back').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').removeClass('d-none');
            $('#progressive').addClass('d-none');
            $('#reading_glass_option').addClass('d-none');
        });

        $('#bifocal_li').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').addClass('d-none');
            $('#progressive').removeClass('d-none');
        });

        $('#reading_glass_li').click(function(e) {
            e.preventDefault();
            $('#reading_glass_option').removeClass('d-none');
        });

        $('#use_my_presc').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').addClass('d-none');
            $('#progressive').removeClass('d-none');
        });

        $('#reader_magni').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').addClass('d-none');
            $('#reader_magnification').removeClass('d-none');
        });

        $('#reader_magnification_back').click(function(e) {
            e.preventDefault();
            $('#persc_type_div').removeClass('d-none');
            $('#reader_magnification').addClass('d-none');
            $('#reading_glass_option').addClass('d-none');
        });

        $('#transition_li').click(function(e) {
            e.preventDefault();
            $('#children').removeClass('d-none');
            e.stopPropagation(); // Stop the event from propagating further.
        });

        // Add click event to the document
        $(document).click(function() {
            $('#children').addClass('d-none');
        });

        // Prevent hiding when clicking inside #children itself
        $('#children').click(function(e) {
            e.stopPropagation(); // Stop the event from propagating to the document click event.
        });

        $('#color_tint').click(function(e) {
            e.stopPropagation(); // Stop the event from propagating to the document click event.
        });

        $('#polarizes_lens').click(function(e) {
            e.stopPropagation(); // Stop the event from propagating to the document click event.
        });

        $('#standerd_photochromic').click(function(e) {
            e.preventDefault();
            $('#standerd_photochromic_color').removeClass('d-none');
            $('#transition_signature_color').addClass('d-none');
            $('#transition_xtractive_color').addClass('d-none');
        });

        $('#transition_signature').click(function(e) {
            e.preventDefault();
            $('#transition_signature_color').removeClass('d-none');
            $('#standerd_photochromic_color').addClass('d-none');
            $('#transition_xtractive_color').addClass('d-none');
        });

        $('#transition_xtractive').click(function(e) {
            e.preventDefault();
            $('#transition_xtractive_color').removeClass('d-none');
            $('#standerd_photochromic_color').addClass('d-none');
            $('#transition_signature_color').addClass('d-none');
        });

        $('#color_tint').click(function(e) {
            e.preventDefault();
            $('#color_tint_color').removeClass('d-none');
            $('#polarizes_lens_color').addClass('d-none');
        });

        $('#polarizes_lens').click(function(e) {
            e.preventDefault();
            $('#polarizes_lens_color').removeClass('d-none');
            $('#color_tint_color').addClass('d-none');
        });

        
        





        












        $('#size_name_tip').click(function(e) {

            e.preventDefault();

            $('#size_name_modal').modal('show');
        });

        $('#rx_range_tip').click(function(e) {

            e.preventDefault();

            $('#rx_range_modal').modal('show');
        });

        $('#pd_range_tip').click(function(e) {

            e.preventDefault();

            $('#pd_range_modal').modal('show');
        });


        const mmToInchFactor = 25.4;

        // Store the original values in MM
        const originalValues = {
            frame_width: parseFloat($('#frame_width').text()),
            lens_width: parseFloat($('#lens_width').text()),
            lens_height: parseFloat($('#lens_height').text()),
            bridge: parseFloat($('#bridge').text()),
            temple: parseFloat($('#temple').text())
        };

        // Click event for 'IN' (convert to inches)
        $('#in').click(function() {
            // Convert each value from mm to inches using the original MM values
            convertToInches();
            // Toggle active classes
            $(this).addClass('hover');
            $('#mm').removeClass('hover');
        });

        // Click event for 'MM' (convert to millimeters)
        $('#mm').click(function() {
            // Convert each value back to MM using the original MM values
            convertToMM();
            // Toggle active classes
            $(this).addClass('hover');
            $('#in').removeClass('hover');
        });

        function convertToInches() {
            // Convert and update the values based on the stored original MM values
            $('#frame_width').text((originalValues.frame_width / mmToInchFactor).toFixed(2));
            $('#lens_width').text((originalValues.lens_width / mmToInchFactor).toFixed(2));
            $('#lens_height').text((originalValues.lens_height / mmToInchFactor).toFixed(2));
            $('#bridge').text((originalValues.bridge / mmToInchFactor).toFixed(2));
            $('#temple').text((originalValues.temple / mmToInchFactor).toFixed(2));

            // Update the unit labels to 'in'
            $('.mm_and_in').text('in');
        }

        function convertToMM() {
            // Set the values back to their original MM values
            $('#frame_width').text(originalValues.frame_width);
            $('#lens_width').text(originalValues.lens_width);
            $('#lens_height').text(originalValues.lens_height);
            $('#bridge').text(originalValues.bridge);
            $('#temple').text(originalValues.temple);

            // Update the unit labels to 'mm'
            $('.mm_and_in').text('mm');
        }


        



    });
</script>
<script>
    $(document).ready(function() {


        // Add click event to the document
        $(document).click(function() {
            $('#children1').addClass('d-none');
        });

        // Prevent hiding when clicking inside #children itself
        $('#children1').click(function(e) {
            e.stopPropagation(); // Stop the event from propagating to the document click event.
        });

        $('#color_tint1').click(function(e) {
            e.stopPropagation(); // Stop the event from propagating to the document click event.
        });

        $('#polarizes_lens1').click(function(e) {
            e.stopPropagation(); // Stop the event from propagating to the document click event.
        });

        $('#standerd_photochromic1').click(function(e) {
            e.preventDefault();
            $('#standerd_photochromic_color1').removeClass('d-none');
            $('#transition_signature_color1').addClass('d-none');
            $('#transition_xtractive_color1').addClass('d-none');
        });

        $('#transition_signature1').click(function(e) {
            e.preventDefault();
            $('#transition_signature_color1').removeClass('d-none');
            $('#standerd_photochromic_color1').addClass('d-none');
            $('#transition_xtractive_color1').addClass('d-none');
        });

        $('#transition_xtractive1').click(function(e) {
            e.preventDefault();
            $('#transition_xtractive_color1').removeClass('d-none');
            $('#standerd_photochromic_color1').addClass('d-none');
            $('#transition_signature_color1').addClass('d-none');
        });

        $('#color_tint1').click(function(e) {
            e.preventDefault();
            $('#color_tint_color1').removeClass('d-none');
            $('#polarizes_lens_color1').addClass('d-none');
        });

        $('#polarizes_lens1').click(function(e) {
            e.preventDefault();
            $('#polarizes_lens_color1').removeClass('d-none');
            $('#color_tint_color1').addClass('d-none');
        });

    });    
        
</script>
<script>
    const steps = document.querySelectorAll('.step');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((s, index) => {
            s.classList.toggle('active', index === step);
        });
        prevBtn.disabled = step === 0;
        nextBtn.style.display = step === steps.length - 1 ? 'none' : 'inline-block';
        submitBtn.style.display = step === steps.length - 1 ? 'inline-block' : 'none';

    
    }

    nextBtn.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize the first step
    showStep(currentStep);






    $('.color-container ul li').on('click', function() {
        // Get the title attribute from the parent <li> of the clicked image
        var colorName = $(this).data('title');
        
        // Display the color name
        // alert(colorName);
        $('#lens_color_span').text(' (' + colorName + ')');
        $('#lens_color_input').val(colorName);

        $('#lens_color_span1').text(' (' + color_name + ')');
        $('#lens_color_input1').val(color_name);
        
        // You can also use the colorName for further actions
    });



    // Add click event listener to all .content-box elements
    $('.content-box').on('click', function() {
        var frame_price = parseFloat($('#frame_price').text().slice(1));
        var coating_price = parseFloat($('#coating_price').text());
        // Remove .sel class from all .content-box elements
        $('.content-box').removeClass('sel');
        
        // Add .sel class to the clicked element
        $(this).addClass('sel');

        $(this).find('ul li:first img.el-tooltip__trigger').addClass('color_outline');

        // Get the text from the .notranslate class inside the clicked element
        var lens_price = parseFloat($(this).find('.notranslate').text().slice(1));
        var lens_name = $(this).find('.list-title').text();
    
        var color_name = $(this).find('ul li:first').data('title');

        if(color_name){

            $('#lens_color_span').text(' (' + color_name + ')');
            $('#lens_color_input').val(color_name);

            $('#lens_color_span1').text(' (' + color_name + ')');
            $('#lens_color_input1').val(color_name);
        }

        // Log or use the text as needed
        $('#lens_name_span').text(lens_name);
        $('#lens_name_input').val(lens_name);
        $('#lens_price').text(lens_price);
        $('#lens_price_input').val(lens_price);
        $('#total_price').text(frame_price+lens_price+coating_price);

        // Log or use the text as needed
        $('#lens_name_span1').text(lens_name);
        $('#lens_name_input1').val(lens_name);
        $('#lens_price1').text(lens_price);
        $('#lens_price_input1').val(lens_price);
        $('#total_price1').text(frame_price+lens_price+coating_price);


    });

    // Add click event listener to all .content-box elements
    $('.el-tooltip__trigger').on('click', function() {
        // Remove .sel class from all .content-box elements
        $('.el-tooltip__trigger').removeClass('color_outline');
        
        // Add .sel class to the clicked element
        $(this).addClass('color_outline');

    });


    // Add click event listener to all .content-box elements
    $('.coating-container .list li').on('click', function() {
        var frame_price = parseFloat($('#frame_price').text().slice(1));
        var lens_price = parseFloat($('#lens_price').text());
        // Remove .sel class from all .content-box elements
        $('.coating-container .list li').removeClass('sel');
        
        // Add .sel class to the clicked element
        $(this).addClass('sel');

        // Get the text from the .notranslate class inside the clicked element
        var coating_price = parseFloat($(this).find('.notranslate').text().slice(1));
        var coating_name = $(this).find('.intro-title p').text();


        // Log or use the text as needed
        $('#coating_name_span').text(coating_name);
        $('#coating_name').val(coating_name);
        $('#coating_price').text(coating_price);
        $('#coating_price_input').val(coating_price);
        $('#total_price').text(frame_price+lens_price+coating_price);

        // Log or use the text as needed
        $('#coating_name_span1').text(coating_name);
        $('#coating_name1').val(coating_name);
        $('#coating_price1').text(coating_price);
        $('#coating_price_input1').val(coating_price);
        $('#total_price1').text(frame_price+lens_price+coating_price);

    });





</script>

<script>
    const lens_step = document.querySelectorAll('.lens_step');
    const lens_nextBtn = document.getElementById('lens_nextBtn');
    const lens_prevBtn = document.getElementById('lens_prevBtn');
    const lens_submitBtn = document.getElementById('lens_submitBtn');
    let lens_currentStep = 0;

    function lens_showStep(step) {
        lens_step.forEach((s, index) => {
            s.classList.toggle('active', index === step);
        });
        lens_prevBtn.disabled = step === 0;
        lens_nextBtn.style.display = step === lens_step.length - 1 ? 'none' : 'inline-block';
        lens_submitBtn.style.display = step === lens_step.length - 1 ? 'inline-block' : 'none';

    
    }

    lens_nextBtn.addEventListener('click', () => {
        if (lens_currentStep < lens_step.length - 1) {
            lens_currentStep++;
            lens_showStep(lens_currentStep);
        }
    });

    lens_prevBtn.addEventListener('click', () => {
        if (lens_currentStep > 0) {
            lens_currentStep--;
            lens_showStep(lens_currentStep);
        }
    });

    lens_showStep(lens_currentStep);








</script>
<!-- jQuery Script for Tooltip -->
<script>
    $(document).ready(function() {
            var tooltip = $('.custom-tooltip');
            var tooltipLink = $('.custom-tooltip-link');

            tooltipLink.hover(function(event) {
                // Position the tooltip
                tooltip.css({
                    'top': 0 + 3 + '%',  // Below the link
                    'display': 'table-caption',  // Below the link
                    'left': 30 + '%'       // Align horizontally with the cursor
                }).fadeIn(200);
            }, function() {
                tooltip.fadeOut(200);
            });
            
            
            
            
            var tooltip2 = $('.custom-tooltip2');
            var tooltipLink2 = $('.custom-tooltip-link2');

            tooltipLink2.hover(function(event) {
                // Position the tooltip
                tooltip2.css({
                    'top': 0 + 3 + '%',  // Below the link
                    'display': 'table-caption',  // Below the link
                    'left': 30 + '%'       // Align horizontally with the cursor
                }).fadeIn(200);
            }, function() {
                tooltip2.fadeOut(200);
            });
            
            
            
             
            var tooltip3 = $('.custom-tooltip3');
            var tooltipLink3 = $('.custom-tooltip-link3');

            tooltipLink3.hover(function(event) {
                // Position the tooltip
                tooltip3.css({
                    'top': 0 + 3 + '%',  // Below the link
                    'display': 'table-caption',  // Below the link
                    'left': 30 + '%'       // Align horizontally with the cursor
                }).fadeIn(200);
            }, function() {
                tooltip3.fadeOut(200);
            });
            
             
            var tooltip4 = $('.custom-tooltip4');
            var tooltipLink4 = $('.custom-tooltip-link4');

            tooltipLink4.hover(function(event) {
                // Position the tooltip
                tooltip4.css({
                    'top': 0 + 3 + '%',  // Below the link
                    'display': 'table-caption',  // Below the link
                    'left': 30 + '%'       // Align horizontally with the cursor
                }).fadeIn(200);
            }, function() {
                tooltip4.fadeOut(200);
            });
            
            
            // Click detection on step items
            $('.lensss').on('click', function() {
                // Find the closest button and trigger a click event on it
                const stepButton = $('#lens_nextBtn');
                stepButton.trigger('click');
            });

            // Example button click event (you can customize this part)
            $('.lensss').on('click', function() {
               // alert('Button for Step ' + $(this).closest('.lensss').data('item') + ' clicked!');
            });
            
            
            
        });
</script>
<style>
    /* Tooltip styles */
    .custom-tooltip {
        position: absolute;
        background-color: #fff;
        color: #3a3535;
        box-shadow: black 2px 1px 1px 1px;
        padding: 2%;
        border-radius: 5px;
        font-size: 13px;
        z-index: 100;
        white-space: nowrap;
        display: none;
        /* Hidden by default */
    }

    /* Link styles */
    .custom-tooltip-link {
        position: relative;
        color: blue;
        text-decoration: underline;
        cursor: pointer;

    }






    /* Tooltip styles */
    .custom-tooltip2 {
        position: absolute;
        background-color: #fff;
        color: #3a3535;
        box-shadow: black 2px 1px 1px 1px;
        padding: 2%;
        border-radius: 5px;
        font-size: 13px;
        z-index: 100;
        white-space: nowrap;
        display: none;
        /* Hidden by default */
    }

    /* Link styles */
    .custom-tooltip-link2 {
        position: relative;
        color: blue;
        text-decoration: underline;
        cursor: pointer;

    }

    /* Tooltip styles */
    .custom-tooltip3 {
        position: absolute;
        background-color: #fff;
        color: #3a3535;
        box-shadow: black 2px 1px 1px 1px;
        padding: 2%;
        border-radius: 5px;
        font-size: 13px;
        z-index: 100;
        white-space: nowrap;
        display: none;
        /* Hidden by default */
    }

    /* Link styles */
    .custom-tooltip-link3 {
        position: relative;
        color: blue;
        text-decoration: underline;
        cursor: pointer;

    }


    /* Tooltip styles */
    .custom-tooltip4 {
        position: absolute;
        background-color: #fff;
        color: #3a3535;
        box-shadow: black 2px 1px 1px 1px;
        padding: 2%;
        border-radius: 5px;
        font-size: 13px;
        z-index: 100;
        white-space: nowrap;
        display: none;
        /* Hidden by default */
    }

    /* Link styles */
    .custom-tooltip-link4 {
        position: relative;
        color: blue;
        text-decoration: underline;
        cursor: pointer;

    }

    .modal-fullscreen .modal-content {
        height: inherit;
        border: 0;
        border-radius: 0;
    }

    .lens-type-container .list li.item:hover {
        background: #fff0e8;
        border: 1px solid #ff5a00;
        box-shadow: 0 0 6px #f9f299;
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
        border-radius: 6px;
        height: 3.125vw;
        width: 18.7vw;
    }

    .lens_step.active,
    #add_lens_modal {
        display: contents;
    }

    .modal-footer {
        margin-bottom: 21%;
    }
</style>
@endsection