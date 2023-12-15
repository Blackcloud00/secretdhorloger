<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index() {
        $wishlistItem = session('wishlist', []);
        $totalPrice = 0;
        foreach($wishlistItem as $item){
            $unit_price = $item["price"] * $item["qty"];
            $totalPrice += $unit_price;
        }
        return view('frontend.pages.wishlist',compact('wishlistItem', 'totalPrice'));
    }
    public function add(Request $request) {
        $msgTxt = "bsk_001";
        $productID= $request->product_id;
        $qty= $request->product_qty;
        $product = products::find($productID);
        if(!$product){
            $msgTxt = "bsk_002";
            return back()->withError($msgTxt);
        }
        $wishlistItem = session('wishlist', []);
        if(array_key_exists($productID, $wishlistItem)){
            if($wishlistItem[$productID]['qty'] > $request->qtybutton && !empty($request->qtybutton) || $request->qtybutton == "0"){
                $request->qtybutton = intval($request->qtybutton);
                $msgTxt = "bsk_003";
                if( $request->qtybutton == 0){
                    $msgTxt = "bsk_004";
                    unset($wishlistItem[$productID]);
                }else{
                    $wishlistItem[$productID]['qty'] = $request->qtybutton;
                }
            }else{
                $msgTxt = "bsk_005";
                $wishlistItem[$productID]['qty'] += $qty;
            }
        }else{
            $wishlistItem[$productID]=[
                'image'=> $product->img_1,
                'price'=> $product->price,
                'qty' => $qty,
                'name' => $product->name,
            ];
        }
        session(['wishlist'=>$wishlistItem]);
        return back()->withSuccess($msgTxt);
    }

    public function remove(Request $request) {
       $productID = $request->product_id;
       $wishlistItem = session('wishlist', []);
       if(array_key_exists($productID, $wishlistItem)){
            unset($wishlistItem[$productID]);
        }
        session(['wishlist'=>$wishlistItem]);
        return back()->withSuccess("bsk_006");
    }
}
