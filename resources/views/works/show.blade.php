@extends('app')
@section('header')
    <div class="header-background bg-info">
        <img src="{{isset($works->{Works::IMAGE}['full']) ? asset('storage/' . $works->{Works::IMAGE}['full']) : ''}}"
             alt="{{isset($works->title) ? $works->title : 'mebel'}}"
             class="d-block w-100"
        >
    </div>
@endsection

@section('content')
    <section class="col-8 mebel-content">
        @if(isset($works->title))
            <header>
                <h1 class="mt-3 mb-4 pb-2 mebel-content__title">{{ $works->title }}</h1>
            </header>
        @endif
        @if(isset($works->desc))
            {!! $works->desc  !!}
        @endif
        @if(isset($works->examples))
            <div class="row">
                @foreach($works->examples as $example)
                    <div class="col-4">
                        <figure class="card mb-4 mebel-card mx-auto rounded-0">
                            <a href="{{asset('storage/'. $example->path['full'])}}" data-toggle="lightbox"
                               data-gallery="{{$works->slug}}-gallery">
                                <img src="{{asset('storage/'. $example->path['thumb'])}}" class="img-fluid card-img-top" alt="{{$works->slug}}">
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
                        <a class="nav-link mebel-nav-link {{request()->is('works/' . $item->slug) ? 'active bg-teal' :'text-muted'}} rounded-0"
                           href="{{route('works',['type' => $item->slug], FALSE)}}">
                            {{$item->title}}</a>
                    </li>
                @endforeach
            </menu>
        @endif
    </aside>
@endsection
