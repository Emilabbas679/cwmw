@extends("admin.layouts.app")
@section("content")
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add new Image</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" style="color: #fff" href="{{ url("/admin/gallery") }}"> See all
                            Images</a>
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <form data-parsley-validate action="{{action('GalleryController@update',$image->id)}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
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
                                                           class="control-label col-md-2 col-sm-2 col-xs-12">Title
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input required id="title" type="text"
                                                               name="title[{{$local->lang}}]"
                                                               class="form-control col-md-7 col-xs-12" value="{{$image->gettranslation('title',$local->lang)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="form-group">
                                            <label for="image" class="control-label col-md-2 col-sm-2 col-xs-12">Old image</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php  $imgs = explode(' ',$image->img) ?>
                                                <td>

                                                    @foreach($imgs as $img)
{{--                                                        <img src="/storage/gallery/{{$img}}" alt="{{$image->title}}" title="{{$image->title}}" width="200" height="100">--}}
                                                        <img src="/uploads/gallery/{{$img}}" alt="{{$image->title}}" title="{{$image->title}}" width="200" height="100">
                                                    @endforeach
                                                </td>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="img"
                                                   class="control-label col-md-2 col-sm-2 col-xs-12">New image
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="img[]" multiple id="img" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        {{Form::hidden("_method","PUT")}}

                                        <button type="submit" class="btn btn-success">Edit</button>
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
