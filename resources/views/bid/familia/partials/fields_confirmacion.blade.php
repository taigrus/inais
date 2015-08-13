    <div class="form-group">
        {!! Form::label('folio', 'Folio') !!}
        {!! Form::number('folio', null, array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese en número de folio',
         'disabled',
        )) !!}
    </div>
    <div class="form-group">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion', 'disabled']) !!}
    </div>
