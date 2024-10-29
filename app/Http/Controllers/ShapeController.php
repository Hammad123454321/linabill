<?php

namespace App\Http\Controllers;

use App\Models\shapes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShapeController extends Controller
{
    public function load_shapes(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('shapes')
            ->select()->where('is_deleted', '!=', 1);

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('shape_name', 'like', '%' . $search . '%');
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
        $shapes = $query->get();

        $all_data = [];

        foreach ($shapes as $data) {

            if ($data->status == "1") {
                $status = "<span class='badge bg-success flex-shrink-0 align-self-center py-1 px-2 fs-6'>Enabled</span>";
            } elseif ($data->status == "0"){
                $status = "<span class='badge bg-danger flex-shrink-0 align-self-center py-1 px-2 fs-6'>Disabled</span>";
            }

            // Initialize photo variable
            $shape_image = '';
        
            // Check if photo exists or not
            if ($data->shape_image == "" || $data->shape_image == null) {
                $shape_image = '<img src="uploads/no_image.jpg" height="50" width="50" style="border-radius:10%"/>';
            } else {
                $shape_image = '<img src="uploads/shape_images/'.$data->shape_image.'" height="50" width="50" style="border-radius:10%"/>';
            }
        
            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$data->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$data->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'                => $data->id,
                'shape_image'        => $shape_image,
                'shape_name'        => $data->shape_name,
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


    public function insert_shape(Request $request)
    {  
        $shape_name = shapes::where('shape_name', $request->input('shape_name'))->exists();

        if($shape_name){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{

            $shape = new shapes();
            $shape->shape_name       = $request->input('shape_name');
            $shape->created_by       = Auth::id();
            $shape->updated_by       = Auth::id();

            if($request->hasFile('image')){
                $image = $request->file('image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/shape_images/'), $new_image_name);

                $shape->shape_image = $new_image_name;
            }

            $shape->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function edit_shape($id) 
    {
        $Data = DB::table('shapes')
        ->select()
        ->where('shapes.id', $id)
        ->first();

        return response()->json([
            'status'=>200,
            'data' => $Data,
        ]);
    }

    public function update_shape(Request $request)
    {
        $shapes =  shapes::where('shape_name', $request->input('shape_name'))
        ->where('id', '!=', $request->input('shape_id'))->exists();

        if($shapes){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{
            
            $shape                  = shapes::find($request->input('shape_id'));
            $shape->shape_name      = $request->input('shape_name');
            $shape->updated_by      = Auth::id();

            if($request->hasFile('up_image')){

                // Get the old image path
                $oldImagePath = public_path('/uploads/shape_images/') . $shape->shape_image;

                // Check if the old image exists and delete it
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }

                $image = $request->file('up_image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/shape_images/'), $new_image_name);

                $shape->shape_image = $new_image_name;
            }

            $shape->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function delete_shape($id)
    {
        $shapes = shapes::find($id);

        $shapes->is_deleted = 1;
        $shapes->updated_by = Auth::id();

        $shapes->save();
        return response()->json([
            'status'=>200
        ]);
    }


    public function get_shapes(Request $request)
    {
        $shapes = shapes::all(['id', 'shape_name']);

        return response()->json($shapes);

    }
}
