<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about(){
        return view('frontend.pages.about');
    }

    public function campaigns(){

    }


    public function campaigndetail(){

    }

    public function search(){

    }

    public function products(){
        return view('frontend.pages.products');
    }

    public function productdetail(){
        return view('frontend.pages.product');
    }

    public function contact(Request $request){
        $whereami = $request;
        $categories = Category::where('status','1')->get();
        return view('frontend.pages.contact', compact('whereami'));
    }

}
