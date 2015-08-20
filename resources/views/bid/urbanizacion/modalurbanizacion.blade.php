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
                <div class="modal fade" id="modalurbanizacion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Registro de varias urbanizaciones</h4>
                            </div>
                            <div class="modal-body">
                                <h2><small><span style="color: darkred">Ingrese los datos de la nueva urbanización</span></small></h2>
                                @include('bid.urbanizacion.partials.messages')
                                {!! Form::open(['route' => 'bid.urbanizaciones.store', 'method' => 'POST', 'id' => 'altaUrbanizacionesmodal', 'data-parsley-validate' => '']) !!}
                                @include('bid.urbanizacion.partials.fields')
                                {!! form::close() !!}
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-4" id="cargando">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Cargando">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="btn-borrar btn btn-success" id="btn-nueva"><i class="glyphicon glyphicon-thumbs-up"></i> Registrar</a>
                                <button type="submit" class="btn btn-default btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-thumbs-down"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif




