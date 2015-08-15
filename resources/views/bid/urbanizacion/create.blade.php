@extends('layout')

@if (!Auth::guest())

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registro de nueva urbanización</div>
                        <div class="panel-body">
                            @include('bid.urbanizacion.partials.messages')
                            {!! Form::open(['route' => 'bid.urbanizaciones.store', 'method' => 'POST', 'id' => 'altaUrbanizaciones']) !!}
                            @include('bid.urbanizacion.partials.fields')
                            <div class="row">
                                <div class="col-md-12 col-md-offset-4">
                                    {!! Form::submit('Registrar',['class' => 'btn btn-info']) !!}
                                    {!! link_to_route('bid.urbanizaciones.index', 'Cancelar','',['class' => 'btn btn-default']) !!}
                                    {!! form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
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
        var frmvalidator = new Validator("altaUrbanizaciones");  //where myform is the name/id of your form
        frmvalidator.addValidation("nombre", "req", "Por favor ingrese el NOMBRE de la urbanización");
        frmvalidator.addValidation("nombre", "maxlen=50", "Se permiten 50 caracteres como máximo en el nombre");
        frmvalidator.addValidation("descripcion", "maxlen=250", "Se permiten 250 caracteres como máximo en la descripción");
    });
</script>
@endpush