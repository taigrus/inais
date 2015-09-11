@extends('mainlayout')
@if (!Auth::guest() and (Auth::user()->rol_id==1 or Auth::user()->rol_id==2))

@section('content')
    <style>
        body { font-size: 140%; }
        div.DTTT { margin-bottom: 0.5em; float: right; }
        div.dataTables_wrapper { clear: both; }
    </style>

                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Famililas registradas</div>
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @elseif(Session::has('error-message'))
                        <script>
                            (document).ready(swal('Upss! algo salio realmente mal :(','{{Session::get('error-message')}}','error'));
                            /*BootstrapDialog.alert({
                                title: 'ATENCION',
                                message: '{{Session::get('error-message')}}',
                                type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                                closable: true, // <-- Default value is false
                                draggable: true, // <-- Default value is false
                                buttonLabel: 'Aceptar' // <-- Default value is 'OK'
                            });*/
                        </script>
                        <p class="alert alert-danger">{{Session::get('error-message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>
                            <a class="btn btn-success" href="{{route("bid.familias.create")}}" role="button">
                                Nueva Familia
                            </a>
                        </p>
                        @include('bid.familia.partials.table')
                        {{--<script src="{{ asset('js/deleteConfirm.js') }}"></script>--}}
                    </div>
                </div>



@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var table=$('#familias-table').on('error.dt', function(e, settings, techNote, message){
            swal("Tu sessión aparentemente expiró!", "por favor presiona F5 para recargar la página y autenticarte nuevamente. Gracias", "error");
        }).DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave: true,
            pagingType: 'full_numbers',
            dom: '<lf<t>ip>B',
            buttons: [
              {
                  extend: 'copyHtml5',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 6, 8, 9 ]

                  }
              },
              {
                  extend: 'excelHtml5',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                  }
              },
              {
                  extend: 'pdfHtml5',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 6 ]
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
            ajax: '{!! route('familias.datatables.data') !!}',
            columns: [
                { data: 'id', name: 'familia_bid.id' },
                { data: 'folio', name: 'familia_bid.folio' },
                { data: 'facilitador', name: 'facilitador_bid.nombre' },
                { data: 'distrito', name: 'distrito.nombre' },
                { data: 'urbanizacion', name: 'urbanizacion.nombre' },
                { data: 'via', name: 'via.nombre', visible: false, className: 'never'},
                { data: function(d){return d.via + ' ' + d.direccion + ' #' + d.numero_puerta;}, name: 'familia_bid.direccion'},
                { data: 'numero_puerta', name: 'familia_bid.numero_puerta', visible: false, className: 'never' },
                { data: 'creada', name: 'familia_bid.created_at' },
                { data: 'actualizada', name: 'familia_bid.updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        new $.fn.dataTable.FixedHeader( table, {
          fixedHeader: true
        });
    });
</script>

@endpush
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif
