@extends("site.layout.app",['title'=> trans('site.blog')])
@section('content')
    <?php use Jenssegers\Date\Date;
    Date::setLocale(\Illuminate\Support\Facades\App::getLocale());
    ?>
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax" style="background-image:url(http://picsum.photos/1280/635?random=9);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">{{trans('site.home')}}</a></li>
                        <li class="active">{{trans('site.blog')}}</li>
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
                    <h1>{{trans('site.blog')}}</h1>
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
                        <ul class="grid-holder col-3 events-grid">
                            @foreach($news as $val)
                                <?php
                                $date  =  new Date(strtotime($val->created_at));
                                ?>
                            <li class="grid-item post format-standard" style="display: block;">
                                <div class="grid-item-inner"> <a href="/uploads/news/{{$val->img}}" data-rel="prettyPhoto" class="media-box"> <img src="/uploads/news/{{$val->img}}" alt=""> </a>
                                    <div class="grid-content">
                                        <h3><a href="/blog-post/{{$val->id}}">{{$val->title}}</a></h3>
                                        <span class="meta-data"><span><i class="fa fa-calendar"></i>{{$date->format('d M, Y')}}</span></span>
                                        <?php
                                        $textpart = explode('</p>',$val['text'])[0];
                                        ?>
                                        <p>{!! $textpart !!}</p>

                                    </div>
                                </div>
                            </li>
                             @endforeach
                        </ul>

                        <!-- Pagination -->
                        <ul class="pull-right">
                            {{$news->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
