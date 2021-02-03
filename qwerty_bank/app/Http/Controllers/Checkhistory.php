<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Auth;

class Checkhistory extends Controller
{
    function Checkhistory($cardNumber){
        
        $userCard = $cardNumber;

        $data = DB::table('usercardhistory')
        ->where('FromUser', $userCard)
        ->get();

        $from = $data;

        $data = DB::table('usercardhistory')
        ->where('ToUser', $userCard)
        ->get();

        $to = $data;

        return view ('history',['from'=>$from,'to'=>$to]);
    }
    
}
