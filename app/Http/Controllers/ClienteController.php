<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //selec * from clientes
    public function mostrartodos(){
        $clientes = DB::table('cliente')->get();
        return view('/clientes/index')->with('clientes',$clientes);
    }
    public function crear(){
        return view('/clientes/create');
    }

    public function guardar(Request $req ){
        //dd($req->all());
       try{
            $res=DB::table('cliente')->insert([
                'nombre'=>$req->nombre,
                'correo'=>$req->correo,
                'telefono'=>$req->telefono,
                'direccion'=>$req->direccion,
                'historial'=>$req->historial
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/clientes/index')-> with('mensaje','insertado correctamente');
            else
                return redirect()->back();
        }
     
}
