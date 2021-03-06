@extends('mainlayout')
@if (!Auth::guest())

    @section('content')


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

    @endsection

@else
    <p class="alert alert-danger">Ud. no esta autorizado para usar esta función</p>
@endif

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        //Escucha boton de nueva urbanicazion
        $('.boton-nuevaurbajax').click(function(){
            inicializaControlesAlta();

        });

        function inicializaControlesAlta(){

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
          $( "#distrito" ).select2( { allowClear: true, placeholder: 'seleccione el departamento' } );

          //bloqueos
          $("#departamento").prop("disabled",true);
          $("#provincia").prop("disabled",true);
          $("#municipio").prop("disabled",true);
          $("#poblacion").prop("disabled",true);
          $("#distrito").prop("disabled",true);
        };

        //nueva urbanizacion por ajax
        $('#btn-nueva').click(function (e) {
                    //e.preventDefault();
                    var form = $('#altaUrbanizacionesmodal');
                    var url = form.attr('action');
                    var data = form.serialize();
                    var errores=false;
                    //----ENVIO AJAX
                    if (!errores){
                        $('#cargando').show();
                        var envio = $.post(url, data, function (respuesta) {
                            if(respuesta.tipo!='ok') {
                                swal("Presta atención a este mensaje!", respuesta.mensaje, "error");
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
                    };
                });

        $('#btn-limpiar').click(function(){
          inicializaControlesAlta();
        });
    });
</script>
@endpush
