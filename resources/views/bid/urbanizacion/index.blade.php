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
                            <a href="#"
                               data-toggle="modal"
                               data-target="#modalurbanizacion"
                               class="boton-nuevaajax btn btn-success">
                                <span class="glyphicon glyphicon-hand-left"></span>
                                Nueva urbanización/Zona (AJAX)
                            </a>
                        </p>
                        @include('bid.urbanizacion.partials.table')
                        {{--<script src="{{ asset('js/deleteConfirm.js') }}"></script>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['bid.urbanizaciones.destroy', ':URB_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
    @include('bid.urbanizacion.modalurbanizacion')
@endsection

@section('scripts')
<script>

    $(document).ready(function() {



        $('#urbanizaciones-table tfoot th').each( function () {
            var title = $('#urbanizaciones-table thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" placeholder=' + title + ' />' );
        } );
        var table=$('#urbanizaciones-table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            responsive: true,
            stateSave: true,
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
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                        .search( this.value )
                        .draw();
            } );
        } );
        //table.buttons().container()
        //        .insertAfter( $('.panel-body', table.table().container() ) );

        //Eliminar la urbanizacion por boton de tabla con AJAX
        $('#urbanizaciones-table tbody').on('click', '.btn-borrar', function(e){
            e.preventDefault();

            var id = $(this).data('id');
            var form = $('#form-delete');
            var url=form.attr('action').replace(':URB_ID',id);
            var data = form.serialize();
            jqUI.confirm("¿Segur@ que desea eleminar permanentemente este registro?",function(yes){
                if(yes) {
                    $.post(url, data, function (result) {
                        if(result.tipo!='ok') {
                            jqUI.alert(result.mensaje);
                        }else{
                            table
                             .row($(this).parents('tr'))
                             .remove()
                             .draw();
                        }
                    }).fail(function (result) {
                        jqUI.alert('Error inesperado al elimimar el registro');
                    });
                }
            })
        });

        var nombreformulario='altaUrbanizacionesmodal';
        $(document).ready(function() {

            //nueva urbanizacion por ajax
            $('#btn-nueva').click(function (e) {
                e.preventDefault();
                var frmvalidator2 = new Validator('altaUrbanizacionesmodal');  //where myform is the name/id of your form
                frmvalidator2.addValidation("nombre", "req", "Por favor ingrese el NOMBRE de la urbanización");
                frmvalidator2.addValidation("nombre", "maxlen=50", "Se permiten 50 caracteres como máximo en el nombre");
                frmvalidator2.addValidation("descripcion", "maxlen=250", "Se permiten 250 caracteres como máximo en la descripción");
                var form = $('#altaUrbanizacionesmodal');
                var url = form.attr('action');
                var data = form.serialize();
                $.post(url, data, function (result) {
                    if(result.tipo!='ok') {

                        jqUI.alert(result.mensaje);
                    }else{

                        $('#modalurbanizacion').modal('hide');
                        table.clear();
                        table.rows.add(result);
                        jqUI.alert('todo ok');
                    }
                }).fail(function (result) {
                    jqUI.alert('Error inesperado al adicionar el registro');
                });


            });
        });

    });




    </script>

@endsection



@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif