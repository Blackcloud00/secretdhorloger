    @extends('backend.layout.app')

    @section('content')
    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Ajout d'un produit</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#product" data-toggle="tab">Produit Settings</a></li>
                  <li class="nav-item"><a class="nav-link " href="#french" data-toggle="tab">French</a></li>
                  <li class="nav-item"><a class="nav-link" href="#english" data-toggle="tab">English</a></li>
                  <li class="nav-item"><a class="nav-link" href="#german" data-toggle="tab">German</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="product">
                        <form action="{{route("panel.product.update", $product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                           <div class="row">
                                <div class="col-md-12">
                                  <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title">Données du curseur</h3>
                                    </div>
                                    <div class="card-body row">
                                      <div class="form-group col-xl-3">
                                        <label for="p_name">Titre du curseur</label>
                                        <input type="text" name="p_name" required id="p_name" value="{{$product->name ?? ''}}" class="form-control">
                                      </div>
                                      @if (!empty($categories) && count($categories) > 0)
                                      <div class="form-group col-xl-3">
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
                                      <div class="form-group col-xl-2">
                                        <label for="p_sku">SKU</label>
                                        <input type="text" id="p_sku" name="p_sku" value="{{$product->sku ?? ''}}" class="form-control">
                                      </div>
                                      <div class="form-group col-xl-2">
                                        <label for="p_price">Price</label>
                                        <input type="text" id="p_price" name="p_price" value="{{$product->price ?? ''}}" class="form-control">
                                      </div>
                                      <div class="form-group col-xl-2">
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
                                         <div class="form-group col-xl-3">
                                             <div class="row">
                                                 <div class="col-6">
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
                    </div>
                    <div class="tab-pane" id="french">
                        @php
                            $frmRoute = route("panel.productcontent.store");
                            $frmType = 'POST';
                            if (!empty($productcontent_fr)) {
                                $frmRoute = route("panel.productcontent.update", $productcontent_fr->id);
                                $frmType = "PUT";
                            }
                        @endphp
                        <form action="{{$frmRoute}}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method($frmType)
                           <div class="row">
                                <div class="col-md-12">
                                  <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title">Données du curseur</h3>
                                    </div>
                                    <div class="card-body row">
                                        @if (!empty($products) && count($products) > 0)
                                        <div class="form-group col-xl-6">
                                          <label for="p_id">Products Select</label>
                                          <select id="p_id" name="p_id" required class="form-control custom-select">
                                            <option selected value="-" disabled>Select</option>
                                              @foreach ($products as $item)
                                              <option value="{{$item->id}}">{{$item->name }}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                        @endif
                                      <div class="form-group col-xl-6 hidden" style="display: none;">
                                        <input type="text" name="p_lang" value="fr" id="p_lang"  class="form-control">
                                        <input type="text" name="p_id" value="{{$product->id}}" id="p_id"  class="form-control">
                                      </div>
                                      <div class="form-group col-xl-6">
                                        <label for="p_title">Titre du curseur</label>
                                        <input type="text" name="p_title" value="{{$productcontent_fr->title ?? ''}}" required id="p_title" class="form-control">
                                      </div>
                                      <div class="form-group col-xl-6">
                                        <label for="p_short_des">Short Des</label>
                                        <input type="text" id="p_short_des" value="{{$productcontent_fr->short_des ?? ''}}" required name="p_short_des" class="form-control">
                                      </div>
                                      <div class="form-group col-xl-6">
                                        <label for="p_description">Description</label>
                                        <textarea name="p_description" class="form-control p_description">{{$productcontent_fr->description ?? ''}}</textarea>
                                      </div>

                                      <div class="form-group col-xl-6">
                                        <label for="p_technic_des">Technic Descrirption</label>
                                        <textarea name="p_technic_des" cols="30" rows="5"  class="form-control p_description">{{$productcontent_fr->technic_des ?? ''}}</textarea>
                                      </div>
                                      <div class="form-group col-xl-6">
                                        <label for="p_seo_title">Seo Title</label>
                                        <textarea name="p_seo_title" id="p_seo_title" cols="30" rows="5"  class="form-control ">{{$productcontent_fr->seo_title ?? ''}}</textarea>
                                      </div>
                                      <div class="form-group col-xl-6">
                                        <label for="p_seo_desc">Seo Description</label>
                                        <textarea name="p_seo_desc" id="p_seo_desc" cols="30" rows="5"  class="form-control">{{$productcontent_fr->seo_desc ?? ''}}</textarea>
                                      </div>
                                      <div class="form-group col-xl-6">
                                        <label for="p_seo_keyword">Seo Keyword</label>
                                        <textarea name="p_seo_keyword" id="p_seo_keyword" cols="30" rows="5"  class="form-control">{{$productcontent_fr->seo_keyword ?? ''}}</textarea>
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
                    </div>
                    <div class="tab-pane" id="english">
                        @php
                        $frmRoute = route("panel.productcontent.store");
                        $frmType = 'POST';
                        if (!empty($productcontent_en)) {
                            $frmRoute = route("panel.productcontent.update", $productcontent_en->id);
                            $frmType = "PUT";
                        }
                    @endphp
                    <form action="{{$frmRoute}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method($frmType)
                       <div class="row">
                            <div class="col-md-12">
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Données du curseur</h3>
                                </div>
                                <div class="card-body row">
                                    @if (!empty($products) && count($products) > 0)
                                    <div class="form-group col-xl-6">
                                      <label for="p_id">Products Select</label>
                                      <select id="p_id" name="p_id" required class="form-control custom-select">
                                        <option selected value="-" disabled>Select</option>
                                          @foreach ($products as $item)
                                          <option value="{{$item->id}}">{{$item->name }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                    @endif
                                  <div class="form-group col-xl-6 hidden" style="display: none;">
                                    <input type="text" name="p_lang" value="en" id="p_lang"  class="form-control">
                                    <input type="text" name="p_id" value="{{$product->id}}" id="p_id"  class="form-control">
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_title">Titre du curseur</label>
                                    <input type="text" name="p_title" value="{{$productcontent_en->title ?? ''}}" required id="p_title" class="form-control">
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_short_des">Short Des</label>
                                    <input type="text" id="p_short_des" value="{{$productcontent_en->short_des ?? ''}}" required name="p_short_des" class="form-control">
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_description">Description</label>
                                    <textarea name="p_description"  cols="30" rows="5"  class="form-control p_description">{{$productcontent_en->description ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_technic_des">Technic Descrirption</label>
                                    <textarea name="p_technic_des" id="p_technic_des" cols="30" rows="5"  class="form-control p_description">{{$productcontent_en->technic_des ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_seo_title">Seo Title</label>
                                    <textarea name="p_seo_title" id="p_seo_title" cols="30" rows="5"  class="form-control">{{$productcontent_en->seo_title ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_seo_desc">Seo Description</label>
                                    <textarea name="p_seo_desc" id="p_seo_desc" cols="30" rows="5"  class="form-control">{{$productcontent_en->seo_desc ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_seo_keyword">Seo Keyword</label>
                                    <textarea name="p_seo_keyword" id="p_seo_keyword" cols="30" rows="5"  class="form-control">{{$productcontent_en->seo_keyword ?? ''}}</textarea>
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
                    </div>
                    <div class="tab-pane" id="german">
                        @php
                        $frmRoute = route("panel.productcontent.store");
                        $frmType = 'POST';
                        if (!empty($productcontent_de)) {
                            $frmRoute = route("panel.productcontent.update", $productcontent_de->id);
                            $frmType = "PUT";
                        }
                    @endphp
                    <form action="{{$frmRoute}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method($frmType)
                       <div class="row">
                            <div class="col-md-12">
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Données du curseur</h3>
                                </div>
                                <div class="card-body row">
                                    @if (!empty($products) && count($products) > 0)
                                    <div class="form-group col-xl-6">
                                      <label for="p_id">Products Select</label>
                                      <select id="p_id" name="p_id" required class="form-control custom-select">
                                        <option selected value="-" disabled>Select</option>
                                          @foreach ($products as $item)
                                          <option value="{{$item->id}}">{{$item->name }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                    @endif
                                  <div class="form-group col-xl-6 hidden" style="display: none;">
                                    <input type="text" name="p_lang" value="de" id="p_lang"  class="form-control">
                                    <input type="text" name="p_id" value="{{$product->id}}" id="p_id"  class="form-control">
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_title">Titre du curseur</label>
                                    <input type="text" name="p_title" value="{{$productcontent_de->title ?? ''}}" required id="p_title" class="form-control">
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_short_des">Short Des</label>
                                    <input type="text" id="p_short_des" value="{{$productcontent_de->short_des ?? ''}}" required name="p_short_des" class="form-control">
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_description">Description</label>
                                    <textarea name="p_description" cols="30" rows="5"  class="form-control p_description">{{$productcontent_de->description ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_technic_des">Technic Descrirption</label>
                                    <textarea name="p_technic_des" id="p_technic_des" cols="30" rows="5"  class="form-control p_description">{{$productcontent_de->technic_des ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_seo_title">Seo Title</label>
                                    <textarea name="p_seo_title" id="p_seo_title" cols="30" rows="5"  class="form-control">{{$productcontent_de->seo_title ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_seo_desc">Seo Description</label>
                                    <textarea name="p_seo_desc" id="p_seo_desc" cols="30" rows="5"  class="form-control">{{$productcontent_de->seo_desc ?? ''}}</textarea>
                                  </div>
                                  <div class="form-group col-xl-6">
                                    <label for="p_seo_keyword">Seo Keyword</label>
                                    <textarea name="p_seo_keyword" id="p_seo_keyword" cols="30" rows="5"  class="form-control">{{$productcontent_de->seo_keyword ?? ''}}</textarea>
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
                    </div>
                </div>
              </div>
            </div>
          </div>

    @endsection


