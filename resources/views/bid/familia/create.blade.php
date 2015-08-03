@extends('layout')

@if (!Auth::guest())

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Nueva familia en el programa</div>
                        <div class="panel-body">
                            @include('bid.familia.partials.messages')
                            {!! Form::open(['route' => 'bid.familias.store', 'method' => 'POST']) !!}
                            @include('bid.familia.partials.fields')
                            <div class="row">
                                <div class="col-md-12 col-md-offset-5">
                                {!! Form::submit('Registrar',['class' => 'btn btn-info']) !!}
                                {!! link_to_route('bid.familias.index', 'Cancelar','',['class' => 'btn btn-default']) !!}
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
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif