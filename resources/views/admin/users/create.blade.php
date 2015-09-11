@extends('mainlayout')

@if (!Auth::guest() and Auth::user()->rol_id==1)
    @section('content')

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Nuevo usuario</div>
                        <div class="panel-body">
                            @include('admin.users.partials.messages')
                            {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
                            @include('admin.users.partials.fields')
                            {!! Form::submit('Registrar',['class' => 'btn btn-info']) !!}
                            {!! link_to_route('admin.users.index', 'Cancelar','',['class' => 'btn btn-default']) !!}
                            {!! form::close() !!}
                        </div>
                    </div>
                </div>

    @endsection
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif
