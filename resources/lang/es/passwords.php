<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reminder Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    //Asi se crean arrays de mensajes traducidos (passwords.credentials.invalid)
    "credentials" => array(
        "invalid" => "El E-mail o la contraseña no son validos",
    ),

    "password" => "Las contraseñas deben contener al menos 6 caracteres y coincidir.",

    "user"     => "No podemos encontrar a un usuario con ese correo electrónico.",

    "token"    => "Este token de recuperación de contraseña es inválido.",

    "sent"     => "¡Recordatorio de contraseña enviado!",

    "reset"    => "¡Tu contraseña ha sido restablecida!",

];
