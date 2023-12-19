<?php

if (!isset($home)) {
    $home = 2;
}

$urlCurrent = explode("/",url()->current());

    $urlCurrentLanguage = app()->getLocale();
    $urlCurrentPage = null;
    $urlCurrentSubPage = null;
    //dd($urlCurrent);

   if (count($urlCurrent) > 2) {
      $urlCurrentLanguage = $urlCurrent[3];

      if (isset($urlCurrent[4])) {
        $urlCurrentPage = $urlCurrent[4];
       }
    }

    if (count($urlCurrent) > 4 && isset($urlCurrent[5])){
        $urlCurrentSubPage = $urlCurrent[5];
    }

?>


<div class="header section">
    <div class="header-top section-fluid bg-black">
        <div class="container">
            <div class="row row-cols-lg-2 align-items-center">
                <div class="col text-center text-lg-left">
                    <div class="header-top-massege">
                        <p>{{$sitesetting["title"]}}</p>
                    </div>
                </div>
                <div class="col d-none d-lg-block">
                    <div class="header-top-set-lan-curr d-flex justify-content-end">
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"> {{$langData["language"]}} : ({{strtoupper(config('app.locale'))}}) <i
                                    class="ion-ios-arrow-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @foreach ( config('translatable.locales') as $item )
                                <?php
                                 $langHref =  $item;
                                 if (!is_null($urlCurrentPage)) {
                                  $langHref = $item . "/" . $urlCurrentPage;
                                 }
                                 if (!is_null($urlCurrentSubPage)) {
                                    $langHref = $item . "/" . $urlCurrentPage .  "/" . $urlCurrentSubPage;
                                }
                                ?>
                                 @if (!is_null($urlCurrentPage) && is_null($urlCurrentSubPage))
                                 <li><a class="dropdown-item" href="../{{$langHref}}">{{$langData["lang_".$item]}}</a></li>
                                 @elseif ($home == 1)
                                 <li><a class="dropdown-item" href="../{{$langHref}}">{{$langData["lang_".$item]}}</a></li>
                                @elseif (!is_null($urlCurrentSubPage))
                                 <li><a class="dropdown-item" href="../../{{$langHref}}">{{$langData["lang_".$item]}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row align-self-center">
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                      <!--  <a href="{{route('homepage')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Site Logo" /></a> -->
                      <a href="{{route('homepage')}}" style="font-size: 30px; color: black; font-weight: 600; font-family: 'Inter', sans-serif;
                      font-family: 'Kalnia', serif;">Secret d'horloger</a>
                    </div>
                </div>
                <div class="col align-self-center">
                    <div class="header-actions">
                        <div class="header_account_list">
                            <div class="dropdown_search">
                                <form class="action-form" action="#">
                                    <input class="form-control" placeholder="Enter your search key" type="text">
                                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="icon-menu"></i>
                        </a>
                        <a href="{{route("wishlist")}}" class="header-action-btn pr-0">
                            <i class="icon-handbag"></i>
                            @if ($countQty)
                                <span class="header-action-num">{{$countQty}}</span>
                            @endif
                            <!-- <span class="cart-amount">€30.00</span> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom d-lg-none sticky-nav bg-white">
        <div class="container position-relative">
            <div class="row align-self-center">
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                       <!-- <a href="{{route('homepage')}}"><img src="{{asset("assets/images/logo/logo.png")}}" alt="Site Logo" /></a>  -->
                        <a href="{{route('homepage')}}" style="font-size: 30px; color: black; font-weight: 600; font-family: 'Inter', sans-serif;
                        font-family: 'Kalnia', serif;">Secret d'horloger</a>
                    </div>
                </div>
                <div class="col align-self-center">
                    <div class="header-actions">
                        <div class="header_account_list">
                            <div class="dropdown_search">
                                <form class="action-form" action="#">
                                    <input class="form-control" placeholder="Enter your search key" type="text">
                                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="icon-menu"></i>
                        </a>
                        <a href="{{route("wishlist")}}" class="header-action-btn pr-0">
                            <i class="icon-handbag"></i>
                            @if (session('wishlist'))
                            <span class="header-action-num">{{count(session('wishlist'))}}</span>
                            @endif
                            <!-- <span class="cart-amount">€30.00</span> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black d-none d-lg-block sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="main-menu">
                        <ul>
                            <li><a href="{{route("homepage")}}">{{$langData["homepage"]}}</i></a>
                            </li>
                            <li><a href="{{route("about")}}">{{$langData["about_us"]}}</a></li>
                            <li><a href="{{route("products")}}">{{$langData["products"]}}</a></li>
                            <li class="dropdown "><a href="{{route('products')}}"> {{$langData["categories"]}} <i class="ion-ios-arrow-down"></i></a>
                                <ul class="sub-menu">
                                    @php
                                        $faitPage = "";
                                    @endphp
                                    @foreach ($categories as $cat)
                                    @php
                                        if ($cat->id == 12) {
                                            $faitPage = $cat;
                                        }
                                    @endphp
                                    @php  $subMenu = ""; $arrowIcon = false; @endphp
                                    @if (is_null($cat->parent))
                                    <li class="dropdown position-static"><a href="{{route('productscategorie',$cat['slug'])}}">{{$cat["name_".app()->getLocale()]}}
                                       @foreach ($categories as $subcat)
                                       @if ($cat->id == $subcat->parent && !is_null($subcat->parent))
                                       @php
                                            $arrowIcon = true;
                                           $subMenu .= '<li><a href="'.route('productscategorie',$subcat['slug']).'">'.$subcat["name_".app()->getLocale()].'</a>
                                           </li>';
                                        @endphp
                                       @endif
                                   @endforeach
                                   @if ( $arrowIcon == true)
                                   <i class="ion-ios-arrow-right"></i>
                                   @endif
                                    </a>
                                        <ul class="sub-menu sub-menu-2">
                                            @php echo $subMenu @endphp
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @if ($faitPage)
                                <li><a href="{{route('productscategorie',$faitPage->slug)}}">{{$langData["fait_main"]}}</a></li>
                            @endif
                            <li><a href="{{route('contact')}}" >{{$langData["contact"]}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <button class="offcanvas-close"></button>
        <div class="inner customScroll">
            <div class="offcanvas-menu mb-4">
                <ul>
                    <li><a href="{{route("homepage")}}"><span class="menu-text">{{$langData["homepage"]}}</span></a></li>
                    <li><a href="{{route("about")}}">{{$langData["about_us"]}}</a></li>
                    <li><a href="{{route("products")}}"><span class="menu-text">{{$langData["categories"]}}</span></a>
                        <ul class="sub-menu">
                            @foreach ($categories as $cat)
                            @php  $subMenu = ""; $arrowIcon = false; @endphp
                            @if (is_null($cat->parent))
                            <li><a href="{{route('productscategorie',$cat['slug'])}}"><span class="menu-text">{{$cat["name_".app()->getLocale()]}}</span></a>
                               @foreach ($categories as $subcat)
                               @if ($cat->id == $subcat->parent && !is_null($subcat->parent))
                               @php
                                    $arrowIcon = true;
                                   $subMenu .= '<li><a href="'.route('productscategorie',$subcat['slug']).'">'.$subcat["name_".app()->getLocale()].'</a>
                                   </li>';
                                @endphp
                               @endif
                           @endforeach
                           @if ( $arrowIcon == true)
                           @endif
                            </a>
                                <ul class="sub-menu">
                                    @php echo $subMenu @endphp
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @if ($faitPage)
                      <li><a href="{{route('productscategorie',$faitPage->slug)}}">{{$langData["fait_main"]}}</a></li>
                    @endif
                    <li><a href="{{route('contact')}}" >{{$langData["contact"]}}</a></li>
                </ul>
            </div>
            <div class="offcanvas-userpanel mt-8">
                <ul>
                    <li class="offcanvas-userpanel__role">
                        <a href="#">{{$langData["language"]}} : ({{strtoupper(config('app.locale'))}}) <i class="ion-ios-arrow-down"></i></a>
                        <ul class="user-sub-menu">
                            @foreach ( config('translatable.locales') as $item )
                            <?php
                             $langHref =  $item;
                             if (!is_null($urlCurrentPage)) {
                              $langHref = $item . "/" . $urlCurrentPage;
                             }
                             if (!is_null($urlCurrentSubPage)) {
                                $langHref = $item . "/" . $urlCurrentPage .  "/" . $urlCurrentSubPage;
                            }
                            ?>
                             @if (!is_null($urlCurrentPage) && is_null($urlCurrentSubPage))
                             <li><a  href="../{{$langHref}}">{{$langData["lang_".$item]}}</a></li>
                             @elseif ($home == 1)
                             <li><a  href="../{{$langHref}}">{{$langData["lang_".$item]}}</a></li>
                            @elseif (!is_null($urlCurrentSubPage))
                             <li><a href="../../{{$langHref}}">{{$langData["lang_".$item]}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="offcanvas-social mt-auto">
                <ul>
                    @if (!is_null($sitesetting["facebook"]))
                    <li>
                        <a href="{{$sitesetting["facebook"]}}"><i class="ion-social-facebook"></i></a>
                    </li>
                    @endif
                    @if (!is_null($sitesetting["instagram"]))
                    <li>
                        <a href="{{$sitesetting["facebook"]}}"><i class="ion-social-facebook"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>
