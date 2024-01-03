@extends('frontend.layout.layout')

@section('content')
    <div class="section " style="margin-bottom: 50px;">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <div class="swiper-wrapper">
                @foreach ($slider as $slideValue)
                @if (!empty($slideValue["image"]) && $slideValue["lang"] == config('app.locale'))
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">{{$slideValue["small_text"]}}</span>
                                    <h2 class="title-1">{{$slideValue["name"]}}</h2>
                                    <p>{{$slideValue["content"]}}</p>
                                    @if (!empty($slideValue["link"]))
                                    <a href="{{$slideValue["link"]}}" class="btn btn-lg btn-primary btn-hover-dark mt-5">{{$slideValue["button_content"]}}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="{{asset($slideValue["image"])}}" alt="{{$slideValue["name"]}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <div class="section" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                @if ($campaigns[4]["status"]==1 && !empty($campaigns[4]["banner_img"]))
                <div class="col-lg-12 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{$campaigns[4]["discount_code"] ?? route("products")}}" class="banner">
                        <img src="{{ asset($campaigns[4]["banner_img"]) ?? "" }}" style="max-height: 300px;    border-bottom-right-radius: 100px;     border-top-left-radius: 100px;" alt="<?= $campaigns[4]["name".strtoupper(config('app.locale'))] ?? $campaigns[4]["nameFR"] ?>" />
                        <div class="info justify-content-start">
                            <div class="content align-self-center">
                                <h3 class="title" style="color:white;">
                                    <?= $campaigns[4]["name".strtoupper(config('app.locale'))] ?? $campaigns[4]["nameFR"] ?>
                                </h3>
                                <p style="color:white;"><?= $campaigns[4]["content".strtoupper(config('app.locale'))] ?? $campaigns[4]["contentFR"] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="section" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row" style="margin-bottom: 35px;">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">{{$langData["categories"]}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($campaigns[3]["status"]==1 && !empty($campaigns[3]["banner_img"]))
                <div class="col-lg-6 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{$campaigns[3]["discount_code"] ?? route("products")}}" class="banner">
                        <img src="{{ asset($campaigns[3]["banner_img"]) ?? "" }}" alt="<?= $campaigns[3]["name".strtoupper(config('app.locale'))] ?? $campaigns[3]["nameFR"] ?>" />
                        <div class="info justify-content-start">
                            <div class="content align-self-center">
                                <h3 class="title" style="color:white;">
                                    <?= $campaigns[3]["name".strtoupper(config('app.locale'))] ?? $campaigns[3]["nameFR"] ?>
                                </h3>
                                <p style="color:white;"> <?= $campaigns[3]["content".strtoupper(config('app.locale'))] ?? $campaigns[3]["contentFR"] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @if ($campaigns[2]["status"]==1 && !empty($campaigns[2]["banner_img"]))
                <div class="col-lg-6 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{$campaigns[2]["discount_code"] ?? route("products")}}" class="banner">
                        <img src="{{ asset($campaigns[2]["banner_img"]) ?? "" }}" alt="<?= $campaigns[2]["name".strtoupper(config('app.locale'))] ?? $campaigns[2]["nameFR"] ?>" />
                        <div class="info justify-content-end">
                            <div class="content align-self-center">
                                <h3 class="title" style="color:white;">
                                    <?= $campaigns[2]["name".strtoupper(config('app.locale'))] ?? $campaigns[2]["nameFR"] ?>
                                </h3>
                                <p style="color:white;"><?= $campaigns[2]["content".strtoupper(config('app.locale'))] ?? $campaigns[2]["contentFR"] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="section product-tab-area mt-5 pt-5" style="margin-bottom: 50px;">
        <div class="container">
            @if (session()->get('success'))
            <div class="alert alert-success">{{$langData[session()->get('success')]}}</div>
        @endif
            <div class="row" style="margin-bottom: 35px;">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">{{$langData["products"]}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-product-new-arrivals">
                            <div class="row">
                                @foreach ($products as $product)
                                @foreach ($product->products_content as $langProduct)

                                @if ($langProduct["lang"] == config('app.locale') && !is_null($product['img_1']))
                                  <div class="col-lg-4  col-md-6 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-delay="200">
                                      <div class="product mb-5">
                                          <div class="thumb">
                                              <a href="{{route('productdetail',$product['slug'])}}" class="image">
                                                  <img src="{{asset($product['img_1'])}}" alt="{{$langProduct["title"]}}" />
                                                  <img class="hover-image" src="{{asset($product['img_1'])}}" alt="{{$langProduct["title"]}}" />
                                              </a>
                                              <span class="badges">
                                              </span>
                                              <form action="{{route("wishlist.add")}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product['id']}}">
                                                <input type="hidden" name="product_price" value="{{$product['price']}}">
                                                <input type="hidden" name="product_qty" value="1">
                                                @if (isset($campaigns[0]["discount_rate"]) && !empty($campaigns[0]["discount_rate"]) && intval($campaigns[0]["status"]) == 1)
                                                <input type="hidden" name="discount_rate" value="{{$campaigns[0]["discount_rate"]}}">
                                                <input type="hidden" name="discount_status" value="{{$campaigns[0]["status"]}}">
                                              @endif
                                                <button title="{{$langData["addtocart"]}}" class=" add-to-cart">{{$langData["addtocart"]}}</button>
                                            </form>
                                         </div>
                                          <div class="content">
                                              <h5 class="title"><a href="{{route('productdetail',$product['slug'])}}">{{$langProduct["title"]}}</a></h5>
                                              <span class="price">
                                                  <span class="new">{{number_format($product["price"])}} €</span>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  @endif
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row" style="margin-bottom: 35px;">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">{{$langData["campaigns"]}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @if ($campaigns[0]["status"]==1 && !empty($campaigns[0]["banner_img"]))
                <div class="col-lg-6 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{$campaigns[0]["discount_code"] ?? route("products")}}" class="banner">
                        <img src="{{ asset($campaigns[0]["banner_img"]) ?? "" }}" alt="<?= $campaigns[0]["name".strtoupper(config('app.locale'))] ?? $campaigns[0]["nameFR"] ?>" />
                        <div class="info justify-content-end">
                            <div class="content align-self-center">
                                <h3 class="title" style="color:white;">
                                    <?= $campaigns[0]["name".strtoupper(config('app.locale'))] ?? $campaigns[0]["nameFR"] ?>
                                </h3>
                                <p style="color:white;"><?= $campaigns[0]["content".strtoupper(config('app.locale'))] ?? $campaigns[0]["contentFR"] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @if ($campaigns[1]["status"]==1 && !empty($campaigns[1]["banner_img"]))
                <div class="col-lg-6 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{route("products")}}" class="banner">
                        <img src="{{ asset($campaigns[1]["banner_img"]) ?? "" }}" alt="<?= $campaigns[1]["name".strtoupper(config('app.locale'))] ?? $campaigns[1]["nameFR"] ?>" />
                        <div class="info justify-content-end">
                            <div class="content align-self-center">
                                <h3 class="title" style="color:white;">
                                    <?= $campaigns[1]["name".strtoupper(config('app.locale'))] ?? $campaigns[1]["nameFR"] ?>
                                </h3>
                                <p style="color:white;"><?= $campaigns[1]["content".strtoupper(config('app.locale'))] ?? $campaigns[1]["contentFR"] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
