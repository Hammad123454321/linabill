<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $newest_product = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->orderBy('products.created_at', 'desc')
            ->limit(10)
            ->get();

        $best_seller = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->orderBy('products.created_at', 'asc')
            ->limit(10)
            ->get();

            
        $deal_of_the_week = DB::table('products')
            ->leftJoin(DB::raw('(SELECT pro_id, MIN(id) AS first_sku_id FROM product_skus GROUP BY pro_id) as sku'), 'products.id', '=', 'sku.pro_id')
            ->select('products.*', 'sku.first_sku_id')
            ->orderBy('products.created_at', 'asc')
            ->limit(10)
            ->get();

        $feature_selection = DB::table('feature_selections')->get();
        $new_banners = DB::table('new_banners')->get();
        $style_choices = DB::table('style_choices')->get();
        $lens_selections = DB::table('lens_selections')->get();
        $header = DB::table('headers')->get()->first();
        $banner = DB::table('main_banners')->get();

        return view('home', compact('newest_product', 'deal_of_the_week', 'best_seller', 'feature_selection', 'new_banners', 'style_choices', 'lens_selections', 'header', 'banner'));
    }
}
