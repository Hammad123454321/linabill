<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function load_color(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('colors')
            ->select()->where('is_deleted', '!=', 1);

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('color_name', 'like', '%' . $search . '%');
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
        $colors = $query->get();

        $all_data = [];

        foreach ($colors as $color) {

            if ($color->status == "1") {
                $status = "<span class='badge bg-success flex-shrink-0 align-self-center py-2 px-2 fs-6'>Enabled</span>";
            } elseif ($color->status == "0"){
                $status = "<span class='badge bg-danger flex-shrink-0 align-self-center py-2 px-2 fs-6'>Disabled</span>";
            }

            // Initialize photo variable
            $color_image = '';
        
            // Check if photo exists or not
            if ($color->color_image == "" || $color->color_image == null) {
                $color_image = '<img src="uploads/color_image/no_image.jpg" height="50" width="50" style="border-radius:10%"/>';
            } else {
                $color_image = '<img src="uploads/color_image/'.$color->color_image.'" height="50" width="50" style="border-radius:10%"/>';
            }
        
            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$color->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$color->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'                => $color->id,
                'color_image'        => $color_image,
                'color_name'        => $color->color_name,
                'color_code'        => $color->color_code,
                'color_status'      => $status,
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


    public function insert_color(Request $request)
    {  
        $color_name = color::where('color_name', $request->input('color_name'))->exists();

        if($color_name){

            return response()->json([
                'status'=> "colorExist",
            ]);
            
        }else{

            $color = new color();
            $color->color_name       = $request->input('color_name');
            $color->color_code       = $request->input('color_code');
            $color->status           = $request->input('color_status');
            $color->created_by       = Auth::id();
            $color->updated_by       = Auth::id();

            if($request->hasFile('image')){
                $image = $request->file('image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/color_image/'), $new_image_name);

                $color->color_image = $new_image_name;
            }

            $color->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function edit_color($id) 
    {
        $Data = DB::table('colors')
        ->select()
        ->where('colors.id', $id)
        ->first();

        return response()->json([
            'status'=>200,
            'data' => $Data,
        ]);
    }

    public function update_color(Request $request)
    {
        $color =  color::where('color_name', $request->input('color_name'))
        ->where('id', '!=', $request->input('color_id'))->exists();

        if($color){

            return response()->json([
                'status'=> "colorExist",
            ]);
            
        }else{
            
            $color                  = color::find($request->input('color_id'));
            $color->color_name       = $request->input('color_name');
            $color->color_code       = $request->input('color_code');
            $color->status     = $request->input('color_status');
            $color->updated_by      = Auth::id();

            if($request->hasFile('up_image')){

                // Get the old image path
                $oldImagePath = public_path('/uploads/color_image/') . $color->color_image;

                // Check if the old image exists and delete it
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }

                $image = $request->file('up_image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/color_image/'), $new_image_name);

                $color->color_image = $new_image_name;
            }

            $color->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function delete_color($id)
    {
        $color = color::find($id);

        $color->is_deleted = 1;
        $color->updated_by = Auth::id();

        $color->save();
        return response()->json([
            'status'=>200
        ]);
    }


    public function get_color(Request $request)
    {
        $color = color::all(['id', 'color_name']);

        return response()->json($color);

    }
}
