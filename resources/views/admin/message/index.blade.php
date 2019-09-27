@extends("admin.layouts.app")
@section("content")
    <style>
        td{
            text-align: center;
        }
        th{
            text-align: center;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{trans('admin.messages')}}</h3>
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
                                    <th>{{trans('admin.name')}}</th>
                                    <th>{{trans('admin.surname')}}</th>
                                    <th>{{trans('admin.email')}}</th>
                                    <th>{{trans('admin.created')}}</th>
                                    <th>{{trans('admin.updated')}}</th>
                                    <th>{{trans('admin.view')}}</th>
                                    <th>{{trans('admin.delete')}}</th>
                                </tr>
                                <?php  $i=1; ?>
                                @foreach($messages as $v)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{!! $v->surname !!}</td>
                                        <td>{!! $v->email !!}</td>
                                        <td>{{$v->created_at}}</td>
                                        <td>{{$v->updated_at}}</td>
                                        <td><a href="/admin/message/{{$v->id}}" class="btn-success btn"><i class="fas fa-eye"></i></a></td>
                                        <td>
                                            <form action="{{action('MessagesController@destroy',$v->id)}}" method="post">
                                                {{ csrf_field() }}

                                                {{Form::hidden("_method","Delete")}}

                                                <button type="submit" class="btn btn-round btn-danger"
                                                ><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                    </tr>


                                @endforeach
                            </table>
                            {{$messages->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection