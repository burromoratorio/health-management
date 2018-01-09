@extends ('layouts.master')

@section ('content')
    {!! Form::model($modulo, [
        'method' => 'PATCH',
        'route' => ['permisos.update', $modulo->id]

        ]) !!}
    @include('permisos.form')

    {!! Form::close() !!}
@stop
