<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\DB;


class preparation extends Controller
{
    //asd
    function preparation($cardNumber,Request $req){

        //$Db = DB::select('select balance from usercards where cardNumber = ?', [$cardNumber]);
        $Db = DB::table('usercards')
        ->where('cardNumber',$cardNumber)
        ->get();
        
        $balance = $Db[0]->balance;

        $req->validate([
            'CardNumberOne' => 'required | min:4 | max:4 | regex:#^[0-9]+$#',
            'CardNumberTwo' => 'required | min:4 | max:4 | regex:#^[0-9]+$#',
            'CardNumberThree' => 'required | min:4 | max:4 | regex:#^[0-9]+$#',
            'CardNumberFour' => 'required | min:4 | max:4 | regex:#^[0-9]+$#',
            'amount' => "required|numeric|between:5,$balance",
        ],
        [
            'CardNumberOne.min' => 'Bad card number',
            'CardNumberOne.max' => 'Bad card number',
            'CardNumberOne.required' => 'Bad card number',
            'CardNumberOne.regex' => 'Bad card number',

            'CardNumberTwo.min' => 'Bad card number',
            'CardNumberTwo.max' => 'Bad card number',
            'CardNumberTwo.required' => 'Bad card number',
            'CardNumberTwo.regex' => 'Bad card number',
            
            'CardNumberThree.min' => 'Bad card number',
            'CardNumberThree.max' => 'Bad card number',
            'CardNumberThree.required' => 'Bad card number',
            'CardNumberThree.regex' => 'Bad card number',

            'CardNumberFour.min' => 'Bad card number',
            'CardNumberFour.max' => 'Bad card number',
            'CardNumberFour.required' => 'Bad card number',
            'CardNumberFour.regex' => 'Bad card number',

            'amount.required' => 'enter the correct amount',
            'amount.numeric' => 'enter the correct amount',
            'amount.between' => 'enter the correct amount'
        ]);


        $value = $req->input();

        $BIN = $value['CardNumberOne'] . $value['CardNumberTwo'][0] . $value['CardNumberTwo'][1];

        if($BIN == 571566 || $BIN == 471566){
            if($value['CardNumberOne'][0]==4){
                $data = [
                    'scheme' => "visa",
                    'country'=> ['name' => 'Poland'],
                    'bank' => ['name' => 'qwerty']
                ];
            }else{
                $data = [
                    'scheme' => "mastercard",
                    'country'=> ['name' => 'Poland'],
                    'bank' => ['name' => 'qwerty']
                ];
            }
        }else{
            $url = 'https://lookup.binlist.net/' . $BIN;
            $data = Http::get($url)->json();
        }
        
        if(!isset($data['country']['name'])){
            $data ['country']['name']='Unknown';
        }
        if(!isset($data['bank']['name'])){
            $data ['bank']['name']='Unknown';
        }
        if(!isset($data['scheme'])){
            $data ['scheme'] ='Unknown';
        }



        $ToUserCardNumber = $value['CardNumberOne'] . ' ' . $value['CardNumberTwo']  . ' ' . $value['CardNumberThree']  . ' ' . $value['CardNumberFour'];
        $value = $value['amount'] . '^' . $ToUserCardNumber . '^' .$data['bank']['name'];
        
        return view ('preparationToSend' ,['data'=>$data,'value'=>$value,'cardNumber'=>$cardNumber]);

    }
}
