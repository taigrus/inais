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
                    { data: 'action', name: 'action', orderable: false, searchable: false},
                    { data: 'action2', name: 'action2', orderable: false, searchable: false}
                ]
            });
        });
        /**
         * Created by rburgos on 29-07-15.
         */
        /*
         /*
         Exemples :
         <a href="posts/2" data-method="delete" data-token="{{csrf_token()}}">
         - Or, request confirmation in the process -
         <a href="posts/2" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
         */


        $(document).on("click",".delete2", function() {

            var laravel = {

                initialize: function() {

                    this.methodLinks = $('a[data-method]');
                    this.token = $('a[data-token]');
                    BootstrapDialog.alert("follando");
                    this.registerEvents();
                },

                registerEvents: function() {
                    this.methodLinks.on('click', this.handleMethod);
                },

                handleMethod: function(e) {
                    var link = $(this);
                    var httpMethod = link.data('method').toUpperCase();
                    var form;

                    // If the data-method attribute is not PUT or DELETE,
                    // then we don't know what to do. Just ignore.
                    if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                        return;
                    }

                    // Allow user to optionally provide data-confirm="Are you sure?"
                    if ( link.data('confirm') ) {
                        if ( ! laravel.verifyConfirm(link) ) {
                            return false;
                        }
                    }

                    form = laravel.createForm(link);
                    form.submit();

                    e.preventDefault();
                },

                verifyConfirm: function(link) {
                    return BootstrapDialog.confirm(link.data('confirm'));
                    //return confirm(link.data('confirm'));
                },

                createForm: function(link) {
                    var form =
                            $('<form>', {
                                'method': 'POST',
                                'action': link.attr('href')
                            });

                    var token =
                            $('<input>', {
                                'type': 'hidden',
                                'name': '_token',
                                'value': link.data('token')
                            });

                    var hiddenInput =
                            $('<input>', {
                                'name': '_method',
                                'type': 'hidden',
                                'value': link.data('method')
                            });

                    return form.append(token, hiddenInput)
                            .appendTo('body');
                }
            };

            laravel.initialize();

        });
    </script>

    @endpush
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif