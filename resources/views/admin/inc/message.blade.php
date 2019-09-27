
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <i class="fas fa-times fa-2x pull-right close-notification" style="color: white; margin-right:10px !important; "></i>

            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
<div class="alert alert-success">
    <i class="fas fa-times fa-2x pull-right close-notification" style="color: white; margin-right:10px !important; "></i>

    {{session('success')}}
</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <i class="fas fa-times fa-2x pull-right close-notification" style="color: white; margin-right:10px !important; "></i>

        {{session('error')}}
    </div>
@endif



