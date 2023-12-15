@extends('backend.layout.app')


@section('content')
<div class="content-wrapper pt-5">
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-between">
                  <h3 class="card-title">Liste des Carrousel</h3>
                  <a href="{{route('panel.slider.create')}}" class="btn btn-success" style="position: relative; margin-left:auto;">Nouveau Carrousel</a>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titre</th>
                      <th>Image</th>
                      <th>Lang</th>
                      <th>Slug</th>
                      <th>Contenu</th>
                      <th>Statut</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($sliders) && $sliders->count() > 0)
                         @foreach ($sliders as $sld)
                          <tr>
                            <td>{{$sld->id}}</td>
                            <td>{{$sld->name}}</td>
                            <td class="py-1">
                              <img style="max-height: 100px;" src="{{asset($sld->image)}}" alt="{{$sld->name}}">
                            </td>
                            <td>{{$sld->lang}}</td>
                            <td>{{$sld->text_key}}</td>
                            <td>{{substr($sld->content, 0, 55)}}...</td>
                            <td><span class="tag tag-{{$sld->status == '1' ? 'success' : 'danger'}}">{{$sld->status == '1' ? 'published' : 'draft'}}</span></td>
                            <td>
                                <a href="{{route('panel.slider.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
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
