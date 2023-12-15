<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Slider;
use App\Models\Category;
use App\Models\products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = products::all();
        $sliders = Slider::all();
        $sliders = Slider::all();
        $orders = Order::all();

        return view('backend.pages.index', compact('categories', 'products', 'sliders', 'orders'));
    }
}
