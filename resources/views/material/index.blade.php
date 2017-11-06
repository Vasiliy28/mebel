@extends('app')
@section('header')
    <div class="header-background">
        <img src="{{isset($data['header']) ? $data['header'] : ''}}"
             alt="{{isset($data['title']) ? $data['title'] : 'mebel'}}"
             class="d-block w-100"
        >
    </div>
@endsection
@section('content')
    <section class="col-8 mebel-content">
        @if(isset($data['title']))
            <header>
                <h1 class="mt-3 mb-4 pb-2 mebel-content__title">{{$data['title']}}</h1>
            </header>
        @endif

        @if(isset($data['description']))
            <p>{{$data['description']}}</p>
        @endif

        @if(isset($data['items']))
            <div class="row">
                @foreach($data['items'] as $item)
                    <div class="col-4">
                        <figure class="card mb-4 mebel-card mx-auto rounded-0">
                            <a href="{{$item['image']}}" data-toggle="lightbox"
                               data-gallery="{{$data['slag']}}-gallery">
                                <img src="{{$item['image']}}" class="img-fluid card-img-top" alt="{{$data['slag']}}">
                            </a>
                            @if(isset($item['title']))
                                <figcaption class="card-body">
                                    <h4 class="card-title m-0 mebel-card__title">
                                        {{$item['title']}}
                                    </h4>
                                </figcaption>
                            @endif
                        </figure>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
@section('sidebar')
    <aside class="col-3 ml-auto">
        @if(isset($menu))
            <menu class="flex-column nav nav-pills mt-0 pr-3 pl-5">
                @foreach($menu as $slag => $item)
                    <li class="nav-item">
                        <a class="nav-link mebel-nav-link {{request()->is('material/' . $slag) ? 'active bg-teal' :'text-muted'}} rounded-0"
                           href="{{route('material',['type' => $slag], FALSE)}}">
                            {{$item['title']}}</a>
                    </li>
                @endforeach
            </menu>
        @endif
    </aside>
@endsection
