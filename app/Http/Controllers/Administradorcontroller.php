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
        $administradores = DB::table('administrador')->where('estado','ACTIVO')->get();
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
                'password'=>$req->password,
                'estado'=>'ACTIVO'

            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/admin/index')->with('mensaje','insertado correctamente');
            else
                return redirect()->back();
    }
    public function editar($id){
        $administrador = DB::table('administrador')->where('id_admin',$id)->first();
        return view('/admin/editar')->with('admin',$administrador);
    }
    public function actualizar(Request $req,$id ){
       // dd($req->all());
       try{
            $res=DB::table('administrador')->where('id_admin',$id)->update([
                'nombre'=>$req->nombre,
                'correo'=>$req->correo,
                'telefono'=>$req->telefono
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/admin/index')->with('mensaje','actualizado correctamente');
            else
                return redirect()->back();
    }

    public function mostrar($id){
        $administrador = DB::table('administrador')->where('id_admin',$id)->first();
        return view('/admin/mostrar')->with('admin',$administrador);
    }

    public function inhabilitar(Request $req,$id ){
       // dd($req->all());
       try{
            $res=DB::table('administrador')->where('id_admin',$id)->update([
                'estado'=>'inactivo',
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/admin/index')->with('mensaje','inhabilitado correctamente');
            else
                return redirect()->back();
    }

}
