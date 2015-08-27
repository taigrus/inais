@extends('layout')

@if (!Auth::guest() and (Auth::user()->rol_id==1 or Auth::user()->rol_id==2))

@section('content')
    <style>
        body { font-size: 140%; }
    </style>
    @include('bid.urbanizacion.modalurbanizacion')
    @include('bid.urbanizacion.modalediturbanizacion')
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
                            <a class="btn btn-success" href="{{route("bid.urbanizaciones.create")}}" role="button">
                                Nueva Urbanización/Zona
                            </a>
                            <a href="#"
                               data-toggle="modal"
                               data-target="#modalurbanizacion"
                               class="boton-nuevaajax btn btn-warning">
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

        //Escucha boton Ajax para edicion de datos de la urbanizacion y obtine sus datos en el formulario modal
        $('#urbanizaciones-table tbody').on('click', '.btn-editar', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var urlInicial = 'obtieneurbanizacion/' + id;
                //----ENVIO AJAX para obtener los datos de la urbanizcion
                $.post(urlInicial, function(response){
                if(response.success)
                  {
                    $('#modalEditUrbanizacion').modal('show');
                    $('#cargandoEdit').show();
                    $('#nombreEdicion').val('');
                    $('#descripcionEdicion').val('');
                    $('#formEdicionModalUrbanizaciones').parsley().reset();
                    $('#idOculto').val(response.urbanizacion.id);
                    $('#nombreEdicion').val(response.urbanizacion.nombre);
                    $('#descripcionEdicion').val(response.urbanizacion.descripcion);
                    $('#cargandoEdit').hide();
                  }
                }, 'json').fail(function (result) {
                     swal("Upps, algo no esta bien!", "Se produjo un error al obtener los datos de la urbanización, intentelo nuevamente.", "error");
                   });
        });

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
            (document).getElementById('altaUrbanizacionesmodal').reset();
            $('#nombre').val('');
            $('#descripcion').val('');
            $('#cargando').hide();
            $('#altaUrbanizacionesmodal').parsley().reset();
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
       });
    </script>
@endsection

@else
    <p class="alert alert-danger">Ud. no esta autorizado para usar esta función</p>
@endif
