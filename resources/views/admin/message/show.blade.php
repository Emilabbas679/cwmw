@extends('admin.layouts.app')
@section('content')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-12">
                <h4><a href="<?=url('admin/message')?>" class="btn btn-primary">{{trans('admin.see_all_messages')}}</a></h4>
                <table class="table table-responsive" style="background: white; color: black;">
                    <tr>
                        <th>{{trans('admin.id')}}</th>
                        <td>{!! $message->id!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.name')}}</th>
                        <td>{!! $message->name!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.surname')}}</th>
                        <td>{!! $message->surname!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.email')}}</th>
                        <td>{!! $message->email!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.text')}}</th>
                        <td>{!! $message->text!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.text')}}</th>
                        <td>{!! $message->text!!}</td>
                    </tr>

                    <tr>
                        <th>{{trans('admin.created')}}</th>
                        <td>{!! $message->created_at!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.updated')}}</th>
                        <td>{!! $message->updated_at!!}</td>
                    </tr>



                </table>
                {!! Form::open(['action'=>['MessagesController@destroy',$message->id] ,'method'=>"POST"])!!}
                {{Form::hidden("_method","DELETE")}}
                {{Form::submit(trans('admin.delete'),['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection