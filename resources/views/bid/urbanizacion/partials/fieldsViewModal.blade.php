<div class="col-md-6 ">
  <div class="form-group">
      {!! Form::label('paisEdicion', '01 País', ['id' => 'paisLabelView']) !!}
      {!! Form::text('paisEdicion',null,[
        'class' => 'form-control ',
        'id' => 'paisVista'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('departamentoEdicion', '02 Departamento', ['id' => 'departamentoLabelView']) !!}
      {!! Form::text('departamentoEdicion', null, [
        'class' => 'form-control',
        'id' => 'departamentoVista'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('provinciaEdicion', '03 Provincia', ['id' => 'provinciaLabelView']) !!}
      {!! Form::text('provinciaEdicion', null, [
        'class' => 'form-control',
        'id' => 'provinciaVista'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('municipioEdicion', '04 Municipio', ['id' => 'municipioLabelView']) !!}
      {!! Form::text('municipioEdicion', null, [
        'class' => 'form-control',
        'id' => 'municipioVista'
        ]) !!}
  </div>
  <div class="form-group">
      {!! Form::label('poblacionEdicion', '05 Poblacion', ['id' => 'poblacionLabelView']) !!}
      {!! Form::text('poblacionEdicion', null, [
        'class' => 'form-control',
        'id' => 'poblacionVista'
        ]) !!}
  </div>
</div>

<div class="col-md-6 ">


<div class="form-group">
    {!! Form::label('distrito_id', '06 Distrito', ['id' => 'distritoLabelView']) !!}
    {!! Form::text('distrito_id', null, [
      'class' => 'form-control',
      'id' => 'distritoVista'
      ]) !!}
</div>

    <div class="form-group">
        {!! Form::label('nombre', '07 Nombre de la urbanización *') !!}
        {!! Form::text('nombre', null, [
                    'class'                         => 'form-control mayusculas',
                    'id'                            => 'nombreVista'
        ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descripcion', '08 Descripción para la urbanización') !!}
        {!! Form::textarea('descripcion', null,
        ['rows'=>'7',
        'class' => 'form-control mayusculas',
        'id' => 'descripcionVista'
         ]) !!}
    </div>

</div>
