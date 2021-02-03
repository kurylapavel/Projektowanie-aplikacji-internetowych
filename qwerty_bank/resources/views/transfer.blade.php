<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>qwerty transfer</title>
    <link rel="stylesheet" href="/css/transfer.css">
    <link rel="stylesheet" href="/css/app.css">
    @include('layouts.header')
</head>



<body>
    <div>
        <main>
            <div class="container">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                    {{-- <div id="cardId"> --}}
                        <div class="card-header">
                            <h3>Transfer</h3>
                        </div>
                        <div class="card-body">
                            <form class="box" action="preparation/{{$cardNumber}}" method = "get" name="form">
            
                                <p >Input recipient card number</p>
            
                                <input placeholder="1234" class="CardNumber" type="text" name="CardNumberOne" maxlength="4" pattern="[0-9]{4}" required>
                                <input placeholder="1234" class="CardNumber"  type="text" name="CardNumberTwo" maxlength="4" pattern="[0-9]{4}" required>
                                <input placeholder="1234" class="CardNumber"  type="text" name="CardNumberThree" maxlength="4" pattern="[0-9]{4}" required>
                                <input placeholder="1234" class="CardNumber"  type="text" name="CardNumberFour" maxlength="4" pattern="[0-9]{4}" required>
            
                                @if ($errors->has('CardNumberOne'))
                                    <br>
                                    <span class="exception">{{ $errors->first('CardNumberOne') }}</span>
                                @else
                                    @if ($errors->has('CardNumberTwo'))
                                        <br>
                                        <span class="exception">{{ $errors->first('CardNumberTwo') }}</span>
                                    @else
                                        @if ($errors->has('CardNumberThree'))
                                            <br>
                                            <span class="exception">{{ $errors->first('CardNumberThree') }}</span>
                                        @else
                                            @if ($errors->has('CardNumberFour'))
                                                <br>
                                                <span class="exception">{{ $errors->first('CardNumberFour') }}</span>
                                            @endif
                                        @endif
                                    @endif
                                @endif
            
            <br>
            <br>
            <p>Min 5 USD, Max 9999 USD</p>
            <input type="text" name="amount" pattern="\d+(\.\d{2})?" required>
            <br>
            @error('amount')
                <span class="exception">{{$message}}</span>
            @enderror
            <br>
            <br>
            @csrf
            {{-- <button class="btn btn-outline-success" type="submit">Send</button> --}}
            <div class="form-group">
                <input type="submit" value="Send" class="btn btn-outline-primary float-right login_btn">
            </div>
        </form> 
                        </div>
                    </div>
                </div>
            </div>
            </main>
            {{-- block --}}

    </div>
</body>
</html>