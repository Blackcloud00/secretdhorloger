@extends("frontend.layout.layout")
@section("content")
@foreach ($product->products_content as $langItem)
@if ($langItem["lang"] == config('app.locale'))
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                        <h2 class="breadcrumb-title">{{$langItem["title"]}}</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-right">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">{{$langData["homepage"]}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('products')}}">{{$langData["products"]}}</a></li>
                            <li class="breadcrumb-item active">{{$langItem["title"]}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-details-area pt-100px pb-100px">
    <div class="container">
        @php
            $producArray = json_decode(json_encode($product), true);
        @endphp
        <div class="row">
            <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i<=5; $i++)
                        @php
                            $imgWay = "";
                            $imgWay = $producArray["img_".$i];
                        @endphp
                         @if ($imgWay)
                        <div class="swiper-slide zoom-image-hover">
                            <img class="img-responsive m-auto" style="max-height: 350px;" src="{{asset($imgWay)}}" alt="{{$product->name}}">
                        </div>
                        @endif
                        @endfor
                    </div>
                </div>
                <div class="swiper-container zoom-thumbs slider-nav-style-1 small-nav mt-3 mb-3">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i<=5; $i++)
                        @php
                            $imgWay = "";
                            $imgWay = $producArray["img_".$i];
                        @endphp
                        @if ($imgWay)
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="{{asset($imgWay)}}" alt="{{$product->name}}">
                        </div>
                        @endif
                        @endfor
                    </div>
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content">
            <h2>{{$langItem["title"]}}</h2>
                    <p class="reference">SKU:<span> {{$producArray["sku"]}}</span></p>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">{{$producArray["price"]}} €</li>
                        </ul>
                    </div>
                    <p class="quickview-para"><?= $langItem["description"] ?></p>
                    <div class="pro-details-quality">
                        <div class="pro-details-cart">
                            <form action="{{route("wishlist.add")}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$producArray['id']}}">
                                <input type="hidden" name="product_price" value="{{$producArray['price']}}">
                                <input type="hidden" name="product_qty" value="1">
                                <button title="{{$langData["addtocart"]}}"  class="add-cart btn btn-primary btn-hover-primary " style="background-color: #25D366; border-color:#25D366;" >{{$langData["addtocart"]}}</button>
                            </form>
                        </div>
                    </div>
                    <div class="pro-details-social-info">
                        <span>{{$langData["share"]}}</span>
                        <div class="social-info">
                            <ul class="d-flex">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?sdk=joey&u={{url()->current()}}&display=popup&ref=plugin&src=share_button&locale=fr_fr" target="_blank"><i class="ion-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="whatsapp://send?text={{$langData["wp_share"]}} {{url()->current()}}"><i class="ion-social-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details1">{{$langData["description"]}}</a>
                <a class="active" data-bs-toggle="tab" href="#des-details2">{{$langData["product_details"]}}</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <?=$langItem["technic_des"]?>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane">
                    <div class="product-description-wrapper">
                        <?=$langItem["description"]?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection
