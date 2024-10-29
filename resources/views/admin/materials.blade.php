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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Materials</a></li>
                                <li class="breadcrumb-item active">Materials</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Materials</h4>
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
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fas fa-user me-1"></i> Add New Material</button>
                                    </div>
                                </div><!-- end col-->
                            </div>
    
                            <div class="table-responsive">
                                <table id="main_table" class="table table-centered table-striped dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Material Name</th>
                                            <th>Material Tag Line</th>
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
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h4 class="modal-title" id="myCenterModalLabel">Add New Material</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body p-3">
                            <form id="add_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Material Name</label>
                                                    <input type="text" class="form-control" name="mat_name" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Material Tag Line</label>
                                                    <input type="text" class="form-control" name="mat_tag_line" placeholder="Enter Tag Line">
                                                </div>
                                            </div>
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
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h4 class="modal-title" id="myCenterModalLabel">Update Material</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body p-3">
                            <form id="update_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="mat_id" name="mat_id">
                                                    <label for="name" class="form-label">Material Name</label>
                                                    <input type="text" class="form-control" name="mat_name" id="mat_name" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Material Tag Line</label>
                                                    <input type="text" class="form-control" name="mat_tag_line" id="mat_tag_line" placeholder="Enter Tag Line">
                                                </div>
                                            </div>
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
                        mat_name: {
                            required: true,
                        },
                    },

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
                            url: '{{ route("insert_material") }}',
                            method: 'post',
                            data : formData,
                            contentType : false,
                            processData : false,
                            dataType: "json",
                            success:function(response){
                                console.log(response);
                                if (response.status == 200) {
                                    toastr.success('Material Saved Successfully!', 'Successfull!');
                                    $('#add_modal').find('form')[0].reset();
                                    $('#add_btn').text('Save');
                                    $('#add_btn').prop('disabled', false);
                                    $('#add_modal').modal('hide');
                                    loadData();
                                }else if (response.status == "Exist") {
                                    Swal.fire({ 
                                            title: "Material Exist!",
                                            text: "This Material Already Excst!",
                                            icon: "error", 
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { 
                                                confirmButton: "btn fw-bold btn-success"
                                                } 
                                            });
                                    $('#add_btn').text('Save');
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
                                    $('#add_btn').text('Save');
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
                        url: '/edit_material/'+id,
                        method: 'GET',
                        // data: { doctor_id: updateId },
                        contentType : false,
                        processData : false,
                        dataType: "json",
                        success: function(response)
                        {
                            console.log(response);
                            $('#mat_id').val(response.data.id);
                            $('#mat_name').val(response.data.mat_name);
                            $('#mat_tag_line').val(response.data.mat_tag_line);

                        }
                    });
                });
                //=========== End Lounch Update Modal On Click Edit Btn ===========//

                //=========== Update Form Validation ===========//
                $("#update_form").validate({
                    rules: {
                        mat_name: {
                            required: true,
                        },
                    },

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
                            url: '{{ route("update_material") }}',
                            method: 'post',
                            data : formData,
                            contentType : false,
                            processData : false,
                            dataType: "json",
                            success:function(response){
                                console.log(response);
                                if (response.status == 200) {
                                    toastr.success('Material Data Updated Successfully!', 'Successfull!');
                                    $('#update_modal').find('input').val('');
                                    $('#update_btn').prop('disabled', false);
                                    $('#update_btn').text('Update');
                                    $('#update_modal').modal('hide');
                                    loadData();
                                    
                                }else if (response.status == "Exist") {
                                    Swal.fire({ 
                                            title: "Material Exist!",
                                            text: "This Material Already Exist!",
                                            icon: "error", 
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { 
                                                confirmButton: "btn fw-bold btn-success"
                                                } 
                                            });
                                    $('#update_btn').prop('disabled', false);
                                    $('#update_btn').text('Update');
                                    
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
                                    $('#update_btn').text('Update');
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
                                    url: '/delete_material/'+id,
                                    type : "GET",
                                    success : function(response){
                                        if (response.status == 200)
                                        {
                                            toastr.success('Material Has Been Deleted Seccussfully!', 'Successfull!');
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
                        url: '{{ route("load_materials") }}',
                        type: 'post',
                        data: { search: "", startdate: "", enddate: "",  type: "", csrf: csrf }
                    },
                    columns: [
                        { data: "id" },
                        { data: "mat_name" },
                        { data: "mat_tag_line" },
                        { data: "status" },
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
            });
        </script>

    @endsection

    