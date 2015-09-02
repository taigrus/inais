<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('home','HomeController');

// Authentication routes..
//
//Esta de abajo es una ruta con nombre
//para llamarla desde la vista se debe usar el helper {{ route('nombre_ruta') }}.
Route::get('inicio-de-sesion',[
    'uses'  => 'Auth\AuthController@getLogin',
    'as'    => 'login'
    ]);

Route::post('inicio-de-sesion',[
    'uses'  => 'Auth\AuthController@postLogin',
    'as'    => 'login'
]);

//Route::post('inicio-de-sesion', 'Auth\AuthController@postLogin');
Route::get('fin-de-sesion',[
    'uses'  => 'Auth\AuthController@getLogout',
    'as'    => 'logout'
]);
//Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('registro',[
    'uses'  => 'Auth\AuthController@getRegister',
    'as'    => 'register'
]);

Route::post('registro',[
    'uses'  => 'Auth\AuthController@postRegister',
    'as'    => 'register'
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



//Rutas para BID


Route::group(['middleware' => 'timeout'], function() {

  Route::group(['middleware' => 'auth'], function() {

    //Rutas de administracion
    Route::group(['prefix' => 'admin', 'namespace' => '\Admin'], function(){
        Route::resource('users','UsersController');
    });

    Route::controller('users.datatables', 'Admin\UsersController', [
        'anyData'  => 'users.datatables.data',
    ]);

    //Rutas de familias
    Route::controller('familias.datatables', 'bid\FamiliasController', [
        'anyData'  => 'familias.datatables.data',
    ]);

    Route::group(['prefix' => 'bid', 'namespace' => '\bid'], function(){
        Route::resource('familias','FamiliasController');
    });

    Route::controller('urbanizaciones.datatables', 'bid\UrbanizacionesController', [
        'anyData'  => 'urbanizaciones.datatables.data',
    ]);

    // Route::group(['prefix' => 'bid', 'namespace' => '\bid'], function(){
    //     Route::resource('urbanizaciones','UrbanizacionesController');
    // });

    Route::group(['prefix' => 'bid', 'namespace' => '\bid'], function(){
        //------BID Paises
        Route::resource('paises','PaisesController');
        Route::post('obtienelistapaises','PaisesController@getPaises');
        Route::post('obtienepais/{id}','PaisesController@getPais');
        //------BID Departamentos
        Route::resource('departamentos','DepartamentosController');
        Route::post('listadepartamentos','DepartamentosController@getDepartamentos');
        Route::post('obtienedepartamento/{id}','DepartamentosController@getDepartamento');
        Route::post('obtienedepartamentospais/{idPais}','DepartamentosController@getDepartamentosPais');
        //------BID Provincias
        Route::resource('provincia','ProvinciasController');
        Route::post('listaprovincias','ProvinciasController@getProvincias');
        Route::post('obtieneprovincia/{id}','ProvinciasController@getProvincia');
        Route::post('obtieneprovinciasdepartamento/{idDepartamento}','ProvinciasController@getProvinciasDepartamento');
        //------BID Municipios
        Route::resource('municipio','MunicipiosController');
        Route::post('listamunicipios','MunicipiosController@getMunicipios');
        Route::post('obtienemunicipio/{id}','MunicipiosController@getMunicipio');
        Route::post('obtienemunicipiosprovincia/{idProvincia}','MunicipiosController@getMunicipiosProvincia');
        //------BID Poblaciones
        Route::resource('poblacion','PoblacionesController');
        Route::post('listapoblaciones','PoblacionesController@getPoblaciones');
        Route::post('obtienepoblacion/{id}','PoblacionesController@getPoblacion');
        Route::post('obtienepoblacionesmunicipio/{idMunicipio}','PoblacionesController@getPoblacionesMunicipio');
        //------BID Distritos
        Route::resource('distrito','DistritosController');
        Route::post('listadistritos','DistritosController@getDistritos');
        Route::post('obtienedistrito/{id}','DistritosController@getDistrito');
        Route::post('obtienedistritospoblacion/{idPoblacion}','DistritosController@getDistritosPoblacion');
        //------BID Urbanizaciones
        Route::resource('urbanizaciones','UrbanizacionesController');
        Route::post('listaurbanizaciones','UrbanizacionesController@getUrbanizaciones');
        Route::post('obtieneurbanizacion/{id}','UrbanizacionesController@getUrbanizacion');
        Route::post('obtieneurbanizacionesdistrito/{idDistrito}','UrbanizacionesController@getUrbanizacionesDistrito');
        Route::post('obtienedatoscompeltosurbanizacion/{id}','UrbanizacionesController@getDatosCompeltosUrbanizacion');

    });

  });

});
