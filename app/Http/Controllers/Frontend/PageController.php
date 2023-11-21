<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Models\products;
use App\Models\products_content;
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

    public function productscategorie(Request $request){
        $url = $request->url();
        $parts = explode('/', $url);
        $lastSlug = end($parts);
        $categories = Category::where('status','1')->where('slug',$lastSlug)->first();
        $products = products::with('products_content')->where('status','1')->where('category_id',$categories->id)->paginate(12);
        return view('frontend.pages.products', compact('products'));
    }

    public function products(){
        $categories = Category::where('status','1')->get();
        $products = products::with('products_content')->where('status','1')->paginate(12);
        return view('frontend.pages.products', compact('products','categories'));
    }

    public function productdetail(Request $request){
        $url = $request->url();
        $parts = explode('/', $url);
        $lastSlug = end($parts);
        $product = products::with('products_content')->where('slug',$lastSlug)->where('status','1')->first();
        return view('frontend.pages.product', compact('product'));
    }

    public function contact(Request $request){
        $whereami = $request;
        $categories = Category::where('status','1')->get();
        return view('frontend.pages.contact', compact('whereami'));
    }

}
