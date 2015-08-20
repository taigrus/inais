@extends('layout')

@if (!Auth::guest() and Auth::user()->rol_id==1)

@section('content')
    <style>
        body { font-size: 140%; }
    </style>
    @include('bid.urbanizacion.modalurbanizacion')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Urbanizaciones y zonas registradas</div>
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @elseif(Session::has('error-message'))
                        <script>
                            BootstrapDialog.alert({
                                title: 'ATENCION',
                                message: '{{Session::get('error-message')}}',
                                type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                                closable: true, // <-- Default value is false
                                draggable: true, // <-- Default value is false
                                buttonLabel: 'Aceptar' // <-- Default value is 'OK'
                            });
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



        $('#urbanizaciones-table tfoot th').each( function () {
            var title = $('#urbanizaciones-table thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" placeholder=' + title + ' />' );
        } );
        var table=$('#urbanizaciones-table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            responsive: true,
            stateSave: true,
            languaje: {
                "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
            },
            ajax: '{!! route('urbanizaciones.datatables.data') !!}',
            columns: [
                { data: 'id', name: 'urbanizacion.id' },
                { data: 'nombre', name: 'urbanizacion.nombre' },
                { data: 'descripcion', name: 'urbanizacion.descripcion' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                        .search( this.value )
                        .draw();
            } );
        } );
        //table.buttons().container()
        //        .insertAfter( $('.panel-body', table.table().container() ) );

        //Eliminar la urbanizacion por boton de tabla con AJAX
        $('#urbanizaciones-table tbody').on('click', '.btn-borrar', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':URB_ID', id);
            var data = form.serialize();
            swal({
                    title: '¿Esta segur@ de eliminar el registro?',
                    text: 'La eliminación de este registro sera permanente y eliminara todos los integrantes de la familia relacionados!',
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
                    setTimeout(function () {
                        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        $.post(url, data, function (result) {
                            if(result.tipo!='ok') {
                                swal("Error", result.mensaje, "error");
                            }else{
                                table
                                        .row($(this).parents('tr'))
                                        .remove()
                                        .draw();
                                swal.close();
                            }

                        }).fail(function (result) {
                            swal("Upps, algo no esta bien!", "Se produjo un error al borrar el registro, intentelo nuevamente.", "error");
                        });

                    },3000);
                })
            });

        $('.boton-nuevaajax').click(function(){
            (document).getElementById('altaUrbanizacionesmodal').reset();
            $('#nombre').val('');
            $('#descripcion').val('');
            $('#cargando').hide();
        });

        function validarParsley(){
            $('#altaUrbanizacionesmodal').parsley({
                successClass: 'success',
                errorClass: 'error',
                errors: {
                    classHandler: function(el) {
                        return ( $(el).closest('.control-group'));
                    },
                    errorsWrapper: '<span class=\"help-inline\"></span>',
                    errorElem: '<span></span>',
                    errores: 1
                }
            });
        }

        function validador(nombre){
            var tester = /^([a-zA-Z0-9.+-+ ]{3,50})+$/;
            return tester.test(nombre);
        }
           //nueva urbanizacion por ajax
            $('#btn-nueva').click(function (e) {
                //e.preventDefault();
                var form = $('#altaUrbanizacionesmodal');
                var url = form.attr('action');
                var data = form.serialize();
                var errores=false;
                //----VALIDACION
                var valNombre= document.getElementById('nombre').value;
                if (valNombre==''){
                    swal("Presta atención a este mensaje!", "No puedo almacenar una urbanización sin nombre, por favor escribe un nombre y luego lo intentamos nuevamente", "error");
                    errores=true;
                    $('#nombre').focus();
                }else{
                    if(!validador(valNombre)){
                        swal("Presta atención a este mensaje!", "El nombre de la urbanización debe tener al menos 3 letras y no mas de 50, corrige esto por favor!", "error");
                        errores=true;
                        $('#nombre').focus();
                    }
                }
                //----ENVIO AJAX
                if (!errores){
                    $('#cargando').show();
                    var envio = $.post(url, data, function (respuesta) {

                        if(respuesta.tipo!='ok') {
                            swal("Presta atención a este mensaje!", respuesta.mensaje, "error");
                        }else{
                            //actualizar la tabla
                        }
                        envio.success(function(){
                            if(respuesta.tipo=='ok') {
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
                                            } else {
                                                $('#modalurbanizacion').modal('hide');
                                            }
                                        });
                            };
                            //
                        });
                        envio.complete(function(){
                            $('#cargando').hide();
                        });
                        }).fail(function (result) {
                            swal("Upps, algo no esta bien!", "Se produjo un error al guardar el registro, intentelo nuevamente.", "error");
                            $('#cargando').hide();
                        });
                    }
            });
       });
    </script>
@endsection



@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif