<div class="col-lg-3">
    <div class="shop-sidebar">
        <button type="button" class="shop-sidebar__close d-lg-none d-flex w-32 h-32 flex-center border border-gray-100 rounded-circle hover-bg-main-600 position-absolute inset-inline-end-0 me-10 mt-8 hover-text-white hover-border-main-600">
            <i class="ph ph-x"></i>
        </button>
        <div class="shop-sidebar__box border border-gray-100 rounded-8 p-24 mb-24">
            <h6 class="text-xl border-bottom border-gray-100 pb-12 mb-12">Shape</h6>
            <ul class="max-h-540 overflow-y-auto scroll-sm">
                @foreach($shapes as $shape)
                    <li class="mb-12">
                        <a href="{{ route('shop_by_shape', $shape->shape_name) }}" class="text-gray-900 hover-text-main-600">
                            <img src="{{ asset('uploads/shape_images/'.$shape->shape_image) }}" width="50" height="auto" alt="{{$shape->shape_name}}">{{ $shape->shape_name }}</a>
                    </li>
                @endforeach
                
            </ul>
        </div>
        <div class="shop-sidebar__box border border-gray-100 rounded-8 p-24 mb-24">
            <h6 class="text-xl border-bottom border-gray-100 pb-12 mb-12">Sizes</h6>
            <ul style="display: flex; justify-content: space-around;">
                @foreach($sizes as $size)
                    <li class="mb-12">
                        <a href="{{ route('shop_by_size', $size->size_name) }}" class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">{{ $size->size_name }}</a>
                    </li>
                @endforeach
                
            </ul>
        </div>
        <div class="shop-sidebar__box border border-gray-100 rounded-8 p-24 mb-24">
            <h6 class="text-xl border-bottom border-gray-100 pb-12 mb-12">Colors</h6>
            <ul class="" style="display: flex; flex-wrap: wrap;">
                @foreach($colors as $color)
                    <li class="mb-12 mx-4">
                        <a href="{{ route('shop_by_color', $color->color_name) }}" class="color" data-bs-toggle="tooltip" title="{{$color->color_name}}">
                            <div class="wrap-color-img">
                                <img src="{{ asset('uploads/color_image/'.$color->color_image) }}" width="30" height="auto" alt="{{$color->color_name}}" style="border-radius: 100%">
                            </div>
                        </a>
                    </li>
                @endforeach
                
            </ul>
        </div>
        <form action="{{ route('filter_by_price') }}" method="GET" class="flex-align flex-wrap">
        <div class="shop-sidebar__box border border-gray-100 rounded-8 p-32 mb-32 w-100">
            <h6 class="text-xl border-bottom border-gray-100 pb-24 mb-24">Filter by Price</h6>
            <div class="custom--range">
                <div id="slider-range"></div>
                <div class="flex-between flex-wrap-reverse gap-8 mt-24 ">
                    <button type="submit" class="btn btn-main h-40 flex-align">Filter </button>
                    <div class="custom--range__content flex-align gap-8">
                        <span class="text-gray-500 text-md flex-shrink-0">Price:</span>
                        <input type="hidden" name="start_price" class="form-control" id="start_price">
                        <input type="hidden" name="end_price" class="form-control" id="end_price">
                        <input type="text" class="custom--range__prices text-neutral-600 text-start text-md fw-medium" id="amount" readonly>
                        
                    </div>
                </div>
            </div>
            
        </div>
        </form>
        <div class="shop-sidebar__box border border-gray-100 rounded-8 p-24 mb-24">
            <h6 class="text-xl border-bottom border-gray-100 pb-12 mb-12">Material</h6>
            <ul class="max-h-540 overflow-y-auto scroll-sm">
                @foreach($materials as $material)
                    <li class="mb-12">
                        <a href="{{ route('shop_by_material', $material->mat_name) }}" class="text-gray-900 hover-text-main-600">{{ $material->mat_name }}</a>
                    </li>
                @endforeach
                
            </ul>
        </div>
        {{-- <div class="shop-sidebar__box rounded-8">
            <img src="assets/images/thumbs/advertise-img1.png" alt="">
        </div> --}}
    </div>
</div>