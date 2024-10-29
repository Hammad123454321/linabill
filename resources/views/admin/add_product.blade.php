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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Add Product</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <style>
                .validation_error{
                    color: red !important;
                }
            </style>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-3">
                            <form action="{{ route('insert_product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="pro_name" placeholder="Enter name" value="{{ old('pro_name') }}">
                                                    <span class="validation_error">@error('pro_name') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Series</label>
                                                    <input type="text" class="form-control" name="pro_series" placeholder="Series" value="{{ old('pro_series') }}">
                                                    <span class="validation_error">@error('pro_series') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Product Price</label>
                                                    <input type="text" class="form-control" name="pro_price" placeholder="Product Price" value="{{ old('pro_price') }}">
                                                    <span class="validation_error">@error('pro_price') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Discount Price</label>
                                                    <input type="text" class="form-control" name="pro_discount" placeholder="Discount Price" value="{{ old('pro_discount') }}">
                                                    <span class="validation_error">@error('pro_discount') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Discount %</label>
                                                    <input type="text" class="form-control" name="dis_percent" placeholder="Discount %" value="{{ old('dis_percent') }}">
                                                    <span class="validation_error">@error('dis_percent') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="status" class="form-label">Size</label>
                                                    <select class="form-control" name="size" id="size">
                                                        <option value="">Select Size</option>
                                                    </select>
                                                    <span class="validation_error">@error('size') {{ $message }} @endError</span>
                                                </div>   
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Frame Weight</label>
                                                    <input type="text" class="form-control" name="frame_weight" placeholder="Frame Weight">
                                                    <span class="validation_error">@error('frame_weight') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="status" class="form-label">Rim</label>
                                                    <select class="form-control" name="pro_rim">
                                                        <option value="">Select Frame Rim</option>
                                                        <option value="Full Frame">Full Frame</option>
                                                        <option value="Semi-Rimless">Semi-Rimless</option>
                                                        <option value="Rimless">Rimless</option>
                                                    </select>
                                                    <span class="validation_error">@error('pro_rim') {{ $message }} @endError</span>
                                                </div>   
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="status" class="form-label">Material</label>
                                                    <select class="form-control" name="material" id="material">
                                                        <option value="">Select Material</option>
                                                    </select>
                                                    <span class="validation_error">@error('material') {{ $message }} @endError</span>
                                                </div>   
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="status" class="form-label">Shape</label>
                                                    <select class="form-control" name="shape" id="shape">
                                                        <option value="">Select Shape</option>
                                                    </select>
                                                    <span class="validation_error">@error('shape') {{ $message }} @endError</span>
                                                </div>   
                                            </div>
                                            
                                            
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">RX Range</label>
                                                    <input type="text" class="form-control" name="rx_range" placeholder="RX Range" value="{{ old('rx_range') }}">
                                                    <span class="validation_error">@error('rx_range') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">PD Range</label>
                                                    <input type="text" class="form-control" name="pd_range" placeholder="PD Range" value="{{ old('pd_range') }}">
                                                    <span class="validation_error">@error('pd_range') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="status" class="form-label">Spring Hing</label>
                                                    <select class="form-control" name="spring_hing">
                                                        <option value="">Select Spring Hing</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <span class="validation_error">@error('spring_hing') {{ $message }} @endError</span>
                                                </div>   
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Frame Width</label>
                                                    <input type="text" class="form-control" name="frame_width" placeholder="Frame Width" value="{{ old('frame_width') }}">
                                                    <span class="validation_error">@error('frame_width') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Lens Width</label>
                                                    <input type="text" class="form-control" name="lens_width" placeholder="Lens Width" value="{{ old('lens_width') }}">
                                                    <span class="validation_error">@error('lens_width') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Lens Height</label>
                                                    <input type="text" class="form-control" name="lens_height" placeholder="Lens Height" value="{{ old('lens_height') }}">
                                                    <span class="validation_error">@error('lens_height') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Bridge</label>
                                                    <input type="text" class="form-control" name="bridge" placeholder="Bridge" value="{{ old('bridge') }}">
                                                    <span class="validation_error">@error('bridge') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Temple</label>
                                                    <input type="text" class="form-control" name="temple" placeholder="Temple" value="{{ old('temple') }}">
                                                    <span class="validation_error">@error('temple') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Product Discription</label>
                                                    <textarea name="pro_desc" class="form-control" cols="10" rows="2">{{ old('pro_desc') }}</textarea>
                                                    <span class="validation_error">@error('pro_desc') {{ $message }} @endError</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col-lg-2 text-center">
                                                        <h6>Thumbnail 1</h6>
                                                        <input type="file" name="thumbnail1" id="image" accept="image/*" style="display: none;">
                                                        <label for="image" class="image-label" style="border:1px solid #dee2e6;">
                                                            <img src="{{ asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="uploaded-image" height="120" width="120">
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-2 text-center">

                                                        <h6>Thumbnail 2</h6>
                                                        <input type="file" name="thumbnail2" id="image1" accept="image/*" style="display: none;">
                                                        <label for="image1" class="image-label" style="border:1px solid #dee2e6;">
                                                            <img src="{{ asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="uploaded-image1" height="120" width="120">
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-8 text-end">
                                                        <div class="text-lg-end">
                                                            <button type="button" id="add_row" class="btn btn-danger waves-effect waves-light mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New</button>
                                                        </div>
                                                    </div><!-- end col-->
                                                </div>
                        
                                                <div class="table-responsive">
                                                    <table class="table table-centered table-nowrap mb-0" id="product_table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>SKU</th>
                                                                <th>Color</th>
                                                                <th>Color Thumbnail</th>
                                                                <th>Other Images</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control" name="sku[]" placeholder="Product SKU"></td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <select class="form-control color" name="color[]">
                                                                            <option value="">Select Color</option>
                                                                        </select>
                                                                    </div> 
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input type="file" name="color_thumbnail[]" id="color_thumbnail" accept="image/*" style="display: none;">
                                                                        <label for="color_thumbnail" class="image-label" style="border:1px solid #dee2e6;">
                                                                            <img src="{{ asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="color_thumbnail_view" height="60" width="60">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <input type="file" id="imageUploadInput" name="images[0][]" multiple accept="image/*">
                                                                        <div id="imagePreview"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-soft-danger remove_row"> <i class="mdi mdi-close"></i></button>
                                                                </td>
                                                            </tr>
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
        
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                    
                                </div>
            
                                <div class="text-center" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-success waves-effect waves-light" id="add_btn">Save</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                            
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div>
        <script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){

                // Image preview event handler for dynamically added inputs
                function bindImagePreview(inputElement, previewElement) {
                    $(inputElement).on('change', function () {
                        $(previewElement).html(''); // Clear previous previews
                        var files = this.files;
                        if (files) {
                            $.each(files, function (index, file) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var img = $('<img>').attr('src', e.target.result).css({
                                        'width': '60px',
                                        'height': '60px',
                                        'margin-right': '5px'
                                    });
                                    $(previewElement).append(img);
                                };
                                reader.readAsDataURL(file);
                            });
                        }
                    });
                }

                var imageIndex = 1;
                //=========== Insert Data Ajax Request ===========//
                $("#add_row").click(function(e) {
                    e.preventDefault();

                    var html = '<tr>' +
                                    '<td>' +
                                        '<input type="text" class="form-control" name="sku[]" placeholder="Product SKU">' +
                                    '</td>' +
                                    '<td>' +
                                        '<div class="form-group">' +
                                            '<select class="form-control color" name="color[]">' +
                                                '<option value="">Select Color</option>' +
                                            '</select>' +
                                        '</div>' +
                                    '</td>' +
                                    '<td>' +
                                        '<div>' +
                                            // Use dynamic IDs for color_thumbnail and color_thumbnail_preview
                                            '<input type="file" name="color_thumbnail[]" id="color_thumbnail' + imageIndex + '" accept="image/*" style="display: none;">' +
                                            '<label for="color_thumbnail' + imageIndex + '" class="image-label" style="border:1px solid #dee2e6;">' +
                                                '<img src="{{ asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="color_thumbnail_preview' + imageIndex + '" height="60" width="60">' +
                                            '</label>' +
                                        '</div>' +
                                    '</td>' +
                                    '<td>' +
                                        '<div class="row">' +
                                            '<input type="file" class="imageUploadInput" name="images[' + imageIndex + '][]" multiple accept="image/*">' +
                                            '<div class="imagePreview"></div>' +
                                        '</div>' +
                                    '</td>' +
                                    '<td>' +
                                        '<button class="btn btn-soft-danger remove_row"> <i class="mdi mdi-close"></i></button>' +
                                    '</td>' +
                                '</tr>';

                    var newRow = $(html);

                    // Append the new row to the table body
                    $("#product_table > tbody:last").append(newRow);

                    // Initialize Select2 on the new row's color dropdown (assuming get_colors is a function to populate colors)
                    get_colors(newRow.find('.color'));

                    // Bind image preview event for other images in the new row
                    bindImagePreview(newRow.find('.imageUploadInput'), newRow.find('.imagePreview'));

                    // Increment the image index for next row
                    imageIndex++;
                });
                //=========== End Insert Data Ajax Request ===========//

                // Use event delegation for dynamically added color_thumbnail input
$(document).on('change', 'input[type="file"][id^="color_thumbnail"]', function() {
    var inputId = $(this).attr('id'); // Get the ID of the file input that triggered the event
    var file = this.files[0]; // Get the selected file

    if (file) {
        var reader = new FileReader(); // Create a FileReader to read the file data
        reader.onload = function(event) {
            // Dynamically update the corresponding image preview
            $('#' + inputId.replace('color_thumbnail', 'color_thumbnail_preview')).attr('src', event.target.result).show();
        };
        reader.readAsDataURL(file); // Read the file as a Data URL (base64)
    }
});

                //=========== Remove Row Button ===========//
                // Delegate event to remove row
                $(document).on('click', '.remove_row', function(e) {
                    e.preventDefault();
                    $(this).closest('tr').remove();
                });
                //=========== End Remove Row Button ===========//


        // Call for the first time to populate colors for the initial row
        get_colors($('.color'));

        // Bind image preview for the first image input
        bindImagePreview('#imageUploadInput', '#imagePreview');
        //=========== Get Doctors On Load ===========//
        function get_colors(colorDropdown) {
            $.ajax({
                url: 'get_color',
                method: 'GET',
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, item) {
                        if (colorDropdown.find('option[value="' + item.id + '"]').length == 0) {
                            colorDropdown.append($('<option>', {
                                value: item.id,
                                text: item.color_name,
                            }));
                        }
                    });
                }
            });
        }
        //=========== End Get Doctors On Load ===========//

        get_sizes($('#size'));
        function get_sizes(colorDropdown) {
            $.ajax({
                url: 'get_sizes',
                method: 'GET',
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, item) {
                        if (colorDropdown.find('option[value="' + item.id + '"]').length == 0) {
                            colorDropdown.append($('<option>', {
                                value: item.id,
                                text: item.size_name,
                            }));
                        }
                    });
                }
            });
        }

        get_materials($('#material'));
        function get_materials(colorDropdown) {
            $.ajax({
                url: 'get_materials',
                method: 'GET',
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, item) {
                        if (colorDropdown.find('option[value="' + item.id + '"]').length == 0) {
                            colorDropdown.append($('<option>', {
                                value: item.id,
                                text: item.mat_name,
                            }));
                        }
                    });
                }
            });
        }

        get_shapes($('#shape'));
        function get_shapes(colorDropdown) {
            $.ajax({
                url: 'get_shapes',
                method: 'GET',
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, item) {
                        if (colorDropdown.find('option[value="' + item.id + '"]').length == 0) {
                            colorDropdown.append($('<option>', {
                                value: item.id,
                                text: item.shape_name,
                            }));
                        }
                    });
                }
            });
        }


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

                $('#image1').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#uploaded-image1').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });


                $('#color_thumbnail').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#color_thumbnail_view').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });




            });
        </script>

    @endsection

    