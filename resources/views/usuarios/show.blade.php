@extends ('layouts.master')

@section ('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detalle de Usuario <small>Visualización de los datos del usuario</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                @permission('usuarios-ver')
                <li>
                    <a data-toggle="tooltip" data-placement="top" title="Volver" href="{{ route('usuarios.index') }}"><i class="fa fa-close"></i></a>
                </li>
                <li>
                    <a data-toggle="tooltip" data-placement="top" title="Recargar" class="reload" href="{{ route('usuarios.show', $usuario->id) }}">
                    <i class="fa fa-refresh"></i></a>
                </li>
                @endpermission
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12 profile_left">

                <h3>{{ $usuario->name }}</h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-user"></i> {{ $usuario->username }}</li>
                    <li><i class="fa fa-envelope"></i> {{ $usuario->email }}</li>
                </ul>

                <br />
                <!-- start roles -->
                <h4>Roles Asignados</h4>
                <ul class="list-unstyled user_data">
                    @if(!empty($usuarioRole))
                        @foreach($usuario->roles as $v)
                            <li><label class="label label-success">{{ $v->display_name }}</label></li>
                        @endforeach
                    @else
                    <label class="label label-warning">Sin roles asignados</label>
                    @endif

                </ul>
                <!-- end of roles -->

                <br/>
                <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fa fa-pencil"></i> Editar</a>

            </div>

        </div>

    </div>
</div>

@endsection
