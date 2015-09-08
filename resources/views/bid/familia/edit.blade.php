@extends('layout')
@if (!Auth::guest())

    @section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">

                        <div class="panel-heading">Editar datos de la familia con folio: <strong>{{$familia->folio}} -  {{$familia->direccion_completa}}</strong></div>
                        <div class="panel-body">
                            @include('bid.familia.partials.messages')
                            {!! Form::model($familia, ['route' => ['bid.familias.update', $familia->id], 'method' => 'PUT', 'id' => 'edicionFamilias', 'data-parsley-validate' => '']) !!}
                            @include('bid.familia.partials.fields')
                            <div class="col-md-12 col-md-offset-4">
                                <div class="row">
                                    {!! Form::submit('Actualizar familia',['class' => 'btn btn-info']) !!}
                                    <a href={{ route('bid.familias.index') }} class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                    @include('bid.familia.partials.delete')
                    @include('bid.urbanizacion.modalurbanizacion')
                </div>
            </div>
        </div>
    @endsection

@else
    <p class="alert alert-danger">Ud. no esta autorizado para usar esta función</p>
@endif

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.boton-nuevaurbajax').click(function(){
                (document).getElementById('altaUrbanizacionesmodal').reset();
                $('#nombre').val('');
                $('#descripcion').val('');
                $('#cargando').hide();
                $('#altaUrbanizacionesmodal').parsley().reset();
            });

            $('#btn-nueva').click(function (e) {
                //e.preventDefault();
                var form = $('#altaUrbanizacionesmodal');
                var url = form.attr('action');
                var data = form.serialize();
                    $('#cargando').show();
                    var envio = $.post(url, data, function (respuesta) {
                        if(respuesta.tipo!='ok') {
                            swal("Presta atención a este mensaje!", respuesta.mensaje, "error");
                        }else{
                            //TODO: Se debe actualizar la tabla general para que refleje la nueva fila adicionada mediante ajax
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
                                                $('#cargando').hide();
                                                $('#altaUrbanizacionesmodal').parsley().reset();

                                            } else {
                                                $('#modalurbanizacion').modal('hide');
                                                //Se actualiza via AJAX el select con las nuevas urbanizaciones
                                                $.post('/bid/listaurbanizaciones', function(response){
                                                if(response.success)
                                                {
                                                     var branchName = $('#urbanizacion').empty();
                                                     $.each(response.urbanizaciones, function(i, urbanizacion){
                                                        $('<option/>', {
                                                             value:urbanizacion.id,
                                                             text:urbanizacion.nombre
                                                         }).appendTo(branchName);
                                                     })
                                                }
                                            }, 'json');
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

            });
        });
    </script>
@endpush
