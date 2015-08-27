
<div class="col-md-6 ">

    <div class="form-group">
        {!! Form::label('folio', '01 Folio') !!}
        {!! Form::number('folio', null, array(
         'class' => 'form-control folio',
         'placeholder' => 'Ingrese el número de folio',
         'required',
         'data-parsley-required-message' => 'Se requiere el número de folio',
         'data-parsley-trigger'          => 'change focusout',
         'data-parsley-pattern'          => '/^([0-9]{1,15})+$/',
         'data-parsley-minlength'        => '1',
         'data-parsley-maxlength'        => '15',
         'id' => 'folio'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('facilitador_id', '02 Facilitador') !!}
        {!! Form::select('facilitador_id', $facilitador_options ,
          Input::old('facilitador'),
          ['class' => 'form-control select2',
           'id' => 'facilitador',
           'data-parsley-trigger' => 'change focusout',
           'required'
          ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('distrito_id', '03 Distrito') !!}
        {!! Form::select('distrito_id', $distrito_options ,
          Input::old('distrito'),[
          'class' => 'form-control select2',
          'id' => 'distrito',
          'data-parsley-trigger' => 'change focusout',
          'required'
          ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('urbanizacion_id', '04 Urbanización') !!}
        <div class='input-group'>
            {!! Form::select('urbanizacion_id',
               $urbanizacion_options,
               Input::old('urbanizacion'),[
                 'class' => 'form-control select2',
                 'id' => 'urbanizacion',
                 'required',
                 'data-parsley-trigger' => 'change focusout'
                 ]) !!}
            <a href="#"
               data-toggle="modal"
               data-target="#modalurbanizacion"
               class="boton-nuevaurbajax input-group-addon">
                   <span class="glyphicon glyphicon-hand-left"></span>
            </a>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('via_id', '05 Tipo de via') !!}
        {!! Form::select('via_id', $via_options ,
          Input::old('via'),
          ['class' => 'form-control select2',
          'id' => 'via',
          'required',
          'data-parsley-trigger' => 'change focusout'
          ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('direccion', '06 Direccion') !!}
        {!! Form::text('direccion', null, [
          'class' => 'form-control mayusculas',
          'required',
          'placeholder' => 'Ingrese la direccion',
          'data-parsley-trigger' => 'change focusout',
          'data-parsley-minlength' => "5",
          'data-parsley-maxlength' => "100",
          'data-parsley-validation-threshold' => "5",
          'data-parsley-minlength-message' => "Vamos! al menos ingrese 5 caracteres en la dirección.."]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('numero_puerta', '07 Número de la puerta del hogar') !!}
        {!! Form::text('numero_puerta', null, [
          'class' => 'form-control',
          'placeholder' => 'Ingrese el número de la puerta del hogar',
          'required',
          'data-parsley-trigger' => 'change focusout',
          'data-parsley-minlength' => "1",
          'data-parsley-maxlength' => "6",
          'data-parsley-minlength-message' => "El numero de puerta deb etener al menos un caracter.."
          ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('otras_referencias', '08 Otras referencias útiles para ubicar el hogar') !!}
        {!! Form::text('otras_referencias', null, [
          'class' => 'form-control mayusculas',
          'placeholder' => 'Registre algunas referencias que ayuden a ubicar el hogar',
          'data-parsley-trigger' => 'change focusout',
          'data-parsley-minlength' => "10",
          'data-parsley-maxlength' => "250",
          'data-parsley-validation-threshold' => "10",
          'data-parsley-minlength-message' => "Vamos! al menos ingrese 10 caracteres para las referencias.."
          ]) !!}
    </div>

</div>

<div class="col-md-6 ">
    <div class="form-group">
        {!! Form::label('nombre_jefe_hogar', '09 Nombre del jefe(a) del hogar') !!}
        {!! Form::text('nombre_jefe_hogar', null, [
          'class' => 'form-control mayusculas',
          'placeholder' => 'Ingrese el nombre completo del o la jefa de hogar',
          'required',
          'data-parsley-pattern' => '/^([a-zA-ZñÑáéíóúÁÉÍÓÚ.+ ])+$/',
          'data-parsley-pattern-message' => "No se permiten números en el nombre",
          'data-parsley-trigger' => 'change focusout',
          'data-parsley-minlength' => "3",
          'data-parsley-maxlength' => "100",
          'data-parsley-validation-threshold' => "3",
          'data-parsley-minlength-message' => "Se deben escribir al menos 3 caracteres en el nombre de jefe(a) de hogar."
          ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', '10 Teléfono principal') !!}
        {!! Form::text('telefono', null, array(
         'class' => 'form-control entero',
         'placeholder' => 'Ingrese el teléfono principal de la vivienda',
         'data-parsley-type' => 'integer',
         'data-parsley-trigger' => 'change focusout',
         'data-parsley-minlength' => "7",
         'data-parsley-maxlength' => "8",
         'data-parsley-min' => '2000000',
         'data-parsley-validation-threshold' => "2",
         'data-parsley-minlength-message' => "Se debe escribir un número de teléfono valido."
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('alcantarillado_id', '11 Estado del alcantarillado') !!}
        {!! Form::select('alcantarillado_id', $alcantarillado_options , Input::old('alcantarillado'),
          ['class' => 'form-control select2',
           'id' => 'alcantarillado',
           'required',
           'data-parsley-trigger' => 'change focusout'
           ]) !!}
    </div>

     <div class="form-group">
         {!! Form::label('fecha_encuesta_lb', '12 Fecha en la que se encuestó el hogar') !!}
         <div class='input-group date' id='datetimepicker1'>
            {!! Form::text('fecha_encuesta_lb', null, [
              'class' => 'form-control',
              'placeholder' => 'Ingrese la fecha de encuesta'
              ]) !!}
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
        {!! Form::text('latitud',null,array(
         'class' => 'form-control flotante',
         'placeholder' => 'Ingrese la latitud en grados decimales',
         'data-parsley-trigger' => 'change focusout',
         'data-parsley-type' => 'number',
         'data-parsley-min' => '-20.999999',
         'data-parsley-max' => '-10.000000',
         'data-parsley-minlength' => "3",
         'data-parsley-maxlength' => "10"
         )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('longitud', '14 Longitud de la vivienda') !!}
        {!! Form::text('longitud',null,array(
         'class' => 'form-control flotante',
         'placeholder' => 'Ingrese la longitud en grados decimales',
         'data-parsley-trigger' => 'change focusout',
         'data-parsley-type' => 'number',
         'data-parsley-min' => '-70.999999',
         'data-parsley-max' => '-65.000000',
         'data-parsley-minlength' => "2",
         'data-parsley-maxlength' => "10"
         )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('altura', '15 Altura de la vivienda') !!}
        {!! Form::text('altura',null,array(
         'class' => 'form-control caracteres',
         'placeholder' => 'Ingrese la longitud en grados decimales',
         'data-parsley-trigger' => 'change focusout',
         'data-parsley-type' => 'integer',
         'data-parsley-range' => "[2800,4800]",
         'data-parsley-minlength' => "4",
         'data-parsley-maxlength' => "4",
         'data-parsley-pattern'   => '/^([0-9]{1,4})+$/'

         )) !!}
    </div>
 </div>

<script>
    $(document).ready(function() {
        $( "#facilitador" ).select2( { allowClear: true, placeholder: 'seleccione el facilitador' } );
        $( "#distrito" ).select2( { allowClear: true, placeholder: 'seleccione el distrito' } )
        $( "#urbanizacion" ).select2( { allowClear: true, placeholder: 'seleccione la urbanización' } )
        $( "#via" ).select2( { allowClear: true, placeholder: 'seleccione el tipo de via del hogar' } )
        $( "#alcantarillado" ).select2( { allowClear: true, placeholder: 'seleccione el estado de alcantarillado' } )
        $('.entero').numeric({decimalPlaces : 0});
        $('.entero').numeric({negative : false});
        $('.entero').mask("00000000");
        $('.caracteres').numeric({decimalPlaces : 0});
        $('.caracteres').numeric({negative : false});
        $('.caracteres').mask("0000");
        $('.folio').mask("0000000000");
        $('.folio').numeric({negative: false});
        $(".flotante").numeric({ decimal : "." , decimalPlaces :6, negative : true });
        $('.flotante').mask('-0ZZ.0ZZZZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9-]/, optional: true
                }
            }});
        $('#folio').focus();
    });
</script>
