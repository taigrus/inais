    <div class="form-group">
        {!! Form::label('nombre', '*01 Nombre') !!}
        {!! Form::text('nombre', null, array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese el nombre de la urbanización/zona',
         'min' => '1',
         'max' => '50',
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('descripcion', '02 Descripción') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una descripción adicional para la urbanización']) !!}
    </div>

