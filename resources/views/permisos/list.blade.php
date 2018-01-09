@extends ('layouts.master')

@section ('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ ucfirst($title) }} <small>Gestión de {{ $title }}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-toggle="tooltip" data-placement="top" title="Minimizar" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                @permission('permisos-ver')
                <li><a data-toggle="tooltip" data-placement="top" title="Recargar" class="reload" href="{{ route('permisos.index') }}">
                    <i class="fa fa-refresh"></i></a>
                </li>
                @endpermission
                @permission('permisos-crear')
                <li><a  data-toggle="tooltip" data-placement="top" title="Crear nuevo" class="new-user" href="{{ route('permisos.create') }}">
                    <i class="fa fa-plus-circle"></i></a>
                </li>
                @endpermission
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

        {!! Form::model( Request::all(), ['route'=> 'permisos.index', 'method'=>'GET', 'class'=> 'navbar-form']) !!}

            <div class="form-inline">
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
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">ID </th>
                            <th class="column-title">Nombre para Mostrar </th>
                            <th class="column-title">Rol</th>
                            <th class="column-title">Descripción</th>
                            <th class="column-title">Módulo</th>
                            <th class="column-title">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach( $registers as $key => $permiso )

                        <tr data-id="{{ $permiso->id }}">
                            <td class=" ">{{ $key + 1 }}</td>
                            <td class=" ">{{ $permiso->display_name }} </td>
                            <td class=" ">{{ $permiso->name }} </td>
                            <td class=" ">{{ $permiso->description }}</i></td>
                            <td class=" ">{{ $permiso->module->display_name }}</i></td>
                            <td class=" last">
                                @permission('permisos-editar')
                                <a data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info btn-xs" href="{{ route('permisos.edit', $permiso->id) }}"><i class="fa fa-pencil"></i></a>
                                @endpermission
                                @permission('permisos-eliminar')
                                <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-xs btn-delete" href="#!"><i class="fa fa-trash"></i></a>
                                @endpermission
                            </td>
                        </tr>

                    @endforeach

                    @permission('permisos-eliminar')
                    {!! Form::open( [ 'route' => ['permisos.destroy', ':REG_ID' ], 'method' => 'DELETE', 'id' => 'form-delete' ] ) !!}
                    {!! Form::close() !!}
                    @endpermission
                    </tbody>
                </table>
            </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <tbody>
                    <tr class="odd">
                        <td valign="top" colspan="5" class="dataTables_empty">No se encontraron {{ $title }}.</td>
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
