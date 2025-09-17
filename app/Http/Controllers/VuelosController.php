<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class VuelosController extends Controller
{
    //
    public function mostrartodos(){
        $vuelos = DB::table('vuelo')->get();
        return view('/vuelos/index')->with('vuelos',$vuelos);
    }
}
