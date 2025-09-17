<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class TourController extends Controller
{
    //
    public function mostrartodos(){
        $Tours = DB::table('tour')->get();
        return view('/tour/index')->with('Tours',$Tours);
    }
}
