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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">header</a></li>
                                <li class="breadcrumb-item active">header</li>
                            </ol>
                        </div>
                        <h4 class="page-title">header</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-3">
                            <form action="{{ route('update_com_detail') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row mb-2">
                                <div class="col-lg-4">
        
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Company Phone</label>
                                            <input type="text" name="com_phone" class="form-control" value="{{ $header->com_phone }}">
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Company Email</label>
                                            <input type="text" name="com_email" class="form-control" value="{{ $header->com_email }}">
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Company Address</label>
                                            <input type="text" name="com_address" class="form-control" value="{{ $header->com_address }}">
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" >Company Detail</label>
                                            <textarea name="com_detail" class="form-control" cols="10" rows="2">{{ $header->com_detail }}</textarea>
                                        </div>                          
                                    </div>
                                
                                    
                                
                                </div>
                                <div class="col-lg-4">
        
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Facebook Link</label>
                                            <input type="text" name="fb_link" class="form-control" value="{{ $header->fb_link }}">
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Instagram Link</label>
                                            <input type="text" name="insta_link" class="form-control" value="{{ $header->insta_link }}">
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Twitter Link</label>
                                            <input type="text" name="x_link" class="form-control" value="{{ $header->x_link }}">
                                        </div>                          
                                    </div>

                                
                                    
                                
                                </div>
                                <div class="col-lg-4">

                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Youtube Link</label>
                                            <input type="text" name="youtube_link" class="form-control" value="{{ $header->youtube_link }}">
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div>
                                            <label for="" class="form-label">Tiktok Link</label>
                                            <input type="text" name="tiktok_link" class="form-control" value="{{ $header->tiktok_link }}">
                                        </div>                          
                                    </div>

                                
                                    
                                
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center" style="margin-top: 20px; margin-bottom: 20px">
                                        <button type="submit" class="btn btn-danger waves-effect waves-light"><i class="fas fa-user me-1"></i> Update</button>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row mb-2">
                                {{-- @dd($header) --}}
                                <div class="col-lg-4" style="border: 1px solid rgb(201, 201, 201); border-radius: 3%">
                                    <form action="{{ route('update_header') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="col-lg-12">
                                        <div style="text-align:center;">
                                            <label for="" class="form-label">Header Left Text</label>
                                            <input type="text" name="heading_text" class="form-control" value="{{ $header->heading_text }}">
                                        </div>                          
                                    </div>
                                    <div class="col-lg-12">
                                        <div style="text-align:center; margin-top: 20px">
                                            <h6 class="form-label">Top Bar Image</h6>
                                            <input type="file" name="top_bar_image" id="top_bar_image" accept="image/*" style="display: none;">
                                            <label for="top_bar_image" class="image-label" style="border:1px solid #dee2e6;">
                                                <img src="{{ $header->top_bar_image ? asset('uploads/header_image/'. $header->top_bar_image) : asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="top_bar_image_view" height="120" width="120">
                                            </label>
                                        </div>                          
                                    </div>
                                    <div class="col-lg-12">
                                        <div style="text-align:center; margin-top: 20px">
                                            <h6 class="form-label">Logo</h6>
                                            <input type="file" name="logo_image" id="logo" accept="image/*" style="display: none;">
                                            <label for="logo" class="image-label" style="border:1px solid #dee2e6;">
                                                <img src="{{ $header->logo ? asset('uploads/header_image/'. $header->logo) : asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="logo_view" height="120" width="120">
                                            </label>
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div style="text-align:center;">
                                            <label for="" class="form-label">Video Link</label>
                                            <input type="text" name="video_link" class="form-control" value="{{ $header->video_link }}">
                                        </div>                          
                                    </div>
                                
                                    <div class="col-lg-12">
                                        <div class="text-center" style="margin-top: 20px">
                                            <button type="submit" class="btn btn-danger waves-effect waves-light"><i class="fas fa-user me-1"></i> Update</button>
                                        </div>
                                    </div><!-- end col-->
                                </form>
                                </div>
                            
                            
                                <div class="col-lg-4" style="border: 1px solid rgb(201, 201, 201); border-radius: 3%">
                                    <form action="{{ route('update_banner1') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="col-lg-12">
                                        <div style="text-align:center;">
                                            <label for="" class="form-label">Banner Title</label>
                                            <input type="text" name="banner_title" class="form-control" value="{{ $header->banner1_title }}">
                                        </div>                          
                                    </div>
                                    <div class="col-lg-12">
                                        <div style="text-align:center;">
                                            <label for="" class="form-label">Banner Description</label>
                                            <input type="text" name="banner_desc" class="form-control" value="{{ $header->banner1_desc }}">
                                        </div>                          
                                    </div>
                                    <div class="col-lg-12">
                                        <div style="text-align:center;">
                                            <label for="" class="form-label">Banner Link</label>
                                            <input type="text" name="banner_link" class="form-control" value="{{ $header->banner1_link }}">
                                        </div>                          
                                    </div>
                                    <div class="col-lg-12">
                                        <div style="text-align:center; margin-top: 20px">
                                            <h6 class="form-label">Banner Background</h6>
                                            <input type="file" name="banner_background" id="banner_background" accept="image/*" style="display: none;">
                                            <label for="banner_background" class="image-label" style="border:1px solid #dee2e6;">
                                                <img src="{{ $header->banner1_image ? asset('uploads/header_image/'. $header->banner1_image) : asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="banner_background_view" height="120" width="120">
                                            </label>
                                        </div>                          
                                    </div>
                                
                                    <div class="col-lg-12">
                                        <div class="text-center" style="margin-top: 20px">
                                            <button type="submit" class="btn btn-danger waves-effect waves-light"><i class="fas fa-user me-1"></i> Update</button>
                                        </div>
                                    </div><!-- end col-->
                                </form>
                                </div>
                            
                            
                                <div class="col-lg-4" style="border: 1px solid rgb(201, 201, 201); border-radius: 3%">
                                    <form action="{{ route('update_banner2') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="col-lg-12">
                                        <div style="text-align:center; margin-top: 20px">
                                            <h6 class="form-label">Banner 2 Main Image</h6>
                                            <input type="file" name="banner2_image" id="banner2_image" accept="image/*" style="display: none;">
                                            <label for="banner2_image" class="image-label" style="border:1px solid #dee2e6;">
                                                <img src="{{ $header->banner2_image ? asset('uploads/header_image/'. $header->banner2_image) : asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="banner2_image_view" height="120" width="120">
                                            </label>
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div style="text-align:center; margin-top: 20px">
                                            <h6 class="form-label">Left Image</h6>
                                            <input type="file" name="banner2_left_image" id="banner2_left_image" accept="image/*" style="display: none;">
                                            <label for="banner2_left_image" class="image-label" style="border:1px solid #dee2e6;">
                                                <img src="{{ $header->banner2_left ? asset('uploads/header_image/'. $header->banner2_left) : asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="banner2_left_image_view" height="120" width="120">
                                            </label>
                                        </div>                          
                                    </div>

                                    <div class="col-lg-12">
                                        <div style="text-align:center; margin-top: 20px">
                                            <h6 class="form-label">Right Image</h6>
                                            <input type="file" name="banner2_right_image" id="banner2_right_image" accept="image/*" style="display: none;">
                                            <label for="banner2_right_image" class="image-label" style="border:1px solid #dee2e6;">
                                                <img src="{{ $header->banner2_right ? asset('uploads/header_image/'. $header->banner2_right) : asset('uploads/no_image.jpg') }}" alt="Uploaded Image" class="uploaded-image" id="banner2_right_image_view" height="120" width="120">
                                            </label>
                                        </div>                          
                                    </div>
                                
                                    <div class="col-lg-12">
                                        <div class="text-center" style="margin-top: 20px">
                                            <button type="submit" class="btn btn-danger waves-effect waves-light"><i class="fas fa-user me-1"></i> Update</button>
                                        </div>
                                    </div><!-- end col-->
                                </form>
                                </div>
                            
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

                //==========For Add===========//
                $('#top_bar_image').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#top_bar_image_view').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                $('#logo').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#logo_view').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                $('#banner_background').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#banner_background_view').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                $('#banner2_image').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#banner2_image_view').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                $('#banner2_left_image').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#banner2_left_image_view').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                $('#banner2_right_image').change(function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('#banner2_right_image_view').attr('src', event.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });


            });
        </script>

    @endsection

    