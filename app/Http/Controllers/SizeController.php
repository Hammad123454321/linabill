<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    public function load_sizes(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('sizes')
            ->select()->where('is_deleted', '!=', 1);

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('size_name', 'like', '%' . $search . '%');
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

        foreach ($colors as $data) {

            if ($data->status == "1") {
                $status = "<span class='badge bg-success flex-shrink-0 align-self-center py-1 px-2 fs-6'>Enabled</span>";
            } elseif ($data->status == "0"){
                $status = "<span class='badge bg-danger flex-shrink-0 align-self-center py-1 px-2 fs-6'>Disabled</span>";
            }

            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$data->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-square-edit-outline"></i></button>
                        <button id="delete_btn" data-did="'.$data->id.'" class="btn btn-soft-danger waves-effect waves-light" data-toggle="tooltip" title="Delete" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-delete"></i></button>
                    </td>';
        
            // Create an array containing all student data including photo and buttons
            $all_data[] = [
                'id'                => $data->id,
                'size_name'         => $data->size_name,
                'size_status'      => $status,
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


    public function insert_size(Request $request)
    {  
        $size_name = size::where('size_name', $request->input('size_name'))->exists();

        if($size_name){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{

            $size = new size();
            $size->size_name       = $request->input('size_name');
            $size->created_by       = Auth::id();
            $size->updated_by       = Auth::id();

            $size->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function edit_size($id) 
    {
        $Data = DB::table('sizes')
        ->select()
        ->where('sizes.id', $id)
        ->first();

        return response()->json([
            'status'=>200,
            'data' => $Data,
        ]);
    }

    public function update_size(Request $request)
    {
        $size =  size::where('size_name', $request->input('size_name'))
        ->where('id', '!=', $request->input('size_id'))->exists();

        if($size){

            return response()->json([
                'status'=> "Exist",
            ]);
            
        }else{
            
            $size                  = size::find($request->input('size_id'));
            $size->size_name       = $request->input('size_name');
            $size->updated_by      = Auth::id();

            $size->save();

            return response()->json([
                'status'=>200
            ]);

        }
    }


    public function delete_size($id)
    {
        $size = size::find($id);

        $size->is_deleted = 1;
        $size->updated_by = Auth::id();

        $size->save();
        return response()->json([
            'status'=>200
        ]);
    }


    public function get_sizes(Request $request)
    {
        $size = size::all(['id', 'size_name']);

        return response()->json($size);

    }



}
