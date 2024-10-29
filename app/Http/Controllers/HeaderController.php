<?php

namespace App\Http\Controllers;

use App\Models\header;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HeaderController extends Controller
{
    public function load_header() 
    {
        $header = DB::table('headers')
        ->select()
        ->where('id', 1)
        ->first();

        return view('admin.header', compact('header'));
    }
    
    public function update_header(Request $request)
    {
                      
            $header1                 = header::find(1);
            $header1->heading_text   = $request->input('heading_text');
            $header1->video_link     = $request->input('video_link');

            if($request->hasFile('top_bar_image')){

                // Get the old image path
                $oldtop_bar_image = public_path('/uploads/header_image/') . $header1->top_bar_image;

                // Check if the old image exists and delete it
                if (!empty($oldtop_bar_image) && file_exists($oldtop_bar_image)) {
                    unlink($oldtop_bar_image); // Delete the old image
                }

                $top_bar_image = $request->file('top_bar_image');

                $top_bar_image_name1 = hexdec(uniqid()).'.'.$top_bar_image->getClientOriginalExtension();

                $top_bar_image->move(public_path('/uploads/header_image/'), $top_bar_image_name1);

                $header1->top_bar_image = $top_bar_image_name1;
            }

            if($request->hasFile('logo_image')){

                // Get the old image path
                $old_logo = public_path('/uploads/header_image/') . $header1->logo;

                // Check if the old image exists and delete it
                if (!empty($old_logo) && file_exists($old_logo)) {
                    unlink($old_logo); // Delete the old image
                }

                $logo_image = $request->file('logo_image');

                $logo_name1 = hexdec(uniqid()).'.'.$logo_image->getClientOriginalExtension();

                $logo_image->move(public_path('/uploads/header_image/'), $logo_name1);

                $header1->logo = $logo_name1;
            }

            $header1->save();
            return redirect()->route('header');
    }

    public function update_banner1(Request $request)
    {
                      
            $header2                  = header::find(1);
            $header2->banner1_title    = $request->input('banner_title');
            $header2->banner1_desc     = $request->input('banner_desc');
            $header2->banner1_link     = $request->input('banner_link');

            if($request->hasFile('banner_background')){

                // Get the old image path
                $old_banner1_image = public_path('/uploads/header_image/') . $header2->banner1_image;

                // Check if the old image exists and delete it
                if (!empty($old_banner1_image) && file_exists($old_banner1_image)) {
                    unlink($old_banner1_image); // Delete the old image
                }

                $banner_background = $request->file('banner_background');

                $banner_background_name = hexdec(uniqid()).'.'.$banner_background->getClientOriginalExtension();

                $banner_background->move(public_path('/uploads/header_image/'), $banner_background_name);

                $header2->banner1_image = $banner_background_name;
            }


            $header2->save();
            return redirect()->route('header');
    }


    public function update_banner2(Request $request)
    {
                      
            $header2 = header::find(1);

            if($request->hasFile('banner2_image')){

                // Get the old image path
                $old_banner2_image = public_path('/uploads/header_image/') . $header2->banner2_image;

                // Check if the old image exists and delete it
                if (!empty($old_banner2_image) && file_exists($old_banner2_image)) {
                    unlink($old_banner2_image); // Delete the old image
                }

                $banner2_image = $request->file('banner2_image');

                $banner2_image_name = hexdec(uniqid()).'.'.$banner2_image->getClientOriginalExtension();

                $banner2_image->move(public_path('/uploads/header_image/'), $banner2_image_name);

                $header2->banner2_image = $banner2_image_name;
            }

            if($request->hasFile('banner2_left_image')){

                // Get the old image path
                $old_banner2_left = public_path('/uploads/header_image/') . $header2->banner2_left;

                // Check if the old image exists and delete it
                if (!empty($old_banner2_left) && file_exists($old_banner2_left)) {
                    unlink($old_banner2_left); // Delete the old image
                }

                $banner2_left = $request->file('banner2_left_image');

                $banner2_left_name = hexdec(uniqid()).'.'.$banner2_left->getClientOriginalExtension();

                $banner2_left->move(public_path('/uploads/header_image/'), $banner2_left_name);

                $header2->banner2_left = $banner2_left_name;
            }

            if($request->hasFile('banner2_right_image')){

                // Get the old image path
                $old_banner2_right = public_path('/uploads/header_image/') . $header2->banner2_right;

                // Check if the old image exists and delete it
                if (!empty($old_banner2_right) && file_exists($old_banner2_right)) {
                    unlink($old_banner2_right); // Delete the old image
                }

                $banner2_right_image = $request->file('banner2_right_image');

                $banner2_right_image_name = hexdec(uniqid()).'.'.$banner2_right_image->getClientOriginalExtension();

                $banner2_right_image->move(public_path('/uploads/header_image/'), $banner2_right_image_name);

                $header2->banner2_right = $banner2_right_image_name;
            }


            $header2->save();
            return redirect()->route('header');
    }


    public function update_com_detail(Request $request)
    {
                      
            $company                  = header::find(1);
            $company->com_phone    = $request->input('com_phone');
            $company->com_email     = $request->input('com_email');
            $company->com_address     = $request->input('com_address');
            $company->com_detail     = $request->input('com_detail');
            $company->fb_link     = $request->input('fb_link');
            $company->insta_link     = $request->input('insta_link');
            $company->x_link     = $request->input('x_link');
            $company->youtube_link     = $request->input('youtube_link');
            $company->tiktok_link     = $request->input('tiktok_link');

            $company->save();
            return redirect()->route('header');
    }


    
    
}
