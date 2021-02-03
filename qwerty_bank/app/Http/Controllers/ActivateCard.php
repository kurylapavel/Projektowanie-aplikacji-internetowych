<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UsersFromDB;

class ActivateCard extends Controller
{
    function ActivateCard(Request $req){
        
        $value = $req->input();
        $id = $value['id'];

        DB::table('users')
        ->where('id',$id)
        ->update(['isActivated' => 1]);
        
        return (new UsersFromDB)->Users();
    }
}
