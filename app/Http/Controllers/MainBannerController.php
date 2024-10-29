<?php

namespace App\Http\Controllers;

use App\Models\MainBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainBannerController extends Controller
{
    public function load_main_banner(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('main_banners')
            ->select();

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('link', 'like', '%' . $search . '%');
        }

        // Calculate total before pagination
        $total_count = $query->count();

        // Apply sorting and pagination
        $query->orderBy($order_by, $dir);
        if ($limit != -1) {
            $query->offset($offset)->limit($limit);
        }

        // Fetch the data
        $banners = $query->get();

        $all_data = [];

        foreach ($banners as $banner) {

            // Initialize photo variable
            $image = '';
        
            // Check if photo exists or not
            if ($banner->image == "" || $banner->image == null) {
                $image = '<img src="uploads/no_image.jpg" height="50" width="50" style="border-radius:10%"/>';
            } else {
                $image = '<img src="uploads/banner_images/'.$banner->image.'" height="50" width="50" style="border-radius:10%"/>';
            }
        
            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$banner->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$banner->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'           => $banner->id,
                'image'        => $image,
                'link'         => $banner->link,
                'btn'          => $btn
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


    public function insert_main_banner(Request $request)
    {  

        $banner = new MainBanner();
        $banner->link      = $request->input('link');

        if($request->hasFile('image')){
            $image = $request->file('image');

            $ext = $image->getClientOriginalExtension();

            $new_image_name = hexdec(uniqid()).'.'.$ext;

            $image->move(public_path('/uploads/banner_images/'), $new_image_name);

            $banner->image = $new_image_name;
        }

        $banner->save();

        return response()->json([
            'status'=>200
        ]);

    }


    public function edit_main_banner($id) 
    {
        $Data = DB::table('main_banners')
        ->select()
        ->where('id', $id)
        ->first();

        return response()->json([
            'status'=>200,
            'data' => $Data,
        ]);
    }

    public function update_main_banner(Request $request)
    {
        
            
        $banner         = MainBanner::find($request->input('banner_id'));
        $banner->link   = $request->input('link');

        if($request->hasFile('image')){

            // Get the old image path
            $oldImagePath = public_path('/uploads/banner_images/') . $banner->image;

            // Check if the old image exists and delete it
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }

            $image = $request->file('image');

            $ext = $image->getClientOriginalExtension();

            $new_image_name = hexdec(uniqid()).'.'.$ext;

            $image->move(public_path('/uploads/banner_images/'), $new_image_name);

            $banner->image = $new_image_name;
        }

        $banner->save();

        return response()->json([
            'status'=>200
        ]);

        
    }


    public function delete_main_banner($id)
    {
        $banner = MainBanner::find($id);

        $oldImagePath = public_path('/uploads/banner_images/') . $banner->image;

        // Check if the old image exists and delete it
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath); // Delete the old image
        }

        DB::table('main_banners')->where('id', $id)->delete();

        
        return response()->json([
            'status'=>200
        ]);
    }
}
