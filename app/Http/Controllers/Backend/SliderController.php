<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use ImageResize;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        if($request->hasFile('slider_image')) {
            $resim = $request->file('slider_image');
            $dosyaAdi = time().'-'.Str::slug($request->slider_title).".".$resim->getClientOriginalExtension();

            $resim->move(public_path('upload/slider'), $dosyaAdi);
            $dosyaLocal = 'upload/slider/'.$dosyaAdi;
        }
        Slider::create([
            'image' => $dosyaLocal,
            'small_text' =>  $request->slider_small_txt,
            'lang' =>  $request->slider_lang,
            'text_key' =>  Str::slug($request->slider_title),
            'name' =>  $request->slider_title,
            'button_content' =>  $request->btn_txt,
            'content' =>  $request->slider_content,
            'link' =>  $request->slider_link,
            'status' =>  $request->slider_status,
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
        $status = [
            "0" => "Projet",
            "1" => "Publier",
        ];
        $slider = Slider::where('id',$id)->first();
        return view('backend.pages.slider.edit', compact('slider','lang','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->hasFile('slider_image')) {
            $resim = $request->file('slider_image');
            $dosyaAdi = time().'-'.Str::slug($request->slider_title).".".$resim->getClientOriginalExtension();

            $resim->move(public_path('upload/slider'), $dosyaAdi);
            $dosyaLocal = 'upload/slider/'.$dosyaAdi;
        }
        if(empty($dosyaLocal)){
           $dosyaLocal  = $request->real_slider_image;
        }
        Slider::where('id',$id)->update([
            'image' => $dosyaLocal ?? NULL,
            'small_text' =>  $request->slider_small_txt,
            'lang' =>  $request->slider_lang,
            'text_key' =>  Str::slug($request->slider_title),
            'name' =>  $request->slider_title,
            'button_content' =>  $request->btn_txt,
            'content' =>  $request->slider_content,
            'link' =>  $request->slider_link,
            'status' =>  $request->slider_status,
        ]);
        return back()->withSuccess("Mise à jour réussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::where('id',$id)->firstOrFail();
        if(!empty($slider->image)){
            unlink($slider->image);
        }

        $slider->delete();

        return back()->withSuccess('Effacé avec succès');
    }
}
