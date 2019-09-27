@extends("site.layout.app",['title'=> trans('site.gallery')])
@section('content')
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax" style="background-image:url(http://picsum.photos/1280/635?random=99);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/">{{trans('site.home')}}</a></li>
                        <li class="active">{{trans('site.gallery')}}</li>
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
                    <h1>{{trans('site.gallery')}}</h1>
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
                    <ul class="isotope-grid" data-sort-id="gallery">

                        @foreach($images as $image)
                            <?php $imgs = explode(' ',$image->img)?>
                            <li class="col-md-6 col-sm-6 grid-item post format-gallery">
                                <div class="grid-item-inner">
                                    <div class="media-box">
                                        <div class="flexslider" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="slide" data-pause="yes">
                                            <ul class="slides">
                                                @foreach($imgs as $value)
                                                    <li class="item"><a href="/storage/gallery/{{$value}}" data-rel="prettyPhoto[postname]">
                                                            <img src="/storage/gallery/{{$value}}" alt=""></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption style="padding:10px">{{$image->title}}</figcaption>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
                <div class="text-align-center">
                    <ul class="pagination">
                        {{$images->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection