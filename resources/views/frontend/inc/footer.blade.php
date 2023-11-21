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
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                            <div class="single-wedge">
                                <h4 class="footer-herading">newsletter</h4>
                                <div class="footer-links">
                                    <div id="mc_embed_signup" class="subscribe-form">
                                        <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                            <div id="mc_embed_signup_scroll" class="mc-form">
                                                <input class="email" type="email" required="" placeholder="Your Mail*" name="EMAIL" value="" />
                                                <div class="mc-news" aria-hidden="true">
                                                    <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" />
                                                </div>
                                                <div class="clear">
                                                    <button id="mc-embedded-subscribe" class="button btn-primary" type="submit" name="subscribe" value=""><i
                                                            class="icon-cursor"></i> Send Mail</button>
                                                </div>
                                            </div>
                                        </form>
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
