@extends('layout')
@if (!Auth::guest() and Auth::user()->rol_id==1)

    @section('content')
        <style>
            body { font-size: 140%; }
            div.DTTT { margin-bottom: 0.5em; float: right; }
            div.dataTables_wrapper { clear: both; }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Listado de Usuarios</div>
                        @if (Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @elseif(Session::has('error-message'))
                            <script>
                                BootstrapDialog.alert({
                                    title: 'ATENCION',
                                    message: '{{Session::get('error-message')}}',
                                    type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                                    closable: true, // <-- Default value is false
                                    draggable: true, // <-- Default value is false
                                    buttonLabel: 'Aceptar' // <-- Default value is 'OK'
                                });
                            </script>
                            <p class="alert alert-danger">{{Session::get('error-message')}}</p>
                        @endif
                        <div class="panel-body">
                            <p>
                                <a class="btn btn-success" href="{{route("admin.users.create")}}" role="button">
                                    Nuevo usuario
                                </a>
                            </p>
                            @include('admin.users.partials.table')
                            {{--<script src="{{ asset('js/deleteConfirm.js') }}"></script>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @push('scripts')
    <script>

        $(document).ready(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                stateSave: true,
                languaje: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
                },
                ajax: '{!! route('users.datatables.data') !!}',
                columns: [
                    { data: 'id', name: 'users.id' },
                    { data: 'first_name', name: 'users.first_name' },
                    { data: 'last_name', name: 'users.last_name' },
                    { data: 'email', name: 'uqsers.email' },
                    { data: 'created_at', name: 'users.created_at' },
                    { data: 'updated_at', name: 'users.updated_at' },
                    { data: 'descripcion', name: 'roles.descripcion' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


   </script>

    @endpush
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif