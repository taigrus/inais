    <div class="form-group">
        {!! Form::label('full_name', 'Nombre y apellido') !!}
        {!! Form::text('full_name', null, ['class' => 'form-control ', 'placeholder' => 'Ingrese su nombre', 'disabled']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Dirección de correo electrónico') !!}
        {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Ingrese su e-mail', 'disabled']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type_id', 'Rol del usuario') !!}
        {!! Form::select('type_id', $roles_options , Input::old('rol'),['class' => 'form-control', 'disabled']) !!}
    </div>