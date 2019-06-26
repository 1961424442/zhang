<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/page.css')}}">
</head>
<body>
<form action="">
    <input type="text" name="name" value="{{$query['name']??''}}">
    <input type="text" name="sex" value="{{$query['sex']??''}}">
    <button>搜索</button>
</form>

    <form action="">
        <table border="1">
            <tr>
                <td>ID</td>
                <td>名字</td>
                <td>年龄</td>
                <td>性别</td>
                <td>操作</td>
            </tr>
            @if($data)
            @foreach($data as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->age}}</td>
                <td>{{$v->sex}}</td>
                <td>
                    <a href="del\{{$v->id}}">删除</a>
                    <a href="{{url('/user/edit',['id'=>$v->id])}}">修改</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
        {{$data->appends($query)->links()}}
    </form>
</body>
</html>