@extends("site.layout.app",['title'=>'Error'])
@section('content')
    <div class="nav-backed-header parallax" style="background-image:url(images/slide2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">{{trans('site.home')}}</a></li>
                        <li class="active">404 </li>
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
                    <h1>{{trans('site.not_found')}}</h1>
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
                        <h1 class="huge">404</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection