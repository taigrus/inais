<div class="col-md-6 ">
    <div class="form-group">
        {!! Form::label('folio', 'Folio') !!}
        {!! Form::number('folio', null, array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese en número de folio',
         'min' => '1000000000',
         'max' => '9999999999',
         'step' => 'any',
         'decimals' => '0',
        )) !!}
    </div>
    <div class="form-group">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('latitud', 'Latitud de la vivienda') !!}
        {!! Form::number('latitud',null,array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese la latitud',
         'min' => '-99.00000000',
         'max' => '99.9999999',
         'step' => 'any',
         'decimals' => '8',
         'thousands_separator' => ',',
         'decimal_separator' => '.'
         )) !!}
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        {!! Form::label('longitud', 'longitud de la vivienda') !!}
        {!! Form::number('longitud',null,array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese la longitud',
         'min' => '-99.00000000',
         'max' => '99.9999999',
         'step' => 'any',
         'decimals' => '8',
         'thousands_separator' => ',',
         'decimal_separator' => '.'
         )) !!}
    </div>
    <div class="form-group">
        {!! Form::label('altura', 'altura de la vivienda') !!}
        {!! Form::number('altura',null,array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese la altura',
         'min' => '0',
         'max' => '4500',
         'step' => 'any',
         'decimals' => '0',
         'thousands_separator' => ',',
         'decimal_separator' => '.'
         )) !!}
    </div>
 </div>