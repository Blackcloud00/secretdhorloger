@extends("frontend.layout.layout")
@section("content")
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                        <h2 class="breadcrumb-title">{{$langData["send_order_page"]}}</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-right">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">{{$langData["homepage"]}}</a></li>
                            <li class="breadcrumb-item active">{{$langData["send_order_page"]}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <form action="{{route("checkout.add")}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>{{$langData["order_details"]}}</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["first_name"]}}</label>
                                    <input type="text" name="first_name" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["last_name"]}}</label>
                                    <input type="text" name="last_name" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["company_name"]}}</label>
                                    <input type="text" name="company_name" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-select mb-4">
                                    <label>{{$langData["country"]}}</label>
                                    <select name="region">
                                        <option>{{$langData["select_country"]}}</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["street_address"]}}</label>
                                    <input class="billing-address" required name="adress_1" placeholder="{{$langData["adress_place_1"]}}" type="text" />
                                    <input placeholder="{{$langData["adress_place_2"]}}"  name="adress_2" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["town_city"]}}</label>
                                    <input type="text" required name="city" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["state_country"]}}</label>
                                    <input type="text" name="state" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["postcode_zip"]}}</label>
                                    <input type="text" required name="zip" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["phone"]}}</label>
                                    <input type="text" required name="phone" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>{{$langData["email"]}}</label>
                                    <input type="text" required name="email" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>{{$langData["your_order"]}}</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>{{$langData["product"]}}</li>
                                        <li>{{$langData["total"]}}</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @if (session()->get('wishlist'))
                                        @php
                                            $i = 1;
                                        @endphp
                                        <input type="text" hidden name="count" value="{{count(session()->get('wishlist'))}}">
                                        @foreach (session()->get('wishlist') as $k => $item)
                                        <input type="text" hidden name="order_item_{{$i}}_id" value="{{$k}}">
                                        <input type="text" hidden name="order_item_{{$i}}_qty" value="{{$item["qty"]}}">
                                        <input type="text" hidden name="order_item_{{$i}}_unit_price" value="{{$item["price"]}}">
                                        <li><span class="order-middle-left">{{$item["name"] }} X {{$item["qty"]}}</span> <span class="order-price">{{$item["price"] * $item["qty"]}} € </span></li>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">{{$langData["shipping"]}}</li>
                                        <li>{{$langData["free_shipping"]}}</li>
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    <ul>
                                        <input type="text" hidden name="total_price" value="{{$totalPrice}}">
                                        <li class="order-total">{{$langData["total"]}}</li>
                                        <li>{{$totalPrice}} €</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <button type="submit" class="btn-hover">{{$langData["place_order"]}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection


