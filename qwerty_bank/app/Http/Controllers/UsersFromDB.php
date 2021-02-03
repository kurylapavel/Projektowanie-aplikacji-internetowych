<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Auth;

class UsersFromDB extends Controller
{
    function Users (){

        if(!Auth::user()->isAdmin){
            return View ('/Permission');
        }

        $data = DB::table('users')
        ->where('isAdmin',0)
        ->get();
        
        return View ('/Users',['data'=>$data]);

    }
}
