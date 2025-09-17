<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{
    //
    //select * from Administradores
    public function mostrartodos(){
        $paquetes = DB::table('paquete_turistico')->get();
        return view('/paquetes/index')->with('paquetes',$paquetes);
    }
}
