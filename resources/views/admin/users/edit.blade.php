@extends('mainlayout')
@if (!Auth::guest() and Auth::user()->rol_id==1) {{--->rol->descripcion=="Administrador del sistema"--}}
    @section('content')


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


    @endsection



@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif
