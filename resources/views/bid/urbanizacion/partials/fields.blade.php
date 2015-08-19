    <div class="form-group">
        {!! Form::label('nombre', '*01 Nombre') !!}
        {!! Form::text('nombre', null, array(
         'class' => 'form-control mayusculas',
         'placeholder' => 'Ingrese el nombre de la urbanización/zona',
         'min' => '1',
         'max' => '50',
         'id' => 'nombre'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('descripcion', '02 Descripción') !!}
        {!! Form::textarea('descripcion', null, ['cols'=>'25', 'rows'=>'7','class' => 'form-control mayusculas', 'placeholder' => 'Ingrese una descripción adicional para la urbanización']) !!}
    </div>

<script>
    $(document).ready(function() {
        $('#nombre').focus();
    });
</script>