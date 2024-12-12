<!DOCTYPE html>
<html>

@include('includes.header')


<body>
    <div id="wrapper">

        @include('includes.sidenav')

        <div id="page-wrapper" class="gray-bg">
            @include('includes.nav')
            <div class="wrapper wrapper-content">
                @yield('content')
            </div>
            @include('includes.footer')
        </div>

        @include('includes.rsidenav')
    </div>

    @include('includes.js')
</body>

</html>
