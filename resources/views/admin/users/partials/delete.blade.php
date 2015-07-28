@if (!Auth::guest() and Auth::user()->type=='admin')
    <div class="container">
        <div class="row">

            {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'DELETE']) !!}
            <div class="col-md-12 col-md-offset-4">
            {!! Form::submit('Eliminar usuario',['onclick' => 'return confirm("¿Esta seguro de eliminar este registro?")','class' => 'btn btn-danger']) !!}
            {!! form::close() !!}
            </div>
        </div>
    </div>
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif