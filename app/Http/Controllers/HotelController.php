<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function mostrartodos(){
        $hoteles = DB::table('hotel')->get();
        return view('/Hotel/index')->with('hoteles',$hoteles);
    }
}
