@extends ('layouts.master')

@section ('content')

    {!! Form::open([
        'route' => 'usuarios.store'
    ]) !!}

    @include('usuarios.form')

    {!! Form::close() !!}

@stop
