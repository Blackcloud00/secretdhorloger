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
            <form action="{{route("panel.productcontent.update", $productcontent->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                  @foreach ($products as $item)
                                  @if ($item->id == $productcontent->products_id)
                                  <option selected  value="{{$item->id}}">{{$item->name}}</option>
                                  @else
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endif
                                  @endforeach

                              </select>
                            </div>
                            @endif
                            <div class="form-group col-xl-6">
                                <label for="p_lang">Langue</label>
                                <select id="p_lang" name="p_lang" required class="form-control custom-select">
                                    <option selected  value="{{$productcontent->lang ?? ''}}">{{$lang[$productcontent->lang]}}</option>
                                    @if ($productcontent->lang != "fr")
                                    <option value="fr">Français</option>
                                    @endif
                                    @if ($productcontent->lang != "de")
                                    <option value="de">Allemand</option>
                                    @endif
                                    @if ($productcontent->lang != "en")
                                    <option value="en">Anglais</option>
                                    @endif
                                </select>
                              </div>
                          <div class="form-group col-xl-6">
                            <label for="p_title">Titre du curseur</label>
                            <input type="text" name="p_title" required value="{{$productcontent->title ?? ''}}"  required id="p_title" class="form-control">
                          </div>

                          <div class="form-group col-xl-6">
                            <label for="p_short_des">Short Des</label>
                            <input type="text" id="p_short_des" required value="{{$productcontent->short_des ?? ''}}" name="p_short_des" class="form-control">
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_description">Description</label>
                            <textarea name="p_description" id="p_description" cols="30" rows="5"  class="form-control">{{$productcontent->description ?? ''}}</textarea>
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_technic_des">Technic Descrirption</label>
                            <textarea name="p_technic_des" id="p_technic_des" cols="30" rows="5"  class="form-control">{{$productcontent->technic_des ?? ''}}</textarea>
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_seo_title">Seo Title</label>
                            <textarea name="p_seo_title" id="p_seo_title" cols="30" rows="5"  class="form-control">{{$productcontent->seo_title ?? ''}}</textarea>
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_seo_desc">Seo Description</label>
                            <textarea name="p_seo_desc" id="p_seo_desc" cols="30" rows="5"  class="form-control">{{$productcontent->seo_desc ?? ''}}</textarea>
                          </div>
                          <div class="form-group col-xl-6">
                            <label for="p_seo_keyword">Seo Keyword</label>
                            <textarea name="p_seo_keyword" id="p_seo_keyword" cols="30" rows="5"  class="form-control">{{$productcontent->seo_keyword ?? ''}}</textarea>
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
