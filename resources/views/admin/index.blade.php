@extends('admin.layouts.app')
@section('content')

    <style>
        th , td {
            text-align: center;
        }
    </style>
    <div class="right_col" role="main">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table class="table table-hover table-bordered table-responsive">
                            <caption style="text-align: center ;font-size: 20px;margin-left:-50px">{{trans('admin.users')}}</caption>
                            <tr>
                                <th>N°</th>
                                <th>ID</th>
                                <th>{{trans('admin.status')}}</th>
                                <th>{{trans('admin.name')}}</th>
                                <th>{{trans('admin.surname')}}</th>
                                <th>{{trans('admin.email')}}</th>
                                <th>{{trans('admin.phone')}}</th>
                                <th>{{trans('admin.created')}}</th>
                                <th>{{trans('admin.updated')}}</th>
                                <th>{{trans('admin.edit')}}</th>
                                <th>{{trans('admin.view')}}</th>
                                <th>{{trans('admin.delete')}}</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($users as $n)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$n->id}}</td>
                                    <td style="text-align: center">{{$n->status}}</td>
                                    <td>{!! $n->name !!}</td>
                                    <td>{!! $n->surname !!}</td>
                                    <td>{!! $n->email !!}</td>
                                    <td>{!! $n->phone !!}</td>
                                    <td>{{$n->created_at}}</td>
                                    <td>{{$n->updated_at}}</td>

                                    <td style="text-align: center; font-size: large;"><a
                                                href="/admin/users/{{$n->id}}/edit"
                                                class="btn btn-round btn-primary"><i
                                                    class="fa fa-edit"></i></a>
                                    </td>

                                    <td><a href="/admin/users/{!! $n->id !!}" class="btn-success btn"><i class="fas fa-eye"></i></a></td>
                                    <td>
                                        <form action="{{action('UserController@destroy',$n->id)}}" method="post">
                                            {{ csrf_field() }}

                                            {{Form::hidden("_method","Delete")}}

                                            <button type="submit" class="btn btn-round btn-danger"
                                            ><i class="fa fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_content">

                        <table class="table table-hover table-bordered table-responsive">
                            <caption style="text-align: center ;font-size: 20px;margin-left:-50px">{{trans('admin.news')}}</caption>

                            <tr>
                                <th>N°</th>
                                <th>ID</th>
                                <th>{{trans('admin.title')}}</th>
                                <th>{{trans('admin.created')}}</th>
                                <th>{{trans('admin.updated')}}</th>
                                <th>{{trans('admin.edit')}}</th>
                                <th>{{trans('admin.view')}}</th>
                                <th>{{trans('admin.delete')}}</th>

                            </tr>
                            <?php $i=1; ?>
                            @foreach($news as $n)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$n->id}}</td>
                                    <td>{{$n->title}}</td>
                                    <td>{{$n->created_at}}</td>
                                    <td>{{$n->updated_at}}</td>

                                    <td><a
                                                href="/admin/news/{{$n->id}}/edit"
                                                class="btn btn-round btn-primary"><i
                                                    class="fa fa-edit"></i></a>
                                    </td>

                                    <td><a href="/admin/news/{!! $n->id !!}" class="btn-success btn"><i class="fas fa-eye"></i></a></td>
                                    <td>
                                        <form action="{{action('NewsController@destroy',$n->id)}}" method="post">
                                            {{ csrf_field() }}

                                            {{Form::hidden("_method","Delete")}}

                                            <button type="submit" class="btn btn-round btn-danger"
                                            ><i class="fa fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="x_content">

                    <table class="table table-hover table-bordered table-responsive">
                        <caption style="text-align: center ;font-size: 20px;margin-left:-50px">{{trans('admin.messages')}}</caption>

                        <tr>
                            <th>N°</th>
                            <th>ID</th>
                            <th>{{trans('admin.name')}}</th>
                            <th>{{trans('admin.surname')}}</th>
                            <th>{{trans('admin.email')}}</th>
                            <th>{{trans('admin.created')}}</th>
                            <th>{{trans('admin.view')}}</th>
                            <th>{{trans('admin.delete')}}</th>

                        </tr>
                        <?php $i=1; ?>
                        @foreach($msgs as $n)
                            <tr>
                                <td style="text-align: center">{{$i++}}</td>
                                <td style="text-align: center">{{$n->id}}</td>
                                <td>{{$n->name}}</td>
                                <td>{!! $n->surname !!}</td>
                                <td>{!! $n->email !!}</td>
                                <td>{{$n->created_at}}</td>
                                <td style="text-align: center"><a href="/admin/message/{!! $n->id !!}" class="btn-success btn"><i class="fas fa-eye"></i></a></td>
                                <td>
                                    <form action="{{action('MessagesController@destroy',$n->id)}}" method="post">
                                        {{ csrf_field() }}

                                        {{Form::hidden("_method","Delete")}}

                                        <button type="submit" class="btn btn-round btn-danger"
                                        ><i class="fa fa-trash"></i></button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
