
@extends("admin.layouts.app")
@section('content')


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{trans('admin.users')}}</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-success" style="color: #fff" href="{{('/admin/users/create')}}"> {{trans('admin.add_user')}}</a>
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
                                    <th>{{trans('admin.name')}}</th>
                                    <th>{{trans('admin.surname')}}</th>
                                    <th>{{trans('admin.phone')}}</th>
                                    <th>{{trans('admin.email')}}</th>
                                    <th>{{trans('admin.status')}}</th>
{{--                                    <th></th>--}}
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
                                        <td>{{$n->name}}</td>
                                        <td>{{$n->surname}}</td>
                                        <td>{{$n->phone}}</td>
                                        <td>
                                            {{$n->email}}
                                        </td>
                                        <td>{!! $n->status !!}</td>
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
                            {{$users->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




