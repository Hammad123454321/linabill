<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeatureSelection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeatureSelectionContr extends Controller
{
    public function load_feature_selection(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('feature_selections')
            ->select();

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('title', 'like', '%' . $search . '%');
        }
        // $type = $request->input('type');
        // if (isset($type)) {
        //     $query->where('is_deleted', '=', $type);
        // }

        // Calculate total before pagination
        $total_count = $query->count();

        // Apply sorting and pagination
        $query->orderBy($order_by, $dir);
        if ($limit != -1) {
            $query->offset($offset)->limit($limit);
        }

        // Fetch the data
        $feature_selection = $query->get();

        $all_data = [];

        foreach ($feature_selection as $data) {

            // Initialize photo variable
            $image = '';
        
            // Check if photo exists or not
            if ($data->image == "" || $data->image == null) {
                $image = '<img src="uploads/no_image.jpg" height="50" width="50" style="border-radius:10%"/>';
            } else {
                $image = '<img src="uploads/feature_selection/'.$data->image.'" height="50" width="50" style="border-radius:10%"/>';
            }
        
            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$data->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$data->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'          => $data->id,
                'title'       => $data->title,
                'desc'        => $data->desc,
                'link'        => $data->link,
                'image'       => $image,
                'btn'         => $btn
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


    public function insert_feature_selection(Request $request)
    {  

            $data = new FeatureSelection();
            $data->title       = $request->input('title');
            $data->desc       = $request->input('desc');
            $data->link       = $request->input('link');

            if($request->hasFile('image')){
                $image = $request->file('image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/feature_selection/'), $new_image_name);

                $data->image = $new_image_name;
            }

            $data->save();

            return response()->json([
                'status'=>200
            ]);

    }


    public function edit_feature_selection($id) 
    {
        $Data = DB::table('feature_selections')
        ->select()
        ->where('id', $id)
        ->first();

        return response()->json([
            'status'=>200,
            'data' => $Data,
        ]);
    }

    public function update_feature_selection(Request $request)
    {
        
            $data             = FeatureSelection::find($request->input('featured_id'));
            $data->title      = $request->input('title');
            $data->desc       = $request->input('desc');
            $data->link       = $request->input('link');

            if($request->hasFile('up_image')){

                // Get the old image path
                $oldImagePath = public_path('/uploads/feature_selection/') . $data->image;

                // Check if the old image exists and delete it
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }

                $image = $request->file('up_image');

                $ext = $image->getClientOriginalExtension();

                $new_image_name = hexdec(uniqid()).'.'.$ext;

                $image->move(public_path('/uploads/feature_selection/'), $new_image_name);

                $data->image = $new_image_name;
            }

            $data->save();

            return response()->json([
                'status'=>200
            ]);

        
    }


    public function delete_feature_selection($id)
    {
        $data  = FeatureSelection::find($id);

        // Get the old image path
        $oldImagePath = public_path('/uploads/feature_selection/') . $data->image;

        // Check if the old image exists and delete it
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath); // Delete the old image
        }

        DB::table('feature_selections')->where('id', $id)->delete();

        return response()->json([
            'status'=>200
        ]);
    }
}
