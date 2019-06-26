<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>用户修改</h2>
    <form action="/user/update"  method="post">
    <input type="hidden" name="id" value="{{$data->id}}">
    @csrf
        <table border="1">
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="age" value="{{$data->age}}"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td><input type="text" name="sex" value="{{$data->sex}}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="确认修改"></td>
            </tr>
        </table>
    </form>
</body>
</html>