@if($errors->any())
    <style>ul { list-style: none;}</style>
    <div class="alert alert-danger" role="aler">
        <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Por favor verifique los mensajes de error:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif