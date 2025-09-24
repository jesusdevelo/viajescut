<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Database\Events\TransactionBeginning;
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

       //dd($req->all());
       DB::beginTransaction();
       try{
            $id=DB::table('administrador')->insertGetId([
                'nombre'=>$req->nombre,
                'correo'=>$req->correo,
                'telefono'=>$req->telefono,
                'imagen'=>"imagenes/administradores/imagen_default.jpg",
                'password'=>$req->password,
                'estado'=>'ACTIVO',
            ]);
            if($id>0){
                if($req->hasFile('imagen')){
                    $imagen = $req->imagen;
                    $extension = $imagen->extension();
                    $nuevo_nombre = "administrador_".$id.".".$extension;
                    $ruta = $imagen->storeAs('imagenes/administradores/', $nuevo_nombre,'public');
                    DB::table('administrador')->where('id_admin',$id)->update([
                        'imagen'=> asset('storage/'.$ruta)
                    ]);
                }
            }
            DB::commit();
            return redirect('/admin/index')->with('mensaje','agregado correctamente');
        }catch(Exception $e){
            DB::rollBack();
            return $e->getMessage();
            }
    }
    public function editar($id){
        $administrador = DB::table('administrador')->where('id_admin',$id)->first();
        return view('/admin/editar')->with('admin',$administrador);
    }
    public function actualizar(Request $req,$id ){
       //dd($req->all());
       DB::beginTransaction();
       try{
            $res=DB::table('administrador')->where('id_admin',$id)->update([
                'nombre'=>$req->nombre,
                'correo'=>$req->correo,
                'telefono'=>$req->telefono
            ]);
            if($req->hasFile('imagen')){
                    $imagen = $req->imagen;
                    $extension = $imagen->extension();
                    $nuevo_nombre = "administrador_".$id.".".$extension;
                    $ruta = $imagen->storeAs('imagenes/administradores/', $nuevo_nombre,'public');
                    DB::table('administrador')->where('id_admin',$id)->update([
                        'imagen'=> asset('storage/'.$ruta)
                    ]);
                }
                DB::commit();
                return redirect('/admin/index')->with('mensaje','actualizado correctamente');
        }catch(Exception $e){
            DB::rollBack();
            return $e->getMessage();
            }
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
