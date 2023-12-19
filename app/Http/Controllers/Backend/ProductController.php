<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\products_content;
use App\Models\products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::all();
        $categories = Category::all();
        return view('backend.pages.product.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        for ($i=1; $i <= 5; $i++) {
            if($request->hasFile('p_img_'.$i)) {
                $resim = $request->file('p_img_'.$i);
                $dosyaAdi = time().'-'.Str::slug($request->p_name).".".$resim->getClientOriginalExtension();

                $resim->move(public_path('upload/product'), $dosyaAdi);
                $dosya["img_".$i] = 'upload/product/'.$dosyaAdi;
            }
        }

        products::create([
            'name' => $request->p_name,
            'category_id' => $request->p_categorie,
            'img_1' => $dosya["img_1"],
            'img_2' => $dosya["img_2"] ?? null,
            'img_3' => $dosya["img_3"] ?? null,
            'img_4' => $dosya["img_4"] ?? null,
            'img_5' => $dosya["img_5"] ?? null,
            'sku' =>  $request->p_sku,
            'price' =>  $request->p_price,
            'status' =>   $request->p_status,
         ]);

        return back()->withSuccess("Création réussie");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $status = [
            "0" => "Projet",
            "1" => "Publier",
        ];
        $product = products::where('id',$id)->first();
        $productcontent_fr = products_content::where('products_id',$product->id)->where('lang', 'fr')->first();
        $productcontent_en = products_content::where('products_id',$product->id)->where('lang', 'en')->first();
        $productcontent_de = products_content::where('products_id',$product->id)->where('lang', 'de')->first();
        //return $productcontent_fr;
        $categories = Category::all();
        return view('backend.pages.product.edit', compact('product','status','categories','productcontent_fr','productcontent_en', 'productcontent_de'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        for ($i=1; $i <= 5; $i++) {
            if($request->hasFile('p_img_'.$i)) {
                $resim = $request->file('p_img_'.$i);
                $dosyaAdi = time().'-'.Str::slug($request->p_name).".".$resim->getClientOriginalExtension();

                $resim->move(public_path('upload/product'), $dosyaAdi);
                $dosya["img_".$i] = 'upload/product/'.$dosyaAdi;
            }
        }

        if(empty($dosya["img_1"]) && !empty($request->r_img_1)){
            $dosya["img_1"]  = $request->r_img_1;
         }

         if(empty($dosya["img_2"]) && !empty($request->r_img_2)){
            $dosya["img_2"]  = $request->r_img_2;
         }

         if(empty($dosya["img_3"]) && !empty($request->r_img_3)){
            $dosya["img_3"]  = $request->r_img_3;
         }

         if(empty($dosya["img_4"]) && !empty($request->r_img_4)){
            $dosya["img_4"]  = $request->r_img_4;
         }

         if(empty($dosya["img_5"]) && !empty($request->r_img_5)){
            $dosya["img_5"]  = $request->r_img_5;
         }

        products::where('id',$id)->update([
            'name' => $request->p_name,
            'category_id' => $request->p_categorie,
            'img_1' => $dosya["img_1"],
            'img_2' => $dosya["img_2"] ?? null,
            'img_3' => $dosya["img_3"] ?? null,
            'img_4' => $dosya["img_4"] ?? null,
            'img_5' => $dosya["img_5"] ?? null,
            'sku' =>  $request->p_sku,
            'price' =>  $request->p_price,
            'status' =>   $request->p_status,
        ]);

        return back()->withSuccess("Mise à jour réussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = products::where('id',$id)->firstOrFail();
        if(!empty($products->img_1)){
            unlink($products->img_1);
        }
        if(!empty($products->img_2)){
            unlink($products->img_2);
        }
        if(!empty($products->img_3)){
            unlink($products->img_3);
        }
        if(!empty($products->img_4)){
            unlink($products->img_4);
        }
        if(!empty($products->img_5)){
            unlink($products->img_5);
        }
        $products->delete();

        return back()->withSuccess('Effacé avec succès');
    }
}
