<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use App\Models\product_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function load_products(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('products')
            ->select()->where('is_deleted', '!=', 1);

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('pro_name', 'like', '%' . $search . '%');
        }
        $type = $request->input('type');
        if (isset($type)) {
            $query->where('is_deleted', '=', $type);
        }

        // Calculate total before pagination
        $total_count = $query->count();

        // Apply sorting and pagination
        $query->orderBy($order_by, $dir);
        if ($limit != -1) {
            $query->offset($offset)->limit($limit);
        }

        // Fetch the data
        $products = $query->get();

        $all_data = [];

        foreach ($products as $data) {

            // Check if photo exists or not
            if ($data->pro_image == "" || $data->pro_image == null) {
                $image = '<img src="uploads/no_image.jpg" height="50" width="50" style="border-radius:10%"/>';
            } else {
                $image = '<img src="uploads/product_thumbnails/'.$data->pro_image.'" height="50" width="50" style="border-radius:10%"/>';
            }

            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$data->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$data->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'                => $data->id,
                'pro_image'         => $image,
                'pro_name'          => $data->pro_name,
                'pro_series'        => $data->pro_series,
                'pro_colors'        => $data->pro_series,
                'pro_price'         => $data->pro_price,
                'pro_dis_price'     => $data->pro_discount,
                'btn'               => $btn
            ];
        }
        
        // Now $all_data array contains all the students' data including photos and buttons
        

        $data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => $total_count,
            "recordsFiltered" => $total_count,
            "data"            => $all_data
        ];

        return response()->json($data);
    }


    public function insert_product(Request $request)
    {  
        // dd($request->all());
        // if ($request->hasFile("color_thumbnail")) {
        //     $image = $request->file("color_thumbnail");
        //     dd($image);
        // }
        // Validate the request data
        $request->validate([
            'pro_name'        => 'required',
            'pro_series'      => 'required',
            'pro_price'       => 'required|numeric',
            'size'            => 'required',
            'frame_weight'    => 'required|numeric',
            'pro_rim'         => 'required',
            'material'        => 'required',
            'shape'           => 'required',
            'pro_desc'        => 'required',
            'rx_range'        => 'required',
            'pd_range'        => 'required',
            'spring_hing'     => 'required|in:Yes,No',
            'frame_width'     => 'required|numeric',
            'lens_width'      => 'required|numeric',
            'lens_height'     => 'required|numeric',
            'bridge'          => 'required|numeric',
            'temple'          => 'required|numeric',
        
            // Single image file validation
            // 'thumbnail1'      => 'image|mimes:jpeg,png,jpg,gif,svg,webp,jfif,avif',
            // 'thumbnail2'      => 'image|mimes:jpeg,png,jpg,gif,svg,webp,jfif,avif',
        
            // SKU and Color array validation
            'sku'             => 'required|array',
            'sku.*'           => 'required', // Validate individual SKU values
            'color'           => 'required|array',
            'color.*'         => 'required', // Validate individual Color values
        
            // Images array validation
            // 'images'          => 'required|array',
            // 'images.*.*'        => 'image|mimes:jpeg,png,jpg,gif,svg,webp,jfif,avif',
        
            // // Color thumbnail images validation
            // 'color_thumbnail' => 'required|array',
            // 'color_thumbnail.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,jfif,avif',
        ]);

        $product = new product();
        $product->pro_name          = $request->input('pro_name');
        $product->pro_series        = $request->input('pro_series');
        $product->pro_price         = $request->input('pro_price');
        $product->pro_discount      = $request->input('pro_discount');
        $product->pro_discount_percent = $request->input('dis_percent');
        $product->pro_size          = $request->input('size');
        $product->pro_material      = $request->input('material');
        $product->pro_shape         = $request->input('shape');
        $product->pro_weight        = $request->input('frame_weight');
        $product->pro_rim           = $request->input('pro_rim');
        $product->pro_frame_width   = $request->input('frame_width');
        $product->pro_lens_width    = $request->input('lens_width');
        $product->pro_lens_height   = $request->input('lens_height');
        $product->pro_bridge        = $request->input('bridge');
        $product->pro_temple        = $request->input('temple');
        $product->pro_rx_range      = $request->input('rx_range');
        $product->pro_pd_range      = $request->input('pd_range');
        $product->spring_hing       = $request->input('spring_hing');
        $product->pro_description   = $request->input('pro_desc');
        $product->created_by        = Auth::id();
        $product->updated_by        = Auth::id();

        if($request->hasFile('thumbnail1')){
            $image = $request->file('thumbnail1');

            $ext = $image->getClientOriginalExtension();

            $new_image_name = hexdec(uniqid()).'.'.$ext;

            $image->move(public_path('/uploads/product_thumbnails/'), $new_image_name);

            $product->pro_image = $new_image_name;
        }

        if($request->hasFile('thumbnail2')){
            $image = $request->file('thumbnail2');

            $ext = $image->getClientOriginalExtension();

            $new_image_name = hexdec(uniqid()).'.'.$ext;

            $image->move(public_path('/uploads/product_thumbnails/'), $new_image_name);

            $product->pro_second_image = $new_image_name;
        }

        $product->save();

        //Loop through each SKU and save the product with its color and images
        foreach ($request->sku as $index => $sku) {
            $product_sku = new ProductSku();
            $product_sku->pro_id = $product->id;
            $product_sku->pro_sku = $sku;
            $product_sku->pro_color = $request->color[$index]; // Assuming you have a colors table with IDs
            
            if ($request->hasFile("color_thumbnail.$index")) {
                $image = $request->file("color_thumbnail.$index"); // Access file for this specific index
        
                $ext = $image->getClientOriginalExtension();
                $new_image_name = hexdec(uniqid()) . '.' . $ext;
        
                // Move the uploaded file to the appropriate folder
                $image->move(public_path('/uploads/color_thumbnails/'), $new_image_name);
        
                // Save the uploaded file's name to the pro_color_image field
                $product_sku->pro_color_image = $new_image_name;
            }
            
            
            $product_sku->save();

            $sku_id = $product_sku->id;

            // Save images
            if (isset($request->images[$index])) {
                foreach ($request->images[$index] as $image) {

                    $productImage = new product_image();
                    $productImage->pro_id = $product->id;
                    $productImage->pro_sku_id = $sku_id;

                    $ext = $image->getClientOriginalExtension();

                    $new_image_name = hexdec(uniqid()).'.'.$ext;

                    $image->move(public_path('/uploads/product_images/'), $new_image_name);

                    $productImage->pro_image = $new_image_name; // Store the image path
                    $productImage->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Product and images uploaded successfully!');
    }




}
