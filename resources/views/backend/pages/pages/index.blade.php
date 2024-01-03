@extends('backend.layout.app')


@section('content')
<div class="content-wrapper pt-5">
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-between">
                  <h3 class="card-title">Liste des page</h3>
                  <a href="{{route('panel.pages.create')}}" class="btn btn-success" style="position: relative; margin-left:auto;">Ajouter page</a>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Parent</th>
                      <th>Nom FR</th>
                      <th>Nom EN</th>
                      <th>Nom DE</th>
                      <th>Status</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($pages) && $pages->count() > 0)
                         @foreach ($pages as $sld)
                          <tr>
                            <td>{{$sld->id}}</td>
                            <td>{{$sld->parent}}</td>
                            <td>{{$sld->nameFR}}</td>
                            <td>{{$sld->nameEN}}</td>
                            <td>{{$sld->nameDE}}</td>
                            <td><span class="tag tag-{{$sld->status == '1' ? 'success' : 'danger'}}">{{$sld->status == '1' ? 'published' : 'draft'}}</span></td>
                            <td>
                                <a href="{{route('panel.pages.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
                            </td>
                            <td>
                                @if (!in_array($sld->id,$noRemoved))
                                <form action="{{route('panel.pages.destroy', $sld->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                @endif
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
