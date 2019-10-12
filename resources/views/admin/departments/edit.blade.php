@extends('admin.layouts.app')
@section("content")

    <div class="right_col" role="main">
        <div class="row">


            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <form data-parsley-validate action="{{action('DepartmentsController@update',$departments->id)}}" class="form-horizontal form-label-left" method="post">
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
                                                    <label for="departments"
                                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('site.departments')}}
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea required id="departments" name="departments[{{$local->lang}}]"
                                                              class="form-control col-md-7 col-xs-12 ckeditor" >
                                                        {{$departments->gettranslation('departments',$local->lang)}}
                                                    </textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        {{Form::hidden("_method","PUT")}}
                                        <button type="submit" class="btn btn-success">{{trans('admin.edit')}}</button>
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
