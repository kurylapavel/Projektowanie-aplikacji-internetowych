<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\CardsFromDB;

class ChangeBalance extends Controller
{
    function ChangeBalance(Request $req){

        $req->validate([
            'amount' => 'required | numeric | between:-1000000.00,999999.99'
        ],
        [
            'amount.numeric' => 'enter the correct amount',
            'amount.between' => 'enter the correct amount'
        ]);

        $value = $req->input();

        DB::table('usercards')
        ->where('id',$value['id'])
        ->update(['balance'=>$value['amount']]);

        return (new CardsFromDB)->Cards();
    }
}
