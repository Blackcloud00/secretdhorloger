@extends("frontend.layout.layout")
@section("content")
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                        <h2 class="breadcrumb-title">{{$langData["result"]}}</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-right">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">{{$langData["homepage"]}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('products')}}">{{$langData["products"]}}</a></li>
                            <li class="breadcrumb-item active">{{$langData["result"]}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="empty-cart-area pb-100px pt-100px">
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{$langData["result_001"]}}</h4>
            <p>{{$langData["result_002"]}}</p>
            <hr>
            <p class="mb-0">{{$langData["result_003"]}}</p>
          </div>
    </div>
</div>
@endsection
