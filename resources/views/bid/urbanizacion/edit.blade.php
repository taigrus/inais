@extends('layout')
@if (!Auth::guest())
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Editar datos de la urbanización: <strong>{{$urbanizacion->nombre}}</strong></div>
                        <div class="panel-body">
                            @include('bid.urbanizacion.partials.messages')
                            {!! Form::model($urbanizacion, ['route' => ['bid.urbanizaciones.update', $urbanizacion->id], 'method' => 'PUT', 'id' => 'edicionUrbanizaciones']) !!}
                            @include('bid.urbanizacion.partials.fields')
                            <div class="col-md-12 col-md-offset-3">
                                <div class="row">
                                    {!! Form::submit('Actualizar urbanización',['class' => 'btn btn-info']) !!}
                                    <a href={{ route('bid.urbanizaciones.index') }} class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                    @include('bid.urbanizacion.partials.delete')
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
        var frmvalidator = new Validator("edicionUrbanizaciones");  //where myform is the name/id of your form
        frmvalidator.addValidation("nombre", "req", "Por favor ingrese el NOMBRE de la urbanización");
        frmvalidator.addValidation("nombre", "maxlen=50", "Se permiten 50 caracteres como máximo en el nombre");
        frmvalidator.addValidation("descripcion", "maxlen=250", "Se permiten 250 caracteres como máximo en la descripción");
    });
</script>
@endpush


