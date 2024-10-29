<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\size;
use App\Models\color;
use App\Models\header;
use App\Models\shapes;
use App\Models\product_material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cus_id = auth()->check() ? auth()->user()->id : null;
    
            // If customer is logged in, get the cart count
            
            if (Auth::check()) {
                // Logged-in user cart from database
                $cartItemCount = $cus_id ? Cart::where('cus_id', $cus_id)->sum('qty') : 0;
            } else {
                // Guest cart from session
                $cart = session()->get('cart', []); // Get the cart from the session
                $cartItemCount = 0;

                // Calculate total quantity of items in the session cart
                foreach ($cart as $item) {
                    $cartItemCount += $item['qty'];
                }
            }

            $header = header::find(1);

            $shapes = shapes::all();
            $colors = color::all();
            $sizes = size::all();
            $materials = product_material::all();
    
            // Share the cart count with all views
            $view->with([
                'cartItemCount' => $cartItemCount,
                'headerdata' => $header,
                'shapes' => $shapes,
                'colors' => $colors,
                'sizes' => $sizes,
                'materials' => $materials,
            ]);
        });
    }
}
