@extends('layout')

@if (!Auth::guest() and (Auth::user()->rol_id==1 or Auth::user()->rol_id==2))

@section('content')
    <style>
        body { font-size: 140%; }
    </style>
    @include('bid.urbanizacion.modalurbanizacion')
    @include('bid.urbanizacion.modalediturbanizacion')
    @include('bid.urbanizacion.modalViewUrbanizacion')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Urbanizaciones y zonas registradas</div>
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @elseif(Session::has('error-message'))
                        <script type="text/javascript">
                            swal('Upss! algo salio realmente mal :(','{{Session::get('error-message')}}','error');
                        </script>
                        <p class="alert alert-danger">{{Session::get('error-message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>
                            <a href="#"
                               data-toggle="modal"
                               data-target="#modalurbanizacion"
                               class="boton-nuevaajax btn btn-success">
                                <span class="glyphicon glyphicon-hand-left"></span>
                                Nuevas urbanizaciones/Zonas
                            </a>
                        </p>
                        @include('bid.urbanizacion.partials.table')
                        {{--<script src="{{ asset('js/deleteConfirm.js') }}"></script>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['bid.urbanizaciones.destroy', ':URB_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
<script>

    $(document).ready(function() {
        // $('#urbanizaciones-table tfoot th').each( function () {
        //     var title = $('#urbanizaciones-table thead th').eq( $(this).index() ).text();
        //     $(this).html( '<input type="text" placeholder=' + title + ' />' );
        // } );
        var table=$('#urbanizaciones-table').on('error.dt', function(e, settings, techNote, message){
            swal("Tu sessión aparentemente expiró!", "por favor presiona F5 para recargar la página y autenticarte nuevamente. Gracias", "error");
        }).DataTable({
          processing: true,
          serverSide: true,
          stateSave: true,
          responsive: true,
          pagingType: 'full_numbers',
          dom: '<lf<t>ip>B',
          buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]

                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'colvis',
                collectionLayout: 'fixed two-column',
                postfixButtons: [ 'colvisRestore' ]
            }
        ],
          "language": {
              buttons: {
                copyTitle: 'Copiar al portapapeles',
                copyKeys: 'Presione las teclas <i>ctrl</i> + <i>C</i> o la tecla <i>\u2318</i> + <i>C</i> (en MAC), para copiar los datos de la tabla a su portapapeles. <br><br>Si desea cancelar esta operación haga click dentro de este cuadro o presine la tecla <i>Esc</i>.',
                colvis: 'Mostar/Ocultar columnas',
                colvisRestore: 'Mostrar todas'
              },
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando del _START_ al _END_ de _TOTAL_",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          },
          ajax: '{!! route('urbanizaciones.datatables.data') !!}',
          columns: [
              { data: 'id', name: 'urbanizacion.id' },
              { data: 'nombre', name: 'urbanizacion.nombre' },
              { data: 'descripcion', name: 'urbanizacion.descripcion' },
              { data: 'action', name: 'action', orderable: false, searchable: false}
          ]
        });
        new $.fn.dataTable.FixedHeader( table, {
          fixedHeader: true
        });
        // table.columns().every( function () {
        //     var that = this;
        //
        //     $( 'input', this.footer() ).on( 'keyup change', function () {
        //         that
        //                 .search( this.value )
        //                 .draw();
        //     } );
        //} );

        //Eliminar la urbanizacion por boton de tabla con AJAX
        $('#urbanizaciones-table tbody').on('click', '.btn-borrar', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':URB_ID', id);
            var data = form.serialize();
            swal({
                    title: '¡CUIDADO!\n ¿Esta segur@ de eliminar el registro con ID: ' +id + ' y todo lo relacionado con el?',
                    text: 'La eliminación de este registro sera permanente y eliminara todas las familias, integrantes y demas registros relacionados!!!',
                    type: 'warning',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    disableButtonsOnConfirm: true,
                    confirmButtonColor: "#DD6B55",
                    confirmLoadingButtonColor: '#DD6B55',
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Si, adelante bórralo!",
                    cancelButtonText: "No, por favor no!"
                }, function () {
                        $.post(url, data, function (result) {
                            if(result.tipo!='ok') {
                                swal("Error", result.mensaje, "error");
                            }else{
                                //Elimina la fila de la tabla
                                table
                                        .row($(this).parents('tr'))
                                        .remove()
                                        .draw();
                                swal("Misión cumplida :)", result.mensaje, "success");
                            }
                        }).fail(function (result) {
                            swal("Upps, algo no esta bien!", "Se produjo un error al borrar el registro, intentelo nuevamente.", "error");
                        });
                })
            });

            $('#urbanizaciones-table tbody').on('click', '.btn-ver', function(e)
             {      e.preventDefault();
                    //obtiene el ID pasado en el atributo data-id del control
                    var id = $(this).data('id');
                    var urlInicial = 'obtienedatoscompeltosurbanizacion/' + id;
                    $('#modalViewUrbanizacion').modal('show');
                    $('#cargandoView').show();
                    //----ENVIO AJAX para obtener los datos de la urbanizcion
                    $.post(urlInicial, function(respuestaAJAX){
                    if(respuestaAJAX.success)
                      {

                         $( "#paisVista" ).val(respuestaAJAX.respuestaJSON.paisNombre);
                         $( "#paisVista" ).prop("disabled",true);
                         $( "#departamentoVista" ).val(respuestaAJAX.respuestaJSON.departamentoNombre);
                         $( "#departamentoVista" ).prop("disabled",true);
                         $( "#provinciaVista" ).val(respuestaAJAX.respuestaJSON.provinciaNombre);
                         $( "#provinciaVista" ).prop("disabled",true);
                         $( "#municipioVista" ).val(respuestaAJAX.respuestaJSON.municipioNombre);
                         $( "#municipioVista" ).prop("disabled",true);
                         $( "#poblacionVista" ).val(respuestaAJAX.respuestaJSON.poblacionNombre);
                         $( "#poblacionVista" ).prop("disabled",true);
                         $( "#distritoVista" ).val(respuestaAJAX.respuestaJSON.distritoNombre);
                         $( "#distritoVista" ).prop("disabled",true);
                         $('#nombreVista').val(respuestaAJAX.respuestaJSON.urbanizacionNombre);
                         $('#nombreVista').prop('disabled', true);
                         $('#descripcionVista').val(respuestaAJAX.respuestaJSON.urbanizacionDescripcion);
                         $('#descripcionVista').prop('disabled', true);
                      }
                    }, 'json').fail(function (result) {
                         swal("Upps, algo no esta bien!", "Se produjo un error al obtener los datos de la urbanización, intentelo nuevamente.", "error");
                       });
                       $('#cargandoView').hide();
            });

        //Escucha boton Ajax para edicion de datos de la urbanizacion y obtine sus datos en el formulario modal
        $('#urbanizaciones-table tbody').on('click', '.btn-editar', function(e)
         {      e.preventDefault();
                var id = $(this).data('id');
                var urlInicial = 'obtienedatoscompeltosurbanizacion/' + id;
                $('#modalEditUrbanizacion').modal('show');
                $('#cargandoEdit').show();
                //----ENVIO AJAX para obtener los datos de la urbanizcion
                $.post(urlInicial, function(respuestaAJAX){
                if(respuestaAJAX.success)
                  {
                     $( '#paisEdicionLabel' ).text('01 Pais: (' + respuestaAJAX.respuestaJSON.paisNombre + ')');
                     $( '#departamentoEdicionLabel' ).text('02 Departamento: (' + respuestaAJAX.respuestaJSON.departamentoNombre + ')');
                     $( '#provinciaEdicionLabel' ).text('03 Provincia: (' + respuestaAJAX.respuestaJSON.provinciaNombre + ')');
                     $( '#municipioEdicionLabel' ).text('04 Municipio: (' + respuestaAJAX.respuestaJSON.municipioNombre + ')');
                     $( '#poblacionEdicionLabel' ).text('05 Población: (' + respuestaAJAX.respuestaJSON.poblacionNombre + ')');
                     $( '#distritoEdicionLabel' ).text('06 Distrito: (' + respuestaAJAX.respuestaJSON.distritoNombre + ')');
                     $('#formEdicionModalUrbanizaciones').parsley().reset();
                     $('#idOculto').val(respuestaAJAX.respuestaJSON.id);
                     $( "#paisEdicion" ).select2( { allowClear: true, placeholder: 'seleccione el país', } );
                     $( "#departamentoEdicion" ).select2( { disabled: true, allowClear: true, placeholder: 'seleccione el departamento' } );
                     $( "#provinciaEdicion" ).select2( { allowClear: true, placeholder: 'seleccione la provincia' } );
                     $( "#municipioEdicion" ).select2( { allowClear: true, placeholder: 'seleccione el municipio' } );
                     $( "#poblacionEdicion" ).select2( { allowClear: true, placeholder: 'seleccione la población' } );
                     $( "#distritoEdicion" ).select2( { allowClear: true, placeholder: 'seleccione el distrito' } );
                     cargaDropDown("#paisEdicion", "listapaises", null, "el país",respuestaAJAX.respuestaJSON.paisId, true);
                    $('#nombreEdicion').val(respuestaAJAX.respuestaJSON.urbanizacionNombre);
                    $('#descripcionEdicion').val(respuestaAJAX.respuestaJSON.urbanizacionDescripcion);
                  }
                }, 'json').fail(function (result) {
                     swal("Upps, algo no esta bien!", "Se produjo un error al obtener los datos de la urbanización, intentelo nuevamente.", "error");
                   });
                   $('#cargandoEdit').hide();
        });

        //funcion para cargar dropdown list

        /* controlId = Nombre del dropdown a poblar
        /* urlParcial = complemento a la ruta de la funcion del controlador
        /* KeyId = ID del registro padre a Buscar, null para obtener listado total de registros
        /* textoPlaceHolder = Texto a poner como valor por defecto en el dropdown
        /* indice = valor a seleccionar en el dropdown una vez poblado
        /* estadoFinal = true para dropdown activo, false para inactivo
        */

        function cargaDropDown(controlId, urlParcial, keyId, textoPlaceHolder, indice, estadoFinal){
          $('#cargandoEdit').show();
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
                 $('#cargandoEdit').hide();
              } else {
                control.prop("disabled",true);
                swal("Upps, algo no esta bien!", "Error cargando la lista de provincias.", "error");
                $('#cargandoEdit').hide();
              }
            });
        },'json').fail(function (result) {
          //pone en nulo el control select

          swal("Upps, algo no esta bien!", "Error cargando la lista de " + controlId, "error");
          $('#cargando').hide();
        });
        }

        $("#paisEdicion").on("change", function (e) {
          if($("#paisEdicion").val()!=0 && $("#paisEdicion").val()!=null)
          {
            //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
            var paisId=$('#paisEdicion').val();
            cargaDropDown("#departamentoEdicion", "departamentospais", paisId, "el departamento",0, true);
            $("#departamentoEdicion").val(0).trigger("change");
          }
          else {
            $("abbr.select2-search-choice-close", $("#departamentoEdicion").prev()).trigger("mousedown");
            $("#departamentoEdicion").val(0).trigger("change");
            $("#departamentoEdicion").prop("disabled",true);
          }
        });

        $("#departamentoEdicion").on("change", function (e) {
          if($("#departamentoEdicion").val()!=0 && $("#departamentoEdicion").val()!=null)
          {
            //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
            var departamentoId=$('#departamentoEdicion').val();
            cargaDropDown("#provinciaEdicion", "provinciasdepartamento", departamentoId, "la provincia",0, true);
            $("#provinciaEdicion").val(0).trigger("change");
          }
          else {
            $("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
            $("#provinciaEdicion").val(0).trigger("change");
            $("#provinciaEdicion").prop("disabled",true);
          }
        });

        $("#provinciaEdicion").on("change", function (e) {
          if($("#provinciaEdicion").val()!=0 && $("#provinciaEdicion").val()!=null)
          {
            //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
            var provinciaId=$('#provinciaEdicion').val();
            cargaDropDown("#municipioEdicion", "municipiosprovincia", provinciaId, "el municipio",0, true);

            $("#municipioEdicion").val(0).trigger("change");
          }
          else {
            $("abbr.select2-search-choice-close", $("#municipioEdicion").prev()).trigger("mousedown");
            $("#municipioEdicion").val(0).trigger("change");
            $("#municipioEdicion").prop("disabled",true);
          }
        })

        $("#municipioEdicion").on("change", function (e) {
          if($("#municipioEdicion").val()!=0 && $("#municipioEdicion").val()!=null)
          {
            //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
            var municipioId=$('#municipioEdicion').val();
            cargaDropDown("#poblacionEdicion", "poblacionesmunicipio", municipioId, "la población",0, true);

            $("#poblacionEdicion").val(0).trigger("change");
          }
          else {
            $("abbr.select2-search-choice-close", $("#poblacionEdicion").prev()).trigger("mousedown");
            $("#poblacionEdicion").val(0).trigger("change");
            $("#poblacionEdicion").prop("disabled",true);
          }
        })

        $("#poblacionEdicion").on("change", function (e) {
          if($("#poblacionEdicion").val()!=0 && $("#poblacionEdicion").val()!=null)
          {
            //$("abbr.select2-search-choice-close", $("#provinciaEdicion").prev()).trigger("mousedown");
            var poblacionId=$('#poblacionEdicion').val();
            cargaDropDown("#distritoEdicion", "distritospoblacion", poblacionId, "el distrito",0, true);

            $("#distritoEdicion").val(0).trigger("change");
          }
          else {
            $("abbr.select2-search-choice-close", $("#distritoEdicion").prev()).trigger("mousedown");
            $("#distritoEdicion").val(0).trigger("change");
            $("#distritoEdicion").prop("disabled",true);
          }
        })

        //Actualiza los datos de la urbanizacion por ajax
         $('#btn-update').click(function (e) {
             //e.preventDefault();
             var id=$('#idOculto').val();
             var form = $('#formEdicionModalUrbanizaciones');
             var url = form.attr('action').replace(':URB_ID', id);
             var data = form.serialize();
             //----ENVIO AJAX
                 $('#cargando').show();
                 var envio = $.post(url, data, function (respuesta) {
                     if(respuesta.tipo!='ok') {
                         swal("Presta atención a este mensaje!", respuesta.mensaje, "error");
                         $('#cargando').hide();
                     }
                     envio.success(function(){
                         if(respuesta.tipo=='ok') {
                             //Se actualiza la tabla con el nuevo registro si solicitud es correcta
                            $('#modalEditUrbanizacion').modal('hide');
                            table.ajax.reload();
                            swal("Misión cumplida :)", respuesta.mensaje, "success");
                         };
                     });
                     //oculta gif de proceso
                     envio.complete(function(){
                         $('#cargando').hide();
                     });
                     //Si solicitud Ajax falla
                     }).fail(function (respuesta) {
                         swal("Upps, algo no esta bien!", "Se produjo un error al guardar el registro, intentelo nuevamente.", "error");
                         $('#cargando').hide();
                     });
         });

        //Activa e inicializad el formulario modal de alta de urbanizacion
        $('.boton-nuevaajax').click(function(){
            inicializaControles();
        });

           //Registra nueva urbanizacion por ajax
            $('#btn-nueva').click(function (e) {
                //e.preventDefault();
                var form = $('#altaUrbanizacionesmodal');
                var url = form.attr('action');
                var data = form.serialize();
                //----ENVIO AJAX
                    $('#cargando').show();
                    var envio = $.post(url, data, function (respuesta) {
                        if(respuesta.tipo!='ok') {
                            swal("Presta atención a este mensaje!", respuesta.mensaje, "error");
                        }
                        envio.success(function(){
                            if(respuesta.tipo=='ok') {
                                //Se actualiza la tabla con el nuevo registro si solicitud es correcta
                                table.ajax.reload();
                                swal({
                                            title: "Urbanización correctamente registrada",
                                            text: "¿Desea registrar mas urbanizaciones?",
                                            type: "success",
                                            showCancelButton: true,
                                            confirmButtonText: "Si, una mas!",
                                            cancelButtonText: 'Ya no mas',
                                            closeOnConfirm: true
                                        },
                                        function (isConfirm) {
                                            if (isConfirm) {
                                                $('#nombre').val('');
                                                $('#descripcion').val('');
                                                $('#cargando').hide();
                                                $('#altaUrbanizacionesmodal').parsley().reset();
                                            } else {
                                                $('#modalurbanizacion').modal('hide');
                                            }
                                        });
                            };
                        });
                        //oculta gif de proceso
                        envio.complete(function(){
                            $('#cargando').hide();
                        });
                        //Si solicitud Ajax falla
                        }).fail(function (result) {
                            swal("Upps, algo no esta bien!", "Se produjo un error al guardar el registro, intentelo nuevamente.", "error");
                            $('#cargando').hide();
                        });
            });

            $('#btn-limpiar').click(function(){
              inicializaControles();
            });

            function inicializaControles(){

              (document).getElementById('altaUrbanizacionesmodal').reset();
              $('#nombre').val('');
              $('#descripcion').val('');
              $('#cargando').hide();
              $('#altaUrbanizacionesmodal').parsley().reset();

              //pone nulos los select2
              $("abbr.select2-search-choice-close", $("#pais").prev()).trigger("mousedown");
              $("abbr.select2-search-choice-close", $("#departamento").prev()).trigger("mousedown");
              $("abbr.select2-search-choice-close", $("#provincia").prev()).trigger("mousedown");
              $("abbr.select2-search-choice-close", $("#municipio").prev()).trigger("mousedown");
              $("abbr.select2-search-choice-close", $("#poblacion").prev()).trigger("mousedown");
              $("abbr.select2-search-choice-close", $("#distrito").prev()).trigger("mousedown");

              $( "#pais" ).select2( { allowClear: true, placeholder: 'seleccione su país', } );
              $( "#departamento" ).select2( { disabled: true, allowClear: true, placeholder: 'seleccione el departamento' } );
              $( "#provincia" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );
              $( "#municipio" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );
              $( "#poblacion" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );
              $( "#distrito_id" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );

              //bloqueos
              $("#departamento").prop("disabled",true);
              $("#provincia").prop("disabled",true);
              $("#municipio").prop("disabled",true);
              $("#poblacion").prop("disabled",true);
              $("#distrito").prop("disabled",true);
            }
       });
    </script>
@endsection

@else
    <p class="alert alert-danger">Ud. no esta autorizado para usar esta función</p>
@endif
