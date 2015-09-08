<div class="col-md-6 ">
  <div class="form-group">
      {!! Form::label('paisEdicion', '01 País', ['id' => 'paisEdicionLabel']) !!}
      {!! Form::select('paisEdicion', array('0' => '---Seleccione el país---','1' => 'Bolivia'),Input::old('paisEdicion'),[
        'class' => 'form-control select2',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'id' => 'paisEdicion',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere el país',
        'data-parsley-min-message' => 'Debe seleccionar el país'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('departamentoEdicion', '02 Departamento', ['id' => 'departamentoEdicionLabel']) !!}
      {!! Form::select('departamentoEdicion', array('0' => '---Seleccione el departamento---'), null, [
        'class' => 'form-control select2',
        'id' => 'departamentoEdicion',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere el departamento',
        'data-parsley-min-message' => 'Debe seleccionar el departamento'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('provinciaEdicion', '03 Provincia', ['id' => 'provinciaEdicionLabel']) !!}
      {!! Form::select('provinciaEdicion', array('0' => '---Seleccione la provincia---'), null, [
        'class' => 'form-control select2',
        'id' => 'provinciaEdicion',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere la provincia',
        'data-parsley-min-message' => 'Debe seleccionar la provincia'
        ]) !!}
  </div>

  <div class="form-group">
      {!! Form::label('municipioEdicion', '04 Municipio', ['id' => 'municipioEdicionLabel']) !!}
      {!! Form::select('municipioEdicion', array('0' => '---Seleccione el municipio---'), null, [
        'class' => 'form-control select2',
        'id' => 'municipioEdicion',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere el municipio',
        'data-parsley-min-message' => 'Debe seleccionar el municipio'
        ]) !!}
  </div>
  <div class="form-group">
      {!! Form::label('poblacionEdicion', '05 Poblacion', ['id' => 'poblacionEdicionLabel']) !!}
      {!! Form::select('poblacionEdicion', array('0' => '---Seleccione la población---'), null, [
        'class' => 'form-control select2',
        'id' => 'poblacionEdicion',
        'data-parsley-trigger' => 'change focusout',
        'required',
        'data-parsley-type' => 'integer',
        'data-parsley-min' => '1',
        'data-parsley-required-message' => 'Se requiere la población',
        'data-parsley-min-message' => 'Debe seleccionar la población'
        ]) !!}
  </div>
</div>

<div class="col-md-6 ">


<div class="form-group">
    {!! Form::label('distrito_id', '06 Distrito', ['id' => 'distritoEdicionLabel']) !!}
    {!! Form::select('distrito_id', array('0' => '---Seleccione el distrito---'), null, [
      'class' => 'form-control select2',
      'id' => 'distritoEdicion',
      'data-parsley-trigger' => 'change focusout',
      'required',
      'data-parsley-type' => 'integer',
      'data-parsley-min' => '1',
      'data-parsley-min-message' => 'Debe seleccionar el distrito',
      'data-parsley-required-message' => 'Se requiere el distrito'

      ]) !!}
</div>

    <div class="form-group">
        {!! Form::label('nombre', '07 Nombre de la urbanización *') !!}
        {!! Form::text('nombre', null, [
                    'class'                         => 'form-control mayusculas',
                    'id'                            => 'nombreEdicion',
                    'placeholder'                   => 'Ingrese el nombre de la urbanización/zona',
                    'required',
                    'data-parsley-required-message' => 'Se requiere el nombre',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-pattern'          => '/^([a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ().+-+ ]{3,50})+$/',
                    'data-parsley-minlength'        => '3',
                    'data-parsley-maxlength'        => '50'
        ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descripcion', '08 Descripción para la urbanización') !!}
        {!! Form::textarea('descripcion', null,
        ['rows'=>'7',
        'class' => 'form-control mayusculas',
        'id' => 'descripcionEdicion',
        'placeholder' => 'Ingrese una descripción adicional para la urbanización',
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
</div>
