@extends('main_layout')


@section('main_contant')

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Checkout</h6>
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
                <li class="text-sm text-main-600"> Checkout </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- ================================= Checkout Page Start ===================================== -->
 <section class="checkout py-80">
    <div class="container container-lg">
        <form method="POST" action="{{ route('stripe.checkout') }}">
        @csrf
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <form action="#" class="pe-xl-5">
                    <div class="row gy-3">
                        <div class="col-sm-6 col-xs-6">
                            <input type="text" name="first_name" class="common-input border-gray-100" placeholder="First Name">
                            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <input type="text" name="last_name" class="common-input border-gray-100" placeholder="Last Name">
                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="house_no" class="common-input border-gray-100" placeholder="House number and street name">
                            @error('house_no') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="apartment" class="common-input border-gray-100" placeholder="Apartment, suite, unit, etc. (Optional)">
                            @error('apartment') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="city" class="common-input border-gray-100" placeholder="City">
                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="state" class="common-input border-gray-100" placeholder="State">
                            @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="post_code" class="common-input border-gray-100" placeholder="Post Code">
                            @error('post_code') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <input type="number" name="phone" class="common-input border-gray-100" placeholder="Phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-6">
                            <input type="email" name="email" class="common-input border-gray-100" placeholder="Email Address">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" name="password" class="common-input border-gray-100" placeholder="Choose Password For Create Account">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-12">
                            <div class="my-40">
                                <h6 class="text-lg mb-24">Additional Information</h6>
                                <input type="text" name="other_info" class="common-input border-gray-100" placeholder="Notes about your order, e.g. special notes for delivery.">
                                @error('other_info') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="checkout-sidebar">
                    <div class="bg-color-three rounded-8 p-24 text-center">
                        <span class="text-gray-900 text-xl fw-semibold">Your Orders</span>
                    </div>

                    <div class="border border-gray-100 rounded-8 px-24 py-40 mt-24">
                        <div class="mb-32 pb-32 border-bottom border-gray-100 flex-between gap-8">
                            <span class="text-gray-900 fw-medium text-xl font-heading-two">Product</span>
                            <span class="text-gray-900 fw-medium text-xl font-heading-two">Subtotal</span>
                        </div>

                        @php
                            $products = '';
                        @endphp

                        @foreach ($checkout as $checkout)
                        @php
                            // Concatenate each item's details to form a string
                            $products .= $checkout->pro_name . ' (Qty: ' . $checkout->qty . '), Price: ' . (($checkout->pro_price * $checkout->qty) + $checkout->frame_id + $checkout->coating_id) . '; ';
                        @endphp
                        <div class="flex-between gap-24 mb-32">
                            <div class="flex-align gap-12">
                                <span class="text-gray-900 fw-normal text-md font-heading-two w-144">{{ $checkout->pro_name}}</span>
                                <span class="text-gray-900 fw-normal text-md font-heading-two"><i class="ph-bold ph-x"></i></span>
                                <span class="text-gray-900 fw-semibold text-md font-heading-two">{{ $checkout->qty}}</span>
                            </div>
                            <span class="text-gray-900 fw-bold text-md font-heading-two">${{ ($checkout->pro_price * $checkout->qty) + $checkout->frame_id + $checkout->coating_id }}</span>
                        </div> 
                        @endforeach

                        <input type="hidden" name="products" id="checkout_summary" value="{{ rtrim($products, '; ') }}">

                        


                        <div class="border-top border-gray-100 pt-30  mt-30">
                            <div class="mb-32 flex-between gap-8">
                                <span class="text-gray-900 font-heading-two text-xl fw-semibold">Subtotal</span>
                                <span class="text-gray-900 font-heading-two text-md fw-bold">${{ $total->total_price + $total->total_frame_id + $total->total_coating_id}}</span>
                            </div>
                            <div class="mb-0 flex-between gap-8">
                                <span class="text-gray-900 font-heading-two text-xl fw-semibold">Total</span>
                                <span class="text-gray-900 font-heading-two text-md fw-bold">${{ $total->total_price + $total->total_frame_id + $total->total_coating_id}}</span>
                                <input type="hidden" name="total_bill" value="{{ $total->total_price + $total->total_frame_id + $total->total_coating_id}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-32">

                        <div class="payment-item">
                            <div class="form-check common-check common-radio py-16 mb-0">
                                <input class="form-check-input" type="radio" name="payment" value="cash_on_delivery" id="payment3" checked>
                                <label class="form-check-label fw-semibold text-neutral-600" for="payment3">Cash on delivery</label>
                                @error('payment') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{-- <div class="payment-item__content px-16 py-24 rounded-8 bg-main-50 position-relative">   
                                <p class="text-gray-800">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                            </div> --}}
                        </div>

                        <div class="payment-item">
                            <div class="form-check common-check common-radio py-16 mb-0">
                                <input class="form-check-input" type="radio" name="payment" value="stripe" id="payment">
                                <label class="form-check-label fw-semibold text-neutral-600" for="payment">Credit / Debit Card</label>
                                @error('payment') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{-- <div class="payment-item__content px-16 py-24 rounded-8 bg-main-50 position-relative">   
                                <p class="text-gray-800">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                            </div> --}}
                        </div>

                    </div>

                    <div class="mt-32 pt-32 border-top border-gray-100">
                        <p class="text-gray-500">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#" class="text-main-600 text-decoration-underline"> privacy policy</a> .</p>
                    </div>

                    <button type="submit"  class="btn btn-main mt-40 py-18 w-100 rounded-8 mt-56">Place Order</button>
                    
                </div>
            </div>
        </div>
        </form>
    </div>
 </section>
<!-- ================================= Checkout Page End ===================================== -->

@endsection


@section('script')

@endsection