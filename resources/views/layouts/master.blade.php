<!DOCTYPE html>
<html lang="es-ar">
<head>
@include('layouts.head')
</head>
<body class="nav-md">  <!-- nav-sm para menu contraido, nav-md para menú desplegado -->
    <noscript>
        <div class="warning-message">Este sitio requiere javascript para su correcto funcionamiento</div>
    </noscript>

    <div class="container body">
        <div class="main_container">

            <!-- Side Menu -->
            @include('layouts.side_menu')
            <!-- Side Menu -->

            <!-- top navigation -->
            @include('layouts.top_navigation')
            <!-- /top navigation -->

            <!-- central section -->
            <div class="right_col" role="main">
              <div class="">

                <div class="clearfix"></div>

                <div class="row">

                    @if(isset($errors) && count($errors) > 0)
                        @include('layouts.errors')
                    @endif

                    @if(Session::has('message'))
                        @include('layouts.message')
                    @endif

                    <!-- main content -->
                    @yield('content')
                    <!-- /main content -->
                </div>

              </div>
            </div>
            <!-- /central section -->

            <!-- footer content -->
            @include('layouts.footer')
            <!-- /footer content -->
        </div>
    </div>

    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>
