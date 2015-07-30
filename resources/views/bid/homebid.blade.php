@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home BID</div>

                    <div class="panel-body">
                        @if (Auth::guest())
                            Estas usando el sistema como invitado
                        @else
                            Estas usando el sistema como <strong>{{ Auth::user()->full_name }}</strong> y su Rol es: <strong>{{Auth::user()->type_id}}</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection