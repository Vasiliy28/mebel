@if(request()->route()->named('home'))
    <main role="main" data-spy="scroll" data-target="#headerMenu" data-offset="0">
        @yield('content')
    </main>
@elseif(request()->route()->named('admin'))
    <main role="main" class="container-fluid no-gutters">
        <div class="row">
            @yield('sidebar')
            @yield('content')
        </div>
    </main>
@else
    <main role="main" class="container">
        <div class="row mt-3">
            @yield('content')
            @yield('sidebar')
        </div>
    </main>
@endif