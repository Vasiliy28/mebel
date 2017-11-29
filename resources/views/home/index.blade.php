@extends('app')

@section('header')
    <div class="header-slider d-flex">
        <h1 class="header-slider__title position-absolute offset-2 text-light">
            <span>Мебель в Джанкое</span>
        </h1>
        <div id="headerCarousel" class="carousel slide w-100" data-ride="carousel">
            <ol class="carousel-indicators header-slider__indicators">
                <li data-target="#headerCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#headerCarousel" data-slide-to="1"></li>
                <li data-target="#headerCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item header-slider__slide header-slider__slide_kitchen active">
                    <div class="header-slider__caption offset-2">
                        <p>Кухни</p>
                        <a href="{{route('works',['type' => 'kitchens'])}}" class="btn btn-lg mebel-btn-teal"
                           role="button"
                           aria-pressed="true">
                            Фото
                            <i class="fa fa-angle-right ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="carousel-item header-slider__slide header-slider__slide_bed">
                    <div class="header-slider__caption offset-2">
                        <p>Кровати</p>
                        <a href="{{route('works',['type' => 'beds'], true)}}" class="btn btn-lg mebel-btn-teal"
                           role="button"
                           aria-pressed="true">
                            Фото
                            <i class="fa fa-angle-right ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="carousel-item header-slider__slide header-slider__slide_closet">
                    <div class="header-slider__caption offset-2">
                        <p>Шкафы-купе</p>
                        <a href="{{route('works',['type' => 'wardrobes'], TRUE)}}" class="btn btn-lg mebel-btn-teal"
                           role="button"
                           aria-pressed="true">
                            Фото
                            <i class="fa fa-angle-right ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev justify-content-start" href="#headerCarousel" role="button"
               data-slide="prev">
                <i class="fa fa-angle-left fa-2x p-4 bg-dark rounded-right" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next justify-content-end" href="#headerCarousel" role="button" data-slide="next">
                <i class="fa fa-angle-right fa-2x p-4 bg-dark rounded-left" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <a href="#orderMebel" class="nav-link header-slider__scroll-to position-absolute"><i
                    class="fa fa-angle-double-down fa-3x fa-fw"></i></a>
    </div>
@endsection

@section('content')
    @if(TRUE)
        <section id="orderMebel" class="order-mebel pb-5">
            <div class="container">
                <h1 class="text-center pt-5 pb-5">Заказ мебели</h1>
                <div class="row">
                    <div class="col">
                        <div class="card border-0">
                            <span class="fa-stack fa-4x mx-auto text-teal">
                             <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-picture-o fa-stack-1x fa-inverse"></i>
                            </span>
                            <div class="card-body mx-auto">
                                <h4 class="card-title text-center">Дизайн</h4>
                                <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Facere,
                                    nesciunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <span class="fa-stack fa-4x mx-auto text-teal">
                             <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
                            </span>
                            <div class="card-body mx-auto">
                                <h4 class="card-title text-center">Изготовление</h4>
                                <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Facere,
                                    nesciunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <span class="fa-stack fa-4x mx-auto text-teal">
                             <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
                            </span>
                            <div class="card-body mx-auto">
                                <h4 class="card-title text-center">Доставка</h4>
                                <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Facere,
                                    nesciunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(isset($data['type_works']))
        <section id="ourWork" class="mebels pb-4">
            <div class="container">
                <h1 class="text-center pt-5 pb-5">Наши Работы</h1>
                <div class="row">
                    @foreach($data['type_works'] as $key => $item)
                        <div class="col-sm col-md-4">
                            <div class="card mb-4 mebel-card mx-auto rounded-0">
                                <a href="{{route('works',['type' => $key], FALSE)}}" class="mebel-card__link-image">
                                    <img class="card-img-top mebel-card__image" src="{{$item['preview']}}"
                                         alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title m-0 mebel-card__title">
                                        <a href="{{route('works',['type' => $key])}}"
                                           class="mebel-card__link position-relative text-nowrap">{{$item['title']}}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if(isset($data['materials']))
        <section id="materials" class="materials pb-4">
            <div class="container">
                <h1 class="text-center pt-5 pb-5">Материалы</h1>
                <div class="row">
                    @foreach($data['materials'] as $key => $item)
                        <div class="col-sm col-md-4">
                            <div class="card mb-4 mebel-card mx-auto rounded-0">
                                <a href="{{route('materials',['material' => $key], FALSE)}}"
                                   class="mebel-card__link-image">
                                    <img class="card-img-top mebel-card__image" src="{{$item['preview']}}"
                                         alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title m-0 mebel-card__title">
                                        <a href="{{route('materials',['material' => $key])}}"
                                           class="mebel-card__link position-relative text-nowrap">{{$item['title']}}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(TRUE)
        <section id="aboutUs" class="about-us pb-5">
            <div class="container">
                <h1 class="text-center pt-5 pb-5">О нашей компании</h1>
                <div class="row">
                    <div class="col-7">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Accusamus accusantium animi aperiam cumque explicabo
                            facere molestias, pariatur praesentium quam ut.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Accusamus accusantium animi aperiam cumque explicabo
                            facere molestias, pariatur praesentium quam ut.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Accusamus accusantium animi aperiam cumque explicabo
                            facere molestias, pariatur praesentium quam ut.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Accusamus accusantium animi aperiam cumque explicabo
                            facere molestias, pariatur praesentium quam ut.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Accusamus accusantium animi aperiam cumque explicabo
                            facere molestias, pariatur praesentium quam ut.
                        </p>
                    </div>
                    <div class="col-5">
                        <div class="w-100 h-100 bg-success">
                            <span>Логотипы разных компаний</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(TRUE)
        <section id="howWeWork" class="how-work">
            <div class="container pb-5 pt-5">
                <h1 class="text-center p-4">Как мы работаем</h1>
                <div class="row">
                    <div class="col">
                        <ul class="nav flex-column text-center how-work-map">
                            <li>
                                <span class="fa-stack fa-4x mx-auto text-teal">
                                   <i class="fa fa-circle fa-stack-2x"></i>
                                   <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                </span>
                                <div class="how-work-map__desc pt-3 pl-2">
                                    <p class="text-dark font-weight-bold">Вы можете связаться с нами по телефону</p>
                                    <p class=""><i class="fa fa-mobile fa-2x" aria-hidden="true"></i> <span>+7 (978) 874-45-89</span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <span class="fa-stack fa-4x mx-auto text-teal">
                                   <i class="fa fa-circle fa-stack-2x"></i>
                                   <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                </span>
                                <div class="how-work-map__desc pt-3 pl-2">
                                    <p class="text-dark font-weight-bold">Мы приесжаем к Вам, снимаем замеры, и создаем
                                        дизайн</p>
                                </div>
                            </li>
                            <li>
                                <span class="fa-stack fa-4x mx-auto text-teal">
                                   <i class="fa fa-circle fa-stack-2x"></i>
                                   <i class="fa fa-handshake-o fa-stack-1x fa-inverse"></i>
                                </span>
                                <div class="how-work-map__desc pt-3 pl-2">
                                    <p class="text-dark font-weight-bold">Обсуждаем все условия и договаренности</p>
                                </div>
                            </li>
                            <li>
                                <span class="fa-stack fa-4x mx-auto text-teal">
                                   <i class="fa fa-circle fa-stack-2x"></i>
                                   <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
                                </span>
                                <div class="how-work-map__desc pt-3 pl-2">
                                    <p class="text-dark font-weight-bold">Доставкка и установка</p>
                                </div>
                            </li>
                            <li>
                                <span class="fa-stack fa-4x mx-auto text-teal">
                                   <i class="fa fa-circle fa-stack-2x"></i>
                                   <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
                                </span>
                                <div class="how-work-map__desc pt-3 pl-2">
                                    <p class="text-dark font-weight-bold">Вы наслаждаетесь новой мебелью</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(TRUE)
        <section id="contact" class="contact">
            <div class="container pb-5 pt-3">
                <h1 class="text-center p-4">Контакты</h1>
                <div class="row">
                    <div class="col-6">
                        <div class="bg-info mx-auto" style="height: 450px;width: 450px">Карта</div>
                    </div>
                    <div class="col-6">
                        <div class="row font-weight-bold">
                            <div class="col-6 text-right">
                                <p>Адрес:</p>
                                <p>Телефон:</p>
                                <p>Эл. Почте:</p>
                                <p>Социальный сети:</p>
                            </div>
                            <div class="col-6 text-right">
                                <p>Крым, г.Джанкой</p>
                                <p>+7(978) 587-69-36</p>
                                <p>test@group.com</p>
                                <p>vk.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection