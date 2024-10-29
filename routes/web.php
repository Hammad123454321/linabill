<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LensController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShapeController;
use App\Http\Controllers\FeatureSelection;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CoatingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NewBannerController;
use App\Http\Controllers\FeatureSelectionContr;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\StyleChoiceController;
use App\Http\Controllers\LensSelectionController;
use App\Http\Controllers\MainBannerController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\StripePaymentController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('account', function () {
    return view('account');
})->name('account');

Route::get('/product_detail/{id}/{sku_id}', [ProductDetailController::class, 'product_detail'])->name('product_detail');
Route::post('add_to_cart', [ProductDetailController::class, 'add_to_cart'])->name('add_to_cart');

Route::get('/prescriptions/current', [ProductDetailController::class, 'getCurrentPrescriptions'])->name('prescriptions.current');
Route::get('/prescriptions/{prescription}', [ProductDetailController::class, 'getPrescriptionWithRanges'])->name('prescriptions.show');
Route::get('get-prescription-lenses/{prescription_id}', [ProductDetailController::class, 'getLensesWithChildren']);
Route::get('get-prescription-lens-indexes/{lens_id}', [ProductDetailController::class, 'getLensesIndexes']);
Route::get('get-coatings', [ProductDetailController::class, 'getCoatings']);


Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/shop_by_shape/{shape}', [ShopController::class, 'shop_by_shape'])->name('shop_by_shape');
Route::get('/shop_by_size/{size}', [ShopController::class, 'shop_by_size'])->name('shop_by_size');
Route::get('/shop_by_color/{color}', [ShopController::class, 'shop_by_color'])->name('shop_by_color');
Route::get('/shop_by_material/{material}', [ShopController::class, 'shop_by_material'])->name('shop_by_material');
Route::get('/shop_by_frame/{frame}', [ShopController::class, 'shop_by_frame'])->name('shop_by_frame');
Route::get('/filter_by_price', [ShopController::class, 'filter_by_price'])->name('filter_by_price');
Route::get('/new_in', [ShopController::class, 'new_in'])->name('new_in');
Route::get('/flash_sale', [ShopController::class, 'flash_sale'])->name('flash_sale');
Route::get('/best_seller', [ShopController::class, 'best_seller'])->name('best_seller');
Route::get('/all_reviews/{id}', [ReviewController::class, 'all_reviews'])->name('all_reviews');
Route::post('/save_review', [ReviewController::class, 'save_review'])->name('save_review');
Route::post('/save_news_letter', [SocialLoginController::class, 'save_news_letter'])->name('save_news_letter');

Route::view('/contact_us', 'contact_us')->name('contact_us');


Route::get('google/login', [SocialLoginController::class, 'googleProvider'])->name('google.login');
Route::get('google/callback', [SocialLoginController::class, 'googleCallbackHandel'])->name('google.login.callback');

Route::get('facebook/login', [SocialLoginController::class, 'facebookProvider'])->name('facebook.login');
Route::get('facebook/callback', [SocialLoginController::class, 'facebookCallbackHandel'])->name('facebook.login.callback');




Route::post('add_to_cart_frame', [ProductDetailController::class, 'add_to_cart_frame'])->name('add_to_cart_frame');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/remove_cart/{id}', [CartController::class, 'remove_cart'])->name('remove_cart');
Route::get('/plus_cart/{id}', [CartController::class, 'plus_cart'])->name('plus_cart');
Route::get('/minus_cart/{id}', [CartController::class, 'minus_cart'])->name('minus_cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/complete_order', [CartController::class, 'complete_order'])->name('complete_order');
Route::get('/order_summary/{id}', [CartController::class, 'order_summary'])->name('order_summary');
Route::get('/orders', [CartController::class, 'orders'])->name('orders');


Route::get('stripe',[StripePaymentController::class, 'stripe'])->name('stripe.index');
Route::post('stripe/checkout',[StripePaymentController::class, 'stripeCheckout'])->name('stripe.checkout');
Route::get('stripe/checkout/success',[StripePaymentController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');



Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard'])->middleware(['auth', 'verified', 'role:1'])->name('dashboard');

Route::middleware('auth', 'role:2')->group(function () {

Route::get('user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');




});

Route::middleware('auth', 'role:1')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // All Color Route
    Route::view('/color', 'admin.color')->name('color');
    Route::post('/load_color', [ColorController::class, 'load_color'])->name('load_color');
    Route::post('/insert_color', [ColorController::class, 'insert_color'])->name('insert_color');
    Route::get('/edit_color/{id}', [ColorController::class, 'edit_color'])->name('edit_color');
    Route::post('/update_color', [ColorController::class, 'update_color'])->name('update_color');
    Route::get('/delete_color/{id}', [ColorController::class, 'delete_color'])->name('delete_color');
    Route::get('/get_color', [ColorController::class, 'get_color'])->name('get_color');


    // All Sizes Route
    Route::view('/sizes', 'admin.sizes')->name('sizes');
    Route::post('/load_sizes', [SizeController::class, 'load_sizes'])->name('load_sizes');
    Route::post('/insert_size', [SizeController::class, 'insert_size'])->name('insert_size');
    Route::get('/edit_size/{id}', [SizeController::class, 'edit_size'])->name('edit_size');
    Route::post('/update_size', [SizeController::class, 'update_size'])->name('update_size');
    Route::get('/delete_size/{id}', [SizeController::class, 'delete_size'])->name('delete_size');
    Route::get('/get_sizes', [SizeController::class, 'get_sizes'])->name('get_sizes');

    // All Shapes Route
    Route::view('/shapes', 'admin.shapes')->name('shapes');
    Route::post('/load_shapes', [ShapeController::class, 'load_shapes'])->name('load_shapes');
    Route::post('/insert_shape', [ShapeController::class, 'insert_shape'])->name('insert_shape');
    Route::get('/edit_shape/{id}', [ShapeController::class, 'edit_shape'])->name('edit_shape');
    Route::post('/update_shape', [ShapeController::class, 'update_shape'])->name('update_shape');
    Route::get('/delete_shape/{id}', [ShapeController::class, 'delete_shape'])->name('delete_shape');
    Route::get('/get_shapes', [ShapeController::class, 'get_shapes'])->name('get_shapes');
    
    
    // All Materials Route
    Route::view('/materials', 'admin.materials')->name('materials');
    Route::post('/load_materials', [MaterialController::class, 'load_materials'])->name('load_materials');
    Route::post('/insert_material', [MaterialController::class, 'insert_material'])->name('insert_material');
    Route::get('/edit_material/{id}', [MaterialController::class, 'edit_material'])->name('edit_material');
    Route::post('/update_material', [MaterialController::class, 'update_material'])->name('update_material');
    Route::get('/delete_material/{id}', [MaterialController::class, 'delete_material'])->name('delete_material');
    Route::get('/get_materials', [MaterialController::class, 'get_materials'])->name('get_materials');
        
    // All Coatings Route
    Route::view('/coatings', 'admin.coatings')->name('coatings');
    Route::post('/load_coatings', [CoatingController::class, 'load_coatings'])->name('load_coatings');
    Route::post('/insert_coating', [CoatingController::class, 'insert_coating'])->name('insert_coating');
    Route::get('/edit_coating/{id}', [CoatingController::class, 'edit_coating'])->name('edit_coating');
    Route::post('/update_coating', [CoatingController::class, 'update_coating'])->name('update_coating');
    Route::get('/delete_coating/{id}', [CoatingController::class, 'delete_coating'])->name('delete_coating');
    Route::get('/get_coatings', [CoatingController::class, 'get_coatings'])->name('get_coatings');

    
    // All Lenses Route
    Route::view('/lenses', 'admin.lenses')->name('lenses');
    Route::post('/load_lenses', [LensController::class, 'load_lenses'])->name('load_lenses');
    Route::post('/insert_lens', [LensController::class, 'insert_lens'])->name('insert_lens');
    Route::get('/edit_lens/{id}', [LensController::class, 'edit_lens'])->name('edit_lens');
    Route::post('/update_lens', [LensController::class, 'update_lens'])->name('update_lens');
    Route::get('/delete_lens/{id}', [LensController::class, 'delete_lens'])->name('delete_lens');
    Route::get('/get_lenses', [LensController::class, 'get_lenses'])->name('get_lenses');
    
    // All Lenses Route
    Route::view('/all_products', 'admin.products')->name('all_products');
    Route::post('/load_products', [ProductController::class, 'load_products'])->name('load_products');
    Route::view('/add_product', 'admin.add_product')->name('add_product');
    Route::post('/insert_product', [ProductController::class, 'insert_product'])->name('insert_product');


    // All Feature Selection Route
    Route::view('/feature_selection', 'admin.feature_selection')->name('feature_selection');
    Route::post('/load_feature_selection', [FeatureSelectionContr::class, 'load_feature_selection'])->name('load_feature_selection');
    Route::post('/insert_feature_selection', [FeatureSelectionContr::class, 'insert_feature_selection'])->name('insert_feature_selection');
    Route::get('/edit_feature_selection/{id}', [FeatureSelectionContr::class, 'edit_feature_selection'])->name('edit_feature_selection');
    Route::post('/update_feature_selection', [FeatureSelectionContr::class, 'update_feature_selection'])->name('update_feature_selection');
    Route::get('/delete_feature_selection/{id}', [FeatureSelectionContr::class, 'delete_feature_selection'])->name('delete_feature_selection');


    // All Feature Selection Route
    Route::view('/new_banner', 'admin.new_arrive_banner')->name('new_banner');
    Route::post('/load_new_banner', [NewBannerController::class, 'load_new_banner'])->name('load_new_banner');
    Route::post('/insert_new_banner', [NewBannerController::class, 'insert_new_banner'])->name('insert_new_banner');
    Route::get('/edit_new_banner/{id}', [NewBannerController::class, 'edit_new_banner'])->name('edit_new_banner');
    Route::post('/update_new_banner', [NewBannerController::class, 'update_new_banner'])->name('update_new_banner');
    Route::get('/delete_new_banner/{id}', [NewBannerController::class, 'delete_new_banner'])->name('delete_new_banner');

    // All Style Choice Route
    Route::view('/style_choice', 'admin.style_choice')->name('style_choice');
    Route::post('/load_style_choice', [StyleChoiceController::class, 'load_style_choice'])->name('load_style_choice');
    Route::post('/insert_style_choice', [StyleChoiceController::class, 'insert_style_choice'])->name('insert_style_choice');
    Route::get('/edit_style_choice/{id}', [StyleChoiceController::class, 'edit_style_choice'])->name('edit_style_choice');
    Route::post('/update_style_choice', [StyleChoiceController::class, 'update_style_choice'])->name('update_style_choice');
    Route::get('/delete_style_choice/{id}', [StyleChoiceController::class, 'delete_style_choice'])->name('delete_style_choice');

    // All Lens Selection Route
    Route::view('/lens_selection', 'admin.lens_selection')->name('lens_selection');
    Route::post('/load_lens_selection', [LensSelectionController::class, 'load_lens_selection'])->name('load_lens_selection');
    Route::post('/insert_lens_selection', [LensSelectionController::class, 'insert_lens_selection'])->name('insert_lens_selection');
    Route::get('/edit_lens_selection/{id}', [LensSelectionController::class, 'edit_lens_selection'])->name('edit_lens_selection');
    Route::post('/update_lens_selection', [LensSelectionController::class, 'update_lens_selection'])->name('update_lens_selection');
    Route::get('/delete_lens_selection/{id}', [LensSelectionController::class, 'delete_lens_selection'])->name('delete_lens_selection');


    // All Main Banner Route
    Route::view('/main_banner', 'admin.main_banner')->name('main_banner');
    Route::post('/load_main_banner', [MainBannerController::class, 'load_main_banner'])->name('load_main_banner');
    Route::post('/insert_main_banner', [MainBannerController::class, 'insert_main_banner'])->name('insert_main_banner');
    Route::get('/edit_main_banner/{id}', [MainBannerController::class, 'edit_main_banner'])->name('edit_main_banner');
    Route::post('/update_main_banner', [MainBannerController::class, 'update_main_banner'])->name('update_main_banner');
    Route::get('/delete_main_banner/{id}', [MainBannerController::class, 'delete_main_banner'])->name('delete_main_banner');

    

    // All Header Route
    Route::get('/header', [HeaderController::class, 'load_header'])->name('header');
    Route::post('/update_header', [HeaderController::class, 'update_header'])->name('update_header');
    Route::post('/update_banner1', [HeaderController::class, 'update_banner1'])->name('update_banner1');
    Route::post('/update_banner2', [HeaderController::class, 'update_banner2'])->name('update_banner2');
    Route::post('/update_com_detail', [HeaderController::class, 'update_com_detail'])->name('update_com_detail');

    // All Orders Route
    Route::view('/received_orders', 'admin.received_orders')->name('received_orders');
    Route::post('/load_orders', [OrderController::class, 'load_orders'])->name('load_orders');


    

});


require __DIR__.'/auth.php';
