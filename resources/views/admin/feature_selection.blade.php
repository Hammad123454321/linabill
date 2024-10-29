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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Feature Selection</a></li>
                                <li class="breadcrumb-item active">Feature Selection</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Feature Selection</h4>
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
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fas fa-user me-1"></i> Add New</button>
                                    </div>
                                </div><!-- end col-->
                            </div>
    
                            <div class="table-responsive">
                                <table id="main_table" class="table table-centered table-striped dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Link</th>
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
                            <h4 class="modal-title" id="myCenterModalLabel">Add New Feature</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body p-3">
                            <form id="add_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Description</label>
                                            <input type="text" class="form-control" name="desc" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Link</label>
                                            <input type="text" class="form-control" name="link" placeholder="Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h4 class="modal-title" id="myCenterModalLabel">Update Feature</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body p-3">
                            <form id="update_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" id="featured_id" name="featured_id">
                                            <label for="name" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Description</label>
                                            <input type="text" class="form-control" name="desc" id="desc" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Link</label>
                                            <input type="text" class="form-control" name="link" id="link" placeholder="Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
                        title: {
                            required: true,
                        },
                        desc: {
                            required: true,
                        },
                        link: {
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
                            url: '{{ route("insert_feature_selection") }}',
                            method: 'post',
                            data : formData,
                            contentType : false,
                            processData : false,
                            dataType: "json",
                            success:function(response){
                                console.log(response);
                                if (response.status == 200) {
                                    toastr.success('Data Saved Successfully!', 'Successfull!');
                                    $('#add_modal').find('form')[0].reset();
                                    $('#add_btn').text('Save');
                                    $('#add_btn').prop('disabled', false);
                                    $('#add_modal').modal('hide');
                                    loadData();
                                }else {
                                    
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
                        url: 'edit_feature_selection/'+id,
                        method: 'GET',
                        // data: { doctor_id: updateId },
                        contentType : false,
                        processData : false,
                        dataType: "json",
                        success: function(response)
                        {
                            console.log(response);
                            $('#featured_id').val(response.data.id);
                            $('#title').val(response.data.title);
                            $('#desc').val(response.data.desc);
                            $('#link').val(response.data.link);

                            if (response.data.image == null || response.data.image == '') {
                                $('#up_uploaded-image').attr('src', 'uploads/no_image.jpg');
                            } else {
                                $('#up_uploaded-image').attr('src', 'uploads/feature_selection/' + response.data.image);
                            }

                        }
                    });
                });
                //=========== End Lounch Update Modal On Click Edit Btn ===========//

                //=========== Update Form Validation ===========//
                $("#update_form").validate({
                    rules: {
                        title: {
                            required: true,
                        },
                        desc: {
                            required: true,
                        },
                        link: {
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
                            url: '{{ route("update_feature_selection") }}',
                            method: 'post',
                            data : formData,
                            contentType : false,
                            processData : false,
                            dataType: "json",
                            success:function(response){
                                console.log(response);
                                if (response.status == 200) {
                                    toastr.success('Data Updated Successfully!', 'Successfull!');
                                    $('#update_modal').find('input').val('');
                                    $('#update_btn').prop('disabled', false);
                                    $('#update_btn').text('Update');
                                    $('#update_modal').modal('hide');
                                    loadData();
                                    
                                }else {
                                    
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
                                    url: 'delete_feature_selection/'+id,
                                    type : "GET",
                                    success : function(response){
                                        if (response.status == 200)
                                        {
                                            toastr.success('Data Has Been Deleted Seccussfully!', 'Successfull!');
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
                        url: '{{ route("load_feature_selection") }}',
                        type: 'post',
                        data: { search: "", startdate: "", enddate: "",  type: "", csrf: csrf }
                    },
                    columns: [
                        { data: "id" },
                        { data: "image" },
                        { data: "title" },
                        { data: "desc" },
                        { data: "link" },
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

    