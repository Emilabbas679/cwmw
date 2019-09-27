@extends('admin.layouts.app')
@section("content")
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{trans('admin.news')}}</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-success pull-right" style="color: #fff" href="{{('/admin/news/create')}}"> {{trans('admin.add_news')}}</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <table class="table table-hover table-bordered table-responsive">
                                <tr>
                                    <th>№</th>
                                    <th>{{trans('admin.id')}}</th>
                                    <th>{{trans('admin.title')}}</th>
                                    <th>{{trans('admin.slug')}}</th>
                                    <th>{{trans('admin.views')}}</th>
                                    <th>{{trans('admin.created_by')}}</th>
                                    <th>{{trans('admin.created')}}</th>
                                    <th>{{trans('admin.updated')}}</th>
                                    <th>{{trans('admin.edit')}}</th>
                                    <th>{{trans('admin.view')}}</th>
                                    <th>{{trans('admin.delete')}}</th>
                                </tr>
                                <?php  $i=1; ?>
                                @foreach($news as $val)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{!! $val->id !!}</td>
                                        <td>{!! $val->title !!}</td>
                                        <td>{!! $val->slug !!}</td>

                                        <td>{{$val->view}}</td>
                                        <td><?=$val->user['name'].' id:'.$val->user['id']?></td>
                                        <td>{!! $val->created_at!!}</td>
                                        <td>{!! $val->updated_at !!}</td>
                                        <td>
                                            <a href="/admin/news/{{$val->id}}/edit"
                                                    class="btn btn-round btn-primary"><i
                                                        class="fa fa-edit"></i></a>
                                        </td>
                                        <td><a href="/admin/news/{!! $val->id !!}" class="btn-success btn"><i class="fas fa-eye"></i></a></td>
                                        <td>
                                            <form action="{{action('NewsController@destroy',$val->id)}}" method="post">
                                                {{ csrf_field() }}

                                                {{Form::hidden("_method","Delete")}}

                                                <button type="submit" class="btn btn-round btn-danger"
                                                ><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                            </table>
                            {{$news->links()}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



