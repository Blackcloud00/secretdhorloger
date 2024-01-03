@extends("frontend.layout.layout")

@section('content')
<div class="breadcrumb-area" style="background-image: url({{asset($page[0]->banner_img ?? "")}}); background-size:cover;">
    <div class="container" style="position: relative; z-index: 6; background-color: #f0f8ffb5;
    border-radius: 10px;">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                        <h2 class="breadcrumb-title"><?=$page["name".strtoupper(config('app.locale'))] ?? $page["nameFR"]?></h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-right">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">{{$langData["homepage"]}}</a></li>
                            <li class="breadcrumb-item active"><?=$page["name".strtoupper(config('app.locale'))] ?? $page["nameFR"]?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="about-area pb-100px pt-100px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="about-content">
                    <?= $page["content".strtoupper(config('app.locale'))] ?? $page["contentFR"] ?>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
