@if (!Auth::guest() and Auth::user()->type_id==1)

    <div class="container">

            <div class="col-md-12 col-md-offset-4">
                <a class="delete" href=" {{route('admin.users.destroy', $user->id)}} " data-method="DELETE" data-token="{{csrf_token()}}" . data-confirm="Are you sure?">
                    <i class="fa fa-check"></i> Yes I&#39;m sure
                </a>
            </div>


        </div>
    </div>

    <script src="{{ asset('js/deleteConfirm.js') }}"></script>
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif

