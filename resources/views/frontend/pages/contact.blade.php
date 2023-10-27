@extends('frontend.layout.layout')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box  align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                            <h2 class="breadcrumb-title">Contact Us</h2>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <ul class="breadcrumb-list text-center text-md-right">
                                <li class="breadcrumb-item"><a href="{{route('homepage')}}">{{$langData["homepage"]}}</a></li>
                                <li class="breadcrumb-item active">{{$langData["contact"]}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-area pb-100px pt-100px">
        <div class="container">
            <div class="contact-map mb-10">
                <div id="mapid" data-aos="fade-up" data-aos-delay="200">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d552.4851828150679!2d4.222720130718989!3d45.74411147438645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4472e96a985bd%3A0x2abdc3a7567f6d8!2sSecret%20d&#39;horloger!5e0!3m2!1str!2str!4v1697289128912!5m2!1str!2str" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <a href="{{$sitesetting["map_link"]}}"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-row-2 row">
                <div class="col-lg-4 col-md-5 mb-lm-60px col-sm-12 col-xs-12 w-sm-100">
                    <div class="contact-info-wrap">
                        <h2 class="title" data-aos="fade-up" data-aos-delay="200">{{$langData["contact_info"]}}</h2>
                        <div class="single-contact-info" data-aos="fade-up" data-aos-delay="200">
                            <div class="contact-info-inner">
                                <span class="sub-title">{{$langData["phone"]}}:</span>
                            </div>
                            <div class="contact-info-dec">
                                <p><a href="tel:{{str_replace(' ','',$sitesetting["contact_phone"])}}">{{$sitesetting["contact_phone"]}}</a></p>
                            </div>
                        </div>
                        <div class="single-contact-info" data-aos="fade-up" data-aos-delay="200">
                            <div class="contact-info-inner">
                                <span class="sub-title">{{$langData["email"]}}:</span>
                            </div>
                            <div class="contact-info-dec">
                                <p><a href="mailto://{{$sitesetting["contact_email"]}}">{{$sitesetting["contact_email"]}}</a></p>
                            </div>
                        </div>
                        <div class="single-contact-info" data-aos="fade-up" data-aos-delay="200">
                            <div class="contact-info-inner">
                                <span class="sub-title">{{$langData["adress"]}}:</span>
                            </div>
                            <div class="contact-info-dec">
                                <a href="{{$sitesetting["map_link"]}}" title="{{$sitesetting["adress"]}}" target="_blank">
                                    <p>{{$sitesetting["adress"]}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="contact-social">
                            <h3 class="title" data-aos="fade-up" data-aos-delay="200">{{$langData["follow_us"]}}</h3>
                            <div class="social-info" data-aos="fade-up" data-aos-delay="200">
                                <ul class="d-flex">
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
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                    @if (session()->has('message_key'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">{{$langData[session()->get('message_key')]}}</h4>
                    </div>
                    @endif
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">{{$langData[$error]}}</h4>
                        </div>
                        @endforeach
                    @endif
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title" data-aos="fade-up" data-aos-delay="200">{{$langData["get_in_touch"]}}</h2>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="{{route('contact.save')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                    <input name="name" placeholder="{{$langData["name"]}}*" type="text" />
                                </div>
                                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                    <input name="email" placeholder="{{$langData["email"]}}*" type="email" />
                                </div>
                                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                                    <input name="subject" placeholder="{{$langData["subject"]}}*" type="text" />
                                </div>
                                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                                    <textarea name="message" placeholder="{{$langData["your_message"]}}*"></textarea>
                                    <button class="btn btn-primary btn-hover-dark mt-4" data-aos="fade-up" data-aos-delay="200" type="submit">{{$langData["send"]}}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
