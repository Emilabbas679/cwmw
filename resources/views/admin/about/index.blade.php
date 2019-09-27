@extends("admin.layouts.app")
@section('content')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-12">
                <table class="table table-responsive" style="background: white; color: black;">
                    <tr>
                        <th>{{trans('admin.id')}}</th>
                        <td>{!! $about->id!!}</td>
                    </tr>
                    <tr>
                        <th>{{trans('site.about')}}</th>
                        <td>{!! $about->about!!}</td>
                    </tr>

                    <tr>
                        <th>{{trans('admin.created')}}</th>
                        <td>{!! $about->created_at!!}</td>
                    </tr>            <tr>
                        <th>{{trans('admin.updated')}}</th>
                        <td>{!! $about->updated_at!!}</td>
                    </tr>



                </table>
                <a href="/admin/about/{{$about->id}}/edit" class="btn btn-success">{{trans('admin.edit')}}</a>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection