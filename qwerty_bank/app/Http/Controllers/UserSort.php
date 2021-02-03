<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserSort extends Controller
{
    function SortByName(){

        $data = DB::select('select * from users where isAdmin = 0  ORDER BY name');

        return View ('Users',['data'=>$data]);

    }

    function SortBySurname(){

        $data = DB::select('select * from users where isAdmin = 0  ORDER BY surname');

        return View ('Users',['data'=>$data]);

    }

    function SortByEmail(){

        $data = DB::select('select * from users where isAdmin = 0  ORDER BY email');

        return View ('Users',['data'=>$data]);

    }

    function FindUserBySurname(Request $req){

        $value = $req->input();
        $surname = $value['surname'];

        $data = DB::select('select * from users where surname = ?',[$surname]);

        return View ('Users',['data'=>$data]);
    }


    

}
