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
        <form action="{{route("panel.campaigns.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Données du page</h3>
                    </div>
                    <div class="card-body row">
                      <div class="form-group col-xl-6">
                        <label for="name_fr">Titre du curseur FR</label>
                        <input type="text" name="name_fr" required id="name_fr" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="name_en">Titre du curseur EN</label>
                        <input type="text" name="name_en" required id="name_en" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="name_de">Titre du curseur DE</label>
                        <input type="text" name="name_de" required id="name_de" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_fr">Description FR</label>
                        <textarea name="content_fr" cols="30" rows="5"  class="form-control p_description"></textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_en">Description EN</label>
                        <textarea name="content_en" cols="30" rows="5"  class="form-control p_description"></textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_de">Description DE</label>
                        <textarea name="content_de" cols="30" rows="5"  class="form-control p_description"></textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="banner_img">Image du Banner <b></b></label>
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
                        <input type="text" name="discount_rate" id="discount_rate" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="discount_code">Discount Code</label>
                        <input type="text" name="discount_code" id="discount_code" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="campaign_type">Campaign Type</label>
                        <select id="campaign_type" name="campaign_type" required class="form-control custom-select">
                          <option selected value="0">All Products Discount</option>
                          <option value="1">Discount Code at Basket</option>
                        </select>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="status">Statut</label>
                        <select id="status" name="status" required class="form-control custom-select">
                          <option selected value="1">Active</option>
                          <option value="0">Passive</option>
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
