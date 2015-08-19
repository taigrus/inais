@if (!Auth::guest())

    <div class="row">
        <div class="col-md-10"></div>
            <div class="col-md-2">
                <div class="modal fade" id="modalurbanizacion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Gestión de urbanizaciones</h4>
                            </div>
                            <div class="modal-body">
                                <h2><small><span style="color: darkred">Ingrese los datos de la nueva urbanización</span></small></h2>
                                @include('bid.urbanizacion.partials.messages')
                                {!! Form::open(['route' => 'bid.urbanizaciones.store', 'method' => 'POST', 'id' => 'altaUrbanizacionesmodal']) !!}
                                @include('bid.urbanizacion.partials.fields')
                                {!! form::close() !!}
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-4">

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="btn-borrar btn btn-xs btn-danger" id="btn-nueva"><i class="glyphicon glyphicon-exclamation-sign"></i> Registrar</a>
                                <button  type="button" class="btn btn-warning" name="cls" id="cls" onclik='fnCls()'>Reset</button>
                                <button  type="button" class="btn btn-warning" name="editar" id="editar" onclick="fnEditar()" >Editar</button>
                                <button  type="button" class="btn btn-warning" name="guardar" id="guardar"  onclick="fnGuardar()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif



