<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cards</title>
    @include('layouts.adminHeader')
</head>

<body>
    <form action="/Cards/FindCardBySurname" method="post" class="form-inline">
        {{csrf_field()}}

        <div class="form-group mx-sm-3 mb-2" style="width: 200px;">
            <input type="text" name="cardName" placeholder="Card number" class="form-control" id="inputPassword2">
        </div>
        <button class="btn btn-primary mb-2" type="submit" style="position: absolute; left: 230px; top: 89px;">Find</button>
    </form>
    <table class="table table-bordered">
        <tr>
            <th scope="col">User id</th>
            <th scope="col">Card number</th>
            <th scope="col">Is locked</th>
            <th scope="col">balance</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->userId}}</td>
            <td>{{$item->cardNumber}}</td>
            <td>
                <a href="CardLock?id={{$item->id}}&isLocked={{$item->isLocked}}">{{$item->isLocked}}</a>
            </td>
            <td>
                <form action="ChangeBalance">
                    <input type="text" name="amount" value="{{$item->balance}}">
                    <input type="hidden" name="id" value="{{$item->id}}" style="outline: none; border: none;">
                    <button type="submit" class="btn btn-primary mb-2">Confirm</button></td>
                    @error('amount')
                        <td>{{$message}}</td>
                    @enderror
                </form>
        </tr>
        @endforeach
    </table>
</body>
</html>