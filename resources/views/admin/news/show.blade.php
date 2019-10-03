@extends('admin.layouts.app')
@section('content')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-12">
                <h4><a href="<?=url('admin/news')?>" class="btn btn-primary">{{trans('admin.see_news')}}</a></h4>
                <table class="table table-responsive" style="background: white; color: black;">
                    <tr>
                        <th>{{trans('admin.id')}}</th>
                        <td>{!! $news->id!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.title')}}</th>
                        <td>{!! $news->title!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.slug')}}</th>
                        <td>{!! $news->slug!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.views')}}</th>
                        <td>{!! $news->view!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.text')}}</th>
                        <td>{!! $news->text!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.img')}}</th>
{{--                        <td> <img src="/storage/news/{{$news->img}}" alt="" width="140" height="80"> </td>--}}
                        <td> <img src="/uploads/news/{{$news->img}}" alt="" width="140" height="80"> </td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.created_by')}}</th>
                        <td><?=$news->user['name'].' id:'.$news->user['id']?></td>

                    </tr>
                    <tr>
                        <th>{{trans('admin.created')}}</th>
                        <td>{!! $news->created_at!!}</td>
                    </tr>            <tr>
                        <th>{{trans('admin.updated')}}</th>
                        <td>{!! $news->updated_at!!}</td>
                    </tr>



                </table>
                {!! Form::open(['action'=>['NewsController@destroy',$news->id] ,'method'=>"POST"])!!}
                <a href="/admin/news/{{$news->id}}/edit" class="btn btn-success">{{trans('admin.edit')}}</a>
                {{Form::hidden("_method","DELETE")}}
                {{Form::submit(trans('admin.delete'),['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
