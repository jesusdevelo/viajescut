<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{
    //
    //select * from Administradores
    public function mostrartodos(){
        $paquetes = DB::table('paquete_turistico')->get();
        return view('/paquetes/index')->with('paquetes',$paquetes);
    }
   public function crear(){
        return view('/paquetes/create');
    }

    public function guardar(Request $req ){
       // dd($req->all());
       try{
            $res=DB::table('paquete_turistico')->insert([
                'nombre_paquete'=>$req->nombre,
                'descripcion'=>$req->descripcion,
                'precio'=>$req->precio,
                'fechas'=>$req->fecha,
                'cupo'=>$req->cupo
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/paquetes/index')->with('mensaje','insertado correctamente');
            else
                return redirect()->back();
    }
}

