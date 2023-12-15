@extends("frontend.layout.layout")
@section("content")
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                        <h2 class="breadcrumb-title">{{$langData["products"]}}</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-right">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">{{$langData["homepage"]}}</a></li>
                            <li class="breadcrumb-item active">{{$langData["products"]}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-category-area pb-100px pt-70px">

    <div class="container">
        @if (session()->get('success'))
        <div class="alert alert-success">{{$langData[session()->get('success')]}}</div>
    @endif
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <div class="shop-bottom-area">
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
                    <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-6" data-aos="fade-up">
                        {{$products->links('pagination::custom')}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                <div class="shop-sidebar-wrap">
                    <div class="sidebar-widget">
                        <div class="main-heading">
                            <h3 class="sidebar-title">{{$langData["categories"]}}</h3>
                        </div>
                        <div class="sidebar-widget-category">
                            <ul>
                                @foreach ($mainCat as $m_catItem)
                                @if ($m_catItem->items_count > 0)
                                <li><a href="{{route('productscategorie',$m_catItem['slug'])}}" class=""><b>{{$m_catItem["name_".app()->getLocale()]}} ({{$m_catItem->items_count}})</b></a></li>
                                    <ul style="padding-left: 15px;">
                                        @foreach ($subCat as $s_catItem)
                                        @if ($s_catItem->parent ==  $m_catItem->id && $s_catItem->items_count > 0)
                                          <li><a href="{{route('productscategorie',$s_catItem['slug'])}}" class="">{{$s_catItem["name_".app()->getLocale()]}} ({{$s_catItem->items_count}})</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
