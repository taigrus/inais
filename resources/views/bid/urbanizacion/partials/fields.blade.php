<div class="col-md-6 ">
  <div class="form-group">
      {!! Form::label('pais', '01 País') !!}
      {!! Form::select('pais', array('0' => '---Seleccione el pais---','1' => 'Bolivia'),null,[
        'class' => 'form-control select2',
        'id' => 'pais',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere el país',
        'data-parsley-min-message' => 'Debe seleccionar el país'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('departamento', '02 Departamento') !!}
      {!! Form::select('departamento', array('0' => '---Seleccione el departamento---'), null, [
        'class' => 'form-control select2',
        'id' => 'departamento',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere el departamento',
        'data-parsley-min-message' => 'Debe seleccionar el departamento'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('provincia', '03 Provincia') !!}
      {!! Form::select('provincia', array('0' => '---Seleccione la provincia---'), null, [
        'class' => 'form-control select2',
        'id' => 'provincia',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere la provincia',
        'data-parsley-min-message' => 'Debe seleccionar la provincia'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('municipio', '04 Municipio') !!}
      {!! Form::select('municipio', array('0' => '---Seleccione el municipio---'), null, [
        'class' => 'form-control select2',
        'id' => 'municipio',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere el municipio',
        'data-parsley-min-message' => 'Debe seleccionar el municipio'
        ]) !!}
  </div>
  <div class="form-group">
      {!! Form::label('poblacion', '05 Poblacion') !!}
      {!! Form::select('poblacion', array('0' => '---Seleccione la población---'), null, [
        'class' => 'form-control select2',
        'id' => 'poblacion',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere la población',
        'data-parsley-min-message' => 'Debe seleccionar la población'
        ]) !!}
  </div>
</div>

<div class="col-md-6 ">


<div class="form-group">
    {!! Form::label('distrito_id', '06 Distrito') !!}
    {!! Form::select('distrito_id', array('0' => '---Seleccione el distrito---'), null, [
      'class' => 'form-control select2',
      'id' => 'distrito',
      'data-parsley-trigger' => 'change focusout',
      'required',
      'data-parsley-type' => 'integer',
      'data-parsley-min' => '1',
      'data-parsley-required-message' => 'Se requiere el distrito',
      'data-parsley-min-message' => 'Debe seleccionar el distrito'
      ]) !!}
</div>

    <div class="form-group">
        {!! Form::label('nombre', '07 Nombre de la urbanización *') !!}
        {!! Form::text('nombre', null, [
                    'class'                         => 'form-control mayusculas',
                    'nombre'                        => 'pais',
                    'placeholder'                   => 'Ingrese el nombre de la urbanización/zona',
                    'required',
                    'id'                            => 'nombre',
                    'data-parsley-required-message' => 'Se requiere el nombre',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-pattern'          => '/^([a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ().+-+ ]{3,50})+$/',
                    'data-parsley-minlength'        => '3',
                    'data-parsley-maxlength'        => '50'
        ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descripcion', '08 Descripción para la urbanización') !!}
        {!! Form::textarea('descripcion', null,
        ['rows'=>'7',
        'class' => 'form-control mayusculas',
        'id' => 'descripcion',
        'placeholder' => 'Ingrese una descripción adicional para la urbanización',
        'id' => 'descripcion',
        'data-parsley-trigger' => 'change focusout',
        'data-parsley-minlength' => "10",
        'data-parsley-maxlength' => "250",
        'data-parsley-validation-threshold' => "10",
        'data-parsley-minlength-message' => "Vamos! al menos ingrese 10 caracteres en la descripción.."
         ]) !!}
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {


    //funcion para cargar dropdown list

    /* controlId = Nombre del dropdown a poblar
    /* urlParcial = complemento a la ruta de la funcion del controlador
    /* KeyId = ID del registro padre a Buscar, null para obtener listado total de registros
    /* textoPlaceHolder = Texto a poner como valor por defecto en el dropdown
    /* indice = valor a seleccionar en el dropdown una vez poblado
    /* estadoFinal = true para dropdown activo, false para inactivo
    */

    function cargaDropDownAlta(controlId, urlParcial, keyId, textoPlaceHolder, indice, estadoFinal){
      $('#cargando').show();
      var url;
      if (keyId != null){
        url = '/bid/obtiene' + urlParcial +'/' + keyId;
      }else {
        url = '/bid/obtiene' + urlParcial
      }
      var lista = $.post(url, function(response)
      {
        lista.success(function (){
          if(response.success)
          {
             var control = $(controlId).empty();
             $('<option/>', {
               value:'0',
               text:'---Seleccione ' + textoPlaceHolder + '---'
              }).appendTo(control);
              laRespuesta=response.respuestaJSON;
             $.each(laRespuesta, function(i, item){
              $('<option/>', {
                value:item.id,
                text:item.nombre
               }).appendTo(control);
             })
             //Limpia el control
            $("abbr.select2-search-choice-close", control.prev()).trigger("mousedown");
            //Establece el valor a mostrar en el control
             control.val(indice).trigger("change");
             //Activa o desactiva el control segun estadoFinal
             control.prop("disabled",!estadoFinal);
             $('#cargando').hide();
          } else {
            control.prop("disabled",true);
            swal("Upps, algo no esta bien!", "Error cargando la lista de provincias.", "error");
            $('#cargando').hide();
          }
        });
      },'json').fail(function (result) {
        swal("Upps, algo no esta bien!", "Error cargando la lista de " + controlId, "error");
        $('#cargando').hide();
      });
    }

    //inicializa dropdown de paises al ingresar al formulario
    cargaDropDownAlta("#pais", "listapaises", null, "el país",0, true);

    $("#pais").on("change", function (e) {
      if($("#pais").val()!=0 && $("#pais").val()!=null)
      {
        //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
        var paisId=$('#pais').val();
        cargaDropDownAlta("#departamento", "departamentospais", paisId, "el departamento",0, true);
        $("#departamento").val(0).trigger("change");
      }
      else {
        $("abbr.select2-search-choice-close", $("#departamento").prev()).trigger("mousedown");
        $("#departamento").val(0).trigger("change");
        $("#departamento").prop("disabled",true);
      }
    });

    $("#departamento").on("change", function (e) {
      if($("#departamento").val()!=0 && $("#departamento").val()!=null)
      {
        //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
        var departamentoId=$('#departamento').val();
        cargaDropDownAlta("#provincia", "provinciasdepartamento", departamentoId, "la provincia",0, true);
        $("#provincia").val(0).trigger("change");
      }
      else {
        $("abbr.select2-search-choice-close", $("#provincia").prev()).trigger("mousedown");
        $("#provincia").val(0).trigger("change");
        $("#provincia").prop("disabled",true);
      }
    });

    $("#provincia").on("change", function (e) {
      if($("#provincia").val()!=0 && $("#provincia").val()!=null)
      {
        //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
        var provinciaId=$('#provincia').val();
        cargaDropDownAlta("#municipio", "municipiosprovincia", provinciaId, "el municipio",0, true);

        $("#municipio").val(0).trigger("change");
      }
      else {
        $("abbr.select2-search-choice-close", $("#municipio").prev()).trigger("mousedown");
        $("#municipio").val(0).trigger("change");
        $("#municipio").prop("disabled",true);
      }
    })

    $("#municipio").on("change", function (e) {
      if($("#municipio").val()!=0 && $("#municipio").val()!=null)
      {
        //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
        var municipioId=$('#municipio').val();
        cargaDropDownAlta("#poblacion", "poblacionesmunicipio", municipioId, "la población",0, true);

        $("#poblacion").val(0).trigger("change");
      }
      else {
        $("abbr.select2-search-choice-close", $("#poblacionEdicion").prev()).trigger("mousedown");
        $("#poblacion").val(0).trigger("change");
        $("#poblacion").prop("disabled",true);
      }
    })

    $("#poblacion").on("change", function (e) {
      if($("#poblacion").val()!=0 && $("#poblacion").val()!=null)
      {
        //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
        var poblacionId=$('#poblacion').val();
        cargaDropDownAlta("#distrito", "distritospoblacion", poblacionId, "el distrito",0, true);

        $("#distrito").val(0).trigger("change");
      }
      else {
        $("abbr.select2-search-choice-close", $("#distrito").prev()).trigger("mousedown");
        $("#distrito").val(0).trigger("change");
        $("#distrito").prop("disabled",true);
      }
    });

    
  });
</script>
