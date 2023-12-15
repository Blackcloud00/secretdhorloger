<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
       // return $orders;

        $urunData = array();
        $realUrunData = array();

        foreach($orders as $k => $item){
            $urunData[$k]["product_price"] = $item->product_price;
            $urunData[$k]["product_id"] = $item->product_id;
            $urunData[$k]["product_count"] = $item->product_count;
        }
        foreach($urunData as $item){
            $item["product_price"] = explode(",",$item["product_price"]);
            $item["product_id"] = explode(",",$item["product_id"]);
            $item["product_count"] = explode(",",$item["product_count"]);
            for($i=0; $i<=(count($item["product_id"]) - 1); $i++){
                $products = products::where('id',$item["product_id"][$i])->first();
                $realUrunData[$i]["product_price"] = $item["product_price"][$i];
                $realUrunData[$i]["product_id"] = $item["product_id"][$i];
                $realUrunData[$i]["product_count"] = $item["product_count"][$i];
                $realUrunData[$i]["product_img"] = $products->img_1;
                $realUrunData[$i]["product_sku"] = $products->sku;
                $realUrunData[$i]["product_name"] = $products->name;
            }
        }

        return view('backend.pages.order.index', compact('orders',"realUrunData"));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $status = [
            "0" => "New Order",
            "1" => "Complated",
            "2" => "Canceled",
        ];
         $orders = Order::where('id',$id)->first();

         $urunData = array();
         $realUrunData = array();

        $urunData["product_price"] = $orders->product_price;
        $urunData["product_id"] = $orders->product_id;
        $urunData["product_count"] = $orders->product_count;

        $urunData["product_price"] = explode(",",$urunData["product_price"]);
        $urunData["product_id"] = explode(",",$urunData["product_id"]);
        $urunData["product_count"] = explode(",",$urunData["product_count"]);
        for($i=0; $i<=(count($urunData["product_id"]) - 1); $i++){
            $products = products::where('id',$urunData["product_id"][$i])->first();
            $realUrunData[$i]["product_price"] = $urunData["product_price"][$i];
            $realUrunData[$i]["product_id"] = $urunData["product_id"][$i];
            $realUrunData[$i]["product_count"] = $urunData["product_count"][$i];
            $realUrunData[$i]["product_img"] = $products->img_1;
            $realUrunData[$i]["product_sku"] = $products->sku;
            $realUrunData[$i]["product_name"] = $products->name;
         }

        return view('backend.pages.order.edit', compact('realUrunData', 'orders', "status"));
    }

    public function update(Request $request, string $id)
    {
       // return $request;
        Order::where('id',$id)->update([
            'order_status' =>   $request->o_status,
        ]);
        return back()->withSuccess("Création réussie");
    }

    public function destroy(string $id)
    {
        //
    }
}
