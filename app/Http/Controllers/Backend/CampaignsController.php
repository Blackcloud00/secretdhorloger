<?php

namespace App\Http\Controllers\Backend;

use App\Models\Campaigns;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaigns::all();
        return view('backend.pages.campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.campaigns.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile("banner_img")){
            $resim = $request->file('banner_img');
            $dosyaAdi = time().'-'.Str::slug($request->name_fr).".".$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/campaigns'), $dosyaAdi);
            $dosya["banner_img"] = 'upload/campaigns/'.$dosyaAdi;
        }

        Campaigns::create([
            'nameFR' => $request->name_fr,
            'nameEN' =>  $request->name_en,
            'nameDE' =>  $request->name_de,
            'contentFR' =>  $request->content_fr ?? null,
            'contentEN' =>  $request->content_en ?? null,
            'contentDE' =>  $request->content_de ?? null,
            'banner_img' =>  $dosya["banner_img"] ?? null,
            'campaign_type' =>  $request->campaign_type ?? null,
            'discount_rate' =>  $request->discount_rate ?? null,
            'discount_code' =>  $request->discount_code ?? null,
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
            "1" => "Active",
            "0" => "Passive",
        ];

        $campaignType = [
            "1" => "Discount Code at Basket",
            "0" => "All Products Discount",
        ];

        $campaign = Campaigns::where('id',$id)->first();
        return view('backend.pages.campaigns.edit', compact('status', 'campaignType', 'campaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->hasFile("banner_img")){
            $resim = $request->file('banner_img');
            $dosyaAdi = time().'-'.Str::slug($request->name_fr).".".$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/pages'), $dosyaAdi);
            $dosya["banner_img"] = 'upload/pages/'.$dosyaAdi;
        }

        if(empty($dosya["banner_img"]) && !empty($request->banner_img_item)){
            $dosya["banner_img"]  = $request->banner_img_item;
         }

        Campaigns::where('id',$id)->update([
            'nameFR' => $request->name_fr,
            'nameEN' =>  $request->name_en,
            'nameDE' =>  $request->name_de,
            'contentFR' =>  $request->content_fr ?? null,
            'contentEN' =>  $request->content_en ?? null,
            'contentDE' =>  $request->content_de ?? null,
            'banner_img' =>  $dosya["banner_img"] ?? null,
            'campaign_type' =>  $request->campaign_type ?? null,
            'discount_rate' =>  $request->discount_rate ?? null,
            'discount_code' =>  $request->discount_code ?? null,
            'status' =>  $request->status,
         ]);

         return back()->withSuccess("Mise à jour réussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campaign = Campaigns::where('id',$id)->firstOrFail();
        if(!empty($campaign->banner_img)){
            unlink($campaign->banner_img);
        }

        $campaign->delete();

        return back()->withSuccess('Effacé avec succès');
    }
}
