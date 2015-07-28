@extends('layout')
@if (!Auth::guest())
@section('content')
    <div class="container">
        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Familias registradas en el programa</div>
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>
                            <a class="btn btn-success" href="{{route("bid.familias.create")}}" role="button">
                                Nueva familia
                            </a>
                        </p>
                        @include('bid.familia.partials.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#familias-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('familias.datatables.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'folio', name: 'folio' },
                { data: 'direccion', name: 'direccion' },
                { data: 'latitud', name: 'latitud' },
                { data: 'longitud', name: 'longitud' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif