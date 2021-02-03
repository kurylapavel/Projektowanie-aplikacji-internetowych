<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>qwerty history</title>
    @include('layouts.header')
</head>
<body>
    <style>
        body{
            color: white;
        }
    </style>
    <h4 style="margin-left: 30%; color: red;">Sent</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">To</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($from as $item)
                <tr>
                    <td>{{$item->ToUser}}</td>
                    <td style="color: red">-{{$item->amount}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <h4 style="margin-left: 30%; color: green;">Received</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">From</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($to as $item)
                <tr>
                    <td>{{$item->FromUser}}</td>
                    <td style="color: green">+{{$item->amount}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>