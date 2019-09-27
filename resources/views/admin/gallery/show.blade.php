@extends("admin.layouts.app")
@section("content")

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-12">
                <h4><a href="<?=url('admin/gallery')?>" class="btn btn-primary">See all images</a></h4>
                <table class="table table-responsive" style="background: white; color: black;">
                    <tr>
                        <th>{{trans('admin.id')}}: </th>
                        <td>{{$image->id}}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.title')}}: </th>
                        <td>{{$image->title}}</td>
                    </tr>
                    <tr>
                        <th>{{trans('admin.img')}}:</th>
                        <?php  $imgs = explode(' ',$image->img) ?>
                        <td>

                            @foreach($imgs as $img)
                                <img src="/storage/gallery/{{$img}}" alt="{{$image->title}}" title="{{$image->title}}" width="200" height="100">
                             @endforeach
                        </td>
                    </tr>
                </table>
                {!! Form::open(['action'=>['GalleryController@destroy',$image->id] ,'method'=>"POST"])!!}
                <a href="/admin/gallery/{{$image->id}}/edit" class="btn btn-success">{{trans('admin.edit')}}</a>
                {{Form::hidden("_method","DELETE")}}
                {{Form::submit(trans('admin.delete'),['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection