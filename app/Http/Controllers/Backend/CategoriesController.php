<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.pages.categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.categorie.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name_en' =>  $request->c_name_en,
            'name_fr' =>  $request->c_name_fr,
            'name_de' =>  $request->c_name_de,
            'parent' =>  $request->c_parent,
            'slug' =>  Str::slug($request->c_name_fr),
            'seo_title_en' =>  $request->c_seo_title_en,
            'seo_title_fr' =>  $request->c_seo_title_fr,
            'seo_title_de' =>  $request->c_seo_title_de,
            'seo_desc_en' =>  $request->c_seo_desc_en,
            'seo_desc_fr' =>  $request->c_seo_desc_fr,
            'seo_desc_de' =>  $request->c_seo_desc_de,
            'seo_keyword_en' =>  $request->c_seo_keyword_en,
            'seo_keyword_fr' =>  $request->c_seo_keyword_fr,
            'seo_keyword_de' =>  $request->c_seo_keyword_de,
            'status' =>  $request->c_status,
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
        $categorie = Category::where('id',$id)->first();
        $categories = Category::all();
        return view('backend.pages.categorie.edit', compact('categorie','status','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::where('id',$id)->update([
            'name_en' =>  $request->c_name_en,
            'name_fr' =>  $request->c_name_fr,
            'name_de' =>  $request->c_name_de,
            'parent' =>  $request->c_parent,
            'seo_title_en' =>  $request->c_seo_title_en,
            'seo_title_fr' =>  $request->c_seo_title_fr,
            'seo_title_de' =>  $request->c_seo_title_de,
            'seo_desc_en' =>  $request->c_seo_desc_en,
            'seo_desc_fr' =>  $request->c_seo_desc_fr,
            'seo_desc_de' =>  $request->c_seo_desc_de,
            'seo_keyword_en' =>  $request->c_seo_keyword_en,
            'seo_keyword_fr' =>  $request->c_seo_keyword_fr,
            'seo_keyword_de' =>  $request->c_seo_keyword_de,
            'status' =>  $request->c_status,
        ]);
        return back()->withSuccess("Mise à jour réussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Category::where('id',$id)->firstOrFail();

        $categorie->delete();

        return back()->withSuccess('Effacé avec succès');
    }
}
