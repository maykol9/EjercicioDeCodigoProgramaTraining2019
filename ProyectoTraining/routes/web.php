<?php



Route::get('/', function () {
    return view('vistas/verUsuarios');
});

Route::get('/repositorios', function () {
    return view('vistas/ListarRepositorios');
});



