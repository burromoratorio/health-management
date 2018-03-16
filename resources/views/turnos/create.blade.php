@extends ('layouts.master')

@section ('content')

    {!! Form::open([
        'route' => 'permisos.store'
    ]) !!}

    @include('permisos.form')

    {!! Form::close() !!}

@stop
