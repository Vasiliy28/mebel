@if(request()->route()->named('home'))
    <main role="main" data-spy="scroll" data-target="#headerMenu" data-offset="0">
        @yield('content')
    </main>
@else
    <main role="main" class="container">
        <div class="row mt-3">
            @yield('content')
            @yield('sidebar')
        </div>
    </main>
@endif