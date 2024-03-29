@extends('backend.layout.app')


@section('content')
<div class="content-wrapper pt-5">
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-between">
                  <h3 class="card-title">Liste des curseurs</h3>
                  <a href="{{route('panel.productcontent.create')}}" class="btn btn-success" style="position: relative; margin-left:auto;">Nouveau Slider</a>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Produit ID</th>
                      <th>Lang</th>
                      <th>Nom</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($productcontent) && $productcontent->count() > 0)
                         @foreach ($productcontent as $sld)
                         <tr>
                            <td>{{$sld->id}}</td>
                            <td>{{$sld->products_id}}</td>
                            <td>{{$sld->lang}}</td>
                            <td>{{$sld->title}}</td>
                            <td>
                                <a href="{{route('panel.productcontent.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
                            </td>
                            <td>
                                <form action="{{route('panel.productcontent.destroy', $sld->id)}}" method="POST">
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
