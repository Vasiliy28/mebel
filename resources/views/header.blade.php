<?php
/**
 * File header.
 */
?>
<!-- TODO:Need refactor this template -->
@if( ! request()->route()->named('admin'))
    <nav id="headerMenu" class="navbar navbar-expand-sm fixed-top sps header-menu">
        <div class="container">
            <a class="navbar-brand text-light" href="/">MebelDvD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenuNav"
                    aria-controls="navbarMenuNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenuNav">
                <menu class="nav navbar-nav header-menu__nav mt-0 text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link" href="{{request()->route()->named('home')?'':'/'}}#ourWork">Наши Работы<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{request()->route()->named('home')?'':'/'}}#materials">Материалы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{request()->route()->named('home')?'':'/'}}#aboutUs">О Нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{request()->route()->named('home')?'':'/'}}#contact">Контакты</a>
                    </li>

                </menu>
                <div class="ml-auto text-light">
                    <span class="font-weight-bold">По любым вопросам звоните</span>
                    <div class="bg-danger text-center p-1 mt-1 mb-1">
                        <i class="fa fa-volume-control-phone mr-1" aria-hidden="true"></i>
                        +7 (978) 985-78-32
                    </div>
                </div>
            </div>
        </div>
    </nav>
@else
    @yield('nav')
@endif

<header>
    @yield('header')
</header>
