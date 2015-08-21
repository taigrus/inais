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
                            {!! Form::model($urbanizacion, ['route' => ['bid.urbanizaciones.update', $urbanizacion->id], 'method' => 'PUT', 'id' => 'edicionUrbanizaciones', 'data-parsley-validate' => '']) !!}
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
<script>var nombreformulario='edicionUrbanizaciones'</script>
@include('bid.urbanizacion.partials.validacion')
@endpush


