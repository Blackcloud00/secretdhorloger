<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Pages;
use App\Models\Category;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\products_content;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about(){
        $page = Pages::where('id','4')->get();
        return view('frontend.pages.about', compact('page'));
    }

    public function information(Request $request){
        $url = $request->url();
        $parts = explode('/', $url);
        $lastSlug = end($parts);
        $page = Pages::where('slug',$lastSlug)->where('status','1')->first();
        return view('frontend.pages.info', compact('page'));
    }


    public function campaigndetail(){

    }

    public function search(){

    }

    public function productscategorie(Request $request){
        $url = $request->url();
        $parts = explode('/', $url);
        $lastSlug = end($parts);
        $page = Pages::where('id','3')->get();
        $mainCat = Category::where('status','1')->where('parent',null)->withCount("items")->get();
         $subCat = Category::where('status','1')->whereNotNull('parent')->withCount("items")->get();
        $categories = Category::where('status','1')->where('slug',$lastSlug)->first();
        $products = products::with('products_content')->where('status','1')->where('category_id',$categories->id)->paginate(12);
        return view('frontend.pages.products', compact('products','mainCat','subCat','page'));
    }

    public function products(){
        $categories = Category::where('status','1')->get();
        $page = Pages::where('id','3')->get();
        $mainCat = Category::where('status','1')->where('parent',null)->withCount("items")->get();
        $subCat = Category::where('status','1')->whereNotNull('parent')->withCount("items")->get();
        $products = products::with('products_content')->where('status','1')->paginate(12);
        return view('frontend.pages.products', compact('products','categories', 'mainCat', 'subCat','page'));
    }

    public function productdetail(Request $request){
        $url = $request->url();
        $parts = explode('/', $url);
        $page = Pages::where('id','3')->get();
        $lastSlug = end($parts);
        $product = products::with('products_content')->where('slug',$lastSlug)->where('status','1')->first();
        return view('frontend.pages.product', compact('product','page'));
    }

    public function contact(Request $request){
        $whereami = $request;
        $categories = Category::where('status','1')->get();
        $page = Pages::where('id','1')->get();
        return view('frontend.pages.contact', compact('whereami','page'));
    }


    public function Result(Request $request){
        return view('frontend.pages.result');
    }

}
