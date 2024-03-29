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
        <form action="{{route("panel.categorie.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Données du curseur</h3>
                    </div>
                    <div class="card-body row">
                      <div class="form-group col-xl-6">
                        <label for="c_name_en">Nom EN</label>
                        <input type="text" name="c_name_en" required id="c_name_en" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_name_fr">Nom FR</label>
                        <input type="text" id="c_name_fr" required name="c_name_fr" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_name_de">Nom DE</label>
                        <input type="text" id="c_name_de" required name="c_name_de" value="" class="form-control">
                      </div>
                      @if (!empty($categories) && count($categories) > 0)
                      <div class="form-group col-xl-6">
                        <label for="c_parent">Parent</label>
                        <select id="c_parent" name="c_parent" class="form-control custom-select">
                          <option selected value="" disabled>Select</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name_fr}}</option>
                            @endforeach
                        </select>
                      </div>
                      @endif
                      <div class="form-group col-xl-6">
                        <label for="c_seo_title_en">Seo Title EN</label>
                        <input type="text" id="c_seo_title_en"  name="c_seo_title_en" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_title_fr">Seo Title FR</label>
                        <input type="text" id="c_seo_title_fr"  name="c_seo_title_fr" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_title_de">Seo Title DE</label>
                        <input type="text" id="c_seo_title_de"  name="c_seo_title_de" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_desc_en">Seo Desc EN</label>
                        <textarea type="text" id="c_seo_desc_en"  name="c_seo_desc_en" class="form-control"></textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_desc_fr">Seo Desc FR</label>
                        <textarea type="text" id="c_seo_desc_fr"  name="c_seo_desc_fr" class="form-control"></textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_desc_de">Seo Desc DE</label>
                        <textarea type="text" id="c_seo_desc_de"  name="c_seo_desc_de" class="form-control"></textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_keyword_en">Seo Keyword EN</label>
                        <input type="text" id="c_seo_keyword_en"  name="c_seo_keyword_en" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_keyword_fr">Seo Keyword FR</label>
                        <input type="text" id="c_seo_keyword_fr"  name="c_seo_keyword_fr" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_seo_keyword_de">Seo Keyword DE</label>
                        <input type="text" id="c_seo_keyword_de"  name="c_seo_keyword_de" value="" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="c_status">Statut</label>
                        <select id="c_status" name="c_status" required class="form-control custom-select">
                          <option selected value="-" disabled>Select</option>
                          <option value="1">Publier</option>
                          <option value="0">Projet</option>
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
