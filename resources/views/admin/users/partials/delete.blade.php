@if (!Auth::guest() and Auth::user()->rol_id==1)
    <style>
        .modal-footer {
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #b83535;
            color: lightyellow;
            -webkit-border-bottom-left-radius: 5px;
            -webkit-border-bottom-right-radius: 5px;
            -moz-border-radius-bottomleft: 5px;
            -moz-border-radius-bottomright: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .modal-header {
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #b83535;
            color: lightyellow;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
    </style>
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">

        <a href="#" class="btn btn-sm btn-danger"
           data-toggle="modal"
           data-target="#eliminiar">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            Eliminar el usuario
        </a>

        <div class="modal fade" id="eliminiar" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Eliminación de usuario!!!</h4>
                    </div>
                    <div class="modal-body">
                        <h2><small><span style="color: darkred">¿Estas segur@ de eliminar permanentemente este registro?</span></small></h2>
                        {!! Form::model($user, ['route' => ['admin.users.show', $user->id], 'method' => 'GET']) !!}
                        @include('admin.users.partials.fields_confirmacion')
                        {!! form::close() !!}
                    </div>
                    <div class="modal-footer">
                        {!!  \inais\Helpers\borrado::buttonDelete('admin.users.destroy', $user->id)  !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $('[data-delete]').click(function(e){
            e.preventDefault();

            // If the user confirm the delete
            // Get the route URL
            var url = $(this).prop('href');
            // Get the token
            var token = $(this).data('delete');
            // Create a form element
            var $form = $('<form/>', {action: url, method: 'post'});
            // Add the DELETE hidden input method
            var $inputMethod = $('<input/>', {type: 'hidden', name: '_method', value: 'delete'});
            // Add the token hidden input
            var $inputToken = $('<input/>', {type: 'hidden', name: '_token', value: token});
            // Append the inputs to the form, hide the form, append the form to the <body>, SUBMIT !
            $form.append($inputMethod, $inputToken).hide().appendTo('body').submit();
        });
    </script>
    {{--<script src="{{ asset('js/deleteConfirm.js') }}"></script>--}}
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif
