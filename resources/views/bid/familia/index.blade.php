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
                    <div class="panel-heading">Listado de Famililas registradas</div>
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
                            <a class="btn btn-success" href="{{route("bid.familias.create")}}" role="button">
                                Nueva Familia
                            </a>
                        </p>
                        @include('bid.familia.partials.table')
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
        var table=$('#familias-table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            //dom: 'Bfrtip',
            //buttons: [
            //    'copy', 'csv', 'excel', 'pdf', 'print'
            //],
            languaje: {
                "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
            },
            ajax: '{!! route('familias.datatables.data') !!}',
            columns: [
                { data: 'id', name: 'familia_bid.id' },
                { data: 'folio', name: 'familia_bid.folio' },
                { data: 'facilitador', name: 'facilitador_bid.nombre' },
                { data: 'distrito', name: 'distrito.nombre' },
                { data: 'urbanizacion', name: 'urbanizacion.nombre' },
                { data: 'via', name: 'via.nombre', visible: false},
                { data: function(d){return d.via + ' ' + d.direccion + ' #' + d.numero_puerta;}, name: 'familia_bid.direccion'},
                { data: 'numero_puerta', name: 'familia_bid.numero_puerta', visible: false },
                { data: 'creada', name: 'familia_bid.created_at' },
                { data: 'actualizada', name: 'familia_bid.updated_at' },
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