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
            <form action="{{route("panel.product.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="row">
                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Données du curseur</h3>
                        </div>
                        <div class="card-body row">
                          <div class="form-group col-xl-6">
                            <label for="p_name">Titre du curseur</label>
                            <input type="text" name="p_name" required id="p_name" class="form-control">
                          </div>
                          @if (!empty($categories) && count($categories) > 0)
                          <div class="form-group col-xl-6">
                            <label for="p_categorie">Categories</label>
                            <select id="p_categorie" name="p_categorie" class="form-control custom-select">
                              <option selected value="-" disabled>Select</option>
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name_fr}}</option>
                                @endforeach
                            </select>
                          </div>
                          @endif
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="form-group col-xl-6">
                            <label for="p_img_{{$i}}">Image du Curseur <b>{{$i}}</b></label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input"  @php if ($i == 1) { echo "required"; } @endphp  name="p_img_{{$i}}" id="p_img_{{$i}}">
                                <label class="custom-file-label" for="p_img_{{$i}}">Choisir le fichier (540x458)</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Télécharger</span>
                              </div>
                            </div>
                          </div>
                        @endfor
                          <div class="form-group col-xl-6">
                            <label for="p_sku">SKU</label>
                            <input type="text" id="p_sku" required name="p_sku" class="form-control">
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_price">Price</label>
                            <input type="text" id="p_price" required name="p_price" class="form-control">
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_status">Statut</label>
                            <select id="p_status" name="p_status" required class="form-control custom-select">
                              <option selected disabled>Sélectionnez une option</option>
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
