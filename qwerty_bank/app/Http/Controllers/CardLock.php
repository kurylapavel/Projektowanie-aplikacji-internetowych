<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\CardsFromDB;

class CardLock extends Controller
{
    function CardLock(Request $req){
        $value = $req->input();
        $id = $value['id'];

        if($value['isLocked'] == 0){
            $isLocked = 1;
        }else{
            $isLocked = 0;
        }

        DB::table('usercards')
        ->where('id',$id)
        ->update(['isLocked' => $isLocked]);

        return (new CardsFromDB)->Cards();
    }
}
