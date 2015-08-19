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

    public static function ajaxModalUrbanizaciones()
    {
        dd('entro');
        if (!empty($_POST["namas"])&&!empty($_POST["umur"])) {
            $namas=$_POST["namas"];
            $umur=$_POST["umur"];
            $query=mysql_query("INSERT INTO usr (nama,umur) values('$namas','$umur') ");

            // if($query){
            echo ' <div class="alert alert-success">
		   <ul class="fa-ul">
           <li>
           <i class="fa fa-exclamation-triangle fa-li fa-lg"></i>
           <strong>Your data has been save</strong> !
           </li>
           </ul>
           </div>';
        }
        else{
            echo ' <div class="alert alert-danger">
               <ul class="fa-ul">
               <li>
               <i class="fa fa-exclamation-triangle fa-li fa-lg"></i>
               <strong>Error save your data</strong> !
               </li>
               </ul>
               </div>';
        }
    }
}




