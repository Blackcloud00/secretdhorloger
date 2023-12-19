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
            <form action="{{route("panel.pages.store")}}" method="POST" enctype="multipart/form-data">
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
                          @if (!empty($pages) && count($pages) > 0)
                          <div class="form-group col-xl-6">
                            <label for="parent">Pages</label>
                            <select id="parent" name="parent" class="form-control custom-select">
                              <option selected value="-" disabled>Select</option>
                                @foreach ($pages as $item)
                                <option value="{{$item->id}}">{{$item->nameFR}}</option>
                                @endforeach
                            </select>
                          </div>
                          @endif
                          <div class="form-group col-xl-6">
                            <label for="banner_img">Image du Banner <b></b></label>
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
                              <option selected value="1">Publier</option>
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
