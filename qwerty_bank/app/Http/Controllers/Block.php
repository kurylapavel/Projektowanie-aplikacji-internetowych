<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Block extends Controller
{
    function Block(Request $req){

        $value = $req->input();

        $cardNumber = $value['cardNumber'];

        DB::table('usercards')
        ->where('cardNumber',$cardNumber)
        ->update(['isLocked'=>1]);

        return View('/home');

    }
}
