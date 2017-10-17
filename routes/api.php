<?php

use Illuminate\Http\Request;

Route::resource('apertura_valvula', 'AperturaValvulaController', ['except' => ['create', 'edit']]);

Route::resource('atrapaniebla','AtrapanieblaController', ['except' => ['create', 'edit']]);
    Route::get('atrapaniebla/listrar_pendientes', 'AtrapanieblaController@listarAtrapanieblasPendientes')->name('atrapaniebla.listarPendientes');
    Route::get('atrapaniebla_google_maps', 'AtrapanieblaController@googleMaps')->name('atrapaniebla.googleMaps');
    Route::post('atrapaniebla/validar', 'AtrapanieblaController@validarAtrapanieblas')->name('atrapaniebla.validar');

Route::resource('Captacion_agua', 'CaptacionAguaController', ['except' => ['create', 'edit']]);

Route::resource('Captacion_estimada', 'CaptacionEstimadaController', ['except' => ['create', 'edit']]);

Route::resource('cierre_valvula', 'CierreValvulaController', ['except' => ['create', 'edit']]);

Route::resource('control_tope_agua', 'ControlTopeAguaController', ['except' => ['create', 'edit']]);

Route::resource('dispositivo','DispositivoController', ['except' => ['create', 'edit']]);
    Route::get('dispositivo_catacion_agua','DispositivoController@captacionAgua')->name('dispositivo.captacionAgua');

Route::resource('estado_atrapanieblas', 'EstadoAtrapanieblaController', ['except' => ['create', 'edit']]);

Route::resource('estado_transaccion', 'EstadoTransaccionController', ['except' => ['create', 'edit']]);

Route::resource('foto_atrapanieblas', 'FotoAtrapanieblaController', ['except' => ['create', 'edit']]);

Route::resource('tipo_bateria','TipoBateriaController', ['only' => ['index']]);

Route::resource('tipo_disenio', 'TipoDisenioController', ['except' => ['create', 'edit']]);

Route::resource('tipo_malla', 'TipoMallaController', ['except' => ['create', 'edit']]);

Route::resource('tipo_servomotor','TipoServoMotorController', ['only' => ['index']]);

Route::resource('tipo_tanque', 'TipoTanqueController', ['except' => ['create', 'edit']]);

Route::resource('user', 'UserController', ['except' => ['create', 'edit']]);

Route::resource('usuario', 'UsuarioController', ['except' => ['create', 'edit']]);

Route::resource('persona', 'PersonaController', ['except' => ['create', 'edit']]);

Route::post('usuario_login', 'UsuarioController@login')->name('usuario.login');



/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/