<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    @include('layouts.adminHeader')
</head>
<body>

    <form action="/Users/FindUserBySurname" method="post" class="form-inline">
        {{csrf_field()}}

        <div class="form-group mx-sm-3 mb-2" style="width: 200px;">
            <input type="text" name="surname" placeholder="Surname" class="form-control" id="inputPassword2">
        </div>
        <button class="btn btn-primary mb-2" type="submit" style="position: absolute; left: 230px; top: 89px;">Find</button>
    </form>
    <br>
    <table class="table table-bordered">
        <tr>
            <th scope="col"><a href="/Users/SortByName">Name</a></th>
            <th scope="col"><a href="/Users/SortBySurname">Surname</a></th>
            <th scope="col"><a href="/Users/SortByEmail">Email</a></th>
            <th scope="col">Is activated</th>
            <th scope="col">Is verified</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->surname}}</td>
            <td>{{$item->email}}</td>
            <td>
                <a href="ActivateCard?id={{$item->id}}">{{$item->isActivated}}</a>
            </td>
            
                @if (isset($item->email_verified_at))
                    <td style="color: green">YES</td> 
                @else
                <td style="color: red">NO</td> 
                @endif
        
        </tr>
        @endforeach
    </table>
</body>
</html>