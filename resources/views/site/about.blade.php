@extends("site.layout.app",['title'=> trans('site.about')])
@section('content')
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax" style="background-image:url(http://picsum.photos/1280/635?random=50);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/">{{trans('site.home')}}</a></li>
                        <li class="active">{{trans('site.about')}}</li>
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
                    <h1>{{trans('site.about')}}</h1>
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
                        {!! $about->about !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection