@extends('backend.layout.app')


@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info pos-rel">
              <div class="inner">
                <h3>Curseur</h3>
                <p>{{count($sliders)}} unités</p>
              </div>
              <div class="icon">
                <i class="ion ion-image"></i>
              </div>
              <a href="{{route("panel.slider.index")}}" class="pos-ab" style="width: 100%;height: 100%;position: absolute;top: 0;"></a>
              <a href="{{route("panel.slider.index")}}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success pos-rel">
              <div class="inner">
                <h3>Catégories</h3>
                <p>{{count($categories)}} unités</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-list"></i>
              </div>
              <a href="{{route("panel.categorie.index")}}" class="pos-ab" style="width: 100%;height: 100%;position: absolute;top: 0;"></a>
              <a href="{{route("panel.categorie.index")}}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info pos-rel">
              <div class="inner">
                <h3>Produits</h3>
                <p>{{count($products)}} unités</p>
              </div>
              <div class="icon">
                <i class="ion ion-image"></i>
              </div>
              <a href="{{route("panel.product.index")}}" class="pos-ab" style="width: 100%;height: 100%;position: absolute;top: 0;"></a>
              <a href="{{route("panel.product.index")}}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success pos-rel">
              <div class="inner">
                <h3>Commandes</h3>
                <p>{{count($orders)}} unités</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-list"></i>
              </div>
              <a href="{{route("panel.order.index")}}" class="pos-ab" style="width: 100%;height: 100%;position: absolute;top: 0;"></a>
              <a href="{{route("panel.order.index")}}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
@endsection
