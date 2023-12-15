    <div class="footer-area">
        <div class="footer-container">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                            <div class="single-wedge">
                                <h4 class="footer-herading">{{$sitesetting["title"]}}</h4>
                                <p class="about-text">{{$sitesetting["description"]}}</p>
                                <ul class="link-follow">
                                    @if (!is_null($sitesetting["facebook"]))
                                    <li class="li">
                                        <a class="facebook icon-social-facebook" title="Facebook" target="_blank" href="{{$sitesetting["facebook"]}}"></a>
                                    </li>
                                    @endif
                                    @if (!is_null($sitesetting["instagram"]))
                                    <li class="li">
                                        <a class="instagram icon-social-instagram" title="instagram" target="_blank" href="{{$sitesetting["instagram"]}}"></a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="400">
                            <div class="single-wedge">
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="{{route("homepage")}}">{{$langData["homepage"]}}</a></li>
                                            <li class="li"><a class="single-link" href={{route("about")}}">{{$langData["about_us"]}}</a></li>
                                            <li class="li"><a class="single-link" href="{{route('products')}}">{{$langData["products"]}}</a></li>
                                            <li class="li"><a class="single-link" href="{{route('contact')}}">{{$langData["contact"]}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row flex-sm-row-reverse">
                        <div class="col-md-6 text-left">
                            <p class="copy-text">{{$sitesetting["copyright"]}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
