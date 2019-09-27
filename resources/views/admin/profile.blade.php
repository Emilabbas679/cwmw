@extends("admin.layouts.app")
@section("content")
    <style>
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
    </style>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-12">
                <h2>{{trans('admin.profile')}}</h2>
                <table class="table table-bordered table-responsive">
                        <tr>
                            <th>{{trans('admin.id')}}</th>
                            <th>{{trans('admin.name')}}</th>
                            <th>{{trans('admin.surname')}}</th>
                            <th>{{trans('admin.status')}}</th>
                            <th>{{trans('admin.phone')}}</th>
                            <th>{{trans('admin.email')}}</th>
                            <th>{{trans('admin.created')}}</th>
                            <th>{{trans('admin.updated')}}</th>
                        </tr>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                        </tr>
                </table>
                        <h2 style="text-align: center">{{trans('admin.change_pass')}}</h2>
                <form  action="{{action('UserController@changepass')}}" method="post" class="form-horizontal form-label">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="password"
                               class="control-label col-md-2 col-sm-2 col-xs-12">{{trans('admin.curr_password')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="curr_password" class="form-control col-md-7 col-xs-12" required autocomplete="false">
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

{{--                            {{Form::hidden("_method","PUT")}}--}}
                            <button type="submit" class="btn btn-success">{{trans('admin.change')}}</button>
                        </div>
                    </div>


                </form>



            </div>
        </div>
    </div>

@endsection