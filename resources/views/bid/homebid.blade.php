@extends('mainlayout')

@section('content')

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home BID</div>

                    <div class="panel-body">
                        @if (Auth::guest())
                            Estas usando el sistema como invitado
                        @else
                            Estas usando el sistema como <strong>{{ Auth::user()->full_name }}</strong> y su Rol es: <strong>{{Auth::user()->rol->descripcion}}</strong>
                        @endif
                    </div>
                </div>
            </div>

@endsection
