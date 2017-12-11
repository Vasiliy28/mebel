
        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mebel</title>

    <!-- Styles -->
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


</head>
<body>
<div class="conteiner-fluid">
    <div class="row no-gutters">
        <div class="col-2 bg-dark min-h-100vh">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <ul class="nav navbar-nav navbar-light flex-column">
                    @foreach($nav_items as $item)
                        <li class="nav-item">
                            <a class="nav-link {{request()->route()->named($item['route'])? 'active': ''}}"
                               href="{{route($item['route'])}}"
                            >
                                {{$item['title']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="col">
            @yield('main')
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
