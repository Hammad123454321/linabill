<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\shapes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

        

        return view('shop', compact('products'));
    }

    public function shop_by_shape(Request $request, $shape)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->leftJoin( 'shapes', 'products.pro_shape', '=', 'shapes.id')
            ->select('products.*', 'sku.first_sku_id', 'shape_name')
            ->where('shapes.shape_name', 'like', '%' . $shape . '%')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

            // dd($products);

        return view('shop_by_shape', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('query');
        
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->where('products.pro_name', 'like', '%' . $search . '%')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

            // dd($products);

        return view('search', compact('products'));
    }

    public function shop_by_size(Request $request, $shape)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->leftJoin( 'sizes', 'products.pro_size', '=', 'sizes.id')
            ->select('products.*', 'sku.first_sku_id', 'size_name')
            ->where('sizes.size_name', 'like', '%' . $shape . '%')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

            // dd($products);

        return view('shop_by_size', compact('products'));
    }

    public function shop_by_color(Request $request, $color)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->leftJoin( 'product_skus', 'products.id', '=', 'product_skus.pro_id')
            ->leftJoin( 'colors', 'product_skus.pro_color', '=', 'colors.id')
            ->select('products.*', 'sku.first_sku_id', 'color_name')
            ->where('colors.color_name', 'like', '%' . $color . '%')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

            // dd($products);

        return view('shop_by_color', compact('products'));
    }

    public function shop_by_material(Request $request, $material)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->leftJoin( 'product_materials', 'products.pro_material', '=', 'product_materials.id')
            ->select('products.*', 'sku.first_sku_id', 'mat_name')
            ->where('product_materials.mat_name', 'like', '%' . $material . '%')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

            // dd($products);

        return view('shop_by_material', compact('products'));
    }

    public function shop_by_frame(Request $request, $frame)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->where('pro_rim', 'like', '%' . $frame . '%')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

            // dd($products);

        return view('shop_by_frame', compact('products'));
    }

    public function filter_by_price(Request $request)
    {
        // Retrieve price inputs
        $start_price = $request->input('start_price');
        $end_price = $request->input('end_price');

        // Validate input (optional but recommended)
        if (is_null($start_price) || is_null($end_price)) {
            return redirect()->back()->with('error', 'Please provide both start and end prices.');
        }

        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            // Corrected use of whereBetween
            ->whereBetween('products.pro_price', [$start_price, $end_price])
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

        // Debugging output (uncomment if needed)
        // dd($products);

        return view('shope_by_price', compact('products'));
    }

    public function new_in(Request $request)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

        

        return view('new_in', compact('products'));
    }

    public function best_seller(Request $request)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

        

        return view('best_seller', compact('products'));
    }

    public function flash_sale(Request $request)
    {
        // Get products with pagination
        $products = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->where('pro_discount', '>', 0)
            ->orderBy('products.created_at', 'desc')
            ->paginate(12); // Display 12 products per page

        

        return view('flash_sale', compact('products'));
    }



}
