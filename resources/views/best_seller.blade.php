@extends('main_layout')


@section('main_contant')

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Shop</h6>
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
                <li class="text-sm text-main-600"> Product Shop </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- =============================== Shop Section Start ======================================== -->
 <section class="shop py-24">
    <div class="container container-lg">
        <div class="row">

            <!-- Sidebar Start -->
            @include('sidebar')
            <!-- Sidebar End -->

            <!-- Content Start -->
            <div class="col-lg-9">
                
                <div class="list-grid-wrapper">
                    @foreach ($products as $item)
                        <div class="product-card h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                            <a href="{{ route('product_detail', ['id' => $item->id, 'sku_id' => $item->first_sku_id ?? 0]) }}" class="product-card__thumb flex-center rounded-8 position-relative">
                                <span class="product-card__badge bg-main-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">Best Seller </span>
                                    <img class="product-image" src="{{ asset('uploads/product_thumbnails/'.$item->pro_image) }}" alt="Product Image">
            
                                    <!-- Hover image -->
                                    <img class="product-hover-image" src="{{ asset('uploads/product_thumbnails/'.$item->pro_second_image) }}" alt="Hover Product Image">
                            </a>
                            <div class="product-card__content mt-8 text-center" style="margin: auto">
                                <div class="flex-align gap-6 justify-content-center">
                                    <span class="text-xs fw-medium text-gray-500">4.8</span>
                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-gray-500">(17k)</span>
                                </div>
                                <h6 class="title text-lg fw-semibold mt-8 mb-8 text-center">
                                    <a href="{{ route('product_detail', ['id' => $item->id, 'sku_id' => $item->first_sku_id ?? 0]) }}" class="link text-line-2" tabindex="0">{{ $item->pro_name }}</a>
                                </h6>

                                <div class="product-card__price my-8">
                                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> ${{$item->pro_price}}</span>
                                    @if ($item->pro_discount)
                                    <span class="text-heading text-md fw-semibold ">${{$item->pro_discount}} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination Start -->
                <ul class="pagination flex-center flex-wrap gap-16">
                    <!-- Previous Page Link -->
                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link h-64 w-64 flex-center text-xxl rounded-8 fw-medium text-neutral-600 border border-gray-100" href="{{ $products->previousPageUrl() }}">
                            <i class="ph-bold ph-arrow-left"></i>
                        </a>
                    </li>

                    <!-- Pagination Links -->
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                            <a class="page-link h-64 w-64 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="{{ $products->url($i) }}">
                                {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                            </a>
                        </li>
                    @endfor

                    <!-- Next Page Link -->
                    <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link h-64 w-64 flex-center text-xxl rounded-8 fw-medium text-neutral-600 border border-gray-100" href="{{ $products->nextPageUrl() }}">
                            <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- Pagination End -->
            </div>
            <!-- Content End -->

        </div>
    </div>
 </section>
<!-- =============================== Shop Section End ======================================== -->
@endsection


@section('script')

@endsection