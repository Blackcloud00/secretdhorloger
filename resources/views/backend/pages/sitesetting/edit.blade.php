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
           <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Données du curseur</h3>
                    </div>
                    <div class="card-body row">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                              <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Data</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($sitesetting as $item)
                                <tr>
                                 <form action="{{route("panel.sitesetting.update",$item->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><input type="text" name="data" required id="data" value="{{$item->data ?? ''}}" class="form-control"></td>
                                    <td style="display: flex; justify-content: start;"><input type="submit" value="Créer" class="btn btn-success float-right"></td>
                                </form>
                                </tr>
                               @endforeach
                              </tbody>
                            </table>
                    </div>
                    </div>
                  </div>
                </div>
           </div>

    </section>
@endsection
