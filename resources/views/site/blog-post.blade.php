@extends("site.layout.app",['title'=> "$news->title"])
@section("content")
    <?php use Jenssegers\Date\Date;
    Date::setLocale(\Illuminate\Support\Facades\App::getLocale());
    $date  =  new Date(strtotime($news->created_at));

    ?>
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/">{{trans('site.home')}}</a></li>
                        <li><a href="/blog">{{trans('site.blog')}}</a></li>
                        <li class="active">{{$news->title}}</li>
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
                <div class="col-md-8 col-sm-8">
                    <h1>{{trans('site.blog')}}</h1>
                </div>
                <div class="col-md-4 col-sm-4">
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
                            <h2 class="post-title">{{$news->title}}</h2>
                        </header>
                        <article class="post-content"> <span class="post-meta meta-data"><span><i class="fa fa-calendar"></i>{{$date->format('d M, Y')}}</span> </span>
                            <div class="featured-image"> <img src="/storage/news/{{$news->img}}" alt=""> </div>
                            <p>{!! $news->text !!}</p>
                        </article>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar">
                        <div class="widget sidebar-widget search-form-widget">
                            <form action="{{action('SiteController@search')}}" method="get">
                                {{ csrf_field() }}
                            <div class="input-group input-group-lg">
                                <input type="text" name="search" class="form-control" placeholder="{{trans('site.search')}}..." required>
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search fa-lg"></i></button>
                                    </span>
                             </div>
                            </form>
                        </div>
                        <div class="widget sidebar-widget">
                            <div class="sidebar-widget-title">
                                <h3>{{trans('site.recent_news')}}</h3>
                            </div>
                            <div>
                                <ul>
                                   <?php $date  =  new Date(strtotime($recent->created_at)); ?>

                                    <li class="grid-item post format-standard">
                                        <div class="grid-item-inner"> <a href="/storage/news/{{$recent->img}}" data-rel="prettyPhoto" class="media-box"> <img src="/storage/news/{{$recent->img}}" alt=""> </a>
                                            <div class="grid-content">
                                                <h3><a href="/blog-post/{{$recent->id}}">{!! $recent->title !!}</a></h3>
                                                <span class="meta-data"><span><i class="fa fa-calendar"></i> {{$date->format("d M, Y")}}   </span></span>
                                                <p><?=substr($recent->text,0,400) ?></p>
                                            </div>
                                        </div>
                                     </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection