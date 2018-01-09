<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ ucfirst($title) }} <small>Formulario de {{ $description }}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-toggle="tooltip" data-placement="top" title="Volver" href="{{ route('usuarios.index') }}"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <div data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                    {!! Form::InputTextGentelella('Nombre Completo', 'name' ) !!}
                </div>

                <div class="form-group">
                    {!! Form::InputTextGentelella('Username', 'username' ) !!}
                </div>

                <div class="form-group">
                    {!! Form::InputTextGentelella('Email', 'email') !!}
                </div>

            @if( Auth::user()->hasRole( 'super-user' ) )
                <div class="form-group">
                    {!! Form::InputSelectGentelella('Cliente', 'cliente_id', $optClientes, ( isset($usuario) ? $usuario->cliente_id : '' ), 'Seleccione un Cliente' ) !!}
                </div>
            @else
                <input type="hidden" name="cliente_id" value="{{ Auth::user()->cliente_id }}">
            @endif

                <div class="form-group">
                    {!! Form::InputPassGentelella('Password', 'password') !!}
                </div>

                <div class="form-group">
                    {!! Form::InputPassGentelella('Confirme Password', 'confirm-password') !!}
                </div>

            @if ( Auth::user()->hasRole( 'super-user' ) || Auth::user()->hasRole( 'administrator' ) )

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="roles">
                        Roles
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('roles[]', $roles, $usuarioRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>

            @endif

                <div class="ln_solid"></div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="{{ route('usuarios.index') }}">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>

</script>
@endpush
