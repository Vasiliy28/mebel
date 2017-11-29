@extends('admin.index')
@section('main')
    <div class="container-fluid">
        <h1 class="mt-2">Добавить работу</h1>
        {!! Form::model($model, $form) !!}
        <div class="card col-6 no-gutters mt-4">
            <div class="card-body p-0 pt-3 pb-3">
                {!! Form::label('title',$title['label']['value'] ?? NULL, $title['label']['attributes']) !!}
                {!! Form::text('title',$title['value'] ?? NULL, $title['attributes']) !!}
                {!! Form::text('slug',$slug['value'] ?? NULL, $slug['attributes']) !!}
            </div>
        </div>
        <div class="card col-12 no-gutters mt-4">
            <div class="card-body p-0 pt-3 pb-3">
                {!! Form::label('description',$description['label']['value'] ?? NULL, $description['label']['attributes']) !!}
                {!! Form::textarea('description',$description['value'] ?? NULL, $description['attributes']) !!}
            </div>
        </div>
        <div class="row mt-4 no-gutters">
            @foreach($images as $key => $image)
                <div class="col-4">
                    <p>{{$image['title']}}</p>
                    <label class="custom-file">
                        {!! Form::file("images[$key]", $image['attributes']); !!}
                        <span class="custom-file-control"></span>
                    </label>
                </div>
            @endforeach
        </div>
        {!! Form::submit('Добавить',['class' => 'btn btn-primary mt-2']); !!}
        {!! Form::close() !!}
    </div>
@endsection