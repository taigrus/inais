    <div class="form-group">
        {!! Form::label('nombre', '01 Nombre *') !!}
        {!! Form::text('nombre', null, [
                    'class'                         => 'form-control mayusculas',
                    'placeholder'                   => 'Ingrese el nombre de la urbanización/zona',
                    'required',
                    'id'                            => 'nombreEdicion',
                    'data-parsley-required-message' => 'Se requiere el nombre',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-pattern'          => '/^([a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.+-+ ]{3,50})+$/',
                    'data-parsley-minlength'        => '3',
                    'data-parsley-maxlength'        => '50'
        ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descripcion', '02 Descripción') !!}
        {!! Form::textarea('descripcion', null,
        ['rows'=>'7',
        'class' => 'form-control mayusculas',
        'placeholder' => 'Ingrese una descripción adicional para la urbanización',
        'id' => 'descripcionEdicion',
        'data-parsley-trigger' => 'change focusout',
        'data-parsley-minlength' => "10",
        'data-parsley-maxlength' => "250",
        'data-parsley-validation-threshold' => "10",
        'data-parsley-minlength-message' => "Vamos! al menos ingrese 10 caracteres en la descripción.."
         ]) !!}
    </div>
    <div class="form-group">
        {!! Form::text('idOculto', null,
        ['class' => 'form-control',
        'id' => 'idOculto',
        'style' => 'display:none'
         ]) !!}
    </div>
