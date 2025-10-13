<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //selec * from clientes
    public function mostrartodos(){
        $clientes = DB::table('cliente')->where('estado','ACTIVO')->get();
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
    public function editar($id){
        $cliente = DB::table('cliente')->where('id_cliente',$id)->first();
        return view('/clientes/editar')->with('cliente',$cliente);
    }

    public function actualizar(Request $req,$id ){
       //dd($req->all());
       try{
            $res=DB::table('cliente')->where('id_cliente',$id)->update([
                'nombre'=>$req->nombre,
                'correo'=>$req->correo,
                'telefono'=>$req->telefono,
                'direccion'=>$req->direccion,
                'historial'=>$req->historial
            ]);
            DB::commit();
            return redirect('/clientes/index')->with('mensaje','actualizado correctamente');
        }catch(Exception $e){
            DB::rollBack();
            return $e->getMessage();
            }
    }
    
        public function mostrar($id){
        $cliente = DB::table('cliente')->where('id_cliente',$id)->first();
        return view('/clientes/mostrar')->with('cliente',$cliente);
    }

    public function inhabilitar(Request $req,$id ){
       try{
            $res = DB::table('cliente')
                ->where('id_cliente', $id)
                ->update(['estado' => 'inactivo']);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/clientes/index')->with('mensaje','inhabilitado correctamente');
            else{
                return redirect()->back();
            }
    }
    
     
}