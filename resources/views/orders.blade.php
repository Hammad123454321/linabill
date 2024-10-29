@extends('main_layout')


@section('main_contant')

<style>
    .table.style-three tbody tr td {
    padding: 10px;
}
</style>
<!-- ================================ Cart Section Start ================================ -->
 <section class="cart py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-3 col-lg-4">
                <div class="cart-sidebar border border-gray-100 rounded-8 p-24">
                    <a href="{{ route('user.dashboard') }}" class="btn btn-main py-18 w-100 rounded-8">Dashboard</a>
                    <a href="{{ route('orders') }}" class="btn btn-main mt-10 py-18 w-100 rounded-8">Orders</a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="cart-table border border-gray-100 rounded-8 px-40 py-48">
                    <div class="overflow-x-auto scroll-sm scroll-sm-horizontal">
                        <table class="table style-three">
                            <thead>
                                <tr>
                                    <th class="h6 mb-0 text-lg fw-bold">Id</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Order Date</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Total Price</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Status</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersWithItems as $orders)
                                <tr>
                                    <td>
                                        {{ $orders['order']->id }}
                                    </td>
                                    <td>
                                        {{ $orders['order']->created_at }}
                                    </td>
                                    <td>
                                        <span class="text-lg h6 mb-0 fw-semibold">${{ $orders['order']->total_price }}</span>
                                    </td>
                                    <td>
                                        @if ($orders['order']->order_status == 1)
                                        <span class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">Processing</span>
                                        @elseif($orders['order']->order_status == 2)
                                        <span class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">Shipped</span> 
                                        @elseif($orders['order']->order_status == 3)
                                        <span class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">Delivered</span> 
                                        @elseif($orders['order']->order_status == 4)
                                        <span class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">Cancelled</span>   
                                        @endif
                                        
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
 </section>
<!-- ================================ Cart Section End ================================ -->

@endsection


@section('script')

@endsection