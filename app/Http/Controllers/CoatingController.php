<?php

namespace App\Http\Controllers;

use App\Models\coating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoatingController extends Controller
{
    public function load_coatings(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('coatings')
            ->select()->where('is_deleted', '!=', 1);

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('coating_name', 'like', '%' . $search . '%');
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
        $coatings = $query->get();

        $all_data = [];

        foreach ($coatings as $data) {

            if ($data->status == "1") {
                $status = "<span class='badge bg-success flex-shrink-0 align-self-center py-1 px-2 fs-6'>Enabled</span>";
            } elseif ($data->status == "0"){
                $status = "<span class='badge bg-danger flex-shrink-0 align-self-center py-1 px-2 fs-6'>Disabled</span>";
            }

            // Initialize photo variable
            $coating_image = '';
        
            // Check if photo exists or not
            if ($data->coating_image == "" || $data->coating_image == null) {
                $coating_image = '<img src="uploads/no_image.jpg" height="50" width="50" style="border-radius:10%"/>';
            } else {
                $coating_image = '<img src="uploads/coating_images/'.$data->coating_image.'" height="50" width="50" style="border-radius:10%"/>';
            }
        
            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$data->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$data->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'                => $data->id,
                'coating_image'     => $coating_image,
                'coating_name'      => $data->coating_name,
                'coating_description' => $data->coating_description,
                'coating_price'     => $data->coating_price,
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


    public function insert_coating(Request $request)
    {  
        $coating_name = coating::where('coating_name', $request->input('coating_name'))->exists();

        if($coating_name){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{

            $coating = new coating();
            $coating->coating_name       = $request->input('coating_name');
            $coating->coating_description = $request->input('coating_description');
            $coating->coating_price = $request->input('coating_price');
            $coating->created_by       = Auth::id();
            $coating->updated_by       = Auth::id();

            if($request->hasFile('image')){
                $image = $request->file('image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/coating_images/'), $new_image_name);

                $coating->coating_image = $new_image_name;
            }

            $coating->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function edit_coating($id) 
    {
        $Data = DB::table('coatings')
        ->select()
        ->where('coatings.id', $id)
        ->first();

        return response()->json([
            'status'=>200,
            'data' => $Data,
        ]);
    }

    public function update_coating(Request $request)
    {
        $coating =  coating::where('coating_name', $request->input('coating_name'))
        ->where('id', '!=', $request->input('coating_id'))->exists();

        if($coating){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{
            
            $coating                  = coating::find($request->input('coating_id'));
            $coating->coating_name      = $request->input('coating_name');
            $coating->coating_description = $request->input('coating_description');
            $coating->coating_price = $request->input('coating_price');
            $coating->updated_by      = Auth::id();

            if($request->hasFile('up_image')){

                // Get the old image path
                $oldImagePath = public_path('/uploads/coating_images/') . $coating->coating_image;

                // Check if the old image exists and delete it
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }

                $image = $request->file('up_image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/coating_images/'), $new_image_name);

                $coating->coating_image = $new_image_name;
            }

            $coating->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function delete_coating($id)
    {
        $coating = coating::find($id);

        $coating->is_deleted = 1;
        $coating->updated_by = Auth::id();

        $coating->save();
        return response()->json([
            'status'=>200
        ]);
    }


    public function get_coatings(Request $request)
    {
        $coating = coating::all(['id', 'coating_name']);

        return response()->json($coating);

    }



}
