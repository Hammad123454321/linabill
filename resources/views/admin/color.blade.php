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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Color</a></li>
                                <li class="breadcrumb-item active">Color</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Color</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            {{-- <div class="row">
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
                                        <h3 class="text-dark mt-1">$<span data-plugin="counterup">58,947</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total Revenue</p>
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
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Today's Sales</p>
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
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                                        <p class="text-muted mb-1 text-truncate">Conversion</p>
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
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
                                        <p class="text-muted mb-1 text-truncate">Today's Visits</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div> --}}
            <!-- end row -->

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
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fas fa-user me-1"></i> Add New Color</button>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="waves-effect dropdown-toggle arrow-none btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">Export</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a id="pdf" class="dropdown-item" href="#"><i class="far fa-file-pdf me-2 text-muted font-18 vertical-middle"></i>Export Pdf</a>
                                                <a id="excel" class="dropdown-item" href="#"><i class="far fa-file-excel me-2 text-muted font-18 vertical-middle"></i>Export Excel</a>
                                                <a id="print" class="dropdown-item" href="#"><i class="fas fa-print me-2 text-muted font-18 vertical-middle"></i>Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-->
                            </div>
    
                            <div class="table-responsive">
                                <table id="main_table" class="table table-centered table-striped dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Color Image</th>
                                            <th>Color Name</th>
                                            <th>Color Code</th>
                                            <th>Status</th>
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

            <!--Start Insert Modal -->
            <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h4 class="modal-title" id="myCenterModalLabel">Add New Color</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body p-3">
                            <form id="add_form">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Color Name</label>
                                                    <input type="text" class="form-control" name="color_name" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Color Code</label>
                                                    <input type="text" class="form-control" name="color_code" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="status" class="form-label" style="margin-top:10px;">Select Status</label>
                                                    <select class="form-control" name="color_status">
                                                        <option value="1">Enabled</option>
                                                        <option value="0">Disabled</option>
                                                    </select>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="text-align:center; margin-top: 10px;">
                                            {{-- <label for="name" class="form-label">Select Image</label> --}}
                                            <input type="file" name="image" id="image" accept="image/*" style="display: none;">
                                            <label for="image" class="image-label" style="margin-top:10px; border:1px solid #dee2e6;">
                                                <img src="{{ asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="uploaded-image" height="120" width="120">
                                            </label>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="text-center" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-success waves-effect waves-light" id="add_btn">Save</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--End Insert Modal -->

            <!--Start Update Modal -->
            <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h4 class="modal-title" id="myCenterModalLabel">Update Color</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body p-3">
                            <form id="update_form">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" id="color_id" name="color_id">
                                                    <label for="name" class="form-label">Color Name</label>
                                                    <input type="text" class="form-control" name="color_name" id="color_name" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Color Code</label>
                                                    <input type="text" class="form-control" id="color_code" name="color_code" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="status" class="form-label" style="margin-top:10px;">Select Status</label>
                                                    <select class="form-control" name="color_status" id="color_status">
                                                        <option value="1">Enabled</option>
                                                        <option value="0">Disabled</option>
                                                    </select>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="text-align:center; margin-top: 10px;">
                                            {{-- <label for="name" class="form-label">Select Image</label> --}}
                                            <input type="file" name="up_image" id="up_image" accept="image/*" style="display: none;">
                                            <label for="up_image" class="image-label" style="margin-top:10px; border:1px solid #dee2e6;">
                                                <img src="{{ asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="up_uploaded-image" height="120" width="120">
                                            </label>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="text-center" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-success waves-effect waves-light" id="update_btn">Update</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--End Insert Modal -->

        </div>
        <script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                //=========== Insert Form Validation ===========//
                $("#add_form").validate({
                    rules: {
                        color_name: {
                            required: true,
                        },
                        color_code: {
                            required: true,
                        },
                        color_status: {
                            required: true
                        },
                    },
                    messages: {
                        color_name: {
                            required: "Please Enter Color Name",
                        },
                        color_code: {
                            required: "Please Color Code",
                        },
                        color_status: {
                            required: "Please Select Status",
                        },
                    },

                    //Called when the element is invalid:
                    highlight: function(element) {
                        // $(element).css('background', '#ffdddd');
                        // $(element).css('border', '1px solid red');
                        $(element).css('background-image', 'url({{ asset("backend_assets/validate/delete.png")}})');
                        $(element).css('background-repeat', 'no-repeat');
                        $(element).css('background-position', '97%');
                    },

                    // Called when the element is valid:
                    unhighlight: function(element) {
                        // $(element).css('background', '#ffffff');
                        // $(element).css('border', '1px solid green');
                        $(element).css('background-image', 'url({{ asset("backend_assets/validate/apply.png")}})');
                        $(element).css('background-repeat', 'no-repeat');
                        $(element).css('background-position', '97%');
                    }

                });
                //=========== End Insert Form Validation ===========//

                //=========== Insert Data Ajax Request ===========//
                $("#add_btn").click(function(e){
                    e.preventDefault();
                    if($("#add_form").valid()){
                        $(this).prop('disabled', true);
                        $(this).text('Saving..');
                        //Get Data From Modal Form On Click Save Button
                        var formData = new FormData($('#add_form')[0]);

                        $.ajax({
                            url: '{{ route("insert_color") }}',
                            method: 'post',
                            data : formData,
                            contentType : false,
                            processData : false,
                            dataType: "json",
                            success:function(response){
                                console.log(response);
                                if (response.status == 200) {
                                    toastr.success('Color Data Saved Successfully!', 'Successfull!');
                                    $('#add_modal').find('form')[0].reset();
                                    $('#add_btn').text('Save Color');
                                    $('#add_btn').prop('disabled', false);
                                    $('#add_modal').modal('hide');
                                    loadData();
                                }else if (response.status == "colorExist") {
                                    Swal.fire({ 
                                            title: "Color Exist!",
                                            text: "This Color Already Excst!",
                                            icon: "error", 
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { 
                                                confirmButton: "btn fw-bold btn-success"
                                                } 
                                            });
                                    $('#add_btn').text('Save Color');
                                    $('#add_btn').prop('disabled', false);
                                    
                                } else {
                                    
                                    Swal.fire({ 
                                            title: "Error!",
                                            text: "Something went wrong!",
                                            icon: "error", 
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { 
                                                confirmButton: "btn fw-bold btn-success"
                                                } 
                                            });
                                    $('#add_btn').text('Save Color');
                                    $('#add_btn').prop('disabled', false);
                                }
                            }

                        });
                    }
                });
                //=========== End Insert Data Ajax Request ===========//

                //=========== Lounch Update Modal On Click Edit Btn ===========//
                $(document).on("click", '#edit_btn', function(event){
                    event.preventDefault();
                    $("#update_modal").modal('show');

                    var id = $(this).data("eid");
                    $.ajax({
                        url: '/edit_color/'+id,
                        method: 'GET',
                        // data: { doctor_id: updateId },
                        contentType : false,
                        processData : false,
                        dataType: "json",
                        success: function(response)
                        {
                            console.log(response);
                            $('#color_id').val(response.data.id);
                            $('#color_name').val(response.data.color_name);
                            $('#color_code').val(response.data.color_code);
                            $('#color_status').val(response.data.status).trigger('change');

                            if (response.data.color_image == null || response.data.color_image == '') {
                                $('#up_uploaded-image').attr('src', 'uploads/color_image/no_image.jpg');
                            } else {
                                $('#up_uploaded-image').attr('src', 'uploads/color_image/' + response.data.color_image);
                            }

                        }
                    });
                });
                //=========== End Lounch Update Modal On Click Edit Btn ===========//

                //=========== Update Form Validation ===========//
                $("#update_form").validate({
                    rules: {
                        color_name: {
                            required: true,
                        },
                        color_code: {
                            required: true,
                        },
                        color_status: {
                            required: true
                        },
                    },
                    messages: {
                        color_name: {
                            required: "Please Enter Color Name",
                        },
                        color_code: {
                            required: "Please Color Code",
                        },
                        color_status: {
                            required: "Please Select Status",
                        },
                    },

                    //Called when the element is invalid:
                    highlight: function(element) {
                        // $(element).css('background', '#ffdddd');
                        // $(element).css('border', '1px solid red');
                        $(element).css('background-image', 'url({{ asset("backend_assets/validate/delete.png")}})');
                        $(element).css('background-repeat', 'no-repeat');
                        $(element).css('background-position', '97%');
                    },

                    // Called when the element is valid:
                    unhighlight: function(element) {
                        // $(element).css('background', '#ffffff');
                        // $(element).css('border', '1px solid green');
                        $(element).css('background-image', 'url({{ asset("backend_assets/validate/apply.png")}})');
                        $(element).css('background-repeat', 'no-repeat');
                        $(element).css('background-position', '97%');
                    }

                });
                //=========== End Update Form Validation ===========//

                //=========== Update Data Ajax Request ===========//
                $("#update_btn").click(function(e){
                    e.preventDefault();
                    if($("#update_form").valid()){
                        $(this).prop('disabled', false);
                        $(this).text('Updating..');
                        //Get Data From Modal Form On Click Save Button
                        var formData = new FormData($('#update_form')[0]);

                        $.ajax({
                            url: '{{ route("update_color") }}',
                            method: 'post',
                            data : formData,
                            contentType : false,
                            processData : false,
                            dataType: "json",
                            success:function(response){
                                console.log(response);
                                if (response.status == 200) {
                                    toastr.success('Color Data Updated Successfully!', 'Successfull!');
                                    $('#update_modal').find('input').val('');
                                    $('#update_btn').prop('disabled', false);
                                    $('#update_btn').text('Update Color');
                                    $('#update_modal').modal('hide');
                                    loadData();
                                    
                                }else if (response.status == "colorExist") {
                                    Swal.fire({ 
                                            title: "Color Exist!",
                                            text: "This Color Already Exist!",
                                            icon: "error", 
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { 
                                                confirmButton: "btn fw-bold btn-success"
                                                } 
                                            });
                                    $('#update_btn').prop('disabled', false);
                                    $('#update_btn').text('Update Color');
                                    
                                } else {
                                    
                                    Swal.fire({ 
                                        title: "Error!",
                                        text: "Update Color Error Try Again!",
                                        icon: "error", 
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: { 
                                            confirmButton: "btn fw-bold btn-success"
                                            } 
                                        });
                                    $('#update_btn').prop('disabled', false);
                                    $('#update_btn').text('Update Color');
                                }
                            }

                        });
                    }
                });
                //=========== End Update Data Ajax Request ===========//

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
                                    url: '/delete_color/'+id,
                                    type : "GET",
                                    success : function(response){
                                        if (response.status == 200)
                                        {
                                            toastr.success('Color Has Been Deleted Seccussfully!', 'Successfull!');
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
                        url: '{{ route("load_color") }}',
                        type: 'post',
                        data: { search: "", startdate: "", enddate: "",  type: "", csrf: csrf }
                    },
                    columns: [
                        { data: "id" },
                        { data: "color_image" },
                        { data: "color_name" },
                        { data: "color_code" },
                        { data: "color_status" },
                        { data: "btn" },
                        // Add more column definitions as needed
                    ],
                    columnDefs: [
                        { className: 'text-center td-30', targets: [0, 1, 2, 3, 4, 5] },
                        // Add more column definitions as needed
                    ],
                    centeredColumnsOnPrintPdf: [0, 1, 2, 3, 4, 5],
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

                //=========== Start Custom Search Box ===========//
                $('#search').keyup(function(){
                    loadData($(this).val(), "", "", $('#status').val());
                });
                //=========== End Custom Search Box ===========//
            });
        </script>

    @endsection

    