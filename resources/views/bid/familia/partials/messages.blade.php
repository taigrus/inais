@if($errors->any())
    <div class="alert alert-danger" role="aler">
        <p>Por favor verifique los mensajes de error:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif