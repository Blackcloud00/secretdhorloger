<!DOCTYPE html>
<html lang="fr-FR">
<?php $dil = request()->segment(1); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{$sitesetting["title"]}}</title>
    <meta name="description" content="{{$sitesetting["description"]}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://secretdhorloger.com/" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$sitesetting["title"]}}" />
    <meta property="og:url" content="PAGE_URL" />
    <meta property="og:site_name" content="{{$sitesetting["title"]}}" />
    <meta property="og:image" content="#" />
    <meta property="og:description" content="{{$sitesetting["title"]}}" />
    <meta name="robots" content="noindex, follow" />
    <link rel="icon" href="{{asset('assets/images/favicon/favicon.png')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('assets/images/favicon/favicon.png')}}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/favicon/favicon.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('assets/images/favicon/favicon.png')}}" />
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Replace_with_your_site_title",
            "url": "Replace_with_your_site_URL"
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Kalnia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery.lineProgressbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/venobox.css')}}" />

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />

</head>

<body>

    @include("frontend.inc.header")

    @yield('content')

    @include("frontend.inc.footer")


    <!-- <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script> -->

    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/countdown.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <script src="{{asset('assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/plugins.min.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
