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
            <form action="{{route("panel.product.update", $product->id)}}" method="POST" enctype="multipart/form-data">
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
                            <label for="p_name">Titre du curseur</label>
                            <input type="text" name="p_name" required id="p_name" value="{{$product->name ?? ''}}" class="form-control">
                          </div>
                          @if (!empty($categories) && count($categories) > 0)
                          <div class="form-group col-xl-6">
                            <label for="p_categorie">Categories</label>
                            <select id="p_categorie" name="p_categorie" class="form-control custom-select">
                              <option selected value="-" disabled>Select</option>
                                @foreach ($categories as $item)
                                @if ($item->id ==  $product->category_id )
                                <option value="{{$item->id}}" selected>{{$item->name_fr}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->name_fr}}</option>
                                @endif
                                @endforeach
                            </select>
                          </div>
                          @endif
                          <div class="form-group col-xl-6">
                            <label for="p_sku">SKU</label>
                            <input type="text" id="p_sku" name="p_sku" value="{{$product->sku ?? ''}}" class="form-control">
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_price">Price</label>
                            <input type="text" id="p_price" name="p_price" value="{{$product->price ?? ''}}" class="form-control">
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_status">Statut</label>
                            <select id="p_status" name="p_status" required class="form-control custom-select">
                                <option selected value="{{$product->status ?? ''}}">{{$status[$product->status]}}</option>
                                @if ($product->status != "1")
                                <option value="1">Publier</option>
                                @endif
                                @if ($product->status != "0")
                                <option value="0">Projet</option>
                                @endif
                            </select>
                          </div>
                          @php
                          $productArray = json_decode(json_encode($product), true);
                      @endphp
                    @for ($i = 1; $i <= 5; $i++)
                    <div class="form-group col-xl-6">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="custom-file-input hidden" value="{{$productArray["img_" . $i] ?? ''}}" name="r_img_{{$i}}" id="r_img_{{$i}}">

                                <img src="{{asset($productArray["img_" . $i] ?? 'upload/resimyok.jpg')}}" style="width: 200; height: 200px;" alt="">
                            </div>
                            <div class="col-12">
                                <label for="p_img_{{$i}}">Image du Curseur <b>{{$i}}</b></label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="p_img_{{$i}}" id="p_img_{{$i}}">
                                    <label class="custom-file-label" for="p_img_{{$i}}">Choisir le fichier (540x458)</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Télécharger</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
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
