<script type="text/javascript">

    $(document).ready(function() {
        //alert(nombreformulario);
        var frmvalidator = new Validator(nombreformulario);  //where myform is the name/id of your form
        frmvalidator.addValidation("nombre", "req", "Por favor ingrese el NOMBRE de la urbanización");
        frmvalidator.addValidation("nombre", "maxlen=50", "Se permiten 50 caracteres como máximo en el nombre");
        frmvalidator.addValidation("descripcion", "maxlen=250", "Se permiten 250 caracteres como máximo en la descripción");
    });
</script>