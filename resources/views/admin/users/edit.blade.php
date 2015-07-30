@extends('layout')
@if (!Auth::guest() and Auth::user()->type_id==1)
    @section('content')
        <style>
            .modal-footer {
                padding:9px 15px;
                border-bottom:1px solid #eee;
                background-color: #be0d14;
                color: lightyellow;
                -webkit-border-bottom-left-radius: 5px;
                -webkit-border-bottom-right-radius: 5px;
                -moz-border-radius-bottomleft: 5px;
                -moz-border-radius-bottomright: 5px;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }
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
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Editar usuario: <strong>{{$user->first_name}} {{$user->last_name}}</strong></div>
                        <div class="panel-body">
                            @include('admin.users.partials.messages')
                            {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
                            @include('admin.users.partials.fields')
                            <div class="col-md-12 col-md-offset-4">
                                {!! Form::submit('Actualizar usuario',['class' => 'btn btn-info']) !!}
                                <a href={{ route('admin.users.index') }} class="btn btn-default">Cancelar</a>
                            </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                    @include('admin.users.partials.delete')
                </div>
            </div>
        </div>
        </div>



    @endsection



@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif