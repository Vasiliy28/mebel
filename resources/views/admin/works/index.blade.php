@extends('admin.index')
@section('main')
    <div class="container-fluid no-gutters">
        <div class="d-flex mt-3">
            <h1>Работы</h1>
            <span class="ml-4 align-self-center">
                <a href="{{route('works.create')}}" class="btn btn-success text-white">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить</a>
            </span>
        </div>
    </div>
@endsection