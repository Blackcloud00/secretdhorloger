@extends('backend.layout.app')


@section('content')
<div class="content-wrapper pt-5">
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-between">
                  <h3 class="card-title">Liste des produit</h3>
                  <a href="{{route('panel.product.create')}}" class="btn btn-success" style="position: relative; margin-left:auto;">Ajouter Produit</a>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Categorie</th>
                      <th>Photo</th>
                      <th>Slug</th>
                      <th>SKU</th>
                      <th>Prix</th>
                      <th>Status</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($products) && $products->count() > 0)
                         @foreach ($products as $sld)
                         @php
                         $catName = "";
                         foreach ($categories as  $catItem) {

                            if($catItem->id == $sld->category_id){
                                $catName = $catItem->name_fr;
                            }
                         }
                        @endphp
                          <tr>
                            <td>{{$sld->id}}</td>
                            <td>{{$sld->name}}</td>
                            <td>{{$catName}}</td>
                            <td class="py-1">
                              <img style="max-height: 100px;" src="{{asset($sld->img_1)}}" alt="{{$sld->name}}">
                            </td>
                            <td>{{$sld->slug}}</td>
                            <td>{{$sld->sku}}</td>
                            <td>{{$sld->price}}</td>
                            <td><span class="tag tag-{{$sld->status == '1' ? 'success' : 'danger'}}">{{$sld->status == '1' ? 'published' : 'draft'}}</span></td>
                            <td>
                                <a href="{{route('panel.product.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
                            </td>
                            <td>
                                <form action="{{route('panel.slider.destroy', $sld->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                          </tr>
                         @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
@endsection
