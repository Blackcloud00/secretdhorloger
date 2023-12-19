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
        <form action="{{route("panel.pages.update", $page->id)}}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="name_fr" required id="name_fr" value="{{$page->nameFR ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="name_en">Titre du curseur EN</label>
                        <input type="text" name="name_en" required id="name_en"  value="{{$page->nameEN ?? ''}}" class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="name_de">Titre du curseur DE</label>
                        <input type="text" name="name_de" required id="name_de"   value="{{$page->nameDE ?? ''}}"  class="form-control">
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_fr">Description FR</label>
                        <textarea name="content_fr" cols="30" rows="5"  class="form-control p_description">{{$page->contentFR ?? ''}}</textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_en">Description EN</label>
                        <textarea name="content_en" cols="30" rows="5" class="form-control p_description">{{$page->contentEN ?? ''}}</textarea>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="content_de">Description DE</label>
                        <textarea name="content_de" cols="30" rows="5" class="form-control p_description">{{$page->contentDE ?? ''}}</textarea>
                      </div>
                      @if (!empty($pages) && count($pages) > 0)
                      <div class="form-group col-xl-6">
                        <label for="parent">Pages</label>
                        <select id="parent" name="parent" class="form-control custom-select">
                          <option selected value="-" disabled>Select</option>
                            @foreach ($pages as $item)
                            @if ($item->id ==  $page->parent )
                                <option value="{{$item->id}}" selected>{{$item->nameFR}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->nameFR}}</option>
                            @endif
                            @endforeach
                        </select>
                      </div>
                      @endif
                      <div class="form-group col-xl-6">
                        <label for="banner_img">Image du Banner <b></b></label>
                        <input type="text" class="custom-file-input hidden" value="{{$page["banner_img"] ?? ''}}" name="banner_img_item" id="banner_img_item">
                        <img src="{{asset($page["banner_img"] ?? 'upload/resimyok.jpg')}}" style="width: 250px; height: auto; margin-bottom:25px;" alt="">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="banner_img" id="banner_img">
                            <label class="custom-file-label" for="banner_img">Choisir le fichier (1920x210)</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Télécharger</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-xl-6">
                        <label for="status">Statut</label>
                        <select id="status" name="status" required class="form-control custom-select">
                            @if ($page->status == "1")
                            <option value="1" selected>Publier</option>
                            @else
                            <option value="1" >Publier</option>
                            @endif
                            @if ($page->status == "0")
                            <option value="0" selected>Projet</option>
                            @else
                            <option value="0">Projet</option>
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
