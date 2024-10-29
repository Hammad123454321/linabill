@extends('main_layout')


@section('main_contant')

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Cart</h6>
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
                <li class="text-sm text-main-600"> Product Cart </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- ================================ Cart Section Start ================================ -->
 <section class="cart py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-9 col-lg-8">
                <div class="cart-table border border-gray-100 rounded-8 px-40 py-48">
                    <div class="overflow-x-auto scroll-sm scroll-sm-horizontal">
                        <table class="table style-three">
                            <thead>
                                <tr>
                                    <th class="h6 mb-0 text-lg fw-bold">Delete</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Product Name</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Price</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Quantity</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $cart)

                                <tr>
                                    <td>
                                        <a href="{{ route('remove_cart', $cart->pro_id)}}" class="remove-tr-btn flex-align gap-12 hover-text-danger-600">
                                            <i class="ph ph-x-circle text-2xl d-flex"></i>
                                            Remove
                                        </a>
                                    </td>
                                    <td>
                                        <div class="table-product d-flex align-items-center gap-24">
                                            <a href="product-details-two.html" class="table-product__thumb border border-gray-100 rounded-8 flex-center ">
                                                <img src="uploads/product_thumbnails/{{ $cart->pro_image }}" alt="">
                                            </a>
                                            <div class="table-product__content text-start">
    
                                                <h6 class="title text-lg fw-semibold mb-8">
                                                    <a href="product-details.html" class="link text-line-2" tabindex="0">{{ $cart->pro_name }}</a>
                                                </h6>
    
                                                <div class="flex-align gap-16">
                                                    <div class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">
                                                        Lens: ${{ number_format($cart->frame_id, 2) }}
                                                    </div>
                                                    <div href="cart.html" class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">
                                                        Coating: ${{ number_format($cart->coating_id, 2) }}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-lg h6 mb-0 fw-semibold">${{ number_format($cart->pro_price * $cart->qty, 2) }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex rounded-4 overflow-hidden">
                                            <a href="{{ route('minus_cart', $cart->pro_id) }}" class="quantity__minus border border-end border-gray-100 flex-shrink-0 h-48 w-48 text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-minus"></i>
                                            </a>
                                            <input type="number" class="quantity__input flex-grow-1 border border-gray-100 border-start-0 border-end-0 text-center w-32 px-4" value="{{ $cart->qty }}" min="1">
                                            <a href="{{ route('plus_cart', $cart->pro_id) }}" class="quantity__plus border border-end border-gray-100 flex-shrink-0 h-48 w-48 text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-plus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-lg h6 mb-0 fw-semibold">${{ number_format($cart->frame_id + $cart->coating_id + ($cart->pro_price * $cart->qty), 2) }}</span>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="cart-sidebar border border-gray-100 rounded-8 px-24 py-40">
                    <h6 class="text-xl mb-32">Cart Totals</h6>
                    <div class="bg-color-three rounded-8 p-24">
                        <div class="mb-32 flex-between gap-8">
                            <span class="text-gray-900 font-heading-two">Subtotal</span>
                            <span class="text-gray-900 fw-semibold">${{ number_format($total->total_price + $total->total_frame_id + $total->total_coating_id, 2) }}</span>
                        </div>
                        {{-- <div class="mb-32 flex-between gap-8">
                            <span class="text-gray-900 font-heading-two">Estimated Delivery</span>
                            <span class="text-gray-900 fw-semibold">Free</span>
                        </div>
                        <div class="mb-0 flex-between gap-8">
                            <span class="text-gray-900 font-heading-two">Estimated Taxs</span>
                            <span class="text-gray-900 fw-semibold">USD 10.00</span>
                        </div> --}}
                    </div>  
                    <div class="bg-color-three rounded-8 p-24 mt-24">
                        <div class="flex-between gap-8">
                            <span class="text-gray-900 text-xl fw-semibold">Total</span>
                            <span class="text-gray-900 text-xl fw-semibold">${{ number_format($total->total_price + $total->total_frame_id + $total->total_coating_id, 2) }}</span>
                        </div>
                    </div>  
                    <a href="{{ route('checkout') }}" class="btn btn-main mt-40 py-18 w-100 rounded-8">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- ================================ Cart Section End ================================ -->

@endsection


@section('script')

@endsection