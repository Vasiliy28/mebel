@extends('admin.index')
@section('main')
    <div class="container-fluid">
        <h1 class="mt-2">Добавить работу</h1>
        {!! Form::model($model, $form) !!}
        <div class="card col-8 no-gutters mt-4">
            <div class="card-body p-0 pt-3 pb-3">
                {!! Form::label(Works::TITLE, $title['label']['value'] ?? NULL, $title['label']['attributes']) !!}
                {!! Form::text(Works::TITLE, $title['value'] ?? NULL, $title['attributes']) !!}
            </div>
        </div>

        <div class="row no-gutters mt-4">
            <div class="col-8 card">
                <div class="card-body p-2">
                    {!! Form::label(Works::DESC,$description['label']['value'] ?? NULL, $description['label']['attributes']) !!}
                    {!! Form::textarea(Works::DESC,$description['value'] ?? NULL, $description['attributes']) !!}

                </div>
            </div>
            <div class="col ml-2">
                <div class="card">
                    <div class="card-body p-2">
                        <div class="form-group">
                            {!! Form::label(Works::IMAGE,$main_image['label']['value'] ?? NULL, $main_image['label']['attributes']) !!}
                            {!! Form::file(Works::IMAGE, $main_image['attributes']); !!}
                            @if( !empty($model->{Works::IMAGE}) )
                                <img src="{{asset('storage/' . $model->{Works::IMAGE}['thumb'])}}" class="d-block w-100 mt-2">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pl-2 mt-4 wrapper-examples">
            <p class="h4">Примеры работ</p>

            @if(! $model->{Works::EXAMPLES}->isEmpty())
                <div class="exist-examples  mb-5">
                    <p class="h5 d-block flex-row">Уже добавленые:</p>
                    <div class="row no-gutters">
                        @foreach($model->examples as $example)
                            <div class="col-3 card mb-1 p-1 position-relative example">
                                <img src="{{asset('storage/' . $example->path['thumb'])}}"
                                     alt="{{ $model->{Works::TITLE} }}"
                                     class="d-block w-100"
                                >
                                <span class="position-absolute remove-example p-2 text-warning pointer m-1"
                                      data-remove_route="{{route('examples.destroy', $example->id)}}"
                                >
                                <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                            </span>
                                <span class="position-absolute text-light remove-spinner"></span>
                            </div>
                        @endforeach
                    </div>
                </div>

            @endif
            <p class="h5 d-block flex-row">Новые:</p>
            <div class="row no-gutters example-thumbs">
            </div>
            <div class="row no-gutters add-work">
                <label class="work-example pointer border rounded p-4 m-1">
                    {!! Form::file(Works::EXAMPLES . '[]',['class' => 'd-none', 'multiple']) !!}
                    <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                </label>
                <span class="border rounded p-4 m-1 pointer remove-examples d-none">
                <i class="fa fa-times fa-3x text-danger" aria-hidden="true"></i>
                </span>
            </div>
        </div>

        {!! Form::submit('Добавить',['class' => 'btn btn-primary mt-2']); !!}
        {!! Form::close() !!}
    </div>
@endsection