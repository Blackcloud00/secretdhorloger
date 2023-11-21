<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Category;
use App\Models\products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageHomeController extends Controller
{
    public function homepage(){
        $home = 1;
        $slider = Slider::where('status','1')->get();
        $products = products::with('products_content')->where('status','1')->paginate(12);
        return view('frontend.pages.index', compact('slider','home','products'));
    }
}
