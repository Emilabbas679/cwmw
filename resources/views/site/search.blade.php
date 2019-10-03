@extends("site.layout.app",['title'=> trans('site.search')])
@section('content')
    <?php use Jenssegers\Date\Date;
    Date::setLocale(\Illuminate\Support\Facades\App::getLocale());

    ?>
    <div class="nav-backed-header parallax" style="background-image:url(images/slide2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">{{trans('site.home')}}</a></li>
                        <li class="active">{{trans('site.search')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Nav Backed Header -->
    <!-- Start Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{trans('site.search')}}</h1>
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
                    <div class="col-md-12">
                        <div class="listing post-listing">

                            <section class="listing-cont">
                                <ul>
                                    @foreach($titles as $val)
                                        <?php $date  =  new Date(strtotime($val->created_at)); ?>

                                        <li class="item post">
                                            <div class="row">
                                                <div class="col-md-4"> <a href="/blog-post" class="media-box"> <img src="/uploads/news/{{$val->img}}" alt="" class="img-thumbnail"> </a></div>
                                                <div class="col-md-8">
                                                    <div class="post-title">
                                                        <h2><a href="/blog-post/{{$val->id}}">{{$val->title}}</a></h2>
                                                        <?php $part = explode('</p>' , $val->text)[0] ?>
                                                        <span class="meta-data"><i class="fa fa-calendar"></i>{{$date->format("d M, Y")}}</span></div>
                                                    <p>{!! $part !!}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
