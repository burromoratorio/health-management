@extends ('layouts.master')

@section ('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ ucfirst($title) }} <small>Gestión de {{ $title }}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-toggle="tooltip" data-placement="top" title="Minimizar" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li><a data-toggle="tooltip" data-placement="top" title="Recargar" class="reload" href="{{ route('seguridad.index') }}">
                    <i class="fa fa-refresh"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

        {!! Form::model( Request::all(), ['route'=> 'seguridad.index', 'method'=>'GET', 'class'=> 'navbar-form']) !!}
            <div class="form-inline">
                <div class="form-group">
                    <label for="optRol">Rol</label>
                    {!! Form::select( 'optRol', $optRol, old('optRol'), ['class'=>'form-control', 'placeholder' => 'Seleccione un Rol']) !!}
                </div>
                <div class="form-group">
                    <label for="optModulo">Módulo</label>
                    {!! Form::select( 'optModulo', $optModulos, old('optModulo'), ['class'=>'form-control', 'placeholder' => 'Seleccione un Módulo']) !!}
                </div>

                <button type="submit" class="btn btn-info btn-sm pull-right">Buscar</button>

            </div>
         {!! Form::close() !!}

        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
    @if ( $total > 0 )

        {!! Form::open([
            'route' => 'seguridad.create'
        ]) !!}
            <input type="hidden" name="role" value="{{ $RolSelected }}">
            <input type="hidden" name="module" value="{{ $ModuloSelected }}">

            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">Permiso</th>
                            <th class="column-title">Acción</th>
                            <th class="column-title">Descripción</th>
                            <th class="column-title">Módulo</th>
                            <th class="column-title">Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($registers as $permiso)
                        <tr>
                            <td class=" ">{{ $permiso->display_name }}</td>
                            <td>{{ $permiso->name }}</td>
                            <td><small>{{ $permiso->description }}</small></td>
                            <td class=" ">{{ $permiso->module->display_name }}</td>
                            <td class=" last">
                                  <label>
                                      <input type="checkbox" name="permiso_id_{{$permiso->id}}" class="js-switch" {{ ( is_null($permiso->role_id) ? '' : 'checked' ) }} />
                                  </label>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
            </div>

        {!! Form::close() !!}

    @else
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <tbody>
                    <tr class="odd">
                        <td valign="top" colspan="5" class="dataTables_empty">No se encontraron registros.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
        </div>
    </div>
</div>

@stop

@push('scripts')
<script>

</script>
@endpush
