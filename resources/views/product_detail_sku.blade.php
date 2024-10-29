@extends('main_layout')


@section('main_contant')


<!-- ========================== Product Details Two Start =========================== -->
<section class="product-details py-10">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-12">
                <div class="row gy-4">
                    <div class="col-xl-6">
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
                                                            <img class="rounded-8" src="{{ asset('uploads/product_images/' .$image->pro_image) }}" alt="">
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
                                        flex-direction: row; /* For horizontal layout on mobile */
                                    }
                                    
                                    /* Optional: Add spacing between the main image and thumbnails */
                                    .product-details__thumb-slider {
                                        margin-bottom: 20px;
                                    }
                                }
                            </style>
                            
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product-details__content">

                            <h5 class="mb-5 roboto-regular">{{ $products->pro_name }}</h5>
                            <div class="flex-align flex-wrap gap-8">
                                <div class="flex-align gap-8 flex-wrap">
                                    <div class="flex-align gap-4">
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                    </div>
                                    <span class="text-sm fw-medium text-neutral-600">4.7 Star Rating</span>
                                    <span class="text-sm fw-medium text-gray-500">(21,671)</span>
                                </div>
                            </div>

                            <div class="my-12 rounded-8 border border-gray-200 p-16 pb-10">
                                <div class="flex-align gap-8 flex-wrap">
                                    
                                    @if ($products->pro_discount)
                                    <div class="flex-align gap-8">
                                        <h4 class="mb-0 text-main-two-600 gilroy-bold">${{ number_format($products->pro_discount) }}</h4>
                                    </div>
                                    <div class="flex-align gap-8">
                                        <h6 class="text-xl text-gray-400 mb-0 gilroy-bold" style="text-decoration:line-through;">${{ number_format($products->pro_price) }}</h6>
                                    </div> 
                                    @else
                                    <div class="flex-align gap-8">
                                        <h4 class="mb-0 text-main-two-600 gilroy-bold">${{ number_format($products->pro_price) }}</h4>
                                    </div>
                                    @endif
                                    @if ($products->pro_discount_percent)
                                    <div class="flex-align gap-8">
                                        <div class="flex-align gap-8 text-main-two-600">
                                            <i class="ph-fill ph-seal-percent text-xl"></i>
                                            -{{ number_format($products->pro_discount_percent) }}%
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
                                                    ${{ $products->pro_discount / 4 }}  
                                                @else
                                                    ${{ $products->pro_price / 4 }}
                                                @endif
                                            </span> with
                                            <img src="{{ asset('assets/images/after_pay.avif') }}" style="height: 20px;">
                                            or 
                                            <img src="{{ asset('assets/images/klarna.png') }}" style="height: 20px;">
                                            <i class="fa-sharp-duotone fa-solid fa-circle-info"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-16 py-8 bg-main-50 rounded-8 flex-between gap-24 mb-14 mt-14">
                                    <span class="text-main-600">
                                        <i class="fa-sharp-duotone fa-solid fa-ticket"></i> <span class="text-sm">$10 Off Sitewide</span>
                                    </span>
                                    <a href="">
                                        <span class="text-sm text-main-600 fw-semibold">Get Coupons</span>
                                    </a>
                                    
                                </div>
                            </div>

                            <div class="mt-14">
                                <div class="flex-between align-items-start flex-wrap gap-16">
                                    <div>
                                        <span class="text-gray-900 d-block mb-12">
                                            Frame Color: 
                                            <span class="fw-medium">Mineral Silver</span> 
                                        </span>
                                        <div class="color-list flex-align gap-8">
                                            @foreach($product_skus as $index => $sku)

                                                <a href="{{ route('product_detail', ['id' => $sku->pro_id, 'sku_id' => $sku->id]) }}" class="color-list__button w-60 h-60 border border-2 sku-item ">
                                                    <img src="{{ asset('uploads/product_images/' . $sku->pro_color) }}">
                                                </a>
                                                
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-14">
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
                                <div class="flex-align gap-8 mt-10">
                                    <div class="gap-8 text-xs">
                                        <i class="fa-regular fa-arrows-rotate"></i> 30 Days Return Warranty <i class="fa-light fa-shield-check ms-16"></i> 365 Days Quality Warranty
                                    </div>
                                </div>
                            </div>

                            <div class="flex-align gap-8 flex-wrap mt-10">
                                <a href="#" class="btn btn-main flex-center gap-8 rounded-8 py-14 fw-normal" style="width: 48.5%">
                                    ADD LENS
                                </a>
                                <a href="#" class="btn btn-outline-main rounded-8 py-14 fw-normal bg-main-50" style="width: 48.5%">
                                    FRAME ONLY
                                </a>
                                <a href="" class="btn btn-black flex-center gap-8 rounded-8 py-8 w-100">
                                    <img src="{{ asset('assets/images/glasses.png') }}">
                                    TRY-ON
                                </a>
                            </div>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-48">
            <div class="product-dContent border rounded-12">
                <div class="product-dContent__header border-bottom border-gray-100 flex-between flex-wrap gap-16">
                    <ul class="nav common-tab nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <a href="#" class="btn bg-color-one rounded-8 flex-align gap-8 text-main-600 hover-bg-main-600 hover-text-white">
                        <img src="{{ asset('assets/images/icon/satisfaction-icon.png') }}" alt="">
                        100% Satisfaction Guaranteed
                    </a>
                </div>
                <div class="p-16">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">

                            <div class="bg-gray-100 p-32">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <span class="text-gray-900 d-block mb-12">
                                            SKU：
                                            <span class="fw-medium">GJGA300776-01</span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            Series：
                                            <span class="fw-medium">ColorMagic</span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            Rim：
                                            <span class="fw-medium"><a href="" class="text-gray-900 hover-text-main-600 text-decoration-underline">Full Rim</a></span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            Color：
                                            <span class="fw-medium"><a href="" class="text-gray-900 hover-text-main-600 text-decoration-underline">Multicolor</a></span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            Materials：
                                            <span class="fw-medium"><a href="" class="text-gray-900 hover-text-main-600 text-decoration-underline">Acetate</a></span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            Shape：
                                            <span class="fw-medium"><a href="" class="text-gray-900 hover-text-main-600 text-decoration-underline">Cat eye</a></span> 
                                        </span>
                                    </div>
                                    <div class="col-xl-3">
                                        <span class="text-gray-900 d-block mb-12">
                                            Size: 
                                            <span class="fw-medium">M 
                                            <a href="" class="text-gray-900 hover-text-main-600"><i class="fa-light fa-circle-question"></i></a></span>
                                            
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            Frame Weight: 
                                            <span class="fw-medium">31.1g</span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            RX Range: 
                                            <span class="fw-medium">-20.00~+12.00 <a href="" class="text-gray-900 hover-text-main-600"><i class="fa-light fa-circle-question"></i></a></span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            PD Range: 
                                            <span class="fw-medium">54~78 <a href="" class="text-gray-900 hover-text-main-600"><i class="fa-light fa-circle-question"></i></a></span> 
                                        </span>
                                        <span class="text-gray-900 d-block mb-12">
                                            Spring Hinge: 
                                            <span class="fw-medium">No</span> 
                                        </span>
                                    </div>
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="detail-img-wrap">
                                            <div class="detail-right-word">
                                                <span class="hover">MM</span>
                                                <span class="">IN</span>
                                            </div>
                                            <div class="glass-box">
                                                <div class="glass1">
                                                    <img src="{{ asset('assets/images/frame1.avif') }}" width="100%" alt="Frame width" loading="lazy">
                                                    <ul>
                                                        <li>
                                                            <span>Frame width</span>
                                                            <span>134mm</span>
                                                        </li>
                                                        <li>
                                                            <span>Lens width</span>
                                                            <span>54mm</span>
                                                        </li>
                                                        <li>
                                                            <span>Lens height</span>
                                                            <span>46mm</span>
                                                        </li>
                                                        <li>
                                                            <span>Bridge</span>
                                                            <span>18mm</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="glass2">
                                                    <img src="{{ asset('assets/images/frame2.avif') }}" alt="Temple length" loading="lazy">
                                                    <div>
                                                        <span>Temple</span>
                                                        <span>145mm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <p class="text-xs">Due to the different measurements methods, the measurements printed on the inside of the temple arm may vary from those showing on our website. </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <h6 class="mb-24">Product Description</h6>
                                    <div class="d-flex align-items-start gap-24 pb-44 border-bottom border-gray-100 mb-44">
                                        <img src="{{ asset('assets/images/thumbs/comment-img1.png') }}" alt="" class="w-52 h-52 object-fit-cover rounded-circle flex-shrink-0">
                                        <div class="flex-grow-1">
                                            <div class="flex-between align-items-start gap-8 ">
                                                <div class="">
                                                    <h6 class="mb-12 text-md">Nicolas cage</h6>
                                                    <div class="flex-align gap-8">
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                </div>
                                                <span class="text-gray-800 text-xs">3 Days ago</span>
                                            </div>
                                            <h6 class="mb-14 text-md mt-24">Greate Product</h6>
                                            <p class="text-gray-700">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>

                                            <div class="flex-align gap-20 mt-44">
                                                <button class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-thumbs-up"></i>
                                                    Like
                                                </button>
                                                <a href="#comment-form" class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-arrow-bend-up-left"></i>
                                                    Replay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-24">
                                        <img src="{{ asset('assets/images/thumbs/comment-img1.png') }}" alt="" class="w-52 h-52 object-fit-cover rounded-circle flex-shrink-0">
                                        <div class="flex-grow-1">
                                            <div class="flex-between align-items-start gap-8 ">
                                                <div class="">
                                                    <h6 class="mb-12 text-md">Nicolas cage</h6>
                                                    <div class="flex-align gap-8">
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                </div>
                                                <span class="text-gray-800 text-xs">3 Days ago</span>
                                            </div>
                                            <h6 class="mb-14 text-md mt-24">Greate Product</h6>
                                            <p class="text-gray-700">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>

                                            <div class="flex-align gap-20 mt-44">
                                                <button class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-thumbs-up"></i>
                                                    Like
                                                </button>
                                                <a href="#comment-form" class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-arrow-bend-up-left"></i>
                                                    Replay
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-56">
                                        <div class="">
                                            <h6 class="mb-24">Write a Review</h6>
                                            <span class="text-heading mb-8">What is it like to Product?</span>
                                            <div class="flex-align gap-8">
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="mt-32">
                                            <form action="#">   
                                                <div class="mb-32">
                                                    <label for="title" class="text-neutral-600 mb-8">Review Title</label>
                                                    <input type="text" class="common-input rounded-8" id="title" placeholder="Great Products">
                                                </div>
                                                <div class="mb-32">
                                                    <label for="desc" class="text-neutral-600 mb-8">Review Content</label>
                                                    <textarea class="common-input rounded-8" id="desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-main rounded-pill mt-48">Submit Review</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ms-xxl-5">
                                        <h6 class="mb-24">Customers Feedback</h6>
                                        <div class="d-flex flex-wrap gap-44">
                                            <div class="border border-gray-100 rounded-8 px-40 py-52 flex-center flex-column flex-shrink-0 text-center">
                                                <h2 class="mb-6 text-main-600">4.8</h2>
                                                <div class="flex-center gap-8">
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                </div>
                                                <span class="mt-16 text-gray-500">Average Product Rating</span>
                                            </div>
                                            <div class="border border-gray-100 rounded-8 px-24 py-40 flex-grow-1">
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">5</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 70%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">124</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">4</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 50%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">52</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">3</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">12</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">2</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 20%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">5</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-0">
                                                    <span class="text-gray-900 flex-shrink-0">1</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 5%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-gray-400 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>  
                            </div>
                        </div>
                        <div class="mt-24">
                            <div class="row">
                                <div class="col-xl-6">
                                    <img src="{{ asset('assets/images/glasss.avif') }}">
                                </div>
                                <div class="col-xl-6">
                                    <h6 class="mb-24">About Haidera</h6>
                                    <p>Haidera glasses are a representative style of the Vooglam brand, made of high-quality materials, showing a stylish and classic style.Each style is carefully designed and processed, and the details of the temples are refined and perfect, making the glasses both beautiful and practical. Eyeglass lenses also use a variety of different processes and materials, such as anti-blue light, anti-radiation, progressive, etc., to meet different vision needs and use occasions.</p>
                                    <p class="text-xs mt-12">PS:There might be some visual differences due to different lights in sunlight and screen.Goods shall in kind Prevail</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-24">
                            <div class="row">
                                <div class="col-xl-12">
                                    <img src="{{ asset('assets/images/pro-banner.webp') }}" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <!-- ========================== Shipping Section Start ============================ -->
                         <section class="shipping py-20" id="shipping">
                            <div class="container container-lg">
                                <div class="row gy-2">
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
                                            <div class="text-center">
                                                <h6 class="mb-0">3 Million+</h6>
                                                <span class="text-sm text-heading">Glasses Sold</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
                                            <div class="text-center">
                                                <h6 class="mb-0">10K+ Reviews</h6>
                                                <span class="text-sm text-heading">Trustpilot</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
                                            <div class="text-center">
                                                <h6 class="mb-0">Award-Winning</h6>
                                                <span class="text-sm text-heading">Customer Service</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="shipping-item1 flex-align gap-16 rounded-8 bg-main-50 hover-bg-main-100 transition-2 justify-content-center">
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
                                        <p>(145)</p>
                                    </div>
                                </div>




                                <div class="row gy-2 rounded-8 p-20" style="background-color: #f6f6f6;">
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-12">
                                                    <div class="rounded-8 flex-center flex-column  text-center py-20 px-24">
                                                    <h3 class="mb-4 text-main-600">4.8</h3>
                                                    <div class="flex-center gap-8">
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="mt-4 text-gray-500">Average Rating</span>
                                                </div>
                                                </div>
                                                <div class="col-xl-8 col-sm-12">
                                                    <div class="rounded-8 px-24 py-20 flex-grow-1">
                                                        <div class="flex-align gap-8 mb-10">
                                                            <span class="text-gray-900 flex-shrink-0">Quality </span>
                                                            <span class="text-gray-900 flex-shrink-0"> 5.0</span>
                                                            <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 70%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-align gap-8 mb-10">
                                                            <span class="text-gray-900 flex-shrink-0">Style </span>
                                                            <span class="text-gray-900 flex-shrink-0"> &nbsp; &nbsp;5.0</span>
                                                            <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-align gap-8 mb-10">
                                                            <span class="text-gray-900 flex-shrink-0">Fit </span>
                                                            <span class="text-gray-900 flex-shrink-0"> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;4.9</span>
                                                            <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
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
                                                <button type="button" id="feature-item-wrapper-prev1" class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1" >
                                                    <i class="ph ph-caret-left"></i>
                                                </button>
                                                <button type="button" id="feature-item-wrapper-next1" class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1" >
                                                    <i class="ph ph-caret-right"></i>
                                                </button>
                                            </div>
                                            <div class="right-reviews">
                                                <div class="feature-item-wrapper1">
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="Very stylish, comfortable, easy to wear. They are high quality and correct presc" class="right-review-img" data-src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews swiper-slide-next" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="Love them. I've gotten many compliments on these glasses. My hair does not get c" class="right-review-img" data-src="https://cdn.vooglam.com/product/a5a8fd699b777ec4507e0018c08097e8.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/product/a5a8fd699b777ec4507e0018c08097e8.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="Perfect frames for my oval face. They fit well and are comfortable.  I own appro" class="right-review-img" data-src="https://cdn.vooglam.com/product/08adf6838f7d46288d53bcc68b290e2e.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/product/08adf6838f7d46288d53bcc68b290e2e.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="These glasses give me life! Yasss Honey! I love the vibrant colorful colors on t" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/e570be43098cccb635d564a669ad03a5.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/customer/app/prescription/e570be43098cccb635d564a669ad03a5.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="these are my new Lisa Frank specs! they are so cute!" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/838b748c3ab3cf48022a0eda1e8b158c.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/customer/app/prescription/838b748c3ab3cf48022a0eda1e8b158c.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="I absolutely love these glasses. The color, style, and fit are nice" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/1d0cd1a942564ea9ade894d037e1433f.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/customer/app/prescription/1d0cd1a942564ea9ade894d037e1433f.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="These cateye frames give me that naughty librarian look! love it!" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/8c1f03ab40dbb8b8579f88c6b04b74c0.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/customer/app/prescription/8c1f03ab40dbb8b8579f88c6b04b74c0.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="purchased these and then purchased 2 more" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/4e605be12fa4b8340368dbc817d61a22.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/customer/app/prescription/4e605be12fa4b8340368dbc817d61a22.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="My favourite one!" class="right-review-img" data-src="https://cdn.vooglam.com/customer/pc/prescription/c2722ee611f9b2b652855fc96652c8fb.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/customer/pc/prescription/c2722ee611f9b2b652855fc96652c8fb.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="just got them today, took a whole 9 days...that's it!!! Prescription is perfect." class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/6bf03398ec822fd8380652e8ca01fa15.jpg?im=Resize%2Cwidth%3D600" src="https://cdn.vooglam.com/customer/app/prescription/6bf03398ec822fd8380652e8ca01fa15.jpg?im=Resize%2Cwidth%3D600" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="I absolutely love these glasses. The colors are very vibrant and giving a whole " class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/1dab8bbdd07901232e46604ae15a59be.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="These are beautiful and so colorful.  They also have a sparkle to them, which i " class="right-review-img" data-src="https://cdn.vooglam.com/customer/wap/review/379c5ca897725e9ae5680822321dd702.jpeg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="Absolutely beautiful!" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/dc86b0496281379729decb54262d9816.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="Lovely frames, very comfortable and my prescription is spot on." class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/72772b9803045a8a973ff24120666145.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="everything!" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/e89b1fe2f9e6da7f99f4867b5ce6474e.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="this glasses fits amazing" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/770ebae59e694e5bab0c71abf92c23ab.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="cute" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/595a37c5b79f6c0c97e14e451d5183f1.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="Love these glasses they are fun and vibrate. The leopard add a nice touch. The p" class="right-review-img" data-src="https://cdn.vooglam.com/customer/wap/review/ff50990535ddd629756762b1a2a161dc.jpeg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="leopard is an everyday print for me! I will wear these out I hope!" class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/33c47ebef9b64d3fcd525f0c479d1b22.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img alt="I love these glasses I get alot of compliments about them saying they look like " class="right-review-img" data-src="https://cdn.vooglam.com/customer/app/prescription/3de3b7d4ceedf574a89c4d090dd22368.jpg?im=Resize%2Cwidth%3D600" src="https://www.vooglam.com/_vooglam/new_img_loading_2.c6d69f78.png" lazy="loading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </section>
                        <!-- ========================== Shipping Section End ============================ -->

                        <div class="mt-24">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="review-list-l">
                                        <h6 class="text-gray-400 roboto-bold mb-8"> 
                                        “Very stylish, comfortable, easy to wear.” </h6>
                                        <div class="flex-align mb-10">
                                            <div class="tips-li">Quality 5.0</div>
                                            <div class="tips-li">Style 5.0</div>
                                            <div class="tips-li">Fit 5.0</div>
                                        </div>
                                        <div class="middle">
                                            <div>Very stylish, comfortable, easy to wear. They are high quality and correct prescription. Very pleased with my purchase. Would recommend it.</div>
                                        </div>
                                        <div class="review-list-b flex-align py-10 mt-24">
                                            <div class="comment_helpful me-10">
                                                <i class="iconfont icon-a-ziyuan507"></i>
                                                <i class="iconfont icon-a-ziyuan509"></i>
                                                <span>Helpful(52)</span>
                                            </div>
                                            <div>
                                                <span>Color: Multicolor, </span>
                                                <span class="time">29 July 2024, </span>
                                                <span class="name">by j***1</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="review-list-r">
                                        <img class="review-img" alt="Very stylish, comfortable, easy to wear. They are high quality and correct presc - 1" data-src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg?im=Resize%2Cwidth%3D240" src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg">
                                        <img class="review-img" alt="Very stylish, comfortable, easy to wear. They are high quality and correct presc - 1" data-src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg?im=Resize%2Cwidth%3D240" src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg">
                                    </div>
                                </div>
                                <hr class="mb-20">
                                <div class="col-xl-8">
                                    <div class="review-list-l">
                                        <h6 class="text-gray-400 roboto-bold mb-8"> 
                                        “Very stylish, comfortable, easy to wear.” </h6>
                                        <div class="flex-align mb-10">
                                            <div class="tips-li">Quality 5.0</div>
                                            <div class="tips-li">Style 5.0</div>
                                            <div class="tips-li">Fit 5.0</div>
                                        </div>
                                        <div class="middle">
                                            <div>Very stylish, comfortable, easy to wear. They are high quality and correct prescription. Very pleased with my purchase. Would recommend it.</div>
                                        </div>
                                        <div class="review-list-b flex-align py-10 mt-24">
                                            <div class="comment_helpful me-10">
                                                <i class="iconfont icon-a-ziyuan507"></i>
                                                <i class="iconfont icon-a-ziyuan509"></i>
                                                <span>Helpful(52)</span>
                                            </div>
                                            <div>
                                                <span>Color: Multicolor, </span>
                                                <span class="time">29 July 2024, </span>
                                                <span class="name">by j***1</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="review-list-r">
                                        <img class="review-img" alt="Very stylish, comfortable, easy to wear. They are high quality and correct presc - 1" data-src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg?im=Resize%2Cwidth%3D240" src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg">
                                        <img class="review-img" alt="Very stylish, comfortable, easy to wear. They are high quality and correct presc - 1" data-src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg?im=Resize%2Cwidth%3D240" src="https://cdn.vooglam.com/product/76d54b861d7bd34d9aa993a3176d997c.jpg">
                                    </div>
                                </div>
                                <hr class="mb-20">


                                <div class="col-xl-12 text-center">
                                    <a href="#" class="btn btn-main rounded-8 py-14 fw-normal">
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
                        <a href="shop.html" class="text-sm fw-medium text-gray-700 hover-text-main-600 hover-text-decoration-underline">View More</a>
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
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold </span>
                                <img class="product-image" src="{{ asset('assets/images/product/1a.avif') }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('assets/images/product/1.webp') }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold </span>
                                <img class="product-image" src="{{ asset('assets/images/product/1a.avif') }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('assets/images/product/1.webp') }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold </span>
                                <img class="product-image" src="{{ asset('assets/images/product/1a.avif') }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('assets/images/product/1.webp') }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold </span>
                                <img class="product-image" src="{{ asset('assets/images/product/1a.avif') }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('assets/images/product/1.webp') }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold </span>
                                <img class="product-image" src="{{ asset('assets/images/product/1a.avif') }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('assets/images/product/1.webp') }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Sold </span>
                                <img class="product-image" src="{{ asset('assets/images/product/1a.avif') }}" alt="Product Image">
        
                                <!-- Hover image -->
                                <img class="product-hover-image" src="{{ asset('assets/images/product/1.webp') }}" alt="Hover Product Image">
                        </a>
                        <div class="product-card__content mt-16 text-center">
                            <div class="flex-align gap-6 justify-content-center">
                                <span class="text-xs fw-medium text-gray-500">4.8</span>
                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-medium text-gray-500">(17k)</span>
                            </div>
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>

                            <div class="product-card__price my-10">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= Deals Week End ================================ -->



@endsection