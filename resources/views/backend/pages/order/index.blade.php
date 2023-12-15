@extends('backend.layout.app')


@section('content')
<div class="content-wrapper pt-5">
    <section class="content">
        <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#neworder" data-toggle="tab">New Order</a></li>
                <li class="nav-item"><a class="nav-link" href="#complated" data-toggle="tab">Complated</a></li>
                <li class="nav-item"><a class="nav-link" href="#canceled" data-toggle="tab">Canceled</a></li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                  <div class="tab-pane active" id="neworder">
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header d-flex justify-between">
                              <h3 class="card-title">New Order List</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name Surname</th>
                                  <th>Phone</th>
                                  <th>Mail</th>
                                  <th>Adress</th>
                                  <th>Region</th>
                                  <th>Total Price</th>
                                  <th>Modifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($orders) && $orders->count() > 0)
                                     @foreach ($orders as $sld)
                                      @if ($sld->order_status == 0)
                                      <tr>
                                        <td>{{$sld->id}}</td>
                                        <td>{{$sld->user_name ." ".$sld->user_surname}}</td>
                                        <td>{{$sld->user_phone}}</td>
                                        <td>{{$sld->user_mail}}</td>
                                        <td>{{$sld->user_adress}}</td>
                                        <td>{{$sld->user_region}}</td>
                                        <td>{{$sld->order_total_price}} €</td>
                                        <td>
                                            <a href="{{route('panel.order.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
                                        </td>
                                      </tr>
                                      @endif
                                     @endforeach
                                    @endif
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="complated">
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header d-flex justify-between">
                              <h3 class="card-title">Complated</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name Surname</th>
                                  <th>Phone</th>
                                  <th>Mail</th>
                                  <th>Adress</th>
                                  <th>Region</th>
                                  <th>Total Price</th>
                                  <th>Modifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($orders) && $orders->count() > 0)
                                     @foreach ($orders as $sld)
                                     @if ($sld->order_status == 1)
                                      <tr>
                                        <td>{{$sld->id}}</td>
                                        <td>{{$sld->user_name ." ".$sld->user_surname}}</td>
                                        <td>{{$sld->user_phone}}</td>
                                        <td>{{$sld->user_mail}}</td>
                                        <td>{{$sld->user_adress}}</td>
                                        <td>{{$sld->user_region}}</td>
                                        <td>{{$sld->order_total_price}} €</td>
                                        <td>
                                            <a href="{{route('panel.order.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
                                        </td>
                                      </tr>
                                      @endif
                                     @endforeach
                                    @endif
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="canceled">
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header d-flex justify-between">
                              <h3 class="card-title">Canceled List</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name Surname</th>
                                  <th>Phone</th>
                                  <th>Mail</th>
                                  <th>Adress</th>
                                  <th>Region</th>
                                  <th>Total Price</th>
                                  <th>Modifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($orders) && $orders->count() > 0)
                                     @foreach ($orders as $sld)
                                     @if ($sld->order_status == 2)
                                      <tr>
                                        <td>{{$sld->id}}</td>
                                        <td>{{$sld->user_name ." ".$sld->user_surname}}</td>
                                        <td>{{$sld->user_phone}}</td>
                                        <td>{{$sld->user_mail}}</td>
                                        <td>{{$sld->user_adress}}</td>
                                        <td>{{$sld->user_region}}</td>
                                        <td>{{$sld->order_total_price}} €</td>
                                        <td>
                                            <a href="{{route('panel.order.edit', $sld->id)}}" class="btn btn-success">Modifier</a>
                                        </td>
                                      </tr>
                                      @endif
                                     @endforeach
                                    @endif
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </section>
</div>
@endsection
