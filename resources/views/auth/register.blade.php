@extends('layout')

@section('content')

    <div class="container">
        @include('partials.messages')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de usuarios nuevos</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'register', 'class' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre', trans('validation.attributes.first_name')) !!}
                            {!! Form::input('text', 'first_name', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('apellidos', trans('validation.attributes.last_name')) !!}
                            {!! Form::input('text', 'last_name', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', trans('validation.attributes.email')) !!}
                            {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', trans('validation.attributes.password')) !!}
                            {!! Form::password('password', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation','Contraseña otra ves') !!}
                            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="btn-group">
                            {!! Form::submit('Registrar',['class' => 'btn btn-default btn-primary']) !!}
                            {!! Form::reset('Limpiar',['class' => 'btn btn-default']) !!}
                            <a href={{ url('/homebid') }} class="btn btn-default">Cancelar</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection