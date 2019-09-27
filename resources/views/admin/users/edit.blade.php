@extends('admin.layouts.app')
@section("content")

<div class="right_col" role="main">
    <div class="row">
        <div class="page-title">
            <div class="title_left">
                <h3>{{trans('admin.edit')}}</h3>
            </div>

            <div class="title_right">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" style="color: #fff" href="{{ url("/admin/users") }}"> {{trans('admin.see_all')}}</a>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <form data-parsley-validate action="{{action('UserController@update',$user->id)}}" class="form-horizontal form-label-left" method="post">
                        {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name"
                                       class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.name')}}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input required id="name" type="text" name="name" class="form-control col-md-7 col-xs-12" value="{{$user->name}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surname"
                                       class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.surname')}}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input required id="name" type="text" name="surname" class="form-control col-md-7 col-xs-12" value="{{$user->surname}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone"
                                       class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.phone')}}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input required id="phone" type="text" name="phone" class="form-control col-md-7 col-xs-12" value="{{$user->phone}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"
                                       class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.email')}}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input required id="email" type="text" name="email" class="form-control col-md-7 col-xs-12" value="{{$user->email}}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status"
                                       class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.status')}}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
{{--                                                {!! Form::select('status', [0 => 'User'] + ['1'=>'Admin','2'=>'Admin 2','3'=>'Main Admin'], null, ['class' => 'form-control']) !!}--}}
                                    <select name="status" id="" style="width: 100%; height: 40px; border-color: #ccc" required>
                                        <option selected disabled>{{trans('admin.choose status')}}</option>
                                        @foreach($options as $k=>$v)
                                            @if($k == $user->status)
                                                <?php $select = 'selected' ?>
                                            @else
                                                <?php $select = '' ?>
                                            @endif
                                            <option value="{{$k}}" {{$select}}>{{$v}}</option>
                                        @endforeach
                                    </select>
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