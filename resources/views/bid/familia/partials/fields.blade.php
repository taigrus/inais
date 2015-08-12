<div class="col-md-6 ">

    <div class="form-group">
        {!! Form::label('folio', '01 Folio') !!}
        {!! Form::number('folio', null, array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese el número de folio',
         'min' => '1',
         'max' => '9999999999',
         'step' => 'any',
         'decimals' => '0',
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('facilitador_id', '02 Facilitador') !!}
        {!! Form::select('facilitador_id', $facilitador_options , Input::old('facilitador'),['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('distrito_id', '03 Distrito') !!}
        {!! Form::select('distrito_id', $distrito_options , Input::old('distrito'),['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('urbanizacion_id', '04 Urbanización') !!}
        {!! Form::select('urbanizacion_id', $urbanizacion_options , Input::old('urbanizacion'),['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('via_id', '05 Tipo de via') !!}
        {!! Form::select('via_id', $via_options , Input::old('via'),['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('direccion', '06 Direccion') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('numero_puerta', '07 Número de la puerta del hogar') !!}
        {!! Form::text('numero_puerta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de la puerta del hogar']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('otras_referencias', '08 Otras referencias útiles para ubicar el hogar') !!}
        {!! Form::text('otras_referencias', null, ['class' => 'form-control', 'placeholder' => 'Registre algunas referencias que ayuden a ubicar el hogar']) !!}
    </div>

</div>

<div class="col-md-6 ">

    <div class="form-group">
        {!! Form::label('nombre_jefe_hogar', '09 Nombre del jefe(a) del hogar') !!}
        {!! Form::text('nombre_jefe_hogar', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre completo del o la jefa de hogar']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', '10 Teléfono principal') !!}
        {!! Form::number('telefono', null, array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese el número de teléfono principal',
         'min' => '2000000',
         'max' => '79999999',
         'step' => 'any',
         'decimals' => '0',
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('alcantarillado_id', '11 Estado del alcantarillado') !!}
        {!! Form::select('alcantarillado_id', $alcantarillado_options , Input::old('alcantarillado'),['class' => 'form-control']) !!}
    </div>

     <div class="form-group">
         {!! Form::label('fecha_encuesta_lb', '12 Fecha en la que se encuestó el hogar') !!}
         <div class='input-group date' id='datetimepicker1'>
            {!! Form::text('fecha_encuesta_lb', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de encuesta']) !!}
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
         </div>
     </div>
     <script type="text/javascript">
           $(function () {
              $('#datetimepicker1').datetimepicker({
                  maxDate: moment(),
                  minDate: moment().subtract(5, 'years'),
                  locale: 'es',
                  format: 'L'
              });
           });
     </script>

    <div class="form-group">
        {!! Form::label('latitud', '13 Latitud de la vivienda') !!}
        {!! Form::number('latitud',null,array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese la latitud en grados decimales',
         'min' => '-99.00000000',
         'max' => '99.9999999',
         'step' => 'any',
         'decimals' => '8',
         'thousands_separator' => ',',
         'decimal_separator' => '.'
         )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('longitud', '14 Longitud de la vivienda') !!}
        {!! Form::number('longitud',null,array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese la longitud en grados decimales',
         'min' => '-99.00000000',
         'max' => '99.9999999',
         'step' => 'any',
         'decimals' => '8',
         'thousands_separator' => ',',
         'decimal_separator' => '.'
         )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('altura', '15 Altura de la vivienda') !!}
        {!! Form::number('altura',null,array(
         'class' => 'form-control',
         'placeholder' => 'Ingrese la altura en metros',
         'min' => '0',
         'max' => '4500',
         'step' => 'any',
         'decimals' => '0',
         'thousands_separator' => ',',
         'decimal_separator' => '.'
         )) !!}
    </div>
 </div>