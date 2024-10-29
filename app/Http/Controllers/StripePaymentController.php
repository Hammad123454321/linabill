<?php

namespace App\Http\Controllers;

use Stripe;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class StripePaymentController extends Controller
{
    public function stripe(): View
    {
        return view('stripe');
    }

    public function stripeCheckout(Request $request)
    {

        // dd($request->all());

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
            'payment' => 'required',
        ]);

        


        if($request->input('payment') == 'stripe'){

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




        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $redirectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';

        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,

            'customer_email' => Auth::user()->email,

            'payment_method_types' => ['link','card'],

            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $request->input('products'),
                        ],
                        'unit_amount' => 100 * $request->input('total_bill'),
                        'currency' => 'USD',
                    ],
                    'quantity' => 1
                ],
            ],

            'mode' => 'payment',
            'allow_promotion_codes' => false,
        ]);

        if($response->status == 'complete'){

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

        // return redirect($response['url']);

        }else if($request->input('payment') == 'cash_on_delivery'){

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
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        return redirect()->route('order_summary')
                            ->with('success','Payment successful.');
    }

}
