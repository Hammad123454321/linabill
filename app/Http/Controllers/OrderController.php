<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function load_orders(Request $request)
    {
        // $start_date = !empty($request->input('startdate')) ? Carbon::parse($request->input('startdate'))->format('Y-m-d') : "";
        // $end_date   = !empty($request->input('startdate')) ? Carbon::parse($request->input('enddate'))->format('Y-m-d') : "";
        $limit      = $request->input('length');
        $offset     = $request->input('start');
        $column     = $request->input('order.0.column');
        $dir        = $request->input('order.0.dir');
        $order_by   = $request->input("columns.$column.data");

        // Build the query with potential filters
        $query = DB::table('orders')
            ->select();

        // if (!empty($start_date) && !empty($end_date)) {
        //     $query->whereBetween('created_at', [$start_date, $end_date]);
        // }

        if ($search = $request->input('search')) { // .value if using DataTables
            $query->where('first_name', 'like', '%' . $search . '%');
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


            // Define the button HTML
            $btn = '<td class="text-right">
                        <button id="edit_btn" data-eid="'.$data->id.'" class="btn btn-soft-primary" waves-effect waves-light data-toggle="tooltip" title="Edit" style="font-size:20px; padding: 0.10rem 0.5rem;"><i class="mdi mdi-square-edit-outline"></i></button>
                    </td>';
        
            $all_data[] = [
                'id'                => $data->id,
                'created_at'        => $data->created_at,
                'first_name'        => $data->first_name .' '.$data->last_name,
                'phone'             => $data->phone,
                'email'             => $data->email,
                'address'           => $data->house_no .', '.$data->apartment.', '.$data->city.', '.$data->state.', '.$data->post_code,
                'order_status'      => $data->order_status,
                'btn'               => $btn
            ];
        }
        
        

        $data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => $total_count,
            "recordsFiltered" => $total_count,
            "data"            => $all_data
        ];

        return response()->json($data);
    }

}
