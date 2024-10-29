<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\coating;
use App\Models\Prescription;
use App\Models\PrescriptionLense;
use App\Models\PrescriptionLensIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends Controller
{

    public function product_detail($id, $sku_id)
    {
        // Fetch the product with its SKUs and images
        $products = DB::table('products')
            ->leftJoin('sizes', 'products.pro_size', '=', 'sizes.id')
            ->leftJoin('product_materials', 'products.pro_material', '=', 'product_materials.id')
            ->leftJoin('shapes', 'products.pro_shape', '=', 'shapes.id')
            ->select(
                'products.*',
                'sizes.size_name',
                'product_materials.mat_name',
                'shapes.shape_name',
            )
            ->where('products.id', $id)
            ->first();

        $product_skus = DB::table('product_skus')
            ->select('*')
            ->where('pro_id', $id)
            ->get();


        // Fetch images for the first SKU if SKUs exist
        $product_images = DB::table('product_images')
            ->where('pro_sku_id', $sku_id)
            ->get();

        $pro_sku = DB::table('product_skus')
            ->leftJoin('colors', 'product_skus.pro_color', '=', 'colors.id')
            ->select('product_skus.*', 'colors.color_name')
            ->where('product_skus.id', $sku_id)
            ->first();

        //Review Start

        $reviews = DB::table('reviews')
            ->select('*')
            ->where('pro_id', $id)
            ->orderBy('reviews.created_at', 'desc')
            ->limit(5)
            ->get();

        $review_images = DB::table('review_images')
            ->select('*')
            ->where('pro_id', $id)
            ->orderBy('review_images.created_at', 'desc')
            ->get();

        // Group the images by their corresponding review ID
        $review_images_grouped = [];
        foreach ($review_images as $image) {
            $review_images_grouped[$image->reviews_id][] = $image->image;
        }

        // Get total review count for the product
        $total_reviews = DB::table('reviews')
            ->where('pro_id', $id)
            ->count();

        // Get average overall rating, quality rating, and style rating for the product
        $ratings = DB::table('reviews')
            ->where('pro_id', $id)
            ->select(
                DB::raw('AVG(rating) as rating'), // Assuming 'rating' column stores overall rating
                DB::raw('AVG(quality) as quality'), // Assuming 'quality_rating' column
                DB::raw('AVG(style) as style'), // Assuming 'style_rating' column
                DB::raw('AVG(fit) as fit') // Assuming 'style_rating' column
            )
            ->first(); // Get the first result since we are using aggregation functions

        //Review End


        $related_product = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->where('products.pro_series', $products->pro_series) // Filter by the category
            ->where('products.id', '<>', $id) // Exclude the current product
            ->orderBy('products.created_at', 'asc')
            ->limit(10)
            ->get();


        return view('product_detail', compact('products', 'product_skus', 'product_images', 'pro_sku', 'reviews', 'review_images', 'review_images_grouped', 'total_reviews', 'ratings', 'related_product'));
    }

    public function add_to_cart(Request $request)
    {
        $cus_id = Auth::id(); // Logged-in user ID
        $pro_id = $request->input('pro_id');
        $sku_id = $request->input('sku_id');
        $pro_image = $request->input('pro_image');
        $lens_price = $request->input('lens_price') ?? 0;
        $coating_price = $request->input('coating_price') ?? 0;

        // If the user is logged in
        if (Auth::check()) {
            // Check if cart entry exists for the given customer, product, and SKU
            $cart = Cart::where('pro_id', $pro_id)
                ->where('cus_id', $cus_id)
                ->where('pro_sku', $sku_id)
                ->first();

            if ($cart) {
                // Cart item exists, update quantity and other details
                $cart->qty  = $cart->qty + 1;
                $cart->frame_id  = $cart->frame_id + $lens_price;
                $cart->coating_id  = $cart->coating_id + $coating_price;

                $cart->save();

                return redirect()->back();
            } else {
                // No cart item exists, create a new entry
                $cart = new Cart();
                $cart->cus_id     = $cus_id;
                $cart->pro_id     = $pro_id;
                $cart->pro_sku    = $sku_id;
                $cart->frame_id   = $lens_price;
                $cart->coating_id = $coating_price;
                $cart->qty        = 1;

                $cart->save();

                return redirect()->back();
            }
        } else {
            // If the user is not logged in, handle guest checkout by storing in session
            $cartItem = [
                'pro_id'       => $pro_id,
                'pro_sku'      => $sku_id,
                'pro_image'    => $pro_image,
                'lens_price'   => $lens_price,
                'coating_price' => $coating_price,
                'qty'          => 1,
            ];

            // Get the existing cart items from the session
            $cart = session()->get('cart', []);

            // Check if the product already exists in the session cart
            $found = false;
            foreach ($cart as &$item) {
                if ($item['pro_id'] == $pro_id && $item['pro_sku'] == $sku_id) {
                    // If product exists, update quantity and prices
                    $item['qty'] += 1;
                    $item['lens_price'] += $lens_price;
                    $item['coating_price'] += $coating_price;
                    $found = true;
                    break;
                }
            }

            // If not found, add a new product to the session cart
            if (!$found) {
                $cart[] = $cartItem;
            }

            // Save the updated cart back to the session
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to session cart successfully');
        }
    }

    // In PrescriptionController.php
    public function getCurrentPrescriptions()
    {
        // Fetch prescriptions where `parent_id` is null (parents only)
        $prescriptions = Prescription::with('child_prescriptions')
            ->whereNull('parent_id')
            ->get();

        return response()->json($prescriptions);
    }

    // In PrescriptionController.php
    public function getPrescriptionWithRanges(Prescription $prescription)
    {
        // Check the prescription type and load the relevant relationships
        if ($prescription->type === 'regular') {
            $prescription->load([
                'eye_ranges' => function ($query) {
                    $query->orderBy('eye'); // Optional ordering by 'eye'
                },
                'pd_ranges' => function ($query) {
                    $query->orderBy('field'); // Optional ordering by 'field'
                },
            ]);

            // Group loaded ranges by eye for `eye_ranges` and field for `pd_ranges`
            $ranges = [
                'eye_ranges' => $prescription->eye_ranges->groupBy('eye'),
                'pd_ranges' => $prescription->pd_ranges->groupBy('field'),
            ];
        } elseif ($prescription->type === 'magnification') {
            $prescription->load([
                'magnification_ranges' => function ($query) {
                    $query->orderBy('field'); // Optional ordering by 'field'
                },
            ]);

            // Group loaded magnification ranges by field
            $ranges = [
                'magnification_ranges' => $prescription->magnification_ranges,
            ];
        }

        // Prepare response with only the necessary data
        $response = [
            'prescription' => $prescription->only(['id', 'name', 'type', 'status', 'description']),
            'ranges' => $ranges,
        ];

        return response()->json($response);
    }

    public function getLensesWithChildren($prescriptionId)
    {
        $lenses = PrescriptionLense::with('child_lenses', 'colors')->where('prescription_id', $prescriptionId)->get();

        return response()->json($lenses);
    }

    public function getLensesIndexes($lens_id)
    {

        $lens_indexes = PrescriptionLensIndex::with('colors')->where('prescription_lens_id', $lens_id)->get();

        return response()->json($lens_indexes);
    }

    public function getCoatings()
    {
        $coatings = coating::all();

        return response()->json($coatings);
    }
}
