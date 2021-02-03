<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Auth;

class CardsFromDB extends Controller
{
    function Cards(){
        if(!Auth::user()->isAdmin){
            return View ('/Permission');
        }

        $data = DB::table('usercards')
        ->get();

        return View ('/Cards',['data'=>$data]);

    }
}
