@extends('layout')
@if (!Auth::guest() and Auth::user()->rol_id==1)

@section('content')
    <style>
        body { font-size: 140%; }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Urbanizaciones y zonas registradas</div>
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
                            <a class="btn btn-success" href="{{route("bid.urbanizaciones.create")}}" role="button">
                                Nueva Urbanización/Zona
                            </a>
                        </p>
                        @include('bid.urbanizacion.partials.table')
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
        var table=$('#urbanizaciones-table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            responsive: true,
            //dom: 'Bfrtip',
            //buttons: [
            //    'copy', 'csv', 'excel', 'pdf', 'print'
            //],
            languaje: {
                "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
            },
            ajax: '{!! route('urbanizaciones.datatables.data') !!}',
            columns: [
                { data: 'id', name: 'urbanizacion.id' },
                { data: 'nombre', name: 'urbanizacion.nombre' },
                { data: 'descripcion', name: 'urbanizacion.descripcion' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        //table.buttons().container()
        //        .insertAfter( $('.panel-body', table.table().container() ) );
    });



    </script>

@endpush
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif