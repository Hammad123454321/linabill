<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request)
    {
        $total = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            // ->where('orders.order_status', 3)
            ->select(
                DB::raw('SUM(order_items.total) as total_amount'),
                DB::raw('SUM(order_items.qty) as total_qty')
            )
            ->first();

        $today_total = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.created_at', now())
            ->select(
                DB::raw('SUM(order_items.total) as total_amount'),
                DB::raw('SUM(order_items.qty) as total_qty')
            )
            ->first();


        // Top 10 selling products by quantity
        $topSellingProducts = DB::table('order_items')
            ->join('products', 'order_items.pro_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            // ->where('orders.order_status', 3)  // Only consider completed orders (status = 3)
            ->select(
                'products.pro_name',               // Get product name
                'order_items.pro_price',           // Get individual product price
                DB::raw('SUM(order_items.qty) as total_qty'),      // Sum of quantities sold
                DB::raw('SUM(order_items.total) as total_price')   // Total price of all sold units
            )
            ->groupBy('order_items.pro_id', 'products.pro_name', 'order_items.pro_price')
            ->orderBy('total_qty', 'desc')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('total', 'today_total', 'topSellingProducts'));
    }


    public function userDashboard()
    {
        // Get the logged-in user's ID
        $customerId = Auth::id();

        // Count the total number of orders for the logged-in user
        $totalOrders = DB::table('orders')
            ->where('cus_id', $customerId)
            ->count();

        $totalReturnOrders = DB::table('orders')
            ->where('cus_id', $customerId)
            ->where('order_status', 4)
            ->count();

        $totalReceiveOrders = DB::table('orders')
            ->where('cus_id', $customerId)
            ->where('order_status', 3)
            ->count();

        // Return the total orders count to a view (adjust the view name as needed)
        return view('user_dashboard', compact('totalOrders', 'totalReturnOrders', 'totalReceiveOrders'));
    }



}
