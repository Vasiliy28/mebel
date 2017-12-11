@extends('admin.index')
@section('main')
    <div class="container-fluid">
        <div class="row p-3">
            <h1>Работы</h1>
            <span class="ml-4 align-self-center">
                <a href="{{route('works.create')}}" class="btn btn-primary text-white">
                    <i class="fa fa-plus mr-2" aria-hidden="true"></i>Добавить</a>
            </span>
        </div>
        <div class="row p-3">
            <table id="types_work" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Слаг</th>
                    <th scope="col">Примеры</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($works))
                    @foreach($works as $work)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$work->title}}</td>
                            <td>{{$work->slug}}</td>
                            <td>10</td>
                            <td>
                                <a href="{{route('works.edit', $work->id)}}" class="btn btn-success text-white btn-sm float-left mr-2">
                                    <i class="fa fa-pencil mr-2" aria-hidden="true"></i>Редактировать
                                </a>
                                {!! Form::open([
                                    'route' => [ 'works.destroy', $work->id ],
                                    'method' => 'DELETE'
                                    ]) !!}
                                {!! Form::button('<i class="fa fa-trash mr-2" aria-hidden="true"></i> Удалить',[
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-danger remove-work',
                                ]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection