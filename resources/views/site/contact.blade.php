@extends("site.layout.app",['title'=> trans('site.contact')])
@section('content')
    <?php use Jenssegers\Date\Date;
    Date::setLocale(\Illuminate\Support\Facades\App::getLocale());

    ?>
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/">{{trans('site.home')}}</a></li>
                        <li class="active">{{trans('site.contact')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="notification" role="main" style=" height: 60px;text-align: center;background:#f7f7f7; position: relative; display:none; ">
        <div class="" style="height:100%">
            <div class="page-title">
                @include('site.inc.message')
            </div>
        </div>
    </div>
    <!-- End Nav Backed Header -->
    <!-- Start Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{trans('site.contact')}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <header class="single-post-header clearfix">
                            <h2 class="post-title">{{trans('site.our_location')}}</h2>
                        </header>
                        <div class="post-content">
                            <div id="gmap">
                                <iframe src="https://maps.google.com/?ie=UTF8&amp;ll=40.717989,-74.002705&amp;spn=0.043846,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                            </div>
                            <div class="row">
                                <form method="post"  action="{{action('SiteController@message')}}">
                                    {{csrf_field()}}
                                    <div class="col-md-6 margin-15">
                                        <div class="form-group">
                                            <input type="text" id="name" name="name"  class="form-control input-lg" placeholder="{{trans('admin.name')}}*" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="surname" name="surname" class="form-control input-lg" placeholder="{{trans('admin.surname')}}*" required>
                                        </div>
                                        <div class="form-group">
                                            <input required type="email" id="email" name="email"  class="form-control input-lg" placeholder="{{trans('admin.email')}}*">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea required style="resize: none" cols="6" rows="7" id="comments" name="message" class="form-control input-lg" placeholder="{{trans('admin.text')}}*"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg pull-right">{{trans('site.send')}}</button>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div id="message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar">
                        <!-- Recent Posts Widget -->
                        <div class="widget-recent-posts widget">
                            <div class="sidebar-widget-title">
                                <h3>{{trans('site.recent_news')}}</h3>
                            </div>
                            <ul>

                                @foreach($recent as $val)
                                   <?php $date  =  new Date(strtotime($val->created_at)); ?>

                                    <li class="clearfix"> <a href="/blog-post/{{$val->id}}" class="media-box post-image"> <img src="/uploads/news/{{$val->img}}" alt="" class="img-thumbnail"> </a>
                                        <div class="widget-blog-content"><a href="/blog-post/{{$val->id}}">{{$val->title}}</a> <span class="meta-data"><i class="fa fa-calendar"></i>{{$date->format('d M, y')}}</span> </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">

                    <table class="table table-responsive table-striped table-bordered">
                        <tr>
                            <th colspan="2">{{trans('site.contact_inf')}}:</th>
                            <th colspan="2">{{trans('site.post_inf')}}:</th>
                        </tr>

                        <tr>
                            <th>Address:</th>
                            <td>
                                H. Javid Str 27 A. Shamakhi ,
                                AZ -1056 Azerbaijan Republic
                            </td>
                            <th>Address:</th>
                            <td>
                                A. Alekberov Str .14 B. Baki
                                AZ-1073 Azerbaijan Republic</td>
                        </tr>

                        <tr>
                            <th>{{trans('admin.email')}}:</th>
                            <td><a href="mailto:example.com">Center_wmw@yahoo.com</a></td>
                            <th>{{trans('admin.email')}}:</th>
                            <td> <a href="mailto:example.com">womenmw@yahoo.com</a></td>
                        </tr>
                        <tr>
                            <th rowspan="2">{{trans('site.phone')}}:</th>
                            <td>( +99412) 5398326</td>
                            <th rowspan="2">{{trans('site.phone')}}:</th>
                            <td>( +99412) 5398326</td>
                        </tr>
                        <tr>
{{--                            <th>Mob:</th>--}}
                            <td>( +99450) 3322618</td>
{{--                            <th>Mob:</th>--}}
                            <td>( +99450) 3322618</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
