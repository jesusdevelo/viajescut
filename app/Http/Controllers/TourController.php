<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;

class TourController extends Controller
{
    //
    public function mostrartodos(){
        $Tours = DB::table('tour')->get();
        return view('/tour/index')->with('Tours',$Tours);
    }
    public function crear(){
        return view('/tour/create');
    }

    public function guardar(Request $req ){
       // dd($req->all());
       try{
            $res=DB::table('tour')->insert([
                'nombre'=>$req->nombre,
                'destino'=>$req->destino,
                'duracion'=>$req->duracion,
                'precio'=>$req->precio,
                'lugares'=>$req->lugares
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/tour/index')->with('mensaje','insertado correctamente');
            else
                return redirect()->back();
    }
}

