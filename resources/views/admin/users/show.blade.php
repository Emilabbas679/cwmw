@extends('admin.layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-12">
            <h3 class="pull-right"><a href="{{url('admin/users')}}"><button class="btn">{{trans('admin.see_all')}}</button></a></h3>
            <table class="table table-responsive" style="background: white; color: black;">
                <tr>
                    <th>{{trans('admin.id')}}:</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th>{{trans('admin.name')}}:</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>{{trans('admin.email')}}</th>
                    <td>{{$user->email}}</td>
                </tr>

                <tr>
                    <th>{{trans('admin.status')}}:</th>
                    <td>{!! $user->status !!}</td>
                </tr>
                <tr>
                    <th>{{trans('admin.updated')}}:</th>
                    <td>{!! $user->updated_at !!}</td>
                </tr>
                <tr>
                    <th>{{trans('admin.created')}}:</th>
                    <td>{!! $user->created_at !!}</td>
                </tr>

            </table>
            {!! Form::open(['action'=>['UserController@destroy',$user->id] ,'method'=>"POST"])!!}
            <a href="/admin/users/{{$user->id}}/edit" class="btn btn-success">{{trans('admin.edit')}}</a>
            {{Form::hidden("_method","DELETE")}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection