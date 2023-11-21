@extends('backend.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajout d'un curseur</h1>
          </div>
        </div>
        @if (session()->get('success'))
        <div class="row mt-3 mb-1 ">
            <div class="alert alert-success">{{session()->get('success')}}</div>
        </div>
      @endif
      @if ($errors)
        @foreach ($errors->all() as $error)
        <div class="row mb-1 ">
            <div class="alert alert-danger">{{$error}}</div>
        </div>
        @endforeach
      @endif
      </div>
    </section>
    <section class="content">
        <form action="{{route("panel.slider.update",$slider->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Données du curseur</h3>
                    </div>
                    <div class="card-body row">
                      <div class="form-group col-xl-6">
                        <label for="slider_title">Titre du curseur</label>
                        <input type="text" name="slider_title" required id="slider_title" value="{{$slider->name ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="slider_small_txt">Slider Small Text</label>
                        <input type="text" id="slider_small_txt" required name="slider_small_txt" value="{{$slider->small_text ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <div class="input-group">
                            <input type="text" class="custom-file-input hidden" value="{{$slider->image ?? ''}}" name="real_slider_image" id="real_slider_image">
                            <img src="{{asset($slider->image ?? 'upload/resimyok.jpg')}}" style="max-width: 300px; max-height: 300px;" alt="">
                        </div>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="slider_image" >Image du Curseur</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="slider_image" id="slider_image">
                            <label class="custom-file-label" for="slider_image">Choisir le fichier (540x458)</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Télécharger</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="slider_lang">Langue</label>
                        <select id="slider_lang" name="slider_lang" required class="form-control custom-select">
                          <option selected  value="{{$slider->lang ?? ''}}">{{$lang[$slider->lang]}}</option>
                          @if ($slider->lang != "fr")
                          <option value="fr">Français</option>
                          @endif
                          @if ($slider->lang != "de")
                          <option value="de">Allemand</option>
                          @endif
                          @if ($slider->lang != "en")
                          <option value="en">Anglais</option>
                          @endif
                        </select>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="slider_status">Statut</label>
                        <select id="slider_status" name="slider_status" required class="form-control custom-select">
                          <option selected value="{{$slider->status ?? ''}}">{{$status[$slider->status]}}</option>
                          @if ($slider->status != "1")
                          <option value="1">Publier</option>
                          @endif
                          @if ($slider->status != "0")
                          <option value="0">Projet</option>
                          @endif
                        </select>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="slider_link">Lien</label>
                        <input type="text" id="slider_link" name="slider_link"  value="{{$slider->link ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="btn_txt">Texte du bouton</label>
                        <input type="text" id="btn_txt"  name="btn_txt" value="{{$slider->button_content ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-12">
                        <label for="slider_content">Contenu du curseur</label>
                        <textarea id="slider_content" name="slider_content" required class="form-control" rows="4">{{$slider->content ?? ''}}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
           </div>
           <div class="row">
                <div class="col-12">
                <a href="#" class="btn btn-secondary">Annuler</a>
                <input type="submit" value="Créer" class="btn btn-success float-right">
                </div>
           </div>
        </form>
    </section>
@endsection
