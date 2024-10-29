
@extends('admin.main_layout')

    @section('page_content')

        <!-- Start Content-->
        <div class="container-fluid">
                        
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">$<span data-plugin="counterup">{{ $today_total->total_amount }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Today Sale</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                        <i class="fe-eye font-22 avatar-title text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $today_total->total_qty }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Today's Sale Item</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="fe-heart font-22 avatar-title text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">$<span data-plugin="counterup"> {{ $total->total_amount }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total Sale</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $total->total_qty }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total Sale Items</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4 col-md-12">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Lifetime Sales</h4>

                            <div id="cardCollpase1" class="collapse show">
                                <div class="text-center pt-3">
                                    <div id="lifetime-sales" data-colors="#00acc1,#f1556c"></div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>$7.8k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                            <h4><i class="fe-arrow-up text-success me-1"></i>$1.4k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>$9.8k</h4>
                                        </div>
                                    </div> <!-- end row -->
                                    
                                </div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Income Amounts</h4>

                            <div id="cardCollpase2" class="collapse show">
                                <div class="text-center pt-3">
                                    <div id="income-amounts" data-colors="#00acc1"></div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                            <h4><i class="fe-arrow-up text-success me-1"></i>641</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>234</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                            <h4><i class="fe-arrow-up text-success me-1"></i>3201</h4>
                                        </div>
                                    </div> <!-- end row -->
                                </div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Total Users</h4>

                            <div id="cardCollpase3" class="collapse show">
                                <div class="text-center pt-3">
                                    <div id="total-users" data-colors="#00acc1,#4b88e4,#e3eaef,#fd7e14"></div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>18k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                            <h4><i class="fe-arrow-up text-success me-1"></i>3.25k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                            <h4><i class="fe-arrow-up text-success me-1"></i>28k</h4>
                                        </div>
                                    </div> <!-- end row -->
                                </div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Top Selling Products</h4>

                            <div id="cardCollpase5" class="collapse show">
                                <div class="table-responsive pt-3">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topSellingProducts as $product)
                                                <tr>
                                                    <td>{{ $product->pro_name }}</td>
                                                    <td class="text-center">${{ number_format($product->pro_price, 2) }}</td>
                                                    <td class="text-center">{{ $product->total_qty }}</td>
                                                    <td class="text-center">${{ number_format($product->total_qty * $product->pro_price, 2) }}</td>
                                                </tr>
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div> <!-- end table responsive-->
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    @endsection