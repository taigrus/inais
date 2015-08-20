<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, array(
     'class' => 'form-control',
     'min' => '1',
     'max' => '50',
     'disabled'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion', '02 Descripción') !!}
    {!! Form::textarea('descripcion', null,
    ['rows'=>'7',
    'class' => 'form-control mayusculas',
    'placeholder' => 'Ingrese una descripción adicional para la urbanización',
    'id' => 'descripcion',
    'disabled'
     ]) !!}
</div>