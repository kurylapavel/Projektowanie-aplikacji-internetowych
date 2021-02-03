<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Auth;

use Hash;

class sendMoney extends Controller
{
    function sendMoney($value,$cardNumber,Request $req){

        //validation
        $req->validate([
            'password' => 'required'
        ],
        [
            'password.required' => 'Please enter password!'
        ]);

        

        $Data = $req->input();
        $password  = $Data['password'];

        if(!Hash::check($password, Auth::user()->password)){
            return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
            exit();
        }

        $id = Auth::user()->id;

        $toSplit = explode('^',$value);
        $amount = $toSplit[0];
        $ToUserCardNumber = $toSplit[1];

        if($toSplit[2] == 'qwerty'){
            DB::table('usercards')
            ->where('cardNumber',$ToUserCardNumber)
            ->increment('balance', $amount);
        }else{
            $amount = $amount + (($amount/100) * 5);
        }

        DB::table('usercards')
        ->where('cardNumber',$cardNumber)
        ->decrement('balance', $amount);

        DB::table('usercardhistory')
        ->insert(
            [
                'FromUser'=> $cardNumber,
                'ToUser'=> $ToUserCardNumber,
                'amount'=> $amount
            ]
        );

        return View ('/transferSuccess');
        
    }
}
