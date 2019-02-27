<?php

namespace App\Http\Controllers\ControladoresVista;

use Illuminate\Http\Request;
//use App\Http\Controllers\ControladoresVista\ControladorBase;

class VerUsuariosControlador
{
    public function ventanaVerUsuarios(){
        $vista = view('vistas/VerUsuarios');
        $this->registrarAcciones($vista);
        return $vista;
    }
}