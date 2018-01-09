@extends ('layouts.master')

@section ('content')
    {!! Form::model($rol, [
        'method' => 'PATCH',
        'route' => ['roles.update', $rol->id]

        ]) !!}
    @include('roles.form')

    {!! Form::close() !!}
@stop
