<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel!</title>
    <link rel="icon" href="/frontend/templates/newkartina/assets/images/logo.png">
    <!-- Bootstrap -->
    <link href="/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/backend/build/css/custom.min.css" rel="stylesheet">
    <!-- Alert Style -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    @yield('css')
</head>
<?php
        $locale = \App\Lang::all();
        $messages = \App\Messages::orderby("id",'desc')->get();
?>
<style>
    .close-notification:hover {
        cursor: pointer !important;
        color: #c0cdbf !important;
    }
</style>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('/admin') }}" class="site_title"><i class="fa fa-paw"></i> <span>{{trans('admin.admin')}}</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ url('/images/admin.png')}}"
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>{{trans('admin.welcome')}},</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>{{trans('admin.general')}}</h3>
                        <ul class="nav side-menu">
                            <li>
                                <a href="{{ url('admin') }}"><i class="fa fa-home"></i>{{trans('admin.home')}}</a>
                            <li>
                                <a href="{{ url('admin/users') }}"><i class="fa fa-user"></i>{{trans('admin.users')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/message') }}"><i
                                            class="fa fa-envelope-o"></i> {{trans('admin.messages')}} </a>
                            </li>

                            <li>
                                <a href="{{ url('admin/news') }}"><i
                                            class="fa fa-newspaper-o"></i>{{trans('admin.news')}} </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/gallery') }}"><i class="fas fa-images" style="font-size: 18px"></i> {{trans('admin.gallery')}}</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/departments') }}"><i class="fas fa-building" style="font-size:18px;"></i> {{trans('site.departments')}}</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/about') }}"><i class="fas fa-address-card" style="font-size: 18px;"></i> {{trans('site.about')}}</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top"
                       {{--                       href="{{ url('admin/adminprofile/'.Auth::user()->id) }}"--}}
                       href="{{url('/admin/')}}"
                       title="Profile">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" target="_blank" href="/" data-placement="top"
                       title="My website">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Log out"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{csrf_field()}}
                    </form>
                    <a data-toggle="tooltip" href="{{ url('admin') }}" data-placement="top"
                       title="Home">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img
                                      src="{{url('/images/admin.png')}}"
                                      alt="Admin Image"> {{ Auth::user()->name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">

                                <li>
                                    <a href="{{url('/admin/profile')}}">{{trans('admin.profile')}}</a>
                                </li>
                                <li><a target="_blank" href="{{url('/')}}">{{trans('admin.myweb')}}</a></li>
                                <li>
                                    <a data-toggle="tooltip" data-placement="top" title="Log out"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt pull-right"></i> {{trans('admin.logout')}}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fas fa-envelope"></i>
                                <?php
                                $i=0;
                                foreach ($messages as $msg) {
                                    if($msg->read ==0) {
                                    $i++;
                                    }
                                }
                                ?>
                                <span class="badge bg-green">{{$i}}</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <div style="max-height: 400px; overflow: auto">
                                @foreach($messages as $msg)
                                    @if(!$msg->read)
                                        <li style="height: 80px;">
                                            <a href="{{ url('admin/message/'.$msg->id) }}" data-id="{{$msg->id}}" onclick="showDetails(this)">
                                            <span>
                                              <span style="font-weight: bold; color: #4C6C8D">{{ $msg->full_name }}</span>
                                              <span class="time">@php($time=$msg->created_at)@php($time->setlocale(App::getLocale())){{$time->diffForHumans()}}</span>
                                            </span>
                                                <span class="message">
                                                <span style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;overflow: hidden;">
                                                {{ $msg->name.' '.$msg->surname }}
                                                </span>
                                             </span>
                                            </a>
                                            <div class="ln_solid"></div>
                                        </li>
                                    @endif
                                @endforeach
                                </div>
                                <li>
                                    <div class="text-center">
                                        <a href="{{ url('admin/message') }}"  onclick="seeAll(this)" >
                                            <strong>See All Messages</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">

                            <select class="btn btn-secondary" name="locale" id="locale" onchange="Locale()">--}}
                                @foreach($locale as $local)
                                    <option
                                            @if(App::isLocale($local->lang)) selected
                                            onclick="event.preventDefault(); document.getElementById('locale').submit();"
                                            @endif
                                            value="{{$local->lang}}">{{$local->language}}
                                    </option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
{{--        ;background:#f7f7f7;--}}
        <div style="width: 100%;height: 50px; background: green; padding-top: 55px" class="row"></div>

        <div class="notification" role="main" style=" height: 60px;text-align: center;background:#f7f7f7; position: relative; display:none">
            <div class="" style="height:100%">
                <div class="page-title">
                    @include('admin.inc.message')
                </div>
            </div>
        </div>

    @yield('content')

    <!-- footer content -->
        <footer>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


<script src="/backend/vendors/jquery/dist/jquery.min.js"></script>
<script src="/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/backend/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/backend/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="/backend/build/js/custom.min.js"></script>



<!--Lang Changing-->
<script type="text/javascript">
    function Locale() {
        var lang = document.getElementById('locale').value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: '/admin/locale',
            data: {
                'local': lang,
                '_token': CSRF_TOKEN
            },
            success: function () {
                location.reload();
            }
        })
    }

</script>

{{--<script src="/js/ckeditor/config.js"></script>--}}
<script src="/js/ckeditor/ckeditor.js"></script>
@yield('js')

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


<script type="text/javascript">

    function showDetails(id) {
        var id = id.getAttribute("data-id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/update-unread',
            data: {
                'id': id,
            },
            success: function (data) {
            }
        })
    }


    function seeAll(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/update-unread-all',
            data: {

            },
            success: function (data) {
            }
        })
    }


</script>





</body>
</html>

