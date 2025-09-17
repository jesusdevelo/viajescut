<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;

class VuelosController extends Controller
{
    //
    public function mostrartodos(){
        $vuelos = DB::table('vuelo')->get();
        return view('/vuelos/index')->with('vuelos',$vuelos);
    }
public function crear(){
        return view('/vuelos/create');
    }

    public function guardar(Request $req ){
       // dd($req->all());
       try{
            $res=DB::table('vuelo')->insert([
                'aereolinea'=>$req->aereolinea,
                'origen'=>$req->origen,
                'destino'=>$req->destino,
                'salida'=>$req->salida,
                'llegada'=>$req->llegada,
                'costo'=>$req->costo
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/vuelos/index')->with('mensaje','insertado correctamente');
            else
                return redirect()->back();
    }
}

