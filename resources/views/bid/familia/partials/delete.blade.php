@if (!Auth::guest())
    <div class="container">
        <div class="row">
            {!! Form::open(['route' => ['bid.familias.destroy', $familia->id], 'method' => 'DELETE']) !!}
            <div class="col-md-12 col-md-offset-4">
                {!! Form::submit('Eliminar familia completa',['onclick' => 'return confirm("¿Esta seguro de eliminar esta familia y sus registros relacionados?")','class' => 'btn btn-danger']) !!}
                {!! form::close() !!}
            </div>
        </div>
    </div>
@else
    <p class="alert alert-danger">Ed. no esta autorizado para usar esta función</p>
@endif