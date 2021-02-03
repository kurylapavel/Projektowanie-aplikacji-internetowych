{{-- 571566 --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Card</title>
    <link rel="stylesheet" href="/css/NewCard.css">
    <link rel="stylesheet" href="/css/app.css">
    @include('layouts.header')
</head>

@php
    
    use Illuminate\Support\Facades\DB;
    
    $id = Auth::user()->id;
    $isActivated = Auth::user()->isActivated;
    $isAdmin = Auth::user()->isAdmin;
    $data = DB::table('usercards')
    ->where('userId',$id)
    ->get();

    if (count($data)>=3) {
        $isExist = true;
    }else{
        $isExist = false;
    }

@endphp

    @if ($isAdmin == 1)
        <script>
            window.location.replace("/home");
        </script>
    @endif

<body>

    @if ($isActivated == 0)
        <div class="divNoCard">
            <p>
                <h3>Sorry, but your account is not activated yet</h3> 
            </p>
            <p>
                <h3 class="hrefNewCard">You can <a class="cont" href="/Contacts">contact</a> with us </h3> 
            </p>
        </div>
    @else


    @if (!$isExist)
        
            <main>
            <div class="container">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3>Create card</h3>
                        </div>
                        <div class="card-body">
                            <form action="newCard" method = "post" name="form">
                                @csrf
                                <span class="CardSpan">Сard expiry date</span>
                                <div class="input-group form-group">
                                    <select aria-placeholder="Type of card" name="expiry"  class="form-control" id="exampleFormControlSelect1" required>
                                        <option style="display:none">
                                        <option value="1">1 year</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
                                    </select>
                                    
                                </div>
                                    @error('expiry')
                                        <span class="exception">{{$message}}</span>
                                    @enderror

                                <div class="row align-items-center remember">
                                    <span>Type of card</span>
                                    <input type="radio" name="cardType" value="mastercard" required> mastercard
                                    <input type="radio" name="cardType" value="visa"> visa
                                    <br>
                                    @error('cardType')
                                        <span class="exception">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Create card" class="btn btn-outline-primary float-right login_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </main>
            {{-- block --}}
        
    @else
        <div class="divMaxCard">
            <p>
                <h3>Sorry, but you already have a maximum cards in our bank</h3>
            </p>
        </div>
    @endif
    @endif
    
    

</body>

</html>