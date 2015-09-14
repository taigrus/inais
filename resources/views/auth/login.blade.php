
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de información del proyecto BID del CSRA 2015">
    <meta name="author" content="Raúl Burgos Murray">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/misestilos.css') }}" rel="stylesheet" type="text/css" />
    <title>INAIS - Login</title>

</head>

<body class='login-page'>
{{-- @section('content') --}}
<style>
    .drop-shadow {
        -webkit-box-shadow: 0 0 15px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 15px 2px rgba(0, 0, 0, .5);
        padding: 10px;
    }

</style>

<div class='login-wrapper'>
    <div class="container">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3  drop-shadow">
                <div class="panel panel-default">
                    <div class="panel-heading">Por favor autentícate con el sistema</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                Por favor corrige los siguientes errores:<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }} ">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('validation.attributes.email') }}</label>
                                <div class="col-md-6">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'type' => 'email']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('validation.attributes.password') }}</label>
                                <div class="col-md-6">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success" style="margin-right: 15px;">
                                        Iniciar sesión
                                    </button>
                                    {{-- <a href="/password/email">Forgot Your Password?</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
{{-- @endsection --}}
</body>
</html>
