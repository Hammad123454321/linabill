@extends('main_layout')


@section('main_contant')



<!-- ================================ Cart Section Start ================================ -->
 <section class="cart py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-3 col-lg-4">
                <div class="cart-sidebar border border-gray-100 rounded-8 px-24 py-24">
                    <a href="{{ route('user.dashboard') }}" class="btn btn-main py-18 w-100 rounded-8">Dashboard</a>
                    <a href="{{ route('orders') }}" class="btn btn-main mt-10 py-18 w-100 rounded-8">Orders</a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <!-- ========================== Shipping Section Start ============================ -->
                <section class="shipping py-20 pt-0" id="shipping">
                    <div class="container container-lg">
                        <div class="row gy-4">
                            <div class="col-xxl-4 col-sm-6">
                                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-car-profile"></i></span>
                                    <div class="">
                                        <h6 class="mb-0">{{ $totalOrders }}</h6>
                                        <span class="text-sm text-heading"> Total Orders</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-sm-6">
                                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-hand-heart"></i></span>
                                    <div class="">
                                        <h6 class="mb-0"> {{ $totalReceiveOrders }}</h6>
                                        <span class="text-sm text-heading"> Total Received</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-sm-6">
                                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-credit-card"></i></span>
                                    <div class="">
                                        <h6 class="mb-0"> {{ $totalReturnOrders }}</h6>
                                        <span class="text-sm text-heading">Total Returns</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ========================== Shipping Section End ============================ -->
            </div>
            
        </div>
    </div>
 </section>
<!-- ================================ Cart Section End ================================ -->

@endsection


@section('script')

@endsection