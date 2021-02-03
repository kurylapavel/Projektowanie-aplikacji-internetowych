<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>qwerty</title>
    @include('layouts.header')
    <link rel="stylesheet" href="/css/preparationToSend.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
     @php
        if(isset($error)){
            echo $error;
            unset($error);
            exit();
        }
    @endphp
    
    
    {{-- <form class="box" action="sendMoney/{{$value}}/{{$cardNumber}}" method = "get" name="form">
        <p>Bank country: {{$data['country']['name']}}</p>
        <p>Bank name: {{$data['bank']['name']}}</p>
        <p>Card type: {{$data['scheme']}}</p>
        @if ($data['bank']['name'] == 'qwerty')
            <p>The commission fee is 0%</p>
        @else
        <p>The commission fee is 5%</p>
        @endif
    
    <p>Are you sure you want to send?</p>
        <input type="password" name="password" required placeholder="Your password">
        <br>
        <br>
        @error('password')
                <span class="exception">{{$message}}</span>
                <br>
                <br>
        @enderror
        <div>
            <button class="btn btn-success poss" type="submit">Yes</button>
            <a class="btn btn-danger " href="/home">No</a>
        </div>
        
    </form> --}}
    {{-- block --}}
    <main>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                
                    <div class="card-body">
                        <form class="box" action="sendMoney/{{$value}}/{{$cardNumber}}" method = "get" name="form">
                            <p>Bank country: {{$data['country']['name']}}</p>
                            <p>Bank name: {{$data['bank']['name']}}</p>
                            <p>Card type: {{$data['scheme']}}</p>
                            @if ($data['bank']['name'] == 'qwerty')
                                <p>The commission is 0%</p>
                            @else
                            <p>The commission is 5%</p>
                            @endif
                        
                        <p>Are you sure you want to send?</p>
                            <input type="password" name="password" required placeholder="Your password">
                            <br>
                            <br>
                            @error('password')
                                    <span class="exception">{{$message}}</span>
                                    <br>
                                    <br>
                            @enderror
                            <div>
                                <button class="btn btn-success poss" type="submit">Yes</button>
                                <a class="btn btn-danger " href="/home">No</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </main>
        {{-- block --}}
    
</body>
</html>