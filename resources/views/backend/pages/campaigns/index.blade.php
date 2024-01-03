@extends('backend.layout.app')


@section('content')
<div class="content-wrapper pt-5">
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-between">
                  <h3 class="card-title">Liste des page</h3>
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
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($campaigns) && $campaigns->count() > 0)
                         @foreach ($campaigns as $sld)
                          <tr>
                            <td>{{$sld->id}}</td>
                            <td>{{$sld->parent}}</td>
                            <td>{{$sld->nameFR}}</td>
                            <td>{{$sld->nameEN}}</td>
                            <td>{{$sld->nameDE}}</td>
                            <td><span class="tag tag-{{$sld->status == '1' ? 'success' : 'danger'}}">{{$sld->status == '1' ? 'Active' : 'Passive'}}</span></td>
                            <td>
                                <a href="{{route('panel.campaigns.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
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
