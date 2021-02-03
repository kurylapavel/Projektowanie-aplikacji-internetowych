<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>qwerty</title>
    @include('layouts.header')
    <link rel="stylesheet" href="/css/home.css">
</head>
@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Http;
    $id = Auth::user()->id; 
    $isActivated = Auth::user()->isActivated;
    $data = DB::table('usercards')
    ->where('userId',$id)
    ->get();
    if (isset($data[0])) {
        $isExist = true;
    }else{
        $isExist = false;
    }
    
    $url = 'https://api.exchangeratesapi.io/latest?base=USD';
    $rates = Http::get($url)->json();
    //dd($rates);
    //echo $rates['rates']['EUR'];
@endphp



<body>
    <div class="rates">
        

          <table class="styled-table">
            <thead>
                <tr>
                    <th>Currency</th>
                    <th>Bid</th>
                    <th>Ask</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">EUR</td>
                    <td>{{$rates['rates']['EUR']}}</td>
                    <td>{{$rates['rates']['EUR']+0.0332157912}}</td>
                </tr>
                <tr>
                    <td scope="row">PLN</td>
                    <td>{{$rates['rates']['PLN']}}</td>
                    <td>{{$rates['rates']['PLN']+0.0564216489}}</td>
                </tr>
                <tr>
                    <td scope="row">PHP</td>
                    <td>{{$rates['rates']['PHP']}}</td>
                    <td>{{$rates['rates']['PHP']+0.34}}</td>
                </tr>
            </tbody>
        </table>

    </div>

    @if ($isActivated == 0)
        <div class="divNoCard">
            <p>
                <h3>Sorry, but your account is not activated yet</h3> 
            </p>
            <p>
                <h3 class="hrefNewCard">You can <a href="/Contacts">contact</a> with us </h3> 
            </p>
        </div>
    @else
    @if ($isExist)

    @foreach ($data as $item)
        
    @php
        $cardNumber = $item->cardNumber;
        $fullName= $item->name . ' ' . $item->surname;
        $endDate=$item->endDate;
        $balance=$item->balance;
    @endphp

    <div class="cards">
        <div class="image">
            @if ($item->cardType == 4)
                <img class="bankCard" src="images/CreditCardVISA.png"/> 
            @else
                <img class="bankCard" src="images/CreditCardMastercard.png"/>
            @endif
            
            <h3 class="cardNumber cardColor">{{$cardNumber}}</h3>
            <h5 class="cardName cardColor">{{$fullName}}</h5>
            <h5 class="cardDate cardColor">{{$endDate}}</h5>
            <h2 class="balance">{{$balance}} USD</h2>
            @if ($item->isLocked == 0)
                <div class="btnHistory">
                    <a href="Checkhistory/{{$cardNumber}}" class="floating-button">History</a>
                </div>
                <div class="btnTransfer">
                    <a href="/transfer/{{$cardNumber}}" class="floating-button">Transfer</a>
                </div>  
                <div class="btnBlock">
                    <a href="/Block?cardNumber={{$cardNumber}}" class="floating-button">Block Card</a>
                </div>  
            @else
                <p ><h4 class="CardBlock">This card is blocked</h4></p>
            @endif
            
        </div>
    </div>

    @endforeach
        

    @else
        <div class="divNoCard">
            <p>
                <h3>Sorry, but you have not a card in our bank!</h3> 
            </p>
            <p>
                <h3 class="hrefNewCard">You can register it <a href="/NewCard">here</a></h3> 
            </p>
        </div>
    @endif
    @endif


   
    
    
    
</body>

</html>
