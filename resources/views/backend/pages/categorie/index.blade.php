@extends('backend.layout.app')

@section('content')
<div class="content-wrapper pt-5">
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-between">
                  <h3 class="card-title">Liste des categorie</h3>
                  <a href="{{route('panel.categorie.create')}}" class="btn btn-success" style="position: relative; margin-left:auto;">Ajouter Categorie</a>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom EN</th>
                      <th>Nom FR</th>
                      <th>Nom DE</th>
                      <th>Slug</th>
                      <th>Parent Name</th>
                      <th>Statut</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($categories) && $categories->count() > 0)
                         @foreach ($categories as $sld)
                          <tr>
                            <td>{{$sld->id}}</td>
                            <td>{{$sld->name_en}}</td>
                            <td>{{$sld->name_fr}}</td>
                            <td>{{$sld->name_de}}</td>
                            <td>{{$sld->slug}}</td>
                             @php
                                $catName = "";
                                foreach ($categories as  $catItem) {

                                    if($catItem->id == $sld->parent){
                                        $catName = $catItem->name_fr;
                                    }
                                }
                             @endphp
                            <td><b>{{$catName}}</b></td>
                            <td><span class="tag tag-{{$sld->status == '1' ? 'success' : 'danger'}}">{{$sld->status == '1' ? 'published' : 'draft'}}</span></td>
                            <td>
                                <a href="{{route('panel.categorie.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
                            </td>
                            <td>
                                <form action="{{route('panel.categorie.destroy', $sld->id)}}" method="POST">
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
