<?php
/**
 * Created by PhpStorm.
 * User: rburgos
 * Date: 30-07-15
 * Time: 10:57 AM
 */

namespace inais\Helpers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class borrado
    {

    public static function buttonDelete($ruta, $id)
    {

        $format = '<a href="%s" data-toggle="tooltip" data-delete="%s" title="%s" class="btn btn-danger"><i class="fa fa-trash-o"> Borrar</i></i></a>';
        //$link = URL::route('admin.users.destroy', ['id' => Input::get('id')]);
        $link = URL::route($ruta, $id);
        $token = csrf_token();
        $title = "Borrar!!!";
        return sprintf($format, $link, $token, $title);
    }

}


