<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>学生修改</h2>
    <form action="/xue/update"  method="post">
    <input type="hidden" name="xue_id" value="{{$data->xue_id}}">
    @csrf
        <table border="1">
            <tr>
                <td>姓名</td>
                <td><input type="text" name="xue_name" value="{{$data->xue_name}}"></td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="xue_age" value="{{$data->xue_age}}"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td>
                <input type="radio" name="xue_sex" value="男" {{$data->xue_sex=='男'?'checked':''}}>男
                <input type="radio" name="xue_sex" value="女" {{$data->xue_sex=='女'?'checked':''}}>女
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="确认修改"></td>
            </tr>
        </table>
    </form>
</body>
</html>