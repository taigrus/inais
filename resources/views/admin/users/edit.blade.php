@extends('layout')
@if (!Auth::guest() and Auth::user()->type_id==1)
    @section('content')
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

        <a href="#" class="btn btn-lg btn-success"
           data-toggle="modal"
           data-target="#basicModal">Click to open Modal</a>

        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Modal Body</h3>
                        </br>
                        {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
                        @include('admin.users.partials.fields_confirmacion')

                        {!! form::close() !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    @endsection



@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif