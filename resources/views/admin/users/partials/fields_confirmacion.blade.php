
    <div class="form-group">
        {!! Form::label('first_name', 'Nombres') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_name', 'Apellidos') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese sus apellidos']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Dirección de correo electrónico') !!}
        {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Ingrese su e-mail']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type_id', 'Rol del usuario') !!}
        {!! Form::select('type_id', $roles_options , Input::old('rol'),['class' => 'form-control']) !!}
    </div>

