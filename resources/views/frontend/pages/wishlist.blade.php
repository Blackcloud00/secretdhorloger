@extends("frontend.layout.layout")
@section("content")
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                        <h2 class="breadcrumb-title">{{$langData["wishlist"]}}</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-right">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">{{$langData["homepage"]}}</a></li>
                            <li class="breadcrumb-item active">{{$langData["wishlist"]}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">{{$langData["w_your_cart_items"]}}</h3>
        <div class="row">
            <div class="col-12">
                @if (session()->get('success'))
                    <div class="alert alert-success">{{$langData[session()->get('success')]}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{$langData["image"]}}</th>
                                    <th>{{$langData["product_name"]}}</th>
                                    <th>{{$langData["until_price"]}}</th>
                                    <th>{{$langData["qty"]}}</th>
                                    <th>{{$langData["subtotal"]}}</th>
                                    <th>{{$langData["delete_to_cart"]}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($wishlistItem)
                                    @foreach ($wishlistItem as $key => $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img class="img-responsive ml-3" src="{{asset($item["image"])}}" alt="{{$item["name"]}}" /></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{$item["name"]}}</a></td>
                                        <td class="product-price-cart"><span class="amount">{{$item["price"]}} €</span></td>
                                        <td class="product-quantity">
                                            <form action="{{route('wishlist.add')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$key}}">
                                                <input type="hidden" name="product_price" value="{{$item['price']}}">
                                                <input type="hidden" name="product_qty" value="1">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{$item["qty"]}}" />
                                                </div>
                                            </form>
                                        </td>
                                        <td class="product-subtotal">{{$item["qty"] * $item["price"]}} €</td>
                                        <td class="product-wishlist-cart">
                                            <form action="{{route('wishlist.remove')}}" method="POST">
                                                @csrf
                                                <input type="text" hidden name="product_id" value="{{$key}}">
                                                <button type="submit">{{$langData["delete_to_cart"]}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="d-flex" style="width: 100%;display: flex;justify-content: space-between;margin-top: 20px;">
                                @if ($discount_rate == 0)
                                    <h3>{{$langData["total"]}} : {{$totalPrice}} €</h3>
                                @elseif ($discount_rate != 0)
                                    <h3>{{$langData["total"]}} : {{$totalPrice}} € <span style="font-weight: 800; font-size:20px; color:red;">(%{{$discount_rate}} {{$langData["discount_area"]}})</span></h3>
                                @endif
                                <a href="{{route("checkout")}}">{{$langData["submit"]}}</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
