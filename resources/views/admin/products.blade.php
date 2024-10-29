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
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li> --}}
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Shapes</a></li>
                                <li class="breadcrumb-item active">All Products</li>
                            </ol>
                        </div>
                        <h4 class="page-title">All Products</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row mb-2">
                                <div class="col-lg-8">
                                    <form class="d-flex flex-wrap align-items-center">
                                        <label for="inputPassword2" class="visually-hidden">Search</label>
                                        <div class="me-3">
                                            <input type="text" class="form-control my-1 my-lg-0" id="search"  autocomplete="off" placeholder="Search...">
                                        </div>
                                    </form>                            
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-end">
                                        <a href="{{ route('add_product') }}" class="btn btn-danger waves-effect waves-light"><i class="fas fa-user me-1"></i> Add New Product</a>
                                    </div>
                                </div><!-- end col-->
                            </div>
    
                            <div class="table-responsive">
                                <table id="main_table" class="table table-centered table-striped dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Series</th>
                                            <th>Colors</th>
                                            <th>Price</th>
                                            <th>Dis Price</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div>
        <script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){

                //=========== Delete Data Ajax Request ===========//
                $(document).on("click", '#delete_btn', function(event){
                    event.preventDefault();

                    Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to delete this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Delete',
                            customClass: "sweet-alert"
                        }).then((result) => {
                            if (result.value) {
                                var id = $(this).data("did");
                                var element = this;
                                $.ajax({
                                    url: '/delete_shape/'+id,
                                    type : "GET",
                                    success : function(response){
                                        if (response.status == 200)
                                        {
                                            toastr.success('Shape Has Been Deleted Seccussfully!', 'Successfull!');
                                            loadData();
                                        }else {
                                            Swal.fire({
                                                title: "Somthing Wrong!",
                                                text: "Sonthing Went Wrong Please Try Again!",
                                                type: "error",
                                                customClass: "sweet-alert",
                                            });
                                        }
                                    }
                                });
                            }

                        })


                });
                //=========== End Delete Data Ajax Request ===========//

                // Define the default options
                var defaultOptions = {
                    ajax: {
                        url: '{{ route("load_products") }}',
                        type: 'post',
                        data: { search: "", startdate: "", enddate: "",  type: "", csrf: csrf }
                    },
                    columns: [
                        { data: "id" },
                        { data: "pro_image" },
                        { data: "pro_name" },
                        { data: "pro_series" },
                        { data: "pro_colors" },
                        { data: "pro_price" },
                        { data: "pro_dis_price" },
                        { data: "btn" },
                        // Add more column definitions as needed
                    ],
                    columnDefs: [
                        { className: 'text-center td-30', targets: [0, 1, 2, 3, 4] },
                        // Add more column definitions as needed
                    ],
                    centeredColumnsOnPrintPdf: [0, 1, 2, 3, 4],
                    footerCallback: function (row, data, start, end, display) {
                        var api = this.api();
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };

                        var subtotal = api
                            .column(0)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Update footer
                        // $(api.column(0).footer()).html(subtotal);
                    }
                };

                // Function to load data with updated dates
                function loadData(search = "", startDate= "", endDate= "", type = "") {
                    // Merge the default options with the updated dates
                    var options = $.extend(true, {}, defaultOptions, {
                        ajax: {
                            data: { csrf: csrf, startdate: startDate, enddate: endDate, search: search, type: type }
                        }
                    });

                    // Call the load_data function with the updated options
                    load_data(options);
                }

                // Example usage: Call the function with updated dates
                loadData();


                //=========== Start Custom Search Box ===========//
                $('#search').keyup(function(){
                    loadData($(this).val(), "", "", $('#status').val());
                });
                //=========== End Custom Search Box ===========//

                //==========For Add===========//
                $('#image').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#uploaded-image').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                $('#up_image').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#up_uploaded-image').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>

    @endsection

    