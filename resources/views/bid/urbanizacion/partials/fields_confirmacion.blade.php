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
    {!! Form::label('descripcion', 'Descripción') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'disabled']) !!}
</div>