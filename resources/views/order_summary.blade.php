@extends('main_layout')


@section('main_contant')

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Order Successfull</h6>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- ================================ Cart Section Start ================================ -->
 <section class="cart py-80">
    <div class="container container-lg">
        <h1 class="text-center">THANK YOU!</h1>
        <div class="row gy-4">
            <div class="col-xl-8 col-lg-8">
                <div class="cart-table border border-gray-100 rounded-8 px-40 py-48">
                    <div class="overflow-x-auto scroll-sm scroll-sm-horizontal">
                        <table class="table style-three">
                            <thead>
                                <tr>
                                    <th class="h6 mb-0 text-lg fw-bold">Product Name</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Price</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Quantity</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $cart)
                                <tr>
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
                                                    <a href="cart.html" class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">
                                                        Lens: ${{ $cart->frame_price }}
                                                    </a>
                                                    <a href="cart.html" class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">
                                                        Coating: ${{ $cart->coating_price }}
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-lg h6 mb-0 fw-semibold">${{ $cart->pro_price * $cart->qty }}</span>
                                    </td>
                                    <td>
                                        <span class="text-lg h6 mb-0 fw-semibold">{{ $cart->qty }}</span>
                                    </td>
                                    <td>
                                        <span class="text-lg h6 mb-0 fw-semibold">${{ $cart->total }}</span>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td><h4>TOTAL</h4></td>
                                <td><h4>{{ $order->total_price }}</h4></td>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="cart-sidebar border border-gray-100 rounded-8 px-24 py-40">
                    <h6 class="text-xl mb-32">Customer Name: {{ $order->first_name .' '. $order->last_name}}</h6>
                    <h6 class="text-xl mb-32">Phone: {{ $order->phone }}</h6>
                    <h6 class="text-xl mb-32">Email: {{ $order->email }}</h6>
                    <h6 class="text-xl mb-32">Address: {{ $order->house_no .', '. $order->apartment .', '. $order->city .', '. $order->state .', '. $order->post_code}}</h6>
                    
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- ================================ Cart Section End ================================ -->

@endsection


@section('script')

@endsection