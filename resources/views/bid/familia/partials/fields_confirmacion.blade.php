    <div class="form-group">
        {!! Form::label('folio', 'Folio') !!}
        {!! Form::number('folio', null, array(
         'class' => 'form-control',
         'disabled',
        )) !!}
    </div>
    <div class="form-group">
        {!! Form::label('facilitador_id', 'Facilitador') !!}
        {!! Form::select('facilitador_id', $facilitador_options ,
         Input::old('facilitador'),['class' => 'form-control select2',
          'id' => 'facilitador',
          'disabled']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('via_id', 'Tipo de via') !!}
        {!! Form::select('via_id', $via_options ,
         Input::old('via'),
         ['class' => 'form-control select2', 'id' => 'via',
         'disabled'])
         !!}
    </div>
    <div class="form-group">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control',
         'disabled']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('numero_puerta', 'Número de la puerta del hogar') !!}
        {!! Form::text('numero_puerta', null, ['class' => 'form-control',
         'disabled']) !!}
    </div>
