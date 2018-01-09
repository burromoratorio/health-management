<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/home') }}" class="site_title img-app"></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">

                <img src="{{ ( is_null( $currentUser['pic'] ) ? url('img/no-profile-img.jpg') : url('img/uploads/'. $currentUser['pic'] ) ) }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ $currentUser['name'] }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <!-- menu section -->
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home </span></a>
                    </li>

                @permission('crud-ver')
                {{-- @if ( Auth::user()->hasRole('super-user') ) --}}
                    <li>
                        <a><i class="fa fa-cog"></i>Configuración<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url( 'roles' ) }}"><i class="fa fa-list-alt"></i>Roles</span></a></li>
                            <li><a href="{{ url( 'modulos' ) }}"><i class="fa fa-cubes"></i>Modulos</span></a></li>
                            <li><a href="{{ url( 'permisos' ) }}"><i class="fa fa-lock"></i>Permisos</span></a></li>
                            <li><a href="{{ url( 'seguridad' ) }}"><i class="fa fa-shield"></i>Seguridad</span></a></li>
                        </ul>
                    </li>
                @endpermission

                @permission('tnt-gestion-ver')
                    <li>
                        <a><i class="fa fa-cogs"></i>Gestión<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url( 'usuarios' ) }}"><i class="fa fa-user"></i>Usuarios</span></a></li>
                            <li><a href="{{ url( 'productos' ) }}"><i class="fa fa-archive"></i>Productos</span></a></li>
                            <li><a href="{{ url( 'waypoints/customer' ) }}"><i class="fa fa-map-marker"></i>Waypoints</span></a></li>
                            {{-- <li><a href="{{ url( 'rutas' ) }}"><i class="fa fa-road"></i>Rutas</span></a></li> --}}
                        </ul>
                    </li>
                @endpermission

                @permission('tnt-logistica-ver')
                    <li><a><i class="fa fa-truck"></i>Logística<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        @permission('tnt-lotes-ver')
                            <li><a href="{{ url( 'lotes' ) }}"><i class="fa fa-th"></i>Lotes</span></a></li>
                        @endpermission
                            <li><a href="{{ url( 'ordenes' ) }}"><i class="fa fa-clipboard"></i>Órdenes</span></a></li>
                            <li><a href="{{ url( 'deliveries' ) }}"><i class="fa fa-shopping-cart"></i>Deliveries</span></a></li>
                            <li><a href="{{ url( 'tracking' ) }}"><i class="fa fa-map-o"></i>Tracking</span></a></li>
                            <li><a href="{{ url( 'reports' ) }}"><i class="fa fa-bar-chart"></i>Reportes</span></a></li>
                            {{-- <li><a href="{{ url( 'mapa' ) }}"><i class="fa fa-globe"></i>Mapa</span></a></li> --}}
                        </ul>
                    </li>
                @endpermission

                    <!-- /menu profile quick info -->
                </ul>
            </div>
            <!-- /menu section -->

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            {{-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a> --}}
        </div>
        <!-- /menu footer buttons -->

    </div>
</div>
