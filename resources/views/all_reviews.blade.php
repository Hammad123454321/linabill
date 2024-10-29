@extends('main_layout')


@section('main_contant')


<!-- ========================== Product Details Two Start =========================== -->
<section class="product-details py-10">
    <div class="container container-lg">
        

        <div class="pt-12">
            <div class="product-dContent border rounded-12">
                <div class="p-16">
                    <div class="tab-content" id="pills-tabContent">

                        <!-- ========================== Shipping Section Start ============================ -->
                         <section class="shipping py-20" id="shipping">
                            <div class="container container-lg">
                                <div class="section-heading mb-24">
                                    <div class="gap-8 text-center">
                                        <h5 class="mb-0">Customer Reviews</h5>
                                        <p>({{ $total_reviews }})</p>
                                    </div>
                                </div>

                                <div class="row gy-2 rounded-8 p-20" style="background-color: #f6f6f6;">
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-12">
                                                    <div class="rounded-8 flex-center flex-column  text-center py-20 px-24">
                                                    <h3 class="mb-4 text-main-600">{{ number_format($ratings->rating, 1) }}</h3>
                                                    <div class="flex-center gap-8">
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="mt-4 text-gray-500">Average Rating</span>
                                                </div>
                                                </div>
                                                <div class="col-xl-8 col-sm-12">
                                                    <div class="rounded-8 px-24 py-20 flex-grow-1">
                                                        <div class="flex-align gap-8 mb-10">
                                                            <span class="text-gray-900 flex-shrink-0">Quality </span>
                                                            <span class="text-gray-900 flex-shrink-0"> {{ number_format($ratings->quality, 1) }}</span>
                                                            <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="{{ number_format($ratings->quality, 1) }}" aria-valuemin="0" aria-valuemax="5">
                                                                <div class="progress-bar bg-main-600 rounded-pill" style="width: {{ number_format(($ratings->rating / 5) * 100, 1) }}%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-align gap-8 mb-10">
                                                            <span class="text-gray-900 flex-shrink-0">Style </span>
                                                            <span class="text-gray-900 flex-shrink-0"> &nbsp; &nbsp;{{ number_format($ratings->style, 1) }}</span>
                                                            <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="5">
                                                                <div class="progress-bar bg-main-600 rounded-pill" style="width: {{ number_format(($ratings->style / 5) * 100, 1) }}%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-align gap-8 mb-10">
                                                            <span class="text-gray-900 flex-shrink-0">Fit </span>
                                                            <span class="text-gray-900 flex-shrink-0"> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;{{ number_format($ratings->fit, 1) }}</span>
                                                            <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="5">
                                                                <div class="progress-bar bg-main-600 rounded-pill" style="width: {{ number_format(($ratings->fit / 5) * 100, 1) }}%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
      
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 feature m-0">
                                        <div class="review-box-r arrow-center">
                                            <div class="flex-align">
                                                <button type="button" id="feature-item-wrapper-prev1" class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1" >
                                                    <i class="ph ph-caret-left"></i>
                                                </button>
                                                <button type="button" id="feature-item-wrapper-next1" class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1" >
                                                    <i class="ph ph-caret-right"></i>
                                                </button>
                                            </div>
                                            <div class="right-reviews">
                                                <div class="feature-item-wrapper1">
                                                    @foreach ($review_images as $image)
                                                    <div class="swiper-slide item-reviews" style="margin-right: 10px;">
                                                        <div class="img-box">
                                                            <div>
                                                                <img class="right-review-img" src="{{ asset('uploads/review_images/'.$image->image) }}" lazy="loaded">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </section>
                        <!-- ========================== Shipping Section End ============================ -->

                        <div class="mt-24">

                            @foreach ($reviews as $review)
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="review-list-l">
                                        <h6 class="text-gray-400 roboto-bold mb-8"> 
                                        “{{ $review->review_title}}” </h6>
                                        <div class="flex-align mb-10">
                                            <div class="tips-li">Quality {{ number_format($review->quality, 1) }}</div>
                                            <div class="tips-li">Style {{ number_format($review->style, 1) }}</div>
                                            <div class="tips-li">Fit {{ number_format($review->fit, 1) }}</div>
                                        </div>
                                        <div class="middle">
                                            <div>{{ $review->review_details}}</div>
                                        </div>
                                        <div class="review-list-b flex-align py-10 mt-24">
                                            <div>
                                                <span class="time">{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}, </span>
                                                {{-- <span class="name">by </span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="review-list-r">

                                        @if (isset($review_images_grouped[$review->id]))
                                            @foreach ($review_images_grouped[$review->id] as $image)
                                                <img class="review-img" src="{{ asset('uploads/review_images/'.$image) }}">
                                            @endforeach
                                        @endif
                                        
                                    </div>
                                </div>
                                <hr class="mb-20">
                            </div>
                            @endforeach
                            

                            @if(Auth::check() && $hasPurchased && $has_reviews < 0)
                            <div class="row">
                                <div class="col-xl-8 offset-2">
                                    <div class="mt-56">
                                        <div class="mt-32">
                                            <form action="{{ route('save_review') }}" method="POST" enctype="multipart/form-data">
                                                @csrf  
                                                <input type="hidden" name="product_id" value="{{$id}}" class="common-input rounded-8" id="title">
                                                <div class="mb-32">
                                                    <label for="title" class="text-neutral-600 mb-8">Review Title</label>
                                                    <input type="text" name="review_title" class="common-input rounded-8" id="title" placeholder="Great Products">
                                                </div>
                                                <div class="mb-32">
                                                    <label for="desc" class="text-neutral-600 mb-8">Review Content</label>
                                                    <textarea name="review_desc" class="common-input rounded-8" id="desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="">
                                                            <input type="hidden" name="rating" id="rating" value="0" required>
                                                            <span class="text-heading mb-8">Rating</span>
                                                            <div class="flex-align gap-8">
                                                                <span class="text-15 fw-medium text-warning-600 d-flex rating" data-value="1"><i class="fa-light fa-star rating_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex rating" data-value="2"><i class="fa-light fa-star rating_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex rating" data-value="3"><i class="fa-light fa-star rating_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex rating" data-value="4"><i class="fa-light fa-star rating_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex rating" data-value="5"><i class="fa-light fa-star rating_icon"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="">
                                                            <input type="hidden" name="quality" id="quality" value="0" required>
                                                            <span class="text-heading mb-8">Quality</span>
                                                            <div class="flex-align gap-8">
                                                                <span class="text-15 fw-medium text-warning-600 d-flex quality" data-value="1"><i class="fa-light fa-star quality_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex quality" data-value="2"><i class="fa-light fa-star quality_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex quality" data-value="3"><i class="fa-light fa-star quality_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex quality" data-value="4"><i class="fa-light fa-star quality_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex quality" data-value="5"><i class="fa-light fa-star quality_icon"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="">
                                                            <input type="hidden" name="style" id="style" value="0" required>
                                                            <span class="text-heading mb-8">Style</span>
                                                            <div class="flex-align gap-8">
                                                                <span class="text-15 fw-medium text-warning-600 d-flex style" data-value="1"><i class="fa-light fa-star style_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex style" data-value="2"><i class="fa-light fa-star style_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex style" data-value="3"><i class="fa-light fa-star style_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex style" data-value="4"><i class="fa-light fa-star style_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex style" data-value="5"><i class="fa-light fa-star style_icon"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="">
                                                            <input type="hidden" name="fit" id="fit" value="0" required>
                                                            <span class="text-heading mb-8">Fit</span>
                                                            <div class="flex-align gap-8">
                                                                <span class="text-15 fw-medium text-warning-600 d-flex fit" data-value="1"><i class="fa-light fa-star fit_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex fit" data-value="2"><i class="fa-light fa-star fit_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex fit" data-value="3"><i class="fa-light fa-star fit_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex fit" data-value="4"><i class="fa-light fa-star fit_icon"></i></span>
                                                                <span class="text-15 fw-medium text-warning-600 d-flex fit" data-value="5"><i class="fa-light fa-star fit_icon"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                         <!-- Image Upload -->
                                                        <div class="form-group mt-24">
                                                            <label for="images">Upload Images (Max 5)</label>
                                                            <input type="file" name="review_images[]" id="images" class="form-control" multiple accept="image/*" onchange="previewImages();" required>
                                                            <div id="image-preview" class="mt-8"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <button type="submit" class="btn btn-main rounded-pill mt-48">Submit Review</button>
                                            </form>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            @else
                                <h6>Login to post review</h6>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================== Product Details Two End =========================== -->

@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Handle star rating clicks
    $(document).on('click', '.rating', function() {
        var rating = $(this).data('value');  // Get the value of the clicked star

        // Update the hidden input with the selected rating value
        $('#rating').val(rating);

        // Reset all stars to `fa-light` (empty stars)
        $('.rating .rating_icon').removeClass('fa-solid').addClass('fa-light');

        // For all previous stars including the clicked one, change class to `fa-solid` (filled stars)
        $(this).prevAll().each(function() {
            $(this).find('.rating_icon').removeClass('fa-light').addClass('fa-solid');
        });

        // Change class for the clicked star
        $(this).find('.rating_icon').removeClass('fa-light').addClass('fa-solid');
    });


    // Handle star Quality clicks
    $(document).on('click', '.quality', function() {
        var rating = $(this).data('value');  // Get the value of the clicked star

        // Update the hidden input with the selected rating value
        $('#quality').val(rating);

        // Reset all stars to `fa-light` (empty stars)
        $('.quality .quality_icon').removeClass('fa-solid').addClass('fa-light');

        // For all previous stars including the clicked one, change class to `fa-solid` (filled stars)
        $(this).prevAll().each(function() {
            $(this).find('.quality_icon').removeClass('fa-light').addClass('fa-solid');
        });

        // Change class for the clicked star
        $(this).find('.quality_icon').removeClass('fa-light').addClass('fa-solid');
    });

    // Handle star Quality clicks
    $(document).on('click', '.style', function() {
        var rating = $(this).data('value');  // Get the value of the clicked star

        // Update the hidden input with the selected rating value
        $('#style').val(rating);

        // Reset all stars to `fa-light` (empty stars)
        $('.style .style_icon').removeClass('fa-solid').addClass('fa-light');

        // For all previous stars including the clicked one, change class to `fa-solid` (filled stars)
        $(this).prevAll().each(function() {
            $(this).find('.style_icon').removeClass('fa-light').addClass('fa-solid');
        });

        // Change class for the clicked star
        $(this).find('.style_icon').removeClass('fa-light').addClass('fa-solid');
    });


    // Handle star Quality clicks
    $(document).on('click', '.fit', function() {
        var rating = $(this).data('value');  // Get the value of the clicked star

        // Update the hidden input with the selected rating value
        $('#fit').val(rating);

        // Reset all stars to `fa-light` (empty stars)
        $('.fit .fit_icon').removeClass('fa-solid').addClass('fa-light');

        // For all previous stars including the clicked one, change class to `fa-solid` (filled stars)
        $(this).prevAll().each(function() {
            $(this).find('.fit_icon').removeClass('fa-light').addClass('fa-solid');
        });

        // Change class for the clicked star
        $(this).find('.fit_icon').removeClass('fa-light').addClass('fa-solid');
    });

});

</script>

<script>
    // Image preview function
    function previewImages() {
        var input = document.getElementById('images');
        var preview = document.getElementById('image-preview');
        
        preview.innerHTML = ''; // Clear any existing previews
    
        if (input.files.length > 5) {
            alert('You can upload a maximum of 5 images.');
            input.value = ''; // Clear the input if the limit is exceeded
            return;
        }
    
        // Loop through the selected files and generate previews
        Array.from(input.files).forEach(function (file) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail mr-2';
                img.style.width = '100px';
                img.style.height = '100px';
                
                // Append the image to the preview container
                preview.appendChild(img);
            };
    
            reader.readAsDataURL(file); // Convert the file to a data URL
        });
    }
</script>
@endsection