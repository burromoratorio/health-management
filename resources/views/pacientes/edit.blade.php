@extends ('layouts.master')

@section ('content')
    {!! Form::model($usuario, [
        'method' => 'PATCH',
        'route' => ['usuarios.update', $usuario->id]

        ]) !!}
    @include('usuarios.form')

    {!! Form::close() !!}
@stop
