<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        // Check if user is logged in
        if (Auth::check()) {
            // For logged-in users
            $cart = DB::table('carts')
                ->leftJoin('products', 'carts.pro_id', '=', 'products.id')
                ->select('products.*', 'carts.*', 'carts.id as id', 'products.pro_image as pro_image') // Ensure to select the image
                ->where('carts.cus_id', Auth::id())
                ->get(); // Don't convert to array, keep as a collection
        } else {
            // For guest users
            $cart = session()->get('cart', []);
            
            // Initialize cartItems collection
            $cartItems = collect();
            foreach ($cart as $item) {
                // Fetch the product details, including the image
                $product = DB::table('products')->where('id', $item['pro_id'])->first();
                $cartItems->push((object)[
                    'pro_id' => $item['pro_id'],
                    'pro_sku' => $item['pro_sku'],
                    'qty' => $item['qty'],
                    'pro_name' => $product->pro_name,
                    'pro_image' => $product->pro_image ?? null, // Fetch product image
                    'frame_id' => $item['lens_price'] ?? 0,
                    'coating_id' => $item['coating_price'] ?? 0,
                    'pro_price' => $product->pro_price ?? 0 // Fetch product price
                ]);
            }

            $cart = $cartItems; // Use the new collection structure
        }

        // Calculate totals
        $total = (object)[
            'total_price' => 0,
            'total_frame_id' => 0,
            'total_coating_id' => 0,
        ];

        // Calculate totals for both logged-in and guest users
        foreach ($cart as $item) {
            $total->total_price += $item->pro_price * $item->qty;
            $total->total_frame_id += $item->frame_id * $item->qty;
            $total->total_coating_id += $item->coating_id * $item->qty;
        }

        return view('cart', compact('cart', 'total'));
    }

    public function remove_cart($id)
    {
        if (Auth::check()) {
            // For logged-in users
            Cart::where('pro_id', $id)->where('cus_id', Auth::id())->delete(); // Remove the item from the database
        } else {
            // For guest users
            $cart = session()->get('cart', []);

            // Remove the item from the session cart
            foreach ($cart as $key => $item) {
                if ($item['pro_id'] == $id) {
                    unset($cart[$key]); // Remove the item from the cart
                    break; // Stop searching after finding the item
                }
            }

            // Update the session cart
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }

    public function plus_cart($id)
    {
        // Check if user is logged in
        if (Auth::check()) {
            // For logged-in users
            $cart = Cart::where('pro_id', $id)->where('cus_id', Auth::id())->first();
        
            if ($cart) {
                // First, increment the quantity
    
                $old_frame = $cart->frame_id / $cart->qty;
                $old_coating = $cart->coating_id / $cart->qty;
                $cart->qty += 1;
        
                // Multiply the updated quantity with the frame_id and coating_id
                $cart->frame_id = $old_frame * $cart->qty;
                $cart->coating_id = $old_coating * $cart->qty;
        
                // Save the updated cart item
                $cart->save();
            }
    
            return redirect()->route('cart');

        } else {
            // For guest users
            $cart = session()->get('cart', []);

            // Find the product in the session cart
            foreach ($cart as &$item) {
                
                if ($item['pro_id'] == $id) {
                    $old_frame = $item['lens_price'] / $item['qty'];
                    $old_coating = $item['coating_price'] / $item['qty'];

                    $item['qty'] += 1;

                    // Multiply the updated quantity with the frame_id and coating_id
                    $item['lens_price'] = $old_frame * $item['qty'];
                    $item['coating_price'] = $old_coating * $item['qty'];

                    break; // Stop searching after finding the item
                }
            }

            // Update the session cart
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }



    public function minus_cart($id)
    {
        // Check if user is logged in
        if (Auth::check()) {
            // For logged-in users
            $cart = Cart::where('pro_id', $id)->where('cus_id', Auth::id())->first();
            
             if ($cart && $cart->qty > 1) {
                // Decrement the quantity only if it's greater than 1

                $old_frame = $cart->frame_id / $cart->qty;
                $old_coating = $cart->coating_id / $cart->qty;

                $cart->qty -= 1;
        
                // Multiply the updated quantity with the frame_id and coating_id
                $cart->frame_id = $old_frame * $cart->qty;
                $cart->coating_id = $old_coating * $cart->qty;
        
                // Save the updated cart item
                $cart->save();
            }
        
            // Redirect to the cart route after updating
            return redirect()->route('cart');

        } else {
            // For guest users
            $cart = session()->get('cart', []);

            // Find the product in the session cart
            foreach ($cart as &$item) {
                
                if ($item['pro_id'] == $id && $item['qty'] > 1) {
                    $old_frame = $item['lens_price'] / $item['qty'];
                    $old_coating = $item['coating_price'] / $item['qty'];

                    $item['qty'] -= 1;

                    // Multiply the updated quantity with the frame_id and coating_id
                    $item['lens_price'] = $old_frame * $item['qty'];
                    $item['coating_price'] = $old_coating * $item['qty'];

                    break; // Stop searching after finding the item
                }
            }

            // Update the session cart
            session()->put('cart', $cart);
        }

        // Redirect to the cart route after updating
        return redirect()->route('cart');
    }



    public function checkout(Request $request)
    {
        

        // Check if user is logged in
        if (Auth::check()) {
            $checkout = DB::table('carts')
            ->leftJoin('products', 'carts.pro_id', '=', 'products.id')
            ->select('products.*', 'carts.*', 'carts.id as id')
            ->where('carts.cus_id', Auth::id())
            ->get();

            $total = DB::table('carts')
                ->leftJoin('products', 'carts.pro_id', '=', 'products.id')
                ->where('carts.cus_id', Auth::id())
                ->select(
                    DB::raw('SUM(products.pro_price * carts.qty) as total_price'),
                    DB::raw('SUM(carts.frame_id) as total_frame_id'),
                    DB::raw('SUM(carts.coating_id) as total_coating_id')
                )
                ->first();
        } else {
            // For guest users
            $checkout = session()->get('cart', []);
            
            // Initialize cartItems collection
            $cartItems = collect();
            foreach ($checkout as $item) {
                // Fetch the product details, including the image
                $product = DB::table('products')->where('id', $item['pro_id'])->first();
                $cartItems->push((object)[
                    'pro_id' => $item['pro_id'],
                    'pro_sku' => $item['pro_sku'],
                    'qty' => $item['qty'],
                    'pro_name' => $product->pro_name,
                    'pro_image' => $product->pro_image ?? null, // Fetch product image
                    'frame_id' => $item['lens_price'] ?? 0,
                    'coating_id' => $item['coating_price'] ?? 0,
                    'pro_price' => $product->pro_price ?? 0 // Fetch product price
                ]);
            }

            $checkout = $cartItems; // Use the new collection structure
        }

        // Calculate totals
        $total = (object)[
            'total_price' => 0,
            'total_frame_id' => 0,
            'total_coating_id' => 0,
        ];

        // Calculate totals for both logged-in and guest users
        foreach ($checkout as $item) {
            $total->total_price += $item->pro_price * $item->qty;
            $total->total_frame_id += $item->frame_id * $item->qty;
            $total->total_coating_id += $item->coating_id * $item->qty;
        }

        return view('checkout', compact('checkout', 'total'));
    }

    public function complete_order(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'house_no' => 'required|string|max:255',
            'apartment' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'post_code' => 'required|string|max:20', // Assuming postal codes can be alphanumeric
            'phone' => 'required|string|max:15', // Adjust length as needed
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'other_info' => 'nullable|string|max:500',
        ]);

        // Step 2: Create a new user
        $user = User::create([
            'name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash the password
        ]);

        // Step 3: Log in the newly created user
        Auth::login($user);

        $customerId = Auth::id();

         // Step 4: Retrieve items from session cart and insert into the carts table
        $sessionCart = session()->get('cart', []); // Assuming your session cart is stored under 'cart'

        if (!empty($sessionCart)) {
            foreach ($sessionCart as $item) {
                DB::table('carts')->insert([
                    'cus_id' => $customerId,
                    'pro_id' => $item['pro_id'],
                    'pro_sku' => $item['pro_sku'],
                    'frame_id' => $item['lens_price'],
                    'coating_id' => $item['coating_price'],
                    'qty' => $item['qty'],
                    // Add other necessary fields if you have them in the session cart
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Step 1: Retrieve cart items for the customer
        $checkout = DB::table('carts')
            ->leftJoin('products', 'carts.pro_id', '=', 'products.id')
            ->select('products.*', 'carts.*', 'carts.id as cart_id')
            ->where('carts.cus_id', $customerId)
            ->get();

        // Step 2: Calculate totals
        $total = DB::table('carts')
            ->leftJoin('products', 'carts.pro_id', '=', 'products.id')
            ->where('carts.cus_id', $customerId)
            ->select(
                DB::raw('SUM(products.pro_price * carts.qty) as total_price'),
                DB::raw('SUM(carts.frame_id) as total_frame_id'),
                DB::raw('SUM(carts.coating_id) as total_coating_id')
            )
            ->first();

        if ($checkout->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Step 3: Insert into orders table
        $orderId = DB::table('orders')->insertGetId([
            'cus_id' => $customerId,
            'total_price' => $total->total_price + $total->total_frame_id + $total->total_coating_id,
            'order_status' => 1,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'house_no' => $request->input('house_no'),
            'apartment' => $request->input('apartment'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'post_code' => $request->input('post_code'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'other_info' => $request->input('other_info'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Step 4: Insert each cart item into order_items table
        foreach ($checkout as $cartItem) {
            DB::table('order_items')->insert([
                'order_id' => $orderId,
                'cus_id' => $customerId,
                'pro_id' => $cartItem->pro_id,
                'pro_sku' => $cartItem->pro_sku,
                'pro_price' => $cartItem->pro_price * $cartItem->qty,
                'frame_price' => $cartItem->frame_id,
                'coating_price' => $cartItem->coating_id,
                'qty' => $cartItem->qty,
                'total' => ($cartItem->pro_price * $cartItem->qty)+$cartItem->frame_id + $cartItem->coating_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Step 5: Optionally, clear the cart after the order is saved
        DB::table('carts')->where('cus_id', $customerId)->delete();

        // Redirect to the order summary or thank you page
        return redirect()->route('order_summary', $orderId)
            ->with('success', 'Order placed successfully.');
    }


    public function order_summary($order_id)
    {
        // Step 1: Get the order details
        $order = DB::table('orders')
            ->where('id', $order_id)
            ->where('cus_id', Auth::id()) // Ensure the user is viewing their own order
            ->first();

        if (!$order) {
            return redirect()->route('home')->with('error', 'Order not found.');
        }

        // Step 2: Get the order items for this order
        $orderItems = DB::table('order_items')
            ->leftJoin('products', 'order_items.pro_id', '=', 'products.id')
            ->select('order_items.*', 'products.pro_name', 'products.pro_image', 'order_items.pro_price')
            ->where('order_id', $order_id)
            ->get();

        // Step 3: Pass the data to the view
        return view('order_summary', compact('order', 'orderItems'));
    }


    public function orders()
    {
        // Step 1: Get the order details for the authenticated user
        $orders = DB::table('orders')
            ->where('cus_id', Auth::id()) // Ensure the user is viewing their own orders
            ->get();
    
        // Step 2: Initialize an array to hold the orders with their items
        $ordersWithItems = [];
    
        // Step 3: Loop through each order to get its items
        foreach ($orders as $order) {
            $orderItems = DB::table('order_items')
                ->leftJoin('products', 'order_items.pro_id', '=', 'products.id')
                ->select('order_items.*', 'products.pro_name', 'products.pro_image', 'order_items.pro_price')
                ->where('order_items.order_id', $order->id) // Use the correct order ID
                ->get();
    
            // Step 4: Add the order and its items to the array
            $ordersWithItems[] = [
                'order' => $order,
                'items' => $orderItems,
            ];
        }
    
        // Step 5: Pass the data to the view
        return view('orders', compact('ordersWithItems'));
    }



}
