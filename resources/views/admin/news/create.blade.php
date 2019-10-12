@extends('admin.layouts.app')
@section("content")
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{trans('admin.add_news')}}</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" style="color: #fff" href="{{ url("/admin/news") }}"> {{trans('admin.see_news')}}</a>
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <form data-parsley-validate action="{{action('NewsController@store')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        @foreach($locale as $key => $local)
                                            <li role="presentation" class=@if($key == 0)"active"@endif><a
                                                        href="#{{$local->lang}}" id="{{$local->lang}}-tab"
                                                        role="tab" data-toggle="tab"
                                                        aria-expanded="true">{{strtoupper($local->lang)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div id="myTabContent" class="tab-content">

                                        @foreach ($locale as $key => $local)
                                            <div role="tabpanel" @if($key == 0)class="tab-pane fade active in"
                                                 @else class="tab-pane fade" @endif id="{{$local->lang}}"
                                                 aria-labelledby="{{$local->lang}}-tab">

                                                <div class="form-group">
                                                    <label for="title"
                                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.title')}}
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input required id="title" type="text"
                                                               name="title[{{$local->lang}}]"
                                                               class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>


{{--                                                <div class="form-group">--}}
{{--                                                    <label for="slug"--}}
{{--                                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.slug')}}--}}
{{--                                                    </label>--}}
{{--                                                    <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--                                                        <input required id="slug" type="text"--}}
{{--                                                               name="slug[]"--}}
{{--                                                               class="form-control col-md-7 col-xs-12" >--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <label for="text"
                                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.text')}}
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea required id="text" name="text[{{$local->lang}}]"
                                                              class="form-control col-md-7 col-xs-12 ckeditor" >
                                                    </textarea>
                                                    </div>
                                                </div>

                                            </div>
                                                @endforeach
                                            <div class="form-group">
                                                <label for="img"
                                                       class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.img')}}
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" name="img" class="form-control col-md-7 col-xs-12">

                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">{{trans('admin.add')}}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



