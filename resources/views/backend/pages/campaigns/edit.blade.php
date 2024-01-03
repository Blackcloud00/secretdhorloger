@extends('backend.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajout d'un page</h1>
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
        <form action="{{route("panel.campaigns.update", $campaign->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
           <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Données du page</h3>
                    </div>
                    <div class="card-body row">
                      <div class="form-group col-xl-6">
                        <label for="name_fr">Titre du curseur FR</label>
                        <input type="text" name="name_fr" required id="name_fr"  value="{{$campaign->nameFR ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="name_en">Titre du curseur EN</label>
                        <input type="text" name="name_en" required id="name_en" value="{{$campaign->nameEN ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="name_de">Titre du curseur DE</label>
                        <input type="text" name="name_de" required id="name_de" value="{{$campaign->nameDE ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_fr">Description FR</label>
                        <textarea name="content_fr" cols="30" rows="5" class="form-control p_description">{{$campaign->contentFR ?? ''}}</textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_en">Description EN</label>
                        <textarea name="content_en" cols="30" rows="5"  class="form-control p_description">{{$campaign->contentEN ?? ''}}</textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_de">Description DE</label>
                        <textarea name="content_de" cols="30" rows="5" class="form-control p_description">{{$campaign->contentDE ?? ''}}</textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="banner_img">Image du Banner <b></b></label>
                        <input type="text" class="custom-file-input hidden" value="{{$campaign["banner_img"] ?? ''}}" name="banner_img_item" id="banner_img_item">
                        <img src="{{asset($campaign["banner_img"] ?? 'upload/resimyok.jpg')}}" style="width: 250px; height: auto; margin-bottom:25px;" alt="">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="banner_img" id="banner_img">
                            <label class="custom-file-label" for="banner_img">Choisir le fichier (570x290)</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Télécharger</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="discount_rate">Discount Rate</label>
                        <input type="text" name="discount_rate" id="discount_rate" value="{{$campaign->discount_rate ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="discount_code">Discount Code | OUT-URL</label>
                        <input type="text" name="discount_code" id="discount_code" value="{{$campaign->discount_code ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="campaign_type">Campaign Type</label>
                        <select id="campaign_type" name="campaign_type" required class="form-control custom-select">
                          @if ($campaign->campaign_type == "1")
                          <option value="1" selected>Discount Code at Basket</option>
                          @else
                          <option value="1" >Discount Code at Basket</option>
                          @endif
                          @if ($campaign->campaign_type == "0")
                          <option value="0" selected>All Products Discount</option>
                          @else
                          <option value="0">All Products Discount</option>
                          @endif
                        </select>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="status">Statut</label>
                        <select id="status" name="status" required class="form-control custom-select">
                            @if ($campaign->status == "1")
                            <option value="1" selected>Active</option>
                            @else
                            <option value="1" >Active</option>
                            @endif
                            @if ($campaign->status == "0")
                            <option value="0" selected>Passive</option>
                            @else
                            <option value="0">Passive</option>
                            @endif
                        </select>
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
