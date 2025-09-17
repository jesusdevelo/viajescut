<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;

class Administradorcontroller extends Controller
{
    //mostrar todos los registros

    //select * from Administradores
    public function mostrartodos(){
        $administradores = DB::table('administrador')->get();
        return view('/admin/index')->with('administradores',$administradores);
    }

    public function crear(){
        return view('/admin/create');
    }

    public function guardar(Request $req ){
       // dd($req->all());
       try{
            $res=DB::table('administrador')->insert([
                'nombre'=>$req->nombre,
                'correo'=>$req->correo,
                'telefono'=>$req->telefono,
                'password'=>$req->password
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/admin/index')->with('mensaje','insertado correctamente');
            else
                return redirect()->back();
    }
}
