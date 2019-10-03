@extends("site.layout.app",['title'=> trans('site.title')])
@section('content')

    <?php
    use Jenssegers\Date\Date;
    Date::setLocale(\Illuminate\Support\Facades\App::getLocale());
    ?>
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
        <ul class="slides">
            <li class=" parallax" style="background-image:url('/site/images/parallax/3.jpg');"></li>
            <li class="parallax" style="background-image:url('/site/images/parallax/4.jpg');"></li>
        </ul>
    </div>

    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <!-- Events Listing -->
                        <div class="listing events-listing">
                            <header class="listing-header">
                                <h3>{{trans('site.most_popular_news')}}</h3>
                            </header>
                            <section class="listing-cont">
                                <ul>

                                @foreach($most_news as $val)
                                    <?php
                                       $date  =  new Date(strtotime($val->created_at));
                                     ?>
                                        <li class="item event-item">
                                            <div class="event-date"> <span class="date">{{$date->format('d')}}</span> <span class="month">{{$date->format('M')}}</span> </div>
                                            <div class="event-detail">
                                                <h4><a href="/blog-post/{{$val->id}}">{{$val->title}}</a></h4>
                                                <span class="event-dayntime meta-data">{{$date->format('D')}} | {{$date->format('H:i ')}}</span> </div>
                                            <div class="to-event-url">
                                                <div><a href="/blog-post/{{$val->id}}" class="btn btn-default btn-sm">{{trans('site.read')}}</a></div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>
                        </div>
                        <div class="spacer-30"></div>
                        <!-- Latest News -->
                        <div class="listing post-listing">
                            <header class="listing-header">
                                <h3>{{trans('site.latest_news')}}</h3>
                            </header>
                            <section class="listing-cont">
                                <ul>
                                    @foreach($latest_news as $val)
                                        <?php
                                        $date  =  new Date(strtotime($val->created_at));
                                        ?>
                                        <li class="item post">
                                            <div class="row">
                                                <div class="col-md-4"> <a href="/blog-post/{{$val->id}}" class="media-box"> <img src="/uploads/news/{{$val->img}}" alt="" class="img-thumbnail"> </a></div>
                                                <div class="col-md-8">
                                                    <div class="post-title">
                                                        <h2><a href="/blog-post/{{$val->id}}">{{$val->title}}</a></h2>
                                                        <span class="meta-data"><i class="fa fa-calendar"></i>{{$date->format("d M, Y")}}</span></div>
                                                    <?php
                                                    $textpart = explode('</p>',$val['text'])[0];
                                                    ?>
                                                    <p>{!! $textpart !!}</p>
                                                    <p></p>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </section>
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-4 col-sm-6">
                        <!-- Latest Sermons -->
                        <div class="listing sermons-listing">
                            <header class="listing-header">
                                <h3>{{trans('site.recent_news')}}</h3>
                            </header>
                            <section class="listing-cont">
                                <ul>
                                    <?php
                                    $date  =  new Date(strtotime($recent_news[0]->created_at));
                                    ?>
                                    <li class="item sermon featured-sermon"> <span class="date">{{$date->format('M d, Y')}}</span>
                                        <h4><a href="/blog-post/{{$recent_news[0]->id}}">{{$recent_news[0]['title']}}</a></h4>
                                        <div class="featured-sermon-video">
                                            <img src="/uploads/news/{{$recent_news[0]['img']}}" alt="">
                                        </div>
                                        <?php
                                        $textpart = explode('</p>',$recent_news[0]['text'])[0];
                                        ?>
                                        <p>{!! $textpart !!}</p>
                                        <div style="text-align: center">
                                            <a href="/blog-post/{{$recent_news[0]->id}}"> <button class="btn btn-primary">{{trans('site.read')}}</button> </a>
                                        </div>
                                    </li>
                               </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Featured Gallery -->
    <div class="featured-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <a href="/gallery" class="btn btn-default btn-lg" style="margin-top:40px;">{{trans("site.more_gallery")}}</a> </div>
                
                @foreach($images as $image)
                    <div class="col-md-3 col-sm-3 post format-image">
                    <?php $imgs = explode(' ',$image->img)?>
                        <div class="flexslider" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="slide" data-pause="yes">
                            <ul class="slides">
                                @foreach($imgs as $value)
{{--                                    <li class="item"><a href="/uploads/gallery/{{$value}}" data-rel="prettyPhoto[Gallery]">--}}
{{--                                            <img src="/uploads/gallery/{{$value}}" alt=""></a></li>--}}

                                    <li class="item"><a href="/uploads/gallery/{{$value}}" data-rel="prettyPhoto[Gallery]">
                                            <img src="/uploads/gallery/{{$value}}" alt=""></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- End Featured Gallery -->
    @endsection
