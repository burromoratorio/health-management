@extends ('layouts.master')

@section ('content')

    {!! Form::open([
        'route' => 'roles.store'
    ]) !!}

    @include('roles.form')

    {!! Form::close() !!}

@stop
