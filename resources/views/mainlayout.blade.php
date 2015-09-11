<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de información del proyecto BID del CSRA 2015">
    <meta name="author" content="Raúl Burgos Murray">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>INAIS - Consejo de Salud Rural Andino (2015)</title>


    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    {{--<link href="{{ asset('css/app.css') }}" rel='stylesheet' type='text/css' />--}}
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-dialog.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/buttons.dataTables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/buttons.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/fixedHeader.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/jquery-ui.structure.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/jquery-ui.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/fuelux.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/parsley.css') }}" rel="stylesheet" type="text/css" />
    {{-- Recursos del tema SB ADMIN 2 --}}
    <link href="{{ asset('css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/misestilos.css') }}" rel="stylesheet" type="text/css" />
    <!-- MetisMenu CSS -->
    <link href="{{ asset('bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Timeline CSS -->
    <link href="{{ asset('dist/css/timeline.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Morris Charts CSS -->
    <link href="{{ asset('bower_components/morrisjs/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Fonts -->
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Mostrar/Ocultar menú</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home.index') }}">C.S.R.A. INAIS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                      @if (Auth::guest())
                        <li><a href={{ route('login') }}><i class="fa fa-user fa-fw"></i> Iniciar sesión</a>
                        </li>
                        <li><a href={{ route('register') }}><i class="fa fa-user fa-fw"></i> Registrarse</a>
                        </li>
                      @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}
                          <span class="caret"></span></a>
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesion</a>
                        </li>
                      @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}"><i class="fa fa-dashboard fa-fw"></i> Usuarios</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Componentes del programa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('bid.familias.index') }}">Familias</a>
                                </li>
                                <li>
                                    <a href="#">Integrantes</a>
                                </li>
                                <li>
                                    <a href="#">Registro de visitas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('bid.urbanizaciones.index') }}"><i class="fa fa-table fa-fw"></i> Gestionar urbanizaciones</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><i class="fa fa-edit fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jqui-alert.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/jqui-alert.js') }}"></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap-dialog.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/dataTables.fixedHeader.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.js') }}"></script>
    <script src="{{ asset('js/buttons.print.js') }}"></script>
    <script src="{{ asset('js/buttons.colVis.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/select2_locale_es.js') }}"></script>
    <script src="{{ asset('js/sweetalert-dev.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/es-parsley.js') }}"></script>
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script src="{{ asset('js/jquery.numeric.js') }}"></script>
    <script src="{{ asset('js/gen_validatorv4.js') }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('bower_components/morrisjs/morris.min.js') }}"></script>
    {{-- <script src="{{ asset('js/morris-data.js') }}"></script> --}}
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>
    {{-- Script para evitar el uso de formularios para la generacion del token --}}
    <script type="text/javascript">
        window.Parsley.setLocale('es');
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    </script>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">{{ $titulo }}</h1>
            </div>
        </div>
        @yield('content')
      </br>
    </div>
    @stack('scripts')

</body>

</html>
