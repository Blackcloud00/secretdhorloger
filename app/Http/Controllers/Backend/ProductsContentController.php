<?php

namespace App\Http\Controllers\Backend;
use App\Models\products_content;
use App\Models\products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lang = [
            "en" => "Anglais",
            "de" => "Allemand",
            "fr" => "Français"
        ];
        $status = [
            "0" => "Projet",
            "1" => "Publier",
        ];
        $productcontent = products_content::all();
        return view('backend.pages.productcontent.index', compact('productcontent','lang','status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lang = [
            "en" => "Anglais",
            "de" => "Allemand",
            "fr" => "Français"
        ];
        $productcontent = products_content::all();
        $products = products::all();
        return view('backend.pages.productcontent.add', compact('productcontent','lang', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        products_content::create([
            'products_id' => $request->p_id,
            'lang' => $request->p_lang,
            'title' => $request->p_title,
            'short_des' => $request->p_short_des,
            'description' => $request->p_description,
            'technic_des' =>  $request->p_technic_des,
            'seo_title' =>  $request->p_seo_title,
            'seo_desc' =>  $request->p_seo_desc,
            'seo_keyword' =>  $request->p_seo_keyword,
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
        $lang = [
            "en" => "Anglais",
            "de" => "Allemand",
            "fr" => "Français"
        ];
        $products = products::all();
        $productcontent = products_content::where('id',$id)->first();
        return view('backend.pages.productcontent.edit', compact('productcontent','lang','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //return $request;
        products_content::where('id',$id)->update([
            'products_id' => $request->p_id,
            'lang' => $request->p_lang,
            'title' => $request->p_title,
            'short_des' => $request->p_short_des,
            'description' => $request->p_description,
            'technic_des' =>  $request->p_technic_des,
            'seo_title' =>  $request->p_seo_title,
            'seo_desc' =>  $request->p_seo_desc,
            'seo_keyword' =>  $request->p_seo_keyword,
        ]);
        return back()->withSuccess("Mise à jour réussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productcontent = products_content::where('id',$id)->firstOrFail();

        $productcontent->delete();

        return back()->withSuccess('Effacé avec succès');
    }
}
