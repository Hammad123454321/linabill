<?php

namespace App\Http\Controllers;

use App\Models\lens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LensController extends Controller
{
    public function load_lenses(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('lenses')
            ->select()->where('is_deleted', '!=', 1);

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('lens_name', 'like', '%' . $search . '%');
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
        $lenses = $query->get();

        $all_data = [];

        foreach ($lenses as $data) {

            if ($data->status == "1") {
                $status = "<span class='badge bg-success flex-shrink-0 align-self-center py-1 px-2 fs-6'>Enabled</span>";
            } elseif ($data->status == "0"){
                $status = "<span class='badge bg-danger flex-shrink-0 align-self-center py-1 px-2 fs-6'>Disabled</span>";
            }

            // Initialize photo variable
            $lens_image = '';
        
            // Check if photo exists or not
            if ($data->lens_image == "" || $data->lens_image == null) {
                $lens_image = '<img src="uploads/no_image.jpg" height="50" width="50" style="border-radius:10%"/>';
            } else {
                $lens_image = '<img src="uploads/lens_images/'.$data->lens_image.'" height="50" width="50" style="border-radius:10%"/>';
            }
        
            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$data->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$data->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'                => $data->id,
                'lens_image'        => $lens_image,
                'lens_name'         => $data->lens_name,
                'lens_description'  => $data->lens_description,
                'lens_tool_tip'     => $data->lens_tool_tip,
                'lens_price'        => $data->lens_price,
                'status'            => $status,
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


    public function insert_lens(Request $request)
    {  
        $lens_name = lens::where('lens_name', $request->input('lens_name'))->exists();

        if($lens_name){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{

            $lens = new lens();
            $lens->lens_name       = $request->input('lens_name');
            $lens->lens_description = $request->input('lens_description');
            $lens->lens_tool_tip = $request->input('lens_tool_tip');
            $lens->lens_price = $request->input('lens_price');
            $lens->created_by       = Auth::id();
            $lens->updated_by       = Auth::id();

            if($request->hasFile('image')){
                $image = $request->file('image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/coating_images/'), $new_image_name);

                $lens->lens_image = $new_image_name;
            }

            $lens->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function edit_lens($id) 
    {
        $Data = DB::table('lenses')
        ->select()
        ->where('lenses.id', $id)
        ->first();

        return response()->json([
            'status'=>200,
            'data' => $Data,
        ]);
    }

    public function update_lens(Request $request)
    {
        $lens =  lens::where('lens_name', $request->input('lens_name'))
        ->where('id', '!=', $request->input('lens_id'))->exists();

        if($lens){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{
            
            $lens                  = lens::find($request->input('lens_id'));
            $lens->lens_name     = $request->input('lens_name');
            $lens->lens_description = $request->input('lens_description');
            $lens->lens_tool_tip = $request->input('lens_tool_tip');
            $lens->lens_price = $request->input('lens_price');
            $lens->updated_by      = Auth::id();

            if($request->hasFile('up_image')){

                // Get the old image path
                $oldImagePath = public_path('/uploads/lens_images/') . $lens->lens_image;

                // Check if the old image exists and delete it
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }

                $image = $request->file('up_image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/lens_images/'), $new_image_name);

                $lens->lens_image = $new_image_name;
            }

            $lens->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function delete_lens($id)
    {
        $lens = lens::find($id);

        $lens->is_deleted = 1;
        $lens->updated_by = Auth::id();

        $lens->save();
        return response()->json([
            'status'=>200
        ]);
    }


    public function get_lenses(Request $request)
    {
        $lens = lens::all(['id', 'lens_name']);

        return response()->json($lens);

    }



}
