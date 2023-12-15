@extends('backend.layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Detail</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="invoice p-3 mb-3">
             <form action="{{route("panel.order.update",$orders->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{$orders->user_name . " " .$orders->user_surname}}
                    <!-- <small class="float-right">Date: 2/10/2014</small> -->
                  </h4>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Secretdhorloger, Inc.</strong><br>
                   11 Rue du 8 Mai 42110 Feurs<br>
                    Phone: 0967138331<br>
                    Email: secretdhorloger@gmail.com
                  </address>
                </div>
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$orders->user_name . " " .$orders->user_surname}}</strong><br>
                    {{$orders->user_adress}}<br>
                    Phone: {{$orders->user_phone}}<br>
                    Email: {{$orders->user_mail}}
                  </address>
                </div>
                <div class="col-sm-4 invoice-col">
                  <br>
                  <b>Order ID:</b>  {{$orders->id}}<br>
                  <br>
                  <div class="form-group">
                    <label for="o_status">Statut</label>
                    <select id="o_status" name="o_status" required class="form-control custom-select">
                        <option selected value="{{$orders->order_status ?? ''}}">{{$status[$orders->order_status]}}</option>
                        @if ($orders->order_status != "0")
                        <option value="0">New Order</option>
                        @endif
                        @if ($orders->order_status != "1")
                        <option value="1">Complated</option>
                        @endif
                        @if ($orders->order_status != "2")
                        <option value="2">Canceled</option>
                        @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>img</th>
                      <th>Product Name</th>
                      <th>Unit Price</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($realUrunData as $item)
                    <tr>
                        <td>{{$item["product_id"]}}</td>
                        <td><img src="{{asset($item["product_img"])}}" style="max-width: 100px; width:100%; height:auto; " alt="{{$item["product_name"]}}"></td>
                        <td>{{$item["product_name"]}}</td>
                        <td>{{$item["product_price"]}} €</td>
                        <td>{{$item["product_count"]}}</td>
                        <td>{{$item["product_count"] * $item["product_price"]}} €</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">TOTAL:</th>
                        <td>{{$orders->order_total_price}} €</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row no-print">
                <div class="col-12">
                    <input type="submit" value="Créer" class="btn btn-success float-right">
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
