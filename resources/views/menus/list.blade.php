@extends ('layouts.master')

@section ('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ ucfirst($title) }} <small>Gestión de {{ $title }}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-toggle="tooltip" data-placement="top" title="Minimizar" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li><a data-toggle="tooltip" data-placement="top" title="Recargar" class="reload" href="{{ route('menus.index') }}">
                    <i class="fa fa-refresh"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

        {!! Form::model( Request::all(), ['route'=> 'menus.store', 'method'=>'POST', 'class'=> 'navbar-form']) !!}
            <div class="form-inline">
                <div class="form-group">
                    <label for="optRol">Módulo</label>
                    {!! Form::select( 'optModulo', $optModulos, old('optModulo'), ['class'=>'form-control', 'placeholder' => 'Seleccione un Módulo']) !!}
                </div>
                <div class="form-group">
                    <label for="optModulo">Anidar en:</label>
                    {!! Form::select( 'optMenu', $optMenu, old('optMenu'), ['class'=>'form-control', 'placeholder' => 'Seleccione un Menú']) !!}
                </div>

                <button type="submit" class="btn btn-info btn-sm pull-right">Agregar</button>

            </div>
         {!! Form::close() !!}

        </div>
    </div>
</div>

@stop

@push('scripts')
<script>

</script>
@endpush
