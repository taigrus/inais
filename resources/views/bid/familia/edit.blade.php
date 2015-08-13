@extends('layout')
@if (!Auth::guest())

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Editar datos de la familia: <strong>{{$familia->folio}} -  {{$familia->direccion}}</strong></div>
                        <div class="panel-body">
                            @include('bid.familia.partials.messages')
                            {!! Form::model($familia, ['route' => ['bid.familias.update', $familia->id], 'method' => 'PUT']) !!}
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
                </div>
            </div>
        </div>
        </div>
    @endsection

@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif




