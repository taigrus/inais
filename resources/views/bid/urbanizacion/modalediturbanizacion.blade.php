@if (!Auth::guest())
    <style>
        .modal-header {
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #be0d14;
            color: lightyellow;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

    </style>

    <div class="row">
        <div class="col-md-10"></div>
            <div class="col-md-2">
                <div class="modal fade" id="modalEditUrbanizacion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel2">Edición de urbanizaciones</h4>
                            </div>
                            <div class="modal-body">
                                <h2><small><span style="color: darkred">Actualice los datos de la urbanización</span></small></h2>
                                {{--No se requieren los mensajes de validacion en el servidor por ser solicitud Ajax,
                                de todas maneras se efectua la validacion en el servidor retornandose un error generico
                                @include('bid.urbanizacion.partials.messages')--}}
                                {!! Form::open(['route' => ['bid.urbanizaciones.update', ':URB_ID'], 'method' => 'PUT', 'id' => 'formEdicionModalUrbanizaciones', 'data-parsley-validate' => '']) !!}
                                @include('bid.urbanizacion.partials.fieldsEdicionModal')
                                {!! form::close() !!}
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-4" id="cargandoEdit">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Cargando">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="btn-update btn btn-success" id="btn-update"><i class=" glyphicon glyphicon-floppy-saved"></i> Actualizar</a>
                                <button class="btn btn-default btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-thumbs-down"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif
