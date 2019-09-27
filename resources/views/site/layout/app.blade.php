<!DOCTYPE HTML>
<html class="no-js">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
        {{$title}}
    </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
      ================================================== -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS
      ================================================== -->
    <link href="/site/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/site/plugins/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
    <link href="/site/css/style.css" rel="stylesheet" type="text/css">
    <link href="/site/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen" /><![endif]-->
    <link rel="icon" href="/site/images/logo/fav1.png">
    <!-- Color Style -->
    <link href="/site/colors/color1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

    <link href="/site/css/custom.css" rel="stylesheet" type="text/css">
    <!-- SCRIPTS
      ================================================== -->
    <script src="/site/js/modernizr.js"></script>

    <!-- Modernizr -->
</head>
<body>
<style>
    .close-notification:hover {
        cursor: pointer !important;
        color: #c0cdbf !important;
    }

    h1,h2,h3,h4 {
        color: #2c002c !important;
    }
    .btn {
        background-color: #2c002c !important;
        color: white !important;
    }

    h4 a , h3 a , h2 a{
        color: #2c002c !important;

    }
</style>

<?php
        $locale = \App\Lang::all();
//        dd($locale);
?>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
    <!-- Start Site Header -->
    <header class="site-header">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8">
                        <h1 class="logo"> <a href="/"><img src="/site/images/logo/logo.png" alt="Logo"></a> </h1>
                    </div>
{{--                    <div class="col-md-8 col-sm-6 col-xs-4">--}}
{{--                        <ul class="top-navigation hidden-sm hidden-xs">--}}
{{--                            <li><a href="plan-visit.html">Plan your visit</a></li>--}}
{{--                            <li><a href="events-calendar.html">Calendar</a></li>--}}
{{--                            <li><a href="donate.html">Donate Now</a></li>--}}
{{--                        </ul>--}}
{{--                        <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>--}}
{{--                    </div>--}}
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4 text-right" style="padding-top:20px;">
                        @if(\Request::is('authorization'))
                            <h1 class=" page-title" style="color: white;margin-left:20px">{{trans('frontend.authorization')}}</h1>
                        @else
                            <div class="lang" style="margin-top: 20px;">
                                @foreach($locale as $local)
                                    @if(\Illuminate\Support\Facades\App::getLocale()  !== $local->lang )
                                        <button class="btn btn-md btn-flat lang"  data-lang-type="{{$local->lang}}" title="Language" onclick="changeLang(this)"  >{{$local->lang}}</button>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navigation">
                            <ul class="sf-menu">
                                <li><a href="/">{{trans('site.home')}}</a></li>
                                <li><a href="/about">{{trans('site.about')}}</a></li>
                                <li><a href="/projects">{{trans('site.projects')}}</a></li>
                                <li><a href="/departments">{{trans('site.departments')}}</a></li>
                                <li><a href="/gallery">{{trans('site.gallery')}}</a></li>
                                <li><a href="/blog">{{trans('site.blog')}}</a></li>
                                <li><a href="/contact">{{trans('site.contact')}}</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Site Header -->

@yield("content")






    <!-- Start Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <!-- Start Footer Widgets -->
                <div class="col-md-4 c{"az":"ssadıəü","en":"sadjk","ru":" ывфоло"}ol-sm-4 widget footer-widget">
                    <img src="/site/images/logo/logo.png" alt="Logo">
                    <div class="spacer-20"></div>
                </div>
                <div class="col-md-3 col-sm-3 widget footer-widget">
                    <ul>
                        <li><a href="/" style="color: #2c002c !important;">{{trans('site.home')}}</a></li>
                        <li><a href="/about" style="color: #2c002c !important;">{{trans('site.about')}}</a></li>
                        <li><a href="/projects" style="color: #2c002c !important;">{{trans('site.projects')}}</a></li>
                        <li><a href="/departments" style="color: #2c002c !important;">{{trans('site.departments')}}</a></li>
                        <li><a href="/gallery" style="color: #2c002c !important;"> {{trans('site.gallery')}}</a></li>
                        <li><a href="/blog" style="color: #2c002c !important;">{{trans('site.blog')}}</a></li>
                        <li><a href="/contact" style="color: #2c002c !important;">{{trans('site.contact')}}</a></li>

                    </ul>
                </div>
                <div class="col-md-5 col-sm-5 widget footer-widget">
{{--                    <h4 class="footer-widget-title">Our Church on twitter</h4>--}}
{{--                    <ul class="twitter-widget">--}}
{{--                    </ul>--}}
                    <div id="gmap" style="width: 100%;height: 100%">
                        <iframe src="https://maps.google.com/?ie=UTF8&amp;ll=40.717989,-74.002705&amp;spn=0.043846,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="copyrights-col-left col-md-6 col-sm-6">
                    <p>&copy; 2019. W&MW - Centre Women And Modern World</p>
                </div>
                <div class="copyrights-col-right col-md-6 col-sm-6">
                    <div class="social-icons"> <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a> <a href="http://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>  <a href="http://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>  </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> </div>
{{--<script src="/js/app.js"></script>--}}
<script src="/site/js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
<script src="/site/plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
<script src="/site/js/helper-plugins.js"></script> <!-- Plugins -->
<script src="/site/js/bootstrap.js"></script> <!-- UI -->
<script src="/site/js/waypoints.js"></script> <!-- Waypoints -->
<script src="/site/plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements -->
<script src="/site/js/init.js"></script> <!-- All Scripts -->
<script src="/site/plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="/site/plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->
<script>
    function changeLang(language) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var lang = language.getAttribute("data-lang-type");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        console.log(lang);
        $.ajax({
            type: 'POST',
            url: '/site/locale',
            data: {
                'local': lang,
                '_token': CSRF_TOKEN
            },
            success: function (data) {
                location.reload();
                // console.log(data)
            }

        })
    };
</script>



<input type="hidden"  value="{{session("success")}}" class="success">
<input type="hidden"  value="{{session("error")}}" class="error">

<script type="text/javascript">
    var success = $(".success").val();
    var error = $(".error").val();
    if(success != '' || error != "") {
        $("div.notification").show();
    }
</script>

<script type="text/javascript">
    $(".close-notification").click(function () {
        $("div.notification").hide();
    })
</script>


</body>
</html>
