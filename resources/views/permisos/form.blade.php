<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ ucfirst($title) }} <small>Formulario de {{ $description }}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-toggle="tooltip" data-placement="top" title="Volver" href="{{ route('permisos.index') }}"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <div data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                    {!! Form::InputSelectGentelella('Módulo', 'modulo_id', $optModulos, 0, 'Seleccione un Módulo' ) !!}
                </div>

                <div class="form-group">
                    {!! Form::InputTextGentelella('Nombre', 'name' ) !!}
                </div>

                <div class="form-group">
                    {!! Form::InputTextGentelella('Nombre para Mostrar', 'display_name' ) !!}
                </div>

                <div class="form-group">
                    {!! Form::TextAreaGentelella('Descripción', 'description' ) !!}
                </div>

                <div class="ln_solid"></div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="{{ route('permisos.index') }}">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$('select[name=modulo_id] option[value="{{ (isset($module_selected) ? $module_selected : '' ) }}"]').attr("selected",true);
</script>
@endpush
