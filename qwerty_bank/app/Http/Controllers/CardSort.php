<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CardSort extends Controller
{
    function FindCardBySurname (Request $req){
        $value = $req->input();
        $cardNumber = $value['cardName'];

        $data = DB::select('select * from usercards where cardNumber = ?',[$cardNumber]);

        return View ('Cards',['data'=>$data]);

    }
}
