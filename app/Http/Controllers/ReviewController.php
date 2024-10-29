<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\reviews;
use App\Models\review_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function all_reviews(Request $request, $id)
    {  

        $reviews = DB::table('reviews')
            ->select('*')
            ->where('pro_id', $id)
            ->orderBy('reviews.created_at', 'desc')
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


        $hasPurchased = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id') // Adjust 'order_id' if needed
            ->select('orders.*', 'order_items.*') // Select all fields from both tables
            ->where('orders.cus_id', auth()->id())
            ->where('order_items.pro_id', $id)
            ->get();

        $has_reviews = DB::table('reviews')
            ->where('pro_id', $id)
            ->where('cus_id', auth()->id())
            ->count();



        return view('all_reviews', compact('id', 'reviews', 'review_images', 'review_images_grouped', 'total_reviews', 'ratings', 'hasPurchased', 'has_reviews'));
    }


    public function save_review(Request $request)
    {  
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review_title' => 'required|string|max:255',
            'review_desc' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
            'quality' => 'required|integer|min:1|max:5',
            'style' => 'required|integer|min:1|max:5',
            'fit' => 'required|integer|min:1|max:5',
            'review_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save the review
        $review = reviews::create([
            'pro_id'    => $request->input('product_id'),
            'cus_id'   => auth()->id(),
            'review_title'   => $request->input('review_title'),
            'review_details' => $request->input('review_desc'),
            'rating'    => $request->input('rating'),
            'quality'   => $request->input('quality'),
            'style'     => $request->input('style'),
            'fit'       => $request->input('fit'),
        ]);

        // Handle image uploads
        if ($request->hasFile('review_images')) {
            foreach ($request->file('review_images') as $image) {
                // Get the original extension of the image file
                $ext = $image->getClientOriginalExtension();
                
                // Generate a unique name for the image
                $new_image_name = hexdec(uniqid()) . '.' . $ext;
                
                // Move the uploaded file to the appropriate folder
                $image->move(public_path('/uploads/review_images/'), $new_image_name);
        
                // Save the image record in the database
                review_image::create([
                    'reviews_id' => $review->id,
                    'pro_id'     => $request->input('product_id'),
                    'cus_id'     => auth()->id(),
                    'image'      => $new_image_name,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }



}
