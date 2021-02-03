<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Auth;

class newCard extends Controller
{
    function CreateNewCard(Request $req){


        //validation
        $req->validate([
            'expiry' => 'required',
            'cardType' => 'required',  
        ],
        [
           'expiry.required' => 'Choose card expiry date',
           'cardType.required' => 'Choose card type',
        ]);

        $value = $req->input();        

        if($value['cardType'] == 'mastercard'){
            $cardType = '5';
        }elseif($value['cardType'] == 'visa'){
            $cardType = '4';
        }
        //generare card number
        while(true){
            $cardNumber = $cardType . '715 66';
        
            for($i=0;$i<10;$i++){
    
                if($i==2 || $i == 6){
                    $cardNumber = $cardNumber . ' ';
                }
    
                $cardNumber = $cardNumber . random_int(0, 9);
                
            }
            //check for uniqueness card number
            $number = DB::table('usercards')
            ->where('cardNumber',$cardNumber)
            ->get();
            
            if(!isset($number[0])){
                break;
            }
            
        }
        

        //creating variables before writing in DB
        $name = Auth::user()->name;
        $surname = Auth::user()->surname;
        $userId = Auth::user()->id;

        $expiry = $value['expiry'];

        $year = date("y")+$expiry;
        $endDate = date("m") . '/' . $year;
        
        DB::table('usercards')
        ->insert(['userId' => $userId,'cardNumber' => $cardNumber, 'name'=>$name,'surname'=> $surname,'cardType'=> $cardType, 'IsLocked' => 0, 'balance' => 0, 'endDate' => $endDate]);

        return View ('cardSuccess');
    }

    


}
