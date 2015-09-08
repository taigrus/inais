<div class="col-md-6 ">
  <div class="form-group">
      {!! Form::label('pais', '01 País') !!}
      {!! Form::select('pais', array('0' => '---Seleccione el pais---','1' => 'Bolivia'),null,[
        'class' => 'form-control select2',
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
        //$('.select2-container').selec2('val','');


        $( "#pais" ).select2( { allowClear: true, placeholder: 'seleccione su país', } );
        $( "#departamento" ).select2( { disabled: true, allowClear: true, placeholder: 'seleccione el departamento' } );
        $( "#provincia" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );
        $( "#municipio" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );
        $( "#poblacion" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );
        $( "#distrito_id" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );
        $("#departamento").prop("disabled",true);
        $("#provincia").prop("disabled",true);
        $("#municipio").prop("disabled",true);
        $("#poblacion").prop("disabled",true);
        $("#distrito_id").prop("disabled",true);

        //controla cambio de pais para activar departamento
        $("#pais").on("change", function (e) {
          if($("#pais").val()!=0 && $("#pais").val()!=null)
          {
            //se obtiene valor seleccionado en $('#pais').val();
            $("abbr.select2-search-choice-close", $("#departamento").prev()).trigger("mousedown");
            var paisId=$('#pais').val();
            //Se actualiza via AJAX el select con las nuevas urbanizaciones
            //envio AJAX
             var listaDepartamentos = $.post('/bid/obtienedepartamentospais/' + paisId, function(response)
             {
               listaDepartamentos.success(function (){
                 if(response.success)
                 {
                    var branchName = $('#departamento').empty();
                    $('<option/>', {
                      value:'0',
                      text:'---Seleccione el departamento---'
                     }).appendTo(branchName);
                    $.each(response.respuestaJSON, function(i, departamento){
                     $('<option/>', {
                       value:departamento.id,
                       text:departamento.nombre
                      }).appendTo(branchName);
                    })
                    $("#departamento").prop("disabled",false);
                    //console.log($("#departamento").val());
                    $("#departamento").val('0');
                 } else {
                   $("#departamento").prop("disabled",true);
                   swal("Upps, algo no esta bien!", "Error cargando la lista de departamentos.", "error");
                   $('#cargando').hide();
                 }
               });

           },'json').fail(function (result) {
             //pone en nulo el control select
             $("#departamento").prop("disabled",true);
             swal("Upps, algo no esta bien!", "Error cargando la lista de departamentos.", "error");
             $('#cargando').hide();
           });
         }
           else {
             $("abbr.select2-search-choice-close", $("#departamento").prev()).trigger("mousedown");
             $("#departamento").prop("disabled",true);
           }
      });

      $("#departamento").on("change", function (e) {
        if($("#departamento").val()!=0 && $("#departamento").val()!=null)
        {
          $("abbr.select2-search-choice-close", $("#provincia").prev()).trigger("mousedown");
          var departamentoId=$('#departamento').val();
          //Se actualiza via AJAX el select con las nuevas provincias
          //envio AJAX
           var listaProvincias = $.post('/bid/obtieneprovinciasdepartamento/' + departamentoId, function(response)
           {
             listaProvincias.success(function (){
               if(response.success)
               {
                  var branchName = $('#provincia').empty();
                  $('<option/>', {
                    value:'0',
                    text:'---Seleccione la provincia---'
                   }).appendTo(branchName);
                  $.each(response.respuestaJSON, function(i, provincia){
                   $('<option/>', {
                     value:provincia.id,
                     text:provincia.nombre
                    }).appendTo(branchName);
                  })
                  $("#provincia").prop("disabled",false);
                  //console.log($("#departamento").val());
                  $("#provincia").val('0');
                  $("abbr.select2-search-choice-close", $("#provincia").prev()).trigger("mousedown");
               } else {
                 $("#provincia").prop("disabled",true);
                 swal("Upps, algo no esta bien!", "Error cargando la lista de provincias.", "error");
                 $('#cargando').hide();
               }
             });

         },'json').fail(function (result) {
           //pone en nulo el control select
           $("#provincia").prop("disabled",true);
           swal("Upps, algo no esta bien!", "Error cargando la lista de provincias.", "error");
           $('#cargando').hide();
         });
        }
        else {
          $("abbr.select2-search-choice-close", $("#provincia").prev()).trigger("mousedown");
          $("#provincia").prop("disabled",true);
        }
      });

      $("#provincia").on("change", function (e) {
        if($("#provincia").val()!=0 && $("#provincia").val()!=null)
        {
          $("abbr.select2-search-choice-close", $("#municipio").prev()).trigger("mousedown");
          var provinciaId=$('#provincia').val();
          //Se actualiza via AJAX el select con las nuevas provincias
          //envio AJAX
           var listaMunicipios = $.post('/bid/obtienemunicipiosprovincia/' + provinciaId, function(response)
           {
             listaMunicipios.success(function (){
               if(response.success)
               {
                  var branchName = $('#municipio').empty();
                  $('<option/>', {
                    value:'0',
                    text:'---Seleccione el municipio---'
                   }).appendTo(branchName);
                  $.each(response.respuestaJSON, function(i, municipio){
                   $('<option/>', {
                     value:municipio.id,
                     text:municipio.nombre
                    }).appendTo(branchName);
                  })
                  $("#municipio").prop("disabled",false);
                  //console.log($("#departamento").val());
                  $("#municipio").val('0');
                  $("abbr.select2-search-choice-close", $("#municipio").prev()).trigger("mousedown");
               } else {
                 $("#municipio").prop("disabled",true);
                 swal("Upps, algo no esta bien!", "Error cargando la lista de municipios.", "error");
                 $('#cargando').hide();
               }
             });

         },'json').fail(function (result) {
           //pone en nulo el control select
           $("#municipio").prop("disabled",true);
           swal("Upps, algo no esta bien!", "Error cargando la lista de municipios.", "error");
           $('#cargando').hide();
         });
        }
        else {
          $("abbr.select2-search-choice-close", $("#municipio").prev()).trigger("mousedown");
          $("#municipio").prop("disabled",true);
        }
      });

      $("#municipio").on("change", function (e) {
        if($("#municipio").val()!=0 && $("#municipio").val()!=null)
        {
          $("abbr.select2-search-choice-close", $("#poblacion").prev()).trigger("mousedown");
          var municipioId=$('#municipio').val();
          //Se actualiza via AJAX el select con las nuevas poblaciones
          //envio AJAX
           var listaPoblaciones = $.post('/bid/obtienepoblacionesmunicipio/' + municipioId, function(response)
           {
             listaPoblaciones.success(function (){
               if(response.success)
               {
                  var branchName = $('#poblacion').empty();
                  $('<option/>', {
                    value:'0',
                    text:'---Seleccione la población---'
                   }).appendTo(branchName);
                  $.each(response.respuestaJSON, function(i, poblacion){
                   $('<option/>', {
                     value:poblacion.id,
                     text:poblacion.nombre
                    }).appendTo(branchName);
                  })
                  $("#poblacion").prop("disabled",false);
                  //console.log($("#departamento").val());
                  $("#poblacion").val('0');
                  $("abbr.select2-search-choice-close", $("#poblacion").prev()).trigger("mousedown");
               } else {
                 $("#poblacion").prop("disabled",true);
                 swal("Upps, algo no esta bien!", "Error cargando la lista de poblaciones.", "error");
                 $('#cargando').hide();
               }
             });

         },'json').fail(function (result) {
           //pone en nulo el control select
           $("#poblacion").prop("disabled",true);
           swal("Upps, algo no esta bien!", "Error cargando la lista de poblaciones.", "error");
           $('#cargando').hide();
         });
        }
        else {
          $("abbr.select2-search-choice-close", $("#poblacion").prev()).trigger("mousedown");
          $("#poblacion").prop("disabled",true);
        }
      });

      $("#poblacion").on("change", function (e) {
        if($("#poblacion").val()!=0 && $("#poblacion").val()!=null)
        {
          $("abbr.select2-search-choice-close", $("#distrito_id").prev()).trigger("mousedown");
          var poblacionId=$('#poblacion').val();
          //Se actualiza via AJAX el select con las nuevas poblaciones
          //envio AJAX
           var listaDistritos = $.post('/bid/obtienedistritospoblacion/' + poblacionId, function(response)
           {
             listaDistritos.success(function (){
               if(response.success)
               {
                  var branchName = $('#distrito_id').empty();
                  $('<option/>', {
                    value:'0',
                    text:'---Seleccione el distrito---'
                   }).appendTo(branchName);
                  $.each(response.respuestaJSON, function(i, distrito){
                   $('<option/>', {
                     value:distrito.id,
                     text:distrito.nombre
                    }).appendTo(branchName);
                  })
                  $("#distrito_id").prop("disabled",false);
                  //console.log($("#departamento").val());
                  $("#distrito_id").val('0');
                  $("abbr.select2-search-choice-close", $("#distrito_id").prev()).trigger("mousedown");
               } else {
                 $("#distrito_id").prop("disabled",true);
                 swal("Upps, algo no esta bien!", "Error cargando la lista de distritos.", "error");
                 $('#cargando').hide();
               }
             });

         },'json').fail(function (result) {
           //pone en nulo el control select
           $("#distrito_id").prop("disabled",true);
           swal("Upps, algo no esta bien!", "Error cargando la lista de distritos.", "error");
           $('#cargando').hide();
         });
        }
        else {
          $("abbr.select2-search-choice-close", $("#distrito_id").prev()).trigger("mousedown");
          $("#distrito_id").prop("disabled",true);
        }
      });

});


    </script>
