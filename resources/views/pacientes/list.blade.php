@extends ('layouts.master')

@section ('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ ucfirst($title) }} <small>Gestión de {{ $title }}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-toggle="tooltip" data-placement="top" title="Minimizar" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                @permission('usuarios-ver')
                <li><a data-toggle="tooltip" data-placement="top" title="Recargar" class="reload" href="{{ route('usuarios.index') }}">
                    <i class="fa fa-refresh"></i></a>
                </li>
                @endpermission
                @permission('pacientes-crear')
                <li>
                    <a data-toggle="tooltip" data-placement="top" title="Crear nuevo" class="new-user" href="{{ route('usuarios.create') }}">
                    <i class="fa fa-plus-circle"></i></a>
                </li>
                @endpermission
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">ID </th>
                            <th class="column-title">Nombre </th>
                            <th class="column-title">Alias </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if ( $total > 0 )
                        @foreach($registers as $key => $user)

                        <tr data-id="{{ $user->id }}">
                            <td class=" ">{{ $key + 1 }}</td>
                            <td class=" ">{{ $user->name }} </td>
                            <td class=" ">{{ $user->username}}</i></td>
                            <td class=" ">{{ $user->email}}</td>
                            <td class=" last">
                                @permission('usuarios-ver')
                                <a data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-info btn-xs" href="{{ route('usuarios.show', $user->id) }}"><i class="fa fa-search"></i></a>
                                @endpermission
                                @permission('usuarios-editar')
                                <a data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info btn-xs" href="{{ route('usuarios.edit', $user->id) }}"><i class="fa fa-pencil"></i></a>
                                @endpermission
                                @permission('usuarios-eliminar')
                                <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-xs btn-delete" href="#!"><i class="fa fa-trash"></i></a>
                                @endpermission
                            </td>
                        </tr>
                        @endforeach

                        @permission('usuarios-eliminar')
                        {!! Form::open( [ 'route' => ['usuarios.destroy', ':REG_ID' ], 'method' => 'DELETE', 'id' => 'form-delete' ] ) !!}
                        {!! Form::close() !!}
                        @endpermission
                    </tbody>
                    @else
                        <tr class="odd pointer">
                            <td valign="top" colspan="6" class="dataTables_empty">No se encontraron usuarios.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script>

</script>
@endpush
