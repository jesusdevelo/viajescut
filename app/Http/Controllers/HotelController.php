<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function mostrartodos(){
        $hoteles = DB::table('hotel')->get();
        return view('/Hotel/index')->with('hoteles',$hoteles);

    }
   public function crear(){
        return view('/Hotel/create');
    }

    public function guardar(Request $req ){
       // dd($req->all());
       try{
            $res=DB::table('hotel')->insert([
                'nombre'=>$req->nombre,
                'ubicacion'=>$req->ubicacion,
                'categoria'=>$req->categoria,
                'precio'=>$req->precio,
                'disponibilidad'=>$req->disponibilidad
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            }
        if($res)
                return redirect('/Hotel/index')->with('mensaje','insertado correctamente');
            else
                return redirect()->back();
    }
}
