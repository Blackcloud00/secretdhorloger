<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index() {
        $wishlistItem = session('wishlist', []);
        $totalPrice = 0;
        foreach($wishlistItem as $item){
            $unit_price = $item["price"] * $item["qty"];
            $totalPrice += $unit_price;
        }
        return view('frontend.pages.checkout', compact('totalPrice'));
    }

    public function add(Request $request) {
        //return $request;
        $productArray = $request;
        $product["id"] = "";
        $product["qty"] = "";
        $product["price"] = "";
        for ($i = 1; $i <= $request->count; $i++) {
            if($i == $request->count){
                $product["id"] .= $productArray["order_item_".$i."_id"];
                $product["qty"] .= $productArray["order_item_".$i."_qty"];
                $product["price"] .= $productArray["order_item_".$i."_unit_price"];
            }else{
                $product["id"] .= $productArray["order_item_".$i."_id"] .",";
                $product["qty"] .= $productArray["order_item_".$i."_qty"] .",";
                $product["price"] .= $productArray["order_item_".$i."_unit_price"] .",";
            }
        }
       // return $product["id"];
        $adress =  $request->adress_1 . " " .  $request->adress_2;
        Order::create([
            'user_name'=>  $request->first_name,
            'user_surname'=>  $request->last_name,
            'user_phone'=> $request->phone,
            'user_mail'=> $request->email,
            'user_adress'=> $adress,
            'user_region'=> $request->region,
            'user_city'=> $request->city,
            'user_state'=> $request->state,
            'user_postcode'=> $request->zip,
            'order_status' => "0",
            'product_count'=> $product["qty"],
            'product_id'=> $product["id"],
            'product_price'=> $product["price"],
            'order_total_price'=> $request->total_price,
         ]);
        session()->forget('wishlist');
        $mailData["user"]["name"] = $request->first_name;
        $mailData["user"]["surname"] = $request->last_name;
        $mailData["user"]["phone"] = $request->phone;
        $mailData["user"]["mail"] = $request->email;
        $mailData["user"]["adress"] = $adress;
        $mailData["user"]["price"] = $request->total_price;
        $mailData["urun"] = $product;
        Mail::to('demo@gmail.com')->send(new OrderMail($mailData));
        return redirect()->route("result");
    }
}
