@extends('admin.layouts.app')
@section("content")
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{trans('admin.add_user')}}</h3>
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
                            <form data-parsley-validate action="{{action('UserController@store')}}" class="form-horizontal form-label-left" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name"
                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.name')}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" class="form-control col-md-7 col-xs-12" required value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="surnam"
                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.surname')}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="surname" class="form-control col-md-7 col-xs-12" required value="{{old('surname')}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email"
                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.email')}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" class="form-control col-md-7 col-xs-12" required value="{{old('email')}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone"
                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.phone')}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="phone" class="form-control col-md-7 col-xs-12" required value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status"
                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.status')}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select('status', [1 => 'Admin'] + ['2'=>'Admin +'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="password"
                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.password')}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="password" class="form-control col-md-7 col-xs-12" required autocomplete="false">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password"
                                           class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.confirm_pass')}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="confirm_password" class="form-control col-md-7 col-xs-12" required>
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