<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noRemoved = [1,2,3,4,5,6,7,8];

        $pages = Pages::all();
        return view('backend.pages.pages.index', compact('pages','noRemoved'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Pages::all();
        return view('backend.pages.pages.add', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile("banner_img")){
            $resim = $request->file('banner_img');
            $dosyaAdi = time().'-'.Str::slug($request->name_fr).".".$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/pages'), $dosyaAdi);
            $dosya["banner_img"] = 'upload/pages/'.$dosyaAdi;
        }

        Pages::create([
            'parent' => $request->parent ?? null,
            'nameFR' => $request->name_fr,
            'nameEN' =>  $request->name_en,
            'nameDE' =>  $request->name_de,
            'contentFR' =>  $request->content_fr ?? null,
            'contentEN' =>  $request->content_en ?? null,
            'contentDE' =>  $request->content_de ?? null,
            'banner_img' =>  $dosya["banner_img"] ?? null,
            'status' =>  $request->status,
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
        $pages = Pages::all();

        $page = Pages::where('id',$id)->first();
        return view('backend.pages.pages.edit', compact('page', 'status','pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->hasFile("banner_img")){
            $resim = $request->file('banner_img');
            $dosyaAdi = time().'-'.Str::slug($request->p_name).".".$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/pages'), $dosyaAdi);
            $dosya["banner_img"] = 'upload/pages/'.$dosyaAdi;
        }

        if(empty($dosya["banner_img"]) && !empty($request->banner_img_item)){
            $dosya["banner_img"]  = $request->banner_img_item;
         }

        Pages::where('id',$id)->update([
            'parent' => $request->parent ?? null,
            'nameFR' => $request->name_fr,
            'nameEN' =>  $request->name_en,
            'nameDE' =>  $request->name_de,
            'contentFR' =>  $request->content_fr ?? null,
            'contentEN' =>  $request->content_en ?? null,
            'contentDE' =>  $request->content_de ?? null,
            'banner_img' =>  $dosya["banner_img"] ?? null,
            'status' =>  $request->status,
         ]);

         return back()->withSuccess("Mise à jour réussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pages = Pages::where('id',$id)->firstOrFail();
        if(!empty($pages->banner_img)){
            unlink($pages->banner_img);
        }

        $pages->delete();

        return back()->withSuccess('Effacé avec succès');
    }
}
