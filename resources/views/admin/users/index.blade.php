@extends('layout')
@if (!Auth::guest() and Auth::user()->type_id==1)
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Listado de Usuarios</div>
                        @if (Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                        <div class="panel-body">
                            <p>
                                <a class="btn btn-success" href="{{route("admin.users.create")}}" role="button">
                                    Nuevo usuario
                                </a>
                            </p>
                            @include('admin.users.partials.table')
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
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
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
        });
    </script>
    @endpush
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif