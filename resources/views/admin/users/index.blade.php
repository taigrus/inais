@extends('layout')
@if (!Auth::guest() and Auth::user()->type_id==1)

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
            var table = $('#users-table').DataTable({

                tableTools: {
                    "aButtons": [
                        "copy",
                        "csv",
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sPdfOrientation": "landscape",
                            "sPdfMessage": "Archivo exportado desde CSRA INAIS."
                        },
                        "print" ]},
                processing: true,
                serverSide: true,
                languaje: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
                },
                ajax: '{!! route('users.datatables.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'type_id', name: 'type_id' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            var tt = new $.fn.dataTable.TableTools( table );
            $( tt.fnContainer() ).insertAfter('div.dataTables_wrapper');
        });


   </script>

    @endpush
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif